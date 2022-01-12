<?php
    //リンクのGET送信データを各変数に代入
    $linkGetData1 = $_GET['nickName'];
    $linkGetData2 = $_GET['address'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   echo "■\$_GETで取得したリンク送信データを表示<br>\n";
	   echo "ニックネーム「{$linkGetData1}」さんは「{$linkGetData2}」出身なんですね。\n";
	?>
    </body>
</html>