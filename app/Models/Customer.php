<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['cusname' , 'cusplace' , 'cusnumber','cusemail'
    
    ];

    public function sales(){
        return $this->hasMany(Sales::class,"cus_id");
    }
    

    

    use HasFactory;
}
