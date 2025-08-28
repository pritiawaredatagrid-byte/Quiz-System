<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar name={{$name}}></x-navbar>
    @if(Session('category'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-md mx-auto mt-6" role="alert">
            <span class="block sm:inline">{{ Session('category') }}</span>
        </div>
    @endif
    <div class=" flex justify-center pt-20">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h2 class="text-2xl text-center text-gray-800 mb-6">Add Category</h2>
        <form action="/add-category" method="post" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="category" id="" placeholder="Enter Category Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none space-y-2">
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add</button>
        </form>
    </div>
    </div>
</body>
</html>