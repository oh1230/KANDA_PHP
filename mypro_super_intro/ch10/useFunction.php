<?php
    //array関数を使ってトランプの画像名を配列で作成
    $cards = array("Jk.png","01.png","02.png","03.png","04.png","05.png","06.png",
                   "07.png","08.png","09.png","10.png","11.png","12.png","13.png");
    //0～13の範囲でランダム数値を1つ取得
    $num = mt_rand(0,13);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
		■ランダム番号のカード
		<?php
		  echo '($num = ',$num,')<br>';
		  echo '<img src="../cards/',$cards[$num],'">';
		?>
    </body>
</html>