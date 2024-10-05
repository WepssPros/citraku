@extends('layouts.admin')



@section('admin-content')


<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Permasalahan Per (Kelurahan) </h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.permasalahan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- Step 1 -->
                            <div class="step" data-target="#step-1">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step-1"
                                    id="step-1-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Masukan Info Kelurahan dan Permasalahan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <!-- Step 2 -->
                            <div class="step" data-target="#step-2">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step-2"
                                    id="step-2-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Unggah Foto Permasalahan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <!-- Step 3 -->
                            <div class="step" data-target="#step-3">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step-3"
                                    id="step-3-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Kategori dan Karakteristik Pemukiman</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Kelurahan dan Permasalahan -->
                            <div id="step-1" class="content" role="tabpanel" aria-labelledby="step-1-trigger">
                                <div class="form-group">
                                    <label for="kelurahan_id">Pilih Kelurahan Terdata</label>
                                    <select name="kelurahan_id" id="kelurahan_id" class="form-control select2">
                                        <option value="">Pilih Kelurahan Terdata</option>
                                        @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="permasalahan_utama">Permasalahan Utama</label>
                                    <textarea id="summernote" name="permasalahan_utama" class="form-control"
                                        placeholder="Tulis permasalahan utama di sini...">Tulis permasalahan utama di sini...</textarea>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Unggah Foto Permasalahan -->
                            <div id="step-2" class="content" role="tabpanel" aria-labelledby="step-2-trigger">
                                <div class="form-group">
                                    <label for="foto_1">Unggah Foto 1</label>
                                    <input type="file" name="foto_1" id="foto_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="foto_2">Unggah Foto 2</label>
                                    <input type="file" name="foto_2" id="foto_2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="foto_3">Unggah Foto 3</label>
                                    <input type="file" name="foto_3" id="foto_3" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="foto_4">Unggah Foto 4</label>
                                    <input type="file" name="foto_4" id="foto_4" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="foto_5">Unggah Foto 5</label>
                                    <input type="file" name="foto_5" id="foto_5" class="form-control">
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 3: Kategori dan Karakteristik Pemukiman -->
                            <div id="step-3" class="content" role="tabpanel" aria-labelledby="step-3-trigger">
                                <div class="form-group">
                                    <label for="kategori_kumuh">Kategori Kumuh</label>
                                    <select name="kategori_kumuh" id="kategori_kumuh" class="form-control select2"
                                        style="width: 100%">
                                        <option value="">Pilih Kategori Kumuh</option>
                                        <option value="KUMUH RINGAN">KUMUH RINGAN</option>
                                        <option value="KUMUH SEDANG">KUMUH SEDANG</option>
                                        <option value="KUMUH BERAT">KUMUH BERAT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tipologi_kumuh">Tipologi Kumuh</label>
                                    <select name="tipologi_kumuh" id="tipologi_kumuh" class="form-control select2"
                                        style="width: 100%">
                                        <option value="">Pilih Tipologi Kumuh</option>
                                        <option value="TEPIAN AIR">TEPIAN AIR</option>
                                        <option value="DATARAN RENDAH">DATARAN RENDAH</option>
                                        <option value="DAERAH TERPENCIL">DAERAH TERPENCIL</option>
                                        <option value="PERKOTAAN">PERKOTAAN</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="karakteristik">Karakteristik Pemukiman</label>
                                    <textarea name="karakteristik" id="summernote2" class="form-control textarea-wide"
                                        placeholder="Deskripsikan karakteristik pemukiman...">Deskripsikan karakteristik pemukiman...</textarea>
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        // Summernote
        $('#summernote').summernote({
            height: 400 // Atur tinggi summernote pertama
        });
        $('#summernote2').summernote({
            height: 400 // Atur tinggi summernote kedua
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