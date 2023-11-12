@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.post.store') }}" method="post">
        @csrf
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Title of post</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Count of reposts</label>
            <input value="{{ old('count_of_posts') }}" type="number" name="count_of_posts" class="form-control">
            @error('count_of_posts')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Desc of post</label>
            <input value="{{ old('description') }}" type="text" name="description" class="form-control">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option></option>
                @foreach($categories as $category)
                    <option
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Tags</label>
            <select class="form-select" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option
                        @if(old('tags'))
                            @foreach(old('tags') as $selectedTag)
                                {{ $selectedTag == $tag->id ? 'selected' : '' }}
                            @endforeach
                        @endif
                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
