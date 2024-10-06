<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{asset('../frontend/img/bg-image.jpg')}}" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white  fw-bold mb-4"
                            style="letter-spacing: 3px; color:  #b9b9b9;font-family: 'Dancing Script',cursive;">
                            Selamat Datang Di</h4>
                        <h1 class="display-2 text-capitalize text-white mb-4"
                            style="color:#b9b9b9;font-family: 'Dancing Script',cursive; font-size: 100px;">
                            Citraku</h1>
                        <p class="mb-5 fs-5" style="border-bottom:1px solid">Citraku adalah Portal <br> Informasi
                            Perencanaan Pengembangan
                            Terpadu Berbasis Geospasial Kota Jambi

                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                href="{{route('geopasial-map')}}">Jelajahi
                                Data Geopasial</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('../frontend/img/bg-image.jpg')}}" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white  fw-bold mb-4"
                            style="letter-spacing: 3px; color:  #b9b9b9;font-family: 'Dancing Script',cursive;">
                            Selamat Datang Di</h4>
                        <h1 class="display-2 text-capitalize text-white mb-4"
                            style="color:#b9b9b9;font-family: 'Dancing Script',cursive; font-size: 100px;">
                            Citraku</h1>
                        <p class="mb-5 fs-5" style="border-bottom:1px solid">Citraku adalah Portal Informasi
                            <br> Perencanaan Pengembangan
                            Terpadu Berbasis Geospasial Kota Jambi

                        </p>

                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                href="{{route('geopasial-map')}}">Jelajahi
                                Data Geopasial</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>