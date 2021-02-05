@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
 <!-- Form-validation -->
 <div class="row">
      <!-- Basic example -->
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Purchase Information</h3></div>
            <div class="panel-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form role="form" action="{{ url('/insert_purchase') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product name</label>
                        <select name="pro_id" id="" class="form-control">
                            <option value="">--select product name--</option>
                            @php
                                $pro=DB::table('products')->get();
                            @endphp
                            @foreach($pro as $row)
                                <option value="{{ $row->id }}">{{ $row->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Quantity</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="quantity" name="pro_quant" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Supplier name</label>
                        <select name="sup_id" id="" class="form-control">
                            <option value="">--select suppliers name--</option>
                            @php
                                $sup=DB::table('suppliers')->get();
                            @endphp
                            @foreach($sup as $ro)
                                <option value="{{ $ro->id }}">{{ $ro->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Godaun</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="godaun" name="product_garage">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product route</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="product route" name="product_route">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Buy date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" placeholder="buy date" name="buy_date" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Expire date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" placeholder="expire date" name="expire_date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Buying price</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="buying price" name="buying_price" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Selling price</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="selling price" name="selling_price">
                    </div>


                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    <button type="reset" class="btn btn-primary waves-effect waves-dark">Reset</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->

 </div>
        </div>
    </div>




<footer class="footer text-right">
2021 © Developed By Mizanur Rahman.
</footer>

</div>

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
<!-- ============================================================== -->
