@extends('layout')
@section('title', 'Edit Blog Page')
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
    <div class="container col-8 mt-5 mb-5 p-5 form">
        <h3 class="text-center">Edit Blog Post</h3>
        <form action="{{ Route('edit_blog_post', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="form-control" id="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" id="excerpt-editor" class="form-control" cols="30" rows="5">{!! old('excerpt', $blog->excerpt ?? '') !!}</textarea>
                @error('excerpt')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="main-container form-group mb-3">
                <label for="body">Body</label>
                <textarea name="body" id="body-editor" cols="30" rows="10" class="form-control">{!! old('body', $blog->body ?? '') !!}</textarea>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="image">Upload</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <img src="{{ asset('storage/uploads/' . $blog->image) }}" class="img-thumbnail">
            </div>
            <input type="submit" value="Update" class="btn btn-primary mt-3">
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
        MediaEmbed
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
            },
            mediaEmbed: {
                previewsInData: true
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
            },
            mediaEmbed: {
                previewsInData: true
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
