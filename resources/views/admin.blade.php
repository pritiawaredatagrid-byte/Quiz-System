<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar name={{$name}}></x-navbar>
   
    <div class=" flex justify-center pt-20">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h2 class="text-2xl text-center text-gray-800">Welcome, {{$name}}</h2>
    </div>
    </div>
</body>
</html>