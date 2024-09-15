<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function list(){
        $data = DB::table('employees')->get();
        return view('employee.list', ['employees' => $data]);
   }
}
