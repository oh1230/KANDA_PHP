<?php
    $filePath = __FILE__;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	この実行ファイルの絶対パスは以下になります。<br>
	⇒<?=$filePath?><br><br>
	マジック定数LINEが実行されたのは「<?=__LINE__?>」行目です。
    </body>
</html>