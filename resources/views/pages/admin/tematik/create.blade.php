@extends('layouts.admin')



@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Rukun Tetang (RT) </h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.tematik.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#step1-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step1-part"
                                    id="step1-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Informasi Kecamatan dan Kelurahan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#step2-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step2-part"
                                    id="step2-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Detail Poligon dan Warna</span>
                                </button>
                            </div>


                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Kecamatan dan Kelurahan -->
                            <div id="step1-part" class="content" role="tabpanel" aria-labelledby="step1-part-trigger">

                                <div class="form-group">
                                    <label for="nama_tipe">Tipe Tematik</label>
                                    <input type="text" name="nama_tipe" id="nama_tipe" class="form-control"
                                        placeholder="Masukan Tipe Tematik" required>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 2: Detail Poligon dan Warna -->
                            <div id="step2-part" class="content" role="tabpanel" aria-labelledby="step2-part-trigger">
                                <div class="form-group">
                                    <label for="geojson_file">Upload File GeoJSON</label>
                                    <input type="file" name="geojson_file" id="geojson_file" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="color">Warna Poligon</label>
                                    <input type="color" name="color" id="color" class="form-control" value="#000000">
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
    //Initialize Select2 Elements
    $('.select2').select2()

  })
  
  // DropzoneJS Demo Code End
</script>
@endsection

@endsection