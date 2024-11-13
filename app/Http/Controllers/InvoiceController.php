<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Invoice;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class InvoiceController extends Controller
{
    public function index(){

        $invoices = Invoice::with('customer')->orderBy('id','DESC')->get();
        
        return response()->json([
            'invoices' => $invoices
        ],200);
    }

    public function searchInvoice(Request $request){

        $search = $request->get('s');

        if($search != null){
            $invoices = Invoice::with('customer')
                    ->where('id','LIKE',"%$search%")
                    ->get();

            return response()->json([
                'invoices' => $invoices
            ],200);
        }else{
            return $this->index();
        }
        
    }

    public function createInvoice(Request $request){

        $counter = Counter::where('key','invoice')->first();
        $random =  Counter::where('key','invoice')->first();

        $invoice = Invoice::orderBy('id', 'DESC')->first();

        if(!$invoice){
            $invoice = $invoice->id+1;
            $counters = $counter->value + $invoice;
        }else{
            $counters = $counter->value;
        }

        $formData = [
            'number' => $counter->prefix.$counters,
            'customer_id' => null,
            'customer' => null,
            'data' => date('Y-m-d'),
            'due_date' => null,
            'reference' => null,
            'discount' => 0,
            'terms_and_conditions' => 'Default Terms and Conditions',
            'items' => [

                [
                    'product_id' => null,
                    'product' => null,
                    'unit_price' => 0,
                    'quantity' => 1, 
                ] 
            ]

        ];

        return response()->json($formData);
    }
}
