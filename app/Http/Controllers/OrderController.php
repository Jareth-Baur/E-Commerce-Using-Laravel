<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;

//composer require yajra/laravel-datatables-oracle
//php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"

class OrderController extends Controller
{
    public function list()
    {
        // Fetch only the required fields
        $data = DB::table('orderdetails as od')
            ->join('orders as o', 'o.orderNumber', '=', 'od.orderNumber')
            ->join('products as p', 'od.productCode', '=', 'p.productCode')
            ->join('customers as c', 'c.customerNumber', '=', 'o.customerNumber')
            ->select(
                'od.orderNumber', // Order Number
                'c.customerName', // Customer Name (you could concatenate first/last name if needed)
                'p.productName',  // Product Name
                'od.quantityOrdered', // Quantity Ordered
                'od.priceEach', // Price Each
                'o.orderDate'  // Date Ordered
            )
            ->get();

        // Check if the request is AJAX for DataTables
        if (request()->ajax()) {
            return DataTables::of($data)
                // Format the order date as required
                ->editColumn('orderDate', function ($row) {
                    return Carbon::parse($row->orderDate)->format('F j, Y'); // Format date as "Month Day, Year"
                })
                ->make(true);
        }

        return view('orders.list');
    }
}
