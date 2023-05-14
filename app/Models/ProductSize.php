<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'size'];


    public function colorSizes()
    {
        return $this->hasMany(ProductColorSize::class);
    }


































    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(
    //         function ($customer) {
    //             // قم بإضافة سجل جديد إلى جدول orders
    //             for ($i = 1; $i <= 10; $i++) {
    //                 $order = new Admin();
    //                 $order->name = Str::random(10);
    //                 $order->save();
    //             }
    //         }
    //     );
    // }
}
