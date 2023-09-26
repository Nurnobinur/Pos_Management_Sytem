@extends("layout.layout")
@section("content")
   <div class="container">
    <div class="row">
        <div class="col-md-4 offset-3 mt-4">
            @if (isset($message))
                <div class="alert alert-success text-center text-capitalize">{{$message}}</div>
            @endif
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-md-6 offset-2">
            <a class="btn btn-primary " href=""><i class="fa fa-plus"></i>New sale</a>
            <a class="btn btn-info " href=""><i class="fa fa-plus"></i>New Parchase</a>
            <a class="btn btn-success" href=""><i class="fa fa-plus"></i>New Payment</a>
            <a class="btn btn-secondary " href=""><i class="fa fa-plus"></i>New recipt</a>
        </div>
        <div class="col-md-2  float-rigth text-right">
            <a class="btn btn-primary text-capitalize" href="/users"><< Homepage</a>
         </div>
        </div>
   </div>


<div class="row mb-5">
    <div class="col-2 text-center  offset-2">
      <div class="nav flex-column nav-pills">
        <a class="nav-link active mb-3">User INfo</a>
        <a href="{{route('sale',$singleuser->id)}}" class="nav-link active mb-3 active">Sales</a>
        <a class="nav-link active mb-3">Purchas</a>
        <a class="nav-link active mb-3">Payment</a>
        <a class="nav-link active mb-3">Recipts</a>
      </div>
    </div>
    <div class="col-8">
       <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </div>
                    <div class="card-body">
                        <table class="table-dark">
                            <tr>
                                <td>id</td>
                                <td>user id</td>
                                <td>chalan number</td>
                                <td>date</td>
                            </tr>
                        </table>
                    </div>
             </div>

        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare </div>

        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto </div>

        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare </div>
      </div>
    </div>
  </div>






    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-info text-capitalize table-stripted" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID:</th>
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
                </div>
            </div>
        </div>
    </div>

@endsection


