<?php
    $id = $_POST['id'];

    if (isset($id)) {
        if ($id == "") {
            $msg = "ID未入力";
        }
        else {
            require_once("dbprocess.php");

            $sql = "DELETE FROM employeeinfo WHERE id = '{$id}'";

            $result = executeQuery($sql);

            $msg = "従業員の削除が完了しました！";

            header("Location: list.php?msg={$msg}");

            exit;
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
		<h2>従業員の削除</h2>
		<form action="delete.php" method="POST">
			削除対象のID：<input type="text" name="id"><br>
			<input type="submit" value="削除">
		</form>
		<?=$msg?>
    </body>
</html>