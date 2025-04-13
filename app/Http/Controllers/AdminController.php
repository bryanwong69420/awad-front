<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



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

        $productTypes = DB::table('product_type')->get();
        $companies = DB::table('company_association')->get();

        $validated = $request->validate([
            'productId' => 'required'
        ]);

        $product = Product::find($validated['productId']);

        if(!$product){
            return redirect('/admin')->with('error', 'Product not found.');
        }else{
             return view('adminProductView', compact('product', 'productTypes', 'companies'));
        }

    }

    public function deleteSelectedProduct(Request $request){;

        $product = Product::find($request->id);

        $product->delete();

        return redirect('/admin');

    }

    public function updateSelectedProduct(Request $request){
    
        $product = Product::find($request->id);
        if ($product) {
            $product->update([
                'name' => $request->productName,
                'description' => $request->productDescription,
                'price' => $request->price,
                'image_url' => $request->imageUrl,
                'quantity' => $request->quantity,
                'product_type' => $request->productType,
                'company_association' => $request->companyAssociation
            ]);
        }
    
        return redirect('/admin')->with('success', 'Product updated successfully!');
    }

    public function showAddProductPage()
    {
        $productTypes = DB::table('product_type')->get();
        $companies = DB::table('company_association')->get();

        return view('adminAddProduct', compact('productTypes', 'companies'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'productName' => 'required|string|max:255',
            'productDescription' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'imageLink' => 'required',
            'productType' => 'required',
            'companyAssociation' => 'required'
        ]);

        
        // Store product in database (if using a database)
        Product::create([
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->price,
            'image_url' => $request->imageLink,
            'quantity' => $request->quantity,
            'product_type' => $request->productType,
            'company_association' => $request->companyAssociation,
            'date_added' => Carbon::now()->format('Y-m-d')
        ]);

        return redirect('/admin')->with('success', 'Product added successfully!');

    }

}

    