@extends('admins.layouts.base')
@section('title')
    Detail Comic | Admin
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Detail Comic</h5>
                @include('components.alert')
                <a href="{{ route('comics.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        @if($comic->image)
                            <img src="{{ asset('images/' . $comic->image) }}" alt="{{ $comic->title }}" 
                                class="img-fluid rounded shadow" style="max-height: 400px;">
                        @else
                            <div class="alert alert-info">No image available</div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Title</th>
                                        <td>{{ $comic->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Author</th>
                                        <td>{{ $comic->author }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>
                                            <span class="badge bg-primary">{{ $comic->type->name }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Genres</th>
                                        <td>
                                            @if($comic->genres->count() > 0)
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach($comic->genres as $genre)
                                                        <span class="badge bg-secondary">{{ $genre->name }}</span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-muted">No genres assigned</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $comic->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $comic->created_at->format('d F Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated</th>
                                        <td>{{ $comic->updated_at->format('d F Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning me-2">
                                <i class="fa-solid fa-edit"></i> Edit Comic
                            </a>
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this comic?')">
                                    <i class="fa-solid fa-trash"></i> Delete Comic
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <br style="color: #fff;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Chapters</h5>
                        <a href="{{ route('comics.chapters.create', ['comic' => $comic]) }}" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus"></i> Add Chapter
                        </a>
                    </div>
                    @if($comic->chapters->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Chapter</th>
                                        <th>Title</th>
                                        <th>Pages</th>
                                        <th>Status</th>
                                        <th>Upload Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comic->chapters->sortByDesc('number') as $chapter)
                                        <tr>
                                            <td>Chapter {{ $chapter->number }}</td>
                                            <td>{{ $chapter->title }}</td>
                                            <td>{{ $chapter->pages->count() }} Pages</td>
                                            <td>
                                                <span class="badge bg-{{ $chapter->status === 'published' ? 'success' : 'warning' }}">
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
                    @else
                        <div class="text-center">
                            <img src="{{ asset('images/no-chapters.png') }}" alt="No Chapters" class="img-fluid" style="max-width: 200px;">
                            <h5 class="mt-1">No chapters available for this comic yet.</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
