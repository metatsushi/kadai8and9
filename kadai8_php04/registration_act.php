<?php
// セッションスタート・関数呼び出し
session_start();
include('function.php');

//ログインID、PWを取得
$username = $_POST["username"];
$rid = $_POST["rid"];
$rpw = $_POST["rpw"];

//DB接続
$pdo = db_connect();

//User tableを呼び出し
$sql = "INSERT INTO user_table(id, username, login_id, login_pw)
VALUES(NULL, :username, :login_id, :login_pw)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':login_id', $rid, PDO::PARAM_STR);
$stmt->bindValue(':login_pw', $rpw, PDO::PARAM_STR);
$response = $stmt->execute();

//SQL実行時にエラーがある場合
if($response==false){
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
  } else{
    //Login処理NGの場合login.phpへ遷移
    header("Location: callApi.php");
  }
  
  ?>