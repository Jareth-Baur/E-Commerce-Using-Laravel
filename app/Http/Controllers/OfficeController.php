<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class OfficeController extends Controller
{
    // Method to list all offices with AJAX
    public function list(Request $request)
    {
        if ($request->ajax()) {
            // Fetch offices from the database with the specified columns
            $data = DB::table('offices')->select(
                'officeCode',
                'city',
                'phone',
                'addressLine1',
                'addressLine2',
                'state',
                'country',
                'postalCode',
                'territory'
            )
                ->selectRaw("CONCAT(addressLine1, ' ', addressLine2, ', ', state, ', ', country) AS fullAddress");

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '<a href="/office/' . $row->officeCode . '" class="btn btn-primary btn-sm">View</a>';
                })
                ->make(true);
        }

        // If not an AJAX request, return the view
        return view('offices.list');
    }

    public function details(Request $request, $code)
    {
        $data = DB::table('offices')->where('officeCode', $code)->first();

        return view('offices.details', ['office' => $data]);
    }
}
