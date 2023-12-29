<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category page
    public function  page()
    {
        return view('admin.category');
    }

    //category create
    public function create(Request $request)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);
        Category::create($data);
        return back()->with(['success' => 'Your category creating is success!']);
    }
    //category list
    public function list()
    {
        $data = Category::paginate(1);
        return view('admin.categoryList', compact('data'));
    }
    //category edit
    public function edit($id)
    {
        $data = Category::where('id', $id)->first();
        return view('admin.categoryEdit', compact('data'));
    }
    //category update
    public function update($id, Request $request)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);
        Category::where('id', $id)->update($data);
        return redirect()->route('category.list')->with(['success' => 'Your category updating is success!']);
    }
    //category delete
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return back()->with(['success' => 'Your category deleting is success!']);
    }
    //data arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->categoryName,
            'description' => $request->categoryDescription
        ];
    }

    //category validation
    private function vali($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required',
            'categoryDescription' => 'required'
        ])->validate();
    }
}
