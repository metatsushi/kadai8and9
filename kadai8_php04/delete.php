<?php
// セッションスタート・関数呼び出し
session_start();
//id値を取得
$id = $_POST['id'];
include('function.php');

// ログイン確認（セッションIDがないまたは合っていない場合はEXIT） 
loginCheck();

// データベースへの接続処理
$pdo = db_connect();

//SELECT * FROM gs_an_table WHERE id=:id;
$sql = "DELETE FROM recipeList WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  header('Location: myRecipe.php');
  exit;
}
?>