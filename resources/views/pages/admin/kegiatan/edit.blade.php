@extends('layouts.admin')
@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Kegiatan Program </h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.kegiatan.update', $kegiatan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Menambahkan metode PUT untuk update -->
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#article-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="article-part"
                                    id="article-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Edit Informasi Kegiatan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#content-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="content-part"
                                    id="content-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Konfirmasi dan Update</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Kegiatan -->
                            <div id="article-part" class="content" role="tabpanel"
                                aria-labelledby="article-part-trigger">
                                <div class="form-group">
                                    <label for="program_id">Pilih Program</label>
                                    <select  name="program_id" id="program_id" class="form-control select2" required>
                                        <option value="">Pilih Program</option>
                                        @foreach ($programs as $program)
                                        <!-- Mengambil daftar program dari controller -->
                                        <option value="{{ $program->id }}"
                                            {{ $kegiatan->program_id == $program->id ? 'selected' : '' }}>
                                            {{$program->header}}/{{ $program->kode }}/{{$program->program}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode">Kode Kegiatan</label>
                                    <input type="text" name="kode" id="kode" class="form-control" readonly
                                        placeholder="Masukkan Kode Kegiatan" value="{{ $kegiatan->kode }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan">Nama Kegiatan</label>
                                    <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                                        placeholder="Masukkan Nama Kegiatan" value="{{ $kegiatan->kegiatan }}" required>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Konfirmasi -->
                            <div id="content-part" class="content" role="tabpanel"
                                aria-labelledby="content-part-trigger">
                                <h4>Konfirmasi Data Kegiatan</h4>
                                <p>Pastikan semua data yang Anda masukkan sudah benar sebelum mengirim.</p>
                                <div class="form-group">
                                    <label for="confirm">Apakah semua data sudah benar?</label>
                                    <input type="checkbox" name="confirm" id="confirm" required>
                                    <label for="confirm">Saya sudah memeriksa semua data.</label>
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="submit" class="btn btn-success">Update Kegiatan</button>
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
</script>
@endsection

@endsection