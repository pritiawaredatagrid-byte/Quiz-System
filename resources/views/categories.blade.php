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
    <div class=" flex justify-center pt-15 pb-5 flex-col items-center space-y-10">
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

    <div class="w-200">
        <h2 class="text-2xl text-blue-500 pb-4">Category List</h2>
        <ul class="border border-gray-300">
            <li class="pt-2 font-bold">
            <ul class="flex justify-between">
                <li class="w-30">Sr. No.</li>
                <li class="w-50">Category</li>
                <li class="w-50">Creator</li>
                <li class="w-30">Action</li>
            </ul>
        </li>
        @php $id = 1; @endphp
        @foreach($categories as $category)
        <li class="border-t even:bg-gray-200 border-gray-300 pt-2">
            <ul class="flex justify-between">
                <li class="w-30">{{$id}}</li>
                <li class="w-50">{{$category->name}}</li>
                <li class="w-50">{{$category->creator}}</li>
                <li class="w-30"><a href="/category/delete/{{$category->id}}"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#1f1f1f"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/></svg></a></li>
            </ul>
        </li>
        @php $id++; @endphp
        @endforeach
   </ul>

    </div>
    </div>
</body>
</html>