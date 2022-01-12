<?php
    $aiueo = $_POST['aiueo'];
    $num = $_POST['num'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   print "入力された文字は「 $aiueo 」です。<br>";
	   print "隠し要素として送られた値は「 $num 」です。";
	?>
    </body>
</html>