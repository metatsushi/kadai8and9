<?php 
// セッションスタート・関数呼び出し
session_start();
include('function.php');

// ログイン確認（セッションIDがないまたは合っていない場合はEXIT） 
loginCheck();

// データベースへの接続処理
$pdo = db_connect();

// 
$stmt = $pdo-> prepare('SELECT * FROM recipeList');
$status =$stmt->execute();


// データ表示

$recipeArr=[];

if($status === false) {
    $error =$stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    while( $result =$stmt->fetch(PDO::FETCH_ASSOC)){
    
    array_push($recipeArr,$result);
    // $json_arrAll = json_encode($arrAll); 
    
    }
    // echo($arrAll);
    $json_recipe = json_encode($recipeArr);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>
<!-- APIが取得したレシピが横並びになるように簡単にスタイル当てる -->
<style>
* {
 font-size: 14px;
}    
#selectRecipe {
 display: flex; 
 flex-wrap: wrap;  
}

#cookedRecipe {
 display: flex; 
 flex-wrap: wrap;  
}
.recipeTitle{
 height:30px;
}
.recipeUrl {
 word-break: break-all;
}
.recipeDescription {
  height:100px;  
}
.foodImageUrl {
  width:100%;
  height: 200px;  
}
.myRecipe {
  width:23%;
  padding:5px 5px; 
}
.image-wrap img {
  width:100%;
  height: 200px;
}
h2 {
    font-size:20px;
    width:100%;
    height:20px;
    background-color: whitesmoke;
}
.header-container {
    display:flex;
}


</style>

<body>
    <div class="header-container">
        <h2>作りたいレシピ</h2>
        <a class="navbar-brand" href="callApi.php">おすすめレシピに戻る</a>
    </div>
    <div id="selectRecipe">     
    </div>
    <div class="header-container">
        <h2>作ったレシピ</h2>
        <a class="navbar-brand" href="callApi.php">おすすめレシピに戻る</a>  
    </div>
    <div id="cookedRecipe">
    </div>
    <form enctype="multipart/form-data" method="post" action="update.php"></form>
<script>
// PHPからJSにデータ受け渡し
let recipeArr = <?= $json_recipe ?>;
console.log(recipeArr);
Object.keys(recipeArr).forEach((key) => {
    let val = recipeArr[key];
    console.log(val);   
    if(val.cookFlg ==1){
    const cookedHtml =`
            <div class="myRecipe">
                <p class="id" style="display:none">${val.id}</p>
                <h3 class="recipeTitle">${val.recipeTitle}</h3>
                <a href ="${val.recipeUrl}" target="_blank" class="image-wrap">
                    <img src="${val.foodImageUrl}"  class="foodImageUrl" > 
                </a> 
                <p class="recipeDescription">${val.recipeDescription}</p>
                <p class="recipeUrl">レシピURL：<a href ="${val.recipeUrl}" target="_blank" >${val.recipeUrl}</a></p>
                <p class="recipeIndication">調理時間：${val.recipeIndication}</p>
                <button class="delete">マイレシピから削除</button>
            </div>
            `;
        $("#cookedRecipe").append(cookedHtml);
     }  else{  
        const selectHtml =`
            <div class="myRecipe">
                <p class="id" style="display:none">${val.id}</p>
                <h3 class="recipeTitle">${val.recipeTitle}</h3>
                <a href ="${val.recipeUrl}" target="_blank" class="image-wrap">
                    <img src="${val.foodImageUrl}"  class="foodImageUrl" > 
                </a> 
                <p class="recipeDescription">${val.recipeDescription}</p>
                <p class="recipeUrl">レシピURL：<a href ="${val.recipeUrl}" target="_blank" >${val.recipeUrl}</a></p>
                <p class="recipeIndication">調理時間：${val.recipeIndication}</p>
                <button class="cooked">「作ったメニュー」に追加</button>
                <button class="delete">マイレシピから削除</button>
            </div>
            `;
        $("#selectRecipe").append(selectHtml);
     }
})

// [作ったメニューに追加]ボタンのイベント
$(document).on('click', '.cooked', function(){
    const arr6 = $(this).parent().find('.id').get();
    const select_Id =arr6[0].innerHTML; 
    //ポップアップを出してレシピを評価する
//     const selectHtml =`
//         <div id="popup" class="popup">
//             <div class="popup-inner">
//                 <div id="close" class="close">✖</div>
//                 <select>
//                     <option>おいしい</option>
//                     <option>普通</option>
//                     <option>もう作らない</option>
//                 </select>
//                 <input type='submit' value='送信'>
//             </div>
//         </div>
//         `
//     $("#selectRecipe").addClass('.popup').fadeIn();
  
// $('#close').on('click',function(){
//     $('.popup').fadeOut();
// });

    // console.log(select_Id);
    $('form').append($('<input />', {
            type: 'hidden',
            name: 'id',
            value: select_Id,
            }));      
    $('form').append($('<input />', {
        type: 'hidden',
        name: 'cookFlg',
        value: 1,
        }));      
     $('form').submit();
 });

// [削除]ボタンのイベント
$(document).on('click', '.delete', function(){
    const arr7 = $(this).parent().find('.id').get();
    const delete_Id =arr7[0].innerHTML; 
    $('form').append($('<input />', {
            type: 'hidden',
            name: 'id',
            value: delete_Id,
            }));
            $('form').submit();
 });            

</script>
</body>

</html>