<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Termwind\Components\Raw;
use App\Models\Todo;


class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all(); 
    
        return view('todo_list/index', ['todos' => $todos]);
    }

    public function store(Request $request) {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;

        $todo->save();

        return redirect('todos')->with('success', 'Công việc đã được thêm thành công.');

    }

    public function edit($id) {
        $todo = Todo::FindOrFail($id);

        return view('todo_list/edit', compact('todo'));
    }

    public function update(Request $request, $id) {
        $todo = Todo::FindOrFail($id);

        $todo->title = $request->title;
        $todo->description = $request->description;

        $todo->save();

        return redirect('todos')->with('success', 'Công việc đã được cập nhật thành công.');

    }

    public function destroy($id) {
        $todo = Todo::FindOrFail($id);

        $todo->delete();
        
        return redirect('todos')->with('success', 'Công việc đã được xóa thành công.');
    }
}
