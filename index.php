<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本のレビュー</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div><a href="select.php">データ一覧を見る</a></div>
    </header>

    <form method="POST" action="insert.php">
            <fieldset>
                <h1>本の感想を教えてください</h1>
                <label>書籍名：<input type="text" name="name"></label><br>
                <label>書籍URL：<input type="text" name="url"></label><br>
                <label>書籍コメント：<textarea name="comment" rows="4" cols="40"></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
    </form>
</body>
</html>