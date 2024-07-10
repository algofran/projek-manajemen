@extends('layouts.layout')

@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 700px;
    }

    .ck-content .image {
        /* Block images */
        max-width: 50%;
        margin: 10px auto;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="page-header container py-3 bg-danger bg-gradient text-white rounded">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="fw-bolder fs-6 text-white my-auto">Daftar Panduan</p>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:history.back()" style="text-decoration-line: underline; font-style: italic">Kembali</a></li>
                            <li class="breadcrumb-item text-white">Daftar Panduan</li>
                        </ul>
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <form action="{{ url('add-guide') }}" method="POST" enctype="multipart/form-data">
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
                                    <img id="default-image" style="filter: hue-rotate(180deg); "  src="{{ asset('assets/image1.png') }}" alt="" width="140px" height="auto" class="mb-3"> <!-- Default image -->
                                </div>
                                <div class="col-auto my-auto">
                                    <input type="file" name="image" class="upload">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="editor" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-danger">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    feather.replace();

    // Function to handle file input change and preview image
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

    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'), {
            
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            ckfinder: {
                uploadUrl: "{{ route('guide.create', ['_token' => csrf_token()]) }}",
            },
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
