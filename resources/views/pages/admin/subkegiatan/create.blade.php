@extends('layouts.admin')
@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Sub Kegiatan Program </h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.subkegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#article-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="article-part"
                                    id="article-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Masukkan Informasi Sub Kegiatan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#content-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="content-part"
                                    id="content-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Konfirmasi dan Submit</span>
                                </button>
                            </div>
                        </div>

                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Kegiatan -->
                            <div id="article-part" class="content" role="tabpanel"
                                aria-labelledby="article-part-trigger">
                                <div class="form-group">
                                    <label for="kegiatan_id">Pilih Kegiatan</label>
                                    <select name="kegiatan_id" id="kegiatan_id" class="form-control select2" required>
                                        <option value="">Pilih Kegiatan</option>
                                        @foreach ($kegiatan as $kegiatan)
                                        <option value="{{ $kegiatan->id }}">
                                            {{$kegiatan->program->header}}/{{$kegiatan->program->kode}}/{{$kegiatan->kode}}
                                            /{{$kegiatan->kegiatan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode">Kode Sub Kegiatan</label>
                                    <input type="text" name="kode" id="kode" class="form-control"
                                        placeholder="Masukkan Kode Sub Kegiatan" required>
                                </div>
                                <div class="form-group">
                                    <label for="sub_kegiatan">Sub Kegiatan</label>
                                    <input type="text" name="sub_kegiatan" id="sub_kegiatan" class="form-control"
                                        placeholder="Masukkan Sub Kegiatan" required>
                                </div>
                                <div class="form-group">
                                    <label for="kinerja">Kinerja</label>
                                    <input type="text" name="kinerja" id="kinerja" class="form-control"
                                        placeholder="Masukkan Kinerja" required>
                                </div>
                                <div class="form-group">
                                    <label for="indikator">Indikator</label>
                                    <input type="text" name="indikator" id="indikator" class="form-control"
                                        placeholder="Masukkan indikator" required>
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Pilih Satuan</label>
                                    <select name="satuan" id="satuan" class="form-control select3" required>
                                        <option value="">Pilih Satuan</option>
                                        <optgroup label="Pengukuran Unit">
                                            <option value="Liter/Detik">Liter/Detik</option>
                                            <option value="MÂ³/Hari">MÂ³/Hari</option>
                                            <option value="Ton/hari">Ton/hari</option>
                                            <option value="Orang">Orang</option>
                                            <option value="Rumah Tangga">Rumah Tangga</option>
                                            <option value="KM">KM</option>
                                            <option value="M">M</option>
                                        </optgroup>

                                        <!-- Jenis Dokumen -->
                                        <optgroup label="Jenis Dokumen">
                                            <option value="Dokumen">Dokumen</option>
                                            <option value="Laporan">Laporan</option>
                                            <option value="Publikasi">Publikasi</option>
                                            <option value="Berita Acara">Berita Acara</option>
                                            <option value="Peta">Peta</option>
                                            <option value="Sistem informasi">Sistem informasi</option>
                                            <option value="Rekomendasi">Rekomendasi</option>
                                            <option value="Pengaduan">Pengaduan</option>
                                        </optgroup>

                                        <!-- Berdasarkan Geografi/Lokasi -->
                                        <optgroup label="Berdasarkan Geografi/Lokasi">
                                            <option value="Kawasan">Kawasan</option>
                                            <option value="Kawasan Genangan">Kawasan Genangan</option>
                                            <option value="Kawasan Rawa">Kawasan Rawa</option>
                                            <option value="Titik">Titik</option>
                                            <option value="Bendungan">Bendungan</option>
                                            <option value="Flyover">Flyover</option>
                                            <option value="Jembatan">Jembatan</option>
                                            <option value="Terowongan / Tunel">Terowongan / Tunel</option>
                                            <option value="Underpass">Underpass</option>
                                        </optgroup>

                                        <!-- Kelembagaan/Organisasi -->
                                        <optgroup label="Kelembagaan/Organisasi">
                                            <option value="Lembaga">Lembaga</option>
                                            <option value="Badan Usaha">Badan Usaha</option>
                                        </optgroup>

                                        <!-- Kegiatan dan Dukungan -->
                                        <optgroup label="Kegiatan dan Dukungan">
                                            <option value="Kegiatan">Kegiatan</option>
                                            <option value="Bantuan Teknis">Bantuan Teknis</option>
                                            <option value="Prangkat Pendukung">Prangkat Pendukung</option>
                                            <option value="Layanan Informasi">Layanan Informasi</option>
                                            <option value="Layanan">Layanan</option>
                                            <option value="Unit">Unit</option>
                                            <option value="Unit Rumah">Unit Rumah</option>
                                        </optgroup>

                                        <!-- Tipe Subjek -->
                                        <optgroup label="Tipe Subjek">
                                            <option value="Orang">Orang</option>
                                            <option value="Keluarga">Keluarga</option>
                                            <option value="Rumah Tangga">Rumah Tangga</option>
                                            <option value="Unit Rumah">Unit Rumah</option>
                                            <option value="Entitas">Entitas</option>
                                        </optgroup>

                                        <!-- Data Numerik -->
                                        <optgroup label="Data Numerik">
                                            <option value="Persentase">Persentase</option>
                                            <option value="Ton">Ton</option>
                                            <option value="Ha">Ha</option>
                                            <option value="M2">M2</option>
                                        </optgroup>

                                        <!-- Terkait Proyek -->
                                        <optgroup label="Terkait Proyek">
                                            <option value="Paket Pekerjaan">Paket Pekerjaan</option>
                                            <option value="Bangunan Kontruksi">Bangunan Kontruksi</option>
                                            <option value="Sistem Drainase Lingkungan">Sistem Drainase Lingkungan
                                            </option>
                                            <option value="Sistem Drainase Perkotaan">Sistem Drainase Perkotaan</option>
                                        </optgroup>

                                        <!-- Lainnya -->
                                        <optgroup label="Lainnya">
                                            <option value="Kasus">Kasus</option>
                                        </optgroup>


                                    </select>
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
                                <button type="submit" class="btn btn-success">Buat Kegiatan</button>
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
    $('.select3').select2()

  })
</script>
@endsection

@endsection