@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Database BAPEDA SURVEY Sub Permasalahan</h3>
                    </div>

                    <div class="card-header">


                    </div>
                    <style>
                        .table th {
                            background-color: #f8f9fa;
                            /* Warna latar belakang header */
                            text-align: center;
                            /* Rata tengah secara horizontal */
                            vertical-align: middle;
                            /* Rata tengah secara vertikal */
                            font-size: 14px;
                            /* Ukuran font kecil */
                            padding: 10px;
                            font-weight: 800;
                            /* Spasi di dalam header */
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
                                    <th rowspan="2">Kelurahan</th>
                                    <th colspan="10">Sub Permasalahan</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                @foreach ($subpermasalahans as $header)
                                <tr>
                                    <th>{{$header->header_no_1}}</th>
                                    <th>{{$header->header_no_2}}</th>
                                    <th>{{$header->header_no_3}}</th>
                                    <th>{{$header->header_no_4}}</th>
                                    <th>{{$header->header_no_5}}</th>
                                    <th>{{$header->header_no_6}} </th>
                                    <th>{{$header->header_no_7}}</th>
                                    <th>{{$header->header_no_8}}</th>
                                    <th>{{$header->header_no_9}}</th>
                                    <th>{{$header->header_no_10}}</th>
                                </tr>
                                @endforeach

                            </thead>
                            <tbody>
                                @foreach ($subpermasalahans as $index => $sub)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor otomatis -->
                                    <td>{{ $sub->kelurahan->nama }}</td>
                                    <td>{!! Str::limit($sub->text_1, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_2, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_3, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_4, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_5, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_6, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_7, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_8, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_9, 100) !!}</td>
                                    <td>{!! Str::limit($sub->text_10, 100) !!}</td>


                                    <td class="td-left">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('dashboard.subpermasalahan.edit', $sub->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('dashboard.subpermasalahan.destroy', $sub->id) }}"
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