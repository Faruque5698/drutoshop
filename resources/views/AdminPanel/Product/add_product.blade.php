@extends('AdminPanel.Master')

@section('title')
    Add Product
@endsection


@section('style')

    <style type="text/css">
        .show-color{
            display: none;
        }

         .show-size{
            display: none;
        }

        input[type="file"]{
            display: none;
            position: relative;
        }

        .label-custom{
            position: relative;
           /* background: #2b2b;*/
            left: 0;
            top: 0;
            padding: 15px 10px;
            font-size: 15px;
            font-weight: 300;
        }

    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>Add Product</strong></h1>
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
                    <h3 class="card-title">Add Product</h3>
                     <a href="{{route('admin.product')}}" class="btn btn-primary float-right"><i class="fa fa-eye text-white"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="productForm" action="{{ route('product.add') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="productName"  placeholder="Product Name">
                            </div>

                            <span id="productNameError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select name="brand_id" id="brandId" class="form-control @error('brand_id') is-invalid @enderror">
                                    <option selected>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                           

                            <span id="brandError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <select name="category_id" class="category-id form-control @error('category_id') is-invalid @enderror" id="catId">
                                    <option selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option  value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <span id="categoryError" class="pl-2" style="color: red;"></span>
                        </div>


                        <hr>
                        <div class="form-row">
                            <select class="form-control" name="subcategory_id" id="subCatId">
                                 <option value="">-----Select Sub Category------</option>
                            </select>
                          
                            <span id="subCatError" class="pl-2" style="color: red;"></span>
                        </div>
                       
                        <hr>
                        <div class="form-row">
                            <div class="col-4">
                                <select name="size_id" id="sizeId" class="select-size form-control @error('size_id') is-invalid @enderror mb-1" >
                                    <option selected>Select Size</option>
                                    @foreach($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                    @endforeach
                                </select>

                    
                            </div>
                           
                            <div class="col-4">
                                 <select name="color_id" id="colorId" class="select-color form-control @error('color_id') is-invalid @enderror mb-1" >
                                    <option id="colorHide" selected>Select Color</option>
                                    @foreach($colors as $color)
                                        <option class="colorText" value="{{ $color->id }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                 <input type="number" id="colorQty" class="form-control" name="" placeholder="Qty">
                            </div>
                            <div class="col-2 text-center">
                                 <a href="javascript:void(0)" id="addMore"><i class="fas fa-plus mr-1"></i>Add More</a>
                            </div>
                    
                            
                        </div>
                        <div class="form-row  addRow mt-2">
                          
                        </div>
                       
                        <hr>
                         <div class="form-row">
                            <div class="col-12">
                                <input type="number" id="qty" class="form-control @error('quantity') is-invalid @enderror" name="quantity" placeholder="Quantity"  min="1" required>
                            </div>
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <span id="qtyError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-12">
                                <input type="number" name="price" id="priceVal" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                            </div>
                    
                             <span id="priceError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>

                         <div class="form-row">
                             <div class="col-12">
                               <input type="number" class="form-control discount-price" id="discountPrice" placeholder="Discount Price">
                               <span id="disCountPriceError" class="pl-2" style="color: red;"></span>                  
                            </div>
        
                        </div>
                        <hr>
                        <div class="form-row">
                             <div class="col-12">
                                <select class="form-control " id="discount" name="discount_type">
                                    <option selected>Select Discount Type</option>
                                    <option value="credit">TK</option>
                                    <option value="parcentage">Parcentage</option>
                                </select>
                                <span id="discountError" class="pl-2" style="color: red;"></span>    
                            </div>
                           
                        </div>

                        <hr>

                         <div class="form-row">
                             <div class="col-12" id="disCount">
                               <input  type="number" name="discount_price" id="disResult"  class="form-control @error('price') is-invalid @enderror" placeholder="Total">                  
                            </div>
                             <span id="priDisError" class="pl-2" style="color: red;"></span>
                        </div>
                        <hr>

                         <div class="form-row">
                            <div class="col-12">
                                <textarea id="discription" class="form-control @error('discription') is-invalid @enderror" name="discription" placeholder="Product description here...."></textarea> 
                            </div>
                             <span id="discriptionError" class="pl-2" style="color: red;"></span>
                        </div>
                       
                        <hr>

                        <div class="form-row">
                            <div class="col-3">
                                <input type="file" class="@error('image') is-invalid @enderror" accept="image/*" id="mainImage" name="image" />
                                <label for="mainImage" class="label-custom"><i class="fas fa-upload mr-2"></i>Choise Product Image</label> 
                                <span id="imgError" class="pl-2" style="color: red;"></span>

                                <div><img id="mainImagePreview" src="{{ asset('Admin/noimage/noimg.png') }}" alt="your image" width="100px" height="100px" /></div>
                            </div>
                            <div class="col-3">
                                
                            </div>
                            
                        </div>
                       
                        <hr>

                        <div class="form-row">
                            <div class="col-6">
                               <input accept="image/*" type='file' id="imgOptional2" name="image1" />
                               <label for="imgOptional2" class="label-custom"><i class="fas fa-upload mr-2"></i>Optional Image 1</label>
 
                            </div>
                            <div class="col-6">
                                <img id="options2" src="{{ asset('Admin/noimage/noimg.png') }}" alt="your image" width="100px" height="100px" />
                            </div>
                            
                        </div>

                        <hr>
                         <hr>

                        <div class="form-row">
                            <div class="col-6">
                               <input accept="image/*" type='file' id="imgOptional3" name="image2" />
                                <label for="imgOptional3" class="label-custom"><i class="fas fa-upload mr-2"></i>Optional Image 2</label>
 
                            </div>
                            <div class="col-6">
                                <img id="options3" src="{{ asset('Admin/noimage/noimg.png') }}" alt="your image" width="100px" height="100px" />
                            </div>
                            
                        </div>
                         <hr>

                        <div class="form-row">
                            <div class="col-6">
                               <input accept="image/*" type='file' id="imgOptional1" name="image3" />
                                <label for="imgOptional1" class="label-custom"><i class="fas fa-upload mr-2"></i>Optional Image 3</label>
 
                            </div>
                            <div class="col-6">
                                <img id="options1" src="{{ asset('Admin/noimage/noimg.png') }}" alt="your image" width="100px" height="100px" />
                            </div>
                            
                        </div>
                       

                        <div class="form-row">
                            <select id="status" class="form-control @error('status') is-invalid @enderror" id="" name="status">
                                <option selected>Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>

                        </div>
                        <span id="statusError" class="pl-2" style="color: red;"></span>

                        <hr>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary"  id="btn" value="Add Product">
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
                })

            });


            $('#discount').change(function(){
                    var discountType = $(this).val();
                    var priceVal = $('#priceVal').val();
                    var discountPrice = $('#discountPrice').val();
                   
                    if (discountType == "credit") {
                        var result = (priceVal - discountPrice)
                       
                        $('#disResult').val(result);
                    }else if(discountType == "parcentage"){
                        var result = ((priceVal * (100 - discountPrice)) / 100);
                        $('#disResult').val(Math.round(result));
                        
                    }
            });



            function checkProductName() {
                var productName = $('#productName').val();
                var reg = /^[a-zA-Z0-9 -.]{2,100}$/;
                if (reg.test(productName)) {
                    $('#productNameError').text(' ');
                    return true;
                } else {
                    $('#productNameError').text('First Name Must Be 2 to 10 Charecter !');
                    return false;
                }
            };

             $('#productName').keyup(function() {
                checkProductName();
            });


            function checkBrand() {

                var brandId = $('#brandId').val();
                if (brandId == ' ') {
                    $('#brand').text('Please select your Brand');
                    return false;
                } else {
                    $('#brandError').text(' ');
                    return true;
                }

            };
            function checkCategory() {

                var categoryId = $('#catId').val();
                if (categoryId == ' ') {
                    $('#categoryError').text('Please select your Category');
                    return false;
                } else {
                    $('#categoryError').text(' ');
                    return true;
                }

            };
            function checkSubCatId() {

                var subCatId = $('#subCatId').val();
                if (subCatId == ' ') {
                    $('#subCatError').text('Please select your Subcategory');
                    return false;
                } else {
                    $('#subCatError').text(' ');
                    return true;
                }

            };

            function checkColor() {

                var colorId = $('#colorId').val();
                if (colorId == ' ') {
                    $('#colorError').text('Please select your Color');
                    return false;
                } else {
                    $('#colorError').text(' ');
                    return true;
                }

            };

            function checkSize() {

                var sizeId = $('#sizeId').val();
                if (sizeId == ' ') {
                    $('#sizeError').text('Please select your Color');
                    return false;
                } else {
                    $('#sizeError').text(' ');
                    return true;
                }

            };

            function checkQty() {
                var qty = $('#qty').val();
                var reg = /^[0-9]{1,10}$/;
                if (reg.test(qty)) {
                    $('#qtyError').text(' ');
                    return true;
                } else {
                    $('#qtyError').text('Quantity  Must Be 1 to 10 Number & Allow only Number !');
                    return false;
                }
            };

            $('#qty').keyup(function() {
                checkQty();
            });

            function checkPrice() {
                var priceVal = $('#priceVal').val();
                var reg = /^[0-9]{1,10}$/;
                if (reg.test(priceVal)) {
                    $('#priceError').text(' ');
                    return true;
                } else {
                    $('#priceError').text('Quantity  Must Be 1 to 10 Number & Allow only Number !');
                    return false;
                }
            };

            $('#priceVal').keyup(function() {
                checkPrice();
            });

            function checkDisPrice() {
                var discountPrice = $('#discountPrice').val();
                var reg = /^[0-9]{1,10}$/;
                if (reg.test(discountPrice)) {
                    $('#disCountPriceError').text(' ');
                    return true;
                } else {
                    $('#disCountPriceError').text('Quantity  Must Be 1 to 10 Number & Allow only Number !');
                    return false;
                }
            };

            $('#discountPrice').keyup(function() {
                checkDisPrice()
            });

            function checkDiscontType() {

                var discountPrice = $('#discountPrice').val();
                if (discountPrice == ' ') {
                    $('#discountError').text('Please select your Discount');
                    return false;
                } else {
                    $('#discountError').text(' ');
                    return true;
                }

            };

            function checkAfterDiscount() {
                var disResult = $('#disResult').val();
                var reg = /^[0-9]{1,10}$/;
                if (reg.test(disResult)) {
                    $('#priDisError').text(' ');
                    return true;
                } else {
                    $('#priDisError').text('Quantity  Must Be 1 to 10 Number & Allow only Number !');
                    return false;
                }
            };

             $('#disResult').keyup(function() {
                checkAfterDiscount();
            });

             function checkStatus() {

                var status = $('#status').val();
                if (status == ' ') {
                    $('#statusError').text('Please select status');
                    return false;
                } else {
                    $('#statusError').text(' ');
                    return true;
                }

            };

            function addmore(sizeId,colorId,colorSizeQty,sizeText,colorText){
                var listElement = document.createElement('input');
                listElement.value = sizeText;
                listElement.name = sizeId;
                listElement.innerHTML = `<input type="text" />`;                               
                                
                          
                           


                $('.addRow').append(listElement);

            };



            $('#addMore').click(function(){
                var sizeId = $('#sizeId').val();
                var colorId = $('#colorId').val();
                 var sizeText = $('#sizeId option:selected').text();
                var colorText = $('#colorId option:selected').text();
                var colorSizeQty = $('#colorQty').val();

    

                addmore(sizeId,colorId,colorSizeQty,sizeText,colorText);
            });


        








            $('#productForm').submit(function() {
                if (checkProductName() == true && checkBrand() == true && checkCategory() == true && checkSubCatId() == true && checkColor() == true && checkSize() == true && checkQty() == true && checkPrice() == true && checkDisPrice() == true && checkDiscontType() == true && checkAfterDiscount() == true &&  checkStatus() == true) {
                    return true;
                } else {
                    return false;
                }
            });



        });


            imgOptional1.onchange = evt => {
              const [file] = imgOptional1.files
              if (file) {
                options1.src = URL.createObjectURL(file)
              }
            }

             imgOptional2.onchange = evt => {
              const [file] = imgOptional2.files
              if (file) {
                options2.src = URL.createObjectURL(file)
              }
            }

             
             imgOptional3.onchange = evt => {
              const [file] = imgOptional3.files
              if (file) {
                options3.src = URL.createObjectURL(file)
              }
            }


            mainImage.onchange = evt => {
              const [file] = mainImage.files
              if (file) {
                mainImagePreview.src = URL.createObjectURL(file)
              }
            }




           




        

          






    </script>

 

@endsection
