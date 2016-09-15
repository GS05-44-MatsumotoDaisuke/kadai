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
        <div class="top insert">
            <h1>読みたい本メモ</h1>
            <form method="post" action="bm_insert.php">
            <div class="input1">
            <p>タイトル：<input type="text" name="title"></p>
            <p>ジャンル：<input type="text" name="genre"></p>
            </div>
            <div class="input2">
            <p>読みたい度：<input type="text" name="star"></p>
            </div>
            <div class="input3">
            <p>URL：<input type="text" name="url"></p>
            </div>
            <p>コメント<br><br><textArea name="comment" rows="4" cols="40"></textArea></p>
            <div class="input4">
            <input type="submit" value="送信">
            </div>
            </form>
        </div>       
    </div>
    <div class="to">
    <p><a href="bm_list_view.php">＞＞読みたい本一覧ページへ</a></p>
    </div>
</body>
</html>