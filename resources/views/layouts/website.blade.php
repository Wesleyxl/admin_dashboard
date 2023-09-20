<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- metas tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- /metas tag -->

    <!-- extenal links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- /extenal links -->

    <!-- styles -->
    <link rel="stylesheet" href="{{ URL::to('/website/styles/layout.css') }}">
    <!-- /styles -->

    <title>@yield('title')</title>
</head>

<body>
    <!-- Header -->
    <header>
        <h1>Header</h1>
    </header>
    <!-- /Header -->

    <!-- Website -->
    <main>
        @yield('content')
    </main>
    <!-- /Website -->

    <!-- Footer -->
    <footer>
        <h1>Footer</h1>
    </footer>
    <!-- /Footer -->
</body>

</html>
