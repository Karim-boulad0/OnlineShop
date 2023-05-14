<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Dashboard\CategoryStoreRequest;
use App\Http\Requests\Dashboard\CategoryDeleteRequest;
use App\Http\Requests\Dashboard\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        // $maincategories = (new CategoryService)->getmaincaregories(); // 1ere bdun chi
        $maincategories = $this->categoryService->getmaincaregories(); // 2eme ma3 construct
        return view('dashboard.categories.index', compact('maincategories'));
    }

    public function getall()
    {
        return $this->categoryService->datatable();
    }

    public function store(CategoryStoreRequest $request)
    {
        $this->categoryService->store($request->validated());
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $category = $this->categoryService->getbyid($id, true);
        $maincategories = $this->categoryService->getmaincaregories();
        return view('dashboard.categories.edit', compact('category', 'maincategories'));
    }

    public function update($id, CategoryUpdateRequest $request)
    {
        $this->categoryService->update($id, $request->validated());
        return redirect()->back();
    }

    public function delete(CategoryDeleteRequest $request)
    {
        Category::find($request->id)->delete();
        return redirect()->back();
    }
}
