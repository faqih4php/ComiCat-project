@extends('admins.layouts.base')
@section('title')
    Users | Admin
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4">
                <h5 class="card-title">Daftar Users</h5>
            </div>
            <div class="card-body pb-0">
                @include('components.alert')
                <div class="card-actions d-flex">
                    <a href="{{ route('users.create') }}" class="btn btn-primary ms-auto">Tambah User</a>
                </div>
            </div>
            <div class="card-datatable table-responsive text-start text-nowrap">
                <table class="table table-bordered table-responsive-sm table-responsive-md table-responsive-xl w-100"
                    id="dataTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>terakhir diubah</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->updated_at->format('d F Y H:i') }}</td>
                                <td>
                                    <div class="d-flex gap-2" aria-label="Basic example">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit users">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show users">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus users">
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