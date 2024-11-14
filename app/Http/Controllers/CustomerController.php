<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

        $customers = Customer::all();
        
        return response()->json([
            'customers' => $customers
        ],200);
    }

    public function all_customer(){

        $customers = Customer::orderBy('id','DESC')->get();
        
        return response()->json([
            'customers' => $customers
        ],200);
    }

}
