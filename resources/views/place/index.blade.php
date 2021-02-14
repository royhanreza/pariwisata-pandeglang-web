@extends('layout.app')

@section('head')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'Wisata')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Wisata</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Wisata</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Wisata</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{ url('/wisata/create') }}" class="btn btn-primary mb-3">Tambah Data</a>
              <table class="table table-sm table-bordered table-hover w-100 use-datatable">
                <thead>
                <tr>
                  <th>Nama Wisata</th>
                  <th>Alamat</th>
                  <th>Waktu</th>
                  <th>Harga Tiket</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($places as $place) 
                <tr>
                  <td>{{ $place->nama_wisata }}</td>
                  <td>{{ $place->alamat }}</td>
                  <td>{{ $place->jam_buka . ' - ' . $place->jam_tutup }}</td>
                  <td>{{  number_format($place->harga_tiket,0,",",".") }}</td>
                  <td class="text-center">
                    <a href="{{ url('/wisata/edit') . '/' . $place->id }}" class="btn btn-info btn-sm">Ubah</a>
                    <button class="btn btn-danger btn-sm btn-hapus" data-id="{{ $place->id }}">Hapus</button>
                  </td>
                </tr>
                @endforeach

              </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<!-- <script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->
@endsection

@section('pagescript')
<script>
$(function() {
  $('.use-datatable').dataTable();

  $('.btn-hapus').on('click', function() {
    const id = $(this).attr('data-id');
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data akan dihapus",
      icon: 'warning',
      reverseButtons: true,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batalkan',
      showLoaderOnConfirm: true,
      preConfirm: () => {
        return axios.delete('/api/wisata/' + id)
        .then(function (response) {
          console.log(response.data);
        })
        .catch(function (error) {
          console.log(error.data);
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal menghapus data',
          })
        });
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: 'Data berhasil disimpan',
        })
      }
    })

  })
})
</script>
@endsection