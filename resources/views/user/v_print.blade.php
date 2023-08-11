@extends('layouts.backend')
@section('title','Data Monitoring Mangrove')

@section('content')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Data Monitoring Mangrove di Riau</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No.</th>
                <th>Lokasi RHL</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Luas (Ha)</th>
                <th>Kondisi</th>
                {{-- <th>Latitude</th>
                <th>Longitude</th> --}}
                <th>Ket.</th>
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
                                    {{-- <td>{{ Str::substr($data->latitude , 0, 7) }}</td>
                                    <td>{{ Str::substr($data->longitude , 0, 7) }}</td> --}}
                                    <td>{{ $data->ket }}</td>
                                </tr>
                                @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
@endsection
