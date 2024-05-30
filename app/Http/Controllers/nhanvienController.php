<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;

class nhanvienController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait;
    private $nhanvien;
    public function __construct(nhanvien $nhanvien)
    {
        $this->nhanvien = $nhanvien;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parentBr = null;
        if ($request->has('parent_id')) {
            $data = $this->nhanvien->where('parent_id', $request->input('parent_id'))->orderby('order')->orderBy("created_at", "desc")->paginate(15);
            if ($request->input('parent_id')) {
                $parentBr = $this->nhanvien->find($request->input('parent_id'));
            }
        } else {
            $data = $this->nhanvien->where('parent_id', 0)->orderby('order')->orderBy("created_at", "desc")->paginate(15);
        }
        return view("admin.setting.list",
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
    public function create(Request $request )
    {
        if($request->has("parent_id")){
            $htmlselect = $this->nhanvien->getHtmlOptionAddWithParent($request->parent_id);
        }else{
            $htmlselect = $this->nhanvien->getHtmlOption();
        }
        return view("admin.setting.add",
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
            $dataSettingCreate = [
                "name" => $request->input('name'),
                "value" => $request->input('value'),
                "slug" => $request->input('slug'),
                "parent_id" => $request->input('parentId'),
                "description" => $request->input('description'),
                "active" => $request->input('active'),
                // "admin_id" => auth()->guard('admin')->id()
            ];

            $dataUploadImage = $this->storageTraitUpload($request, "image_path", "setting");
            if (!empty($dataUploadImage)) {
                $dataSettingCreate["image_path"] = $dataUploadImage["file_path"];
            }
            // insert database in setting table
            $this->nhanvien->create($dataSettingCreate);
            DB::commit();
            return redirect()->route('admin.setting.index',['parent_id'=>$request->parentId])->with("alert", "Thêm setting thành công");
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.setting.index',['parent_id'=>$request->parentId])->with("error", "Thêm setting không thành công");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show(nhanvien $nhanvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->nhanvien->find($id);
        $parentId = $data->parent_id;
        $htmlselect = nhanvien::getHtmlOptionEdit($parentId, $id);
        return view("admin.setting.edit", [
            'option' => $htmlselect,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataSettingUpdate = [
                "name" => $request->input('name'),
                "value" => $request->input('value'),
                "slug" => $request->input('slug'),
                "description" => $request->input('description'),
                "active" => $request->input('active'),
                'parent_id' => $request->input('parentId')
            ];

            $dataUploadImage = $this->storageTraitUpload($request, "image_path", "setting");
            if (!empty($dataUploadImage)) {
                $dataSettingUpdate["image_path"] = $dataUploadImage["file_path"];
            }
            $this->nhanvien->find($id)->update($dataSettingUpdate);

            DB::commit();
            return redirect()->route('admin.setting.index',['parent_id'=>$request->parentId])->with("alert", "Sửa setting thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.setting.index',['parent_id'=>$request->parentId])->with("error", "Sửa setting thành công");
        }
    }
    public function destroy($id)
    {
        return $this->deleteCategoryRecusiveTrait($this->nhanvien, $id);
    }
}
