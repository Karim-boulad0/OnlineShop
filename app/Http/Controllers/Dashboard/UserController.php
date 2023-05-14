<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Dashboard\UserRequest;

class UserController extends Controller
{
    use UploadTrait;
    public function index()
    {
        return view('dashboard.users.index');
    }
    // get users with yajrabox delete and edit

    public function datatable()
    {
        $data = User::where('type', 'admin');
        return   Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('users.edit', $row->id)  . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
            <button  type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('type', function ($row) {
                return $row->type == null ? __('words.not activated') : __('words.' . $row->type);
            })
            ->rawColumns(['action', 'type'])
            ->make(true);
    }


    public function create()
    {
        return view('dashboard.users.create');
    }
    public function store(UserRequest $request)
    {
        $data = $request->except('profile', 'password');
        if ($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $pathprofile = $this->UploadImage($request, 'profileUsers', 'profile');
            $data['profile'] = $pathprofile;
        }
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect()->back();
    }



    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $data = $request->except('profile', 'password');
        if ($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $pathprofile = $this->UploadImage($request, 'profileUsers', 'profile');
            $data['profile'] = $pathprofile;
        }
        $data['password'] = bcrypt($request->password);
        $user->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        return redirect()->back();
    }

    public function user()
    {
        return view('dashboard.users.user');
    }
    public function datatableUser()
    {
        $data = User::where('type', 'user');
        return   Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('users.edit', $row->id)  . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
            <button  type="button" id="deleteBtn" data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('type', function ($row) {
                return $row->type == null ? __('words.not activated') : __('words.' . $row->type);
            })
            ->rawColumns(['action', 'type'])
            ->make(true);
    }
}
