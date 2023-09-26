@extends("layout.layout")
@section("content")
<div class="container">
    <div class="row pt-5">
            <div class="col-md-2 offset-3">
                <h4>User Group</h4>
            </div>
            <div class="col-md-3 offset-1 float-rigth text-right">
                <a class="btn btn-primary text-capitalize" href="/usergroups"><i class="fa fa-plus"></i>Home Page</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3 mt-3">
                <form action="{{'/usergroups'}}" method="post">
                    @csrf
                    @method("post")
                    <div class="form-group">
                    <label for="title">Group Name:</label>
                    @error("title")
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <input type="text"  name="title" class="form-control @error("title") is-invalid @enderror id="title" placeholder="Enter Group name...">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
