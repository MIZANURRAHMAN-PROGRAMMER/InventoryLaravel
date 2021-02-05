@extends('layouts.app')
@section('content')

  <!-- ============================================================== -->
  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Customer Information</h4>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">ALL Customers</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Photo</th>
                                                <th>Email</th>
                                                <th>Shope Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($customer as $row)


                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->phone }}</td>
                                                <td> <img src="{{ $row->photo }}" style=" width: 60px; heigth: 60px;" > </td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->shopename }}</td>
                                                <td>
                                                    <button type="button" onclick="viewProduct({{ json_encode($row) }})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" ><i class="fa fa-eye"></i> view</button>
                                                     <a href="{{ URL::to('edit-customer/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> edit</a>
                                                     <a href="{{ URL::to('delete-customer/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i> delete</a>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

<!-- Bootstrap Modals -->


                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel" ><p id="bio"></p></h4>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <img src="" style="height: 100px; width:100px;  border-radius: 50%;  " id="imageShow" alt="Paris" class="center rounded">
                                    <h4>
                                        <p id="demo"></p>
                                     </h4>
                                    <div id="email"></div>
                                    <p id="phone"></p>


                                </center>
                                <hr>
                                <h4>Information</h4>
                                <p id="address"></p>
                                <p id="city"></p>
                                <p id="shopename"></p>
                                <p id="bank_name"></p>
                                <p id="bank_account"></p>
                                <p id="account_number"></p>
                                <p id="branch"></p>
                                {{-- <p id=""></p> --}}



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                               
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->








                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->



    <footer class="footer text-right">
        2021 © Developed By Mizanur Rahman.
    </footer>

</div>
<!-- ============================================================== -->

@endsection
@push('script')
<script>
    function viewProduct(product){
       var x =product.name;
       var phonto=product.photo;
       var email=product.email;
       var phone=product.phone;
       var address=product.address;
       var account_name=product.account_name;
       var bank_branch=product.bank_branch;
       var bank_name=product.bank_name;
       var city=product.city;
       var account_number=product.account_number;
       var shopename=product.shopename;
    document.getElementById("demo").innerHTML = x;
    document.getElementById("imageShow").src=phonto;
    document.getElementById("email").innerHTML="Email: "+email;
    document.getElementById("phone").innerHTML="Phone: "+phone;
    document.getElementById("bio").innerHTML="Biodata of "+x;
    document.getElementById("address").innerHTML="Address :"+address;
    document.getElementById("city").innerHTML="City :"+city;
    document.getElementById("shopename").innerHTML="Shop name :"+shopename;
    document.getElementById("bank_name").innerHTML="Bank name :"+bank_name;
    document.getElementById("bank_account").innerHTML="Bank Account :"+account_name;
    document.getElementById("account_number").innerHTML="Account number :"+account_number;
    document.getElementById("branch").innerHTML="Branch :"+bank_branch;
// console.log(product);
    }
</script>
@endpush
