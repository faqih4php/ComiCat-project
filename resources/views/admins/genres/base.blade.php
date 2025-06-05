@extends('admins.layouts.base')
@section('title')
    Genres | Admin
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4">
                <h5 class="card-title">Daftar Genres</h5>
            </div>
            <div class="card-body pb-0">
                @include('components.alert')
                <div class="card-actions d-flex">
                    <a href="{{ route('genres.create') }}" class="btn btn-primary ms-auto">Tambah Genre</a>
                </div>
            </div>
            <div class="card-datatable table-responsive text-start text-nowrap">
                <table class="table table-bordered table-responsive-sm table-responsive-md table-responsive-xl w-100"
                    id="dataTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>terakhir diubah</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $genre->name }}</td>
                                <td>{{ $genre->updated_at->format('d F Y H:i') }}</td>
                                <td>
                                    <div class="d-flex gap-2" aria-label="Basic example">
                                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit genres">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-info"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show genres">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('genres.destroy', $genre->id) }}" class="btn btn-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus genres">
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