<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <div>
        <div>
            {{ $post->name }} {{ $post->count_of_posts }}
        </div>
        <div>
            {{ $post->description }}
        </div>
        <a href="{{ route('post.edit', $post->id) }}">Edit</a>
        <a href="{{ route('post.index') }}">Back</a>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Destroy</button>
        </form>
    </div>
</body>
