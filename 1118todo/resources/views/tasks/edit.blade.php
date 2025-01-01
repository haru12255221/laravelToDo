<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('tasks.update', ['id'=>$tasks->id])}}" method="post">
    @csrf
    @method('PUT')
    <label for="title">タイトル</label>
        <input type="text" name="title" id="title" value="{{ $tasks->title }}">
    <label for="content">詳細</label>
        <textarea name="content" id="content">{{ $tasks->content }}</textarea>
    <button type="submit">更新</button>
</form>
</body>
</html>