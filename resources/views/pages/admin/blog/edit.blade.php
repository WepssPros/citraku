@extends('layouts.admin')

@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Berita / Artikel {{$blog->header_name}}</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.blog.update', $blog->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Tambahkan metode PUT untuk mengindikasikan edit -->
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
                                        placeholder="Masukkan Judul Artikel"
                                        value="{{ old('header_name', $blog->header_name) }}" required
                                        oninput="generateSlug()">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Kategori Artikel</label>
                                    <input type="text" name="category_name" id="category_name" class="form-control"
                                        placeholder="Masukkan Kategori Artikel"
                                        value="{{ old('category_name', $blog->category_name) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug Blog</label>
                                    <input type="text" name="slug" id="slug" class="form-control" readonly
                                        placeholder="Masukkan Kategori Artikel" value="{{ old('slug', $blog->slug) }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="tumbnail">Unggah Thumbnail (kosongkan jika tidak ingin mengubah)</label>
                                    <input type="file" name="tumbnail" id="tumbnail" class="form-control">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Detail Konten -->
                            <div id="content-part" class="content" role="tabpanel"
                                aria-labelledby="content-part-trigger">
                                <div class="form-group">
                                    <label for="blog_content">Konten Artikel</label>
                                    <textarea name="blog_content" class="form-control" id="summernote"
                                        placeholder="Masukkan Konten Artikel"
                                        required>{{ old('blog_content', $blog->blog_content) }}</textarea>
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
    function generateSlug() {
    const headerNameInput = document.getElementById('header_name');
    const slugInput = document.getElementById('slug');

    // Ambil nilai dari header_name
    let headerValue = headerNameInput.value;

    // Hapus karakter non-alfanumerik dan ganti spasi dengan tanda hubung
    let slugValue = headerValue.trim().toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter non-alfanumerik
        .replace(/\s+/g, '-') // Ganti spasi dengan tanda hubung
        .replace(/-+/g, '-'); // Ganti beberapa tanda hubung dengan satu tanda hubung

    // Setel slugInput dengan nilai yang dihasilkan
    slugInput.value = slugValue;
}
</script>
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