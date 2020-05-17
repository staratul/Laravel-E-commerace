@extends('admin.layouts.sidebar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Units</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Units</li>
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
                <button type="button" class="btn btn-default ml-2" data-toggle="modal" data-target="#units-modal"><i class="fas fa-plus"></i> Add</button>
                <div class="col-md-12 my-3">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Units</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="unit-table" class="table table-bordered">
                            <thead>
                            <tr>
                              <th>S No</th>
                              <th>Unit</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                              <th>S No</th>
                              <th>Unit</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

      @include('admin.pages.modals.units_modal');
@endsection


@push('scripts')
      <script>
          $(function () {
            $('#unit-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('units.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'unit', name: 'unit'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
      </script>
      <script>
          $("#units-form").validate();

            const addUnit = (url, method, msg) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#units-form-submit").attr("disabled", "disabled")
                // Submit Form data using ajax
                $.ajax({
                    url: url,
                    method: method,
                    data: $("#units-form").serialize(),
                    success: function(response) {
                        toastr.success(msg);
                        var table = $('#unit-table').DataTable();
                        table.draw();
                        $("#units-form").trigger("reset");
                        $("#units-modal").modal("hide");
                        $("#unitid").val(undefined);
                        $(".modal-title").text("Add Unit");
                        $("#units-form-submit").removeAttr("disabled")
                    },
                    error: function(reject) {
                        $.each(reject.responseJSON.errors, function (key, item)
                        {
                            toastr.error(item);
                        });
                        $("#units-form-submit").removeAttr("disabled")
                    }
                });
            }

            // Form submit add - update
          $("#units-form").submit(function(e) {
              e.preventDefault();
              id = Number($("#unitid").val());
              if(id) {
                if($("#units-form").valid()) {
                    addUnit("{{ url('api/admin/units') }}/"+id, "put", "Unit updated successfully.");
                }
              } else {
                if($("#units-form").valid()) {
                    addUnit("{{ route('units.store') }}", "post", "Unit added successfully.");
                }
              }
          });

          const editUnit = (id) => {
            $.ajax({
                url: "{{ url('api/admin/units') }}/"+id+"/edit",
                method: 'get',
                success: function(response) {
                    console.log(response);
                    $("#units-form").trigger("reset");
                    $(".modal-title").text("Update Unit");
                    $("#unitid").val(id);
                    $("#units").val(response.unit);
                    $("#units-modal").modal("show");
                },
            });
          }

          const deleteUnit = (id) => {
            if(confirm("Are you sure, You want to delete this unit?")) {
                $.ajax({
                    url: "{{ url('api/admin/units') }}/"+id,
                    method: 'delete',
                    success: function(response) {
                        var table = $('#unit-table').DataTable();
                        table.draw();
                        toastr.success("Unit deleted successfully.");
                    },
                });
            } else {
                return false;
            }
          }

          const statusUnit = (id, status) => {
            $.ajax({
                    url: "{{ url('api/admin/units/status') }}/"+id+"/"+status,
                    method: 'get',
                    success: function(response) {
                        var table = $('#unit-table').DataTable();
                        table.draw();
                        toastr.success("Unit status updated successfully.");
                    },
                });
          }
      </script>
@endpush
