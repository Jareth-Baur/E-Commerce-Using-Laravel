<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $data = DB::table('products')->get();
        return view('products.list',['products' => $data]);
      
    }
    public function listByCode(Request $request){
        $data = DB::table('products')
                ->where('productCode', $request->code)
                ->get();

        return view('products.details',['products' => $data]);
    }
    
}
