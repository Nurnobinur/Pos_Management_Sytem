<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;
    public function admin(){
        return $this->belongsTo(Admin::class,"admin_id","id");
    }
    public function sale_items(){
        return $this->hasMany(SaleItems::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
