@extends('layouts.admin')

@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Data Rukun Tetangga (RT)</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.rt.update', $rt->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Masukan Info Kelurahan Dan Kecamatan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Verfikasi RT Koordinat & Warna Polygone</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part-1">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part-1"
                                    id="information-part-1-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Verfikasi Legalitas, Tingkat Status &
                                        Prioritas</span>
                                </button>
                            </div>
                        </div>

                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Kecamatan dan Kelurahan -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="kecamatan_id">Pilih Kecamatan Terdata</label>
                                    <select name="kecamatan_id" id="kecamatan_id" class="form-control select2">
                                        <option value="">Pilih Kecamatan Terdata</option>
                                        @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}"
                                            {{ $rt->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                                            {{ $kecamatan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan_id">Pilih Kelurahan Terdata</label>
                                    <select name="kelurahan_id" id="kelurahan_id" class="form-control select2">
                                        <option value="">Pilih Kelurahan Terdata</option>
                                        @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}"
                                            {{ $rt->kelurahan_id == $kelurahan->id ? 'selected' : '' }}>
                                            {{ $kelurahan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Detail RT -->
                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="nomor">Nomor RT</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control"
                                        placeholder="Masukan Nomor RT" value="{{ $rt->nomor }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_kk">Jumlah KK</label>
                                    <input type="text" name="jumlah_kk" id="jumlah_kk"
                                        placeholder="Masukan Jumlah Kepala Keluarga (KK)" value="{{ $rt->jumlah_kk }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="luas_ha">Luas (HA)</label>
                                    <input type="text" name="luas_ha" id="luas_ha" placeholder="Masukan Luas RT (HA)"
                                        value="{{ $rt->luas_ha }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="color">Warna Polygon / MultiPolygon</label>
                                    <input type="color" name="color" id="color" class="form-control"
                                        value="{{ $rt->color }}">
                                </div>

                                <div class="form-group">
                                    <label for="geojson_file">Upload File GeoJSON</label>
                                    <input type="file" name="geojson_file" id="geojson_file" class="form-control">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file
                                        GeoJSON</small>
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 3: Verifikasi Koordinat & Marker -->
                            <div id="information-part-1" class="content" role="tabpanel"
                                aria-labelledby="information-part-1-trigger">
                                <div class="form-group">
                                    <label for="nilai">Nilai Ambang Pemukiman</label>
                                    <input type="text" name="nilai" id="nilai" value="{{ $rt->nilai }}"
                                        placeholder="Masukan Nilai Ambang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat">Pilih Tingkat Pemukiman</label>
                                    <select name="tingkat" id="tingkat" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">Pilih Tingkat Pemukiman</option>
                                        <option value="Tinggi" {{ $rt->tingkat == 'Tinggi' ? 'selected' : '' }}>Tinggi
                                        </option>
                                        <option value="Sedang" {{ $rt->tingkat == 'Sedang' ? 'selected' : '' }}>Sedang
                                        </option>
                                        <option value="Rendah" {{ $rt->tingkat == 'Rendah' ? 'selected' : '' }}>Rendah
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat_status">Pilih Tingkat Status Pemukiman</label>
                                    <select name="tingkat_status" id="tingkat_status" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">Pilih Status Pemukiman</option>
                                        <option value="KUMUH RINGAN"
                                            {{ $rt->tingkat_status == 'KUMUH RINGAN' ? 'selected' : '' }}>
                                            KUMUH RINGAN</option>
                                        <option value="KUMUH SEDANG"
                                            {{ $rt->tingkat_status == 'KUMUH SEDANG' ? 'selected' : '' }}>
                                            KUMUH SEDANG</option>
                                        <option value="KUMUH TINGGI"
                                            {{ $rt->tingkat_status == 'KUMUH TINGGI' ? 'selected' : '' }}>
                                            KUMUH TINGGI</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prioritas">Pilih Tingkat Prioritas</label>
                                    <select name="prioritas" id="prioritas" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">Pilih Tingkat Prioritas</option>
                                        <option value="C1/3" {{ $rt->prioritas == 'C1/3' ? 'selected' : '' }}>C1/3
                                        </option>
                                        <option value="B1/2" {{ $rt->prioritas == 'B1/2' ? 'selected' : '' }}>B1/2
                                        </option>
                                        <option value="A1/1" {{ $rt->prioritas == 'A1/1' ? 'selected' : '' }}>A1/1
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="legalitas">Pilih Legalitas RT</label>
                                    <select name="legalitas" id="legalitas" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">Pilih Legalitas RT</option>
                                        <option value="LEGAL" {{ $rt->legalitas == 'LEGAL' ? 'selected' : '' }}>LEGAL
                                        </option>
                                        <option value="ILEGAL" {{ $rt->legalitas == 'ILEGAL' ? 'selected' : '' }}>ILEGAL
                                        </option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="submit" class="btn btn-primary">Update</button>
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
    function toggleVerification(checkbox) {
        // Ubah nilai verified berdasarkan status tombol switch
        var verifiedValue = checkbox.checked ? '1' : '0';
        // Update nilai input hidden atau kirim nilai ke server
        document.getElementById('verified').value = verifiedValue;
    }
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

// Update the label of the custom file input with the selected file name
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    // Inisialisasi CKEditor pada textarea dengan ID 'hasil_inspeksi'
    CKEDITOR.replace('hasil_inspeksi');
</script>

@endsection

@endsection