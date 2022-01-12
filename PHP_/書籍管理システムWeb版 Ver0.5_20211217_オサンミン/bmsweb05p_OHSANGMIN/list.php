<?php
    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "mybookdb";

    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    $sql = "SELECT * FROM bookinfo";

    $result = mysqli_query($link, $sql) or die ("SQL文「 $sql 」の発行に失敗しました。");

    $rows = mysqli_num_rows($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
    	<div style="text-align:center">
    		<h2>書籍一覧画面</h2>
    		<br>
    		書籍一覧を表示しました。<br>
    		<hr>
    	</div>
    	<table style="margin-left: 20%; margin-right: 20%">
    		<tr>
    			<th style="width: 20%; text-align:left">ISBN</th>
    			<th style="width: 20%">書籍名</th>
    			<th style="width: 20%; text-align:right">価格</th>
    		</tr>
    		<?php
    		if ($rows > 1) {
    		    while ($row = mysqli_fetch_array($result)) {
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
    	mysqli_free_result($result);

    	mysqli_close($link) or die("MySQLサーバの切断に失敗しました。");
    	?>
    </body>
</html>