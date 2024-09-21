<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('customers')
                ->select('customerNumber', 'customerName', 'contactLastName', 'phone', 'city', 'country');

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '<a href="/customer/' . $row->customerNumber . '" class="btn btn-primary btn-sm">View</a>';
                })
                ->make(true);
        }

        return view('customers.list');
    }

    public function details(Request $request)
    {
        $data = DB::table('customers')
            ->where('customerNumber', $request->code)
            ->get();

        return view('customers.details', ['customers' => $data]);
    }

    public function viewOrders($customerNumber)
    {
        $data = DB::table('orderdetails as od')
            ->join('orders as o', 'o.orderNumber', '=', 'od.orderNumber')
            ->join('products as p', 'od.productCode', '=', 'p.productCode')
            ->select(
                'o.orderNumber',
                'o.orderDate',
                'o.status',
                'o.comments'
            )
            ->where('o.customerNumber', $customerNumber) // Ensure this matches your database schema
            ->get();

        if (request()->ajax()) {
            return response()->json($data);
        }

        // Pass the $orders to the view
        return view('customers.orders.list', ['customerNumber' => $customerNumber, 'orders' => $data]);
    }

}
