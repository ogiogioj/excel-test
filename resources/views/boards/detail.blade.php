<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <h1 class="text-2xl">게시판 상세보기</h1>

        <a href="{{ route('boards.createPDF', ['board' => $board->id])}}">
            <button type="button" class="btn btn-dark" style="float: right;">PDF</button>
        </a>

        {{-- <form action="submit" method="">

        </form> --}}
        <input type="text" name='body' class="block w-100 mb-2 rounded" value="{{ old('body') ?? $board->body }}">
        @error('body')
            <p class="text-xs text-red-500 mb-3">{{ $message }}</p>
        @enderror

        <div class="flex flex-row mt-2">
            @can('update', $board)
                <form action="{{ route('boards.update', ['board' => $board->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="py-1 px-3 bg-blue-500 text-white rounded text-xs mr-1">수정하기</button>
                </form>
            @endcan

            @can('delete', $board)
                <form action="{{ route('boards.delete', ['board' => $board->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="py-1 px-3 bg-red-800 text-white rounded text-xs">삭제하기</button>
                </form>
            @endcan
        </div>
    </div>

</body>

</html>
