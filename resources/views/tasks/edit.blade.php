<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Beach Task - Beach Task Master</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-sky-400 to-blue-500 min-h-screen p-8">

    <h1 class="text-4xl font-bold text-yellow-300 mb-8 text-center shadow-md">Edit Beach Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="max-w-md mx-auto bg-white bg-opacity-80 shadow-lg rounded-lg overflow-hidden p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-blue-700 font-bold mb-2">Task Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}" required
                class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-green-700 font-bold mb-2">Task Description</label>
            <textarea id="description" name="description" rows="3"
                class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ $task->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="completed" class="block text-blue-700 font-bold mb-2">Task Status</label>
            <select id="completed" name="completed"
                class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white">
                <option value="0" {{ $task->completed ? '' : 'selected' }}>Pending</option>
                <option value="1" {{ $task->completed ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 text-white font-bold py-2 px-6 rounded-full hover:opacity-90 transition duration-300 shadow-md">
                Update Beach Task
            </button>
        </div>
    </form>

</body>

</html>