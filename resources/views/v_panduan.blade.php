@extends('layouts.backend')

@section('title','Panduan Penggunaan')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Panduan Penggunaan Aplikasi</h3>
            </div>
            <div class="card-body">
                <b><h6>Admin</h6></b>
                <ul>
                    <li>Admin dapat melakukan Tambah Data, Edit Data, dan Hapus Data.</li>
                    <li>Import gambar dokumentasi hanya dapat dilakukan 1 kali untuk 1 data.</li>
                    <li>Print melalui tombol print pada bagian atas tabel data.</li>
                </ul>
                <b><h6>User</h6></b>
                <ul>
                    <li>User dapat melihat data yang telah diinput oleh Admin Sistem.</li>
                    <li>Print melalui tombol print pada bagian atas tabel data.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
