<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Sales;
use App\Models\SalesDetails;
use App\Models\Product;
use App\Models\Customer;

use App\Mail\Orderplaced;
use App\Mail\Ownermail;
use Illuminate\Support\Facades\Mail;


class SalesController extends Controller
{
    public function index()
    {   
          return view('sales/create');
    }

    public function cussearch(Request $request)
    {
       $query = $request->input('cusnumber');
       $cusdetails = Customer::where('cusnumber', $query)->get();
        return response()->json($cusdetails);
    }

    public function search(Request $request)
    {
       $query = $request->input('barcode');
       $products = Product::where('procode',$query)->get();
        return response()->json($products);
    }

    public function store(Request $request)
    {
      
       try{
            
            $lastId =null;
             DB::transaction(function () use ($request ,&$lastId) {

              $cus =Customer::firstOrCreate([
             
                 'cusnumber' => $request->input('customerNumber')
              ],
              [
                'cusname' => $request->input('customerName'),
                'cusplace' => $request->input('customerPlace'),
                'cusnumber' => $request->input('customerNumber'),
                'cusemail' => $request->input('customerEmail')
            ]
        );
            // Create a new Sales record
             $sales =Sales::create([
           'total' => $request->input('total'),
            'pay' => $request->input('pay'),
            'balance' => $request->input('balance'),
            'disctotal' => $request->input('discount'),
            'dd' => $request->input('date'),
            'mop' => $request->input('payment'),
            'cus_id' => $cus->id
           ]);
            $lastId = $sales->id;
          // Loop through the product details and create SalesDetail records
         foreach($request->input ('products') as $product) {
           SalesDetails::create([
           'sales_id' => $sales->id,
           'product_id' => $product['barcode'],
           'price' => $product['pro_price'],
           'qty' => $product['qty'],
            'total_cost' => $product['total_cost'],
          ]);


           $oldqty = Product::where('procode', $product['barcode'])->value('qty');

           $newqty = $oldqty - $product['qty'];
           Product::where('procode', $product['barcode'])->update(['qty' => $newqty]);
         
          }
       });
         return response()->json(['message' => 'Sales added successfully','last_id'=>$lastId ]);
         
         
    }catch(Execption $e){
         return response()->json(['message'=>'error adding sales',
                                   'error'=>$e->getMessage()],500);
    }




}

public function owneremail(Request $request)
{
    // Ensure the necessary data is coming from the request
   

    // Prepare the email data
    $emaildata = [
        'total' => $request->input('total'),
        'pay' => $request->input('pay'),
        'balance' => $request->input('balance'),
        'discount' => $request->input('discount'),
        'payment' => $request->input('payment'),
        'date' => $request->input('date'),
        'customerName' => $request->input('customerName'),
        'customerNumber' => $request->input('customerNumber'),
        'last_id' => $request->input('last_id')
    ];

    try {
        // Send the email
        Mail::to($request->input('customerEmail'))->send(new OrderPlaced($emaildata));
        Mail::to($request->input('ownermail'))->send(new OwnerMail($emaildata));

        // Return success response
        return response()->json(['message' => 'Order email sent successfully!']);
    } catch (\Exception $e) {
        // Handle any errors that may occur during the email sending process
        return response()->json([
            'message' => 'Failed to send email.',
            'error' => $e->getMessage()
        ], 500);
    }
}

}