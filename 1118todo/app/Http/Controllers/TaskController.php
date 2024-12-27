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
        Task create([
            "name"=> $request->name,
            "content"=> $request->content
        ])

        return redirect()->route("tasks.index");
    }

    public function edit($id){
        $tasks = Task::find($id);

        return view()->route("edit.index")
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'require|max:255',
            'content' => 'require'
        ]);

        $task = Task::find0Fail($id);


        Task update([
            "name"=> $request->name,
            "content"=> $request->content
        ])

        return redirect()->route("tasks.index");
    }
}