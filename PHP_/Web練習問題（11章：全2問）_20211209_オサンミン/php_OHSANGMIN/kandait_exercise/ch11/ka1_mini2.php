<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	$ans = min($_POST["num1"], $_POST["num2"]);

	print "最小値は{$ans}です。<br>\n";
	?>
    </body>
</html>