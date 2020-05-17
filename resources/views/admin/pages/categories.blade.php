@extends('admin.layouts.sidebar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Categories</li>
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
            <button type="button" class="btn btn-default ml-2" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Add</button>
            <div class="col-md-12 my-3">
                <div id="jsGrid"></div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

    @include('admin.pages.modals.categories_modal')

@endsection


@push('scripts')
<script>
    $(function() {
        $("#jsGrid").jsGrid({
            height: "auto",
            width: "100%",
            filtering: true,
            inserting: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete category?",
            controller: {
                loadData: function(filter) {
                    var d = $.Deferred();
                    $.ajax({
                        url: "{{ route('categories.index') }}",
                        method: "GET",
                        data: filter
                    }).done(function(result) {
                        result = $.grep(result, function(item) {
                            return (!filter.category || item.category.indexOf(filter.category) > -1)
                                && (!filter.description || item.description.indexOf(filter.description) > -1)
                                && (!filter.status || item.status.indexOf(filter.status) > -1)
                        });
                        d.resolve(result);
                    });
                    return d.promise();
                },
                insertItem: function(item) {
                    return $.ajax({
                        url: "{{ route('categories.store') }}",
                        method: "POST",
                        data: item,
                        success: function(response) {
                            toastr.success("Category Added Successfull");
                        },
                        error: function(reject) {
                            $.each(reject.responseJSON.errors, function (key, item) {
                                toastr.error(item);
                            });
                        }
                    });
                },
                updateItem: function(item) {
                    return $.ajax({
                        type: "PUT",
                        url: "{{ url('api/admin/categories') }}/"+item.id,
                        data: item,
                        success: function(response) {
                            toastr.success("Category Updated Successfull");
                        },
                        error: function(reject) {
                            $.each(reject.responseJSON.errors, function (key, item) {
                                toastr.error(item);
                            });
                        }
                    });
                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/admin/categories') }}/"+item.id,
                        data: item,
                        success: function(response) {
                            toastr.success("Category Deleted Successfull");
                        },
                    });
                }
            },
            fields: [
                { name: "category", type: "text", width: 150},
                { name: "description", type: "text", width: 200 },
                { name: "status", type: "text", width: 50},
                { type: "control" }
            ],
        });
    });
</script>
<script>
    jQuery(document).ready(function() {
        $("#categories-form").validate();
        $("#categories-form").submit(function(e) {
            e.preventDefault();
            if($("#categories-form").valid()) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#category-form-submit").attr("disabled", "disabled")
                // Submit Form data using ajax
                $.ajax({
                    url: "{{ route('categories.store') }}",
                    method: 'post',
                    data: $('#categories-form').serialize(),
                    success: function(response) {
                        toastr.success("Category Added Successfull");
                        $("#jsGrid").jsGrid({
                            autoload: true
                        });
                        $("#categories-form").trigger("reset");
                        $("#modal-default").modal("hide");
                        $("#category-form-submit").removeAttr("disabled")
                    },
                    error: function(reject) {
                        $.each(reject.responseJSON.errors, function (key, item)
                        {
                            toastr.error(item);
                        });
                        $("#category-form-submit").attr("disabled")
                    }
                });
            }
        });
    });
</script>
@endpush
