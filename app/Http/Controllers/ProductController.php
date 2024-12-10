<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //product page
    public function page()
    {
        $data = Category::get();
        return view('admin.product', compact('data'));
    }
    //product create
    public function create(Request $request)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);
        if ($request->hasFile('productImage')) {
            $imageName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/product', $imageName);
            $data['image'] = $imageName;
        }
        Product::create($data);
        return back()->with(['success' => 'Your product creating is success!']);
    }
    //product list
    public function list()
    {
        $data = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', 'products.category_id')
            ->paginate(4);
        return view('admin.productList', compact('data'));
    }

    //product edit
    public function edit($id)
    {
        $productData = Product::where('id', $id)->first();
        $categoryData = Category::get();
        return view('admin.productEdit', compact('productData', 'categoryData'));
    }
    //product update
    public function update($id, Request $request)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);
        //image store
        if ($request->hasFile('productImage')) {
            $dbImage = Product::where('id', $id)->value('image');
            if ($dbImage != NULL) {
                //delete image from storage
                Storage::delete('public/product/' . $dbImage);
            }
            $imgName = uniqid() . $request->file('productImage')->getClientOriginalName();
            //store in public
            $request->file('productImage')->storeAs('public/product', $imgName);
            //store in db
            $data['image'] = $imgName;
        }
        //profile update in db
        Product::where('id', $id)->update($data);
        return back()->with(['success' => 'Your Product Has Been Updated']);
    }
    //product detail
    public function detail($id)
    {
        $data =  Product::where('products.id', $id)
            ->select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', 'products.category_id')
            ->first();
        return view('admin.productDetail', compact('data'));
    }

    //product delete
    public function delete($id)
    {
        $dbImage =    Product::where('id', $id)->value('image');
        if($dbImage != NULL)
        {
        Storage::delete('public/product/'.  $dbImage );
        }
        Product::where('id', $id)->delete();
        return back()->with(['success' => 'You choiced product Has Been Deleted']);
    }

    //private function for data arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->productName,
            'series' => $request->productSeries,
            'category_id' => $request->categoryId,
            'price' => $request->productPrice,
            'description' => $request->productDescription,
        ];
    }
    //private function for validation
    private function vali($request)
    {
        $rules = [
            'productName' => 'required',
            'productSeries' => 'required',
            'categoryId' => 'required',
            'productPrice' => 'required',
            'productDescription' => 'required',
            'productImage' => 'required |  image | mimes:jpeg,jpg,png',
        ];
        Validator::make($request->all(), $rules)->validate();
    }
}
