<?php
$profile['名前'] = "神田太郎";
$profile['性別'] = "男";
$profile['年齢'] = 23;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
        echo "私の名前は「",$profile['名前'],"」です。<br>";
        echo $profile['性別'],"です。<br>";
        echo $profile['年齢'],"です。";
    ?>
    </body>
</html>