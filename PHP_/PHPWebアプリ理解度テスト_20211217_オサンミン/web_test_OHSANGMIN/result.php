<?php
    if (isset($_GET['cmd'])) {
        if ($_GET['cmd'] == "get") {
            $msg = "フォームからGET送信されました！";
        }
        else {
            $msg = "リンクから送信されました！";
        }
    }
    elseif (isset($_POST['cmd'])) {
        $msg = "フォームからPOST送信されました！";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo $msg;
	?>
    </body>
</html>