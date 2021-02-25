<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <title>Login</title>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper mt-5" id="app">
    <div class="container">
      <form autocomplete="off" v-on:submit="login">
        <div class="form-group">
          <label for="">Email/Username</label>
          <input v-model="username" type="text" name="" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input v-model="password" type="password" name="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" v-bind:disabled="loading"><span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Simpan</button>
      </form>
    </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
  <script>
  let app = new Vue({
    el: '#app',
    data: {
      username: '',
      password: '',
      loading: false,
    },
    methods: {
      login: function(e) {
        e.preventDefault();
        this.loading = true;
        
        let vm = this;

        axios.post('/login', { 
          username: this.username,
          password: this.password,
        })
        .then(function (response) {
          vm.loading = false;
          // console.log(response.data);
          // Swal.fire({
          //   icon: 'success',
          //   title: 'Berhasil',
          //   text: 'Login berhasil',
          // })
          // setTimeout(() => {
          //   window.location.href = response.data.redirect;
          // }, 1000)
          window.location.href = response.data.redirect;
        })
        .catch(function (error) {
          vm.loading = false;
          // console.log(error.data);
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Username atau password salah',
          })
        });


      }
    }
  })

</script>
</body>
</html>


