

@extends('layouts.auth')

@section('auth-content')
<section>
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang Di</h3>
                            <h3 class="font-weight-bolder text-info text-gradient">Portal Register Citraku</h3>
                            <p class="mb-0">Masukan Email, Nama, Dan Password Kamu </p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <label>Nama</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" required
                                        name="name" aria-describedby="Nama-addon">
                                </div>
                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" required
                                        name="email" aria-describedby="email-addon">
                                </div>
                                <label>Password</label>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required
                                        aria-label="Password" aria-describedby="password-addon">
                                </div>
                                <label>Password Konfirmasi</label>
                                <div class="mb-3"> 
                                    <input type="password" class="form-control" placeholder="Password" required
                                        name="password_confirmation" aria-label="Password"
                                        aria-describedby="password-addon">
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-info w-100 mt-4 mb-0">Registrasi</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                Sudah Punya Akun ? Silahkan
                                <a href="{{route('login')}}"
                                    class="text-info text-gradient font-weight-bold">Login</a>
                                Disini
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-2 ms-n6"
                            style="background-image:url('../frontend/img/bg-image.jpg')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection