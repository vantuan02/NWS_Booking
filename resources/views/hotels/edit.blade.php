@extends('layout.admin.master')
@section('content')
    <section>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create hotel</title>
    </section>
    <hr>
    <H2>Create new hotel</H2>
    {!! Form::open(['method' => 'PUT', 'route' => ['hotels.update', $hotel], 'enctype' => 'multipart/form-data']) !!}
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
    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
