<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>업로드화면</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="">
        <div class="border-4 border-indigo-500">
            <div class="container-hearder border mb-5">파일업로드</div>
            <div class="container-body">
                <form action="{{ route('uploads.uploadFile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">파일을 고르세요.</label>
                        <br>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <button type="submit" class="mt-10 bg-green-500 text-white rounded text-3xl">업로드</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
