@extends('admins.layouts.base')
@section('title')
    Edit Comic | Admin
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple {
            min-height: 38px;
            border: 1px solid #dee2e6;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #696cff;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #696cff;
            border: none;
            color: #fff;
            padding: 2px 8px;
            margin: 4px;
            border-radius: 4px;
            display: block;
            width: 100%;
            float: none;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
            margin-right: 5px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #fff;
            opacity: 0.8;
        }
    </style>
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4">
                <h5 class="card-title">Edit Comic</h5>
            </div>
            <div class="card-body">
                @include('components.alert')
                <form action="{{ route('comics.update', $comic->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                                name="title" value="{{ old('title', $comic->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" 
                                name="author" value="{{ old('author', $comic->author) }}" required>
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="type_id" class="form-label">Type</label>
                            <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" 
                                name="type_id" required>
                                <option value="">Select Type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ (old('type_id', $comic->type_id) == $type->id) ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="genres" class="form-label">Genres</label>
                            <select class="select2 form-select @error('genres') is-invalid @enderror" id="genres" 
                                name="genres[]" multiple required>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" 
                                        {{ in_array($genre->id, old('genres', $comic->genres->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Tekan Ctrl (Windows) atau Command (Mac) untuk memilih beberapa genre</small>
                            @error('genres')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" 
                                name="image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                            @if($comic->image)
                                <div class="mt-2">
                                    <img src="{{ asset('images/' . $comic->image) }}" alt="Current Image" class="img-thumbnail" width="100">
                                </div>
                            @endif
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" 
                                name="description" rows="4" required>{{ old('description', $comic->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Comic</button>
                        <a href="{{ route('comics.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Genres",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endsection
