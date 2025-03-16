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
        $brand = $req->query('brand'); // 获取品牌参数
        $category = $req->query('category'); // 获取类别参数
    
        // 假设从数据库获取产品
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
}