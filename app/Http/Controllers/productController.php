<?php

namespace App\Http\Controllers;
use App\Models\ProductStar;
use App\Models\Product;
use App\Models\news;
use App\Models\category;//gọi category để thêm
use App\Models\ProductImage;//gọi category để thêm
use Illuminate\Http\Request;
use App\Traits\DeleteRecordTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Tag;
use Session;
class productController extends Controller
{
      //
      use StorageImageTrait, DeleteRecordTrait;
      private $product;
      private $limitProduct = 8;
      private $unit = 'đ';
      private $category;
      private $htmlselect;
      private $productImage;
      private $tag;
      private $productTag;
      private $city;
      private $supplier;
      private $donvi;
      private $huongnha;
      private $option;
      private $categoryProductOrigin;
      public $priceSearch;
      public function __construct(
          Product $product,
          category $category,
          ProductImage $productImage
        //   City $city,
        //   District $district,
        //   Commune $commune,
        //   Tag $tag,
        //   ProductTag $productTag,
        //   Option $option,
        //   Supplier $supplier
      )
       {
          $this->product = $product;
          $this->category = $category;
          $this->productImage = $productImage;
        //   $this->tag = $tag;
        //   $this->commune = $commune;
        //   $this->city = $city;
        //   $this->district = $district;
        //   $this->productTag = $productTag;
        //   $this->option = $option;
        //   $this->supplier = $supplier;
        //   $this->huongnha = config('web_default.huongnha');
        //   $this->donvi = config('web_default.donvi');
        //   $this->categoryProductOrigin = config('web_default.frontend.categoryProductOrigin');
        $this->priceSearch = config('web_default.priceSearch');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalProduct = $this->product->count();
        $data = $this->product;
        if ($request->input('category')) {
            $categoryProductId = $request->input('category');
            $idCategorySearch = $this->category->getALlCategoryChildren($categoryProductId);
            $idCategorySearch[] = (int)($categoryProductId);
            $data = $data->whereIn('category_id', $idCategorySearch);
            $htmlselect = $this->category->getHtmlOption($categoryProductId);
        } else {
            $htmlselect = $this->category->getHtmlOption();
        }
        $where = [];
        $orWhere = null;
        if ($request->input('keyword')) {
            $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            $orWhere = ['masp', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');

            switch ($key) {
                case 'hot':
                    $where[] = ['hot', '=', 1];
                    break;
                case 'no_hot':
                    $where[] = ['hot', '=', 0];
                    break;
                case 'active':
                    $where[] = ['active', '=', 1];
                    break;
                case 'no_active':
                    $where[] = ['active', '=', 0];
                    break;
                case 'ban_chay':
                    $where[] = ['ban_chay', '=', 0];
                    break;
                case 'no_ban_chay':
                    $where[] = ['no_ban_chay', '=', 1];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }
        //  dd($orWhere);
        if ($orWhere) {
            $data = $data->orWhere(...$orWhere);
        }
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'viewASC':
                    $orderby = [
                        'view',
                        'ASC'
                    ];
                    break;
                case 'viewDESC':
                    $orderby = [
                        'view',
                        'DESC'
                    ];
                    break;
                case 'priceASC':
                    $orderby = [
                        'price',
                        'ASC'
                    ];
                    break;
                case 'priceDESC':
                    $orderby = [
                        'price',
                        'DESC'
                    ];
                    break;
                case 'payASC':
                    $orderby = [
                        'pay',
                        'ASC'
                    ];
                    break;
                case 'payDESC':
                    $orderby = [
                        'pay',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }
        //  dd($this->product->select('*', \App\Models\Store::raw('Sum(quantity) as total')->whereRaw('products.id','stores.product_id'))->orderBy('total')->paginate(15));

        $data = $data->paginate(15);

        return view("admin.product.list",
            [
                'data' => $data,
                'totalProduct' => $totalProduct,
                'option' => $htmlselect,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request = null)
    {
        $htmlselect = $this->category->getHtmlOption();
        return view("admin.product.add",
            [
                'option' => $htmlselect,
                'request' => $request,
                'donvi' => $this->donvi,
                'huongnha' => $this->huongnha,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                "masp" => $request->input('masp'),
                "name" => $request->input('name'),
                "slug" => $request->input('slug'),
                "price" => $request->input('price') ?? 0,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "ban_chay" => $request->input('ban_chay') ?? 0,
                "model"=>$request->input('model'),
                // "pay"=>$request->input('pay'),
                // "number"=>$request->input('number'),

                // 'donvi'=> $request->input('donvi'),
                'tinh_trang' => $request->input('tinh_trang'),
                'dientich' => (float)$request->input('dientich'),
                "warranty" => $request->input('warranty') ?? 0,
                "view" => $request->input('view') ?? 0,
                "description" => $request->input('description'),
                "description_seo" => $request->input('description_seo'),
                "title_seo" => $request->input('title_seo'),
                "keyword_seo" => $request->input('keyword_seo'),
                "content" => $request->input('content'),
                "active" => $request->input('active'),
                "category_id" => $request->input('category_id'),
                "suppiler_id" => 0,
                // "admin_id" => auth()->guard('admin')->id(),
                "type"=>1
            ];

        // $data['product_status'] = $request->product_status;
                //$data['product_img'] = $request->product_img;


            // if ($request->has('created_at') && $request->input('created_at')) {
            //     $dataProductCreate['created_at'] = $request->created_at;
            // }

            // if ($request->has('time_expires') && $request->input('time_expires')) {
            //     $dataProductCreate['time_expires'] = $request->time_expires;
            // }


            // if($request->input('price')&&$request->has('price')){
            //     $dataProductCreate['price']=transMoneyToStore($request->input('price'),$request->input('donvi'));
            //     $dataProductCreate['donvi'] = $request->input('donvi');
            // }else{
            //     $dataProductCreate['price']=0;
            //     $dataProductCreate['donvi'] =1;
            // }

            $dataUploadAvatar = $this->storageTraitUpload($request, "product_img", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductCreate["product_img"] = $dataUploadAvatar["file_path"];
            }
            // insert database in product table
            $product = $this->product->create($dataProductCreate);
            // insert database to product_images table
            if ($request->hasFile("image")) {
                //
                $dataProductImageCreate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $dataProductImageCreate[] = [
                        "name" => $dataProductImageDetail["file_name"],
                        "image_path" => $dataProductImageDetail["file_path"]
                    ];
                }
                // insert database in product_images table by createMany
                $productImage =   $product->images()->createMany($dataProductImageCreate);
            }

            // insert database to product_tags table
            if ($request->has("tags")) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                    $tag_ids[] = $tagInstance->id;
                    // $this->productTag->create([
                    //   "product_id"=> $product->id,
                    //   "tag_id"=>$tagInstance->id,
                    // ]);
                }
                $product->tags()->attach($tag_ids);
            }

            if ($request->has("supplier_idOption")) {
                //
                $dataProductOptionCreate = [];
                foreach ($request->input('supplier_idOption') as $key => $value) {
                    if ($value || $request->input('slugOption')[$key]) {
                        $dataProductOptionCreate[] = [
                          //  "name" => $request->input('nameOption')[$key],
                            "supplier_id" => $request->input('supplier_idOption')[$key],
                            "slug" =>  $request->input('slugOption')[$key],
                            "price" =>  $request->input('priceOption')[$key],
                        ];
                    }
                }
                //   dd($dataProductAnswerCreate);
                // insert database in product_images table by createMany
                $product->options()->createMany($dataProductOptionCreate);
            }

            DB::commit();
            return redirect()->route('admin.product.index')->with("alert", "Thêm sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index')->with("error", "Thêm sản phẩm không thành công");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $data = $this->product->find($id);
        $category_id = $data->category_id;
        $htmlselect = $this->category->getHtmlOption($category_id);

        // $address = new AddressHelper();
        // $dataCity = $this->city->orderby('name')->get();
        // $cities = $address->cities($dataCity, $data->city_id);

        // $typeGD = $this->categoryProduct->where([
        //     'active' => 1,
        //     'parent_id' => $this->categoryProductOrigin,
        // ])->get();
        // $supplier=$this->supplier->where('active',1)->orderby('order')->latest()->get();

        return view("admin.product.edit", [
            'option' => $htmlselect,
            'data' => $data,
            // 'cities' => $cities,
            // 'donvi' => $this->donvi,
            // 'huongnha' => $this->huongnha,
            // 'typeGD' => $typeGD,
            // 'supplier'=>$supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                "masp" => $request->input('masp'),
                "name" => $request->input('name'),
                "slug" => $request->input('slug'),
                "price" => $request->input('price') ?? 0,
                "sale" => $request->input('sale') ?? 0,
                "hot" => $request->input('hot') ?? 0,
                "ban_chay" => $request->input('ban_chay') ?? 0,
                // "pay"=>$request->input('pay'),
                // "number"=>$request->input('number'),

                'model'=> $request->input('model'),
                'tinh_trang' => $request->input('tinh_trang'),
                'dientich' => (float)$request->input('dientich'),

                "warranty" => $request->input('warranty'),
                // "view" => $request->input('view'),
                "description" => $request->input('description'),
                "description_seo" => $request->input('description_seo'),
                "title_seo" => $request->input('title_seo'),
                "keyword_seo" => $request->input('keyword_seo'),
                "content" => $request->input('content'),
                "active" => $request->input('active'),
                "category_id" => $request->input('category_id'),
                //  "suppiler_id" => 0,
                // "admin_id" => auth()->guard('admin')->id(),
                // 'created_at' => $request->created_at,
                // 'time_expires' => $request->time_expires,
            ];

            // if($request->input('price')&&$request->has('price')){
            //     $dataProductUpdate['price']=transMoneyToStore($request->input('price'),$request->input('donvi'));
            //     $dataProductUpdate['donvi'] = $request->input('donvi');
            // }else{
            //     $dataProductUpdate['price']=0;
            //     $dataProductUpdate['donvi'] =1;
            // }

            $dataUploadAvatar = $this->storageTraitUpload($request, "product_img", "product");
            if (!empty($dataUploadAvatar)) {
                $dataProductUpdate["product_img"] = $dataUploadAvatar["file_path"];
            }
            // insert database in product table
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            // insert database to product_images table
            if ($request->hasFile("image")) {
                //
                // $product->images()->where("product_id", $id)->delete();
                $dataProductImageUpdate = [];
                foreach ($request->file('image') as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, "product");
                    $dataProductImageUpdate[] = [
                        "name" => $dataProductImageDetail["file_name"],
                        "image_path" => $dataProductImageDetail["file_path"]
                    ];
                }
                // insert database in product_images table by createMany
                $product->images()->createMany($dataProductImageUpdate);
            }






            // insert database to product_tags table
            if ($request->has("tags")) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                    $tag_ids[] = $tagInstance->id;
                    // $this->productTag->create([
                    //   "product_id"=> $product->id,
                    //   "tag_id"=>$tagInstance->id,
                    // ]);
                }
                // Các syncphương pháp chấp nhận một loạt các ID để ra trên bảng trung gian. Bất kỳ ID nào không nằm trong mảng đã cho sẽ bị xóa khỏi bảng trung gian.
                $product->tags()->sync($tag_ids);
            }


            if ($request->has("supplier_idOption")) {
                //
                $dataProductOptionCreate = [];
                foreach ($request->input('supplier_idOption') as $key => $value) {
                    $dataProductOptionCreate[] = [
                        //  "name" => $request->input('nameOption')[$key],
                          "supplier_id" => $request->input('supplier_idOption')[$key],
                          "slug" =>  $request->input('slugOption')[$key],
                          "price" =>  $request->input('priceOption')[$key],
                      ];
                }
                //   dd($dataProductAnswerCreate);
                // insert database in product_images table by createMany
                $product->options()->createMany($dataProductOptionCreate);
            }
            if ($request->has("idOption")) {
                //
                foreach ($request->input('idOption') as $key => $value) {
                    $option = $this->option->find($value);
                    if ($option) {
                        $dataProductOptionUpdate = [
                            "supplier_id" => $request->input('supplier_idOptionOld')[$key],
                            "slug" =>  $request->input('slugOptionOld')[$key],
                            "price" =>  $request->input('priceOptionOld')[$key],
                        ];
                        $option->update($dataProductOptionUpdate);
                    }
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with("alert", "Sửa sản phẩm thành công");
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.product.index')->with("error", "Sửa sản phẩm không thành công");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->deleteTrait($this->product, $id);
    }
    public function destroyProductImage($id)
    {
        return $this->deleteImageTrait($this->productImage, $id);
    }
    public function detail($slug,  Request $request)
    {
        // $data= $this->categoryProduct->setAppends(['breadcrumb'])->where('parent_id',0)->orderBy("created_at", "desc")->paginate(15);

        $breadcrumbs = [];
        $data = [];
        $data = $this->product->where([
            ["slug", $slug],
            ["active", 1],
        ])->first();

        if(!$data){
           return;
        }
        // $listOption=$this->option->where('product_id',$id)->latest()->get();
        $categoryId = $data->category_id;
        $listIdChildren = $this->category->getALlCategoryChildrenAndSelf($categoryId);

        $dataRelate =  $this->product
            ->whereIn('category_id', $listIdChildren)->where([
                ["id", "<>", $data->id],
            ])->where('active',1)->latest()->limit(8)->get();

        //  dd($dataRelate);
        $listIdParent = $this->category->getALlCategoryParentAndSelf($categoryId);

        foreach ($listIdParent as $parent) {
            $breadcrumbs[] = $this->category->select('id', 'name', 'slug')->find($parent)->toArray();
        }

        $dataProductHot=$this->product->where([
            ['active',1],
            ['hot',1]
        ])->latest()->limit(5)->get();
        // $dataNewHot=$this->post->where([
        //     ['active',1],
        //     ['hot',1]
        // ])->latest()->limit(5)->get();
        $categoryProductHome=$this->category->find(78);
        $view = $data->view;

        $data->update([
            'view' => $view + 1,
        ]);
        $catepost = news::find(34);
        $catepost2 = news::find(33);
        $avgRating = 0;
        $sumRating = array_sum(array_column($data->stars()->where('active', 1)->where('parent_id',0)->get()->toArray(), 'star'));
        $countRating = count($data->stars()->where('active', 1)->where('parent_id',0)->get());
        if ($countRating != 0) {
            $avgRating = $sumRating / $countRating;
        }

        $star5 = $data->stars()->where([
            ['active', 1],
            ['star', 5],
        ])->get();

        $star4 = $data->stars()->where([
            ['active', 1],
            ['star', 4],
        ])->get();

        $star3 = $data->stars()->where([
            ['active', 1],
            ['star', 3],
        ])->get();

        $star2 = $data->stars()->where([
            ['active', 1],
            ['star', 2],
        ])->get();

        $star1 = $data->stars()->where([
            ['active', 1],
            ['star', 1],
        ])->get();
        return view('page.product-detail', [
            'categoryProductHome'=>$categoryProductHome,
            'data' => $data,
            'catepost'=>$catepost,
            'catepost2'=>$catepost2,
            'star5' => $star5,
            'star4' => $star4,
            'star3' => $star3,
            'star2' => $star2,
            'star1' => $star1,
            'avgRating' => $avgRating,
            'countRating' => $countRating,
            // 'listOption' => $listOption,
            'dataProductHot' => $dataProductHot,
            // 'dataNewHot' => $dataNewHot,
            'unit' => $this->unit,
            'donvi' => $this->donvi,
            "dataRelate" => $dataRelate,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'category_products',
            'title' => $data ? $data->name : "",
            'category' => $data->category ?? null,
            'seo' => [
                'title' =>  $data->title_seo ?? "",
                'keywords' =>  $data->keyword_seo ?? "",
                'description' =>  $data->description_seo ?? "",
                'image' => $data->avatar_path ?? "",
                'abstract' =>  $data->description_seo ?? "",
            ]
        ]);
    }

    public function detailFull($slug, $id, Request $request)
    {
        $breadcrumbs = [];
        $data = [];
        $data = $product = $this->product
            ->where(function ($query) {
                $query->where('time_expires', '>=', \Carbon\Carbon::now()->format('Y-m-d h:i:s'))
                    ->orWhereNull('time_expires');
            })
            ->where([
                ['id', $id],
                ["slug", $slug],
            ])->first();



        $checknap = false;
        if (!Auth::check()) {
            session()->put('urlBack', url()->current());
            return redirect()->route('login');
        }
        $user = auth()->user();
        $userId = $user->id;
        $pointM = new Point();
        $sumPointCurrent = $pointM->sumPointCurrent($userId);
        if ($user->type == 4 && optional($data->user)->id == $user->id) {
        } else {
            $pT  = $user->points()->where([
                'userorigin_id' => $id
            ])->get()->count();
            if ($pT > 0) {
            } else {
                if ($sumPointCurrent < config('point.typePoint')[3]['point']) {
                    $index = 0;
                    if (session()->has('dataProductWaitView')) {
                        $dataProductWait = session()->get('dataProductWaitView');
                        $index = time();
                        $dataProductWaitView[$index] = $product;

                        session()->put('dataProductWaitView', $dataProductWaitView);
                        // array_push($dataProductWait,$request);
                    } else {
                        $index = time();
                        $dataProductWaitView = [];
                        $dataProductWaitView[$index] =  $product;
                        //  dd($dataProductWait);
                        session()->put('dataProductWaitView', $dataProductWaitView);
                        //  dd(session()->get('dataProductWait'));
                    }
                    session()->put('urlProductPay', route('product.detail', ['slug' => $slug, 'id' => $id]));
                    return redirect()->route('profile.createPaymentCartView', [
                        'money' => config('point.typePoint')[3]['point'],
                        'product_view' => $index
                    ])
                        ->with('mes', $this->chiDanNapTienKhiXemTin);
                    //   ->with('mes', 'Tài khoản của bạn phải lớn hơn <strong>' . number_format(config('point.typePoint')[3]['point']) . ' VNĐ </strong>  để xem tin. Vui lòng nạp tiền vào tài khoản để tiếp tục');
                } else {
                    $user = auth()->user();
                    $point = $user->points()->create([
                        'type'  => config('point.typePoint')[3]['type'],
                        'point' => -config('point.typePoint')[3]['point'],
                        'userorigin_id' => $product->id,
                        'active' => 1,
                    ]);
                }
            }
        }
    }
    public function checkLogin()
    {
        $url =  url()->previous();

        $urlNoQuery = explode('?', $url)[0] . '?step=1';
        if (!Auth::check()) {
            session()->put('urlBack', $urlNoQuery);
            return redirect()->route('login');
        } else {
            return redirect($urlNoQuery);
        }
    }
    // danh sách product theo category
    public function productByCategory($slug, Request $request)
    {
        // dd(route('product.index',['category'=>$request->category]));
        $breadcrumbs = [];
        // get category
        $category = $this->category->where([
            ['slug', $slug],
        ])->first();
        if ($category) {
            if ($category->count()) {

                $categoryId = $category->id;
                if ($request->ajax()) {
                    return $this->filter($category, $request);
                }
                $listIdChildren = $this->category->getALlCategoryChildrenAndSelf($categoryId);

                $data =  $this->product
                    ->whereIn('category_id', $listIdChildren)->latest()->paginate($this->limitProduct);
                $listIdParent = $this->category->getALlCategoryParentAndSelf($categoryId);
                foreach ($listIdParent as $parent) {
                    $breadcrumbs[] = $this->category->select('id', 'name', 'slug')->find($parent)->toArray();
                }
                $categoryProductHome=$this->category->find(78);
                $catepost = news::find(34);
                $catepost2 = news::find(33);
                // $supplier = $this->supplier->where('active', 1)->get();


                return view('page.product-by-category', [
                    'priceSearch' =>[
                        1=>[
                            'value'=>1,
                            'start'=>0,
                            'end'=>500000,
                            'name'=>'Dưới 500 nghìn'
                        ],
                        2=>[
                            'value'=>2,
                            'start'=>500000,
                            'end'=>1000000,
                            'name'=>'Từ 500 nghìn - 1 triệu'
                        ],
                        3=>[
                            'value'=>3,
                            'start'=>1000000,
                            'end'=>3000000,
                            'name'=>'Từ 1 triệu - 3 triệu'
                        ],
                        4=>[
                            'value'=>4,
                            'start'=>3000000 ,
                            'end'=>5000000,
                            'name'=>'Từ 3 triệu - 5 triệu'
                        ],
                        5=>[
                            'value'=>5,
                            'start'=>5000000 ,
                            'end'=>10000000,
                            'name'=>'Từ 5 triệu - 10 triệu'
                        ],
                        6=>[
                            'value'=>6,
                            'start'=>10000000 ,
                            'end'=>20000000,
                            'name'=>'Từ 10 triệu - 20 triệu'
                        ],
                        7=>[
                            'value'=>7,
                            'start'=>20000000 ,
                            'end'=>50000000,
                            'name'=>'Từ 20 triệu - 50 triệu'
                        ],
                        8=>[
                            'value'=>8,
                            'start'=>50000000 ,
                            'end'=>null,
                            'name'=>'Trên 50 triệu'
                        ],
                    ],
                    'categoryProductHome'=>$categoryProductHome,
                    'catepost'=>$catepost,
                    'catepost2'=>$catepost2,

                    'donvi' => $this->donvi,
                    'data' => $data,
                    'unit' => $this->unit,
                    'breadcrumbs' => $breadcrumbs,
                    'typeBreadcrumb' => 'category_products',
                    'category' => $category,
                    // 'supplier' => $supplier,
                    'seo' => [
                        'title' =>  $category->title_seo ?? "",
                        'keywords' =>  $category->keyword_seo ?? "",
                        'description' =>  $category->description_seo ?? "",
                        'image' => $category->avatar_path ?? "",
                        'abstract' =>  $category->description_seo ?? "",
                    ]
                ]);
            }
        }

        //   if($this->breadcrumbFirst){
        //       array_unshift($breadcrumbs,$this->breadcrumbFirst);
        //   }


    }
    public function loadHot($id)
    {
        $product   =  $this->product->find($id);
        $hot = $product->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $product->update([
            'hot' => $hotUpdate,
        ]);

        $product   =  $this->product->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    public function loadActive($id)
    {
        $post   =  $this->product->find($id);
        $active =$post->active;
        if($active){
            $activeUpdate=0;
        }else{
            $activeUpdate=1;
        }
        $updateResult =  $post->update([
            'active'=>$activeUpdate,
        ]);
        $post   =  $this->product->find($id);
        if( $updateResult){
            return response()->json([
                "code" => 200,
                "html"=>view('admin.components.load-change-active',['data'=>$post,'type'=>'bài viết'])->render(),
                "message" => "success"
            ], 200);
        }else{
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }

    }
    public function filter($category, $request)
    {
        $categoryId = $category->id;
        $listIdChildren = $this->category->getALlCategoryChildrenAndSelf($categoryId);
        $data =  $this->product->where('active','1');
        if ($request->has('supplier_id') && $request->input('supplier_id')) {
            $data = $data->whereIn('supplier_id', $request->input('supplier_id'));
            // dd($data->get());
        }

        if ($request->has('price') && $request->input('price')) {
            $key = $request->input('price');
            //  dd($this->priceSearch[$key]);
            $start = $this->priceSearch[$key]['start'];
            $end = $this->priceSearch[$key]['end'];
            //   dd($start);

            if ($start == 0 && $end) {
                $data = $data->where('price', '<=', $end);
            } elseif ($start && $end) {

                $data = $data->whereBetween('price', [$start, $end]);
            } elseif ($start && $end == null) {
                // dd($end);
                $data = $data->where('price', '>=', $start);
            }
            //  dd($end);
            // dd($data->get());
        }
        // dd($request->input('attribute_id'));

        // dd($data->whereIn('category_id', $listIdChildren)->get());


        if ($request->has('orderby') && $request->input('orderby')) {
            if ($request->input('orderby') == 1) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderby('price');
            } elseif ($request->input('orderby') == 2) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('price');
            } elseif ($request->input('orderby') == 3) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderby('sale');
            } elseif ($request->input('orderby') == 4) {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('price');
            } else {
                $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('price');
            }
        } else {
            $data =  $data->whereIn('category_id', $listIdChildren)->orderByDesc('created_at');
        }

        $countProduct = $data->count();

        $data = $data->latest()->paginate($this->limitProduct);

        // dd($data);
        return response()->json([
            "code" => 200,
            "html" => view('page.load-product-search', [
                'data' => $data,
                'unit' => $this->unit,
                'countProduct' => $countProduct
            ])->render(),
            "message" => "success"
        ], 200);
    }
    public function loadComment2(Request $request)
    {
        if ($request->ajax()) {
            $idProduct = $request->idProduct;
            $dataProduct = $this->product->find($idProduct);



            $data = $dataProduct->stars()->where('active', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
            dd($data);
            $html = view('frontend.components.load-comment-product', compact('data'))->render();
            return response()->json(['data' => $html]);
        }
    }
    public function rating($id, Request $request)
    {
        if ($id) {
            try {
                DB::beginTransaction();
                $title = 'Đánh giá sản phẩm';
                $dataRatingCreate = [
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'title' => $request->input('title') ?? "",
                    'star' => $request->input('rating') ?? "0",
                    'parent_id' => $request->input('parent_id') ?? "0",
                    'product_id' => $id,
                    'active' => 0,
                    'content' => $request->input('content') ?? "",
                ];

                $ratingUdate = ProductStar::create($dataRatingCreate);

                if ($request->hasFile("image")) {
                    $dataProductStarImageCreate = [];
                    foreach ($request->file('image') as $fileItem) {
                        $dataProductStarImageDetail = $this->storageTraitUploadMutiple($fileItem, "star");
                        $dataProductStarImageCreate[] = [
                            "name" => $dataProductStarImageDetail["file_name"],
                            "image_path" => $dataProductStarImageDetail["file_path"]
                        ];
                    }
                    // insert database in product_images table by createMany
                    $productImage =   $ratingUdate->images()->createMany($dataProductStarImageCreate);
                }

                DB::commit();
                return redirect()->back()->with('msg', 'Gửi đánh giá thành công');
                return response()->json([
                    "code" => 200,
                    "html" => 'Gửi đánh giá thành công',
                    "message" => "success"
                ], 200);
            } catch (\Exception $exception) {
                dd($exception);
                return redirect()->back()->with('msg', 'Gửi đánh giá không thành công');
                //throw $th;
                // DB::rollBack();
                // Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                // return response()->json([
                //    "code" => 500,
                //    'html'=>'Gửi đánh giá không thành công',
                //    "message" => "fail"
                //], 500);

            }
        }
    }
}
