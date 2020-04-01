@extends('layout.master')

@section('title', 'Edit Wisata')


@section('content')

    <h1 class="mt-4">Edit Data Wisata</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Wisata</li>
    </ol>

    <div class="card">
        <div class="card-body">
            @foreach ($wisata as $w)
            <form action="{{ route('wisata.update', [$w->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{ method_field('PUT') }}
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Nama :</label>
                        <input type="text" name="nama" class="form-control"  value="{{$w->nama}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Wilayah :</label>
                            <select name="wilayah_id" class="form-control" id="">
                                    <option value="">Pilih Wilayah</option>
                                @foreach ($wilayah as $item)
                                    <option value="{{$item->id}}"
                                    @if ($w->wilayah_id == $item->id)
                                        selected
                                    @endif
                                        >{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Deskripsi :</label>
                            <textarea name="deskripsi" rows="3" class="form-control">{{$w->deskripsi}}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>Jam Buka :</label>
                            <input type="time" name="jam_buka" class="form-control" value="{{$w->jam_buka}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>Jam Tutup :</label>
                            <input type="time" name="jam_tutup" class="form-control" value="{{$w->jam_tutup}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <img width="150px" src="{{url('/data_gambar/'.$w->gambar)}}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Ubah Gambar :</label>
                            <input type="file" name="gambar" class="form-control-file" autocomplete="off">
                        </div>
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>             
        </div>
    </div>

@endsection