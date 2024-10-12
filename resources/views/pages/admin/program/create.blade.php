@extends('layouts.admin')



@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Artikel / Berita</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#article-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="article-part"
                                    id="article-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Masukkan Informasi Artikel</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#content-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="content-part"
                                    id="content-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Detail Konten Artikel</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#confirmation-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="confirmation-part"
                                    id="confirmation-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Konfirmasi & Kirim</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Artikel -->
                            <div id="article-part" class="content" role="tabpanel"
                                aria-labelledby="article-part-trigger">
                                <div class="form-group">
                                    <label for="header_name">Judul Artikel</label>
                                    <input type="text" name="header_name" id="header_name" class="form-control"
                                        placeholder="Masukkan Judul Artikel" required>
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Kategori Artikel</label>
                                    <input type="text" name="category_name" id="category_name" class="form-control"
                                        placeholder="Masukkan Kategori Artikel" required>
                                </div>
                                <div class="form-group">
                                    <label for="tumbnail">Unggah Thumbnail</label>
                                    <input type="file" name="tumbnail" id="tumbnail" class="form-control" required>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Detail Konten -->
                            <div id="content-part" class="content" role="tabpanel"
                                aria-labelledby="content-part-trigger">
                                <div class="form-group">
                                    <label for="blog_content">Konten Artikel</label>
                                    <textarea name="blog_content" class="form-control" id="summernote"
                                        placeholder="Masukkan Konten Artikel" required></textarea>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 3: Konfirmasi -->
                            <div id="confirmation-part" class="content" role="tabpanel"
                                aria-labelledby="confirmation-part-trigger">
                                <h5>Apakah semua informasi sudah benar?</h5>
                                <p>Periksa kembali detail artikel sebelum mengirim.</p>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="submit" class="btn btn-primary">Kirim Artikel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>


@section('js-script')

<script>
    $(function () {
        // Summernote
        $('#summernote').summernote({
            height: 400 // Atur tinggi summernote pertama
        });
        
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the stepper
        window.stepper = new Stepper(document.querySelector('.bs-stepper'));

        // Update the custom file input label
        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function(e) {
                var fileName = e.target.files[0] ? e.target.files[0].name : "Choose file";
                var nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            });
        });
    });
</script>

<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
  
  // DropzoneJS Demo Code End
</script>
@endsection

@endsection