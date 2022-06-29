@extends('AdminPanel.Master')

@section('title')
    Product
@endsection

{{-- @php($categories = \App\Models\Category::all()) --}}

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Product List</strong></h1>
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
                                <h3 class="card-title">Product List</h3>
                                {{--                            <p>total category : {{$total_category}}</p>--}}
                                <a href="{{route('product.add')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>

                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Image</th>
                                        <th>Product Title</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    @php($i=1)

                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$i++}}</td>
                                           <td><img src="{{asset($product->image)}}" alt="{{$product->product_name}}" width="100px" height="100px"></td>
                                            <td>{{$product->product_name}}</td>

                                            <td>{{$product->productToBrand->brand_title}}</td>
                                            <td>{{$product->productToCategory->title}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->total_price}}</td>
                                            <td>{{$product->status == 'active' ? 'Published':'Unpublished'}}</td>
                                            <td>
                                                <a href="{{ route('product.status', ["id"=>$product->id]) }}" class="btn btn-sm btn-{{$product->status == 'active' ? 'success':'warning'}} mb-1"><i class="fa fa-{{$product->status == 'active' ? 'arrow-up':'arrow-down'}}"></i></a>
                                                <a href="{{ route('product.edit', ["id"=>$product->id]) }}" class="btn btn-sm btn-info mb-1"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('product.single', ["id"=>$product->id]) }}" class="btn btn-sm btn-primary mb-1"><i class="fa fa-eye"></i></a>

                                                <a href="" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#modal-product" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal-product">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" style="text-align: center;"><img src="{{asset('Admin/image/Danger.png')}}" width="100px" height="100px" alt=""></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you want to delete it..</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('product.delete', ["id"=>$product->id]) }}" class="btn btn-outline-light">Delete</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr>
                                       <th>Sl</th>
                                        <th>Product Image</th>
                                        <th>Product Title</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
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
