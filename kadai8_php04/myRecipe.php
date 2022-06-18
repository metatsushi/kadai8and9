<?php 
// セッションスタート・関数呼び出し
session_start();
include('function.php');

// ログイン確認（セッションIDがないまたは合っていない場合はEXIT） 
loginCheck();

// データベースへの接続処理
$pdo = db_connect();

// レシピリストTableからレシピを抽出
$stmt = $pdo-> prepare('SELECT * FROM recipeList');
$status =$stmt->execute();


// データ表示（レシピを入れる配列recipeArrを作り、FetchしたResultをrecipeArrに挿入）
$recipeArr=[];

if($status === false) {
    $error =$stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    while( $result =$stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($recipeArr,$result);
    }
    // echo($arrAll);
    //JSON形式でJSに渡す
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

.popup {
    display: none;
    height: 30%;
    width: 50%;
    background: black;
    opacity: 0.9;
    position: fixed;
    top: 30%;
    left: 30%;
}
 
.popup-inner{
    background: #fff;
    padding: 20px;
    width: 80%;
}

.show {
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
<!-- 「作りたいレシピ」と「作ったレシピ」を分けて表示。フラグつきのものは「作ったレシピ」へ -->
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
    <form enctype="multipart/form-data" id="update" method="post" action="update.php"></form>
    <form enctype="multipart/form-data" id="delete" method="post" action="delete.php"></form>
    <div id="popup" class="popup">
        <div class="popup-inner">
            <button id="close">x</button></br></br></br></br>
            <label>レシピを評価：
                <select name='rate' id='rate'>
                    <option>美味しい</option>
                    <option>普通</option>
                    <option>もう作らない</option>
                </select>
            </label>
            <input id='rating' type='submit' value='送信'></br></br></br>
        </div>
    </div>
<script>
// PHPからJSにデータ受け渡し
let recipeArr = <?= $json_recipe ?>;
   // console.log(recipeArr);
//レシピが入った連想配列（recipeArr）をForEachでKeyごとに分解
Object.keys(recipeArr).forEach((key) => {
    let val = recipeArr[key];
    console.log(val);   
//「作ったフラグ」（Cookflg）が1の場合は「作ったレシピ」の方にレンダリング
//レシピの各項目を入れるhtml要素を作り、「作ったレシピ」（CookedRecipe）のDivの中に挿入
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
                <p class="recipeIndication">${val.recipeIndication}</p>
                <p class="recipeIndication">評価：${val.rate}</p>
                <button class="delete">マイレシピから削除</button>
            </div>
            `;
        $("#cookedRecipe").append(cookedHtml);
     }  else{  
     //「作ったフラグ」（Cookflg）がない場合は「作りたいレシピ」の方にレンダリング
     //レシピの各項目を入れるhtml要素を作り、「作りたいレシピ」（SelectRecipe）のDivの中に挿入
        const selectHtml =`
            <div class="myRecipe">
                <p class="id" style="display:none">${val.id}</p>
                <h3 class="recipeTitle">${val.recipeTitle}</h3>
                <a href ="${val.recipeUrl}" target="_blank" class="image-wrap">
                    <img src="${val.foodImageUrl}"  class="foodImageUrl" > 
                </a> 
                <p class="recipeDescription">${val.recipeDescription}</p>
                <p class="recipeUrl">レシピURL：<a href ="${val.recipeUrl}" target="_blank" >${val.recipeUrl}</a></p>
                <p class="recipeIndication">${val.recipeIndication}</p>
                <button class="cooked">「作ったメニュー」に追加</button>
                <button class="delete">マイレシピから削除</button>
            </div>
            `;
        $("#selectRecipe").append(selectHtml);
     }
})

// [作ったメニューに追加]ボタンのイベント（クリックすると「作りたいレシピ」から「作ったレシピ」に移動する
$(document).on('click', '.cooked', function(){
    console.log('クリックしました');
    
    // クリックボタンの親要素Divの中のidクラスを取得し中のHTML要素（レシピのID番号）を抽出
    const arr6 = $(this).parent().find('.id').get();
    const select_Id =arr6[0].innerHTML; 
    // ”Update”のIDをつけたDIVの中にInputタグを生成しそこに抽出したレシピID番号を挿入
    $('#update').append($('<input />', {
            type: 'hidden',
            name: 'id',
            value: select_Id,
            }));      
    // ”Update”のIDをつけたDIVの中に「作ったフラグ」のInputタグを生成しそれを1とし、Update.phpに渡す
    $('#update').append($('<input />', {
        type: 'hidden',
        name: 'cookFlg',
        value: 1,
        }));   

    //レシピ評価のポップアップを出す
     $('.popup').addClass('show').fadeIn();
     $('#close').on('click',function(){
        $('.popup').fadeOut();
        });

     //レシピ評価がされたら
    $(document).on('click','#rating', function(){
        const rate = $('#rate').val();
        console.log(rate);
        $('#update').append($('<input />', {
        type: 'hidden',
        name: 'rate',
        value: rate,
        }));   
        $('.popup').fadeOut();

        $('#update').submit();
        
    });
});

// [削除]ボタンのイベント
$(document).on('click', '.delete', function(){
     // クリックボタンの親要素Divの中のidクラスを取得し中のHTML要素（レシピのID番号）を抽出
    const arr7 = $(this).parent().find('.id').get();
    const delete_Id =arr7[0].innerHTML; 
    console.log(delete_Id);
      // ”Delete”のIDをつけたDIVの中にInputタグを生成し、そこに抽出したレシピID番号を挿入しDelete.phpに渡す
    $('#delete').append($('<input />', {
            type: 'hidden',
            name: 'id',
            value: delete_Id,
            }));
            $('#delete').submit();
 });            

</script>
</body>

</html>