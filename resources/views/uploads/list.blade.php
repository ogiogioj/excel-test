<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <h1 class="text-2xl mb-5">이미지 업로드 목록</h1>
        @foreach ($uploads as $upload)
            <div class="background-white border rounded mb-3 p-3">
                <a href="{{ route('uploads.detail', ['upload' => $upload->id]) }}">
                    <p>{{ $upload->image_name }} </p>
                </a>
                <p>{{ $upload->created_at }}</p>

            </div>
        @endforeach
    </div>
</body>

</html>
