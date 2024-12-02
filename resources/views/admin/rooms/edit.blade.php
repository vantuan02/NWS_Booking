@extends('layout.admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Room</title>
    </head>

    <body>
        {!! Form::open(['method' => 'PUT', 'route' => ['rooms.update', $room->id], 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $room->name, ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('customer_limit', 'Customer limit') !!}
                    {!! Form::text('customer_limit', $room->customer_limit, [
                        'class' => 'form-control',
                        'placeholder' => 'Please enter customer limit',
                    ]) !!}

                    @error('customer_limit')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price', $room->price, ['class' => 'form-control', 'placeholder' => 'Please enter price']) !!}
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('images[]', 'Room Images') !!}
            {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}

            @error('images.*')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="image-gallery">
                @if ($room->roomImages->count() > 0)
                    @foreach ($room->roomImages as $image)
                        <img src="{{ asset($image->image_url) }}" alt="Product Image" class="img-preview">
                    @endforeach
                @else
                    <span class="no-images">Không có ảnh</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', $room->description, ['class' => 'form-control', 'id' => 'description']) !!}

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('detail', 'Detail') !!}
            {!! Form::textarea('detail', $room->detail, ['class' => 'form-control', 'id' => 'detail-des']) !!}

            @error('detail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::select('hotel_id', $hotels, $room->hotel_id, [
                        'class' => 'form-control',
                        'placeholder' => '-- Select hotel --',
                    ]) !!}
                    @error('hotel_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::select('status', $statusOptions, $room->status, [
                        'class' => 'form-control',
                        'placeholder' => '-- Select status --',
                    ]) !!}
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('views[]', 'Views') !!}
                    <div>
                        @foreach ($views as $id => $name)
                            <div class="form-check">
                                {!! Form::checkbox('views[]', $id, in_array($id, $room->views->pluck('id')->toArray()), [
                                    'class' => 'form-check-input',
                                    'id' => 'view-' . $id,
                                ]) !!}
                                {!! Form::label('view-' . $id, $name, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach
                    </div>
                    @error('views')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('amenities[]', 'Amenities') !!}
                    <div>
                        @foreach ($amenities as $id => $name)
                            <div class="form-check">
                                {!! Form::checkbox('amenities[]', $id, in_array($id, $room->amenities->pluck('id')->toArray()), [
                                    'class' => 'form-check-input',
                                    'id' => 'amenity-' . $id,
                                ]) !!}
                                {!! Form::label('amenity-' . $id, $name, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach
                    </div>
                    @error('amenities')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </body>

    </html>
@endsection
