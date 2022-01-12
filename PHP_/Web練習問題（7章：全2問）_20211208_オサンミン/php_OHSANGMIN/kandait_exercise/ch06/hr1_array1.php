<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $body[0] = 165.2;
	   $body[1] = 52.5;
	?>
	<table border="2">
		<tr bgcolor="#AAAAAA">
			<th>身長</th>
			<th>体重</th>
		</tr>
		<?php
	       print "<tr><td>{$body[0]}</td><td>{$body[1]}</td></tr>";
	    ?>
	</table>
    </body>
</html>