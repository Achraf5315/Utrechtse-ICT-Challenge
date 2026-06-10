<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Politie Vacatures</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-slate-950 text-white">

<nav class="bg-slate-900 p-4">
    <div class="container mx-auto flex gap-6">

        <a href="/">Vacatures</a>

        <a href="/quiz">Beroepentest</a>

    </div>
</nav>

<div class="container mx-auto p-8">
    @yield('content')
</div>

</body>
</html>