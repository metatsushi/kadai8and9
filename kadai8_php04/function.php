<?php

// DB接続関数
function db_connect(){
    try {
        $pdo = new PDO ('mysql:dbname=gs_kadai8; charset=utf8; host=localhost', 'root','root');
    } catch (PDOException $e) {
        exit ('データベースに接続できませんでした'. $e->getMessage());
    }
    return $pdo;
}

function fileSave($filename, $save_path){
    $result =False;
    $sql ='INSERT INTO gs_kadai8 (file_name, file_path) VALUE(:file_name, :file_path)';
    try {
    $stmt = dbc() ->prepare($sql);
    $stmt -> bindValue(1, $filename);
    $stmt -> bindValue(2, $save_path);
    $stmt -> bindValue(3, $caption);
    $result = $stmt -> execute();
    return $result;
    } catch(\Exception $e) {
      echo $e->getMessage();
      return $result;
    }
}


function err_msgs(){
    $msgs = array();
    array_push($msgs,"IDかPWが違います");
    if(!count($msgs) === 0){
        echo($msgs);
    }
 }


// ログインチェク処理 loginCheck()
function loginCheck() {

    if($_SESSION['chk_ssid']!= session_id()) { 
        echo('LOGIN ERROR'); //EXITは強制的に終了する
        header("Location: login.php");
    } else {
        // loginができている場合
        session_regenerate_id(true);
        $_SESSION['chk_ssid']= session_id(); 
    }
} 
?>