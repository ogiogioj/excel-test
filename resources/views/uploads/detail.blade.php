<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <h1 class="text-2xl mb-5">이미지 상세보기</h1>
            <div class="background-white border rounded mb-3 p-3">
                <a href="{{ route('uploads.download', $upload->id) }}" class="bg-teal-400 test">
                    <p>{{ $upload->image_name }} </p>
                    <img src="{{ asset('storage/img/' . $upload->image_name) }}" alt="Image">
                <p>{{ $upload->created_at }}</p>
                다운로드</a>
            </div>
    </div>
</body>

</html>
