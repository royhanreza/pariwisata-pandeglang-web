@extends('layout.app')

@section('head')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'Pengelola')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengelola</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengelola</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  @verbatim
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Pengelola</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form autocomplete="off">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input v-model="name" type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input v-model="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input v-model="phone" type="text" class="form-control" id="telepon">
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="" id="" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
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
  @endverbatim
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

@endsection

@section('vue')
<script>
  let app = new Vue({
    el: '#app',
    data: {
      name: '',
      email: '',
      phone: '',
      address: '',
    },
    methods: {

    }
  })
</script>
@endsection