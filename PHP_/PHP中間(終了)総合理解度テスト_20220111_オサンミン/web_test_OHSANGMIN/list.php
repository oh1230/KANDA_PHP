<?php
    $msg = $_GET['msg'];

    require_once("dbprocess.php");

    $sql = "SELECT * FROM employeeinfo";

    $result = executeQuery($sql);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
    	<?=$msg?><br>
		<a href="index.php">index.phpに戻る</a><br>
		<h2>従業員一覧</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>名前</th>
				<th>年齢</th>
				<th>店舗</th>
			</tr>
			<?php
			while($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?=$row['id']?></td>
				<td><?=$row['name']?></td>
				<td><?=$row['age']?></td>
				<td><?=$row['store']?></td>
			</tr>
			<?php
			}
			mysqli_free_result($result);
			?>
		</table>
    </body>
</html>