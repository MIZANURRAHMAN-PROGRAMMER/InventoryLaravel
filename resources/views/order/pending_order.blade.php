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
                    <h4 class="pull-left page-title">Pending order Information</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li class="active">pending order</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                  <h3 class="panel-title pull-left">pending orders </h3>
                                  <a href="{{ route('pos') }}" class="btn btn-sm btn-primary pull-right" ><i class="fa fa-plus-circle"></i> add</a>
                                  {{-- data-toggle="modal" data-target=".bs-example-modal-sm" --}}
                                    <br>
                                </div>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Order date </th>
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Payment</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach($pending as $row)




                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->order_date }}</td>
                                                <td>{{ $row->total_products }}</td>
                                                <td>{{ $row->total }}</td>
                                                <td>{{ $row->payment_status }}</td>
                                                <td class="text-center">
                                                    @if($row->order_status=='pending')
                                                            <p class="badge badge-danger text-center" style="font-size: 12px">{{ strtolower($row->order_status) }}</p>
                                                    @else
                                                    <p class="badge badge-success text-center" style="font-size: 12px">{{ strtolower($row->order_status) }}</p>
                                                    @endif




                                                </td>
                                                <td >
                                                    @php
                                                        $cus=DB::table('customers')->where('id',$row->cus_id)->first();
                                                        $ordetails=DB::table('orderdetails')->join('products','orderdetails.product_id','products.id')
                                                        ->select('products.product_name','orderdetails.quantity','orderdetails.unitprice','orderdetails.total')->where('order_id',$row->id)->get();
                                                    @endphp
                                                     <a href="{{ URL::to('/done-order/'.$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Done</a>
                                                    <a href="#" onclick="viewOrder({{ json_encode($ordetails) }})" data-toggle="modal" data-target="#con-close-modal"  class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Pro info</a>
                                                    <a href="#"  onclick="viewProduct({{ json_encode($cus) }})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> Cus info</a>


                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                         <!-- Bootstrap Modals -->
                         <!-- Custom Modals -->
             <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <!-- sample modal content -->




                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Invoice of </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <p id="showData"></p>
                                                        {{-- <table class="table m-t-30">
                                                            <thead>
                                                                <tr><th>#</th>
                                                                <th>Item</th>

                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                                <th>Total</th>
                                                            </tr></thead>
                                                            <tbody>

                                                                    <tr>
                                                                        <td id="sl"></td>
                                                                        <td id="pro_name"></td>
                                                                        <td id="pro_quant"></td>
                                                                        <td id="pro_price"></td>
                                                                        <td id="pro_total">৳</td>
                                                                    </tr>


                                                            </tbody>
                                                        </table> --}}
                                                    </div>
                                                </div>





                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Save </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal -->

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
<script type="text/javascript">
    function readURl(input) {
         if(input.files && input.files[0]){
             var reader=new FileReader();
             reader.onload=function(e){
                 $('#image')
                    .attr('src',e.target.result)
                    .width(100)
                    .height(120);
             };
             reader.readAsDataURL(input.files[0]);
         }
    }

</script>
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

    function viewOrder(oreder){
        console.log(oreder);
        // document.getElementById("sl").innerHTML =oreder;
        var orede=[oreder];
        var html = "<table border='1|1'>";
for (var i = 0; i < orede.length; i++) {
    html+="<tr>";
    html+="<td>"+orede[i].product_name+"</td>";
    html+="<td>"+orede[i].quantity+"</td>";
    html+="<td>"+orede[i].total+"</td>";
    html+="<td>"+orede[i].unitpirce+"</td>";
    // html+="<td>"+oreder[i].email+"</td>";

    html+="</tr>";

}
html+="</table>";
document.getElementById("showData").innerHTML = html;
    }
</script>
@endpush
@endsection

