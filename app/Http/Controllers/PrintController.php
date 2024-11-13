<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\SalesDetails;
use App\Models\Product;
use App\Models\Customer;

class PrintController extends Controller
{

    public function showPrintform($sales_id){


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



     return view('sales.print', compact('sales_id', 'sales', 'salesDetails', 'total',  'pay', 'balance','nettotal','dd','od','cusname','cusnum'));
}
}
