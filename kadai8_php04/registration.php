<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="select.php">xxxxx</a>
            <a class="navbar-brand" href="questionaire.php">yyyyyy</a>
        </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="registration_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>新規登録</legend>
     <label>お名前<input type="text" name="username"></label><br>
     <label>ユーザーID<input type="text" name="rid"></label><br>
     <label>パスワード<input type="text" name="rpw"></label><br>
     <input type="submit" value="登録"><br><br>
     <a href="login.php">既にIDをお持ちの方はこちら</a> 
    </fieldset>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>