<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

use function Ramsey\Uuid\v1;

class SizeController extends Controller
{
    public function index()
    {
        return view('dashboard.sizes.index');
    }

    public function datatable()
    {
        $query = ProductSize::all();

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<a href="'  . route('sizes.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
            <button  type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProductSize::create([
            'size' => $request->size
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size = ProductSize::find($id);
        return view('dashboard.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ProductSize::find($id)->update([
            'size' => $request->size
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Request $request)
    {
        ProductSize::find($request->id)->delete();
        return redirect()->back();
    }
}
