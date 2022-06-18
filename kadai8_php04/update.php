<?php
//1. POSTデータ取得
$id     = $_POST['id'];
$cookFlg= $_POST['cookFlg'];
$rate   = $_POST['rate'];

//2. DB接続します
require_once('function.php');
$pdo = db_connect();

// データ登録SQL作成
$stmt = $pdo-> prepare('UPDATE recipeList SET rate=:rate, cookFlg=:cookFlg WHERE id=:id;');

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':rate', $rate, PDO::PARAM_STR);
// $stmt->bindValue(':recipeTitle', $recipeTitle, PDO::PARAM_STR); //危険な文字を弾いてもらう（最後のPARM＿の後は文字ならSTR、数値ならINT)
// $stmt->bindValue(':foodImageUrl', $foodImageUrl, PDO::PARAM_STR); //危険な文字を弾いてもらう
// $stmt->bindValue(':recipeDescription', $recipeDescription, PDO::PARAM_STR); //危険な文字を弾いてもらう
// $stmt->bindValue(':recipeIndication', $recipeIndication, PDO::PARAM_STR);
// $stmt->bindValue(':recipeUrl', $recipeUrl, PDO::PARAM_STR);
$stmt->bindValue(':cookFlg', $cookFlg, PDO::PARAM_INT);
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