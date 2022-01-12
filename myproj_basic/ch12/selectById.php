<?php
    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "itemdb";

    //Mysql サーバ接続
    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    //データベース選択
    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    //SQL文の用意
    $sql = "SELECT id,name,price FROM iteminfo WHERE id LIKE '%{$_POST['id']}%'";

    //SQL文の発行
    $result = mysqli_query($link, $sql) or die ("SQL文「 $sql 」の発行に失敗しました。");

    //検索結果の件数を取得
    $rows = mysqli_num_rows($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		■商品情報一覧 [検索条件：<?=$_POST['id']?>]<br>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Price</td>
			</tr>
			<?php
			if ($rows > 0) {
			    //結果セットから1行データを$rowに格納し全件取得するまで繰り返す
			    while ($row = mysqli_fetch_array($result)) {
			?>
			        <tr>
			        	<td><?=$row['id']?></td>
			        	<td><?=$row['name']?></td>
			        	<td><?=$row['price']?></td>
			        </tr>

			<?php
			    }
			}
			else {
			?>
			    <tr>
			    	<td colspan="3">検索データは見つかりませんでした。</td>
			    </tr>
			<?php
			}

			mysqli_free_result($result);

			mysqli_close($link) or die("MySQLサーバの切断に失敗しました。");
			?>
		</table>
    </body>
</html>