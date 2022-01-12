<?php
    function rollDice () {
        $num = mt_rand(1,6);
        echo "サイコロを振った結果、「{$num}」の目が出ました！";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?php rollDice();?>
    </body>
</html>