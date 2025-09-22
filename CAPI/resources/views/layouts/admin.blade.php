<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css') <!-- if using Vite -->
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
