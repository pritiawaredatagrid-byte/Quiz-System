<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-white shadow-2xl p-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-800  cursor-pointer hover:text-blue-500">
            Quiz System
        </div>
        <div class="space-x-4">
            <a href="" class="text-gray-700 hover:text-blue-500">Categories</a>
            <a href="" class="text-gray-700 hover:text-blue-500">Quiz</a>
            <a href="" class="text-gray-700 hover:text-blue-500">Welcome {{$name}}</a>
            <a href="" class="text-gray-700 hover:text-blue-500">Login</a>
        </div>
    </nav>
</body>
</html>