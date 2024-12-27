<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {% block header %}
    <!-- ヘッダーが入る -->
    {% endblock %}

    {% block title %}
    見出し
    {% endblock %}

    {% block content %}
    内容
    {% endblock %}

    {% block footer %}
    <!-- フッターが入ります -->
    {% endblock %}
</body>
</html>