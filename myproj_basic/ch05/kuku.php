<?php
    for ($i = 1; $i <= 9; $i++) {
        for ($j = 1; $j <= 9; $j++) {
            $kuku[$i][$j] = $i * $j;
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<pre><?php
	for ($i = 1; $i <= 9; $i++) {
	    echo "$i の段： ";
	    for ($j = 1; $j <= 9; $j++) {
	        echo $kuku[$i][$j]."\t";
	    }
	    echo "<br>";
	}
	?></pre>
    </body>
</html>