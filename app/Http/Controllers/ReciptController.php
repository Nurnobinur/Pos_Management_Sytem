<?php

namespace App\Http\Controllers;

use App\Models\Recived;
use App\Models\User;
use Illuminate\Http\Request;

class ReciptController extends Controller
{
    public function recipt($id){
        $this->data["singleuser"]=User::findOrfail($id);
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        $this->data["tab_bar"]="recipts";
        return view("User.recipt.recipt",$this->data);
   }
   public function reciptstore(Request $request,$user_id){
    $request->validate([
        "amount"=>"required",
        "date"=>"required",
        "user_id"=>"required",
        "note"=>"required",
     ]);
    $data=new Recived();
    $data["user_id"]=$user_id;
    $data->user_id=$request->user_id;
    $data->amount=$request->amount;
    $data->date=$request->date;
    $data->note=$request->note;
    $data->save();
    Session()->flash("message","Recipit create successfully");
    return redirect()->route('recipt',$data->user_id);
   }
   public function deleterecipt(Request $request,$user_id,$recipt_id){
        Recived::destroy($recipt_id);
        Session()->flash("message","Recipt delete successfully");
        return redirect()->route('recipt',$user_id);
    }
}
