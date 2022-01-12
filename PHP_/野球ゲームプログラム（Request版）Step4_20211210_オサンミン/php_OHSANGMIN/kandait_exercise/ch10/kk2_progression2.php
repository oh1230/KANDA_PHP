<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $val = 2;

	   for ($cnt = 0; $cnt <20; $cnt++) {
	       echo $val."<br>\n";
	       $val *= 2;
	   }
	?>
    </body>
</html>