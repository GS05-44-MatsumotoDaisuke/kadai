<?php
session_start();
//0.外部ファイル読み込み
include("functions.php");

ssidCheck();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
$table="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $table .= '<div class="list"><h2>no.'.$result["id"].'</h2><h3>お名前：'.$result["name"].'</h3><h3>ID:'.$result["lid"].'</h3><h3>pass:'.$result["lpw"].'</h3>
    <h3>権限：'.$result["kanri_flg"].'</h3><p><a href="delete_select.php?id='.$result["id"].'">[削除]</a></p></div>';
  }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>ユーザー管理ページ</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="wrapper">
<div class="top insert">
<h1>ユーザー一覧</h1>
    <?=$table?>
</div>
</div>

</body>
</html>
