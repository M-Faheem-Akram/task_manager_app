<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager App</title>
</head>
<body>




<h1>Task Manager App</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="New Task" required>
    <button type="submit">Add Task</button>
</form>




<ul>
    @foreach ($tasks as $task)
        <li>
            <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline;">
                @csrf @method('PUT')
                <input type="checkbox" onChange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                {{ $task->title }}
            </form>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>


</body>
</html>
