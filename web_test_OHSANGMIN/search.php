<?php
    $id = $_POST['id'];
    $rows = 0;

    if (isset($id)) {
        if ($id == "") {
            $msg = "ID未入力";
        }
        else {
            require_once("dbprocess.php");

            $sql = "SELECT * FROM employeeinfo WHERE id LIKE '%{$id}%'";

            $result = executeQuery($sql);

            $rows = mysqli_num_rows($result);
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<a href="index.php">index.phpに戻る</a><br>
		<h2>従業員の検索</h2>
		<form action="search.php" method="POST">
			検索対象のID：<input type="text" name="id"><br><br>
			<input type="submit" value="検索">
		</form>
		<?=$msg?>
		<?php
		if ($rows >= 1) {
		?>
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
    			?>
    		</table>
		<?php
		mysqli_free_result($result);
		}
		?>
    </body>
</html>