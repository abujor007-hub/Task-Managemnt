<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request){
            $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Pending,In Progress,Completed',
        'due_date' => 'nullable|date',
    ]);

    $task= new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->priority = $request->priority;
    $task->status = $request->status;
    $task->due_date = $request->due_date; 


    $task->save();

         return redirect()->route('home')->with('success', "Add Task store successfully");

    }
    
    public function edit($id){
        $task=Task::find($id);
        return view('pages.edit',compact('task'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Pending,In Progress,Completed',
        'due_date' => 'nullable|date',
    ]);

    $task = Task::findOrFail($id);

    $task->title = $request->title;
    $task->description = $request->description;
    $task->priority = $request->priority;
    $task->status = $request->status;
    $task->due_date = $request->due_date;

    $task->save();

    return redirect()->route('home') ->with('success', 'Task updated successfully');
}


public function destroy($id)
{
    $task = Task::findOrFail($id);

    $task->delete();

    return redirect()->route('home') ->with('success', 'Task deleted successfully');
}


public function show($id)
{
    $task = Task::findOrFail($id);

    return view('pages.details', compact('task'));
}


}
