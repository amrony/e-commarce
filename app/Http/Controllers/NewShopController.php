<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class NewShopController extends Controller
{
    public function index(){

        $newProducts = Product::where('publication_status', 1)
                        ->latest()
                        ->take(8)
                        ->get();

        return view('front-end.home.home', compact('newProducts'));
    }
    public function categoryProduct($id){
        $products = Product::where('category_id', $id)
            ->where('publication_status', 1)
            ->get();
        //dd($product);
        return view('front-end.category.category-content', compact('products'));
    }

    public function productDetails($id){
        $product = Product::find($id);
        $relatedProducts = Product::where('publication_status', 1)
                ->latest()
                ->take(8)
                ->get();
        //dd($relatedProduct);
        return view('front-end.product.product-details', compact('product','relatedProducts'));
    }




    public function mail(){
        return view('front-end.mail.mail');
    }

}
