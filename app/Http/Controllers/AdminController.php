<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\CompanyAssociation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Models\UserMessage;



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
        $feedbacks = UserMessage::orderBy('submit_date', 'desc')->get();
        return view('adminFeedback', compact('feedbacks'));
    }

    public function viewFeedback(Request $request)
    {

        // Get the ID from the URL query string
        $id = $request->query('id');
        $feedback = UserMessage::find($id);

        // Check if the requested ID exists in the feedback array
        if ($feedback) {
            if (!$feedback->read_status) {
                $feedback->read_status = 1;
                $feedback->save();
            }

            return view('adminFeedbackView', compact('feedback'));
        } else {
            return redirect()->route('adminFeedback')->with('error', 'Feedback not found.');
        }
    }


    public function deleteFeedback($id)
    {
        $feedback = UserMessage::find($id);

        if ($feedback) {
            $feedback->delete();
            return redirect()->route('adminFeedback')->with('success', 'Feedback deleted successfully.');
        }

        return redirect()->route('adminFeedback')->with('error', 'Feedback not found.');
    } 

    public function showSelectedProducts(Request $request)
    {

        $productTypes = ProductType::all();
        $companies = CompanyAssociation::all();

        $validated = $request->validate([
            'productId' => 'required'
        ]);

        $product = Product::find($validated['productId']);

        if (!$product) {
            return redirect('/admin')->with('error', 'Product not found.');
        } else {
            return view('adminProductView', compact('product', 'productTypes', 'companies'));
        }

    }

    public function deleteSelectedProduct(Request $request)
    {
        ;

        if (!Gate::allows('delete-product')) {
            redirect('/admin');
        }

        $product = Product::find($request->id);

        $product->delete();

        return redirect('/admin');

    }

    public function updateSelectedProduct(Request $request)
    {

        if (!Gate::allows('update-product')) {
            redirect('/admin');
        }

        $validated = $request->validate([
            'id' => 'required',
            'productName' => 'required|string',
            'productDescription' => 'required|string',
            'price' => 'required|numeric|min:1',
            'imageUrl' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'productType' => 'required|integer',
            'companyAssociation' => 'required|integer'
        ]);

        $product = Product::find($validated['id']);
        if ($product) {
            $product->update([
                'name' => $validated['productName'],
                'description' => $validated['productDescription'],
                'price' => $validated['price'],
                'image_url' => $validated['imageUrl'],
                'quantity' => $validated['quantity'],
                'product_type' => $validated['productType'],
                'company_association' => $validated['companyAssociation']
            ]);
        }

        return redirect('/admin')->with('success', 'Product updated successfully!');
    }

    public function showAddProductPage()
    {
        $productTypes = ProductType::all();
        $companies = CompanyAssociation::all();

        return view('adminAddProduct', compact('productTypes', 'companies'));
    }

    public function storeProduct(Request $request)
    {

        if (!Gate::allows('add-product')) {
            redirect('/admin');
        }

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

