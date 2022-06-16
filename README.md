# kadai8and9
## ①課題内容（どんな作品か）
- 前回のCRUD後半（Update,Delete）の宿題が提出できていなかったので、課題8と合わせて課題9（ログイン・ログアウト）を提出します
- 料理レシピAPP
- 楽天レシピAPIを使って、おすすめの料理レシピを表示させ、その中から作りたい料理をマイレシピに登録する
- マイレシピの中で作った料理をボタンで「作った料理」に移動させられるようにした

## ②工夫した点・こだわった点
- 楽天APIと接続させた
- カテゴリーリストAPIとランキングAPIを組み合わせて、プルダウンでカテゴリーを選んでランキングが表示されるようにした
- 作りたい／作ったレシピリストを区分するようなUpdate機能を追加
- ログイン／ログアウト機能に加えて新規登録機能も追加した
- フォームを入力してPOSTするのはなく、ボタン押すだけでPOSTされるようにした（ボタンクリックイベントに連動して、フォームを擬似作成して、そこにPOST／GETしたい要素を埋め込む形）

## ③質問・疑問（あれば）
-　擬似的にフォームを作成してPOSTというのは出来たが、全くフォームとは関係なくPOSTする方法はないのか知りたい。 

## ④その他（感想、シェアしたいことなんでも）
-　APIの使い方がだいぶわかってきた
-　CRUDはほぼゼロベースで改めて作ることでかなり学習が進んだ
-　「配列／連想配列形式にした上でVar_dumpを使う」ことで、中身がわからない／挙動がわからないものについて1つずつ確認しながら前進させることができるようになってきた
-　ローカルの画像でなく、URLのリンクを使うと、画像保存しなくてもURLを呼び出すだけで画像が表示されることがわかった（当たり前な気もするがわかったのはよかった）
-　「作ったレシピ」について「評価」（美味しかったのでまた作りたい／普通／もう作らない）を追加する機能まで入れたかったが間に合わず（土曜日までに作りたい）

## ⑤参考にしたサイト
楽天レシピAPI
https://webservice.rakuten.co.jp/documentation/recipe-category-ranking
　
楽天レシピAPIは使いやすいが、カテゴリー別のランキングが4位までしか出ないのがたまにキズ
 
