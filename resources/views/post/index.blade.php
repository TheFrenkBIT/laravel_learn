<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Posts</title>
</head>
<body>
    <div>
        @can('view', auth()->user())
            <div>
                <a href="{{ route('admin.post.index') }}">Admin</a>
            </div>
        @endcan
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-primary">Create</a>
        </div>
        @foreach($posts as $post)
            <div>
              <a href="{{ route('post.show', $post->id) }}">{{ $post->name }} {{ $post->count_of_reposts }} {{ $post->description }}</a>
            </div>
        @endforeach

        <div>
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
</body>
