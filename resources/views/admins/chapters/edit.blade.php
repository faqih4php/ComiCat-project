@extends('admins.layouts.base')
@section('title')
    Edit Chapter | Admin
@endsection

@section('style')
    <style>
        .preview-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .preview-images img {
            max-width: 200px;
            height: auto;
            border-radius: 4px;
        }
        .current-images {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }
        .image-container {
            position: relative;
            width: 200px;
        }
        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .image-container .delete-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Edit Chapter</h5>
                <div>
                    <a href="{{ route('comics.show', ['comic' => $chapter->comic]) }}" class="btn btn-secondary">Back to Comic</a>
                </div>
            </div>
            <div class="card-body">
                @include('components.alert')
                <form action="{{ route('chapters.update', ['chapter' => $chapter]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $chapter->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="chapter_number" class="form-label">Chapter Number</label>
                            <input type="number" step="0.1" class="form-control @error('chapter_number') is-invalid @enderror" id="chapter_number"
                                name="chapter_number" value="{{ old('chapter_number', $chapter->chapter_number) }}" required>
                            @error('chapter_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Current Images</label>
                            @if($chapter->file_path)
                                <div class="current-images">
                                    @foreach(json_decode($chapter->file_path) as $index => $image)
                                        <div class="image-container">
                                            <img src="{{ asset('storage/' . $image) }}" alt="Page {{ $index + 1 }}">
                                            <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                            <button type="button" class="delete-image" onclick="removeImage(this)">
                                                <i class="fa-solid fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">No images currently uploaded.</div>
                            @endif
                        </div>

                        <div class="col-12 mb-3">
                            <label for="new_images" class="form-label">Add New Images</label>
                            <input type="file" class="form-control @error('new_images') is-invalid @enderror" id="new_images"
                                name="new_images[]" accept="image/*" multiple>
                            <small class="text-muted">You can select multiple images. New images will be added after existing ones.</small>
                            @error('new_images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="preview-images"></div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="content" class="form-label">Chapter Description (Optional)</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                                name="content" rows="4" placeholder="Enter any additional information about this chapter">{{ old('content', $chapter->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Chapter</button>
                        <a href="{{ route('comics.show', ['comic' => $chapter->comic]) }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('new_images').addEventListener('change', function(event) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        });

        function removeImage(button) {
            const container = button.closest('.image-container');
            container.remove();
        }
    </script>
@endsection
