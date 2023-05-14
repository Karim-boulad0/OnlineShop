<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\ProductSize;
use App\Traits\UploadTrait;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Models\ProductColorSize;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Dashboard\ProductColorSizeStoreUpdateRequest;
use App\Models\ProductImage;

class ProductColorSizeController extends Controller
{
    use UploadTrait;

    public function index()
    {
        return view('dashboard.productcolorsize.index');
    }

    public function datatable()
    {
        $query = ProductColorSize::all();

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('productcolorsizes.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
            <button  type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $products = Product::all();
        $sizes = ProductSize::all();
        $colors = ProductColor::all();
        return view('dashboard.productcolorsize.create', compact('products', 'sizes', 'colors'));
    }


    public function store(ProductColorSizeStoreUpdateRequest $request)
    {
        $ProductColorSize = ProductColorSize::create($request->except('images', '_token', 'image'));
        if ($request->has('image')) {
            $path = $this->UploadImage($request, 'products', 'image');
            $ProductColorSize->update([
                'image' => $path,
            ]);
        }
        if ($request->has('images')) {
            $imagePaths = $this->UploadMultiImages($request, 'products', 'images');

            $images = collect($imagePaths)->map(function ($imagePath) {
                return ['image' => $imagePath ?? ''];
            });
            $ProductColorSize->images()->createMany($images);
        }


        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $productcolorsize = ProductColorSize::find($id);
        $products = Product::all();
        $sizes = ProductSize::all();
        $colors = ProductColor::all();
        $images = $productcolorsize->images;
        // dd($images);
        return view('dashboard.productcolorsize.edit', compact('images', 'productcolorsize', 'colors', 'sizes', 'products'));
    }


    public function update(ProductColorSizeStoreUpdateRequest $request, string $id)
    {
        $ProductColorSize = ProductColorSize::find($id);
        $ProductColorSize->update($request->except('images', '_token', 'image'));
        if ($request->has('image')) {
            $path = $this->UploadImage($request, 'products', 'image');
            $ProductColorSize->update([
                'image' => $path,
            ]);
        }

        if ($request->has('images')) {
            $imagePaths = $this->UploadMultiImages($request, 'products', 'images');

            $images = collect($imagePaths)->map(function ($imagePath) {
                return ['image' => $imagePath ?? ''];
            });
            $ProductColorSize->images()->createMany($images);
        }

        return redirect()->back();
    }
    public function destroy(string $id)
    {
        ProductImage::find($id)->delete();
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        ProductColorSize::find($request->id)->delete();
        return redirect()->back();
    }
}
