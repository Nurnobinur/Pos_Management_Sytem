<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recived extends Model
{
    protected $table="reciveds";
    protected $guarded=["id"];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    use HasFactory;
}
