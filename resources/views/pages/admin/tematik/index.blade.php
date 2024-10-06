@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Database BAPEDA Master Tematik Map </h3>
                    </div>

                    <div class="card-header">

                        <div class="card-tools">
                            <a href="{{ route('dashboard.tematik.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Tematik Map
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Tematik</th>
                                    <th>Koordinat</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tematikMaps as $index => $tematikMap)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor otomatis -->
                                    <td>{{ $tematikMap->nama_tipe }}</td> <!-- Tipe tematik dari model TematikMap -->
                                    <td>
                                        <span class="badge bg-secondary" data-bs-toggle="tooltip"
                                            title="{{ json_encode(json_decode($tematikMap->koordinat), JSON_PRETTY_PRINT) }}">
                                            JSON COORDINATE
                                        </span>
                                    </td>
                                    <!-- Badge untuk koordinat -->
                                    <td>
                                        <div
                                            style="width: 20px; height: 20px; background-color: {{ $tematikMap->color }}; border-radius: 50%;">
                                        </div>
                                    </td>
                                    <td class="td-left">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('dashboard.tematik.edit', $tematikMap->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('dashboard.tematik.destroy', $tematikMap->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this data?')">
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