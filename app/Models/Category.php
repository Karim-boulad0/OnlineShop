<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'parent_id'];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}



// In this code, I brought you the main sections and secondary sections and gave you
//   The code is ready, but it is from static information. I want everything to be dynamic and not static. This is how it shows me the categories with child, and so on, as well as it is in the code.
// Modify it to enter the variable in foreach and so on   <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Category extends Model
// {
//     use HasFactory;
//     protected $fillable = ['name', 'image', 'parent_id'];
//     public function parent()
//     {
//         return $this->belongsTo(Category::class, 'parent_id');
//     }
//     public function child()
//     {
//         return $this->hasMany(Category::class, 'parent_id');
//     }



//   public function categories()
//     {
//         $categories = Category::with('child')->get();
//         return view('newwebsite.categories', compact('categories'));
//     }            <div class="col-lg-3">
//                 <h1 class="h2 pb-4">Categories</h1>
//                 <ul class="list-unstyled templatemo-accordion">
//                     <li class="pb-3">
//                         <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
//                             Gender
//                             <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
//                         </a>
//                         <ul class="collapse show list-unstyled pl-3">
//                             <li><a class="text-decoration-none" href="#">Men</a></li>
//                             <li><a class="text-decoration-none" href="#">Women</a></li>
//                         </ul>
//                     </li>
//                     <li class="pb-3">
//                         <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
//                             Sale
//                             <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
//                         </a>
//                         <ul id="collapseTwo" class="collapse list-unstyled pl-3">
//                             <li><a class="text-decoration-none" href="#">Sport</a></li>
//                             <li><a class="text-decoration-none" href="#">Luxury</a></li>
//                         </ul>
//                     </li>
//                     <li class="pb-3">
//                         <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
//                             Product
//                             <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
//                         </a>
//                         <ul id="collapseThree" class="collapse list-unstyled pl-3">
//                             <li><a class="text-decoration-none" href="#">Bag</a></li>
//                             <li><a class="text-decoration-none" href="#">Sweather</a></li>
//                             <li><a class="text-decoration-none" href="#">Sunglass</a></li>
//                         </ul>
//                     </li>
//                 </ul>
//             </div>
