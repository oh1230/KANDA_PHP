<?php
    header ('Content-type: text/html; charset=UTF-8');

    require_once 'dbprocess.php';

    $errMsg = "";

    $sql1 = "SELECT * FROM iteminfo WHERE id = '{$_POST['id']}'";
    $result1 = executeQuery($sql1);

    if (mysqli_num_rows($result1) == 1) {
        $data = mysqli_fetch_array($result1);

        $sql2 = "UPDATE iteminfo SET name='{$_POST['name']}',price='{$_POST['price']}' WHERE id = '{$_POST['id']}'";
        $result2 = executeQuery($sql2);
    }
    else {
        $errMsg = "更新対象のid：{$_POST['id']}が見つかりませんでした。";
    }

    mysqli_free_result($result1);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	if ($errMsg == "") {?>
	    商品ID: <?=$_POST['id']?>の変更を行いました。<br><br>
	    <table border="1">
	    	<tr>
	    		<th>項目</th>
	    		<th>変更前</th>
	    		<th>変更後</th>
	    	</tr>
	    	<tr>
	    		<td>Name</td>
	    		<td><?=$data['name']?></td>
	    		<td><?=$_POST['name']?></td>
	    	</tr>
	    	<tr>
	    		<td>Price</td>
	    		<td><?=$data['price']?></td>
	    		<td><?=$_POST['price']?></td>
	    	</tr>
	    </table><br>
	    <a href="selectAll.php">商品一覧へ</a>
	    <?php }
	    else {
	        echo $errMsg;
	    }?>
    </body>
</html>