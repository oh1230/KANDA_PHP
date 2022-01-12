<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $hobby = array("映画鑑賞","読書","料理","靴磨き","その他");
	   $i = $_POST['hobby'];

	   echo "あなたの趣味は、",$hobby[$i],"です。";
	?>
    </body>
</html>