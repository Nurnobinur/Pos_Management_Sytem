<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItems extends Model
{
    use HasFactory;
    public function sale_invoice(){
        return $this->belongsTo(SaleInvoice::class,"sale_invoice_id","id");
    }

    public function product(){
        return $this->belongsTo(Product::class,"porduct_id","id");
    }



}
