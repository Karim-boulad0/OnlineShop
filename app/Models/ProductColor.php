<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'color'];
    public function colorSizes()
    {
        return $this->hasMany(ProductColorSize::class);
    }
}
