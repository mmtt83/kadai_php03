<?php

/**
 * １．PHP
 * [ここでやりたいこと]
 * まず、クエリパラメータの確認 = GETで取得している内容を確認する
 * イメージは、select.phpで取得しているデータを一つだけ取得できるようにする。
 * →select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * ※SQLとデータ取得の箇所を修正します。
 */

// URLでくられてくるもの（取得）はGETを使う
$id = $_GET['id'];

// DB に接続
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成 ※IDの情報だけを取得
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
} else {
    // データが取得できたら １個だけfetch(とってくる)
    $view = $stmt->fetch();
}

// var_dump($view);

?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>詳細画面</legend>
                <label>書籍名：<input type="text" name="name" value=<?= $view['name'] ?>></label><br>
                <label>書籍URL：<input type="text" name="bookurl" value=<?= $view['bookurl'] ?>></label><br>
                <label>書籍コメント：<textarea name="comment" rows="4" cols="40"><?= $view['comment'] ?></textarea></label><br>
                
                <!-- idを表示させない -->
                <input type="hidden" name="id" value=<?= $view['id'] ?>><br>

                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
