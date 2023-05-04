<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $primaryKey='id';
    protected $guarded=[];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function address(){
        return $this->belongsTo(Address::class, 'address', 'address');
    }

    public function partner(){
        return $this->belongsTo(User::class,'partner_id','id');
    }
}
