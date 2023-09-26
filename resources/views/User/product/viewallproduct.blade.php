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
            <h4>All Catgorise:</h4>
        </div>
        <div class="col-md-4 offset-2 float-rigth text-right">
            <a class="btn btn-primary text-capitalize" href="/products/create"><i class="fa fa-plus"></i>Add Product</a>
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
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Product name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Product name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($allproduct as $singleproduct)
                                        <tr class="text-center">
                                            <td>{{$singleproduct->id}}</td>
                                            <td>{{$singleproduct->category->title}}</td>
                                            <td>{{$singleproduct->title}}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="/products/{{$singleproduct->id}}"><i class="fa fa-show"></i>show</a>
                                                <a class="btn btn-primary btn-sm" href="/products/{{$singleproduct->id}}/edit"><i class="fa fa-edit"></i>Edit</a>
                                                <form class="d-inline" action="products/{{$singleproduct->id}}" method="post">
                                                    @csrf
                                                    @method("delete")
                                                    <button onclick="return confirm('r u sure delete thid data')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i><span class="ml-1">Delete</span></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

