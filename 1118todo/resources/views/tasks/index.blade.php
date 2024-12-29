<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
<!-- createがはいります--------------------- -->
<form action="{{route('tasks.store')}}" method="POST">
    @csrf
    <label for="taskName">タイトル</label>
        <input type="text" name="name" id="taskName">
        
    <label for="content">詳細</label>
        <textarea name="content" id="content"></textarea>
    <button type="submit" >追加</button>
</form>
        <table border="1">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>詳細</th>
                    <th>完了/未完了</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <form action="" method="post">
                    @csrf
                    @method('PUT')
                        <td>
                            @if ($task->is_completed)
                                <span>完了です</span>
                            @else
                                <span>未完了です</span>
                            @endif
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>