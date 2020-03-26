@extends('layout.master')

@section('title', 'Edit Wilayah')


@section('content')

    <h1 class="mt-4">Edit Data Wilayah</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Wilayah</li>
    </ol>

    <div class="card">
        <div class="card-body">
            @foreach ($wilayah as $w)
            <form action="{{ route('wilayah.update', [$w->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{ method_field('PUT') }}
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Nama Wilayah :</label>
                        <input type="text" name="nama" class="form-control"  value="{{$w->nama}}" autocomplete="off">
                        </div>
                    </div>

                </div>
                @endforeach
                <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>

@endsection
