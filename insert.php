<?php
require_once('funcs.php');

//1. POSTデータ取得
$name   = $_POST['name'];
$bookurl  = $_POST['bookurl'];
$comment = $_POST['comment'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(name,bookurl,comment,indate)VALUES(:name,:bookurl,:comment,sysdate())");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit('SQLError:' . print_r($error, true));
} else {
    // もし成功したらindex.phpを表示します。
    //*** function化する！******\
    redirect('index.php');
    // header('Location: index.php');
    // exit();
}
