@extends('layout')
@section('title', 'Create Blog Page')

@section('style')
    <style>
        .main-container {
            width: 795px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection
@section('content')
    <div class="container col-8 mt-5 form p-5 mb-5">
        <h3 class="card-title text-center">Create Blog Post</h3>
        <form action="{{ Route('create_blog_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group m-3">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" id="excerpt-editor" cols="30" rows="5" class="form-control">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="main-container form-group m-3">
                <label for="body">Body</label>
                <textarea name="body" id="body-editor" cols="30" rows="10" class="form-control">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="image">Upload Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <select class="form-select" name="category_id">
                    <option selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Create Post" class="btn btn-primary m-3">
        </form>
    </div>
@endsection
@section('script')
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
            Paragraph,
            Bold,
            Italic,
            Underline,
            Alignment,
            FontSize,
            FontFamily,
            FontColor,
            FontBackgroundColor,
            Link,
            List,
            BlockQuote,
            Highlight,
            MediaEmbed,
            Image,
            ImageToolbar,
            ImageCaption,
            ImageStyle
        } from 'ckeditor5';

        // Initialize CKEditor for the excerpt field
        ClassicEditor
            .create(document.querySelector('#excerpt-editor'), {
                plugins: [
                    Essentials,
                    Paragraph,
                    Bold,
                    Italic,
                    Underline,
                    Alignment,
                    FontSize,
                    FontFamily,
                    FontColor,
                    FontBackgroundColor,
                    Link,
                    List,
                    BlockQuote,
                    Highlight,
                    MediaEmbed
                ],
                toolbar: [
                    'undo', 'redo', '|',
                    'bold', 'italic', 'underline', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment:left', 'alignment:center', 'alignment:right', 'alignment:justify', '|',
                    'link', 'bulletedList', 'numberedList', '|',
                    'blockQuote', 'highlight', 'mediaEmbed'
                ],
                fontSize: {
                    options: [
                        '8px', '10px', '12px', '14px', '16px',
                        '18px', '20px', '24px', '28px', '32px', '36px'
                    ],
                    supportAllValues: false // Ensure only defined sizes are allowed
                }
            })
            .then(editor => {
                window.editorExcerpt = editor;
            })
            .catch(error => {
                console.error(error);
            });

        // Initialize CKEditor for the body field
        ClassicEditor
            .create(document.querySelector('#body-editor'), {
                plugins: [
                    Essentials,
                    Paragraph,
                    Bold,
                    Italic,
                    Underline,
                    Alignment,
                    FontSize,
                    FontFamily,
                    FontColor,
                    FontBackgroundColor,
                    Link,
                    List,
                    BlockQuote,
                    Highlight,
                    MediaEmbed,
                    Image // Include Image plugin for inserting images
                ],
                toolbar: [
                    'undo', 'redo', '|',
                    'bold', 'italic', 'underline', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment:left', 'alignment:center', 'alignment:right', 'alignment:justify', '|',
                    'link', 'bulletedList', 'numberedList', '|',
                    'blockQuote', 'highlight', 'mediaEmbed', '|',
                    'imageTextAlternative', 'imageInsert', 'imageStyle:full', 'imageStyle:side' // Add imageInsert button to toolbar
                ],
                image: {
                    toolbar: [
                        'imageTextAlternative'
                    ]
                },
                mediaEmbed: {
                    previewsInData: true
                },
                fontSize: {
                    options: [
                        '8px', '10px', '12px', '14px', '16px',
                        '18px', '20px', '24px', '28px', '32px', '36px'
                    ],
                    supportAllValues: false // Ensure only defined sizes are allowed
                }
            })
            .then(editor => {
                window.editorBody = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- A friendly reminder to run on a server, remove this during the integration. -->
    <script>
        window.onload = function() {
            if (window.location.protocol === 'file:') {
                alert('This sample requires an HTTP server. Please serve this file with a web server.');
            }
        };
    </script>
@endsection
