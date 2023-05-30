<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    use HasFactory;

    protected $table = 'carts_products';

    protected $fillable = [
        'cart_id',
        'product_id',
        'count',
    ];


    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
}
