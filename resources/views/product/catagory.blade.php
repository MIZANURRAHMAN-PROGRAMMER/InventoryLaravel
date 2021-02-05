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
                    <h4 class="pull-left page-title">Catagory Information</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li class="active">catagory</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                  <h3 class="panel-title pull-left">Catagory </h3>
                                  <a href="javascript:;" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus-circle"></i> add</a>
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
                                                <th>Catagory name</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $a=1;
                                            @endphp
                                            @foreach($catagory as $row)




                                            <tr>
                                                <td>{{ $a++ }}</td>
                                                <td>{{ $row->catName }}</td>
                                                <td>

                                                     {{-- <a href="{{ URL::to('edit-catagory/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> edit</a> --}}
                                                     <a href="{{ URL::to('delete-catagory/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i> delete</a>

                                                </td>
                                            </tr>
                                            @endforeach

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
                                                        <h4 class="modal-title" id="mySmallModalLabel">Add Catagory</h4>
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
                                                        <form action="{{  url('/add_catagory') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Catagory name</label>
                                                                <input type="text" class="form-control" name="catName" id="field-1" placeholder="catagory name">
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

@endsection

