<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	$height = 165.2;
	$weight = 52.5;
	?>
	<table border="2">
		<tr bgcolor="#AAAAAA">
			<th>身長</th>
			<th>体重</th>
		</tr>
	<?php
	print "<tr><td>{$height}</td><td>{$weight}</td></tr>";
	?>
	</table>
    </body>
</html>