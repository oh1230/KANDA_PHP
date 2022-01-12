<?php
    session_start();

    $delId = $_SESSION['delId'];

    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "testdb";

    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    $sql = "SELECT * FROM employeeinfo";

    $result = mysqli_query($link, $sql) or die ("SQL文「 $sql 」の発行に失敗しました。");

    $rows = mysqli_num_rows($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
    	<?php
    	if (isset($delId)) {
    	    echo '従業員の削除が完了しました！<br><br>';
    	}
    	?>
		<a href="index.php">index.phpに戻る</a><br>
		<h2>従業員一覧</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>名前</th>
				<th>年令</th>
				<th>店舗</th>
			</tr>
			<?php
			if ($rows > 1) {
			    while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?=$row['id']?></td>
				<td><?=$row['name']?></td>
				<td><?=$row['age']?></td>
				<td><?=$row['store']?></td>
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