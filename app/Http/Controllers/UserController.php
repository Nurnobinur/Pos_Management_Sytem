<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        $this->data["userdata"]=User::all();
        return view("User.viewuser.viewuser",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["editdata"]=new User();
        $this->data["groupdata"]=Group::all();
        return view("User.adduser.user",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $data=new User();
        $data->group_id=$request->group;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->save();
        Session()->flash("message","User created susseccfully!");
        return redirect()->to("/users");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show(User $user){


        $this->data["singleuser"]=$user;
        $this->data["tab_bar"]="showuser";
        return view("User.singleshowuser.singleuser",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->data["groupdata"]=Group::all();
        $this->data["editdata"]=$user;
        return view("User.adduser.user",$this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $updatedata=$request;
        $user->group_id=$updatedata["group"];
        $user->name=$updatedata["name"];
        $user->email=$updatedata["email"];
        $user->phone=$updatedata["phone"];
        $user->address=$updatedata["address"];
        $user->save();
        Session()->flash("message","user updated successfully");
        return redirect()->to('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session()->flash("message","user deleted successfully !");
        return redirect()->to("/users");
    }
}
