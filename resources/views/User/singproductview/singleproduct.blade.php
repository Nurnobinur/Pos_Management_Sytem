@extends("layout.layout")
@section("content")
   <div class="container">
    <div class="row">
        <div class="col-md-6 offset-3 mt-4">
            @if (isset($message))
                <div class="alert alert-success text-center text-capitalize">{{$message}}</div>
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-md-4 offset-1">
            <h4>Deleils Products:</h4>
        </div>
        <div class="col-md-4 offset-2 float-rigth text-right">
            <a class="btn btn-primary text-capitalize" href="/products"> >> Homepage</a>
         </div>
        </div>
   </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th  class="text-center">Id</th>
                                        <th>{{$singleproductshow->id}}</th>
                                    </tr>
                                    <tr>
                                        <th  class="text-center">Category Name:</th>
                                        <th>{{$singleproductshow->category->title}}</th>
                                    </tr>
                                    <tr>
                                        <th  class="text-center">Product Name:</th>
                                        <th>{{$singleproductshow->title}}</th>
                                    </tr>
                                    <tr>
                                        <th  class="text-center">Product Description:</th>
                                        <th>{{$singleproductshow->description}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Cost Prize:</th>
                                        <th>{{$singleproductshow->cost_prize}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Sale Prize:</th>
                                        <th>{{$singleproductshow->prize}}</th>
                                    </tr>

                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


