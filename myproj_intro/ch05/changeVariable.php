<?php
    //名前用の変数
    $name = "神田ハナコ";

    //身長用の変数
    $height = 154.6;

    //年齢用の変数
    $age = 26;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
        echo $name, 'さんの身長は',$height,"cmです。<br>";
        echo "年齢は",$age,"歳です。";

        //$ageの値を27に変更
        $age = 27;

        echo "後1ヶ月で",$age,"歳になります。";
    ?>
    </body>
</html>