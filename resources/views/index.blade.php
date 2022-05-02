@extends('/layouts/main')

@section('container')
<div class="pl-24 pt-20">
    
    <h3 class="text-xl font-bold text-blue-700 mb-2">Create</h3>
    <form action="/main" method="POST">
    @csrf
    <label for="" class="border-1 text-blue-900">
        <input type="text" name="task" class="border-[1px] border-blue-700 active:border-blue-800 px-2 rounded-sm transition">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-[1px] rounded-sm transition">Add</button>
    </label>
</form>
<br>
<div class="container">
    <table class="sshadow-lg bg-white border-collapse w-96">
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
</div>
</div>

    @endsection