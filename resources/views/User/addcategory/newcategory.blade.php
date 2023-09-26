@extends("layout.layout")
@section("content")
<div class="container">
    <div class="row pt-5">
            <div class="col-md-3 offset-3">
                @if ($editdata->id)
                    <h4>Edit Category</h4>
                    @else
                    <h4>Add Categorise</h4>
                @endif

            </div>
            <div class="col-md-3  float-rigth text-right">
                <a class="btn btn-primary text-capitalize" href="/categorise"><i class="fa fa-plus"></i>Home Page</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3 mt-3">
                <form action="/categorise/{{$editdata->id}}" method="post">
                    @if ($editdata->id)
                        @method("put")
                    @endif
                    @csrf
                    <div class="form-group">
                    <label for="title">Category Name:</label>
                    @error("name")
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <input type="text"  name="name" value="{{old('name',$editdata->title)}}" class="form-control @error("name") is-invalid @enderror id="title" placeholder="Enter category name...">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection

