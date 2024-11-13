<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'procode';
    protected $fillable = ['procode','proname', 'cat_id', 'brand id', 'price','details','qty'];
 

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function salesDetails()
    {
        return $this->hasMany(SalesDetails::class);
    }




    use HasFactory;
}
