<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $body = array('height' => 165.2, 'weight' => 52.5);
	?>
	<table border="2">
		<tr bgcolor="#AAAAAA">
			<th>身長</th>
			<th>体重</th>
		</tr>
		<?php
	       print "<tr><td>{$body['height']}</td><td>{$body['weight']}</td></tr>";
	    ?>
	</table>
    </body>
</html>