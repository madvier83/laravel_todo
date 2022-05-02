@extends('/layouts/main')

@section('container')

<div class="pl-24 pt-20">
    <h3 class="text-lg font-bold text-emerald-700 mb-2">Update</h3>
    <form action="{{ route('main.update', $task->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="" class="border-1 text-emerald-900">
            <input type="text" name="task" value="{{ $task->task }}" class="border-[1px] border-emerald-700 active:border-emerald-800 px-2">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-700 text-white px-4 py-[1px] transition">Update</button>
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
                <a href="/main/{{ $todo->id }}/edit"><button class="bg-emerald-500 hover:bg-emerald-700 text-white px-2 py-[1px] text-[12px] rounded-sm transition">Edit</button></a>
                <form action="{{ route('main.destroy', $todo->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Delete this task?');" class="bg-rose-500 hover:bg-rose-700 text-white px-2 py-[1px] text-[12px] rounded-sm transition">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('main.index') }}"><button class="bg-violet-500 hover:bg-violet-700 text-white px-4 py-[1px] mt-4">Back</button></a>
</div>

@endsection