<?php
    $leftCard = $_POST['leftCard'];
    $select = $_POST['select'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>High & Low ゲーム</title>
	</head>
    <body>
	<div style="text-align: center">
		<h1>High & Low ゲーム</h1>
		<hr style="height:1; background-color:gray" />
	</div>
	<br>
	<div style="text-align: center">
	<?php
	   echo "送信カード番号： $leftCard <br>";
	   echo "High/Low選択： $select <br>";
	?>
	</div>
    </body>
</html>