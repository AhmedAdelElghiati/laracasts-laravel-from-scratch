<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ideas</title>
</head>
<body class="bg-gray-900 p-6 max-w-xl mx-auto">
    <h1 class="font-bold text-2xl text-white mt-10 ">Your Idea</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg  mt-10">
        {{ $idea->description }}
    </div>
    <div class="mt-6 flex items-center gap-x-6">
        <a href="/ideas/{{$idea->id}}/edit" type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Edit</a>
    </div>
</body>
</html>
