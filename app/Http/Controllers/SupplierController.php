<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SupplierController extends Controller
{
    public function supcreate(){
        $sup = DB::table('suppliers')->get();
        return view('supplier/sindex', compact('sup'));
    }

    public function supsubmit(Request $request){
        DB::table('suppliers')->insert([
            'id' => $request->id,
           'supname' => $request->supname,
           'supplace' => $request->supplace,
           'supnumber' => $request->supnumber,
           'status' => $request->status
        ]);
        return redirect('supplier/supcreate');
    }


    public function supdelete($id){

        $sup = DB::table('suppliers')->where('id', $id)->delete();        
        
        return redirect('supplier/supcreate');
    }
    public function supedit($id){

        $sup = DB::table('suppliers')->where('id', $id)->first();        
        return view("supplier/sedit" , compact('sup'));
    }

    public function supupdate($id , Request $request){

        $sup = DB::table('suppliers')->where('id', $id)->update([
            
            'supname' => $request->supname,
           'supplace' => $request->supplace,
           'supnumber' => $request->supnumber,
           'status' => $request->status
         ]);        
        return redirect('supplier/supcreate');
    }

}
