<?php
    $profile[0] = "神田ハナコ"; //名前をキー0を指定して配列に格納
    $profile[1] = 154.6; //身長をキー1を指定して配列に格納
    $profile[] = 26; //年齢をキー指定なしで配列に格納
    $profile[] = 500; //貯金をキー指定なしで配列に格納
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
        echo "\t{$profile[0]}さんの身長は{$profile[1]}ｃｍです。<br>\n";
        echo "\t\t年齢は{$profile[2]}歳です。<br>\n";
        echo "\t\t30歳までに貯金\\{$profile[3]}万が目標です。\n";
    ?>
    </body>
</html>