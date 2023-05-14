<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Dashboard\ProductDeleteRequest;
use App\Http\Requests\Dashboard\ProductStoreUpdateRequest;

class ProductController extends Controller
{
    use UploadTrait;
    public function index()
    {
        return view('dashboard.products.index');
    }

    public function datatable()
    {
        $query = Product::select('*')->with('category');

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('products.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
            <button  type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('category', function ($row) {
                return $row->category ? $row->category->name : '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(ProductStoreUpdateRequest $request)
    {
        $product = Product::create($request->except('images'));
        if ($request->has('image')) {
            $path = $this->UploadImage($request, 'products', 'image');
            $product->update([
                'image' => $path,
            ]);
        }
        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('dashboard.products.edit', compact('product', 'categories'));
    }


    public function update(ProductStoreUpdateRequest $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->except('image'));
        if ($request->has('image')) {
            $path = $this->UploadImage($request, 'products', 'image');
            $product->update([
                'image' => $path,
            ]);
        }
        return redirect()->back();
    }


    public function destroy(string $id)
    {
        //
    }
    public function delete(ProductDeleteRequest $request)
    {
        Product::find($request->id)->delete();
        return redirect()->back();
    }
}
