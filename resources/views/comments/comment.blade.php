<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <h1 class="text-2xl mb-5">Comment 댓글</h1>

        <a href="{{route('comments.excel')}}">
            <button type="button" class="btn btn-dark" style="float: right;">Excel</button>
        </a>
        <br>
        @foreach ($comments as $comment)
            <div class="background-white border rounded mb-3 p-3">
                {{-- <a href="{{ route('comment.detail', ['comment' => $comment->id]) }}"> --}}
                    <p>{{ $comment->body }} </p>
                </a>
                <p>{{ $comment->created_at }}</p>
            </div>
        @endforeach
        {{ $comments->links() }}
    </div>
</body>
</html>
