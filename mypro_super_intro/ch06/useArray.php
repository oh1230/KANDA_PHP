<?php
    $profile[0] = "神田ゴロウ"; //名前をキー0を指定して配列に格納
    $profile[1] = 169.5; //身長をキー1を指定して配列に格納
    $profile[] = 19; //年齢をキー指定なしで配列に格納
    $profile[] = 'A'; //血液型をキー指定なしで配列に格納
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
        echo $profile[0],"さんの身長は",$profile[1],"cmです。<br>";
        echo "年齢は",$profile[2],"歳、血液型は",$profile[3],"型です<br>";
    ?>
    </body>
</html>