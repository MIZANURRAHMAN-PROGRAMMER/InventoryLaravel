@extends('layouts.app')

@section('content')
  <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12 bg-info">
                                <h4 class="pull-left page-title text-white">POS (Product of Sale) </h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#"><p class="text-white">Inventory</p></a></li>
                                    <li class="text-white">{{ date('d-M-Y') }}</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-7">
                                <br>
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                      <div class="portfolioFilter">


                                            @foreach($catagories as $catagory)

                                                <a href="#" data-filter="*" class="current">{{ $catagory->catName }}</a>
                                            @endforeach


                                      </div>

                                  </div>
                                </div>


                               <div class="panel">

                                   <br>


                                   <div class="price_card text-center">

                                        <table class="table table-striped ">
                                            <thead class="bg-info">
                                                <tr class="text-white " ">
                                                    <th style="color: white;">Name</th>
                                                    <th style="color: white;">Qunt</th>
                                                    <th style="color: white;">price</th>
                                                    <th style="color: white;">Sub Total</th>
                                                    <th style="color: white;">Action</th>
                                                </tr>
                                            </thead>
                                            @php
                                               $product=Cart::content();
                                            @endphp
                                            <tbody>
                                                @foreach($product as $prod)


                                                <tr>
                                                    <th>{{ $prod->name }}</th>
                                                    <th>
                                                        <form action="{{ url('/update-cart/'.$prod->rowId) }}" method="post">
                                                        @csrf
                                                            <input type="number" name="qty" id="" style="width: 40px" value="{{ $prod->qty }}">
                                                        <button type="submit" style="margin: -1px" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i></a>
                                                    </form>
                                                </th>
                                                    <th>{{ $prod->price }}/=</th>
                                                    <th>{{ $prod->price*$prod->qty }}/=</th>
                                                    <th>
                                                        <a href="{{ URL::to('/cart-remove/'.$prod->rowId) }}" class="btn btn-danger"> <i class="fa fa-trash-alt"></i></a>


                                                    </th>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                    <ul class="price-features">
                                        {{-- <li class="text-danger">product no added</li> --}}

                                    </ul>
                                    <div class="pricing-footer bg-primary"><br>
                                       <P style="font-size: 20px">Quantity: {{ Cart::count() }}</P>
                                       <P style="font-size: 20px">Sub Total: {{ Cart::subtotal() }}</P>

                                       <P style="font-size: 20px">Vat: {{ Cart::tax() }}</P>
                                        <hr>
                                        <span class="price"  style="font-size: 26px">Total:{{ Cart::total() }}</span>

                                    </div>
                                    <!--validatation error-->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!--end error-->

                                    <form action="{{ url('/create-invoice') }}" method="post">
                                        @csrf

                                        <div class="text-info">
                                            <h4>
                                                Select Customer
                                            <a href="#" class="btn btn-sm btn btn-primary waves-effect pull-right waves-light" data-toggle="modal" data-target="#con-close-modal">Add new</a>
                                            </h4>

                                        </div>
                                        <select name="cus_id" id="" class="form-control">
                                            <option value="">select customer</option>
                                            @foreach($customer as $value)
                                                 <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>


                                    <button type="submit" class="btn btn-info waves-effect waves-light w-md">Create Invoice</button>
                                </form>
                                </div> <!-- end Pricing_card -->
                               </div>
                            </div>

                            <div class="col-lg-5">
                                <br>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>

                                                Image
                                            </th>
                                            <th>Name</th>
                                            <th>Catagory name</th>
                                            <th>Code</th>
                                            <th>Add cart</th>


                                        </tr>
                                    </thead>


                                    <tbody>
                                        @php
                                            $a=1;
                                        @endphp
                                        @foreach($purchase as $row)




                                        <tr>
                                            <form action="{{ url('/add-cart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <input type="hidden" name="name" value="{{ $row->product_name }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $row->selling_price }}">
                                            <td>

                                                <img src="{{ URL::to($row->product_image) }}" style="width: 80px;height: 80px" alt="" srcset="">
                                            </td>
                                            <td>{{ $row->product_name }}</td>
                                            <td>{{ $row->catName }}</td>
                                            <td>{{ $row->product_code }}</td>
                                            <td><button type="submit" class="btn btn-sm">
                                                <a href="#" style="font-size: 25px" > <i class="fa fa-plus-square"></i></a></button>
                                            </td>
                                        </form>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div><!--end container-->
                </div>
            </div>

            <!-- Custom Modals -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <!-- sample modal content -->




                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" action="{{ url('/insert_data') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Add new Customer</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">Customer name</label>
                                                        <input type="text" class="form-control" name="name" id="field-4" placeholder="customer name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-5" class="control-label">Email</label>
                                                        <input type="email" name="email" class="form-control" id="field-5" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-6" class="control-label">Phone</label>
                                                        <input type="number" name="phone" class="form-control" id="field-6" placeholder="Phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">Address</label>
                                                        <input type="text" name="address" class="form-control" id="field-4" placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-5" class="control-label">Shop name</label>
                                                        <input type="text" class="form-control" id="field-5" name="shopename" placeholder="shop name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-6" class="control-label">Account Number</label>
                                                        <input type="text" class="form-control" id="field-6" name="account_number" placeholder="account number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">Account name</label>
                                                        <input type="text" class="form-control" id="field-4" name="account_name" placeholder="account name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-5" class="control-label">Bank Name</label>
                                                        <input type="text" class="form-control" name="bank_name" id="field-5" placeholder="bank name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-6" class="control-label">Branch name</label>
                                                        <input type="text" class="form-control" name="branch_name" id="field-6" placeholder="branch name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">City</label>
                                                        <input type="text" class="form-control" id="field-4" name="city" placeholder="city">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-5" class="control-label"></label>
                                                        <img id="image" src="#" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-6" class="control-label">Image</label>
                                                        <input class="form-control" id="field-4" required accept="image/*" class="upload" onchange="readURl(this);" id="photo"  name="photo" type="file">
                                                    </div>
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




                        </div>
                    </div>
                </div>
            </div> <!-- End row -->



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

@endsection
