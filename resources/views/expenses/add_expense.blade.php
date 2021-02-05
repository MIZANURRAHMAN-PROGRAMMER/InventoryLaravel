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
            <div class="panel-heading">
                <h3 class="panel-title">Add Expenses Information</h3>
                <a href="{{ route('all.expense') }}" class="btn btn-sm btn-info pull-right"><i class="fa fa-eye"></i>view</a>
            </div>
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
                <form role="form" action="{{ url('/edit_expenses') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier name</label>
                       <select name="sup_id" id="" class="form-control">
                            <option value="">--select supplier--</option>
                            @php
                                $expense=DB::table('suppliers')->get();
                            @endphp
                            @foreach($expense as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Details</label>
                        <textarea type="text" rows="4" class="form-control" id="exampleInputPassword1"  name="details"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Amount</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="amount" name="amount">
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
