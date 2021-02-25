@extends('layout.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Pengelola</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form autocomplete="off" v-on:submit="store">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input v-model="name" type="text" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input v-model="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input v-model="phone" type="text" class="form-control" id="telepon" required>
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea v-model="address" name="" id="" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" v-bind:disabled="loading"><span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Simpan</button>
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
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@section('pagescript')
<script>
  let app = new Vue({
    el: '#app',
    data: {
      name: '{{ $manager->nama }}',
      email: '{{ $manager->email }}',
      phone: '{{ $manager->telepon }}',
      address: '{{ $manager->alamat }}',
      loading: false,
    },
    methods: {
      store: function(e) {
        e.preventDefault();
        this.loading = true;
        
        let vm = this;

        axios.patch('/api/pengelola/{{ $manager->id }}', { 
          name: this.name, 
          email: this.email, 
          phone: this.phone, 
          address: this.address, 
        })
        .then(function (response) {
          vm.loading = false;
          // console.log(response.data);
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil disimpan',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              window.location.href = '/pengelola';
            }
          })
        })
        .catch(function (error) {
          vm.loading = false;
          // console.log(error.data);
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal menyimpan data',
          })
        });
      }
    }
  })
</script>
@endsection