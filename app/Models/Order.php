<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        "first_name",
        "last_name",
        "email"
    ];

    //========================================
    public function  orderItems():HasMany
    {
        return $this->hasMany(OrdemItem::class);

    }
    //====================================

    public function getTotalAttribute()
    {
        return $this->orderItems->sum(function(OrdemItem $item){
            return $item->price*$item->quantity;
        });



    }
}
