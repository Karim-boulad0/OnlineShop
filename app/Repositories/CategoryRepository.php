<?php

namespace App\Repositories;

use App\Repositories;
use App\Models\Category;

class CategoryRepository
{
    public $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getmaincaregories()
    {
        return Category::where('parent_id', 0)->orWhere('parent_id', null)->get();
    }

    public function store($params)
    {
        return $this->category->create($params);
    }
}
