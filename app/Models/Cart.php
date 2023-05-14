<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'status', 'quantity', 'user_id', 'product_color_size_id', 'price', 'discount'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function productColorSize()
    {
        return $this->belongsTo(ProductColorSize::class, 'product_color_size_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
