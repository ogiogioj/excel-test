<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <h1 class="text-2xl mb-5">유저목록</h1>

        <a href="{{route('users.excel')}}">
            <button type="button" class="btn btn-dark" style="float: right;">Excel</button>
        </a>
        <br>
        @foreach ($users as $user)
            <div class="background-white border rounded mb-3 p-3">
                    <p>{{ $user->name }} </p>
                <p>{{ $user->email }}</p>
            </div>
        @endforeach
        {{ $users->links() }}
    </div>
</body>
</html>
