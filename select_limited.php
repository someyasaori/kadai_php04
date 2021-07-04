<?php
//関数を呼び出す
require_once('funcs.php');

//DB接続
$pdo = db_conn();

//SQLで全データを取得
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//実行
$status = $stmt->execute();

$view="";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<tr>";
        $view .= "<td>".h($result['title']).'</td><td>'.'[ログインしてください]'.'</td><td>'.h($result['details']);
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

<p class="summary">資料一覧表示</p> 

<table class="result">
    <tr>
    <th>タイトル</th>
    <th>URL</th>
	<th>詳細</th>
    </tr>
    <?= $view ?>
</table>

<p class="return"><a href="index.php">目次に戻る</a></p>

</body>
</html>