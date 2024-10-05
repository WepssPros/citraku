@extends('layouts.admin')



@section('admin-content')
<style>
    bs-stepper-circle {
        font-size: 12px;
        /* Ukuran font untuk nomor */
        width: 20px;
        /* Ukuran lebar lingkaran */
        height: 20px;
        /* Ukuran tinggi lingkaran */
        line-height: 25px;
        /* Menjaga nomor tetap di tengah */
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        /* Membuat lingkaran */
        background-color: #f8f9fa;
        /* Warna background lingkaran */
    }

    /* Mengecilkan ukuran teks label */
    .bs-stepper-label {
        font-size: 10px;
        /* Ukuran font untuk label */
    }

</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Sub Permasalahan </h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.subpermasalahan.update', $subPermasalahan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Tambahkan ini untuk menandakan bahwa ini adalah permintaan PUT -->
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Informasi Bangunan & Jalan</span>
                                </button>
                            </div>

                            <div class="step" data-target="#information-part1">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part1"
                                    id="information-part-trigger1">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Informasi Air Minum & Drainase Lingkungan</span>
                                </button>
                            </div>

                            <div class="step" data-target="#information-part2">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part2"
                                    id="information-part-trigger2">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Informasi Persampahan & Proteksi Kebakaran</span>
                                </button>
                            </div>

                            <div class="step" data-target="#information-part3">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part3"
                                    id="information-part-trigger3">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Informasi Air Limbah & Legalitas</span>
                                </button>
                            </div>

                            <div class="step" data-target="#information-part4">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part4"
                                    id="information-part-trigger4">
                                    <span class="bs-stepper-circle">5</span>
                                    <span class="bs-stepper-label">Informasi Sosial Ekonomi & Pertimbangan Lain</span>
                                </button>
                            </div>

                            <div class="step" data-target="#information-part5">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part5"
                                    id="information-part-trigger5">
                                    <span class="bs-stepper-circle">6</span>
                                    <span class="bs-stepper-label">Pilih Kelurahan</span>
                                </button>
                            </div>
                        </div>

                        <div class="bs-stepper-content">
                            <!-- Content for step 1 -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="nomor">Bangunan Hunian</label>
                                    <input type="text" name="header_no_1" id="header_no_1" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_1 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_1">Sub Permasalahan Bangunan Hunian</label>
                                    <textarea id="summernote" name="text_1" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_1 }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="nomor">Jalan Lingkungan</label>
                                    <input type="text" name="header_no_2" id="header_no_2" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_2 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_2">Sub Permasalahan Jalan Lingkungan</label>
                                    <textarea id="summernote2" name="text_2" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_2 }}</textarea>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Content for step 2 -->
                            <div id="information-part1" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger1">
                                <div class="form-group">
                                    <label for="nomor">Air Minum</label>
                                    <input type="text" name="header_no_3" id="header_no_3" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_3 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_3">Sub Permasalahan Air Minum</label>
                                    <textarea id="summernote3" name="text_3" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_3 }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="nomor">Drainase Lingkungan</label>
                                    <input type="text" name="header_no_4" id="header_no_4" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_4 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_4">Sub Permasalahan Drainase Lingkungan</label>
                                    <textarea id="summernote4" name="text_4" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_4 }}</textarea>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Content for step 3 -->
                            <div id="information-part2" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger2">
                                <div class="form-group">
                                    <label for="nomor">Persampahan</label>
                                    <input type="text" name="header_no_5" id="header_no_5" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_5 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_5">Sub Permasalahan Persampahan</label>
                                    <textarea id="summernote5" name="text_5" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_5 }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="nomor">Proteksi Kebakaran</label>
                                    <input type="text" name="header_no_6" id="header_no_6" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_6 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_6">Sub Permasalahan Proteksi Kebakaran</label>
                                    <textarea id="summernote6" name="text_6" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_6 }}</textarea>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Content for step 4 -->
                            <div id="information-part3" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger3">
                                <div class="form-group">
                                    <label for="nomor">Air Limbah</label>
                                    <input type="text" name="header_no_7" id="header_no_7" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_7 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_7">Sub Permasalahan Air Limbah</label>
                                    <textarea id="summernote7" name="text_7" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_7 }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="nomor">Legalitas Dan Status Lahan</label>
                                    <input type="text" name="header_no_8" id="header_no_8" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_8 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_8">Sub Permasalahan Legalitas Dan Status Lahan</label>
                                    <textarea id="summernote8" name="text_8" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_8 }}</textarea>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Content for step 5 -->
                            <div id="information-part4" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger4">
                                <div class="form-group">
                                    <label for="nomor">Sosial Ekonomi</label>
                                    <input type="text" name="header_no_9" id="header_no_9" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_9 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_9">Sub Permasalahan Sosial Ekonomi</label>
                                    <textarea id="summernote9" name="text_9" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_9 }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="nomor">Pertimbangan Lain</label>
                                    <input type="text" name="header_no_10" id="header_no_10" class="form-control"
                                        placeholder="Header" value="{{ $subPermasalahan->header_no_10 }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="text_10">Sub Permasalahan Pertimbangan Lain</label>
                                    <textarea id="summernote10" name="text_10" class="form-control"
                                        placeholder="Tulis Sub Permasalahan di sini...">{{ $subPermasalahan->text_10 }}</textarea>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Content for step 6 -->
                            <div id="information-part5" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger5">
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan</label>
                                    <select name="kelurahan_id" class="form-control" required>
                                        @foreach($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}"
                                            {{ $kelurahan->id == $subPermasalahan->kelurahan_id ? 'selected' : '' }}>
                                            {{ $kelurahan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
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
    $(function () {
        // Summernote
        $('#summernote').summernote({
            height: 150 // Atur tinggi summernote pertama
        });
        $('#summernote2').summernote({
            height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote3').summernote({
        height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote4').summernote({
        height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote5').summernote({
        height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote6').summernote({
        height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote7').summernote({
        height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote8').summernote({
        height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote9').summernote({
        height: 150 // Atur tinggi summernote kedua
        });
        $('#summernote10').summernote({
        height: 150 // Atur tinggi summernote kedua
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