@extends('layouts.layout')

@section('content')
<!-- Include Bootstrap 5 CSS/JS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- Include Summernote CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form id="guide-form" action="{{ route('informasi.update', $guide->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title<span class="text-danger">*</span></label>
                            <input type="text" name='title' class="form-control" value="{{ $guide->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>Blog Image</label>
                            <div class="row">
                                <div class="col-2">
                                    <div id="image-preview" class="mb-3">
                                        @if($guide->image)
                                            <img src="data:image/png;base64,{{ $guide->image }}" alt="Blog Image" style="max-width: 140px; height: auto;" class="mb-3">
                                        @else
                                            <img id="default-image" style="filter: hue-rotate(180deg);" src="{{ asset('assets/image1.png') }}" alt="" width="140px" height="auto" class="mb-3">
                                        @endif
                                    </div> <!-- Preview image element -->
                                </div>
                                <div class="col-auto my-auto">
                                    <input type="file" name="image" class="upload">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="summernote" name="description">{!! $guide->description !!}</textarea>
                        </div>
                        <button type="submit" id="save" class="btn btn-danger">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Enter description here',
            tabsize: 2,
            height: 100
        });
    });

    document.querySelector('.upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgPreview = document.getElementById('image-preview');
                imgPreview.innerHTML = ''; // Clear previous content
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '140px';
                img.style.height = 'auto';
                imgPreview.appendChild(img);
                
                // Hide default image if exists
                const defaultImage = document.getElementById('default-image');
                if (defaultImage) {
                    defaultImage.style.display = 'none';
                }
            }
            reader.readAsDataURL(file);
        } else {
            // Show default image if no file selected
            const defaultImage = document.getElementById('default-image');
            if (defaultImage) {
                document.getElementById('image-preview').innerHTML = '';
                defaultImage.style.display = 'block';
            }
        }
    });
</script>
@endsection
