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
                <tr>
                    <td>Suppliers</td>
                    <td>Chalan Number</td>
                    <td>Date</td>
                </tr>
                @foreach ($singleuser->purchas as $singlepurchas)
                    <tr>
                        <td>{{$singleuser->name}}</td>
                        <td>{{$singlepurchas->challan_no}}</td>
                        <td>{{$singlepurchas->date}}</td>
                    </tr>
                @endforeach

            </table>
        </div>

    </div>

@endsection
