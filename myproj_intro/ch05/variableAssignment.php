<?php
    //日本で一番乗降客数の多い駅名の変数
    $jStation = '新宿';

    //世界で一番乗降客数の多い駅名の変数に＄jStationの値を代入
    $wStation = $jStation;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
    echo "日本で一番乗降客数の多い駅は、「",$jStation,"」駅です。<br>";
    echo "世界で一番乗降客数の多い駅も、「",$wStation,"」駅でギネスに認定されています。";
    ?>
    </body>
</html>