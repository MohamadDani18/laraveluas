@extends('layout.master')

@section('title', 'Tambah Wilayah')


@section('content')

    <h1 class="mt-4">Tambah Data Wilayah</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Wilayah</li>
    </ol>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('wilayah.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Nama Wilayah :</label>
                            <input type="text" name="nama" class="form-control"  autocomplete="off">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

@endsection
