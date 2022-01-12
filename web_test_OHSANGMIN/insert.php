<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $store = $_POST['store'];

    $msg = "";

    if (isset($id)) {
        if ($id == "") {
            $msg = "ID未入力";
        }
        elseif ($name == "") {
            $msg = "名前未入力";
        }
        elseif ($age == "") {
            $msg = "年齢未入力";
        }
        elseif ($store == "") {
            $msg = "店舗未選択";
        }
        else {
            require_once("dbprocess.php");

            $sql = "INSERT INTO employeeinfo (id,name,age,store) VALUES ('{$id}','{$name}',{$age},'{$store}')";

            $result = executeQuery($sql);

            $msg = "従業員の登録が完了しました！";

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
		<h2>従業員の登録</h2>
		<form action="insert.php" method="POST">
			ID：<input type="text" name="id"><br>
			名前：<input type="text" name="name"><br>
			年齢：<input type="text" name="age"><br>
			店舗：<input type="radio" name="store" value="神田店">神田店
				  <input type="radio" name="store" value="東京店">東京店<br>
			<input type="submit" value="登録">
		</form>
		<?=$msg?>
    </body>
</html>