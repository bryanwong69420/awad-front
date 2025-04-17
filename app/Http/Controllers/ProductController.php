<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\CompanyAssociation;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Optional sorting
        if ($request->has('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->get();

        return view('product', [
            'products' => $products,
            'brand' => 'All Brands'
        ]);
    }

    public function filterByCompany(Request $request, $company)
    {
        $company = Str::upper($company);
        $companyModel = CompanyAssociation::where('company_association', $company)->firstOrFail();

        // Default query
        $query = $companyModel->products();

        // Apply sorting if requested
        if ($request->has('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->get();

        return view('/product', [
            'products' => $products,
            'brand' => $companyModel->company_association
        ]);
    }


    public function filterByType(Request $request, $type)
    {
        $sort = $request->query('sort');

        // Find type ID
        $typeModel = ProductType::where('product_type', $type)->firstOrFail();

        // Get products by type ID
        $query = Product::where('product_type', $typeModel->id);

        // Apply sorting if needed
        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->get();

        return view('product', [
            'products' => $products,
            'brand' => $typeModel->product_type, // reused as label
        ]);
    }
}
