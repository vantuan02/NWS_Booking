@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>Detail hotel</h1>
        <ol class="breadcrumb">
            <li class="active">Detail hotel</li>
        </ol>
    </section>

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
                            <img src="{{ asset($image->image_url) }}" alt="{{ $hotel->name }}" class="img-fluid border">
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
        <button class="btn btn-primary">
            <a href="{{ route('hotels.index') }}" style="color: #fff">
                Back
            </a>
        </button>
    </div>
@endsection
