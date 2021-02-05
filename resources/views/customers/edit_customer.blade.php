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
            <div class="panel-heading"><h3 class="panel-title">Update Customer Information</h3></div>
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
                <form role="form" action="{{ url('/update_customer/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $edit->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $edit->email }}" required name="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" value="{{ $edit->phone }}" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $edit->address }}" name="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shop name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $edit->shopename }}" name="shopename" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Account Number</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $edit->account_number }}" name="account_number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Account Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $edit->account_name }}" name="account_name" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $edit->bank_name }}" name="bank_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Branch name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $edit->bank_branch }}" name="branch_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $edit->city }}" name="city">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                        <img id="image" src="#" />
                        <input class="form-control"  accept="image/*" class="upload" onchange="readURl(this);" id="photo"  name="photo" type="file">
                        <img src="{{ URL::to($edit->photo) }}" style="width: 80px; height: 80px; " alt="" srcset="">
                    </div>
                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                   <a href="{{ route('all.customer') }}"> <button  class="btn btn-primary waves-effect waves-dark"><i class="fa fa-arrow-left"></i> back</button></a>
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
