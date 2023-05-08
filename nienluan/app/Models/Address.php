<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table='address';
    protected $primaryKey='id';
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function city(){
        return $this->belongsTo(Cities::class,'city_id','id');
    }

    public function district(){
        return $this->belongsTo(Districts::class,'district_id','id');
    }

    public function ward(){
        return $this->belongsTo(Wards::class,'ward_id','id');
    }


}
