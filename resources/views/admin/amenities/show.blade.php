@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Detail amenity</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Detail amenity
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
                <h2>{{ $amenity->name }}</h2>
                <div class="row">
                    <div class="col-md-4">
                        @if ($amenity->image && file_exists(public_path($amenity->image)))
                            <div class="hotel-image-main">
                                <img src="{{ asset($amenity->image) }}" alt="{{ $amenity->name }}" width="100"
                                    class="img-fluid border">
                            </div>
                        @else
                            <img src="{{ asset('default_image.jpg') }}" alt="No Image" class="img-fluid border">
                        @endif

                    </div>
                    <div class="col-md-6" style="margin-left: 50px">
                        <div>
                            <p><strong>Price:</strong>
                                <span>{{ number_format($amenity->price) }}.VND</span>
                            </p>
                        </div>
                        <div>
                            <p><strong>Description:</strong>
                                <span id="hotel-description-short">{!! nl2br($amenity->description) !!}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <button class="btn btn-light">
                    <a href="{{ route('admin.amenities.index') }}">
                        Back
                    </a>
                </button>
            </div>
        </div>
    </div>
@endsection
