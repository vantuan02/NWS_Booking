@extends('layout.ad.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('src/assets/css/blogdetail.css') }}">
@endpush
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Post detail</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Post detail
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
            <div class="container">
                <h2>
                    <center>{{ $post->title }}</center>
                </h2>
                <div class="row">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid border">
                </div>
                <div>
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
            <hr>
            <button class="btn btn-light">
                <a href="{{ route('admin.posts.index') }}">
                    Back
                </a>
            </button>
        </div>
    </div>
@endsection
