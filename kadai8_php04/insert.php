<?php 
//最初にSESSIONを開始！！ココ大事！！
session_start();

//1.  DB接続します
require_once('function.php');
$pdo = db_connect();


// 1.POSTデータ取得
$recipeTitle = $_POST['recipeTitle'];
$foodImageUrl = $_POST['foodImageUrl'];
$recipeDescription = $_POST['recipeDescription'];
$recipeIndication = $_POST['recipeIndication'];
$recipeUrl = $_POST['recipeUrl'];

// 2DB接続する（エラー処理追加 host=localhost, id=root ,PW=なしの場合）
try {
    $pdo = new PDO('mysql:dbname=gs_kadai8; charset=utf8; host=localhost','root','root');
}catch(PDOException $e) {
  exit('DBConnectError:' . $e->getMessage());
 }

// データ登録SQL作成
$stmt = $pdo-> prepare('INSERT INTO recipeList(id, recipeTitle, foodImageUrl, recipeDescription, recipeIndication, recipeUrl)
VALUES(NULL, :recipeTitle, :foodImageUrl, :recipeDescription, :recipeIndication, :recipeUrl)'); //stmtに入れて

$stmt->bindValue(':recipeTitle', $recipeTitle, PDO::PARAM_STR); //危険な文字を弾いてもらう（最後のPARM＿の後は文字ならSTR、数値ならINT)
$stmt->bindValue(':foodImageUrl', $foodImageUrl, PDO::PARAM_STR); //危険な文字を弾いてもらう
$stmt->bindValue(':recipeDescription', $recipeDescription, PDO::PARAM_STR); //危険な文字を弾いてもらう
$stmt->bindValue(':recipeIndication', $recipeIndication, PDO::PARAM_STR);
$stmt->bindValue(':recipeUrl', $recipeUrl, PDO::PARAM_STR);
$status = $stmt->execute();

//4. データ登録処理後
if($status === false) {
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . print_r($error, true));
} else {
    echo 'データベースに保存しました';
    header('Location: myRecipe.php');
}
?>