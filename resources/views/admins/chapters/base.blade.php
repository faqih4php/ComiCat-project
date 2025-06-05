@extends('admins.layouts.base')
@section('title')
    Chapters | Admin
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ isset($comic) ? "Chapters for {$comic->title}" : 'All Chapters' }}</h5>
                    <div>
                        @if(isset($comic))
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-secondary me-2">Back to Comic</a>
                            <a href="{{ route('comics.chapters.create', ['comic' => $comic->id]) }}" class="btn btn-primary">Add Chapter</a>
                        @else
                            <a href="{{ route('comics.index') }}" class="btn btn-secondary me-2">Back to Comics</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('components.alert')
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Comic</th>
                                <th>Chapter</th>
                                <th>Title</th>
                                <th>Pages</th>
                                <th>Status</th>
                                <th>Upload Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chapters as $chapter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('comics.show', $chapter->comic_id) }}" class="text-decoration-none">
                                            {{ $chapter->comic->title }}
                                        </a>
                                    </td>
                                    <td>Chapter {{ $chapter->chapter_number }}</td>
                                    <td>{{ $chapter->title }}</td>
                                    <td>{{ $chapter->pages->count() }} Pages</td>
                                    <td>
                                        <span class="badge bg-{{ $chapter->status === 'published' ? 'success' : 'warningq' }}">
                                            {{ ucfirst($chapter->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $chapter->created_at->format('d F Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('chapters.show', $chapter->id) }}" 
                                                class="btn btn-info btn-sm"
                                                data-bs-toggle="tooltip" 
                                                title="View Chapter">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('chapters.edit', $chapter->id) }}" 
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="tooltip" 
                                                title="Edit Chapter">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <form action="{{ route('chapters.destroy', $chapter->id) }}" 
                                                method="POST" 
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="tooltip" 
                                                    title="Delete Chapter"
                                                    onclick="return confirm('Are you sure you want to delete this chapter?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
            
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
