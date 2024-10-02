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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Nomor RT</th>
                                    <th>Koordinat</th>

                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rts as $index => $rt)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor otomatis -->
                                    <td>{{ $rt->kecamatan->nama }}</td>
                                    <td>{{ $rt->kelurahan->nama }}</td>
                                    <td>{{ $rt->nomor }}</td>
                                    <td>
                                        <span class="badge bg-secondary" data-bs-toggle="tooltip"
                                            title="{{ json_encode(json_decode($rt->koordinat), JSON_PRETTY_PRINT) }}">
                                            JSON Data Koordinat
                                        </span>
                                    </td> <!-- Badge untuk koordinat -->

                                    <td>
                                        <div
                                            style="width: 20px; height: 20px; background-color: {{ $rt->color }}; border-radius: 50%;">
                                        </div>
                                    </td>
                                    <td>
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