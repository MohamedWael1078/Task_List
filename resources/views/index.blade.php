@extends('layouts.app')
@section('title','The list of tasks')
@section('content')
<nav class="mb-4">
    <a class="font-medium text-gray-700 underline decoration-pink-500"
    href="{{ route('tasks.create') }}">creata new task!</a>
</nav>
@forelse ($task as $tasks )
<div>
<a href="{{ route('tasks.show',['task' =>$tasks]) }}"
    @class(['line-through'=> $tasks->completed])> {{ $tasks->title }}</a>
@empty
<div>There ara no tasks here</div>
</div>
@endforelse


@if($task->count())
<nav class="mt-4">
    {{$task->links()}}
</nav>
@endif
@endsection
