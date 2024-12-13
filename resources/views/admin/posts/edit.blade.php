@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Update post</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Update post
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-3">
            <H2>Update post</H2>
            {!! Form::open(['method' => 'PUT', 'route' => ['admin.posts.update', $post->id], 'enctype' => 'multipart/form-data']) !!}
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
            <br>
            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
