<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $ans = 0;

	   for ($i = 1; $i <= 10; $i++) {
	       $ans = $i * 10;
	       print $ans."<br>\n";
	       if ($ans >= 50) {
	           break;
	       }
	   }
	   print "end\n";
	?>
    </body>
</html>