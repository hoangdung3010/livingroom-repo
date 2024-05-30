<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Commune;
class City extends Model
{
    //
    protected $table="cities";
    protected $guarded = [];
    //Mqh 1-n giữa city và district
    public function districts(){
      return  $this->hasMany(District::class,'city_id','id');
    }
}
