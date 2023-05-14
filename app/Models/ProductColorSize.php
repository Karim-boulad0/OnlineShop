<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','descr','name', 'product_size_id', 'product_color_id', 'quantity', 'price', 'discount', 'status', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
