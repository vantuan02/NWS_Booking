@extends('layout.client.master')
@section('content')
    <section>
        <div class="hero-banner">
            <div class="banner-content">
                <h1>Luxury Resort</h1>
                <div class="card-container">
                    <div class="text">
                        <h2>JBAY hotel</h2>
                        <p>500.000.đ/night</p>
                        <div class="dots">
                            <div class="dot active"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="" alt="imgae">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-section">
        <h1>Best offer of the month</h1>
        <div class="room-grid">
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
                            @if ($hotel->rooms->isNotEmpty())
                                @if ($hotel->rooms->first()->sale_price == 0)
                                    <div class="new-price-container">
                                        <span class="new-price">{{ number_format($hotel->rooms->first()->price) }}.đ</span>
                                        <span class="per-night">/room/night</span>
                                    </div>
                                @else
                                    <del class="old-price">{{ number_format($hotel->rooms->first()->price) }}.đ</del>
                                    <div class="new-price-container">
                                        <span
                                            class="new-price">{{ number_format($hotel->rooms->first()->sale_price) }}.đ</span>
                                        <span class="per-night">/room/night</span>
                                    </div>
                                @endif
                            @else
                                <span class="new-price">Liên hệ để biết giá</span>
                            @endif
                        </div>
                        <button>Book Now <i class="bi bi-arrow-right"> </i></button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
