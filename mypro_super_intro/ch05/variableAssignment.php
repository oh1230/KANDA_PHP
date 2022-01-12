<?php
    //日本で一番面積の小さい島名の変数
    $jIsland = '沖ノ鳥島';

    //世界で一番面積の小さい島名の変数に$jIslandの値を代入
    $wIsland = $jIsland;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
    echo "日本で一番面積の小さい島は、「",$jIsland,"」です。<br>";
    echo "世界で一番面積の小さい島も、「",$wIsland,"」となっています。";
    ?>
    </body>
</html>