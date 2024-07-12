@extends('layouts.layout')

@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 600px;
    }

    .ck-content .image {
        /* Block images */
        max-width: 50%;
        margin: 10px auto;
        aspect-ratio: unset !important;
    }

    .ck-content figure.image img {
    aspect-ratio: unset !important; /* Reset aspect-ratio */

    .ck-content table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1em;
    }

    .ck-content table, .ck-content th, .ck-content td {
        border: 1px solid #ddd; /* Menambahkan border */
    }

    .ck-content th, .ck-content td {
        padding: 8px;
        text-align: left;
    }

    .ck-content th {
        background-color: #f2f2f2;
    }
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
                    
                    <form id="guide-form" action="{{ url('add-guide') }}" method="POST" enctype="multipart/form-data">
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
                            <textarea id="editor" name="description"></textarea>
                        </div>
                        <button type="submit" id="save" class="btn btn-outline-danger">Add Post</button>
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

<script type="module">

      import {
        ClassicEditor,
    Essentials,
    Bold,
    Italic,
    Underline,
    Strikethrough,
    Link,
    Paragraph,
    Font,
    Heading,
    List,
    Alignment,
    Image,
    ImageCaption,
    ImageStyle,
    ImageToolbar,
    ImageUpload,
    ImageResize,
    Table,
    TableToolbar,
    MediaEmbed,
    BlockQuote,
    Autoformat,
    CKFinder, CKFinderUploadAdapter
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Underline, Strikethrough, Link, Paragraph, Font, Heading, List, Alignment, Image, ImageCaption, ImageStyle, ImageToolbar, ImageUpload, ImageResize, Table, TableToolbar, MediaEmbed, BlockQuote, Autoformat, CKFinder, CKFinderUploadAdapter],
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'link', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'alignment', '|',
                    'insertTable', 'blockQuote', 'mediaEmbed', 'undo', 'redo', '|',
                    'imageUpload'
                ]
            },
            image: {
                toolbar: [
                    'imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|',
                    'toggleImageCaption', 'imageTextAlternative', '|',
                    'imageResize'
                ],
                styles: [
                    'inline', 'block', 'side'
                ]
            },
            table: {
            contentToolbar: [
                'tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties'
            ]
        },

            ckfinder: {
                uploadUrl: "{{ route('guide.create', ['_token' => csrf_token()]) }}"
            }
        } )
        .then( editor => {
        // Setelah editor terinisialisasi
        editor.model.schema.extend( '$text', { allowAttributes: 'style' } );

        editor.model.schema.addAttributeCheck( context => {
            if ( context.endsWith( 'img' ) ) {
                const style = context.getClosest( 'img' ).getAttribute( 'style' );

                if ( style && style.includes( 'aspect-ratio' ) ) {
                    context.remove( context.getClosest( 'img' ).getAttribute( 'style' ) );
                }
            }
        } );

        console.log( 'Editor was initialized', editor );
    } )
        .catch( error => {
            console.error( 'There was a problem initializing the editor.', error );
        } );
</script>
@endsection
