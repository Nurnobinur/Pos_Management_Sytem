<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PurchasController extends Controller
{
    public function purchas($id){
        $this->data["singleuser"]=User::findOrfail($id);
        $this->data["tab_bar"]="purchas";
        return view("User.purchas.purchas",$this->data);
    }
}
