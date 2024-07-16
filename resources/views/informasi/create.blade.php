@extends('layouts.layout')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            {{-- <div class="page-header container py-3 bg-danger bg-gradient text-white rounded">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="fw-bolder fs-6 text-white my-auto">Daftar Panduan</p>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:history.back()" style="text-decoration-line: underline; font-style: italic">Kembali</a></li>
                            <li class="breadcrumb-item text-white">Daftar Panduan</li>
                        </ul>
                    </div> 
                </div>
            </div> --}}
            <div class="card container">
                <div class="card-body">
                    
                    <form id="guide-form" action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title<span class="text-danger">*</span></label>
                            <input type="text" name='title' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Blog Image</label>
                            <div class="row">
                                <div class="col-2">
                                    <div id="image-preview" class="mb-3"></div> <!-- Preview image element -->
                                    <img id="default-image" style="filter: hue-rotate(180deg);" src="{{ asset('assets/image1.png') }}" alt="" width="140px" height="auto" class="mb-3"> <!-- Default image -->
                                </div>
                                <div class="col-auto my-auto">
                                    <input type="file" name="image" class="upload">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="summernote" name="description"></textarea>
                        </div>
                        <button type="submit" id="save" class="btn btn-danger">Add Post</button>
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
      $('#summernote').summernote();
  });
</script>

<script>
      feather.replace();

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
                
                // Hide default image
                document.getElementById('default-image').style.display = 'none';
            }
            reader.readAsDataURL(file);
        } else {
            // Show default image if no file selected
            document.getElementById('image-preview').innerHTML = '';
            document.getElementById('default-image').style.display = 'block';
        }
    });
</script>
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
</script>

@endsection
