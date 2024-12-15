<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/index', function() {
    return  view('index',[
        'task'=>Task::latest()->paginate ()]);
    })->name('tasks.index');

Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{task}/edit',function(Task $task){
    return view('edit',['task'=>$task]);
})->name('tasks.edit');

Route::get('/tasks/{task}',function(Task $task){
    return view('show',['task'=>$task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request, Task $task) {
        $task= Task::create($request->validated());
        return redirect()->route('tasks.show',['task'=>$task->id])->with('success','Task created successfully');
})->name('tasks.store');
Route::put('/tasks/{task}', function (TaskRequest $request,Task $task) {
    $task ->update($request->validated());
    return redirect()->route('tasks.show',['task'=>$task->id])->with('success','Task updated successfully');
})->name('tasks.update');
Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Task deleted successfully');
})->name('tasks.delete');
Route::put('/tasks/{task}/toggle',function(Task $task){
    $task->toggle_complete();
    return redirect()->back()->with('success','Task updated successfully');
})->name('tasks.toggle');
