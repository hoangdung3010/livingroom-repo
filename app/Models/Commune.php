<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //
    protected $table="communes";
    protected $guarded = [];
    //Mqh n-1 giữa commune và district
    public function district(){
      return  $this->belongsTo(District::class,'district_id','id');
    }
}
