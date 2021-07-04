<?php

//DB接続
require_once('funcs.php');
$pdo = db_conn2();

//実行
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//DBから呼び出し
$view="";

if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $view .= "<tr>";
        $view .= "<td>".h($result['name']).'</td><td>'.h($result['lid']).'</td><td>'.h($result['kanri_flg']).'</td><td>'.h($result['life_flg']).'</td><td>'.'<a href="user_detail.php?id='.$result['id'].'">'.'[編集]'.'</a>'.'</td><td>'.'<a href="user_delete.php?id='.$result['id'].'">'.'[削除]'.'</a>';
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
    <link rel="stylesheet" href="css/user_style.css">
    <title>ユーザー管理</title>
</head>
<body>

<p class="summary">登録済みユーザー一覧</p> 

<table class="result" border="1">
    <tr>
    <th>名前</th>
	<th>LID</th>
	<th>管理者ステータス</th>
	<th>入・退社</th>
    <th>編集</th>
    <th>削除</th>
    </tr>
    <?= $view ?>
</table>

<p class="return"><a href="user_index.php">新規登録画面へ</a></p>

</body>
</html>
