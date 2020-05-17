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
                <li class="breadcrumb-item active">Products</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-12">
                    @include('admin.components.messages')
                </div>
                <a href="{{ route("products.create") }}" class="btn btn-default ml-2"><i class="fas fa-plus"></i> Add</a>
                <div class="col-md-12 mt-2">
                    <div class="card card-default">
                        <div class="card-body">
                            <table id="product_table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Unit</th>
                                        <th>Qnty</th>
                                        <th>MRP</th>
                                        <th>Price</th>
                                        <th>In Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Unit</th>
                                        <th>Qnty</th>
                                        <th>MRP</th>
                                        <th>Price</th>
                                        <th>In Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
@endsection


@push('scripts')
    <script>
        $(function () {
            $('#product_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('products.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'products.title'},
                    {data: 'category.category', name: 'category.category'},
                    {data: 'unit.unit', name: 'unit.unit'},
                    {data: 'quantity', name: 'products.quantity'},
                    {data: 'mrp_price', name: 'products.mrp_price'},
                    {data: 'price', name: 'products.price'},
                    {data: 'in_stock', name: 'products.in_stock'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
