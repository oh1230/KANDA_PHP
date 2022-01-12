<?php
    $count = $_POST['count'];
    $total = 0;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	if ($count < 1 || $count > 100) {
    	    echo "不正な値が入力されました。<br>\n";
    	}
    	else {
    	    for ($i = 1; $i <= $count; $i++) {
    	        $total += $i;
    	    }
    	    echo "１～ $count までの合計は $total です。<br>\n";
    	}
    ?>
    </body>
</html>