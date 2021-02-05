@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
 <!-- Form-validation -->
 <div class="row">

    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
            <div class="panel-body">
                <div class=" form">
                                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="Post" action="{{ url('/insert_employee') }}" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">Full name *</label>
                            <div class="col-lg-10">
                                <input class=" form-control" required placeholder="full name" id="firstname" name="name" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="lastname"  class="control-label col-lg-2">Email  *</label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="email" placeholder="email" name="email" type="email" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-2">Phone *</label>
                            <div class="col-lg-10">
                                <input class="form-control " required id="username" placeholder="phone" name="phone" type="number">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="address" class="control-label col-lg-2">Address *</label>
                            <div class="col-lg-10">
                                <input class="form-control " required id="address" placeholder="address" name="address" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-2">Experience  *</label>
                            <div class="col-lg-10">
                                <input class="form-control" required id="confirm_password" placeholder="experience" name="experience" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-2">Nid  *</label>
                            <div class="col-lg-10">
                                <input class="form-control" required id="confirm_password" placeholder="Nid" name="nid" type="number">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">Salary </label>
                            <div class="col-lg-10">
                                <input class="form-control" required id="email" placeholder="salary" name="salary" type="number">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">Vacation *</label>
                            <div class="col-lg-10">
                                <input class="form-control" required placeholder="vacation" id="email" name="vacation" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">City *</label>
                            <div class="col-lg-10">
                                <input class="form-control" required placeholder="city" id="email" name="city" type="text">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="email" class="control-label col-lg-2">Status *</label>
                            <div class="col-lg-10">
                                <select required class="form-control" name="status">
                                    <option value="">----select status----</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="email" class="control-label col-lg-2">Photo *</label>
                            <div class="col-lg-10">
                                <input class="form-control" required accept="image/*" class="upload" onchange="readURl(this);" id="email"  name="photo" type="file">
                                <img id="image" src="#" />
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                <button class="btn btn-default waves-effect" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- .form -->

            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->

</div> <!-- End row -->



</div> <!-- container -->

</div> <!-- content -->

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
