<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItems;
use App\Models\User;
use Illuminate\Http\Request;

class usersales extends Controller
{
    public function usersale($id){
        $this->data["tab_bar"]="sales";
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        $this->data["singleuser"]=User::findOrFail($id);
         return view("User.singlesale.singlesale",$this->data);
    }
    public function usersalestore(Request $request,$user_id){
        $data=new SaleInvoice();
        $data["user_id"]=$user_id;
        $data->admin_id="1";
        $data->user_id=$request->user_id;
        $data->challan_no=$request->challan_no;
        $data->date=$request->date;
        $data->note=$request->note;
        $data->save();
        Session()->flash("message","saleinvoice create successfully");
        return redirect()->route("sale",$data->user_id);
    }
    public function usersaledetails($user_id,$singlesales){
      $this->data["singleuser"]=User::findOrfail($user_id);
      $this->data["saleinvoice"]=SaleInvoice::findOrFail($singlesales);
        $this->data["allproduct"]=Product::all();
      return view("User.saleinvoice.saleinvoicedetailes",$this->data);
    }

    public function usersalecreate(Request $request,$uer_id,$invoice_id){
        return"welcome";
    }

}
