<?php
    $profile['name'] = "神田ハナコ"; //名前をキー0を指定して配列に格納
    $profile['身長'] = 154.6; //身長をキー1を指定して配列に格納
    $profile['age'] = 26; //年齢をキー指定なしで配列に格納
    $profile['貯金'] = 500; //貯金をキー指定なしで配列に格納
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
        echo "\t{$profile['name']}さんの身長は{$profile['身長']}ｃｍです。<br>\n";
        echo "\t\t年齢は{$profile['age']}歳です。<br>\n";
        echo "\t\t30歳までに貯金\\{$profile['貯金']}万が目標です。\n";
    ?>
    </body>
</html>