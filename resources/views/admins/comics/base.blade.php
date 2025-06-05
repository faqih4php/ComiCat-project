@extends('admins.layouts.base')
@php
    use Illuminate\Support\Str;
@endphp
@section('title')
    Comics | Admin
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4">
                <h5 class="card-title">Daftar Comics</h5>
            </div>
            <div class="card-body pb-0">
                @include('components.alert')
                <div class="card-actions d-flex">
                    <a href="{{ route('comics.create') }}" class="btn btn-primary ms-auto">Tambah Comic</a>
                </div>
            </div>
            <div class="card-datatable table-responsive text-start text-nowrap">
                <table class="table table-bordered table-responsive-sm table-responsive-md table-responsive-xl w-100"
                    id="dataTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Genre</th>
                            <th>Tipe</th>
                            <th>Deskripsi</th>
                            <th>terakhir diubah</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comics as $comic)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('images/' . $comic->image) }}" alt="Gambar" width="100"></td>
                                <td>
                                    <span title="{{ $comic->title }}">
                                        {{ $comic->short_title }}
                                    </span>
                                </td>
                                <td>{{ $comic->author }}</td>
                                <td style="max-width: 150px;">
                                    <div class="d-flex flex-column gap-1">
                                        @foreach($comic->genres->take(2) as $genre)
                                            <span class="badge bg-info">{{ $genre->name }}</span>
                                        @endforeach
                                        @if($comic->genres->count() > 2)
                                            <a href="#" 
                                               class="badge bg-secondary text-decoration-none" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#genreModal{{ $comic->id }}">
                                                +{{ $comic->genres->count() - 2 }} more
                                            </a>
                                        @endif
                                    </div>

                                    <!-- Genre Modal -->
                                    @if($comic->genres->count() > 2)
                                    <div class="modal fade" id="genreModal{{ $comic->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Genres for {{ $comic->title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex flex-column gap-2">
                                                        @foreach($comic->genres as $genre)
                                                            <span class="badge bg-info">{{ $genre->name }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $comic->type->name }}</td>
                                <td>
                                    <span title="{{ $comic->description }}">
                                        {{ Str::limit($comic->description, 25, '...') }}
                                    </span>
                                </td>
                                <td>{{ $comic->updated_at->format('d F Y H:i') }}</td>
                                <td>
                                    <div class="d-flex gap-2" aria-label="Basic example">
                                        <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit comics">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-info"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show comics">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('comics.destroy', $comic->id) }}" class="btn btn-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus comics">
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