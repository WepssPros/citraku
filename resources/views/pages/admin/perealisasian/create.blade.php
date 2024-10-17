@extends('layouts.admin')

@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Perealisasian</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.perealisasian-permasalahan.store') }}" method="POST"
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
                                    <select name="kegiatan_id" id="kegiatan_id" class="form-control selectkegiatan"
                                        style="width: 100%">
                                        <option value="">Pilih Kegiatan Terdata</option>
                                        <!-- Opsi kegiatan akan diisi dengan AJAX -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelurahan_id">Pilih Kawasan Terdata</label>
                                    <select name="kelurahan_id" id="kelurahan_id" class="form-control selectkelurahan"
                                        style="width: 100%">
                                        <option value="">Pilih Kawasan Terdata</option>
                                        @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="opd_program">OPD PROGRAM</label>
                                    <input type="text" name="opd_program" id="opd_program" class="form-control"
                                        placeholder="Masukan OPD PROGRAM " value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="opd_kegiatan">OPD Kegiatan</label>
                                    <input type="text" name="opd_kegiatan" id="opd_kegiatan" class="form-control"
                                        placeholder="Masukan OPD PROGRAM " value="" required>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>

                                <button type="submit" class="btn btn-primary">Kirim perealisasian</button>
                            </div>

                            <!-- Step 2: Detail Konten -->

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
    $('.selectsat_program').select2();
    $('.selectsat_kegiatan').select2();
    $('.selectsat_sub_kegiatan').select2();

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