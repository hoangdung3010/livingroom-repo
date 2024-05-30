<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Components\Recusive;
class provide extends Model
{
    use HasFactory;
    protected $fillable = ['name','provide_address','phone','category_id','slug','avatar_path','description','content','hot','description_seo','keyword_seo','title_seo'];
    protected $table = 'provide';
    public $parentId = "parent_id";
    protected $guarded = [];
    // public $fillable =['name'];

    protected $appends = ['slug_full'];
    
    public function getSlugFullAttribute()
    {
        return makeLinkPost('post', $this->attributes['id'], $this->attributes['slug']);
    }

    // get tags by relationship nhieu-nhieu by table trung gian post_tags
    // 1 post có nhiều post_tags
    // 1 tag có nhiều post_tags
    // table trung gian post_tags chứa column post_id và tag_id
    public function tags()
    {
        return $this
            ->belongsToMany(Tag::class, PostTag::class, 'post_id', 'tag_id')
            ->withTimestamps();
    }
    // get category by relationship 1 - nhieu
    // 1 category_posts có nhiều post
    // 1 post có 1 category_posts
    // use belongsTo để truy xuất ngược từ post lấy data trong table category
    public function category()
    {
        return $this->belongsTo(news::class, 'category_id', 'id');
    }

    // get category by relationship nhiều - 1
    public function getAdmin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    // get comment by relationship nhieu-nhieu by table trung gian post_comments
    // 1 post có nhiều post_comments
    // 1 tag có nhiều post_comments
    // table trung gian post_comments chứa column post_id và tag_id
    public function comments()
    {
        return $this->hasMany(PostComment::class, "post_id", "id");
    }

    public static function getHtmlOption($parentId = "")
    {
        $data = self::all();
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    public function paragraphs()
    {
        return $this
            ->hasMany(ParagraphPost::class, 'post_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(PostImage::class, "post_id", "id");
    }
}
