@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Hotel detail</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Hotel detail
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
                <h2>{{ $hotel->name }}</h2>
                <div class="row">
                    <div class="col-md-4">
                        @if ($hotel->hotelImages->count() > 0)
                            <div class="hotel-image-main">
                                <img src="{{ asset($hotel->hotelImages->first()->image_url) }}" alt="{{ $hotel->name }}"
                                    class="img-fluid border">
                            </div>
                            <br>
                            <div class="hotel-images-grid">
                                @foreach ($hotel->hotelImages->skip(1) as $image)
                                    <img src="{{ asset($image->image_url) }}" alt="{{ $hotel->name }}"
                                        class="img-fluid border">
                                @endforeach
                            </div>
                        @else
                            <img src="{{ asset('default_image.jpg') }}" alt="No Image" class="img-fluid border">
                        @endif
                    </div>
                    <div class="col-md-6" style="margin-left: 50px">
                        <div>
                            <p><strong>Created at:</strong> {{ $hotel->created_at->format('d/m/Y') }}</p>
                            <p><strong>Updated at:</strong> {{ $hotel->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="hotel-info">
                    <p><strong>Description:</strong> <span id="hotel-description">{!! nl2br($hotel->description) !!}</span>
                    </p>
                </div>
                <hr>
                <button class="btn btn-light">
                    <a href="{{ route('admin.hotels.index') }}">
                        Back
                    </a>
                </button>
            </div>
        </div>
    </div>
@endsection
