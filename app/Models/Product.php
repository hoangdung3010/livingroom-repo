<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Components\Recusive;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = ['name','slug','active','hot','category_id','product_price','tinh_trang','content','sale','product_importprice','product_img','old_price','price','model','description','description_seo','view','keyword_seo','title_seo'];
    public $parentId = "parent_id";
    protected $appends = ['price_after_sale', 'slug_full','number_pay'];
    protected $guarded = [];

    //Hàm tạo URL dựa trên loại liên kết $type và các tham số id, slug, request
    function makeLink($type, $id = null, $slug = null, $request = [])
{
    $route = "";
    switch ($type) {
        //Tạo URL cho sản phẩm theo danh mục, nếu slug không tồn tại thì đặt url là #
        case 'category_products':
            if ($slug) {
                $route = route("product.productByCategory", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        //Tạo URL cho bài viết theo danh mục, nếu slug không tồn tại thì đặt url là #
        case 'category_posts':
            if ($slug) {
                $route = route("post.postByCategory", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        //Tạo URL cho bài viết, nếu slug không tồn tại thì đặt url là #
        case 'post':
            if ($slug) {
                $route = route("post.detail", ["slug" => $slug]);
            } else {
                $route = "#";
            }
            break;
        //Tạo URL cho danh sách tất cả bài viết
        case 'post_all':
            $route = route("post.index");
            break;
        //Tạo URL cho sản phẩm dựa trên slug và id
        case 'product':
                $route = route("product.detail", ["slug" => $slug, "id" => $id]);
                break;
        //Tạo URL cho danh sách tất cả sản phẩm
        case 'product_all':
            $route = route("product.index");
            break;
        //Tạo URL cho trang chủ
        case 'home':
            $route = route("home.index");
            break;
        //Tạo URL cho trang giới thiệu
        case 'about-us':
            $route = route("about-us");
            break;
        //Tạo URL cho trang báo giá
        case 'bao-gia':
            $route = route("bao-gia");
            break;
        //Tạo URL cho trang tuyển dụng
        case 'tuyen-dung':
            $route = route("tuyen-dung");
            break;
        //Tạo URL cho trang chi tiết tuyển dụng dựa trên slug, nếu slug không tồn tại thì đặt URL là #
        case 'tuyen-dung-detail':
            if ($slug) {
                $route = route("tuyendung_link", ['slug' => $slug]);
            } else {
                $route = "#";
            }

            break;
        //Tạo URL cho trang liên hệ
        case 'contact':
            $route = route("contact.index");
            break;
        //Tạo URL cho trang tìm kiếm với các tham số tìm kiếm được truyền trong $request
        case 'search':
            $route = route("home.search", $request);
            break;
        //Nếu không thuộc case nào, tạo ra URL cho trang chủ
        default:
            $route = route("home.index");
            break;
    }
    return $route;
}
    //Hàm tính giá dựa trên thuộc tính sale, nếu có sale, giá sẽ được tính dựa trên % giá, nếu không sẽ trả giá gốc
    public function getPriceAfterSaleAttribute()
    {
        if ($this->attributes['sale']) {
            return   $this->attributes['price'] * (100 - $this->attributes['sale']) / 100;
        } else {
            return $this->attributes['price'];
        }
    }
    // tạo thêm thuộc tính slug_full
    // public function getSlugFullAttribute()
    // {
    //     return makeLink('product', $this->attributes['id'], $this->attributes['slug']);
    // }
  // tạo thêm thuộc tính slug_full
//   public function getPriceAttribute()
//   {
//     dd(transMoneyToView($this->attributes['price'],$this->attributes['donvi']));
//       return transMoneyToView($this->attributes['price'],$this->attributes['donvi']);
//   }

     // Hàm tính tổng số sản phẩm đã được thanh toán
     //Tính tổng số lượng từ bảng stores dựa trên điều kiện type và trả về tổng số lượng đó
     public function getNumberPayAttribute()
     {
       //  dd($this);
        $total=  $this->stores()->whereIn('type',[2,3])->select(\App\Models\Store::raw('SUM(quantity) as total'))->first()->total;
        if($total){
            return $total;
        }else{
            return 0;
        }

     }
    //Thiết lập mối quan hệ 1-n giữa product và productStar
     public function stars()
     {
         return $this->hasMany(ProductStar::class, 'product_id', 'id');
     }
    // get images by relationship 1-nhieu  1 product có nhiều images sử dụng hasMany
    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class, "product_id", "id");
    // }
    // get tags by relationship nhieu-nhieu by table trung gian product_tags
    // 1 product có nhiều product_tags
    // 1 tag có nhiều product_tags
    // table trung gian product_tags chứa column product_id và tag_id
    // public function tags()
    // {
    //     return $this
    //         ->belongsToMany(Tag::class, ProductTag::class, 'product_id', 'tag_id')
    //         ->withTimestamps();
    // }

    // get category by relationship 1 - nhieu
    // 1 category_products có nhiều product
    // 1 product có 1 category_products
    // use belongsTo để truy xuất ngược từ product lấy data trong table category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    //Thiết lập mqh 1-n giữa product và store, cho phép truy cập tới bản ghi liên quan trong bảng store có khoá ngoại product_Id
    //trỏ đến khoá chính id của product
    public function stores()
    {
        return $this->hasMany(Store::class, "product_id", "id");
    }

    // public function comments()
    // {
    //     return $this
    //         ->belongsToMany(Comment::class, ProductComment::class, 'product_id', 'comment_id')
    //         ->withTimestamps();
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class, "product_id", "id");
    }
    public function countComment()
    {
        return $this->hasMany(ProductComment::class, "product_id", "id")->select(ProductComment::raw('COUNT(id) as total'))->first()->total;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function district()
    {
        return  $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'id');
    }

    public function points()
    {
        return $this->hasMany(Point::class, 'userorigin_id', 'id');
    }
    //Tính tổng số sản phẩm hiện có trong store liên quan tới một sản phẩm cụ thể xác định bởi id
    public function getTotalProductStore($id){

        return $this->find($id)->stores()->select(\App\Models\Store::raw('SUM(quantity) as total'))->first()->total;
    }
    // Tính lượt click mua trong khoảng time nhất định
    public function getTotalClickBuy($start=null,$end=null){
        $result=$this->points();
        if($start){
            $result->where('points.created_at','>=',$start);
        }
        if($end){
            $result->where('points.created_at','<=',$end);
        }
        $result= $result->select(\App\Models\Point::raw('COUNT(id) as total'))->where('points.type',3)->first()->total;
        return $result;
    }

    // Thiết lập mqh 1-n giữa product và productImg
    public function images()
    {
        return $this->hasMany(ProductImage::class, "product_id", "id");
    }
    //Tạo các tuỳ chọn HTML cho 1 danh sách đệ quy, cụ thể dùng để hiển thị các tuỳ chọn trong biểu mẫu
    public static function getHtmlOption($parentId = "")
    {
        $data = self::all();
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    // public function options()
    // {
    //     return $this->hasMany(Option::class, "product_id", "id");
    // }
}
