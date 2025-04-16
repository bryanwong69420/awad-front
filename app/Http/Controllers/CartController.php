<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Product;

class CartController extends Controller
{
    public function addItemToCartSession(Request $request)
    {
        $product = Product::find($request->id);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        
        // Get current cart items or initialize empty array
        $cartItems = session()->get('cart.items', []);
        
        if (isset($cartItems[$request->id])) {
            // Update existing item
            $cartItems[$request->id]['quantity'] += $request->quantity ?? 1;
        } else {
            // Add new item
            $cartItems[$request->id] = [
                'imageUrl' => $product->image_url,
                'productName' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity ?? 1
            ];
        }

        
        // Save updated cart items back to session
        session()->put('cart.items', $cartItems);

        return redirect()->route('showCartPage')->with('success', 'Test products added to cart');

    }
    
    public function removeItemFromCartSession(Request $request)
    {
        // Get current cart items
        $cartItems = session()->get('cart.items', []);
        
        // Remove item if it exists
        if (isset($cartItems[$request->id])) {
            unset($cartItems[$request->id]);
            
            // Update session with modified cart
            session()->put('cart.items', $cartItems);
            
            return redirect()->back()->with('success', 'Item removed from cart');
        }
        
        return redirect()->back()->with('error', 'Item not found in cart');
    }
    
    public function showCartPage()
    {
        // Get cart items from session
        $cartItems = session()->get('cart.items', []);
        
        return view('cart', compact('cartItems'));
    }
    
    public function updateCartItemQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cartItems = session()->get('cart.items', []);
        
        if (isset($cartItems[$request->id])) {
            $cartItems[$request->id]['quantity'] = $request->quantity;
            session()->put('cart.items', $cartItems);
            
            return redirect()->back()->with('success', 'Cart updated');
        }
        
        return redirect()->back()->with('error', 'Item not found in cart');
    }

    public function buyItemsfromCart(){
        $cartItems = session()->get('cart.items', []);

        foreach($cartItems as $cartItem){
            Product::update([

            ]);
        };
        
        return;
    }
}
