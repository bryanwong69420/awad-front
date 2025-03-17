<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function showProduct()
    {
        return view('product');
    }

    public function category(Request $req)
    {
        $brand = $req->query('brand'); 
        $category = $req->query('category'); 
    

        $products = Product::query();
    
        if ($brand) {
            $products->where('brand', $brand);
        }
    
        if ($category) {
            $products->where('category', $category);
        }
    
        $products = $products->get();
    
        return view('product', compact('products', 'brand', 'category'));
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }
}
