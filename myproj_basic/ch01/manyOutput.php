<?php
    $name = "神田ハナコ";
    $height = 154.6;
    $age = 26;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
    	<?php
    	   echo "■PHPモードで出力<br>\n";
    	   echo "$name さんの身長は $height cmです。<br>";
    	   echo "年令は $age 歳です。<br><br>\n";
    	?>

		◆HTMLモードで出力１<br>
		<?php echo $name ?>さんの身長は<?php echo $height ?>cmです。<br>
		年令は<?php echo $age ?>歳です。<br><br>

		●HTMLモードで出力２（ショートタグ使用）<br>
		<?=$name?>さんの身長は<?=$height?>cmです。<br>
		年令は<?=$age?>歳です。<br>
    </body>
</html>