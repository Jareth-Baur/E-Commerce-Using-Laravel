<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    // Method to list all products with AJAX
    public function list(Request $request)
    {
        if ($request->ajax()) {
            // Fetch products from the database
            $data = DB::table('products')->select(
                'productCode',
                'productName',
                'productLine',
                'productVendor',         // Added productVendor
                'quantityInStock',
                'buyPrice'               // Corrected from priceEach to buyPrice
            );

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '<a href="/product/' . $row->productCode . '" class="btn btn-primary btn-sm">View</a>';
                })
                ->make(true);
        }

        // If not an AJAX request, return the view
        return view('products.list');
    }

    // Method to get product details by code
    public function details(Request $request)
    {
        $data = DB::table('products')
            ->where('productCode', $request->code)
            ->get();

        return view('products.details', ['products' => $data]);
    }
}
