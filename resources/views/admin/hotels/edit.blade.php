@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Update hotel</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Update hotel
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
            {!! Form::open(['method' => 'PUT', 'route' => ['admin.hotels.update', $hotel], 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $hotel->name, ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address', 'Address') !!}
                        {!! Form::text('address', $hotel->address, ['class' => 'form-control', 'placeholder' => 'Please enter address']) !!}

                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="meta-box">
                    <div class="form-group">
                        {!! Form::label('images[]', 'Hotel Images') !!}
                        {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
                        @error('images.*')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <!-- Hiển thị các ảnh từ bảng images -->
                        <div class="image-gallery">
                            @if ($hotel->hotelImages->count() > 0)
                                @foreach ($hotel->hotelImages as $image)
                                    <img src="{{ asset($image->image_url) }}" alt="Product Image" class="img-preview">
                                @endforeach
                            @else
                                <span class="no-images">Không có ảnh</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', $hotel->description, ['class' => 'form-control', 'id' => 'description']) !!}

                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <br>
            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
