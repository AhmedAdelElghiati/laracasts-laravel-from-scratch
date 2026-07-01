<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ideas</title>
</head>
<body class="bg-gray-900 p-6 max-w-xl mx-auto">
    @if(count($ideas))
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-white">Your Ideas</h2>
            <ul class="mt-4">
                @foreach ($ideas as $idea)
                    <a href="ideas/{{ $idea->id }}" class="block rounded-md bg-white/5 px-3 py-2 text-white hover:bg-white/10">
                        <p class="text-sm/6 text-white">{{ $idea->description }}</p>
                    </a>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
