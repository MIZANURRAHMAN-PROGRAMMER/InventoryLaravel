@extends('layouts.app')
@section('content')
<style>
    @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}

</style>
 <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body" id="section-to-print">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right">
                                                    {{-- <img src="images/logo_dark.png" alt="velonic"> --}}
                                                    Inventory
                                                </h4>

                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong>{{ date("d-M-Y")  }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name:&nbsp;{{ $customer->name }}</strong><br>
                                                     <strong> shop name:&nbsp;{{ $customer->shopename }}<br></strong>
                                                      Address:&nbsp;{{ $customer->address }}<br>
                                                      City:&nbsp;{{  $customer->city }}<br>
                                                      <abbr title="Phone">Phone:</abbr> (+88) {{ $customer->phone }}<br>
                                                      <abbr title="Email">Email:</abbr> {{ $customer->email }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ date("M-d-Y") }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong> #{{ mt_rand(100000, 999999) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Item</th>

                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $a=1;
                                                            @endphp
                                                            @foreach($contents as $row)
                                                                <tr>
                                                                    <td>{{ $a++ }}</td>
                                                                    <td>{{ $row->name }}</td>
                                                                    <td>{{ $row->qty }}</td>
                                                                    <td>৳{{ $row->price }}</td>
                                                                    <td>৳{{ $row->price*$row->qty }}</td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>
                                                <p class="text-right">VAT: {{ Cart::tax() }}</p>
                                                <hr>
                                                <h3 class="text-right">TAKA {{ Cart::total() }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print();" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>

                        </div>



            </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->

             <!-- Custom Modals -->
             <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <!-- sample modal content -->




                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" action="{{ url('/insert_invoice') }}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="cus_id" value="{{ $customer->id }}">
                                            <input type="hidden" name="order_date" value="{{ date("d/m/y") }}">
                                            <input type="hidden" name="order_status" value="pending">
                                            <input type="hidden" name="total_pro" value="{{ Cart::count() }}">
                                            <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                            <input type="hidden" name="card_tax" value="{{ Cart::tax() }}">
                                            <input type="hidden" name="total" value="{{ Cart::total() }}">
                                            <input type="hidden" name="cus_id" value="{{ $customer->id }}">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Invoice of {{ $customer->name }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">Payment </label>
                                                       <select name="payment_status" id="" class="form-control">

                                                           <option value="HandCash">HandCash</option>
                                                           <option value="Check">Check</option>
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">Total Amount</label>
                                                        <input type="text" class="form-control" readonly  name="totalAmount" value="{{ str_replace( ',', '', Cart::total()) }}" id="totalAmount" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-5" class="control-label">Paid Amount</label>
                                                        <input type="text" onkeyup="showdue()" name="paid_amount" class="form-control" id="payAmount" placeholder="Paid amount">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-6" class="control-label">Due</label>
                                                        <input type="number" name="due" class="form-control" readonly name="dueAmount" id="dueAmount" placeholder="due">
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

@endsection
@push('script')
<script>
    function showdue(e){
        document.getElementById('dueAmount').value = (parseInt(document.getElementById('totalAmount').value) - parseInt(document.getElementById('payAmount').value))

    }
</script>
@endpush
