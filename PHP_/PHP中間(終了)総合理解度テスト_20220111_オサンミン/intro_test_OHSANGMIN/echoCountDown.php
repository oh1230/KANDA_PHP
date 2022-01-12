<?php
    $station = array('浜松町','新橋','有楽町','東京','神田');
    $count = 5;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?php
		foreach ($station as $val) {
		?>
			次は<?=$val?>に止まります。神田まであと<?=$count?>駅です。<br>
		<?php
		$count--;
		}
		?>
    </body>
</html>