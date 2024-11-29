@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>Amenity detail</h1>
        <ol class="breadcrumb">
            <li class="active">Amenity detail</li>
        </ol>
    </section>

    <div class="container">
        <h2>{{ $amenity->name }}</h2>
        <div class="row">
            <div class="col-md-4">
                @if ($amenity->image && file_exists(public_path($amenity->image)))
                    <div class="hotel-image-main">
                        <img src="{{ asset($amenity->image) }}" alt="{{ $amenity->name }}"  width="100" class="img-fluid border">
                    </div>
                @else
                    <img src="{{ asset('default_image.jpg') }}" alt="No Image" class="img-fluid border">
                @endif

            </div>
            <div class="col-md-6" style="margin-left: 50px">
                <div>
                    <p><strong>Price:</strong>
                        <span>{{number_format($amenity->price)}}.VND</span>
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
        <button class="btn btn-primary">
            <a href="{{ route('amenities.index') }}" style="color: #fff">
                Back
            </a>
        </button>
    </div>
@endsection
