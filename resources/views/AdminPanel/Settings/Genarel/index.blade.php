@extends('AdminPanel.Master')

@section('title')
    Genarel Settings
@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-warning"><strong> Genarel Settings</strong></h1>
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
              <div class="card partials-card-border p-3">
                  <div class="row">
                      <div class="col-sm-12">
                              <form>
                                  <div class="row">
                                       <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Wesite Name</p>
                                           </div>
                                          <div class="col-sm-12">
                                             <input type="text" name="name" value="" class="text-muted form-control mb-0">
                                          </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Contact Number</p>
                                           </div>
                                          <div class="col-sm-12">
                                             <input type="text" name="name" value="" class="text-muted form-control mb-0">
                                          </div>
                                          </div>
                                       </div>

                                      
                                    </div>
                                    <hr>
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Email</p>
                                           </div>
                                          <div class="col-sm-12">
                                             <input type="text" name="name" value="" class="text-muted form-control mb-0">
                                          </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-12">
                                              <p class="mb-2">Logo</p>
                                           </div>
                                          <div class="col-sm-12">
                                             <input type="file" name="name" value="" class="text-muted form-control mb-0">
                                          </div>
                                          </div>
                                       </div>
                                      
                                    </div>
                                    <div class="row mt-4">
                                      <div class="col-sm-4 offset-sm-4">
                                        <input type="submit" value="Save" class="btn btn-warning w-50">
                                      </div>
                                    </div>
           
                              </form>
                          </div>
                    </div>  
                </div>                      
            </div>

        </section>
    </div>
@endsection
        








