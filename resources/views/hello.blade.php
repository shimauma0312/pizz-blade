<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    @if(filled($name))
        こんにちは {{ $name }} さん
    @else
        名前を入力してください
    @endif
    <form action="/hello" method="POST">
        @csrf
        名前：<input type="text" name="InputName">
        <br>
        ニックネーム：<input type="text" name="nickName">

        <input type="submit" value="送信">
    </form>
</body>
</html>
