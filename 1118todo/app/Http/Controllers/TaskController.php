<?php

namespace App\Http\Controllers;

use App\Models\Task; // モデルの正しい名前空間をインポート
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        // 全タスクを取得
        $tasks = Task::all();

        // ビューにデータを渡す
        return view('tasks.index', compact('tasks'));
    }

    public function create() 
    {
        return view("task.index");
    }

    public function store(Request $request)
    {
        Task::create([
            "title"=> $request->name,
            "content"=> $request->content
        ]);

        return redirect()->route("tasks.index");
    }

    public function edit($id)
    {
        $tasks = Task::find($id);

        return view('tasks.edit', compact('tasks'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks -> update([
                "title"=> $request->title,
                "content"=> $request->content]);
        }

        return redirect()->route("tasks.index");
    }

    public function change($id){
        $tasks = Task::find($id);
        if (!$tasks)
        {
            return redirect()->back();
        }

        $tasks -> is_completed = !$tasks->is_completed;
        $tasks -> save();
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        $tasks = Task::find($id);

        $tasks->delete();

        return redirect()->route('tasks.index')
    }
}
