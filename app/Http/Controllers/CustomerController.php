<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cus = Customer::all();
        return view('customer/cuindex',compact('cus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cus = new Customer;
        $cus->cusname = $request->cusname;
        $cus->cusplace = $request->cusplace;
        $cus->cusnumber = $request->cusnumber;
        $cus->cusemail = $request->cusemail;
        $cus->save();
        return redirect('customer/cuscreate');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cus  = Customer::find($id);
        return view('customer/cuedit' , compact('cus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cus= customer::find($id);
        $cus->cusname = $request->cusname;
        $cus->cusplace = $request->cusplace;
        $cus->cusnumber = $request->cusnumber;
        $cus->cusemail = $request->cusemail;
        $cus->save();
        return redirect('customer/cuscreate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::destroy($id);
        return redirect('customer/cuscreate');

    }
}
