<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand" href="{{route('series.index')}}">Home</a>

            @auth
            <a class="navbar-brand" href="{{route('login.destroy')}}">Logout</a>
            @endauth
            @guest
            <a class="navbar-brand" href="{{route('login')}}">Entrar</a>
            @endguest
        </nav>

       
    <h1>{{$title}}</h1>
    
    @if($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif
    {{$slot}}
    </div>
</body>

</html>