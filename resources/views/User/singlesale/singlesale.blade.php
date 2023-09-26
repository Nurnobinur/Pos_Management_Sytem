@extends("User.userlayout.userlayout")
@section("usercontent")
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$singleuser->name}}</strong></h6>
        </div>
    </div>
    @if (isset($message))
        <div class="alert alert-success mt-2 text-center">{{$message}}</div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-info text-capitalize table-stripted" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    {{-- <th>Admin Name</th>
                    <th>Customer Name</th> --}}
                    <th>Challan Number</th>
                    <th>Note</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

                @foreach ($singleuser->sales as $singlesales)
                    <tr>
                        {{-- <th>{{$singleuser->admin->name}}</th>
                        <th>{{$singleuser->name}}</th> --}}
                        <th>{{$singlesales->challan_no}}</th>
                        <th>{{$singlesales->note}}</th>
                        <th>{{$singlesales->date}}</th>
                        <th>
                            <a class="btn btn-info" href="{{route('invoice_details',[$singleuser->id,$singlesales->id])}}">view</a>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

@endsection

