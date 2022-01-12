<?php
    $name = $_GET['name'];
    $contents = $_GET['contents'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   print "・送信者<br> $name <br><br>";
	   print "・コメント<br> $contents";
	?>
    </body>
</html>