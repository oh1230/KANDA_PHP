<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $data = array("りんご","みかん","メロン","いちご");

	   $fp = fopen("output.txt","w");

	   fputs ($fp, "■好きな果物リスト\n");

	   foreach ($data as $val) {
	       fputs ($fp,$val . "\n");
	   }

	   echo "書き込みが終了しました。";

	   fclose ($fp);
	?>
    </body>
</html>