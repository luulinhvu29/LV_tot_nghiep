<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;

    protected $table='wards';
    protected $primaryKey='id';
    protected $guarded=[];

    public function addresses(){
        return $this->hasMany(Address::class,'ward_id','id');
    }

    public function district(){
        return $this->belongsTo(Districts::class,'district_id','id');
    }
}
