@extends('layout.master')

@section('title', 'Detail Wilayah')


@section('content')

<h1 class="mt-4">Detail Wilayah</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Wilayah</li>
</ol>

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-map-signs mr-1"></i></i>Detail Wilayah</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Wilayah</th>
                        <th>Nama Wisata</th>
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
                            @foreach ($wisata as $item)
                                {{$item->nama}},
                            @endforeach
                        </td>    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
