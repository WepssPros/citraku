@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Database BAPEDA Master Rukun Tetang (kelurahan)</h3>
                    </div>
                    <div class="card-header">

                        <div class="card-tools">
                            <a href="{{ route('dashboard.kelurahan.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Kelurahan 
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Koordinat</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelurahans as $index => $kelurahan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kelurahan->kecamatan->nama }}</td>

                                    <td>{{ $kelurahan->nama }}</td>
                                    <td>
                                        <span class="badge bg-secondary" data-bs-toggle="tooltip"
                                            title="{{ json_encode(json_decode($kelurahan->koordinat), JSON_PRETTY_PRINT) }}">
                                            JSON Data Koordinat
                                        </span>
                                    </td> <!-- Badge untuk koordinat -->

                                    <td>
                                        <div
                                            style="width: 20px; height: 20px; background-color: {{ $kelurahan->color }}; border-radius: 50%;">
                                        </div>
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('dashboard.kelurahan.edit', $kelurahan->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('dashboard.kelurahan.destroy', $kelurahan->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this kelurahan?')">
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