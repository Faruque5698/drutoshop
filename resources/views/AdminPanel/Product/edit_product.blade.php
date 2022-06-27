@extends('AdminPanel.Master')

@section('title')
    Update Product
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Edit Product</strong></h1>
                    </div>
                    @if(Session::get('message'))

                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Successfully</h5>
                            {{Session::get('message')}}
                        </div>
                    @endif
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('product.update') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <input type="hidden" name="id" value="{{ $product_edit->id }}">
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $product_edit->product_name }}"  placeholder="Product Name">
                            </div>
                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                    <option selected>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option {{ $brand->id == $product_edit->brand_id ? 'selected': '' }} value="{{ $brand->id }}">{{ $brand->brand_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="catId">
                                    <option selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option {{ $category->id == $product_edit->category_id ? 'selected': '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <select class="form-control" name="subcategory_id" id="subCatId">
                                 <option value="">-----Select Sub Category------</option>
                            </select>
                            @error('subcategory_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <hr>
                        <div class="form-row">
                            <div class="col-6">
                                <select name="size_id" class="form-control @error('size_id') is-invalid @enderror" >
                                    <option selected>Select Size</option>
                                    @foreach($sizes as $size)
                                        <option {{ $size->id == $product_edit->size_id ? 'selected': '' }} value="{{ $size->id }}">{{ $size->size_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('size_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-6">
                                 <select name="color_id" class="form-control @error('color_id') is-invalid @enderror" >
                                    <option selected>Select Color</option>
                                    @foreach($colors as $color)
                                        <option {{ $color->id == $product_edit->color_id ? 'selected': '' }} value="{{ $color->id }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('color_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <hr>
                         <div class="form-row">
                            <div class="col-12">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product_edit->quantity }}" placeholder="Type quantity">
                            </div>
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-6">
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product_edit->price }}" placeholder="Type Price">
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-6">
                               <input type="number" name="discount_price" class="form-control @error('price') is-invalid @enderror" value="{{ $product_edit->discount_price }}" placeholder="Type Discount Price">                  
                            </div>
                            @error('discount_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>

                         <div class="form-row">
                            <div class="col-12">
                                <textarea class="form-control @error('discription') is-invalid @enderror" name="discription" placeholder="Product description here....">{{ $product_edit->discription }}</textarea> 
                            </div>
                            @error('discription')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <hr>

                        <div class="form-row">
                            <div class="col-12">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="productImg" /> 
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <img src="{{asset($product_edit->image)}}" alt="" id="prevImg" width="100px" height="100px">
                        </div>
                       
                        <hr>

                        <div class="form-row">
                            <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option selected>Status</option>
                                <option value="active" {{$category -> status == 'active' ? 'Selected' : ''}}>Active</option>
                                <option value="inactive" {{$category -> status == 'inactive' ? 'Selected' : ''}}>Inactive</option>

                            </select>

                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" name="btn" id="btn" value="Update Product">
                        </div>
                    </form>
                </div>
                <!-- card-body -->
            </div>
        </section>
    </div>
@endsection

@section('js')


    
    <script type="text/javascript">


        productImg.onchange = evt => {
            const [file] = productImg.files
            if (file) {
                prevImg.src = URL.createObjectURL(file)
            }
        }


        $(document).ready(function(){
            $('#catId').change(function(){
                var catId = $(this).val();
                $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                });

                $.ajax({
                  type   : 'POST',
                  url: "{{ route('product.subcatid') }}",
                  data   : {cat_id:catId},
                  success: function(data){
                    $('#subCatId').html(data);
                  }
                });

            });
        });
    </script>

 

@endsection
