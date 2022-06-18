<?php 
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

header{
    position:fixed;
    top:0;
}
#category-selection {
 width:100%;
 background-color: whitesmoke;
 padding:10px 0px;
 height:30px;
}
body {
    padding:30px 0px;
}
#recipeLists {
 display: flex; 
 flex-wrap: wrap; 
 padding:25px,0px; 
}
.recipeTitle{
 height:30px;
}
.recipeUrl {
 word-break: break-all;
}
.recipeDescription {
  height:50px;  
}

.recipe {
  width:23%;
  padding:5px 10px; 
}
.image-wrap img {
  width:100%;
  height: 200px;
}


</style>

<header id="category-selection">
   
        <select name='category' id='category'>
            <option>カテゴリ</option>
        </select>
        <button id="category_set">決定</button>
        <a class="navbar-brand" href="myRecipe.php">マイレシピ</a>
        <a class="navbar-brand" href="logout.php">ログアウト</a>
</header>

<body>
    <form enctype="multipart/form-data" method="post" action="insert.php"></form>

    <div id="recipeLists">
    </div>
    <div id="selectRecipe">    
    </div>

<script>
//APIの呼び出し（カテゴリー別の人気ランキング）
const url1 ="https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?applicationId=1006258453091418395"
//APIの呼び出し（カテゴリー名リスト）
const url2 ="https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?applicationId=1006258453091418395"

//APIからJSONデータを取得（カテゴリー別の人気ランキング）
$.getJSON(url1, (data) => {
    const recipes = data.result;
    rendering(recipes);

});


// レシピを表示する関数を設定
const rendering = (data) => {
    for(let i=0; i < data.length; i++){ //ランキング内にあるレシピの数だけ繰り返し
        // レシピタイトル、作り方、URL、写真など取得したい情報をAPIで渡される配列から抽出
        const innerHtml =`
        <div class="recipe" >
            <h3 class="recipeTitle">${data[i].recipeTitle}</h3>
            <a href ="${data[i].recipeUrl}" target="_blank" class="image-wrap">
                <img src="${data[i].foodImageUrl}"  class="foodImageUrl"> 
            </a> 
            <p class="recipeDescription">${data[i].recipeDescription}</p>
            <p>レシピURL：<a href ="${data[i].recipeUrl}" target="_blank" class="recipeUrl" >${data[i].recipeUrl}</a></p>
            <p class="recipeIndication">調理時間：${data[i].recipeIndication}</p>
            <button class="addRecipe">マイレシピに追加</button>
        </div>
        `;
        $("#recipeLists").append(innerHtml); //ランキング内になるレシピの数だけliタグを追加生成（実は4つしか1回で取得できないことが判明）
        console.log(data[i].foodImageUrl); 
        }
    }   

//自動生成した各レシピについて「マイレシピに追加」ボタンを押した場合のイベントを設定    
$(document).on("click", ".addRecipe", function(){ 
   console.log("クリックしました");
   //クリックしたレシピLiタグの兄弟要素を取得
   const arr1 = ($(this).prevAll(".recipeIndication").get()); //APIから渡されているデータが配列でなかったのでget()を使って配列化
   const recipeIndication =arr1[0].innerHTML; //配列から取得したい情報が格納されているinnerHTMLを変数とする
   console.log(recipeIndication);
   const arr2 = ($(this).parent().find(".recipeUrl").get());
   const recipeUrl =arr2[0].innerHTML;
   console.log(recipeUrl);
   const arr3 = ($(this).prevAll(".recipeTitle").get());
   const recipeTitle =arr3[0].innerHTML;
   console.log(recipeTitle);
   const arr4 = ($(this).prevAll(".recipeDescription").get());
   const recipeDescription =arr4[0].innerHTML;
   console.log(recipeDescription);
   const arr5 = ($(this).parent().find(".foodImageUrl").get());
   console.log(arr5);
   const foodImageUrl =arr5[0].currentSrc;
   console.log(foodImageUrl);
   
   
   //マイレシピ登録したいレシピをPOSTするためのフォームを作成し、ボタンをおしたLIタグのレシピ情報を挿入しPOSTで送信 
        $('form').append($('<input />', {
            type: 'hidden',
            name: 'recipeDescription',
            value: recipeDescription
            }));
        $('form').append($('<input />', {
            type: 'hidden',
            name: 'recipeIndication',
            value: recipeIndication
            }));    
        $('form').append($('<input />', {
            type: 'hidden',
            name: 'recipeTitle',
            value: recipeTitle
            }));    
        $('form').append($('<input />', {
            type: 'hidden',
            name: 'recipeUrl',
            value: recipeUrl
            }));    
        $('form').append($('<input />', {
            type: 'hidden',
            name: 'foodImageUrl',
            value: foodImageUrl,
            }));        
        $('form').submit();

    })


// カテゴリー検索APIの呼び出し
categoryArr=[];
$.getJSON(url2, (data) => {
    const categories = data.result.large;
    console.log(categories);
    categories.forEach((category) =>{
    $('#category').append(`<option value="${category.categoryId}">${category.categoryId}:${category.categoryName}</option>`); 
    }); 


// カテゴリー検索に応じたランキングの出しわけ
$('#category_set').on('click', function(){
    const categoryId = $('#category').val();
    $.getJSON(`${url1}&categoryId=${categoryId}`, (data) => {
    console.log(categoryId);
    const recipes = data.result;
    rendering(recipes);
        });
    })

});

</script>
</body>

</html>
