<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch products for each product_type
        $kitchenProducts = Product::where('product_type', 1)->inRandomOrder()->take(4)->get();
        $mobileProducts = Product::where('product_type', 2)->inRandomOrder()->take(4)->get();
        $digitalProducts = Product::where('product_type', 3)->inRandomOrder()->take(4)->get();

        // Fetch random products for the "New Release" section
        $newReleaseProducts = Product::inRandomOrder()->take(4)->get();
        $ourFeaturedProducts = Product::inRandomOrder()->take(4)->get();

        // Pass the products to the view
        return view('home', compact('kitchenProducts', 'mobileProducts', 'digitalProducts', 'newReleaseProducts', 'ourFeaturedProducts'));
    }
}
