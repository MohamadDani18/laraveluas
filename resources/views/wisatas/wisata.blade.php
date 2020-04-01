@extends('layout.master')

@section('title', 'Wisata')


@section('content')

<h1 class="mt-4">Data Wisata</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Wisata</li>
</ol>

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <span>{{ $message }}</span>
</div>
@endif

<a href="{{ route('wisata.create') }}" class="btn btn-primary">Tambah Data</a>

<div class="card mb-4 mt-2">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i>Data Wisata</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Wilayah</th>
                        <th>Jam Buka</th>
                        <th>Jam Tutup</th>
                        <th>Gambar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($wisata as $w)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$w->nama}}</td>
                        <td>{{$w->deskripsi}}</td>
                        <td>{{$w->wilayah->nama}}</td>
                        <td>{{$w->jam_buka}}</td>
                        <td>{{$w->jam_tutup}}</td>
                        <td>
                            <img width="100px" src="{{url('/data_gambar/'.$w->gambar)}}">
                        </td>
                        <td>
                            <form action="{{ route('wisata.destroy', [$w->id]) }}" method="post">
                                <a href="{{ route('wisata.edit', [$w->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            
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
