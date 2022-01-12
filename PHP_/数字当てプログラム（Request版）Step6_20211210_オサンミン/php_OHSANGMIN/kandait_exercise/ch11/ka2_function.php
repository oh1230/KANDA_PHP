<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
    <body>
	<?php
	   $data = array(54,32,10,88,49);

	   echo "配列の要素数は".count($data)."です。<br><br>\n";

	   sort($data);

	   echo "■昇順で並び替えた結果を表示<br>\n";
	   foreach ($data as $val) {
	       echo $val."<br>\n";
	   }
	?>
    </body>
</html>