<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    protected $table = 'saledetails';
    protected $primaryKey = 'id';
    protected $fillable = ['sales_id' , 'product_id' , 'price','qty','total_cost'
    
    ];

public function sales(){
    return $this->belongsTo(Sales::class,"sales_id");
}

public function product(){
    return $this->belongsTo(Product::class,'product_id');
}
    use HasFactory;
}
