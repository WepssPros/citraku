@extends('layouts.admin')
<style>
    @media print {
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            /* Pastikan ada border */
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        /* Sesuaikan ukuran font jika diperlukan */
        body {
            font-size: 12px;
        }

        /* Hapus elemen yang tidak diperlukan dalam print seperti tombol */
        .buttons-print,
        .no-print {
            display: none !important;
        }

        /* Atur tampilan responsive di print */
        .table-responsive {
            overflow: visible !important;
        }
    }

</style>
<!-- Tambahkan link CSS AdminLTE dan Bootstrap 5 -->

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Database Program / Kegiatan / Sub Kegiatan}
                            TAHUN 2025 - 2029</h3>

                    </div>
                    <style>
                        .table th {
                            background-color: #f8f9fa;
                            /* Warna latar belakang header */
                            text-align: center;
                            font-size: 13px;
                            /* Rata tengah */
                        }

                        .table td {
                            vertical-align: middle;
                            /* Rata tengah secara vertikal */
                            text-align: center;
                            font-size: 14px;
                            font-weight: 500;
                        }

                    </style>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped compact table-responsive"
                            border="1" style="width: 100%">
                            <thead>
                                <tr>
                                    <th colspan="5">Kode</th>
                                    <th rowspan="2">Nomeklatur urusan Kabupaten / Kota</th>
                                    <th rowspan="2">Kinerja</th>
                                    <th rowspan="2">Indikator</th>
                                    <th rowspan="2">Satuan</th>
                                    <th rowspan="2">Action</thr>


                                </tr>
                                <tr>
                                    <th>NO</th>
                                    <th>Header</th>
                                    <th>PROGRAM</th>
                                    <th>KEGIATAN</th>
                                    <th>SUB KEGIATAN</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($programs as $item)
                                <tr>
                                    <td>1</td>
                                    <td>{{$item->header}}</td>
                                    <td>{{$item->kode}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <!-- Opsi edit dengan ikon -->
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard.program.edit', $item->id) }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </li>
                                                <!-- Opsi delete dengan ikon -->
                                                <li>
                                                    <form action="{{ route('dashboard.program.destroy', $item->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('dashboard.program.destroy', $item->id) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item text-danger"
                                                                onclick="confirmDeleteProgram('{{ $item->id }}')">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                                @foreach ($kegiatans as $itemkegiatan)
                                <tr>
                                    <td>1</td>
                                    <td>{{$itemkegiatan->program->header}}</td>
                                    <td>{{$itemkegiatan->program->kode}}</td>
                                    <td>{{$itemkegiatan->kode}}</td>
                                    <td></td>
                                    <td>{{$itemkegiatan->kegiatan}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <!-- Opsi edit dengan ikon -->
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard.kegiatan.edit', $itemkegiatan->id) }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </li>
                                                <!-- Opsi delete dengan ikon -->
                                                <li>
                                                    <form
                                                        action="{{ route('dashboard.kegiatan.destroy', $itemkegiatan->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <form id="delete-form-{{ $itemkegiatan->id }}"
                                                            action="{{ route('dashboard.kegiatan.destroy', $itemkegiatan->id) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item text-danger"
                                                                onclick="confirmDeleteKegiatan('{{ $itemkegiatan->id }}')">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                @foreach ($subkegiatans as $itemsub)
                                <tr>
                                    <td>1</td>
                                    <td>{{$itemsub->kegiatan->program->header}}</td>
                                    <td>{{$itemsub->kegiatan->program->kode}}</td>
                                    <td>{{$itemsub->kegiatan->kode}}</td>
                                    <td>{{$itemsub->kode}}</td>
                                    <td>{{$itemsub->sub_kegiatan}}</td>
                                    <td>{{$itemsub->kinerja}}</td>
                                    <td>{{$itemsub->indikator}}</td>
                                    <td>{{$itemsub->satuan}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <!-- Opsi edit dengan ikon -->
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard.subkegiatan.edit', $itemsub->id) }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </li>
                                                <!-- Opsi delete dengan ikon -->
                                                <li>
                                                    <form
                                                        action="{{ route('dashboard.subkegiatan.destroy', $itemsub->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <form id="delete-form-{{ $itemsub->id }}"
                                                            action="{{ route('dashboard.subkegiatan.destroy', $itemsub->id) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item text-danger"
                                                                onclick="confirmDeleteSubKegiatan('{{ $itemsub->id }}')">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach



                            </tbody>

                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@section('js-script')

<!-- Tambahkan script JS AdminLTE dan Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(function () {
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "buttons": [
                {
                    text: '<i class="fas fa-plus"></i> Tambah Data Program',
                    className: 'btn btn-primary',
                    action: function (e, dt, node, config) {
                        window.location.href = '{{ route("dashboard.program.create") }}';
                    }
                },
                {
                    text: '<i class="fas fa-plus"></i> Tambah Data Kegiatan',
                    className: 'btn btn-warning',
                    action: function (e, dt, node, config) {
                        window.location.href = '{{ route("dashboard.kegiatan.create") }}';
                    }
                },
                {
                    text: '<i class="fas fa-plus"></i> Tambah Data Sub-Kegiatan',
                    className: 'btn btn-success',
                    action: function (e, dt, node, config) {
                        window.location.href = '{{ route("dashboard.subkegiatan.create") }}';
                    }
                },
                // Tombol lainnya dari DataTable
               "excel", "pdf", "print", 
            ],
           
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    function confirmDeleteProgram(id) {
        // Panggil SweetAlert
        Swal.fire({
            title: 'Apakah kamu yakin ingin menghapus Program ini ?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna menekan tombol 'Ya, hapus!'
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

<script>
    function confirmDeleteKegiatan(id) {
        // Panggil SweetAlert
        Swal.fire({
            title: 'Apakah kamu yakin ingin menghapus Kegiatan ini ?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna menekan tombol 'Ya, hapus!'
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

<script>
    function confirmDeleteSubKegiatan(id) {
        // Panggil SweetAlert
        Swal.fire({
            title: 'Apakah kamu yakin Ingin Menghapus Sub-Kegiatan ini ?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna menekan tombol 'Ya, hapus!'
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
@endsection