@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Database BAPEDA Berita & Artikel</h3>
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
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Header Name</th>
                                    <th>Category</th>
                                    <th>Thumbnail</th>
                                    <th>Slug</th>
                                    <th>Content</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $index => $blog)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $blog->header_name }}</td>
                                    <td>{{ $blog->category_name }}</td>
                                    <td>
                                        <img src="{{ Storage::url($blog->tumbnail) }}" alt="Thumbnail"
                                            style="width: 50px; height: auto;">
                                    </td>
                                    <td>{{ $blog->slug }}</td>
                                    <td>{!! Str::limit($blog->blog_content, 50) !!}...</td>
                                    <!-- Menampilkan potongan konten -->
                                    <td>{{ $blog->created_at->format('Y-m-d H:i') }}</td>
                                    <td>{{ $blog->updated_at->format('Y-m-d H:i') }}</td>
                                    <td class="td-left">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('dashboard.blog.edit', $blog->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('dashboard.blog.destroy', $blog->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this blog?')">
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