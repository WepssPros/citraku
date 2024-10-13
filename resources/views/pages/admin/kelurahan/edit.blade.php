@extends('layouts.admin')

@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Data Kelurahan {{$kelurahan->nama}}</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.kelurahan.update', $kelurahan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Masukan Info Kelurahan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Verifikasi Koordinat & Warna Polygon</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part-1">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part-1"
                                    id="information-part-1-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Verifikasi Legalitas & Status</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Kelurahan -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="kecamatan_id">Pilih Kecamatan Terdata</label>
                                    <select name="kecamatan_id" id="kecamatan_id" class="form-control select2" required>
                                        <option value="">Pilih Kecamatan Terdata</option>
                                        @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}"
                                            {{ $kelurahan->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                                            {{ $kecamatan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Kelurahan</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="Masukan Nama Kelurahan" value="{{ $kelurahan->nama }}" required
                                        readonly>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Detail Koordinat & Warna -->
                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="color">Warna Polygon / MultiPolygon</label>
                                    <input type="color" name="color" id="color" class="form-control"
                                        value="{{ $kelurahan->color }}" required>
                                </div>
                                <select name="marker" id="marker" class="form-control select2" required>
                                    <option value="">Pilih Status Marker</option>
                                    <option value="1">Ya</option> <!-- Menggunakan value true -->
                                    <option value="0">Tidak</option> <!-- Menggunakan value false -->
                                </select>

                                <div class="form-group">
                                    <label for="geojson_file">Upload File GeoJSON</label>
                                    <input type="file" name="geojson_file" id="geojson_file" class="form-control">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah file
                                        GeoJSON yang
                                        ada.</small>
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 3: Verifikasi Legalitas & Status -->
                            <div id="information-part-1" class="content" role="tabpanel"
                                aria-labelledby="information-part-1-trigger">
                                <p>Verifikasi legalitas dan status kelurahan.</p>
                                <!-- Tambahkan informasi tambahan atau opsi verifikasi di sini jika diperlukan -->

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
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
  
  // DropzoneJS Demo Code End
</script>
@endsection

@endsection