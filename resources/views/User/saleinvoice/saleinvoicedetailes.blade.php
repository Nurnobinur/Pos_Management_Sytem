@extends("User.userlayout.userlayout")
@section("usercontent")
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><strong>Sales Invoice Detailes:</strong></h6>
        </div>
    </div>
    <div class="card-body">
        <div class="table table-info p-4">
            <table class="table table-info text-capitalize table-stripted" id="dataTable" width="100%" cellspacing="0">
                <div class="row">
                    <div class="col-md-7">
                        <p>Customer Name:{{$singleuser->name}}</p>
                        <p>email:{{$singleuser->email}}</p>
                        <p>Phone No:{{$singleuser->phone}}</p>
                    </div>
                    <div class="col-md-5 text-right">
                        <p>Invoice Date:{{$saleinvoice->date}}</p>
                        <p>Chalan Number:{{$saleinvoice->challan_no}}</p>
                    </div>
                </div>
            </table>
        </div>
        <table class="table table-dark">
            <thead>
               <tr>
                    <th>Product Id</th>
                   <th>Product Name</th>
                   <th>Qquantity</th>
                   <th>Prize</th>
                   <th>Total Prize</th>
                   <th>Action</th>
               </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newproduct">
                            <i class="fa fa-plus"></i>New Sale
                        </button>
                    </td>
                    <td>Total Amount <span class="ml-2">=</span></td>
                    <td>{{$saleinvoice->sale_items()->sum("total")}}</td>
                </tr>
             </tfoot>
           @foreach ($saleinvoice->sale_items as $sales_single_item)
           <tr>
                <td>{{$sales_single_item->porduct_id}}</td>
                <td>{{optional($sales_single_item->product)->title}}</td>
               <td>{{$sales_single_item->quantity}}</td>
               <td>{{$sales_single_item->prize}}</td>
               <td>{{$sales_single_item->total}}</td>
               <td>
                   <a class="btn btn-danger text-capitalize" href="">Delete</a>
                </td>
           </tr>
           @endforeach
        </table>
    </div>

    {{--add new mortal product--}}
    <div class="modal fade" id="newproduct" tabindex="-1" role="dialog" aria-labelledby="paymentmotalModalLabel" aria-hidden="true">
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
                <form action="{{route('sales_invoice_store',[$singleuser->id,$saleinvoice->id])}}" method="post">
                    @csrf
                    @method("post")
                    <div class="form-group">
                        <label for="select_prduct">Select Product</label>

                        <select class="form-control "required="required"  name="select_prduct" id="select_prduct">

                            <option value="">Select Product</option>
                            @foreach ($allproduct as $singleproduct)
                                <option @if ($singleproduct->id == old("select_prduct"))
                                   selected
                                @endif value="">{{$singleproduct->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prize">Product Prize</label>
                        <input type="text" required=required  name="prize" value="{{old('prize')}}" class="form-control @error("prize") is-invalid @enderror" id="prize" placeholder="Enter prize prize...">
                    </div>

                    <div class="form-group">
                        <label for="quantity"><span class="text-danger">Quantity:*</span></label>
                        <input  required="required" type="text"  name="quantity" value="{{old('quantity')}}" class="form-control @error("quantity") is-invalid @enderror" id="date" placeholder="select quantity...">
                    </div>
                    <div class="form-group">
                        <label for="total"><span class="text-danger">Total:*</span></label>
                        <input  required="required" type="text"  name="total" value="{{old('total')}}" class="form-control @error("total") is-invalid @enderror" id="total" placeholder="write  amount...">
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

