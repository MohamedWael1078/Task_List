@extends('layouts.app')
@section('title',isset($task) ? 'Edit task' : 'Add new task')
@section('content')
<form method="POST" action="{{ isset($task) ? route('tasks.update',['task'=>$task]) : route('tasks.store') }}">
    @csrf
    @isset($task)
    @method('PUT')
    @endisset
    <div class="mb-4">
    <label  for="title">title</label>
    <input type="text" name="title" id="title"
        @class(['border-red-500'=>$errors->has('title')])
        value="{{ $task ->title ?? old('title') }}">
    @error('title')
        <p class="error">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-4">
    <label  for="description">description</label>
    <textarea name="description" id="description" 
    @class(['border-red-500'=>$errors->has('description')]) rows="3">
    {{ $task ->description ?? old('description') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-4">
    <label  for="long_description">long description</label>
    <textarea name="long_description" id="long_description"  
    @class(['border-red-500'=>$errors->has('long_description')]) rows="3">
    {{ $task ->long_description ?? old('long_description') }}</textarea>
    @error('long_description')
    <p class="error">{{ $message }}</p>
    @enderror
    </div>
    <div class="mb-4 flex gap-2 items-center">
    <button type="submit" class="btn">
        @isset($task)
        Update Task
        @else
        Add Task
        @endisset
    </button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a
    </div>

</form>
@endsection
