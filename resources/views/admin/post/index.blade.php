@extends('layouts.admin')

@section('content')
    <div>
        <div>
            <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Create</a>
        </div>
        @foreach($posts as $post)
            <div>
                <a href="{{ route('admin.post.show', $post->id) }}">{{ $post->name }} {{ $post->count_of_reposts }} {{ $post->description }}</a>
            </div>
        @endforeach

        <div>
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
