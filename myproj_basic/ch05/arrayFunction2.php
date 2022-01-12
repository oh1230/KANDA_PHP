<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	$data = array('国語'=>79,'数学'=>32,'理科'=>65,'社会'=>85,'英語'=>96);

	echo "①初期状態の配列データを表示<br>\n";
	foreach ($data as $key => $val) {
	    echo "$key = $val <br>\n";
	}

	asort($data);
	echo "<br>②昇順に並び替えた配列データを表示<br>\n";
	foreach ($data as $key => $val) {
	    echo "$key = $val <br>\n";
	}

	arsort($data);
	echo "<br>③降順に並び替えた配列データを表示<br>\n";
	foreach ($data as $key => $val) {
	    echo "$key = $val <br>\n";
	}
	?>
    </body>
</html>