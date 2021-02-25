@extends('layout.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
@endsection

@section('title', 'BBM')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>BBM</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">BBM</li>
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
              <h3 class="card-title">Tambah Jenis BBM</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="w-50">
              <form autocomplete="off" v-on:submit="store">
                <div class="form-group">
                  <label for="name">Nama BBM</label>
                  <input v-model="name" type="text" class="form-control form-control-sm" id="name" required>
                </div>
                <div class="form-group">
                  <label for="price">Harga per Liter</label>
                  <input v-model="price" type="number" class="form-control form-control-sm" id="price" required>
                </div>
                <button type="submit" class="btn btn-primary" v-bind:disabled="loading"><span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Simpan</button>
              </form>
              </div>
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
      name: '{{ $fuel->nama_bbm }}',
      price: '{{ $fuel->harga_bbm }}',
      loading: false,
    },
    methods: {
      store: function(e) {
        e.preventDefault();
        this.loading = true;
        
        let vm = this;

        axios.patch('/api/bbm/{{ $fuel->id }}', { 
          name: this.name,
          price: this.price,
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
              window.location.href = '/bbm';
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