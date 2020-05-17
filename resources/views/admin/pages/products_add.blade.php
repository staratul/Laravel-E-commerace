@extends('admin.layouts.sidebar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route("admin.products") }}">Products</a></li>
                <li class="breadcrumb-item active">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
    <div class="content">
        <div class="container-fluid pb-3">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('admin.components.messages')
                  <div class="col-md-12">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="product-add-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Category*</label>
                                  <select class="form-control select2" name="category" style="width: 100%;" required>
                                    <option selected="selected" value="">Select</option>
                                    @if (isset($categories) && !$categories->isEmpty())
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if(isset($product) && $product->category_id === $category->id)
                                                    selected
                                                @endif
                                                >{{ $category->category }}
                                            </option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span id="category_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Title*</label>
                                  <input type="text" name="title" class="form-control" placeholder="Title" required value="{{ isset($product) ? $product->title : '' }}">
                                  <span id="title_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Sub-Title*</label>
                                  <input type="text" name="sub_title" class="form-control" placeholder="Sub Title" required value="{{ isset($product) ? $product->sub_title : '' }}">
                                </div>
                                <span id="sub_title_error"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Brand</label>
                                  <input type="text" name="brand" class="form-control" placeholder="Brand" required value="{{ isset($product) ? $product->brand : '' }}">
                                  <span id="brand_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Unit*</label>
                                  <select class="form-control select2" name="unit" style="width: 100%;" required>
                                    <option selected="selected" value="">Select</option>
                                    @if (isset($units) && !$units->isEmpty())
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                @if(isset($product) && $product->unit_id === $unit->id)
                                                    selected
                                                @endif
                                                >{{ $unit->unit }}
                                            </option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span id="unit_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Quantity*</label>
                                  <input type="number" name="quantity" class="form-control" placeholder="Quantity" required value="{{ isset($product) ? $product->quantity : '' }}">
                                  <span id="quantity_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>MRP Price*</label>
                                  <input type="number" name="mrp_price" class="form-control" placeholder="MRP Price" required value="{{ isset($product) ? $product->mrp_price : '' }}">
                                  <span id="mrp_price_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Price*</label>
                                  <input type="number" name="price" class="form-control" placeholder="Price" required value="{{ isset($product) ? $product->price : '' }}">
                                  <span id="price_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Unit In Stock*</label>
                                <select class="form-control select2" name="unit_in_stock" style="width: 100%;" required>
                                <option selected="selected" value="">Select</option>
                                    @if (isset($units) && !$units->isEmpty())
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                @if(isset($product) && $product->unit_id === $unit->id)
                                                    selected
                                                @endif
                                                >{{ $unit->unit }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <span id="unit_in_stock_error"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>In Stock*</label>
                                    <input type="number" name="in_stock" class="form-control" placeholder="In Stock" required value="{{ isset($product) ? $product->in_stock : '' }}">
                                    <span id="in_stock_error"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                              <label>About Product (Optional)</label>
                              <textarea class="textarea" name="about_product" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ isset($product) ? $product->about_product : '' }}</textarea>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                              <label>How to use (Optional)</label>
                              <textarea class="textarea" name="product_uses" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ isset($product) ? $product->uses : '' }}</textarea>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                              <label>Benefits (Optional)</label>
                              <textarea class="textarea" name="benefits" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ isset($product) ? $product->benefits : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right mt-5">
                            <button type="reset" class="btn btn-dark rounded-0 mr-4">Reset</button>
                            <button type="submit" class="btn btn-success rounded-0">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@push('scripts')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            // Summernote
            $('.textarea').summernote()

            // var errors =  '{!! isset($errors) ? json_encode($errors->toArray()) : '' !!}';
            // var errorsList = JSON.parse(errors);
            // for(error in errorsList) {
            //     toastr.error(errorsList[error][0]);
            // }
            // Form Validation

            $("#product-add-form").validate({
                ignore: [],
                rules: {
                    'title': {
                        required: true
                    },
                    'sub_title': {
                        required: true
                    },
                    'category': {
                        required: true
                    }
                },
                messages: {
                    'title': {
                        required: 'Title field is required'
                    },
                    'sub_title': {
                        required: 'Sub-Title field is required'
                    },
                    'category': {
                        required: 'Category field is required'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "category")
                        error.appendTo('#category_error');
                    if  (element.attr("name") == "title" )
                        error.appendTo('#title_error');
                    if  (element.attr("name") == "sub_title" )
                        error.appendTo('#sub_title_error');
                    if  (element.attr("name") == "brand" )
                        error.appendTo('#brand_error');
                    if  (element.attr("name") == "unit" )
                        error.insertBefore('#unit_error');
                    if  (element.attr("name") == "unit_in_stock" )
                        error.insertBefore('#unit_in_stock_error');
                    if  (element.attr("name") === 'quantity' )
                        error.insertAfter($("#quantity_error"));
                    if  (element.attr("name") === 'mrp_price' )
                        error.insertAfter($("#mrp_price_error"));
                    if  (element.attr("name") === 'price' )
                        error.insertAfter($("#price_error"));
                    if  (element.attr("name") === 'in_stock' )
                        error.insertAfter($("#in_stock_error"));
                    // else
                    //     error.insertAfter(element);
                }
            })
            $('select').select2({}).on("change", function (e) {
                $(this).valid()
            });
        });
    </script>
@endpush
