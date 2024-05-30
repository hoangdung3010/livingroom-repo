<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\Order;
use App\Models\news;
use App\Models\Category;
use App\Models\Product;
use App\Models\nhanvien;
use App\Models\City;
use App\Models\District;
use App\Models\Commune;
use App\Models\User;

use App\Models\payment;
use App\Models\shipping;
use App\Models\Transaction;
use PDF;
use App\Helper\AddressHelper;
use App\Traits\DeleteRecordTrait;
use App\Traits\PointTrait;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
class orderController extends Controller
{
    use DeleteRecordTrait, PointTrait;
    private  $transaction;
    private  $order;
    private $unit;
    private $product;
    private $listStatus;
    private $typePoint;
    private $rose;
    private $cart;
    private $city;
    private $district;
    private $commune;
    public function __construct(Transaction $transaction,City $city, District $district, Commune $commune,Order $order,Product  $product)
    {
        $this->product = $product;
        $this->transaction = $transaction;
        $this->order = $order;
        $this->city = $city;
        $this->district = $district;
        $this->commune = $commune;
        $this->unit = "đ";
        $this->listStatus = $this->transaction->listStatus;
        $this->typePoint = config('point.typePoint');
        $this->rose = config('point.rose');
    }
    public function index(Request $request)
    {
        //thống kê giao dịch
        $transactionGroupByStatus = $this->transaction->select($this->transaction->raw('count(status) as total'), 'status')->groupBy('status')->get();
        $totalTransaction = $this->transaction->get()->count();

        $dataTransactionGroupByStatus = $this->listStatus;
        foreach ($transactionGroupByStatus as $item) {
            $dataTransactionGroupByStatus[$item->status]['total'] = $item->total;
        }
        //    dd($dataTransactionGroupByStatus);

        $transactions = $this->transaction;
        $where = [];
        $orWhere = null;
        if ($request->has('keyword') && $request->input('keyword')) {

            $transactions = $transactions->where(function ($query) {
                $query->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->orWhere([
                    ['code', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            // $orWhere = ['code', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('status') && $request->input('status')) {
            $where[] = ['status', $request->input('status')];
        }
        if ($where) {
            $transactions = $transactions->where($where);
        }
        if ($orWhere) {
            $transactions = $transactions->orWhere(...$orWhere);
        }
        $orderby = [];
        if ($request->has('order_with') && $request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby[] = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'statusASC':
                    $orderby[] = ['status', 'ASC'];
                    $orderby[] = ['created_at', 'DESC'];
                    break;
                case 'statusDESC':
                    $orderby[] = ['status', 'DESC'];
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby[]  = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $transactions = $transactions->orderBy(...$or);
            }
        } else {
            $transactions = $transactions->orderBy("created_at", "DESC");
        }
        $transactions =  $transactions->paginate(15);
        $totalAmount = Transaction::where('thanhtoan', 1)->sum('total');


        return view('admin.transaction.index', [
            'data' => $transactions,
            'totalAmount'=>$totalAmount,
            'dataTransactionGroupByStatus' => $dataTransactionGroupByStatus,
            'totalTransaction' => $totalTransaction,
            'listStatus' => $this->listStatus,
            'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
            'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            'statusCurrent' => $request->input('status') ? $request->input('status') : "",
        ]);
    }
    public function loadNextStepStatus(Request $request)
    {
        $id = $request->id;
        $transaction = $this->transaction->find($id);
        $status = $transaction->status;

        $dataUpdate = [];
        switch ($status) {
            case -1:
                break;
            case 1:
                $status += 1;
                break;
            case 2:
                $status += 1;
                break;
            case 3:
                $status += 1;
                break;
            case 4:
                break;
            default:
                break;
        }
        $dataUpdate['status']=$status;
        $transaction->update($dataUpdate);
        return response()->json([
            'code' => 200,
            'htmlStatus' => view('admin.components.status', [
                'dataStatus' => $transaction,
                'listStatus' => $this->listStatus,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }
    public function loadTransactionDetail($id)
    {
        $orders = $this->transaction->find($id)->orders()->get();

        return response()->json([
            'code' => 200,
            'htmlTransactionDetail' => view('admin.components.transaction-detail', [
                'orders' => $orders,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->transaction, $id);
    }

    public function loadThanhtoan($id)
    {
        $transaction   =  $this->transaction->find($id);
        $thanhtoan = $transaction->thanhtoan;

        if ($thanhtoan) {
            $thanhtoanUpdate = 0;
        } else {
            $thanhtoanUpdate = 1;
        }
        $updateResult =  $transaction->update([
            'thanhtoan' => $thanhtoanUpdate,
        ]);

        $transaction   =  $this->transaction->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-thanhtoan', ['data' => $transaction])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }


    public function show($id)
    {
        $transactions = $this->transaction->find($id);
        return view('admin.transaction.show', [
            'data' => $transactions,
            "unit" => $this->unit,
        ]);
    }
    public function exportPdfTransactionDetail($id)
    {
        $transactions = $this->transaction->find($id);
        $unit = $this->unit;
        $data = $transactions;

        $pdf = PDF::loadView('admin.transaction.show-pdf', compact('data', 'unit'));

        // Thiết lập font mặc định cho PDF
       $pdf->setPaper('A4', 'portrait');

        return $pdf->stream();
    }

    public function list()
    {
        $address = new AddressHelper();
        $data = $this->city->orderby('name')->get();
        $cities = $address->cities($data);
        $this->cart = new CartHelper();
        $data = $this->cart->cartItems;
        $totalPrice =  $this->cart->getTotalPrice();
        $totalOldPrice =  $this->cart->getTotalOldPrice();

        $totalQuantity =  $this->cart->getTotalQuantity();
        // $vanchuyen = $this->setting->find(140);
        $thanhtoan = nhanvien::find(9);
        // $chinhanh = $this->setting->find(143);
        $catepost2 = news::find(33);
        $catepost = news::find(34);
        $categoryProductHome= category::find(78);
        return view('page.cart', [
            'data' => $data,
            'cities'=>$cities,
            'categoryProductHome'=>$categoryProductHome,
            'catepost'=>$catepost,
            'catepost2'=>$catepost2,
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'totalOldPrice' => $totalOldPrice,
            // 'vanchuyen' => $vanchuyen,
            'thanhtoan' => $thanhtoan,
            // 'chinhanh' => $chinhanh,
        ]);
    }
    public function add($id, Request $request)
    {
        $this->cart = new CartHelper();

        $quantity = 1;
        if ($request->has('quantity') && $request->input('quantity')) {
            $quantity = (int) $request->input('quantity');
            if ($quantity <= 0) {
                $quantity = 1;
            }
        }
        if ($request->has('option') && $request->input('option')) {
            // dd($this->product->mergeOption($request->input('option'))->where('products.id',$id)->get());
            $product =  $this->product->join('options', 'products.id', '=', 'options.product_id')
                ->select('products.*', 'options.size as size', 'options.price as price', 'options.id as option_id')
                ->where('options.id', $request->input('option'))
                ->where('products.id', $id)
                ->first();
        } else {

            $product = $this->product->find($id);
        }

        //  dd($quantity);
        $this->cart->add($product, $quantity);

        //  dd($this->cart->cartItems);
        return response()->json([
            'code' => 200,
            'messange' => 'success'
        ], 200);
    }
    public function buy($id)
    {
        $this->cart = new CartHelper();

        $product = $this->product->find($id);

        $this->cart->add($product);
        //  dd($this->cart->cartItems);
        return redirect()->route("cart.list");
    }
    public function remove($id, Request $request)
    {
        $this->cart = new CartHelper();
        if ($request->option) {
            $this->cart->remove($id, $request->option);
        } else {
            $this->cart->remove($id);
        }

        $totalPrice =  $this->cart->getTotalPrice();
        $totalQuantity =  $this->cart->getTotalQuantity();
        $totalOldPrice =  $this->cart->getTotalOldPrice();
        return response()->json([
            'code' => 200,
            'htmlcart' => view('page.cart-component', [
                'data' => $this->cart->cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'totalOldPrice' => $totalOldPrice,
            ])->render(),
            'totalPrice' => $totalPrice,
            'messange' => 'success'
        ], 200);
    }
    public function update($id, Request $request)
    {
        $this->cart = new CartHelper();
        $quantity = $request->quantity;
        if ($request->option) {
            $this->cart->update($id, $quantity, $request->option);
        } else {
            $this->cart->update($id, $quantity);
        }

        $totalPrice =  $this->cart->getTotalPrice();
        $totalQuantity =  $this->cart->getTotalQuantity();
        $totalOldPrice =  $this->cart->getTotalOldPrice();
        return response()->json([
            'code' => 200,
            'htmlcart' => view('page.cart-component', [
                'data' => $this->cart->cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'totalOldPrice' => $totalOldPrice,
            ])->render(),
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'messange' => 'success'
        ], 200);
    }
    public function clear()
    {
        $this->cart = new CartHelper();
        $this->cart->clear();
        $totalPrice =  $this->cart->getTotalPrice();
        $totalQuantity =  $this->cart->getTotalQuantity();
        $totalOldPrice =  $this->cart->getTotalOldPrice();
        return response()->json([
            'code' => 200,
            'htmlcart' => view('page.cart-component', [
                'data' => $this->cart->cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'totalOldPrice' => $totalOldPrice,
            ])->render(),
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'messange' => 'success'
        ], 200);
    }
    public function postOrder(Request $request)
    {
        $this->cart = new CartHelper();
        $dataCart = $this->cart->cartItems;
        //  dd($dataCart);
        if (!count($dataCart)) {
            return redirect()->route('cart.order.error')->with("error", "Đặt hàng không thành công! Bạn chưa chọn sản phẩm nào");
        }
        try {
            DB::beginTransaction();
            // dd( $dataCart);
            $totalPrice =  $this->cart->getTotalPrice();
            $totalQuantity =  $this->cart->getTotalQuantity();
            // $dataOrderCreate = [
            //     "quantity" => $request->input('quantity'),
            // ];
            $dataTransactionCreate = [
                'total' => $totalPrice,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'note' => $request->input('note'),
                'email' => $request->input('email'),
                'status' => 1,
                'city_id' => $request->input('city_id') ?? 0,
                'district_id' => $request->input('district_id') ?? 0,
                'commune_id' => $request->input('commune_id') ?? 0,
                'address_detail' => $request->input('address_detail'),
                'httt' => $request->input('httt'),
                'cn' => $request->input('cn'),
                'admin_id' => 0,
                // 'user_id' => Auth::check() ? Auth::user()->id : 0,
                // 'code' => makeCodeTransaction($this->transaction),
            ];
            //    dd($dataTransactionCreate);
            //  dd($this->transaction->create($dataTransactionCreate));
            $transaction = $this->transaction->create($dataTransactionCreate);

            //  dd( $transaction);
            $dataOrderCreate = [];
            foreach ($dataCart as $cart) {
                $dataOrderCreate[] = [
                    'name' => $cart['name'],
                    'quantity' => $cart['quantity'],
                    'new_price' => $cart['totalPriceOneItem'],
                    'old_price' => $cart['totalOldPriceOneItem'],
                    'avatar_path' => $cart['product_img'],
                    'sale' => $cart['sale'],
                    'size' => $cart['size'],
                    'option_id' => $cart['option_id'] ?? 0,
                    'product_id' => $cart['id'],
                ];
                $product = $this->product->find($cart['id']);
                $pay = $product->pay;
                $product->update([
                    'pay' => $pay + $cart['quantity'],
                ]);
            }
            //   dd($dataOrderCreate);
            // insert database in orders table by createMany
            $transaction->orders()->createMany($dataOrderCreate);

            $this->cart->clear();
            DB::commit();
            return redirect()->route('cart.order.sucess', ['id' => $transaction->id])->with("sucess", "Đặt hàng thành công");
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('cart.order.error')->with("error", "Đặt hàng không thành công");
        }
    }
    public function getOrderSuccess(Request $request)
    {
        $id = $request->id;
        $data = $this->transaction->find($id);
        $catepost = news::find(34);
        $catepost2 = news::find(33);
        $categoryProductHome=category::find(78);

        return view('page.order-sucess', [
            'catepost'=>$catepost,
            'catepost2'=>$catepost2,
            'categoryProductHome'=>$categoryProductHome,
            'data' => $data,
        ]);
    }
    public function getOrderError(Request $request)
    {
        $data = null;
        return view('page.order-sucess', [
            'data' => $data,
        ]);
    }

}
