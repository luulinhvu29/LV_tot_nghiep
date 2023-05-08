<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    protected $table='districts';
    protected $primaryKey='id';
    protected $guarded=[];

    public function city(){
        return $this->belongsTo(Cities::class,'city_id','id');
    }

    public function addresses(){
        return $this->hasMany(Address::class,'district_id','id');
    }

    public function wards(){
        return $this->hasMany(Wards::class,'district_id','id');
    }
}
