<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beach Task Master</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-sky-400 to-blue-500 min-h-screen p-8">

    <h1 class="text-4xl font-bold text-yellow-300 mb-8 text-center shadow-md">Beach Task List</h1>

    <div class="max-w-4xl mx-auto mb-8">
        <a href="{{ route('tasks.create') }}"
            class="inline-block bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 text-white font-bold py-2 px-6 rounded-full hover:opacity-90 transition duration-300 shadow-md">
            Create New Beach Task
        </a>
    </div>

    <table class="w-full max-w-4xl mx-auto bg-white bg-opacity-80 shadow-lg rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 text-white">
                <th class="py-3 px-4 text-left">Title</th>
                <th class="py-3 px-4 text-left">Description</th>
                <th class="py-3 px-4 text-left">Status</th>
                <th class="py-3 px-4 text-center">Edit</th>
                <th class="py-3 px-4 text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $tasks as $task )
            <tr class="border-b border-blue-200 hover:bg-blue-100">
                <td class="py-3 px-4 text-blue-700">{{ $task->title }}</td>
                <td class="py-3 px-4 text-green-700">{{ $task->description }}</td>
                <td class="py-3 px-4">
                    @if( $task->completed == 1)
                    <span class="bg-green-500 text-white py-1 px-2 rounded-full text-sm">Done</span>
                    @else
                    <span class="bg-yellow-500 text-white py-1 px-2 rounded-full text-sm">Pending</span>
                    @endif
                </td>
                <td class="py-3 px-4 text-center">
                    <a href="{{ route('tasks.edit', $task->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-full text-sm transition duration-300">
                        Edit
                    </a>
                </td>
                <td class="py-3 px-4 text-center">
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-full text-sm transition duration-300">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>