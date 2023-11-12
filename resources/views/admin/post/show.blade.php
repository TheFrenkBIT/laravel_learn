@extends('layouts.admin')

@section('content')
    <div>
        <div>
            {{ $post->name }} {{ $post->count_of_posts }}
        </div>
        <div>
            {{ $post->description }}
        </div>
        <a href="{{ route('admin.post.edit', $post->id) }}">Edit</a>
        <a href="{{ route('admin.post.index') }}">Back</a>
        <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Destroy</button>
        </form>
    </div>
@endsection
