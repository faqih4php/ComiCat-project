@extends('admins.layouts.base')
@section('title')
    Add Pages to Chapter | Admin
@endsection

@section('style')
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
    </style>
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header border-bottom mb-4 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Add Pages to Chapter {{ $chapter->chapter_number }}</h5>
                <div>
                    <a href="{{ route('chapters.show', ['chapter' => $chapter]) }}" class="btn btn-secondary">Back to Chapter</a>
                </div>
            </div>
            <div class="card-body">
                @include('components.alert')
                <form action="{{ route('chapters.pages.store', ['chapter' => $chapter]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="images[]" class="form-label">Page Images</label>
                            <input type="file" class="form-control @error('images') is-invalid @enderror" id="images"
                                name="images[]" accept="image/*" multiple required>
                            <small class="text-muted">You can select multiple images. Pages will be ordered based on selection order.</small>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="preview-images"></div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Pages</button>
                        <a href="{{ route('chapters.pages.index', ['chapter' => $chapter]) }}" class="btn btn-secondary">Cancel</a>
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

        document.getElementById('images').addEventListener('change', function(event) {
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
    </script>
@endsection

