@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>Room detail</h1>
        <ol class="breadcrumb">
            <li class="active">Room detail</li>
        </ol>
    </section>

    <div class="container">
        <h2>{{ $room->hotel->name }}-{{ $room->name }}</h2>
        <div class="row">
            <div class="col-md-4">
                @if ($room->roomImages->count() > 0)
                    <div class="hotel-image-main">
                        <img src="{{ asset($room->roomImages->first()->image_url) }}" alt="{{ $room->name }}"
                            class="img-fluid border">
                    </div>
                    <br>
                    <div class="hotel-images-grid">
                        @foreach ($room->roomImages->skip(1) as $image)
                            <img src="{{ asset($image->image_url) }}" alt="{{ $room->name }}" class="img-fluid border">
                        @endforeach
                    </div>
                @else
                    <img src="{{ asset('default_image.jpg') }}" alt="No Image" class="img-fluid border">
                @endif
            </div>
            <div class="col-md-6" style="margin-left: 50px">
                <div>
                    <p><strong>Số người ở :</strong> {{ $room->customer_limit }}</p>
                    <p><strong>Giá 1 đêm :</strong> {{ number_format($room->price) }}</p>
                    <p><strong>Trạng thái :</strong> {{ App\Enums\RoomStatus::getDescription($room->status) }}</p>
                    <div class="amenities">
                        <p><strong>Tiện ích :</strong></p>
                        <div class="row">
                            @foreach ($room->amenities as $amenity)
                                <div class="col-md-3">
                                    <div class="amenity-item text-center">
                                        <img src="{{$amenity->image}}"
                                            alt="{{ $amenity->name }}" class="img-fluid amenity-img">
                                        <p>{{ $amenity->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p><strong>Description:</strong>
                        <span id="hotel-description-short">{!! nl2br($room->description) !!}</span>
                    </p>

                </div>
            </div>
        </div>
        <div class="hotel-info">
            <p><strong>Detail :</strong> <span id="hotel-description">{!! nl2br($room->detail) !!}</span>
            </p>
        </div>
        <hr>
        <button class="btn btn-primary">
            <a href="{{ route('rooms.index') }}" style="color: #fff">
                Back
            </a>
        </button>
    </div>
@endsection
