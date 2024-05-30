<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Components\Recusive;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','ghichu','slug','description','parent_id','avatar_path','description_seo','keyword_seo','title_seo'];
    public $parentId = "parent_id";
    protected $table = 'category';

    //Áp dụng điều kiện tìm kiếm vào một truy vấn
    public function scopeSearch($query)
    {
    if ($key=request()->key)
     {
        $query=$query ->where('name','like','%'.$key.'%');
      //  $q=$q ->where('ghichu','like','%'.$key.'%');

     }
    // if($k=requet()->key){

   //  }
     return $query;

    }
    // Thiết lập mqh 1-n giữa Category với product
    public function product()//total
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }

    // public function parent()
    // {
    //     return $this->belongsTo(Category::class, 'parent_id');
    // }

    //Thiết lập mqh 1-n giữa Category và chính nó, trong đó mỗi category có thể có nhiều cate con
    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    //Tạo các tuỳ chọn HTML DẠNG SELECT cho việc chọn cate.
    public static function getHtmlOption($parentId = "")
    {
        $data = self::select('id','name','parent_id')->get();
        $rec = new Recusive();
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    // Tương tự như func trên nhưng loại bỏ Cate hiện tại khỏi danh sách.
    public static function getHtmlOptionEdit($parentId = "", $id)
    {
        $data = self::select('id','name','parent_id')->where('id', '<>', $id)->get();
        $rec = new Recusive();
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }

    // lấy html option có danh mục cha là $Id
    public static function getHtmlOptionAddWithParent($id)
    {

        $data = self::select('id','name','parent_id')->get();
        $parentId =$id;
        $rec = new Recusive();
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    // Lấy thông tin về các danh mục cha của một danh mục cụ thể 
    //biến đổi chúng thành một chuỗi dữ liệu để tạo breadcrumb
    public function getBreadcrumbAttribute()
    {
       $listIdParent=$this->getALlCategoryParent($this->attributes['id']);
       $allData= $this->select('id','name','slug')->find($listIdParent)->toArray();
        return $allData;
    }
    // public function getSlugFullAttribute()
    // {
    //     return makeLink('category',$this->attributes['id'],$this->attributes['slug']);
    // }



     // chỉ lấy html option có cha là id trở đi
     public static function getHtmlOptionOriginById($id,$parentId = "")
     {
         $data = self::select('id','name','parent_id')->get();
         $rec = new Recusive();
         // $prId=$this->parentId;
         return  $rec->categoryRecusive($data, $id, "parent_id", $parentId, "", "");
     }



   // get admin_id was created category_product
   public function admin()
   {
       return $this->belongsTo(Admin::class, 'admin_id', 'id');
   }
   // Mqh 1-n giữa category với product
   public function products()
   {
       return $this->hasMany(Product::class, 'category_id', 'id');
   }

   //Mqh 1-n ngược lại giữa bảng cate và chính nó
   // Mỗi danh mục có thể thuộc về danh mục cha
   public function parent()
   {
       return $this->belongsTo(Category::class, 'parent_id', 'id');
   }
   //Lấy tất cả các danh mục con của một danh mục 
   public function getALlCategoryChildren($id)
   {
       $data = self::select('id','name','parent_id')->get();
       $rec = new Recusive();
       return  $rec->categoryRecusiveAllChild($data, $id);
   }
   //Lấy tất cả các danh mục con của một danh mục và gồm cả danh mục đó
   public function getALlCategoryChildrenAndSelf($id){
       $data=self::select('id','parent_id')->get();
       $rec=new Recusive();
       $arrID=$rec->categoryRecusiveAllChild($data,$id);
       array_unshift($arrID,$id);
       return  $arrID;
   }
   //Lấy tất cả danh mục cha của một danh mục cụ thể
   //Lớp đệ quy Recusive duyệt qua tất cả các danh mục và tìm kiếm các danh mục cha của danh mục chỉ định
   public function getALlCategoryParent($id){
       $data=self::select('id','parent_id')->get();
       $rec=new Recusive();
       return  $rec->categoryRecusiveAllParent($data,$id);
   }
   //Lấy tất cả các danh mục cha của một danh mục cụ thể cùng với danh mục đó
   //Lớp đệ quy Recusive duyệt qua tất cả các danh mục và thêm chính danh mục đó vào mảng kết quả
   public function getALlCategoryParentAndSelf($id){
       $data=self::select('id','parent_id')->get();
       $rec=new Recusive();
       $arrID=$rec->categoryRecusiveAllParent($data,$id);
       array_push($arrID,$id);
       return  $arrID;
   }

   //Lấy tất cả danh mục con và chính danh mục cha cùng với các chi tiết như slug_full
   public function getALlModelCategoryChildrenAndSelf($parent,$limit=null,$data=null)
   {
       if(!$data){
           $data = self::select('id','name','slug','parent_id')->where('active',1)->orderby('order')->latest()->get();
       }
       //Lấy id của danh mục cha, nếu không thì đặt 0
       $id=optional($parent)->id??0;
       //Tạo Recusive
       $rec = new Recusive();
       //Lấy slug_full của danh mục cha
       $slug_full=optional($parent)->slug_full;
       //Chuyển đối tượng cha thành mảng và thêm slug_full
       $parent=optional($parent)->toArray();
       $parent['slug_full']=$slug_full;
       //Ánh xạ slug_full cho từng danh mục trong danh sách data
       $data->map(function($item, $key) {
           $item['slug_full']=makeLinkProduct('category', $item['id'], $item['slug']);
           return $item;
       });

       //Lấy tất cả danh mục con của danh mục cha và gắn vào mảng danh mục cha
       $parent['childs']=$rec->categoryModelRecusiveAllChild($data, $id,$limit);
      // $arrID = $rec->categoryModelRecusiveAllChild($data, $id,$limit);
      // array_unshift($arrID, $id);

      //Trả về mảng danh mục cha cùng với các danh mục con
       return  $parent;
   }
   //Lấy tất cả các danh mục con của một danh mục cụ thể
   public function getALlModelCategoryChildren($id,$limit=null,$data=null)
   {
        //Nếu không có data đầu vào, lấy tất cả các danh mục từ db
       if(!$data){
           $data = self::select('id','name','slug','parent_id')->where('active',1)->orderby('order')->latest()->get();
       }
       //Ánh xạ slug_full cho từng danh mục trong list data
       $data->map(function($item, $key) {
           $item['slug_full']=makeLinkProduct('category', $item['id'], $item['slug']);
           return $item;
       });
       //Tạo Recusive
       $rec = new Recusive();
       //Sử dụng phương thức categoryModelRecusiveAllChild của lớp Recusive để lấy all danh mục con
       return  $rec->categoryModelRecusiveAllChild($data, $id,$limit);
   }


}

