<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SalesDeatails;

class ProductController extends Controller
{
  
    protected $product;
    public function __construct(){
    $this->product = new Product();
    }
    public function index()
    {
      $pro = $this->product->all();
      $cat= Category::pluck( 'catname', 'id');
      $brand = Brand::pluck('brandname', 'id');
      return view('product/pindex', compact('pro', 'cat', 'brand'));
    }
    public function prosubmit(Request $request){
        DB::table('products')->insert([
           // 'id' => $request->id,
           'proname' => $request->proname,
           'procode' => $request->procode,
           'price' => $request->price,
           'cat_id' => $request->cat_id,
           'brand_id' => $request->brand_id,
           'qty' => $request->qty,
           'details' => $request->details
          
        ]);
        return redirect('product/procreate');
    }


    public function prodelete($procode){

        $pro = DB::table('products')->where('procode', $procode)->delete();        
        
        return redirect('product/procreate');
    }
    public function proedit($procode){
        
        $pro = DB::table('products')->where('procode', $procode)->first();  
        $cat = Category::pluck('catname', 'id');
        $brand = Brand::pluck('brandname', 'id');      
        return view("product/pedit" , compact('pro','cat','brand'));
    }

    public function proupdate($procode , Request $request){

        $pro = DB::table('products')->where('procode', $procode)->update([
            
            // 'id' => $request->id,
           'proname' => $request->proname,
           'procode' => $request->procode,
           'price' => $request->price,
           'cat_id' => $request->cat_id,
           'brand_id' => $request->brand_id,
           'qty' => $request->qty,
           'details' => $request->details
         ]);        
        return redirect('product/procreate');
    }

}
