<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <h1 class="text-2xl mb-5">게시판 작성목록</h1>

        <a href="{{route('boards.excel')}}">
            <button type="button" class="btn btn-dark" style="float: right;">Excel</button>
        </a>
        <br>
        @foreach ($boards as $board)
            <div class="background-white border rounded mb-3 p-3">
                <a href="{{ route('boards.detail', ['board' => $board->id]) }}">
                    <p>{{ $board->body }} </p>
                </a>
                <p>{{ $board->created_at }}</p>
            </div>
        @endforeach
        {{ $boards->links() }}
    </div>
</body>
</html>
