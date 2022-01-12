<?php
    //名前用の変数
    $name = "神田ハナコ";

    //身長用の変数
    $height = 154.6;

    //年齢用の変数
    $age = 26;

    //真偽値の変数
    $check = true;

    //nullの変数
    $empty = null;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
        var_dump($name); echo "<br>";
        var_dump($height); echo "<br>";
        var_dump($age); echo "<br>";
        var_dump($check); echo "<br>";
        var_dump($empty); echo "<br>";
    ?>
    </body>
</html>