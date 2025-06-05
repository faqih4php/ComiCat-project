@extends('admins.layouts.base')
@section('title', 'Pages | Admin')
@section('style')
    <style>
        .table-responsive {
            overflow-x: auto;
        }
        .page-thumbnail {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .page-thumbnail:hover {
            transform: scale(1.1);
        }
    </style>
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ isset($comic) ? "Chapters for {$comic->title}" : 'All Pages' }}</h5>
                    <div>
                        @if(isset($comic))
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-secondary me-2">Back to Comic</a>
                            <a href="{{ route('comics.chapters.create', ['comic' => $comic->id]) }}" class="btn btn-primary">Add Chapter</a>
                        @else
                            <a href="{{ route('chapters.index') }}" class="btn btn-secondary me-2">Back to Chapters</a>
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
                                <th>Image</th>
                                <th>Comic</th>
                                <th>Chapter</th>
                                <th>Title</th>
                                <th>Page Number</th>
                                <th>Status</th>
                                <th>Upload Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $page->image) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $page->image) }}"
                                                alt="Page {{ $page->page_number }}"
                                                class="page-thumbnail"
                                                data-bs-toggle="tooltip"
                                                title="Click to view full size">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('comics.show', $page->chapter->comic_id) }}" class="text-decoration-none">
                                            {{ $page->chapter->comic->title }}
                                        </a>
                                    </td>
                                    <td>Chapter {{ $page->chapter->chapter_number }}</td>
                                    <td>{{ $page->chapter->title }}</td>
                                    <td>{{ $page->page_number }}</td>
                                    <td>
                                        <span class="badge bg-{{ $page->chapter->status === 'published' ? 'success' : 'warning' }}">
                                            {{ ucfirst($page->chapter->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $page->chapter->created_at->format('d F Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('chapters.pages.show', ['chapter' => $page->chapter, 'page' => $page]) }}"
                                                class="btn btn-info btn-sm"
                                                data-bs-toggle="tooltip"
                                                title="View Page">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('chapters.pages.edit', ['chapter' => $page->chapter, 'page' => $page]) }}"
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="tooltip"
                                                title="Edit Page">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <form action="{{ route('chapters.pages.destroy', ['chapter' => $page->chapter, 'page' => $page]) }}"
                                                method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="tooltip"
                                                    title="Delete Page"
                                                    onclick="return confirm('Are you sure you want to delete this page?')">
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
