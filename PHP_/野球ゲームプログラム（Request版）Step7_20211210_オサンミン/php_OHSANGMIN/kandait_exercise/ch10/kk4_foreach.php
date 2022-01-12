<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>switchのサンプル</title>
	</head>
    <body>
	<?php
    	$fruit = array('apple' => "りんご", 'orange' => "オレンジ", 'strawberry' => "いちご",
    	               'banana' => "バナナ", 'mango' => "マンゴー");

    	foreach ($fruit as $key => $value) {
    	    echo $key,"は",$value,"です。<br>\n";
    	}
	?>
    </body>
</html>