@extends('layout.master')

@section('title', 'User')


@section('content')

<h1 class="mt-4">Data Users</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Users</li>
</ol>

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <span>{{ $message }}</span>
</div>
@endif

<a href="{{ route('user.create') }}" class="btn btn-primary mb-2"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Data</a>


<div class="card mb-4">
    <div class="card-header"><i class="fas fa-user-alt mr-1"></i>Data Users</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            ajax: {url:"{{ route('user.index') }}"},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action',orderable : false, searchable: false}
            ]
          });
        });
    // function deleteRow(id) {
    //     swal({
    //         title: "Are you sure?",
    //         text: "Once deleted, you will not be able to recover this data!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     }).then((willDelete) => {
    //         if (willDelete) {
    //             $('#data-' + id).submit();
    //         }
    //     })
    // }
</script>
@endsection
