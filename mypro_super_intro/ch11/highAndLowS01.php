<?php
    //0～13の範囲でランダム数値を1つ取得
    $leftCard = mt_rand(0,13);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>High&Lowゲーム</title>
	</head>
    <body>
	<div style="text-align: center">
		<h1>High & Low ゲーム</h1>
		<hr style="height:1; background-color:gray" />
	</div>
	<div style="text-align: center">
		ランダム数値：<?php print "$leftCard"; ?>
	</div>
    </body>
</html>