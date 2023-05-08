<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table='cities';
    protected $primaryKey='id';
    protected $guarded=[];

    public function districts(){
        return $this->hasMany(Districts::class,'city_id','id');
    }

    public function addresses(){
        return $this->hasMany(Address::class,'city_id','id');
    }
}
