@extends("User.userlayout.userlayout")
@section("usercontent")
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$singleuser->name}}</strong></h6>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-info text-capitalize table-stripted" id="dataTable" width="100%" cellspacing="0">
                <tr class="text-center">
                    <th>User Id:</th>
                    <th>{{$singleuser->id}}</th>
                </tr>
                <tr class="text-center">
                    <th>Group name:</th>
                    <th>{{$singleuser->group->title}}</th>
                </tr>
                <tr class="text-center">
                    <th>Name:</th>
                    <th>{{$singleuser->name}}</th>
                </tr>
                <tr class="text-center">
                    <th>Email:</th>
                    <th>{{$singleuser->email}}</th>
                </tr>
                <tr class="text-center">
                    <th>Phone:</th>
                    <th>{{$singleuser->phone}}</th>
                </tr>
                <tr class="text-center">
                    <th>Address:</th>
                    <th>{{$singleuser->address}}</th>
                </tr>

            </table>
        </div>

    </div>

@endsection
