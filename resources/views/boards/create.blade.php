
<html>
<head>
   @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="container p-5">
    <h1 class="text-2xl">게시판 글쓰기 화면</h1>
        <form action="/boards" method="POST">
            @csrf
            <input type="text" name='body' class="block w-100 mb-2 rounded" value="{{ old('body') }}">
            @error('body')
                <p class="text-xs text-red-500 mb-3">{{ $message }}</p>
            @enderror
            <button class="py-1 px-3 bg-black text-white rounded text-xs">저장하기</button>
        </form>
    </div>
</body>
</html>
