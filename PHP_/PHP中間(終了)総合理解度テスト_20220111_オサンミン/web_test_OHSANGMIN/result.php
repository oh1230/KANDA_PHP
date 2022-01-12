<?php
    $get = $_GET['cmd'];
    $post = $_POST['cmd'];

    if (isset($get)) {
        if ($get == "get") {
            $msg = "フォームからGET送信されました！";
        }
        else {
            $msg = "リンクから送信されました！";
        }
    }
    elseif (isset($post)) {
        $msg = "フォームからPOST送信されました！";
    }
    else {
        $msg = "<a href=\"index.php\">index.phpに戻る</a>";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?=$msg?>
    </body>
</html>