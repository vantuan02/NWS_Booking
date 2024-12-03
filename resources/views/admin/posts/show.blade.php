@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>Post detail</h1>
        <ol class="breadcrumb">
            <li class="active">Post detail</li>
        </ol>
    </section>

    <div class="container">
        <h2><center>{{ $post->title }}</center></h2>
        <div class="row">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid border">
        </div>
        <div>
            <p>{!! $post->content !!}</p>
        </div>
    </div>
    <hr>
    <button class="btn btn-primary">
        <a href="{{ route('posts.index') }}" style="color: #fff">
            Back
        </a>
    </button>
    </div>
@endsection
