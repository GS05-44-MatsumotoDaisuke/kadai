<?php
include("functions.php");
//1.GETでidを取得
$id = $_GET["id"];
//echo $id;

//2.DB接続など
$pdo = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM bm_table WHERE id=:id");
$stmt->bindValue(':id', $id,   PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false){
    queryError($stmt);
}else{
    $row = $stmt->fetch();    
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>bookmark</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
            <div class="detailbookbox star1">
            <div class="detailtextbox">
            <form method="post" action="update.php">
            <div class="detailinput">
            <div class="mb20">
            タイトル：<input type="text" name="title" value="<?=$row["title"]?>">
            </div>
            <div class="mb20">
            ジャンル：<input type="text" name="genre" value="<?=$row["genre"]?>">
            </div>
            </div>
            <div class="detailselect mb20">
            読みたい度:
            <select name="star">
            <option value="<?=$row["star"]?>"><?=$row["star"]?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select>
            </div>
            <div class="detailinputurl">
            <div class="mb20">
            URL：<input type="text" name="url" value="<?=$row["url"]?>">
            </div>
            </div>
            <div class="detailcommentbox">
            <h2>コメント</h2>
            <p class="detailtextarea"><textArea name="comment" rows="4" cols="40"> <?=$row["comment"]?></textArea></p>
            <div class="detailedit">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="更新">
            </div>
            </div>
            </div>
            </form>       
            </div>
    <div class="detailto">
    <p><a href="bm_list_view.php">＞＞読みたい本一覧ページへ</a></p>
    </div>
</body>
</html>