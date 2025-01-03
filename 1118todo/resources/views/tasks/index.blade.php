<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col">
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <ul>
            <li>
                <label for="taskName" class="sr-only">タイトル</label>
                <input type="text" name="name" id="taskName" placeholder="タイトル">
            </li>
            <li>
                <label for="content" class="sr-only">詳細</label>
                <textarea name="content" id="content" class="resize-none" placeholder="詳細"></textarea>
                <button type="submit">追加</button>
            </li>
        </ul>
    </form>
    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>詳細</th>
                <th>完了/未完了</th>
                <th>変更</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->content }}</td>
                <td>
                <form action="{{route('tasks.change', ['id'=>$task->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                    @if ($task->is_completed)
                        <span>完了です</span>
                    @else
                        <span>未完了です</span>
                    @endif
                    <button type="submit">更新</button>
                </form>
                </td>
                <td>
                    <a href="{{route('tasks.edit', ['id'=>$task->id]) }}">変更</a>
                </td>
                <td>
                    <form action="{{route('tasks.destroy', ['id'=>$task->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit'>削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col bg-gray-50 p-6">
    <!-- Task Creation Form -->
    <div class="max-w-2xl mx-auto p-4 space-y-4">
        <div class="bg-white shadow-lg rounded-lg p-6" >
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="flex gap-4 mb-6 space-y-2">
                    <div class="flex-1 space-y-2">
                        <label for="taskName" class="sr-only">タイトル</label>
                        <input type="text" name="name" id="taskName" placeholder="タイトル" class="w-full p-2 border rounded-md" required>
                        
                        <label for="content" class="sr-only">詳細</label>
                        <textarea name="content" id="content" placeholder="詳細" class="w-full p-2 border rounded-md resize-none" required></textarea>
                    </div>
                    <button type="submit" class="h-full bg-blue-600 hover:bg-blue-700 text-white rounded-md px-4 py-2 flex items-center">
                        <span class="mr-2">追加</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Task List Table -->
        <div class="bg-white shadow-lg rounded-lg p-6 space-y-4">
            <table class="min-w-full table-auto">
                <!-- <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">タイトル</th>
                        <th class="py-2 px-4 border-b">詳細</th>
                        <th class="py-2 px-4 border-b">完了/未完了</th>
                        <th class="py-2 px-4 border-b">変更</th>
                        <th class="py-2 px-4 border-b">削除</th>
                    </tr>
                </thead> -->
                <tbody>
                    @foreach($tasks as $task)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $task->title }}</td>
                        <td class="py-2 px-4">{{ $task->content }}</td>
                        <td class="py-2 px-4">
                            <form action="{{ route('tasks.change', ['id' => $task->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                @if ($task->is_completed)
                                    <span class="text-green-600"><button type="submit" class="ml-2 text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></button></span>
                                @else
                                    <span class="text-red-600"><button type="submit" class="ml-2 text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button></span>
                                @endif
                            </form>
                        </td>
                        <td class="py-2 px-4">
                            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                        </td>
                        <td class="py-2 px-4">
                            <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>