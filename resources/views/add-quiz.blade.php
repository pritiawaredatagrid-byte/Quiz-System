<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar name={{$name}}></x-navbar>
    <div class=" flex justify-center pt-6 pb-5 flex-col items-center space-y-10">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        @if(Session('quiz'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-md mx-auto mt-6" role="alert">
            <span class="block sm:inline">{{ Session('quiz') }}</span>
        </div>
        <h2 class="text-2xl text-center text-gray-800">Add Quiz</h2>
        <form action="/add-quiz" method="post" class="space-y-4">
            @csrf
            <div class="w-full space-y-4">
                <input type="text" name="quiz" id="" placeholder="Enter Quiz Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none space-y-2">
                <select name="category_id" id="" class="w-full px-4 py-2 border rounded-lg focus:outline-none space-y-2">
                    <!-- <option value="">Select Category</option> -->
                    @foreach($categories as $category)
                       <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                    </select>
                  </div>
            <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add and Next</button>
            <p class="text-green-500 text-sm mt-1">Click add and next to add MCQ in quiz</p>
        </form>
        @else
        <span class="text-green-500 font-bold">Quiz: {{session('quizDetails')->name}}</span>
        <h2 class="text-2xl text-center text-gray-800 mb-2">Add MCQ</h2>
        <form action="" method="get">
          <div class="flex flex-col space-y-4">
            <textarea name="quiz" id="" placeholder="Enter your question here" class="w-full px-4 py-2 border rounded-lg focus:outline-none space-y-5"></textarea>
            <input type="text" name="quiz" id="" placeholder="Enter first option" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
            <input type="text" name="quiz" id="" placeholder="Enter second option" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
            <input type="text" name="quiz" id="" placeholder="Enter third option" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
            <input type="text" name="quiz" id="" placeholder="Enter forth option" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
            <select name="right answer" id="" placeholder="Enter forth option" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                <option value="">Select right option</option>
                <option value="">A</option>
                <option value="">B</option>
                <option value="">C</option>
                <option value="">D</option>
            </select>
            <div class="flex justify-between gap-4 mt-2">
            <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add More</button>
            <button type="submit" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add and Submit</button>
            </div>
          </div>
        </form>
    @endif
    </div>
    </div>
</body>
</html>