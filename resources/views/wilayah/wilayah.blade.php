@extends('layout.master')

@section('title', 'Wilayah')


@section('content')

<h1 class="mt-4">Data wilayah</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Wilayah</li>
</ol>

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <span>{{ $message }}</span>
</div>
@endif

<a href="{{ route('wilayah.create') }}" class="btn btn-primary mb-2">Tambah Data</a>


<div class="card mb-4">
    <div class="card-header"><i class="fas fa-map-signs mr-1"></i></i>Data Wilayah</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Wilayah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($wilayah as $w)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$w->nama}}</td>
                        <td>
                            <form action="{{ route('wilayah.destroy', [$w->id]) }}" method="post">
                                <a href="{{ route('wilayah.edit', [$w->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('wilayah.show', [$w->id])}}" class="btn btn-info btn-sm">Detail</a>

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
