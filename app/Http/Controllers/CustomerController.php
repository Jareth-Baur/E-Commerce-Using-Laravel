<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        // Fetch all customers from the database
        $customers = Customer::all();
        return view('customers.list', compact('customers')); // Pass customers to the view
    }
    public function listAllCustomers(Request $request){
        $data = DB::table('customers')
            ->where('customerNumber', $request->code)
            ->get();

        return view('customers.details',['customers' => $data]);
    }
}
