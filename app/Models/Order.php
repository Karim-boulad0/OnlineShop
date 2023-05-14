<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id','is_approve','note','Result', 'status', 'quantity', 'user_id', 'product_color_size_id', 'price', 'discount', 'cart_id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function productColorSize()
    {
        return $this->belongsTo(ProductColorSize::class, 'product_color_size_id');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
