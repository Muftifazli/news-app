<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen">
        <nav class="bg-blue-600 text-white p-4">
            <div class="container mx-auto">
                <a href="{{ route('news.index') }}" class="font-bold">📰 Radar Jabotabek</a>
            </div>
        </nav>

        <main class="container mx-auto mt-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
