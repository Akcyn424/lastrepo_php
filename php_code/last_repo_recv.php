
<?php

  //デーベースの読み込み
  require_once'last_repo_db.php';
	$db=getDb();
  $tablename='lastrepotb';

   //sql文の設定
    $sql='select * from lastrepotb where month='.$_POST['month'].' and day='.$_POST['day'];

  	$result = $db -> query($sql);

    //エラー処理
  	if(!$result){
  	  echo $db->error;
  	  exit();
  	}

    $row_count=$result->num_rows;

    //連想配列で取得
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
    	$rows[] = $row;
    }

    //結果セットを解放
    $result->free();

    // データベース切断
    $db->close();

    ?>

<!DOCTYPE html>
<html lang="ja">
<html>
<head>
<title>何の日？</title>
<meta charset="utf-8">
</head>
<body>


<?php
//対象のデータ
foreach($rows as $row){


 echo '<h2>'.$row['month']."月";
 echo $row['day']."日は";
 echo htmlspecialchars($row['datetext'],ENT_QUOTES,'UTF-8');
 echo '</h2>';

}

?>

<br>

<a href="last_repo_top.php">入力に戻る</a>

</body>
</html>
