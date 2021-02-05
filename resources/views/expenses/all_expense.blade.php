@extends('layouts.app')
@section('content')
@php
    $condition=0;
@endphp

  <!-- ============================================================== -->
  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Expenses Information</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li class="active">expenses</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                  <h3 class="panel-title pull-left">Expenses </h3>

                                  <a href="{{ route('add.expense') }}" class="btn btn-sm btn-primary pull-right" ><i class="fa fa-plus-circle"></i> add</a>
                                  {{-- <a href="{{ route('add.expense') }}" class="btn btn-sm btn-primary pull-right" ><i class="fa fa-plus-circle"></i> add</a> --}}
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
                                                <th>SL.NO</th>
                                                <th>Supplier || Details</th>

                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>


                                            @php
                                                $a=1;
                                                $total=0;
                                            @endphp
                                            @foreach($expenses as $row)
                                            @php
                                                $total=$total+$row->amount;
                                            @endphp




                                            <tr>
                                                <td>{{ $a++ }}</td>
                                                <td>{{ $row->name.' '.$row->details }}</td>

                                                <td><?php echo date('d-M-Y',strtotime($row->created_at));?></td>
                                                <th>{{ $row->amount }}/=</th>
                                                <td>
                                                    <a href="{{ URL::to('view-purchase/'.$row->id) }}"  class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> view</a>
                                                     <a href="{{ URL::to('edit-expenses/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> edit</a>
                                                     <a href="{{ URL::to('delete-expenses/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i> delete</a>

                                                </td>
                                            </tr>
                                            @endforeach



                                        @php
                                        $date=date("Y-m-d");
                                        $month=date("m");
                                        $today=DB::table('expenses')
                                        ->whereDate('created_at', $date)
                                            ->sum('amount');

                                            $users = DB::table('expenses')
                                                ->whereMonth('created_at', $month)
                                                ->sum('amount');

                                        @endphp
                                      <h3 class="pull-in" style="color: red; margin:auto">Total:{{ $total }} /= &nbsp;&nbsp;&nbsp;&nbsp; Today Expense:{{ $today }} /=&nbsp;&nbsp;&nbsp;&nbsp; This Month:{{ $users }} /=</h3>
                                        </tbody>

                                    </table>

                                         <!-- Bootstrap Modals -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="mySmallModalLabel">Add Product</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif --}}
                                                        <form action="{{  url('/add_product') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Product name</label>
                                                                <input type="text" class="form-control" name="pro_name" id="field-1" placeholder="catagory name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Catagory name</label>
                                                                @php
                                                                    $cat=DB::table('catagories')->get();
                                                                @endphp
                                                                <select name="cat_id" id="" class="form-control">
                                                                    <option value="">--select catagory--</option>
                                                                @foreach($cat as $data)

                                                                        <option value="{{ $data->id }}">{{ $data->catName }}</option>

                                                                @endforeach
                                                            </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Product Details</label>

                                                                <input type="text" class="form-control" name="proDetails" id="field-1" placeholder="product details">


                                                            </div>
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Product Image</label>
                                                                <input class="form-control" required accept="image/*" class="upload" onchange="readURl(this);" id="email"  name="photo" type="file">
                                                                <img id="image" src="#" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End of row -->

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
@endsection

