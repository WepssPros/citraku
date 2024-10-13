@extends('layouts.admin')

@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Artikel / Berita</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.penanganan-permasalahan.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#program-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="program-part"
                                    id="program-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Masukkan Program </span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#kegiatan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="kegiatan-part"
                                    id="kegiatan-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Masukan Kegiatan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#subKegiatan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="subKegiatan-part"
                                    id="subKegiatan-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Masukan Sub Kegiatan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#kawasan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="kawasan-part"
                                    id="kawasan-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Pilih Kawasan</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Artikel -->
                            <div id="program-part" class="content" role="tabpanel"
                                aria-labelledby="program-part-trigger">

                                <div class="form-group">
                                    <label for="program_id">Pilih Program Terdata</label>
                                    <select name="program_id" id="program_id" class="form-control selectprogram">
                                        <option value="">Pilih Program Terdata</option>
                                        @foreach ($programs as $program)
                                        <option value="{{ $program->id }}">
                                            {{ $program->header }}/{{$program->kode}}/{{$program->program}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan_id">Pilih Kegiatan Terdata</label>
                                    <select name="kegiatan_id" id="kegiatan_id" class="form-control selectkegiatan">
                                        <option value="">Pilih Kegiatan Terdata</option>
                                        <!-- Opsi kegiatan akan diisi dengan AJAX -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_kegiatan_id">Pilih Sub Kegiatan Terdata</label>
                                    <select name="sub_kegiatan_id" id="sub_kegiatan_id"
                                        class="form-control selectsubkegiatan">
                                        <option value="">Pilih Sub Kegiatan Terdata</option>
                                        <!-- Opsi sub kegiatan akan diisi dengan AJAX -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan_id">Pilih Kawasan Terdata</label>
                                    <select name="kelurahan_id" id="kelurahan_id" class="form-control selectkelurahan">
                                        <option value="">Pilih Kawasan Terdata</option>
                                        @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Detail Konten -->
                            <div id="kegiatan-part" class="content" role="tabpanel"
                                aria-labelledby="kegiatan-part-trigger">
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
                            <div id="subKegiatan-part" class="content" role="tabpanel"
                                aria-labelledby="subKegiatan-part-trigger">
                                <h5>Apakah semua informasi sudah benar?</h5>
                                <p>Periksa kembali detail artikel sebelum mengirim.</p>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="submit" class="btn btn-primary">Kirim Artikel</button>
                            </div>
                            <div id="kawasan-part" class="content" role="tabpanel"
                                aria-labelledby="kawasan-part-trigger">
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
    // Initialize Select2 Elements
    $('.selectprogram').select2();
    $('.selectkegiatan').select2();
    $('.selectsubkegiatan').select2();
    $('.selectkelurahan').select2();
    // Handle change event for program selection
    $('#program_id').change(function() {
    var programId = $(this).val();
            if (programId) {
                $.ajax({
                    url: "{{ route('dashboard.getKegiatan', ':program_id') }}".replace(':program_id', programId),
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#kegiatan_id').empty();
                        $('#kegiatan_id').append('<option value="">Pilih Kegiatan Terdata</option>');
                        $.each(data, function(key, value) {
                            $('#kegiatan_id').append('<option value="' + value.id + '">' + value.kode + ' - ' + value.kegiatan + '</option>');
                        });
                    }
                });
            } else {
                $('#kegiatan_id').empty();
            }
        });


    // Handle change event for kegiatan selection
        $('#kegiatan_id').change(function() {
        var kegiatanId = $(this).val();
        if (kegiatanId) {
            $.ajax({
                url: "{{ route('dashboard.getSubKegiatan', ':kegiatan_id') }}".replace(':kegiatan_id', kegiatanId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#sub_kegiatan_id').empty();
                    $('#sub_kegiatan_id').append('<option value="">Pilih Sub Kegiatan Terdata</option>');
                    $.each(data, function(key, value) {
                        $('#sub_kegiatan_id').append('<option value="' + value.id + '">' + value.kode + ' - ' + value.sub_kegiatan + '</option>');
                    });
                }
            });
        } else {
            $('#sub_kegiatan_id').empty();
        }
    });

});

  
  // DropzoneJS Demo Code End
</script>
@endsection

@endsection