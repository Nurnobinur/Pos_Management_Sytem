<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Session\SessionServiceProvider;

class PaymentContrller extends Controller
{

    public function paymentstore(Request $request,$user_id){
        $request->validate([
            "amount"=>"required",
            "date"=>"required",
            "user_id"=>"required",
            "note"=>"required",
         ]);
        $data=new Payment();
        $data["user_id"]=$user_id;
        $data->user_id=$request->user_id;
        $data->amount=$request->amount;
        $data->date=$request->date;
        $data->note=$request->note;
        $data->save();
        Session()->flash("message","Payment successfully");
        return redirect()->route('payment',$data->user_id);
    }
    public function payment($id){
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        $this->data["singleuser"]=User::findOrfail($id);
        $this->data["tab_bar"]="payments";
        return view("User.payment.payment",$this->data);
    }
    public function paymentdelete(Request $request,$user_id,$payment_id){
        Payment::destroy($payment_id);
        Session()->flash("message","Payment delete successfully");
        return redirect()->route('payment',$user_id);
    }
}
