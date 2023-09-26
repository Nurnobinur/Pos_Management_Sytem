<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    use HasFactory;
    protected $guarded=["id"];
    public function group(){
        return $this->belongsTo(Group::class,"group_id","id");
    }

    public function sales(){
        return $this->hasMany(SaleInvoice::class);
    }
    public function purchas(){
        return $this->hasMany(PurchaseInvoices::class);
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    public function recipit(){
        return $this->hasMany(Recived::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
