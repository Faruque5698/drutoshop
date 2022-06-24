@extends('AdminPanel.Master')

@section('title')
    Color
@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Color List</strong></h1>
                       </i></a>
                    </div>

                    @if(Session::get('message'))

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('message')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Color List</h3>
                                <a href="{{ route('add.color') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                     @foreach($datas as $data)

                                       <tr>
                                         <td>{{ $loop->index +1 }}</td>
                                         <td>{{ $data->color_name }}</td>
                                         <td>{{ $data->color_code }}</td>
                                         <td>{{ $data->status == "active" ? "Active" : "Inactive" }}</td>

                                         <td>   
                                                 <a href="{{ route('status.color', ["id"=>$data->id]) }}" class="btn btn-sm btn-{{ $data->status == "active" ? "info" : "warning" }}"><i class="fa fa-{{ $data->status == "active" ? "arrow-up" : "arrow-down" }}"></i></a>

                                                <a href="{{ route('color.edit', ["id"=>$data->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-color" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>




                                        <div class="modal fade" id="modal-color">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h3>Delete</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you want to delete it..</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('color_delete', ["id"=>$data->id]) }}" class="btn btn-outline-light">Delete</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                       

                                     @endforeach
                                   

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->


        <!-- /.modal -->



    </div>
@endsection

