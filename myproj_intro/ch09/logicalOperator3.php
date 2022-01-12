<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $bool = true;

	   //普通に判定します
	   if ($bool == true) {
	       echo "◆変数の中身は true ですね。<br>\n";
	   } else {
	       echo "◆変数の中身は false ですね。<br>\n";
	   }

	   //！を使って判定結果を反転させます
	   if (!($bool == true)) {
	       echo "◆変数の中身は true ですね。<br>\n";
	   } else {
	       echo "◆変数の中身は false ですね。<br>\n";
	   }
	?>
    </body>
</html>