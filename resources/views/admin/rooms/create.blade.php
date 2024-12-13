@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Create room</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Create room
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
            {!! Form::open(['method' => 'POST', 'route' => ['admin.rooms.store'], 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('customer_limit', 'Customer limit') !!}
                        {!! Form::text('customer_limit', old('customer_limit'), [
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
                        {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Please enter price']) !!}
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'description']) !!}

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <br>
            <div class="form-group">
                {!! Form::label('detail', 'Detail') !!}
                {!! Form::textarea('detail', old('detail'), ['class' => 'form-control', 'id' => 'detail-des']) !!}

                @error('detail')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <br>
            <div class="form-group">
                {!! Form::label('images[]', 'Room Images') !!}
                {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
                <small class="text-muted">You can upload multiple images</small>

                @error('images.*')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('hotel_id', $hotels, old('hotel_id'), [
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
                        {!! Form::select('status', $statusOptions, old('status'), [
                            'class' => 'form-control',
                            'placeholder' => '-- Select status --',
                        ]) !!}
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('views[]', 'Views') !!}
                        <div>
                            @foreach ($views as $id => $name)
                                <div class="form-check">
                                    {!! Form::checkbox('views[]', $id, in_array($id, old('views', [])), [
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
                                    {!! Form::checkbox('amenities[]', $id, in_array($id, old('amenities', [])), [
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

            {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
