@extends('layout.client.master')
@section('content')
    <section>
        <div class="hero-banner">
            <div class="banner-content">
                <h1>Luxury Resort</h1>
            </div>
        </div>
    </section>
    <section class="featured-section">
        <h1>Best offer of the month</h1>
        <div class="room-grid">
            <!-- Room Card -->
            @foreach ($hotels as $hotel)
                <div class="room-card">
                    <div class="room-image">
                        @if ($hotel->hotelImages->count() > 0)
                            <img src="{{ $hotel->hotelImages->first()->image_url }}" alt="image" height="320px">
                        @else
                            <img src="{{ asset('default_image.jpg') }}" alt="No Image" class="img-thumbnail" width="100">
                        @endif
                    </div>
                    <div class="room-content">
                        <h3>{{ $hotel->name }}</h3>
                        <p>{{ $hotel->address }}</p>
                        <div class="price-rating">
                            <span class="old-price"></span>
                            <div class="new-price-container">
                                @if ($hotel->rooms->isNotEmpty())
                                    <span class="new-price">{{ number_format($hotel->rooms->first()->price) }}</span> VND
                                    <span class="per-night">/room/night</span>
                                @else
                                    <span class="new-price">Liên hệ để biết giá</span>
                                @endif
                            </div>  
                        </div>
                        <button>Book Now <i class="bi bi-arrow-right"> </i></button>
                    </div>
                </div>
            @endforeach
            <!-- Add more room cards -->
        </div>
    </section>
@endsection
