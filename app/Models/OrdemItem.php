<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrdemItem extends Model
{
    use HasFactory;
    protected $fillable =[
        "product_title",
        "quantity",
        "price"
    ];


    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
