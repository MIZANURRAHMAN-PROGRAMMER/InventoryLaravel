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
            <div class="panel-heading"><h3 class="panel-title">Update Supplier Information</h3></div>
            <div class="panel-body">
                <form role="form" action="{{ url('/update_product/'.$uppro->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="field-1" class="control-label">Product name</label>
                        <input type="text" class="form-control" name="pro_name" id="field-1" value="{{ $uppro->product_name }}">
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="control-label">Catagory name</label>
                        @php
                            $cat=DB::table('catagories')->get();
                        @endphp
                        <select name="cat_id" id="" class="form-control">
                            <option value="">--select catagory--</option>
                        @foreach($cat as $data)



                                    <option value="{{ $data->id }}" <?php if($data->id==$uppro->cat_id){echo 'selected';}?>>

                                        {{ $data->catName }}</option>

                        @endforeach
                    </select>
                    {{-- </div> --}}
                    <div class="form-group">
                        <label for="field-1" class="control-label">Product Details</label>
                        <input type="text" class="form-control" name="proDetails" id="field-1" value="{{ $uppro->product_details }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                        <img id="image" src="#" />
                        <input class="form-control"  accept="image/*" class="upload" onchange="readURl(this);" id="photo"  name="photo" type="file">
                        <img src="{{ URL::to($uppro->product_image) }}" style="width: 80px; height: 80px; " alt="" srcset="">
                    </div>
                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                   <a href="{{ route('add.product') }}"  class="btn btn-primary waves-effect waves-dark"><i class="fa fa-arrow-left"></i> back</a>
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
