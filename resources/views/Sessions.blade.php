<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/setSession"><button>Create Session</button></a>
    <a href="/destroySession"><button>destroy Session</button></a>

    @if($name != '' && $email != "")
        {{ $name }}
        {{ $email }}
    @else
    {{ "Session is empty" }}
    @endif
</body>
</html>