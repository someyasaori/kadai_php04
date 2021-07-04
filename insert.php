<?php
// // //Sessionスタート
// session_start();

// // //関数を呼び出す
// require_once('funcs.php');

// // //ログインチェック
// // loginCheck();
// $user_name = $_SESSION['name'];

//以降はログインユーザーのみ

//POSTデータ取得
$title =$_POST["title"];
$url= $_POST["url"];
$details = $_POST["details"];
$tag = $_POST["tag"];

//DB接続（mysql）
// try {
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=power_links;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }
require_once('funcs.php');
$pdo = db_conn();

//データ登録（SQL文はINSERT）
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table(id,title,url,details,tag,indate)
  VALUES(NULL, :title, :url, :details, :tag, sysdate())"
);

//バインド変数（ハッキング/SQL Injection防止
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':details', $details, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);


//登録実行
$status = $stmt->execute();

//データ登録処理後エラーがあった場合
if($status==false){
    $error = $stmt->errorInfo();
}else{

//エラー無ければindex.phpヘリダイレクト
header('Location: index.php');

}

?>