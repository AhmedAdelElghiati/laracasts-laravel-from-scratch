<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ideas</title>
</head>
<body class="bg-gray-900 p-6 max-w-xl mx-auto">
<form action="./update"  method="POST">
    @csrf
    @method('PATCH')
    <div class="col-span-full">
        <label for="description" class="block text-sm/6 font-medium text-white">Update an idea</label>
        <div class="mt-2">
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">{{$idea->description}}</textarea>
        </div>
    </div>
    <div class="mt-6 flex items-center gap-x-2">
        <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
        <button form="delete-form" type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Delete</button>
    </div>
</form>
<form id="delete-form" method="POST" action="/ideas/{{$idea->id}}">
    @csrf
    @method('DELETE')
</form>
</body>
</html>
