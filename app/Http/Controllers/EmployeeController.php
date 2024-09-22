<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('employees')->select(
                'employeeNumber',
                'firstName',
                'lastName',
                'email',
                'jobTitle'
            );

            return DataTables::of($data)
                ->addColumn('name', function ($row) {
                    return $row->firstName . ' ' . $row->lastName; // Concatenate first and last name
                })
                ->addColumn('action', function ($row) {
                    return '<a href="/employee/' . $row->employeeNumber . '" class="btn btn-primary btn-sm">View</a>';
                })
                ->make(true);
        }

        // If not an AJAX request, return the view
        return view('employees.list');
    }

    public function details(Request $request, $code)
    {
        $data = DB::table('employees')->where('employeeNumber', $code)->first();

        return view('employees.details', ['employee' => $data]);
    }


}
