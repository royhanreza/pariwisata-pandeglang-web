@extends('layout.app')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
@endsection

@section('title', 'Administrator')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrator</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Administrator</li>
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
              <h3 class="card-title">Administrator</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="w-50">
              <form autocomplete="off" v-on:submit="store">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input v-model="name" type="text" class="form-control form-control-sm" id="name" required>
                </div>
                <div class="form-group">
                  <label for="">Username</label>
                  <input v-model="username" type="text" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input v-model="email" type="email" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input v-model="password" type="password" class="form-control form-control-sm" min="8" required>
                </div>
                <div class="form-group">
                  <label for="">Ulang Password</label>
                  <input v-model="confirmPassword" type="password" class="form-control form-control-sm" min="8" required>
                </div>
                <div class="form-group">
                  <label for="">Hak Akses</label>
                  <select v-model="role" name="" id="" class="form-control">
                    <option value="regular">Regular Administrator</option>
                    <option value="super">Super Administrator</option>
                  </select>
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
      name: '{{ $admin->nama }}',
      username: '{{ $admin->username }}',
      email: '{{ $admin->email }}',
      password: '{{ $admin->password }}',
      confirmPassword: '{{ $admin->password }}',
      role: '{{ $admin->hak_akses }}',
      loading: false,
    },
    methods: {
      store: function(e) {
        e.preventDefault();
        if(this.confirmPassword !== this.password) {
          Swal.fire({
            icon: 'warning',
            title: 'Kesalahan',
            text: 'Password tidak sama',
          })
        } else {

          this.loading = true;
          
          let vm = this;
  
          axios.patch('/api/administrator/{{ $admin->id }}', { 
            name: this.name,
            username: this.username,
            email: this.email,
            password: this.password,
            confirmPassword: this.confirmPassword,
            role: this.role,
          })
          .then(function (response) {
            vm.loading = false;
            console.log(response.data);
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Data berhasil disimpan',
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
    }
  })

</script>
@endsection