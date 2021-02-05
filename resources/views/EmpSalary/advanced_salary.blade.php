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
            <div class="panel-heading"><h3 class="panel-title">Advanced Salary Information</h3></div>
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
                <form role="form" action="{{ url('/insert_advanced_salary') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee name</label>
                        @php
                            $emp=DB::table('employees')->get();
                        @endphp
                        <select name="emp_id" id="" class="form-control">
                            <option value="">--select employee name--</option>
                            @foreach($emp as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Month--Year</label>
                        <input type="month" class="form-control" id="exampleInputPassword1" name="monthdata"  required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Advanced Salary</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="advanced salary" name="advanced_salary">
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
