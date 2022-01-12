<?php
    //別画面からのPOSTデータを各変数に代入
    $postData1 = $_POST['nickName'];
    $postData2 = $_POST['door'];

    //$_GETでも取得してみる※データは取得できない
    $getData1 = $_GET['nickName'];
    $getData2 = $_GET['door'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   echo "■\$_GETで取得したデータを表示<br>\n";
	   echo "ニックネーム「{$getData1}」さんは「{$getData2}」派なんですね。<br><br>\n";
	   echo "■\$_POSTで取得したデータを表示（取得できない事を確認）<br>\n";
	   echo "ニックネーム「{$postData1}」さんは「{$postData2}」派なんですね。<br><br>\n";
	?>
    </body>
</html>