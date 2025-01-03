<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<form action="{{route('tasks.update', ['id'=>$tasks->id])}}" method="post">
    @csrf
    @method('PUT')
    <label for="title">タイトル</label>
        <input type="text" name="title" id="title" value="{{ $tasks->title }}" class="resize-none">
    <label for="content">詳細</label>
        <textarea name="content" id="content" class="resize-none">{{ $tasks->content }}</textarea>
    <button type="submit">更新</button>
</form>
<a href="{{route('tasks.index')}}">戻る</a>
</body>
</html> -->


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク編集</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col bg-gray-50 p-6">
    <div class="max-w-2xl mx-auto p-4 space-y-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{route('tasks.update', ['id'=>$tasks->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="flex-1 space-y-2">
                    <input type="text" name="title" id="title" value="{{ $tasks->title }}" class="w-full p-2 border rounded-md" placeholder="タイトル">
                    <textarea name="content" id="content" class="w-full p-2 border rounded-md resize-none" placeholder="詳細">{{ $tasks->content }}</textarea>
                    <div class="flex justify-end gap-2">
                        <a href="{{route('tasks.index')}}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md">戻る</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white rounded-md px-4 py-2">更新</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>