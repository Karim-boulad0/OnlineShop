<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'product_color_size_id'];

    public function ProductcolorSize()
    {
        return $this->belongsTo(ProductColorSize::class);
    }
}
