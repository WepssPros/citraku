@extends('layouts.frontend')

@section('navbar-geopasial')
@include('layouts.components.frontend.navbarlight')
@endsection
@section('frontend-content')
<div class="container-fluid about py-6" style="z-index: 8; padding-top : 100px;">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="{{ asset('storage/' . $blog->tumbnail) }}" class="img-fluid w-100 h-100" alt="">
                </div>
            </div>
            <div class="col-lg-7"
                style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                <h5 class="section-about-title pe-3">Bappeda Dalam {{$blog->category_name}}</h5>
                <h2 class="mb-4">{{$blog->header_name}} <span class="text-primary"></span></h1>
                    <p class="mb-4">{!! $blog->blog_content !!}</p>


                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="{{route('blog')}}">Kembali</a>
            </div>
        </div>
    </div>


</div>
<div class="container-fluid packages py-5 " style="">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Bappeda Kota Jambi Dalam Berita</h5>
            <h1 class="mb-4">Berita Terbaru </h1>
            <p class="mb-0">Berita terkini dan artikel dari Bappeda Kota Jambi untuk meningkatkan pemahaman dan
                kesadaran publik mengenai program
                dan kebijakan yang diambil.
            </p>
        </div>
        <div class="packages-carousel owl-carousel">
            @foreach ($reccomendedBlogs as $itemblog)
            <div class="packages-item">
                <div class="packages-img">
                    <img class="card-img-top" src="{{ asset('storage/' . $itemblog->tumbnail) }}" alt="Image"
                        style="width: auto%; height: 300px; object-fit: cover;">
                    <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute"
                        style="width: 100%; bottom: 0; left: 0; z-index: 5;">

                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-calendar-alt text-primary me-2"></i>{{ $itemblog->created_at->format('d M Y') }}</small>
                        <a href="#" class="btn-hover flex-fill text-center text-white border-end py-2"><i
                                class="fa fa-thumbs-up text-primary me-2"></i>1.7K</a>
                        <a href="#" class="btn-hover flex-fill text-center text-white py-2"><i
                                class="fa fa-comments text-primary me-2"></i>1K</a>
                    </div>

                </div>
                <div class="packages-content bg-light">
                    <div class="p-4 pb-0">
                        <h5 class="mb-0">{{Str::limit($itemblog->header_name, 50, '...') }}</h5>
                        <small class="text-uppercase">Posted By: Bappeda Jambi</small>
                        <div class="mb-3">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar-alt text-primary me-2"></i>{{ $itemblog->created_at->format('d M Y') }}</small>
                        </div>
                        <p class="mb-4">{!! Str::limit($itemblog->blog_content, 100, '...') !!}</p>
                    </div>
                    <div class="row bg-primary rounded-bottom mx-0">
                        <div class="col-6 text-start px-0">
                            <a href="{{route('blog.details' , $itemblog->slug)}}"
                                class="btn-hover btn text-white py-2 px-4">Selengkapnya</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
                    // Cek URL saat ini
                    var currentUrl = window.location.href;
                    var targetUrl = "{{ route('geopasial-map') }}";
                    var urlblog = "{{route('blog.details', $slug)}}";
                    // Jika URL saat ini adalah target URL, sembunyikan carousel dan navbar-collapse di semua perangkat
                    if (currentUrl === targetUrl) {
                        document.querySelector('.carousel-header').style.display = 'none';
                        document.querySelector('.navbar-light').style.display = 'none';
                        
                        // Tambahkan kelas khusus pada body agar CSS bisa diatur jika diperlukan
                        document.body.classList.add('geopasial-page');
                    }
                     if (currentUrl === urlblog) {
                        document.querySelector('.carousel-header').style.display = 'none';
                        document.querySelector('.navbar-light').style.display = 'none';
                        
                        // Tambahkan kelas khusus pada body agar CSS bisa diatur jika diperlukan
                     
                    }
                });
</script>
@endsection