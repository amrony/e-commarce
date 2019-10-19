<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catagory;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands
        ]);
   }

    public function saveProduct(Request $request){
        $this->validate($request, [
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'product_image'=>'required',
            'product_image'=>'required',
            'publication_status'=>'required'
        ]);


        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imageUrl = $directory . $imageName;
        $productImage->move($directory, $imageName);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();

        return redirect('/product/add')->with('message', 'Product Info Save Successfully');

    }
    public function manageProduct(){
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*','categories.category_name', 'brands.brand_name')
            ->get();
        return view('admin.product.manage-product', ['products'=>$products]);

    }
    public function viewProduct($id){
        $product = Product::find($id);
        return view('admin.product.view-product', ['product'=>$product]);
    }
    public function editProduct($id){
        $product = Product::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        return view('admin.product.edit-product', [
            'product'=>$product,
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
    public function updateProduct(Request $request){
            $productImage = $request->file('product_image');
            if ($productImage) {
                $product = Product::find($request->product_id);
                unlink($product->product_image);

                $imageName = $productImage->getClientOriginalName();
                $directory = 'product-images/';
                $imageUrl = $directory . $imageName;
                $productImage->move($directory, $imageName);

            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_image = $imageUrl;
            $product->publication_status = $request->publication_status;
            $product->save();

            return redirect('/product/manage')->with('message','Product info Updated');

        }else{
            $product = Product::find($request->product_id);

            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->publication_status = $request->publication_status;
            $product->save();

            return redirect('/product/manage')->with('message','Product info Updated');
        }

    }
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();

        return redirect('/product/manage')->with('message', 'Delete Product Info Successfully');
    }
    public function unpublishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();

        return redirect('/product/manage')->with('message', 'Product Status Unpublished');
    }
    public function publishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 1 ;
        $product->save();

        return redirect('/product/manage')->with('message', 'Product Status Published');
    }

}
