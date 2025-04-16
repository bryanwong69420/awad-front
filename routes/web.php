<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Product*/
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/brand/{company}', [ProductController::class, 'filterByCompany'])->name('products.byCompany');


/*Register*/
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register/submit', [UserController::class,'submitUserRegistration'])->name('submitUserRegistration');

/*Login*/
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login/submit', [UserController::class, 'submitUserLogin'])->name('submitUserLogin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/*Contact*/
Route::get('/contact',[ContactController::class, 'showContact'])->name('contact');

/*Admin Dashboard*/
Route::middleware(['admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'showDashboard'])->name('admin');
    Route::get('/adminFeedback', [AdminController::class, 'feedbackList'])->name('adminFeedback');
    Route::get('/adminFeedbackView', [AdminController::class, 'viewFeedback'])->name('adminFeedbackView');
    Route::post('/admin-delete-product', [AdminController::class, 'deleteSelectedProduct'])->name('adminDeleteSelectedProduct');
    Route::post('/admin-update-product', [AdminController:: class, 'updateSelectedProduct'])->name('adminUpdateSelectedProduct');
    Route::post('/adminAddProduct/submit', [AdminController::class, 'storeProduct'])->name('adminStoreProduct');
    Route::get('/adminProductView', [AdminController::class, 'showSelectedProducts'])->name('adminProductView');
    Route::get('/adminAddProduct', [AdminController::class, 'showAddProductPage'])->name('adminAddProduct');
});

/*Cart Page*/
Route::middleware(['inSession'])->group(function(){
    Route::get('/cart', [CartController::class, 'showCartPage'])->name('showCartPage');
    Route::get('/add-item-to-cart-session', [CartController::class, 'addItemToCartSession'])->name('addItemToCartSession');
    Route::get('/remove-item-from-cart-session', [CartController::class, 'removeItemFromCartSession'])->name('removeItemFromCartSession');
    Route::get('/update-item-quantity', [CartController::class, 'updateCartItemQuantity'])->name('updateCartItemQuantity');
    
    // Add these to your routes file for testing
    /*
    // Test route for updating item quantity
    Route::get('/test-update-quantity', function() {
        // Get current cart items
        $cartItems = session()->get('cart.items', []);
        
        // Make sure there's an item to update (let's say product ID 1)
        if (isset($cartItems[1])) {
            // Update quantity to 5
            $cartItems[1]['quantity'] = 5;
            session()->put('cart.items', $cartItems);
            return redirect()->route('showCartPage')->with('success', 'Test item quantity updated to 5');
        }
        
        return redirect()->route('showCartPage')->with('error', 'No item with ID 1 in cart to update');
    });

    // Test route for removing an item
    Route::get('/test-remove-item/{id?}', function($id = 1) {
        // Get current cart items
        $cartItems = session()->get('cart.items', []);
        
        // Remove the specified item if it exists
        if (isset($cartItems[$id])) {
            unset($cartItems[$id]);
            session()->put('cart.items', $cartItems);
            return redirect()->route('showCartPage')->with('success', "Test item $id removed from cart");
        }
        
        return redirect()->route('showCartPage')->with('error', "No item with ID $id in cart to remove");
    });

    // Comprehensive test route that does all operations
    Route::get('/test-cart-all', function() {
        // Clear existing cart
        session()->forget('cart.items');
        
        // Add sample products
        $cartItems = [];
        
        // Sample product 1
        $cartItems[1] = [
            'imageUrl' => 'path/to/image1.jpg',
            'productName' => 'Test Product 1',
            'price' => 19.99,
            'quantity' => 2
        ];
        
        // Sample product 2
        $cartItems[2] = [
            'imageUrl' => 'path/to/image2.jpg',
            'productName' => 'Test Product 2',
            'price' => 29.99,
            'quantity' => 1
        ];
        
        // Sample product 3
        $cartItems[3] = [
            'imageUrl' => 'path/to/image3.jpg',
            'productName' => 'Test Product 3',
            'price' => 39.99,
            'quantity' => 3
        ];
        
        session()->put('cart.items', $cartItems);
        
        return redirect()->route('showCartPage')->with('success', 'Test cart created with 3 products');
    });
    // Add this to your routes file for testing only
    Route::get('/test-cart', function() {
        // Simulate adding products
        $cartItems = session()->get('cart.items', []);
        
        // Sample product 1
        $cartItems[1] = [
            'imageUrl' => 'path/to/image1.jpg',
            'productName' => 'Test Product 1',
            'price' => 19.99,
            'quantity' => 2
        ];
        
        // Sample product 2
        $cartItems[2] = [
            'imageUrl' => 'path/to/image2.jpg',
            'productName' => 'Test Product 2',
            'price' => 29.99,
            'quantity' => 1
        ];
        
        session()->put('cart.items', $cartItems);
        
        return redirect()->route('showCartPage')->with('success', 'Test products added to cart');
    });

    Route::get('/test-real-cart', function() {
        // Simulate adding products
        $product_id = 2;
        $product = Product::find($product_id);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        
        // Get current cart items or initialize empty array
        $cartItems = session()->get('cart.items', []);
        
        if (isset($cartItems[$product_id])) {
            // Update existing item
            $cartItems[$product_id]['quantity'] += $request->quantity ?? 1;
        } else {
            // Add new item
            $cartItems[$product_id] = [
                'imageUrl' => $product->image_url,
                'productName' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity ?? 1
            ];
        }

        
        // Save updated cart items back to session
        session()->put('cart.items', $cartItems);
        
        return redirect()->route('showCartPage')->with('success', 'Test products added to cart');

    });
    */
});
