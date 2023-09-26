@extends("layout.layout")
@section("content")
<div class="container">
    <div class="row pt-5">
            <div class="col-md-3 offset-3">
                @if ($editdata->id)
                    <h4>Edit Product</h4>
                    @else
                    <h4>Add Product</h4>
                @endif

            </div>
            <div class="col-md-3  float-rigth text-right">
                <a class="btn btn-primary text-capitalize" href="/products"> << Home Page</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3 mt-3">
                <form action="/products/{{$editdata->id}}" method="post">
                    @if ($editdata->id)
                        @method("put")
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="title">Select Category:</label>
                        @error("category_name")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <select type="text" name="category_name" class="form-control  @error("category_name") is-invalid @enderror" id="category_name">
                            <option value="">Select category</option>
                            @foreach ($allcategory as $singlecategory)
                                <option @if ($singlecategory->id == old('category_name',$editdata->id))
                                    selected
                                @endif value="{{$singlecategory->id}}">{{$singlecategory->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">product Name:</label>
                        @error("name")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text"  name="name" value="{{old('name',$editdata->title)}}" class="form-control @error("name") is-invalid @enderror" id="name" placeholder="Enter category name...">
                    </div>
                    <div class="form-group">
                        <label for="description">product description:</label>
                        @error("description")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <textarea name="description" id="description" class="form-control @error("descrption") is-invalid @enderror"  rows="6">{{old('description',$editdata->description)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="cost_prize">Cost prize:</label>
                        @error("cost_prize")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text"  name="cost_prize" value="{{old('cost_prize',$editdata->cost_prize)}}" class="form-control @error("cost_prize") is-invalid @enderror" id="cost_prize" placeholder="Enter product cost prize...">
                    </div>

                    <div class="form-group">
                        <label for="prize">Sale prize:</label>
                        @error("prize")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text"  name="prize" value="{{old('prize',$editdata->prize)}}" class="form-control @error("prize") is-invalid @enderror" id="prize" placeholder="Enter product prize...">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection

