<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'product_id',
        'order_id'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
