@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Posts
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home | </a></li>
            <li class="active"> Posts</li>
        </ol>
    </section>
    <hr>
    <button class="btn btn-primary"><a href="{{ route('posts.create') }}" style="color: #fff;">
            <i class="bi bi-newspaper"> </i> Create</a></button>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <img src="{{$post->image}}" alt="{{ $post->title }}"
                            class="img-thumbnail" width="100">
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger',
                                'onclick' => "return confirm('Bạn có muốn xóa không?')",
                            ]) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
