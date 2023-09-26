@extends("layout.layout")
@section("content")
<div class="container">
    <div class="row pt-5">
            <div class="col-md-2 offset-3">
                @if ($editdata->id)
                    <h4>Edit User</h4>
                    @else
                        <h4>Add User<h4>
                @endif
            </div>
            <div class="col-md-3 offset-1 float-rigth text-right">
                <a class="btn btn-primary text-capitalize" href="/users"><i class="fa fa-plus"></i>Home Page</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3 mt-3">
                <form action="/users/{{$editdata->id}}" method="post">
                    @if (isset($editdata->id))
                        @method("put")
                    @endif
                    @csrf

                    <div class="form-group">
                        <label for="group">Group Name:</label>
                            @error("group")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <select name="group" required="required" id="group" class="form-control">
                                <option value="">select group name</option>
                                @foreach ($groupdata as $singledata)
                                    <option @if ($singledata->id== old('group',$editdata->id))
                                        selected
                                    @endif value="{{$singledata->id}}">{{$singledata->title}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="title">User Name:</label>
                            @error("name")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        <input type="text" required="required" value="{{old('name',$editdata->name)}}"  name="name" class="form-control @error ("name") is-invalid @enderror" id="name" placeholder="Enter name...">
                    </div>

                    <div class="form-group">
                        <label for="title">Email:</label>
                            @error("email")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        <input type="text" required="required"  value="{{old('email',$editdata->email)}}"  name="email" class="form-control @error ("email") is-invalid @enderror" id="email" placeholder="Enter email...">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                            @error("phone")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        <input type="text" value="{{old('phone',$editdata->phone)}}"   name="phone" class="form-control @error ("phone") is-invalid @enderror" id="phone" placeholder="Enter phone...">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                            @error("address")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        <input type="text" value="{{old('address',$editdata->address)}}"   name="address" class="form-control @error ("address") is-invalid @enderror" id="address" placeholder="Enter address...">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
