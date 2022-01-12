<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $item = array("ベッド","枕","シーツ","布団","毛布");
	   $stop = 3;

	   for($i = 1; $i < 6; $i++) {
	       if($i == $stop) {
	           continue;
	       }
	       print "商品{$i}は{$item[$i-1]}です。<br>\n";
	   }
	   print "<br>";
	   print "商品{$stop}の{$item[$stop-1]}は品切れです。<br>\n";
	?>
    </body>
</html>