<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
