@extends("User.userlayout.userlayout")
@section("usercontent")
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$singleuser->name}}</strong></h6>
        </div>
    </div>
    <div class="card-body">
        @if (isset($message))
            <div class="alert alert-success">{{$message}}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $singleerror)
                        <li>{{$singleerror}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-info text-capitalize table-stripted" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <td>Admin Name:</td>
                    <td>Name</td>
                    <td>Amount</td>
                    <td>Note</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
              </thead>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right">total amount=</td>
                    <td colspan="3">{{$singleuser->payment->sum('amount')}}</td>
                </tr>
            </tfoot>
                @foreach ($singleuser->payment as $singlepayment)
                    <tr>
                        <td>{{optional($singleuser->admin)->name}}</td>
                        <td>{{$singleuser->name}}</td>
                        <td>{{$singlepayment->amount}}</td>
                        <td>{{$singlepayment->note}}</td>
                        <td>{{$singlepayment->date}}</td>
                        <td>
                            <form action="{{route('paymentdelete',[$singleuser->id,$singlepayment->id])}}" method="post">
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
