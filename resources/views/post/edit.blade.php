<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Title of post</label>
            <input type="text" name="name" class="form-control" value="{{ $post->name }}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Count of reposts</label>
            <input type="number" name="count_of_posts" class="form-control" value="{{ $post->count_of_posts }}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Desc of post</label>
            <input type="text" name="description" class="form-control" value="{{ $post->description }}">
        </div>
        <div class="mb-3 col-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option></option>
                @foreach($allCategories as $category)
                    <option
                        {{ $post->category_id == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-3">
            <label class="form-label">Tags</label>
            <select class="form-select" name="tags[]" multiple>
                @foreach($allTags as $tag)
                    <option
                    @foreach($tags as $currentTag)
                            {{ $tag->id === $currentTag->id ? 'selected' : '' }}
                    @endforeach
                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
