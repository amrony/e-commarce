<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }
    public function saveCategory(Request $request){
        $this->validate($request, [
            'category_name'=>'required',
            'category_description'=>'required'
        ]);

        $categories = new Category();
        $categories->category_name          = $request->category_name;
        $categories->category_description   = $request->category_description;
        $categories->publication_status     = $request->publication_status;
        $categories->save();

        return redirect('/category/add')->with('message', 'Category Info Save Successfully');

    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category', ['categories'=>$categories]);
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit-category', ['category'=>$category]);
    }
    public function updateCategory(Request $request){
        $this->validate($request, [
            'category_name'=>'required',
            'category_description'=>'required'
        ]);

        $category = Category::find($request->category_id);
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return redirect('/category/manage')->with('message', 'Category Info Update Successfully');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('/category/manage')->with('message', 'Category Info Delete Successfully');
    }
    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();

        return redirect('/category/manage')->with('message', 'Category Status Unpublished');
    }
    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();

        return redirect('/category/manage')->with('message', 'Category Status Published');
    }
}
