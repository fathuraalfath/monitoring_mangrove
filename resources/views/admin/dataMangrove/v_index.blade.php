

@extends('layouts.backend')
@section('title','Data')

@section('content')
<head>
    <style>
        div.dataTables_wrapper {
        width: 1180px;
        margin: 0 auto;
        }
     </style>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
     <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">

     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="{{ asset('leaflet') }}/leaflet.css" />
    <script src="{{ asset('leaflet') }}/leaflet.js"></script>
</head>

<div class="row">
    <div id="map" style="width: 100%; height: 400px;"></div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Laporan Mangrove di Riau</h3>
            </div>
        <!-- /.card-header -->
            <div class="card-body" style="align-content: center;">
                {{-- button tambah --}}
                <a href="/admin/add" class="btn btn-primary btn-sm"> + Tambah</a>
                {{-- button print --}}
                <a href="/admin/print" target="_blank" class="btn btn-warning btn-sm">Print to PDF</a> <br><br>

                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                        {{ session('pesan') }}.
                    </div>
                @endif
                <div id="example_wrapper" class="dt-buttons btn-group flex-wrap">

                    <table id="example" class="table display nowrap dataTable table-bordered table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Lokasi RHL</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Luas (Ha)</th>
                                <th>Kondisi</th>
                                <th>Ket.</th>
                                <th>Dokumentasi</th>
                                <th>File SHP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($mangrove as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->lokasi_rhl }}</td>
                                <td>{{ $data->kabupaten }}</td>
                                <td>{{ $data->kecamatan }}</td>
                                <td>{{ $data->desa }}</td>
                                <td>{{ $data->luas }}</td>
                                <td>{{ $data->kondisi }}</td>
                                <td>{{ $data->ket }}</td>
                                <td><img src="{{ url('dokumentasi/'.$data->filename) }}" width="200px" height="100px"></td>
                                <td>
                                    <a href="/admin/download/{{ urlencode($data->file_shp) }}" class="btn btn-sm btn-primary fa fa-file"> Unduh</a>
                                </td>
                                <td>
                                    <a href="/admin/edit/{{ $data->id }}" class="btn btn-sm btn-warning"> Edit </a> &nbsp;
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $data->id }}">Delete</button>
                                    {{-- <a href="" class="btn btn-sm btn-danger" style="">Delete </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div><!-- /.col -->
<div>
    @foreach ($mangrove as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data di Desa {{ $data->desa }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu ingin hapus Data?&hellip;</p>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                    <a href="/admin/delete/{{ $data->id }}" class="btn btn-outline-light">Yes</a>
                </div>
                <div class="modal-footer justify-content-between">

                </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    @endforeach
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE') }}/dist/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    new DataTable('#example', {
        scrollX: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    });
    // DataTable.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

    // When the "Show Image" button is clicked
    $('#showImageBtn').click(function() {
        // Make an AJAX call to fetch the image data from the server
        $.ajax({
            url: '/get-image-data', // Replace with the URL to fetch the image data from the server
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // The server should respond with the image data in the 'data' variable

                // Create the image element and set its 'src' attribute to the image data
                const image = $('<img>', {
                    src: 'data:image/jpeg;base64,' + data, // Assuming the image data is in base64 format
                    alt: 'Image from Database'
                });

                // Append the image to the 'imageContainer'
                $('#imageContainer').empty().append(image);
            },
            error: function(xhr, status, error) {
                // Handle the error here if the AJAX call fails
                console.error(error);
            }
        });
    });


var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});

var map = L.map('map', {
    center: [0.9353621639167928, 102.62955882963973],
    zoom: 10,
    layers: [peta1]
    });

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var baseMaps = {
    "Grayscale": peta1,
    "Satelltite": peta2,
    "Streets": peta3,
    "Dark": peta4,
    "Maps": tiles,
    };

    var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
</script>
@endsection
