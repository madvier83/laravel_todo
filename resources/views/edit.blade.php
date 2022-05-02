@extends('/layouts/main')

@section('container')

    <h3>Update</h3>
    <form action="{{ route('main.update', $task->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="">Task : 
            <input type="text" name="task" value="{{ $task->task }}" autofocus="">
            <button type="submit">Update</button>
        </label>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Task</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($todolist as $todo)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $todo->task }}</td>
            <td>{{ $todo->status }}</td>
            <td>
                <form action="{{ route('main.destroy', $todo->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Delete this task?');">Delete</button>
                </form>
                <a href="/main/{{ $todo->id }}/edit"><button>Update</button></a>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>

@endsection