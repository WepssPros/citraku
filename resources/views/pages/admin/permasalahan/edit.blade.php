@extends('layouts.admin')



@section('admin-content')


<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Permasalahan Per (Kelurahan) </h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.permasalahan.update', $permasalahan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Tambahkan method PUT untuk pembaruan -->
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
                                        <option value="{{ $kelurahan->id }}"
                                            {{ $kelurahan->id == $permasalahan->kelurahan_id ? 'selected' : '' }}>
                                            {{ $kelurahan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="permasalahan_utama">Permasalahan Utama</label>
                                    <textarea id="summernote" name="permasalahan_utama" class="form-control"
                                        placeholder="Tulis permasalahan utama di sini...">{{ $permasalahan->permasalahan_utama }}</textarea>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Unggah Foto Permasalahan -->
                            <div id="step-2" class="content" role="tabpanel" aria-labelledby="step-2-trigger">
                                @for ($i = 1; $i <= 5; $i++) <div class="form-group">
                                    <label for="foto_{{ $i }}">Unggah Foto {{ $i }}</label>
                                    <input type="file" name="foto_{{ $i }}" id="foto_{{ $i }}" class="form-control">
                                    @if ($permasalahan->{"foto_$i"})
                                    <img src="{{ Storage::url($permasalahan->{"foto_$i"}) }}" alt="Foto {{ $i }}"
                                        style="max-width: 100px;">
                                    @endif
                            </div>
                            @endfor

                            <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>

                        <!-- Step 3: Kategori dan Karakteristik Pemukiman -->
                        <div id="step-3" class="content" role="tabpanel" aria-labelledby="step-3-trigger">
                            <div class="form-group">
                                <label for="kategori_kumuh">Kategori Kumuh</label>
                                <select name="kategori_kumuh" id="kategori_kumuh" class="form-control select2"
                                    style="width: 100%">
                                    <option value="">Pilih Kategori Kumuh</option>
                                    <option value="KUMUH RINGAN"
                                        {{ $permasalahan->kategori_kumuh == 'KUMUH RINGAN' ? 'selected' : '' }}>KUMUH
                                        RINGAN</option>
                                    <option value="KUMUH SEDANG"
                                        {{ $permasalahan->kategori_kumuh == 'KUMUH SEDANG' ? 'selected' : '' }}>KUMUH
                                        SEDANG</option>
                                    <option value="KUMUH BERAT"
                                        {{ $permasalahan->kategori_kumuh == 'KUMUH BERAT' ? 'selected' : '' }}>
                                        KUMUH BERAT</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tipologi_kumuh">Tipologi Kumuh</label>
                                <select name="tipologi_kumuh" id="tipologi_kumuh" class="form-control select2"
                                    style="width: 100%">
                                    <option value="">Pilih Tipologi Kumuh</option>
                                    <option value="TEPIAN AIR"
                                        {{ $permasalahan->tipologi_kumuh == 'TEPIAN AIR' ? 'selected' : '' }}>
                                        TEPIAN AIR</option>
                                    <option value="DATARAN RENDAH"
                                        {{ $permasalahan->tipologi_kumuh == 'DATARAN RENDAH' ? 'selected' : '' }}>
                                        DATARAN RENDAH
                                    </option>
                                    <option value="DAERAH TERPENCIL"
                                        {{ $permasalahan->tipologi_kumuh == 'DAERAH TERPENCIL' ? 'selected' : '' }}>
                                        DAERAH TERPENCIL
                                    </option>
                                    <option value="PERKOTAAN"
                                        {{ $permasalahan->tipologi_kumuh == 'PERKOTAAN' ? 'selected' : '' }}>
                                        PERKOTAAN</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="karakteristik_pemukiman">Karakteristik Pemukiman</label>
                                <textarea name="karakteristik" id="summernote2" class="form-control "
                                    placeholder="Deskripsikan karakteristik pemukiman...">{{ $permasalahan->karakteristik }}</textarea>
                            </div>

                            <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
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