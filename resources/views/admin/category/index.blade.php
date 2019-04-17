@extends('admin.adminlte')
@section('content')
<div class="container">
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                @if(Session::has('msg'))
                    <div class="alert alert-info">{{Session::get('msg')}}</div>
                @endif
                <form action="{{route('removeCategory')}}" method="post">
                    @csrf
                    <div class="m-2">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                        <hr/>
                    </div>
                <table class="table table-bordered table-hover dataTable" id="categories-table">
                    <thead>
                    <tr>
                        <td><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                        <th>ID</th>
                        <th>Name</th>
                        <th>parent_id</th>
                        <th>action</th>
                    </tr>
                    </thead>

                    </table>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
@section('javascript')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

        <script>
            $(function() {
                $('#categories-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('get.category.datatable') !!}',
                    columns: [
                        {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'parent_id', name: 'parent_id' },
                        {data: 'edit', name: 'edit', orderable: false, searchable: false},
                        // { data: 'created_at', name: 'created_at' },
                        // { data: 'updated_at', name: 'updated_at' }
                    ]
                });
            });
        </script>

@endsection
