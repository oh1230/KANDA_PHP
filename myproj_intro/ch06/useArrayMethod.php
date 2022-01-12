<?php
    //array関数を使って各月に咲く代表的な花のデータを配列で作成
    $flowers = array('水仙','梅','沈丁花','桜','薔薇','紫陽花','朝顔','向日葵','彼岸花','金木犀','菊','胡蝶蘭');

    //表示したい花の月を選択
    $month = 4;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo "{$month}月に咲く代表的な花として、「{$flowers[$month-1]}」があります。";
	?>
    </body>
</html>