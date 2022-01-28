<?php

require_once('funcs.php');

//1. POSTデータ取得
// IDしか飛んでこないので。URLで飛んでくるのでGETにする

$id = $_GET['id'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
    redirect('select.php');
    // header('Location: index.php');
    // exit();
}

