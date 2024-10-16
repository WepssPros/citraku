@extends('layouts.admin')
@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Program Kegiatan </h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.program.update', $program->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Menggunakan method PUT untuk update -->
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#article-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="article-part"
                                    id="article-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Edit Informasi Artikel</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#content-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="content-part"
                                    id="content-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Submit Jika Selesai</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Artikel -->
                            <div id="article-part" class="content" role="tabpanel"
                                aria-labelledby="article-part-trigger">
                                <div class="form-group">
                                    <label for="header">Pilih Header</label>
                                    <select name="header" id="header" class="form-control select2" required>
                                        <option value="">Pilih Header Data Program</option>
                                        <option value="PUPR" {{ $program->header === 'PUPR' ? 'selected' : '' }}>PUPR
                                        </option>
                                        <option value="PERKIM" {{ $program->header === 'PERKIM' ? 'selected' : '' }}>
                                            PERKIM</option>
                                        <option value="LH" {{ $program->header === 'LH' ? 'selected' : '' }}>LH</option>
                                        <option value="PENDIDIKAN"
                                            {{ $program->header === 'PENDIDIKAN' ? 'selected' : '' }}>PENDIDIKAN
                                        </option>
                                        <option value="KESEHATAN"
                                            {{ $program->header === 'KESEHATAN' ? 'selected' : '' }}>KESEHATAN
                                        </option>
                                        <option value="TRANTIBUM"
                                            {{ $program->header === 'TRANTIBUM' ? 'selected' : '' }}>TRANTIBUM
                                        </option>
                                        <option value="SOSIAL" {{ $program->header === 'SOSIAL' ? 'selected' : '' }}>
                                            SOSIAL</option>
                                        <option value="KUKM" {{ $program->header === 'KUKM' ? 'selected' : '' }}>KUKM
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode">Kode Program</label>
                                    <input type="text" name="kode" id="kode" class="form-control" readonly
                                        placeholder="Masukkan Kode Program" value="{{ $program->kode }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="program">Program Kegiatan</label>
                                    <input type="text" name="program" id="program" class="form-control"
                                        placeholder="Masukkan Program Kegiatan" value="{{ $program->program }}"
                                        required>
                                </div>

                                <button type="submit" class="btn btn-primary">Perbarui Data Program</button>
                            </div>

                            <!-- Step 2: Detail Konten -->
                            <div id="content-part" class="content" role="tabpanel"
                                aria-labelledby="content-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
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