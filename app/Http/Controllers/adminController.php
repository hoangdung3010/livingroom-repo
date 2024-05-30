<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\provide;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\contact;
use App\Models\Transaction;
use App\Models\order;
class adminController extends Controller
{
    //
    private $transaction;
    private $user;
    private $product;
    private $post;
    private $listStatus;
    private $contact;
    private $categoryPost;
    private $categoryProduct;
    private $setting;
    private $slider;
    private $menu;
    private $attribute;
    public function __construct(
        Transaction $transaction,
        // User $user,
        provide $post,
        Product $product,
        contact $contact,
        news $categoryPost,
        Category $categoryProduct

    ) {
        // $this->middleware('auth:admin');
        $this->transaction = $transaction;
        $this->listStatus = $this->transaction->listStatus;

        $this->post = $post;
        $this->product = $product;
        $this->contact = $contact;
        $this->categoryPost = $categoryPost;
        $this->categoryProduct = $categoryProduct;

    }
    public function index(){
        $lsp= category::orderBy('id','DESC')->get();
        $sp= Product::all();
        $ncc= provide::all();
        $tt= news::all();
        $dh= order::all();
        return view('admin.thongke',compact('lsp','sp','ncc','tt','dh'));
    }
    public function dashboard()
    {

        $totalTransaction = $this->transaction->all()->count();
        // $totalMember = $this->user->all()->count();
        $totalProduct = $this->product->all()->count();
        $totalPost = $this->post->all()->count();
        $countTransaction = [];
        // lấy số giao dịch đã bị hủy bỏ
        $countTransaction['-1'] = $this->transaction->where([
            ['status', '=', '-1'],
        ])->count();
        // lấy số lượng đơn hàng đã đặt hàng thành công
        $countTransaction['1'] = $this->transaction->where([
            ['status', '=', '1'],
        ])->count();
        // lấy số giao dịch đã tiếp nhận
        $countTransaction['2'] = $this->transaction->where([
            ['status', '=', '2'],
        ])->count();
        // lấy số giao dịch đang vận chuyển
        $countTransaction['3'] = $this->transaction->where([
            ['status', '=', '3'],
        ])->count();
        // lấy số giao dịch đã hoàn thành
        $countTransaction['4'] = $this->transaction->where([
            ['status', '=', '4'],
        ])->count();

        // lấy 20 giao dịch mới nhất chưa được xử lý
        // trạng thái là 1 2 3
        $newTransaction = $this->transaction->whereIn('status', [1, 2, 3])->orderByDesc('created_at')->limit(20)->get();
        // $topPayProduct = $this->product->orderByDesc('pay')->get();

        // lấy số contact
        $countContact = $this->contact->count();


        // lấy bài viết mới nhất
        $listCategoryPost = $this->categoryPost->getALlCategoryChildrenAndSelf(34);
        //  dd($listCategoryPost);
        $postNews = $this->post->whereIn('category_id', $listCategoryPost)->orderBy('created_at')->limit(10)->get();

        $listCategoryProduct = $this->categoryProduct->getALlCategoryChildrenAndSelf(78);
        // dd($listCategoryProduct);
        $productNews = $this->product->whereIn('category_id', $listCategoryProduct)->orderBy('created_at')->limit(10)->get();

        // dd($postNews);
        //  dd($countContact);
        return view("layout/admin", [
            'totalTransaction' => $totalTransaction,
            // 'totalMember' => $totalMember,
            'totalProduct' => $totalProduct,
            'totalPost' => $totalPost,
            'countTransaction' => $countTransaction,
            'newTransaction' => $newTransaction,
            // 'topPayProduct' => $topPayProduct,
            'listStatus' => $this->listStatus,
            'countContact' => $countContact,
            'postNews' => $postNews,
            'productNews' => $productNews,
        ]);
    }

}
