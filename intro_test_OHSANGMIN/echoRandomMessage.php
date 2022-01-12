<?php
    $num = mt_rand(1,5);

    if ($num == 5) {
        $msg = "大当たり！！！";
    }
    elseif ($num == 4) {
        $msg = "当たり！！";
    }
    else {
        $msg = "また来てね！";
    }

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		「<?=$num?>」が出た！<?=$msg?><br>
    </body>
</html>