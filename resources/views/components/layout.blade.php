@props([
    'title' => 'Default Title'
    ])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <style>
        nav a {
            color: cornflowerblue;
            font-weight: bold;
        }
        .max-w-400 {
            max-width: 400px;
            margin: auto;
        }
        .card {
            background: #3e3e3a;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 10px
        }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </nav>

    <main>
        {{ $slot }}
    </main>

</body>
</html>
