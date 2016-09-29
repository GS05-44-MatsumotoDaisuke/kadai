<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//ログインチェック関数
function ssidCheck(){
    if(
   !isset($_SESSION["schk"]) ||
   $_SESSION["schk"]!=session_id()
   ){
   exit("Error!!");
   }else{
    session_regenerate_id();
    $_SESSION["schk"]=session_id();
   }
}

//DB接続関数（PDO）
function db_con(){
    try {
      $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
    return $pdo;
}



//SQL処理エラー
function queryError($stmt){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}
/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


?>
