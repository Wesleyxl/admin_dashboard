<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- styles -->
    <link rel="stylesheet" href="{{ URL::to('/website/styles/layout.css') }}">
    <!-- /styles -->

    <title>@yield('title')</title>
</head>

<body>
    <header>
        <h1>Header</h1>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <h1>Footer</h1>
    </footer>
</body>

</html>
