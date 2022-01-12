<?php
//array関数を使ってトランプの画像名を配列で作成
$cards = array("Jk.png","01.png","02.png","03.png","04.png","05.png","06.png",
               "07.png","08.png","09.png","10.png","11.png","12.png","13.png");
//フォームのPOST送信データを各変数に代入
$iNum = $_POST['num1'];
$hNum = $_POST['num2'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	■入力番号のカード　隠しフィールド番号のカード<br>
	<?php
    	echo '<img src="../cards/' , $cards[$iNum] , '">';
        echo '<img src="../cards/' , $cards[$hNum] , '">';
	?>
    </body>
</html>