<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CatController extends Controller
{
    // protected $category;
    // public function __construct(){
    //     $this->category = new Category();
    // }


    public function createcategory(){
        $cat = Category::all();
        return view('category/index', compact('cat'));
    }

  

    public function catsubmit(Request $request){
        DB::table('categories')->insert([
            'id' => $request->id,
           'catname' => $request->catname,
           'status' => $request->status
        ]);
        return redirect('category/catcreate');
    }

    // public function getallcategory(){
    //     $cat = DB::table('categories')->get();
    //     return view('blogpost' , compact('cat'));
    // }


    // public function viewblogpost($title){

    //     $post = DB::table('blogpost')->where('title', $title)->first();        
    //     return view("singleblogpost" , compact('post'));
    // }

    public function catdelete($id){

        $cat = DB::table('categories')->where('id', $id)->delete();        
        
        return redirect('category/catcreate');
    }
    public function catedit($id){

        $cat = DB::table('categories')->where('id', $id)->first();        
        return view("category/edit" , compact('cat'));
    }

    public function catupdate($id , Request $request){

        $cat = DB::table('categories')->where('id', $id)->update([
            'catname' => $request->catname,
            'status' => $request->status
         ]);        
        return redirect('category/catcreate');
    }


}
