<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = ['name','email','content','phone','status'];
    //List trạng thái 
    public $listStatus=[
        1=>[
            'status'=>1,
            'name'=>'Chưa xử lý',
        ],
       2=> [
            'status'=>2,
            'name'=>'Hoàn thành',
        ],
       -1=> [
            'status'=>-1,
            'name'=>'Hủy bỏ',
        ],
    ];
    // public function city()
    // {
    //     return $this->belongsTo(City::class, 'city_id', 'id');
    // }
    // public function district()
    // {
    //     return  $this->belongsTo(District::class, 'district_id', 'id');
    // }
    // public function commune()
    // {
    //     return $this->belongsTo(Commune::class, 'commune_id', 'id');
    // }
}
