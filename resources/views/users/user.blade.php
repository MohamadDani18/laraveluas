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
                    @php
                    $no = 1;
                @endphp
                @foreach ($user as $u)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                        <form action="{{ route('user.destroy', [$u->id]) }}" method="post">
                            <a href="{{ route('user.edit', [$u->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            

                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach              
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
