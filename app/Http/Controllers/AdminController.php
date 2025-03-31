<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin');
    }

    //just for example
    // Show list of feedbacks
    public function feedbackList()
    {
        $feedbacks = [
            'f01' => ['customerName' => 'Bryan', 'email' => 'bryan@abc.com', 'message' => 'I have a problem when using the website where whenever i want to go to the washing machine section, i cannot enter', 'submitDate' => '12 June 2023', 'isRead' => false],
            'fo2' => ['customerName' => 'Wei Chang', 'email' => 'weichang@abcd.com', 'message' => 'Hello there', 'submitDate' => '2 March 2024', 'isRead' => true]
        ];
        return view('adminFeedback', compact('feedbacks'));
    }

    public function viewFeedback(Request $request)
    {
        $feedbacks = [
            'f01' => ['customerName' => 'Bryan', 'email' => 'bryan@abc.com', 'message' => 'I have a problem when using the website where whenever i want to go to the washing machine section, i cannot enter', 'submitDate' => '12 June 2023', 'isRead' => false],
            'fo2' => ['customerName' => 'Wei Chang', 'email' => 'weichang@abcd.com', 'message' => 'Hello there', 'submitDate' => '2 March 2024', 'isRead' => true]
        ];

        // Get the ID from the URL query string
        $id = $request->query('id');

        // Check if the requested ID exists in the feedback array
        if (array_key_exists($id, $feedbacks)) {
            return view('adminFeedbackView', ['feedback' => $feedbacks[$id]]);
        } else {
            return redirect('/adminFeedback')->with('error', 'Feedback not found.');
        }
    }

    public function showSelectedProducts(Request $request)
    {
        $products = [
            'i15p' => [
                'productName' => 'Iphone 15', 
                'productDescription' => 'This is the iphone 15th generation, it has the new function of its sidebar as camera zooming function', 
                'quantity' => 100, 
                'price' => 3600.99,
                'image' =>'/pic/mobile/i15p.webp'
            ],
            
            'pods' => [
                'productName' => 'Apple Pods', 
                'productDescription' => "This is a bluetooth wireless pods which is only for Apple users", 
                'quantity' => 100, 
                'price' => 100.45,
                'image' => '/pic/digital/pods.webp'
            ]
        ];
        
        // Get the ID from the URL query string
        $id = $request->query('id');

        // Check if the requested ID exists in the feedback array
        if (array_key_exists($id, $products)) {
            return view('adminProductView', ['product' => $products[$id], 'id' => $id]);
        } else {
            return redirect('/admin')->with('error', 'Product not found.');
        }
    }

    public function showAddProductPage()
    {
        return view('adminAddProduct');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:products',
            'productName' => 'required|string|max:255',
            'productDescription' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        // Store the uploaded image
        $imagePath = $request->file('image')->store('product_images', 'public');

        // Store product in database (if using a database)
        Product::create([
            'id' => $request->id,
            'productName' => $request->productName,
            'productDescription' => $request->productDescription,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        // Check if the product ID already exists
        if (Product::where('id', $request->id)->exists()) {
            return redirect()->back()->with('error', 'Product ID already exists.');
        } else {
            // Redirect back to admin dashboard with success message
            return redirect('/admin')->with('success', 'Product added successfully!');
        }
        
    }

}

    