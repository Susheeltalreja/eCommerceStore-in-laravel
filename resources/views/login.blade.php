<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            width: 50vw;
            background-color: black;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }

        .error {
            padding: 30px;
            width: 50vw;
            height: 30px;
            border: none;
            border-radius: 8px;
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(255, 50, 5, 0.9);
            color: white;
        }
    </style>
</head>

<body>
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
    <div class="container">
        @if(session()->has('error'))
            <div class="error">
                <h3>{{ session()->get('error') }}</h3>
            </div>
        @endif
        <form action="/checkAuth" method="post">
            <h2>Login form</h2>
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="mt-3">
                <p>
                    Don’t have an account?
                    <a href="{{ url('/form') }}">Register here</a>
                </p>
            </div>
            <button class="btn btn-primary">Login up</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>