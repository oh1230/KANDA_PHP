<?php
    $isbn = "0006";
    $title = "shell";
    $price = 1006;

    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "mybookdb";

    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    $sqlList = "SELECT * FROM bookinfo";
    $resultList = mysqli_query($link, $sqlList) or die ("SQL文「 $sqlList 」の発行に失敗しました。");

    $sqlInsert = "INSERT INTO bookinfo VALUES('{$isbn}','{$title}',{$price})";
    $resultInsert = mysqli_query($link, $sqlInsert) or die ("SQL文「 $sqlInsert 」の発行に失敗しました。");

    $resultAfterList = mysqli_query($link, $sqlList) or die ("SQL文「 $sqlList 」の発行に失敗しました。");

    $rowsBefore = mysqli_num_rows($resultList);
    $rowsAfter = mysqli_num_rows($resultAfterList);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<div style="text-align:center">
    		<h2>書籍登録画面</h2>
    	</div>

    	<p style="margin-left: 20%; text-align:left">■更新前の書籍一覧表示</p>
    	<table style="margin-left: 20%; margin-right: 20%">
    		<tr>
    			<th style="width: 20%; text-align:left">ISBN</th>
    			<th style="width: 20%">書籍名</th>
    			<th style="width: 20%; text-align:right">価格</th>
    		</tr>
    		<?php
    		if ($rowsBefore > 1) {
    		    while ($row = mysqli_fetch_array($resultList)) {
    		?>
    		<tr>
    			<td><?=$row['isbn']?></td>
    			<td><?=$row['title']?></td>
    			<td style="text-align:right"><?=$row['price']?></td>
    		</tr>
    		<?php
                }
    		}
    		?>
    	</table>

    	<hr>
    	<p style="text-align: center">書籍名「<?=$title?>」を登録しました。</p>
    	<hr>

    	<p style="margin-left: 20%; text-align:left">■更新後の書籍一覧表示</p>
    	<table style="margin-left: 20%; margin-right: 20%">
    		<tr>
    			<th style="width: 20%; text-align:left">ISBN</th>
    			<th style="width: 20%">書籍名</th>
    			<th style="width: 20%; text-align:right">価格</th>
    		</tr>
    		<?php
    		if ($rowsAfter > 1) {
    		    while ($row = mysqli_fetch_array($resultAfterList)) {
    		?>
    		<tr>
    			<td><?=$row['isbn']?></td>
    			<td><?=$row['title']?></td>
    			<td style="text-align:right"><?=$row['price']?></td>
    		</tr>
    		<?php
                }
    		}
    		?>
    	</table>
    	<?php
    	mysqli_free_result($resultList);
    	mysqli_free_result($resultAfterList);

    	mysqli_close($link) or die("MySQLサーバの切断に失敗しました。");
    	?>
    </body>
</html>