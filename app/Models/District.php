<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commune;
use App\Models\City;
class District extends Model
{
    //
    protected $table="districts";
    protected $guarded = [];
  //Mqh 1-n
    public function communes(){
       return $this->hasMany(Commune::class,'district_id','id');
    }
  //Mqh n-1
    public function city(){
      return  $this->belongsTo(City::class,'city_id','id');
    }
}
