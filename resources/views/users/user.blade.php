@extends('layout.master')

@section('title', 'User')


@section('content')

<h1 class="mt-4">Data Users</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Users</li>
</ol>

<a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Tambah Data</a>


<div class="card mb-4">
    <div class="card-header"><i class="fas fa-user-alt mr-1"></i>Data Users</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>                
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
