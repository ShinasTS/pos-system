<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\SalesDetails;
use App\Models\Product;
use App\Models\Customer;


class DashController extends Controller
{
    public function index(){

        $sales =  Sales::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();
        $salecomplete = Sales::where('status', 0)
              ->orderBy('created_at', 'desc')
              ->get();

   
        $cusname= Customer::pluck( 'cusname', 'id');
        $cusnum= Customer::pluck( 'cusnumber', 'id');

        return view('dash/dindex',compact('sales','salecomplete','cusname','cusnum'));
    }

    public function destroy(string $id)
    {
        Sales::destroy($id);
        return redirect('/');

    }
    public function invoice($sales_id){


        $sales = Sales::findorFail($sales_id);
       $salesDetails = $sales->salesDetails;
 
       $total = $sales->total;
       $pay = $sales->pay;
       $nettotal = $sales->disctotal;
       $dd = \Carbon\Carbon::parse($sales->dd)->format('d-m-Y');
       $od = $sales->created_at->format('d-m-Y');
 
       
       $balance = $sales->balance;
       $cus_id = $sales->cus_id;
 
       $cusdetails = Customer::findorFail($cus_id); 
       $cusname = $cusdetails->cusname;
       $cusnum = $cusdetails->cusnumber;
 
 
 
      return view('dash/invoice', compact('sales_id', 'sales', 'salesDetails', 'total',  'pay', 'balance','nettotal','dd','od','cusname','cusnum'));
 }


 public function salecomplete(string $id)
    {
        Sales::where('id', $id)->update(['status' => 1]);

        return redirect('/');

    }
 }
 
