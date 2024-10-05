@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Database BAPEDA Master Rukun Tetang (RT)</h3>
                    </div>

                    <div class="card-header">

                        <div class="card-tools">
                            <a href="{{ route('dashboard.rt.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah RT Baru
                            </a>
                        </div>
                    </div>
                    <style>
                        .table th {
                            background-color: #f8f9fa;
                            /* Warna latar belakang header */
                            text-align: center;
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
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th rowspan="2">NO</th>
                                    <th rowspan="2">Luas (HA)</th>
                                    <th colspan="2" class="text-center">Lingkup Administrasi</th>
                                    <th colspan="3" class="text-center">Kependudukan</th>
                                    <th colspan="4" class="text-center">Kekumuhan Pertimbangan Lain</th>
                                    <th rowspan="2">Legalitas Tanah</th>
                                    <th rowspan="2">Prioritas</th>
                                    <th rowspan="2">color</th>
                                    <th rowspan="2">Cordinat</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>RT</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Jumlah</th>
                                    <th>Kepadatan</th>
                                    <th>Nilai Kekumuhan</th>
                                    <th>Tingkat Status</th>
                                    <th>Nilai</th>
                                    <th>Tingkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rts as $index => $rt)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor otomatis -->
                                    <td>{{ $rt->luas_ha }}</td>
                                    <td>{{ $rt->nomor }}</td>
                                    <td>{{ $rt->kelurahan->nama }}</td>
                                    <td>{{ $rt->kecamatan->nama }}</td>
                                    <td>{{ $rt->jumlah_jiwa }}</td>
                                    <td>{{ $rt->kepadatan }} Jiwa / HA</td>
                                    <td>{{ $rt->nilai_kekumuhan }}</td>
                                    <td>
                                        <span class="badge bg-warning" data-bs-toggle="tooltip" title="">
                                            {{$rt->tingkat_status}}
                                        </span>
                                    </td>
                                    <td>{{ $rt->nilai_pertimbangan_lain }}</td>
                                    <td>{{ $rt->tingkat }}</td>
                                    <td>{{ $rt->legalitas }}</td>
                                    <td>
                                        <span class="badge bg-secondary" data-bs-toggle="tooltip"
                                            title="{{ json_encode(json_decode($rt->koordinat), JSON_PRETTY_PRINT) }}">
                                            {{$rt->prioritas}}
                                        </span>
                                    </td>
                                    <!-- Badge untuk koordinat -->
                                    <td>
                                        <div
                                            style="width: 20px; height: 20px; background-color: {{ $rt->color }}; border-radius: 50%;">
                                        </div>
                                    </td>
                                    <td class="td-left">
                                        <span class="badge bg-secondary" data-bs-toggle="tooltip"
                                            title="{{ json_encode(json_decode($rt->koordinat), JSON_PRETTY_PRINT) }}">
                                            JSON COORDINATE
                                        </span>
                                    </td>
                                    <td class="td-left">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('dashboard.rt.edit', $rt->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('dashboard.rt.destroy', $rt->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this RT?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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
@endsection