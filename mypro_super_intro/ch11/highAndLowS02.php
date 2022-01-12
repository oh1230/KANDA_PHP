<?php
    //array関数を使ってトランプの画像名を配列で作成
    $cards = array("Jk.png","01.png","02.png","03.png","04.png","05.png","06.png",
                   "07.png","08.png","09.png","10.png","11.png","12.png","13.png");
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
	<br>
	<div style="text-align: center">
    	<?php
    	  echo '<img src="../cards/',$cards[$leftCard],'">';
          echo "　　　　　　　";
          echo '<img src="../cards/bg.png">';
        ?>
	</div>
    </body>
</html>