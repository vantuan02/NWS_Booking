@extends('layout.admin.master')
@section('content')
    <section>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update post</title>
    </section>
    <hr>
    <H2>Update post</H2>
    {!! Form::open(['method' => 'PUT', 'route' => ['posts.update', $post->id], 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Please enter title']) !!}

            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Post image') !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}

            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="image-gallery">
                @if ($post->image && file_exists(public_path($post->image)))
                    <img src="{{ asset($post->image) }}" alt="post Image" class="img-preview">
                @else
                    <span class="no-images">Không có ảnh</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', $post->description, ['class' => 'form-control', 'id' => 'description']) !!}

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content') !!}
            {!! Form::textarea('content', $post->content, ['class' => 'form-control', 'id' => 'content']) !!}

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
