@extends('admins.layouts.base')
@section('title', 'Comments | Admin')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4">
                <h5 class="card-title">Daftar Comments</h5>
            </div>
            <div class="card-body pb-0">
                @include('components.alert')
                <div class="card-actions d-flex">
                    <a href="{{ route('comments.create') }}" class="btn btn-primary ms-auto">Tambah Comment</a>
                </div>
            </div>
            <div class="card-datatable table-responsive text-start text-nowrap">
                <table class="table table-bordered table-responsive-sm table-responsive-md table-responsive-xl w-100"
                    id="dataTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Comic</th>
                            <th>Chapter</th>
                            <th>Konten</th>
                            <th>terakhir diubah</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->comic->title }}</td>
                                <td>{{ $comment->chapter->chapter_number }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->updated_at->format('d F Y H:i') }}</td>
                                <td>
                                    <div class="d-flex gap-2" aria-label="Basic example">
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit comments">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-info"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show comments">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('comments.destroy', $comment->id) }}" class="btn btn-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus comments">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection