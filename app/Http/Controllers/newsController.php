<?php

namespace App\Http\Controllers;
use App\Traits\DeleteRecordTrait;
use App\Traits\StorageImageTrait;
use App\Models\news;
use App\Models\provide;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class newsController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $news;
    private $provide;
    public function __construct(news $news, provide $provide)
    {
        $this->news = $news;
        $this->provide = $provide;
    }
    public function index(Request $request)
    {
        $parentBr = null;
        if ($request->has('parent_id')) {
            $data = $this->news->where('parent_id', $request->input('parent_id'))->orderby('order')->orderBy("created_at", "desc")->paginate(15);
            if ($request->input('parent_id')) {
                $parentBr = $this->news->find($request->input('parent_id'));
            }
        } else {
            $data = $this->news->where('parent_id', 0)->orderby('order')->orderBy("created_at", "desc")->paginate(15);
        }
        return view("admin.news.index",
            [
                'data' => $data,
                'parentBr' => $parentBr,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has("parent_id")) {
            $htmlselect = news::getHtmlOptionAddWithParent($request->parent_id);
        } else {
            $htmlselect = $this->news->getHtmlOption();
        }

        return view("admin.news.create",
            [
                'option' => $htmlselect,
                'request' => $request,
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
            $dataCategoryPostCreate = [
                "name" =>  $request->name,
                "slug" =>  $request->slug,
                "description" => $request->input('description'),
                "description_seo" => $request->input('description_seo'),
                "title_seo" => $request->input('title_seo'),
                "keyword_seo" => $request->input('keyword_seo'),
                "noidung" => $request->input('noidung'),
                'order'=>$request->input('order'),
                "active" => $request->active,
                "parent_id" => $request->parentId,
                // "admin_id" => auth()->guard('admin')->id()??''
            ];
            $dataUploadIcon = $this->storageTraitUpload($request, "icon_path", "category-product");
            if (!empty($dataUploadIcon)) {
                $dataCategoryPostCreate["icon_path"] = $dataUploadIcon["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "category-product");
            if (!empty($dataUploadAvatar)) {
                $dataCategoryPostCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $this->news->create($dataCategoryPostCreate);

            DB::commit();
            return redirect()->route("admin.categorypost.index", ['parent_id' => $request->parentId])->with("alert", "Thêm danh mục sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categorypost.index', ['parent_id' => $request->parentId])->with("error", "Thêm danh mục sản phẩm không thành công");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->news->find($id);
        $parentId = $data->parent_id;
        $htmlselect = news::getHtmlOptionEdit($parentId, $id);
        return view("admin.news.edit", [
            'option' => $htmlselect,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $dataCategoryProductUpdate = [
                "name" =>  $request->name,
                "slug" =>  $request->slug,
                "description" => $request->input('description'),
                "description_seo" => $request->input('description_seo'),
                "title_seo" => $request->input('title_seo'),
                "keyword_seo" => $request->input('keyword_seo'),
                "noidung" => $request->input('noidung'),
                "active" => $request->active,
                'order'=>$request->input('order'),
                "parent_id" => $request->parentId,
                // "admin_id" => auth()->guard('admin')->id()
            ];

            $dataUpdateIcon = $this->storageTraitUpload($request, "icon_path", "category-product");
            if (!empty($dataUpdateIcon)) {
                $dataCategoryProductUpdate["icon_path"] = $dataUpdateIcon["file_path"];
            }
            $dataUpdateAvatar = $this->storageTraitUpload($request, "avatar_path", "category-product");
            if (!empty($dataUpdateAvatar)) {
                $dataCategoryProductUpdate["avatar_path"] = $dataUpdateAvatar["file_path"];
            }
            $this->news->find($id)->update($dataCategoryProductUpdate);

            DB::commit();
            return redirect()->route("admin.categorypost.index", ['parent_id' => $request->parentId])->with("alert", "Sửa sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categorypost.index', ['parent_id' => $request->parentId])->with("error", "Sửa bài viết không thành công");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->deleteCategoryRecusiveTrait($this->news, $id);
    }
    public function detail($slug)
    {
        $breadcrumbs = [];
        $data = [];
        $data = $this->provide->where([
            ["slug", $slug],
            ["active", 1],
        ])->firstOrFail();

        $categoryId = $data->category_id;
        // $this->countView->countView($this->post, 'view', 'post', $data->id);

        //  dd($data);
        //  $listIdChildren = $this->categoryPost->getALlCategoryChildrenAndSelf($categoryId);
        $dataRelate =  $this->provide->where('category_id', $categoryId)->where([
            ["id", "<>", $data->id],
        ])->where('active',1)->latest()->limit(10)->get();
        $listIdParent = $this->news->getALlCategoryParentAndSelf($categoryId);

        foreach ($listIdParent as $parent) {
            $breadcrumbs[] = $this->news->select('id', 'name', 'slug')->find($parent)->toArray();
        }
        // $posts= $category->posts()->where('active',1)->latest()->paginate($this->limitTourRelate);

        // $postsHot= $this->post->withCount(['comments'=>function($query){
        //     return $query->where('active',1);
        // }])->where('active',1)->whereIn('category_id', $listIdParent)->where('hot', 1)->orderByDesc('created_at')->limit(20)->get();

        // $postsNew= $this->post->withCount(['comments'=>function($query){
        //     return $query->where('active',1);
        // }])->where('active',1)->whereIn('category_id', $listIdParent)->orderByDesc('created_at')->limit(20)->get();
        $catepost = $this->news->find(34);
        $catepost2 = $this->news->find(33);
        $categoryProductHome= category::find(78);
        return view('page.post-detail', [
            'data' => $data,
            'catepost'=>$catepost,
            'catepost2'=>$catepost2,
            'categoryProductHome'=> $categoryProductHome,
            // 'postsHot' => $postsHot,
            // 'postsNew' => $postsNew,
            "dataRelate" => $dataRelate,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'category_posts',
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



    // danh sách product theo category
    public function postByCategory($slug)
    {
        $category = $this->news->where([
            ["slug", $slug],
            ["active", 1],
        ])->firstOrFail();

        return $this->handleCategory($category);
    }

    public function handleCategory($category)
    {
        $categoryId = $category->id;
        $listIdChildren = $this->news->getALlCategoryChildrenAndSelf($categoryId);

        $data =  $this->provide->whereIn('category_id', $listIdChildren)->where('active',1)->latest()->paginate(10);
        $listIdParent = $this->news->getALlCategoryParentAndSelf($categoryId);
        foreach ($listIdParent as $key => $parent) {
            $breadcrumbs[] = $this->news->select('id', 'name', 'slug')->find($parent)->toArray();
        }
        $catepost = $this->news->find(34);
        $catepost2 = $this->news->find(33);
        $categoryProductHome= category::find(78);
        // $categoryChild = $this->news->withCount('provide')->where('parent_id', $this->idCategoryPostRoot)
        //     ->where('active',1)->orderby('order')->latest()->get();
        // $sliders = $this->slider->where([
        //     ['active', 1],
        //     ['category_id', 4],
        // ])->orderby('order')->latest()->get();
        // $contentPost = $this->setting->where('active', 1)->find(193);
        // $chatluong = $this->setting->where('active', 1)->find(192);

        // $posts = $category->posts()->where('active', 1)->latest()->paginate(10);
        return view('page.post-by-category', [
            'data' => $data,
            'catepost'=>$catepost,
            'catepost2'=>$catepost2,
            'categoryProductHome'=> $categoryProductHome,
            // 'posts' => $posts,
            // 'unit' => $this->unit,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'category_posts',
            'category' => $category,
            // 'sliders' => $sliders,
            // 'chatluong' => $chatluong,
            // // 'categoryChild' => $categoryChild,
            // 'contentPost' => $contentPost,
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
