@extends('admins.layouts.base')
@section('title')
    Detail Chapter | Admin
@endsection

@section('style')
    <style>
        .chapter-container {
            width: 100%;
            padding: 20px;
        }
        .chapter-images {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            width: 100%;
        }
        .chapter-image {
            position: relative;
            width: 300px;
            flex: 0 0 300px;
            margin: 0 auto;
        }
        .chapter-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .page-number {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Detail Chapter</h5>
                <div>
                    @include('components.alert')
                    <a href="{{ route('comics.show', ['comic' => $chapter->comic]) }}" class="btn btn-secondary">Back to Comic</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                    @if($chapter->file_path)
                        @php
                            $images = json_decode($chapter->file_path);
                            $firstImage = $images[0] ?? null;
                        @endphp
                        @if($firstImage)
                            <img src="{{ asset('storage/' . $firstImage) }}"
                                alt="First Page"
                                class="img-fluid rounded shadow"
                                style="max-height: 400px; object-fit: contain;">
                            <div class="mt-2">
                                <span class="badge bg-primary">Page 1 of {{ count($images) }}</span>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info">No cover available</div>
                    @endif
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Comic</th>
                                        <td>
                                            <a href="{{ route('comics.show', ['comic' => $chapter->comic]) }}" class="text-primary">
                                                {{ $chapter->comic->title }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Chapter Number</th>
                                        <td>
                                            <span class="badge bg-label-primary">Chapter {{ $chapter->chapter_number }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $chapter->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $chapter->content ?: 'No description available' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Pages</th>
                                        <td>
                                            <span class="badge bg-label-info">{{ $chapter->pages->count() }} Pages</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Upload Date</th>
                                        <td>{{ $chapter->created_at->format('d F Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated</th>
                                        <td>{{ $chapter->updated_at->format('d F Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('chapters.edit', ['chapter' => $chapter]) }}" class="btn btn-warning me-2">
                                <i class="fa-solid fa-edit"></i> Edit Chapter
                            </a>
                            <form action="{{ route('chapters.destroy', ['chapter' => $chapter]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this chapter?')">
                                    <i class="fa-solid fa-trash"></i> Delete Chapter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Chapters</h5>
                        <a href="{{ route('chapters.pages.create', ['chapter' => $chapter]) }}" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus"></i> Add Pages
                        </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">All Pages</h5>
                        <span class="text-muted">Click image to view full size</span>
                    </div>
                    <div class="container-fluid p-0">
                        <div class="row justify-content-center">
                            @forelse($chapter->pages as $page)
                                <div class="col-auto mb-4">
                                    <div class="chapter-image">
                                        <a href="{{ asset('storage/' . $page->image) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $page->image) }}"
                                                alt="Page {{ $page->page_number }}"
                                                class="img-fluid">
                                            <div class="page-number">Page {{ $page->page_number }}</div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <img src="{{ asset('images/no-chapters.png') }}" alt="No Chapters" class="img-fluid" style="max-width: 200px;">
                                    <h5 class="mt-1">No pages available for this chapter.</h5>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
