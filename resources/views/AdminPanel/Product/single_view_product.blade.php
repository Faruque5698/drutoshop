@extends('AdminPanel.Master')

@section('title')
    Product Single View
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Product Single View</strong></h1>
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
                                <h3 class="card-title">Product View</h3>
                                {{--                            <p>total category : {{$total_category}}</p>--}}
                                <a href="{{route('admin.product')}}" class="btn btn-primary float-right"><i class="fa fa-eye"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               <table class="table table-bordered">
                                   <tr>
                                       <th>Product Name</th>
                                       <td>{{ $single_product->product_name }}</td>
                                   </tr>
                                   <tr>
                                       <th>Brand Name</th>
                                       <td>{{$single_product->productToBrand->brand_title}}</td>
                                   </tr>
                                   <tr>
                                       <th>Category Name</th>
                                       <td>{{$single_product->productToCategory->title}}</td>
                                   </tr>
                                   <tr>
                                       <th>Subcategory Name</th>
                                       <td>{{$single_product->productToSubcategory->title}}</td>
                                   </tr>
                                   <tr>
                                       <th>Color Name</th>
                                       <td>{{$single_product->productToColor->color_name}}({{ $single_product->color_qty }})</td>
                                   </tr>
                                   <tr>
                                       <th>Size Name</th>
                                       <td>{{$single_product->productToSize->size_name}}({{ $single_product->size_qty }})</td>
                                   </tr>
                                   <tr>
                                       <th>Price</th>
                                       <td>Tk {{$single_product->price}}</td>
                                   </tr>
                                   <tr>
                                       <th>Discount Price</th>
                                       <td>Tk {{$single_product->discount_price}}</td>
                                   </tr>
                                   <tr>
                                       <th>Discount Type</th>
                                       <td>{{$single_product->discount_type}}</td>
                                   </tr>
                                   <tr>
                                       <th>Total Price</th>
                                       <td>{{$single_product->total_price}}</td>
                                   </tr>
                                   <tr>
                                       <th>Qunatity</th>
                                       <td>{{$single_product->quantity}}</td>
                                   </tr>
                                   <tr>
                                       <th>Product Image</th>
                                       <td><img src="{{asset($single_product->image)}}" alt="{{$single_product->product_name}}" width="150px" height="150px"></td>
                                   </tr>
                                   <tr>
                                       <th>Gallery Image</th>
                                       <td>
                                           @foreach($single_product->gallery_product as $gallery_image)
                                            <span><img src="{{asset($gallery_image->image)}}" alt="{{$single_product->product_name}}" width="100px" height="100px"></span>
                                           @endforeach
                                       </td>
                                   </tr>
                                   <tr>
                                       <th>Product Status</th>
                                       <td>{{$single_product->status == 'active' ? 'Active':'Inactive'}}</td>
                                   </tr>
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
