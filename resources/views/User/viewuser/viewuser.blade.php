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
        <div class="col-md-6">
            <h4>View User</h4>
        </div>
        <div class="col-md-4 offset-2 float-rigth text-right">
            <a class="btn btn-primary text-capitalize" href="/users/create"><i class="fa fa-plus"></i>Add user</a>
         </div>
        </div>
   </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>User ID</th>
                                        <th>Group_Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="text-center">
                                        <th>User ID</th>
                                        <th>Group_Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($userdata as $singleuser)
                                        <tr class="text-center">
                                            <td>{{$singleuser->id}}</td>
                                            <td>{{$singleuser->group->title}}</td>
                                            <td>{{$singleuser->name}}</td>
                                            <td>{{$singleuser->email}}</td>
                                            <td>{{$singleuser->phone}}</td>
                                            <td>{{$singleuser->address}}</td>
                                            <td>
                                                @csrf
                                                <a class="btn btn-sm btn-info text-capitalize" href="users/{{$singleuser->id}}"><i class="fa fa-show"></i>Show</a>
                                                <a class="btn btn-sm btn-primary text-capitalize" href="users/{{$singleuser->id}}/edit"><i class="fa fa-edit"></i>edit</a>
                                                <form class="d-inline"action="users/{{$singleuser->id}}" method="post">
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
