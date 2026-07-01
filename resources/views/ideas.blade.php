<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ideas</title>
</head>
<body class="bg-gray-900 p-6 max-w-xl mx-auto">
    <form action=""  method="POST">
        @csrf
        <div class="col-span-full">
            <label for="idea" class="block text-sm/6 font-medium text-white">About</label>
            <div class="mt-2">
                <textarea id="idea" name="idea" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Have an idea you want yo save for later ?</p>
        </div>
        <div class="mt-6 flex items-center gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
        </div>
    </form>

    @if(count($ideas))
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-white">Your Ideas</h2>
            <ul class="mt-4">
                @foreach ($ideas as $idea)
                    <li>
                        <p class="text-sm/6 text-white">{{ $idea->description }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
