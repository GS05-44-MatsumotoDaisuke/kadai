<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>


  
<div class="wrapper">
<div class="top insert">
<h1>ログイン</h1>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
<div class="input_login_1">
<p>ID:　<input type="text" name="lid" /></p>
</div>
<div class="input_login_2">
<p>PW:　<input type="password" name="lpw" /></p>
</div>
<div class="input_login_3">
<input type="submit" value="ログイン" />
</div>
<div class="login_back">
<p><a href="make.php">新規アカウントを作成</a></p>
</div>
</form>
</div>
</div>

</body>
</html>