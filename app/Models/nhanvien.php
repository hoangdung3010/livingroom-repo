<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Components\Recusive;
class nhanvien extends Model
{
    use HasFactory;
    protected $fillable = ['name','ghichu','slug','description','value','description','parent_id','image_path','description_seo','keyword_seo','title_seo'];
    protected $table = "nhanvien";
    protected $guarded = [];
    public $parentId = "parent_id";
    //  protected $appends = ['breadcrumb'];
    public function getBreadcrumbAttribute()
    {
        $listIdParent = $this->getALlCategoryPostParent($this->attributes['id']);
        $allData = $this->select('id', 'name', 'slug')->find($listIdParent)->toArray();
        return $allData;
    }
    public static function getHtmlOption($parentId = "")
    {
        $data = self::all();
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    public static function getHtmlOptionEdit($parentId = "", $id)
    {
        $data = self::all()->where('id', '<>', $id);
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    // lấy html option có danh mục cha là $Id
    public static function getHtmlOptionAddWithParent($id)
    {

        $data = self::all();
        $parentId = $id;
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    public function childs()
    {
        return $this->hasMany(nhanvien::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(nhanvien::class, 'parent_id', 'id');
    }

    public function getALlCategoryProductChildren($id)
    {
        $data = self::all();
        $rec = new Recusive();
        return  $rec->categoryRecusiveAllChild($data, $id);
    }
    public function getALlCategoryPostParent($id)
    {
        $data = self::select('id', 'parent_id')->get();
        $rec = new Recusive();
        return  $rec->categoryRecusiveAllParent($data, $id);
    }
}
