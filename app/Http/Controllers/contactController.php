<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\contact;
use App\Models\news;
use App\Models\provide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteRecordTrait;
class contactController extends Controller
{
    use DeleteRecordTrait;
    private  $contact;
    private $listStatus;
    public function __construct(contact $contact)
    {
        $this->contact = $contact;
        $this->listStatus = $this->contact->listStatus;
    }
    public function index(Request $request)
    {
        $contacts = $this->contact;

        //   $a=  \DB::table('contacts')
        //     ->select('status', \DB::raw('count(*) as total'))
        //     ->groupBy('status')->get();
        //     dd($a);

        // $collection =  $this->contact->groupBy('status')
        // ->selectRaw('count(*) as total, status')
        // ->get();
        // dd($collection);

        $contactGroupByStatus = $this->contact->where('status','<>',-1)->select($this->contact->where('status','<>',-1)->raw('count(status) as total'), 'status')->groupBy('status')->get();
        $totalContact = $this->contact->all()->count();

        $dataContactGroupByStatus = $this->listStatus;
        foreach ($contactGroupByStatus as $item) {
            $dataContactGroupByStatus[$item->status]['total'] = $item->total;
        }



        $where = [];
        if ($request->has('keyword') && $request->input('keyword')) {
            $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('status') && $request->input('status')) {
            $where[] = ['status', $request->input('status')];
        }
        if ($where) {
            $contacts = $contacts->where($where);
        }
        $orderby=[];
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
                    $orderby[] = ['status','ASC'];
                    $orderby[]=['created_at','DESC'];
                    break;
                case 'statusDESC':
                    $orderby[] = ['status','DESC'];
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $contacts = $contacts->orderBy(...$or);
            }

        } else {
            $contacts = $contacts->orderBy("created_at", "DESC");
        }
        $contacts =  $contacts->paginate(15);
        return view('admin.contact.index', [
            'dataContactGroupByStatus' => $dataContactGroupByStatus,
            'totalContact' => $totalContact,
            'data' => $contacts,
            'listStatus' => $this->listStatus,
            'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
            'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            'statusCurrent' => $request->input('status') ? $request->input('status') : "",
        ]);
    }
    public function loadNextStepStatus(Request $request)
    {
        $id = $request->id;
        $contact = $this->contact->find($id);
        $status = $contact->status;
        switch ($status) {
            case -1:
                break;
            case 1:
                $status += 1;
                break;
            case 2:
                break;
            default:
                break;
        }
        $contact->update([
            'status' => $status,
        ]);
        return response()->json([
            'code' => 200,
            'htmlStatus' => view('admin.components.status', [
                'dataStatus' => $contact,
                'listStatus' => $this->listStatus,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }
    public function loadContactDetail($id)
    {

        $contact = $this->contact->find([$id]);

        return response()->json([
            'code' => 200,
            'htmlTransactionDetail' => view('admin.components.contact-detail', [
                'data' => $contact,
                'listStatus' => $this->listStatus,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->contact, $id);
    }
    public function storeAjax(Request $request)
    {
        //   dd($request->name);
        // dd($request->ajax());
        try {
            DB::beginTransaction();
            $title = 'THÔNG TIN LIÊN HỆ';
            $dataContactCreate = [
                'name' => $request->input('name') ?? "",
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'active' => $request->input('active') ?? 1,
                'status' => 1,
                'city_id' => $request->input('city_id') ?? null,
                'district_id' => $request->input('district_id') ?? null,
                'commune_id' => $request->input('commune_id') ?? null,
                'address_detail' => $request->input('address_detail') ?? null,
                'content' => ($request->input('title') ?? $title) . '<br />' . 'Nội dung: ' . $request->input('content'),
                'admin_id' => 0,
                // 'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];

            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
            //  dd($contact);
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => 'Gửi thông tin thành công',
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html' => 'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);
        }
    }

    public function storeAjax2(Request $request)
    {

        try {
            DB::beginTransaction();
            $title = 'HẸN LỊCH NGAY';
            $dataContactCreate = [
                'name' => $request->input('name') ?? "",
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'active' => $request->input('active') ?? 1,
                'status' => 1,
                'city_id' => $request->input('city_id') ?? null,
                'district_id' => $request->input('district_id') ?? null,
                'commune_id' => $request->input('commune_id') ?? null,
                'address_detail' => $request->input('address_detail') ?? null,
                'content' => ($request->input('title') ?? $title) . '<br />' . 'Nội dung: ' . $request->input('content') . '<br />' . 'Ngày đến: ' . Carbon::parse($request->input('date_start'))->format('d/m/Y') ?? '',
                'admin_id' => 0,
                // 'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];

            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);
            //  dd($contact);
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => 'Gửi thông tin thành công',
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html' => 'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);
        }
    }

    public function storeAjax1(Request $request)
    {

        try {
            DB::beginTransaction();
            $title = 'ĐĂNG KÝ NGAY';
            $dataContactCreate = [
                'name' => $request->input('name') ?? "",
                'phone' => $request->input('phone') ?? "",
                'email' => $request->input('email') ?? "",
                'active' => $request->input('active') ?? 1,
                'status' => 1,
                'city_id' => $request->input('city_id') ?? null,
                'district_id' => $request->input('district_id') ?? null,
                'commune_id' => $request->input('commune_id') ?? null,
                'address_detail' => $request->input('address_detail') ?? null,
                'content' => ($request->input('title') ?? $title) . '
                <br />' . 'Nội dung: ' . $request->input('content2') . '
                <br />' . 'Sản phẩm: ' . $request->input('content') ?? '',
                'admin_id' => 0,
                // 'user_id' => Auth::check() ? Auth::user()->id : 0,
            ];

            // Giới tính: '.$request->input('sex').'<br>
            // Từ: '.$request->input('from').'<br>
            // Đến: '.$request->input('to').'<br>
            // Từ: '.$request->input('service').'<br>

            $contact = $this->contact->create($dataContactCreate);

            //  dd($contact);
            DB::commit();
            return response()->json([
                "code" => 200,
                "html" => 'Gửi thông tin thành công',
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            //throw $th;
            // dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                'html' => 'Gửi thông tin không thành công',
                "message" => "fail"
            ], 500);
        }
    }
    public function lienhe()
    {
        // $resultCheckLang = checkRouteLanguage2();
        // if ($resultCheckLang) {
        //     return $resultCheckLang;
        // }


        // $dataAddress = $this->setting->find(28);
        // $map = $this->setting->find(33);
        $breadcrumbs = [
            [
                'name' => __('home.lien_he'),
                // 'slug' => makeLinkToLanguage('contact', null, null, \App::getLocale()),
            ],
        ];

        $catepost = news::find(34);
        $catepost2 = news::find(33);
        $categoryProductHome=category::find(78);


        return view("page.contact", [
            'catepost'=>$catepost,
            'catepost2'=>$catepost2,
            'categoryProductHome'=>$categoryProductHome,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'contact',
            'title' =>  "Thông tin liên hệ",

            'seo' => [
                'title' => "Thông tin liên hệ",
                'keywords' =>  "Thông tin liên hệ",
                'description' =>   "Thông tin liên hệ",
                'image' =>  "",
                'abstract' =>  "Thông tin liên hệ",
            ],

            // "dataAddress" => $dataAddress,
            // "map" => $map,
        ]);
    }
}
