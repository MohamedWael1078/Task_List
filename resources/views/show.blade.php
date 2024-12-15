@extends('layouts.app')
@section('title',$task->title)
@section('content')
<div class="mb-4">
    <a class="font-medium text-gray-700 underline decoration-pink-500"
     href="{{ route('tasks.index') }}"><-- Go back to the task list!</a>
</div>
<p>{{ $task -> description }}</p>
@if($task->long_description)
<p>{{ $task->long_description }}</p>
@endif
<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>
<p> @if($task->completed)
    task is completed
    @else
    task is not completed
@endif</p>
<div class="flex gap-2">
    <a href="{{ route('tasks.edit',['task'=>$task]) }}"
        class="btn">Edit Task</a> </br>

    <form action="{{ route('tasks.toggle',['task'=>$task]) }}" method="POST" class="btn">
        @csrf
        @method('PUT')
        <button type="submit">mark as {{ $task->completed ? 'not completed' : 'completed' }}</button>
    </form>
    <form  action="{{ route('tasks.delete',['task'=>$task->id]) }}" method="POST" class="btn">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
    </form>
</div>
@endsection
