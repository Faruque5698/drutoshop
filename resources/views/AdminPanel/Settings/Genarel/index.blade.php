@extends('AdminPanel.Settings.layout')


@section('partials_content')


        <div class="card mt-2">
          <div class="card-body">
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
           
          </div>
        </div>

@endsection