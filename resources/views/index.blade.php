@extends('/layouts/main')

@section('container')
    
<h3>Create</h3>
<form action="/main" method="POST">
    @csrf
        <label for="">Task : 
            <input type="text" name="task">
            <button type="submit">Add</button>
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

    @endsection