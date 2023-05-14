<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'price', 'discount_price', 'category_id', 'quantite'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function colorSizes()
    {
        return $this->hasMany(ProductColorSize::class);
    }
}
