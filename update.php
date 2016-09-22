<?php
include("functions.php");
//1.POSTでParamを取得
$id = $_POST["id"];
$title   = $_POST["title"];
$genre  = $_POST["genre"];
$star = $_POST["star"];
$comment = $_POST["comment"];

//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE bm_table SET title=:title, genre=:genre, star=:star, comment=:comment WHERE id=:id");
$stmt->bindValue(':title',  $title,   PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre,  PDO::PARAM_STR);
$stmt->bindValue(':star', $star, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  header("Location: bm_list_view.php");
  exit;
}

?>