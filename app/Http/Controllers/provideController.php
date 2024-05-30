<?php

namespace App\Http\Controllers;

use App\Models\provide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use App\Models\news;
class provideController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    private $post;
    private $categoryPost;
    private $htmlselect;
    private $tag;
    private $postTag;
    private $configParagraph;
    private $model;
    private $modelParagraph;
    private $postImage;
    public function __construct(
        provide $post,
        news $categoryPost

    ) {
        $this->post = $post;
        $this->categoryPost = $categoryPost;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->post;
        if ($request->input('category')) {
            $categoryPostId = $request->input('category');
            $idCategorySearch = $this->categoryPost->getALlCategoryChildren($categoryPostId);
            $idCategorySearch[] = (int)($categoryPostId);
            $data = $data->whereIn('category_id', $idCategorySearch);
            $htmlselect = $this->categoryPost->getHtmlOption($categoryPostId);
        } else {
            $htmlselect = $this->categoryPost->getHtmlOption();
        }
        $where = [];
        if ($request->input('keyword')) {
            $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');
            switch ($key) {
                case 'hot':
                    $where[] = ['hot', '=', 1];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
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
        $data = $data->paginate(15);

        return view( "admin.post.list",
            [
                'data' => $data,
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
        $htmlselect = $this->categoryPost->getHtmlOption();
        return view("admin.post.add",
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
            $dataPostCreate = [
                "name" => $request->input('name'),
                "slug" => $request->input('slug'),
                "hot" => $request->input('hot') ?? 0,
                "order" => $request->input('order') ?? 0,
                "view" => $request->input('view') ?? 0,
                "description" => $request->input('description'),
                "description_seo" => $request->input('description_seo'),
                "title_seo" => $request->input('title_seo'),
                "keyword_seo" => $request->input('keyword_seo'),
                "content" => $request->input('content'),
                "tag_h" => $request->input('tag_h'),
                "active" => $request->input('active'),
                "category_id" => $request->input('category_id'),
                // "admin_id" => auth()->guard('admin')->id()
            ];
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "post");
            if (!empty($dataUploadAvatar)) {
                $dataPostCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }
            // insert database in posts table
            $post = $this->post->create($dataPostCreate);

            // $this->storeImageMutiple($post,$request,'post');
            // $this->handleAdd($request,$post);
            // insert database to post_tags table
            if ($request->has("tags")) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                    $tag_ids[] = $tagInstance->id;
                }
                $post->tags()->attach($tag_ids);
            }
            DB::commit();
            return redirect()->route('admin.post.index')->with("alert", "Thêm bài viết thành công");
        } catch (\Exception $exception) {
            dd($exception);
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.post.index')->with("error", "Thêm bài viết không thành công");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provide  $provide
     * @return \Illuminate\Http\Response
     */
    public function show(provide $provide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provide  $provide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->post->find($id);
        $category_id = $data->category_id;
        $htmlselect = $this->categoryPost->getHtmlOption($category_id);
        return view("admin.post.edit", [
            'option' => $htmlselect,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provide  $provide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataPostUpdate = [
                "name" => $request->input('name'),
                "slug" => $request->input('slug'),
                "hot" => $request->input('hot') ?? 0,
                "order" => $request->input('order') ?? 0,
                // "view" => $request->input('view'),
                "description" => $request->input('description'),
                "description_seo" => $request->input('description_seo'),
                "title_seo" => $request->input('title_seo'),
                "keyword_seo" => $request->input('keyword_seo'),
                "content" => $request->input('content'),
                "tag_h" => $request->input('tag_h'),
                "active" => $request->input('active'),
                "category_id" => $request->input('category_id'),
                // "admin_id" => auth()->guard('admin')->id(),
            ];
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "post");
            if (!empty($dataUploadAvatar)) {
                $dataPostUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }
            // insert database in post table
            $this->post->find($id)->update($dataPostUpdate);
            $post = $this->post->find($id);
            // $this->storeImageMutiple($post,$request,'post');
            // insert database to post_tags table
            if ($request->has("tags")) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                    $tag_ids[] = $tagInstance->id;
                }
                // Các syncphương pháp chấp nhận một loạt các ID để ra trên bảng trung gian. Bất kỳ ID nào không nằm trong mảng đã cho sẽ bị xóa khỏi bảng trung gian.
                $post->tags()->sync($tag_ids);
            }
            DB::commit();
            return redirect()->route('admin.post.index')->with("alert", "sửa bài viết thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.post.index')->with("error", "Sửa bài viết không thành công");
        }
    }
    public function destroy($id)
    {
        return $this->deleteTrait($this->post, $id);
    }
    public function loadHot($id)
    {
        $product   =  $this->post->find($id);
        $hot = $product->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $product->update([
            'hot' => $hotUpdate,
        ]);

        $product   =  $this->post->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot1', ['data' => $product, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provide  $provide
     * @return \Illuminate\Http\Response
     */
}
