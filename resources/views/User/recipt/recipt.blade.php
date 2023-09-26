@extends("User.userlayout.userlayout")
@section("usercontent")
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$singleuser->name}}</strong></h6>
        </div>
    </div>
    <div class="card-body">
        @if (isset($message))
            <div class="alert alert-success text-center">{{$message}}</div>
         @endif
        <div class="table-responsive">
            <table class="table table-info text-capitalize table-stripted" id="dataTable" width="100%" cellspacing="0">
                <t-head>
                    <tr class="text-center">
                        <td>Admin Name</td>
                        <td>Customer Name</td>
                        <td>Amount</td>
                        <td>Date</td>
                        <td>Action</td>

                    </tr>
                </t-head>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-right">total amount=</td>
                        <td colspan="3">{{$singleuser->recipit->sum('amount')}}</td>
                    </tr>
                </tfoot>
                @foreach ($singleuser->recipit as $singlerecipt)
                    <tr class="text-center">
                        <td>{{optional($singlerecipt->admin)->name}}</td>
                        <td>{{$singleuser->name}}</td>
                        <td>{{$singlerecipt->amount}}</td>
                        <td>{{$singlerecipt->date}}</td>
                        <td>
                            <form action="{{route('reciptdestroy',[$singleuser->id,$singlerecipt->id])}}" method="post">
                                @csrf
                                @method("delete")
                                <input onclick="return confirm('r u sure delete')" class="btn btn-danger text-capitalize" type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>

    </div>

@endsection
