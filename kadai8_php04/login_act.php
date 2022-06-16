<?php
// セッションスタート・関数呼び出し
session_start();
include('function.php');

//ログインID、PWを取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


//DB接続
$pdo = db_connect();

//User tableを呼び出し
$sql = "SELECT * FROM user_table WHERE login_id=:lid AND login_pw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$response = $stmt->execute();

//SQL実行時にエラーがある場合
if($response==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  }
  
  //抽出データ数を取得
  //$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
  $val = $stmt->fetch(); //1レコードだけ取得する方法
  
  //４. 該当レコードがあればSESSIONに値を代入
  if( $val["id"] != "" ){
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["username"]   = $val['username'];
    //Login処理OKの場合select.phpへ遷移
    header("Location: callApi.php");
  }else{
    //Login処理NGの場合login.phpへ遷移
    header("Location: login.php");
    // $msgs = array();
    // array_push($msgs,"IDかPWが違います");
    }
  //処理終了
  exit();
  ?>

  