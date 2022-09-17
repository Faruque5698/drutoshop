@extends('AdminPanel.Master')

@section('title')
    Genarel Setting
@endsection



@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-warning"><strong>Genarel Setting</strong></h1>
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
            	<div class="card partials-card-border">
   					<div class="row">
		                <div class="col-3"> 
						    @include('AdminPanel.Settings.partials.sidebar')
		                </div>
		                <div class="col-9">
		                	@yield('partials_content')
		    		    </div>
		            </div>  
		        </div>                      
            </div>

        </section>
    </div>
@endsection