<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProductColorSize;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Laravel\Ui\Presets\React;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function orders()
    {
        return view('dashboard.orders.orders');
    }
    public function datatable()
    {
        $query = Order::select('*')->with('productColorSize.color', 'productColorSize.size', 'user');

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('orders.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
            <button  type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })

            ->addColumn('image', function ($row) {
                return '<img src="' . asset('public/' . $row->productColorSize->image) . '" width="100px" height="100px">';
            })

            ->addColumn('size', function ($row) {
                $r = $row->productColorSize->size->size;
                return $r;
            })

            ->addColumn('color', function ($row) {
                return $row->productColorSize->color->color;
            })
            ->addColumn('user', function ($row) {
                return 'name : ' . $row->user->name . '<button href="html.html"> <a href="ht.html">' . $row->user->id . '</a></button>';
            })
            ->rawColumns(['action', 'image', 'size', 'color', 'user'])
            ->make(true);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('dashboard.orders.edit',compact('order'));
    }

    public function delete(Request $request)
    {
        Order::find($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request, string $id)
    {
         Order::find($id)->update($request->all());
        return redirect()->back();
    }
}
