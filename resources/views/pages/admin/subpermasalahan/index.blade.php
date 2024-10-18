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

                        .limited-text {
                         
                            overflow: hidden;
                           
                        }

                    </style>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kelurahan</th>
                                    <th>Bangunan Hunian</th>
                                    <th>Jalan Lingkungan</th>
                                    <th>Air Minum</th>
                                    <th>Drainase Lingkungan</th>
                                    <th>Persampahan</th>
                                    <th>Proteksi Kebakaran</th>
                                    <th>Air Limbah</th>
                                    <th>Legalitas Dan Status Lahan</th>
                                    <th>Sosial Dan Ekonomi</th>
                                    <th>Pertimbangan Lain</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($subpermasalahans as $index => $sub)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="limited-text">{{$sub->kelurahan->nama }}</td>
                                    <td class="limited-text">{{$sub->text_1}} </td>
                                    <td class="limited-text">{{$sub->text_2}} </td>
                                    <td class="limited-text">{{$sub->text_3}} </td>
                                    <td class="limited-text">{{$sub->text_4}} </td>
                                    <td class="limited-text">{{$sub->text_5}} </td>
                                    <td class="limited-text">{{$sub->text_6}} </td>
                                    <td class="limited-text">{{$sub->text_7}} </td>
                                    <td class="limited-text">{{$sub->text_8}} </td>
                                    <td class="limited-text">{{$sub->text_9}} </td>
                                    <td class="limited-text">{{$sub->text_10}} </td>

                                    <!-- Tombol Edit dan Delete -->
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
                                                onclick="return confirm('Are you sure you want to delete this item?')">
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
<script>
    $(function () {
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>