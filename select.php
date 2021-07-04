<?php
//Sessionスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();
$user_name = $_SESSION['name'];

//以降はログインユーザーのみ
//XSS対策
// function h ($value) {
//     return htmlspecialchars($value,ENT_QUOTES);
// }

//検索条件取得
$keyword =$_POST["keyword"];
$search_tag= $_POST["search_tag"];

//DB接続
try {
    $pdo = new PDO('mysql:dbname=power_links;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
// $pdo = db_conn(); 

//表示するデータの選択
//＊は全選択
// $stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//検索バージョン（検索条件なければ一覧を表示（新しいもの順）、条件絞った一覧を新しいものから並べる、ができない）
if($keyword!=""){
    $stmt =$pdo->query ("SELECT * FROM gs_bm_table WHERE details LIKE '%$keyword%' ");
} else if ($search_tag!=""){
    $stmt =$pdo->query ("SELECT * FROM gs_bm_table WHERE tag='$search_tag' ");
} else {
    $stmt = $pdo->query("SELECT * FROM gs_bm_table ORDER BY indate DESC");
}


//実行
$status = $stmt->execute();


$view="";

// if($stmt==false){
//     sql_error($stmt);
// }else{

if($status==false){
    $error = $stmt->errorInfor();
    exit("ErrorQuery:". $error[2]);
}else{
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<tr>";
        $view .= "<td>".h($result['title']).'</td><td>'.h($result['url']).'</td><td>'.h($result['details']).'</td><td>'.h($result['tag']).'</td><td>'.h($result['indate']).'</td><td>'.'<a href="detail.php?id='.$result['id'].'">'.'[編集]'.'</a>'.'</td><td>'.'<a href="delete.php?id='.$result['id'].'">'.'[削除]'.'</a>';
        $view .= "</tr>";
    }
    
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>お役立ち資料一覧</title>
</head>
<body>

<p class="summary">検索結果表示</p> 

<table class="result">
    <tr>
    <th>タイトル</th>
	<th>URL</th>
	<th>詳細</th>
	<th>タグ</th>
	<th>登録日時</th>
    <th>編集</th>
    <th>削除</th>
    </tr>
    <?= $view ?>
</table>

<p class="return"><a href="index.php">目次に戻る</a></p>

</body>
</html>