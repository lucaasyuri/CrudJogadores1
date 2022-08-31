<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('welcome') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('times-index') }}">Times</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jogadores-index') }}">Jogadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">#</a>
            </li>
    </ul>
</head>
<body>
    @yield('content')
</body>
</html>