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
            <a href="{{ route('post.create') }}">Create</a>
        </div>
        @foreach($posts as $post)
            <div>
              <a href="{{ route('post.show', $post->id) }}">{{ $post->name }} {{ $post->count_of_reposts }} {{ $post->description }}</a>
            </div>
        @endforeach
    </div>
</body>
