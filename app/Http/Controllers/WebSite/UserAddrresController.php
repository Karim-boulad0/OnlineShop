<?php

namespace App\Http\Controllers\website;

use App\Models\Cart;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAddrresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(count(auth()->user()->userAddresses)>=1){
        $useraddress = auth()->user()->userAddresses;
        $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();

        if (auth()->user()) {
            return view('newwebsite.useraddresses.index', compact('useraddress','cartCount'));
        }}else{
            return redirect()->route('useraddresse.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $useraddress = auth()->user()->userAddresses;
        $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();

        if (auth()->user()) {
            return view('newwebsite.useraddresses.create',compact('cartCount'));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $data = $request->except('user_id');
        $data['user_id'] = $user_id;
        $userAddress = UserAddress::create($data);
        return redirect()->route('useraddresse.index');
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
        $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        $useraddress =  UserAddress::find($id)->first();
        return view('newwebsite.useraddresses.edit', compact('useraddress','cartCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $useraddress =  UserAddress::find($id);
        $useraddress->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserAddress::find($id)->delete();
        return redirect()->back();
    }
}
