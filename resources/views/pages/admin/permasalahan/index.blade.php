@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">BAPEDA Profile Permasalahan UTAMA Per/Kelurahan</h3>
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
                        <table class="table table-bordered table-striped table-responsive" id="example1">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Wilayah</th>
                                    <th rowspan="2">Permasalahan</th>
                                    <th colspan="5">Foto</th>
                                    <th colspan="3">Kategori, Tipologi, Karakteristik Pemukiman</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <!-- Sub-kolom untuk Foto -->
                                    <th>Foto 1</th>
                                    <th>Foto 2</th>
                                    <th>Foto 3</th>
                                    <th>Foto 4</th>
                                    <th>Foto 5</th>
                                    <!-- Sub-kolom untuk Kategori, Tipologi, Karakteristik Pemukiman -->
                                    <th>Kategori Kumuh</th>
                                    <th>Tipologi Kumuh</th>
                                    <th>Karakteristik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permasalahans as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <strong>Kelurahan:</strong> {{ $item->kelurahan->nama }}
                                    </td>
                                    <td>
                                        <strong>Permasalahan Utama:</strong> {!! Str::limit($item->permasalahan_utama,
                                        100) !!}
                                    </td>
                                    <!-- Foto-foto -->
                                    <td><img src="{{ Storage::url($item->foto_1) }}" alt="Foto 1" width="100"></td>
                                    <td><img src="{{ Storage::url($item->foto_2) }}" alt="Foto 2" width="100"></td>
                                    <td><img src="{{ Storage::url($item->foto_3) }}" alt="Foto 3" width="100"></td>
                                    <td><img src="{{ Storage::url($item->foto_4) }}" alt="Foto 4" width="100"></td>
                                    <td><img src="{{ Storage::url($item->foto_5) }}" alt="Foto 5" width="100"></td>
                                    <!-- Kategori, Tipologi, dan Karakteristik -->
                                    <td>{{ $item->kategori_kumuh }}</td>
                                    <td>{{ $item->tipologi_kumuh }}</td>
                                    <td style="text-align: center">{{ $item->karakteristik }}</td>
                                    <td class="td-left">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('dashboard.permasalahan.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('dashboard.permasalahan.destroy', $item->id) }}"
                                            method="POST" style="display: inline;">
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