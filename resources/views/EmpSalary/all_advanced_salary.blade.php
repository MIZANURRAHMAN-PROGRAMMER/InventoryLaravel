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
                    <h4 class="pull-left page-title">All advanced salary Information</h4>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">ALL ADVANCED SALARY</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Month</th>
                                                <th>Salary</th>
                                                <th>Advanced</th>
                                                <th>Due</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($salary as $row)


                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td> <img src="{{ $row->photo }}" style=" width: 60px; heigth: 60px;" > </td>
                                                @php
                                                     $dd=explode("-",$row->month);
                                                     $mm=end($dd);
                                                    $dateObj   = DateTime::createFromFormat('!m', $mm);
                                                        $monthName = $dateObj->format('F');
                                                @endphp
                                                <td>{{ $monthName.'-'.current(explode("-",$row->month)) }}</td>
                                                <td>{{ $row->salary }}</td>
                                                <td>{{ $row->advanced_salary }}</td>
                                                <td>
                                                    @php
                                                        $due=($row->salary-$row->advanced_salary);
                                                    @endphp
                                                    {{ $due }}
                                                </td>
                                                <td>
                                                    <a href="{{ URL::to('view-data/'.$row->id) }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" ><i class="fa fa-eye"></i> view</a>
                                                     <a href="{{ URL::to('edit-customer/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> edit</a>
                                                     <a href="{{ URL::to('delete-customer/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i> delete</a>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

<!-- Bootstrap Modals -->


                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                                <h4>Text in a modal</h4>
                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                <hr>
                                <h4>Overflowing text to show scroll behavior</h4>
                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->








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
