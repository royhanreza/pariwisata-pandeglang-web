@extends('layout.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
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
              <h3 class="card-title">Tambah Wisata</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="w-50">
              <form autocomplete="off" v-on:submit="store" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Nama Wisata</label>
                  <input v-model="name" type="text" class="form-control form-control-sm" id="name" required>
                </div>
                <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea v-model="description" class="form-control form-control-sm" name="" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Harga Tiket</label>
                  <input v-model="price" type="number" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea v-model="address" class="form-control form-control-sm" name="" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Jam Buka</label>
                  <input v-model="open" type="time" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                  <label for="">Jam Tutup</label>
                  <input v-model="close" type="time" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                  <label for="">Pengelola</label>
                  <select v-model="manager" name="" class="form-control form-control-sm" required>
                    <option value="" selected>Pilih Pengelola</option>
                    @foreach ($managers as $manager)
                      <option value="{{ $manager->id }}">{{ $manager->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Latitude</label>
                  <input v-model="latitude" type="text" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                  <label for="">Longitude</label>
                  <input v-model="longitude" type="text" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                  <label for="">Gambar</label>
                  <input type="file" ref="image" class="form-control form-control-sm" accept=".jpg, .jpeg, .png" v-on:change="handleFileUpload" required>
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
      name: '',
      price: '',
      address: '',
      description: '',
      open: '',
      close: '',
      latitude: '',
      longitude: '',
      // latitude: '-6.309590485094122',
      // longitude: '106.10648730753834',
      manager: '',
      image: '',
      loading: false,
    },
    methods: {
      store: function(e) {
        e.preventDefault();
        this.loading = true;
        
        let vm = this;

        // console.log(vm.$data)
        let inputData = {
          name: this.name,
          price: this.price,
          address: this.address,
          description: this.description,
          open: this.open,
          close: this.close,
          latitude: this.latitude,
          longitude: this.longitude,
          manager: this.manager,
        }

        let formData = new FormData();

        formData.append('data', JSON.stringify(inputData));
        formData.append('image', this.image);


        axios.post('/api/wisata', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
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
              window.location.href = '/wisata';
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


      },
      handleFileUpload: function (){
        this.image = this.$refs.image.files[0];
      }
    }
  })

</script>
@endsection