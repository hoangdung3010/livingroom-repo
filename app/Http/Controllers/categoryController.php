<?php

namespace App\Http\Controllers;
use App\Traits\StorageImageTrait;
use App\Models\Category;
use App\Traits\DeleteRecordTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class categoryController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(Request $request)
    {
        $parentBr = null;
        if ($request->has('parent_id')) {
            $data = $this->category->where('parent_id', $request->input('parent_id'))->orderby('order')->orderBy("created_at", "desc")->paginate(15);
            if ($request->input('parent_id')) {
                $parentBr = $this->category->find($request->input('parent_id'));
            }
        } else {
            $data = $this->category->where('parent_id', 0)->orderby('order')->orderBy("created_at", "desc")->paginate(15);
        }

        //  dd(config('excel_database.category_product.title'));
        //  dd( view(
        //      "admin.pages.categoryproduct.list",
        //      [
        //          'data' => $data
        //      ]
        //  )->renderSections()['content']);
        return view("admin.category.test",
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
            $htmlselect = Category::getHtmlOptionAddWithParent($request->parent_id);
        } else {
            $htmlselect = $this->category->getHtmlOption();
        }

        return view("admin.category.create",
            [
                'option' => $htmlselect,
                'request' => $request
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
            $dataCategoryProductCreate = [
                "name" =>  $request->name,
                "slug" =>  $request->slug,
                "description" => $request->input('description'),
                "description_seo" => $request->input('description_seo'),
                "title_seo" => $request->input('title_seo'),
                "keyword_seo" => $request->input('keyword_seo'),
                "ghichu" => $request->input('ghichu'),
                'order'=>$request->input('order'),
                "active" => $request->active,
                "parent_id" => $request->parentId,
                // "admin_id" => auth()->guard('admin')->id()??''
            ];
            $dataUploadIcon = $this->storageTraitUpload($request, "icon_path", "category-product");
            if (!empty($dataUploadIcon)) {
                $dataCategoryProductCreate["icon_path"] = $dataUploadIcon["file_path"];
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "category-product");
            if (!empty($dataUploadAvatar)) {
                $dataCategoryProductCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            $this->category->create($dataCategoryProductCreate);

            DB::commit();
            return redirect()->route("admin.categoryproduct.index", ['parent_id' => $request->parentId])->with("alert", "Thêm danh mục sản phẩm thành công");
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categoryproduct.index', ['parent_id' => $request->parentId])->with("error", "Thêm danh mục sản phẩm không thành công");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->category->find($id);
        $parentId = $data->parent_id;
        $htmlselect = Category::getHtmlOptionEdit($parentId, $id);
        return view("admin.category.edit", [
            'option' => $htmlselect,
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
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
                "ghichu" => $request->input('ghichu'),
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
            $this->category->find($id)->update($dataCategoryProductUpdate);

            DB::commit();
            return redirect()->route("admin.categoryproduct.index", ['parent_id' => $request->parentId])->with("alert", "Sửa sản phẩm thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.categoryproduct.index', ['parent_id' => $request->parentId])->with("error", "Sửa bài viết không thành công");
        }
    }
    public function destroy($id)
    {
        return $this->deleteCategoryRecusiveTrait($this->category, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Category $category)
    // {
    //     $category->update($request->only('categoryname','ghichu'));
    //     return redirect()->route('category.index')->with('success','sửa thành công');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Category $category)
    // {
    //         $category -> delete();
    //     return redirect()->route('category.index')->with('success','xóa thành công');


    // }
}
