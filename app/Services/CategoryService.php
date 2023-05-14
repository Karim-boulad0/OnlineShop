<?php

namespace App\Services;

use App\Models\Category;
use App\Traits\UploadTrait;
use App\Traits\UtilsUpload;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    use UploadTrait;

    public $categoryrepository;
    public function __construct(CategoryRepository $categoryrepository)
    {
        $this->categoryrepository = $categoryrepository;
    }

    public function getmaincaregories()
    {
        return $this->categoryrepository->getmaincaregories();
    }

    public function datatable()
    {
        $query = Category::select('*')->with('parent');
        return  DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $btn = '
                        <a href="' . route('categories.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                        <button type="button" id="deleteBtn"  data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal"
                        data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })

            ->addColumn('parent', function ($row) {
                // if ($row->parent) {// iza $row->has(parent) writer name
                //     return $row->parent->name;
                // }
                // return 'قسم رئيسي';

                return ($row->parent)  ? $row->parent->name : 'قسم رئيسي';
            })

            ->addColumn('image', function ($row) {
                return '<img src="' . asset('public/' . $row->image) . '" width="100px" height="100px">';
            })

            ->rawColumns(['parent', 'action', 'image'])
            ->make(true);
    }

    public function store($params)
    {
        $params['parent_id'] = $params['parent_id'] ?? 0;
        if (isset($params['image'])) {
            $params['image'] = $this->UploadImages($params['image'], 'CategoryImages', 'image');
        }
        return $this->categoryrepository->store($params);
    }

    public function getbyid($id, $childrenCount = false)
    {
        $query =  Category::where('id', $id);
        if ($childrenCount) {
            $query->withCount('child');
        }
        return $query->firstOrFail();
    }

    public function update($id, $params)
    {
        $category = $this->getById($id);
        $params['parent_id'] = $params['parent_id'] ?? 0;
        if (isset($params['image'])) {
            $params['image'] = $this->UploadImages($params['image'], 'CategoryImages', 'image');
        }
        return  $category->update($params);
    }
}
