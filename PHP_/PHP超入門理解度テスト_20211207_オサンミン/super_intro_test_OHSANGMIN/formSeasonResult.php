<?php
    // $month = mt_rand(1,12);
    $month = $_GET['month']
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	if ($month == 3) {
	    print "春です。";
	}
	elseif ($month == 6) {
	    print "夏です。";
	}
	elseif ($month == 9) {
	    print "秋です。";
	}
	elseif ($month == 12) {
	    print "冬です。";
	}
	else {
	    print "季節未設定です。";
	}
	?>
    </body>
</html>