<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=["id"];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
    public function sales_items(){
        return $this->hasMany(SaleItems::class,"product_id","id");
    }

}
