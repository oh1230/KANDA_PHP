<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   echo "データを受信しました。<br>\n";
	   echo "名前：",$_POST['name'],"/年齢：",$_POST['age'];
	?>
    </body>
</html>