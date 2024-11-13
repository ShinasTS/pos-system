<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = ['total' , 'disctotal','pay' , 'balance' ,'dd','mop','cus_id'
    
    ];

public function salesDetails(){
    return $this->hasMany(SalesDetails::class,"sales_id");
}

public function customer(){
    return $this->belongsTo(Customer::class,"cus_id");
}

    use HasFactory;
}
