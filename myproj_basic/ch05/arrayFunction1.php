<?php
    $keys = array('国語','数学','理科','社会','英語');

    $data = array_fill_keys($keys, 100);

    $count = count($data);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	array_fill_keysで作成した要素の総数は「<?=$count?>」です。<br><br>
	<?php
	foreach ($data as $key => $val) {
	    echo "$key の最高点は $val です。<br>\n";
	}
	?>
    </body>
</html>