@extends("layout.layout")
@section("content")
    <div class="row pb-5">
        <div class="col-md-6 offset-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsalemortal">
                <i class="fa fa-plus"></i>New Sale
            </button>
            <a class="btn btn-info " href=""><i class="fa fa-plus"></i>New Parchase</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentmotal">
                <i class="fa fa-plus"></i>New Payment
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reciptmotal">
                <i class="fa fa-plus"></i>New Recipt
            </button>
        </div>
        <div class="col-md-2  float-rigth text-right">
            <a class="btn btn-primary text-capitalize" href="/users"><< Homepage</a>
         </div>

    </div>


    <div class="row mb-5">
        <div class="col-2 text-center">
            <div class="nav flex-column nav-pills">
                <a href="/users/{{$singleuser->id}}" class="nav-link mb-3  @if ($tab_bar == "showuser")
                    active
                @endif">User INfo</a>

                <a href="{{route('sale',$singleuser->id)}}" class="nav-link  mb-3  @if ($tab_bar == "sales")
                    active
                @endif">Sales</a>

                <a href="{{route('purchas',$singleuser->id)}}" class="nav-link  mb-3  @if ($tab_bar == "purchas")
                    active
                @endif">Purchas</a>

                <a href="{{route('payment',$singleuser->id)}}" class="nav-link  mb-3 @if ($tab_bar == "payments")
                    active
                @endif">Payment</a>
                <a href="{{route('recipt',$singleuser->id)}}" class="nav-link  mb-3 @if ($tab_bar =="recipts")
                    active
                @endif ">Recipts</a>
            </div>
        </div>
        <div class="col-md-8">
            @yield("usercontent")
        </div>

    </div>
    {{--necherta pament mortatal--}}
    <div class="modal fade" id="paymentmotal" tabindex="-1" role="dialog" aria-labelledby="paymentmotalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <ul>

            </ul>
            <div class="modal-body">
                <form action="{{route('userpayment',$singleuser->id)}}" method="post">
                    @csrf
                    @method("post")
                    <div class="form-group">
                        <label for="user_id"><span class="text-danger">User id:*</span></label>
                        <input required="required" type="text"  name="user_id" value="{{old('user_id')}}" class="form-control @error("user_id") is-invalid @enderror" id="user_id" placeholder="Enter user id...">
                    </div>

                    <div class="form-group">
                        <label for="amount"><span class="text-danger">Amount:*</span></label>
                        <input  required="required" type="text"  name="amount" value="{{old('amount')}}" class="form-control @error("name") is-invalid @enderror" id="title" placeholder="Enter amount...">
                    </div>

                    <div class="form-group">
                        <label for="date"><span class="text-danger">Date:*</span></label>
                        <input  required="required" type="date"  name="date" value="{{old('date')}}" class="form-control @error("date") is-invalid @enderror" id="date" placeholder="select date...">
                    </div>


                    <div class="form-group">
                        <label for="note">Write Note:</label>
                        <textarea  required="required" name="note" class="form-control @error("note") is-invalid @enderror" id="note" cols="4" rows="4">
                            {{old('note')}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
    {{--recipt mortal--}}
    <div class="modal fade" id="reciptmotal" tabindex="-1" role="dialog" aria-labelledby="paymentmotalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="reciptModal">Add Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <ul>

            </ul>
            <div class="modal-body">
                <form action="{{route('reciptstore',$singleuser->id)}}" method="post">
                    @csrf
                    @method("post")
                    <div class="form-group">
                        <label for="user_id"><span class="text-danger">User id:*</span></label>
                        <input required="required" type="text"  name="user_id" value="{{old('user_id')}}" class="form-control @error("user_id") is-invalid @enderror" id="user_id" placeholder="Enter user id...">
                    </div>

                    <div class="form-group">
                        <label for="amount"><span class="text-danger">Amount:*</span></label>
                        <input  required="required" type="text"  name="amount" value="{{old('amount')}}" class="form-control @error("name") is-invalid @enderror" id="title" placeholder="Enter amount...">
                    </div>

                    <div class="form-group">
                        <label for="date"><span class="text-danger">Date:*</span></label>
                        <input  required="required" type="date"  name="date" value="{{old('date')}}" class="form-control @error("date") is-invalid @enderror" id="date" placeholder="select date...">
                    </div>


                    <div class="form-group">
                        <label for="note">Write Note:</label>
                        <textarea  required="required" name="note" class="form-control @error("note") is-invalid @enderror" id="note" cols="4" rows="4">
                            {{old('note')}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
    {{--new sale-invoice mortal--}}
    <div class="modal fade" id="newsalemortal" tabindex="-1" role="dialog" aria-labelledby="paymentmotalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="reciptModal">Add Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <ul>

            </ul>
            <div class="modal-body">
                <form action="{{route('sales_invoice_store',$singleuser->id)}}" method="post">
                    @csrf
                    @method("post")
                    <div class="form-group">
                        <label for="user_id"><span class="text-danger">User id:*</span></label>
                        <input required="required" type="text"  name="user_id" value="{{old('user_id')}}" class="form-control @error("user_id") is-invalid @enderror" id="user_id" placeholder="Enter user id...">
                    </div>

                    <div class="form-group">
                        <label for="challan_no">Chalan Number</label>
                        <input type="text"  name="challan_no" value="{{old('challan_no')}}" class="form-control @error("chalan_number") is-invalid @enderror" id="title" placeholder="Enter chalan number...">
                    </div>

                    <div class="form-group">
                        <label for="date"><span class="text-danger">Date:*</span></label>
                        <input  required="required" type="date"  name="date" value="{{old('date')}}" class="form-control @error("date") is-invalid @enderror" id="date" placeholder="select date...">
                    </div>


                    <div class="form-group">
                        <label for="note">Write Note:</label>
                        <textarea  required="required" name="note" class="form-control @error("note") is-invalid @enderror" id="note" cols="4" rows="4">
                            {{old('note')}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>


@endsection

