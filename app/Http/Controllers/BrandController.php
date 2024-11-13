<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;


class BrandController extends Controller
{
    public function brandcreate(){
        $brand = Brand::all();
        return view('brand/bindex', compact('brand'));
    }

    public function brandsubmit(Request $request){
        DB::table('brands')->insert([
            'id' => $request->id,
           'brandname' => $request->brandname,
           'status' => $request->status
        ]);
        return redirect('brand/brandcreate');
    }


    public function branddelete($id){

        $brand = DB::table('brands')->where('id', $id)->delete();        
        
        return redirect('brand/brandcreate');
    }
    public function brandedit($id){

        $brand = DB::table('brands')->where('id', $id)->first();        
        return view("brand/bedit" , compact('brand'));
    }

    public function brandupdate($id , Request $request){

        $brand = DB::table('brands')->where('id', $id)->update([
            'brandname' => $request->brandname,
            'status' => $request->status
         ]);        
        return redirect('brand/brandcreate');
    }


}

