<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



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

    public function submitUserRegistration(Request $request){


        $validatedUserData = $request->validate([
            'userName' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:users',
            'telNo' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedUserData['userName'],
            'email' => $validatedUserData['Email'],
            'telephone' => $validatedUserData['telNo'],
            'password' => Hash::make($validatedUserData['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');

    }

    public function submitUserLogin(Request $request){

        $validatedCredentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'name' => $validatedCredentials['username'], // Use 'name' column for username
            'password' => $validatedCredentials['password'],
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
