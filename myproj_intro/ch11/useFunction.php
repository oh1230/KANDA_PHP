<?php
    for ($i = 0; $i < 4; $i++) {
        $data1[] = mt_rand(0,6);
    }
    $data2 = $data1;

    rsort($data2);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	ランダムデータ --- 並び替えたデータ<br>
	<?php
    	for ($i = 0; $i < count($data1); $i++) {
    	    echo "\$data1[{$i}] = ".$data1[$i]." --- \$data2[{$i}] = ".$data2[$i]."<br>\n";
    	}
	?>
    </body>
</html>