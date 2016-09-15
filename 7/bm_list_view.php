<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベース接続エラー:'.$e->getMessage());
}

//２．データ登録SQL作成
//問題：最新の5件のみ表示するSQLに変更してブラウザに表示してみてね


$stmt = $pdo->prepare("SELECT * FROM bm_table ORDER BY id DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div class="bookbox star'.$result["star"].'">'
    .'<div class="textbox">'
    .'<img src="img/star'.$result["star"].'.png" class="left ml20">'
    .'<a href="'
    .$result["url"]
    .'" target=”_blank”>'
    .'<h1 class="title">'.$result["title"]
    .'</h1></a>'
    .'<div class="commentbox"><h2>コメント</h2><p>'.$result["comment"].'</p></div>'
    .'<p class="genre">'.$result["genre"].'</p></div></div>';
  }
    
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>bookmark</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-2.1.3.min.js"></script>
<script>
$(document).ready(function(){
    $(".rank3").on("click",function(){
        $(".star3").hide(1000);
        $(".star2").hide(1000);
        $(".star1").hide(1000);
        $(".star3").show(1000);
    });
    $(".rank2").on("click",function(){
        $(".star3").hide(1000);
        $(".star2").hide(1000);
        $(".star1").hide(1000);
        $(".star2").show(1000);
    });
    $(".rank1").on("click",function(){
        $(".star3").hide(1000);
        $(".star2").hide(1000);
        $(".star1").hide(1000);
        $(".star1").show(1000);
    });
});
</script>
</head>
<body>
    <div class="wrapper clearfix">
        <div class="top">
            <h1>読みたい本一覧</h1>
            <h2>優先順位</h2>
            <div class="rank">
                <div class="rank3">
                <img src="img/rank3.png" alt="読みたい度3">
                </div>
                <div class="rank2">
                <img src="img/rank2.png" alt="読みたい度2" class="ml30">
                </div>
                <div class="rank1">
                <img src="img/rank1.png" alt="読みたい度1" class="ml30">
                </div>
            </div>
        </div>
        <?=$view?>
    </div>
    <div class="back">
    <p><a href="bm_insert_view.php">＞＞メモページに戻る</a></p>
    </div>
</body>
</html>