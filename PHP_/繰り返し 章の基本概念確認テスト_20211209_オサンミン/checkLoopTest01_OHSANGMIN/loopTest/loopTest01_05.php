<?php
    $count = 0;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	for (;;) {
    	    $n = mt_rand(1,6);
    	    echo "サイコロの目「 $n 」<br>\n";
    	    $count++;
    	    if ($n === 6) {
    	        break;
    	    }
    	}
    	echo "$count 回目で 6 が出たので終わりです。";
	?>
    </body>
</html>