<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $val = 1;

	   for ($cnt = 0; $cnt <20; $cnt++) {
	       echo $val.",";
	       $val++;
	   }
	?>
    </body>
</html>