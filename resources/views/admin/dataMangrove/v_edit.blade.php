@extends('layouts.backend')
@section('title','Edit Data')

@section('content')
    <div class="content container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="/admin/update/{{ $mangrove->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Lokasi RHL </label>
                                    <input name="lokasi_rhl" class="form-control" value="{{ $mangrove->lokasi_rhl }}">
                                    <div class="text-danger">
                                        @error('lokasirhl')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Kabupaten </label>
                                    <input name="kabupaten" class="form-control" value="{{ $mangrove->kabupaten }}" >
                                    <div class="text-danger">
                                        @error('kabupaten')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Kecamatan </label>
                                    <input name="kecamatan" class="form-control" value="{{ $mangrove->kecamatan }}">
                                    <div class="text-danger">
                                        @error('kecamatan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Desa </label>
                                    <input name="desa" class="form-control" value="{{ $mangrove->desa }}">
                                    <div class="text-danger">
                                        @error('desa')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Luas (Ha) </label>
                                    <input name="luas" class="form-control" type="number" value="{{ $mangrove->luas }}" min="0">
                                    <div class="text-danger">
                                        @error('luas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Kondisi </label>
                                    <input name="kondisi" class="form-control" value="{{ $mangrove->kondisi }}">
                                    <div class="text-danger">
                                        @error('kondisi')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Latitude </label>
                                    <input name="latitude" class="form-control" value="{{ $mangrove->latitude }}">
                                    <div class="text-danger">
                                        @error('latitude')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Longitude </label>
                                    <input name="longitude" class="form-control" value="{{ $mangrove->longitude }}">
                                    <div class="text-danger">
                                        @error('longitude')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Keterangan </label>
                                    <input name="ket" class="form-control" value="{{ $mangrove->ket }}">
                                    <div class="text-danger">
                                        @error('ket')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <img src="{{ url('dokumentasi/'.$mangrove->filename) }}" style="width: 200px;" alt="">
                                </div>
                                <div class="col-sm-8">
                                        <div class="form-group">
                                            <label> Ganti Foto Dokumentasi </label>
                                            <input type="file" name="foto" class="form-control">
                                            <div class="text-danger">
                                                @error('filename')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Simpan</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
