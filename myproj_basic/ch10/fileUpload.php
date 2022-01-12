<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<form enctype="multipart/form-data" action="fileUpload.php" method="POST">
			<input type="file" name="upfile"><br>
			<input type="submit" value="送信">
		</form>
    </body>
</html>

<?php
    if (isset($_FILES['upfile'])) {
        if (!empty($_FILES['upfile']['tmp_name'])) {
            $upName = "upfile/" . $_FILES['upfile']['name'];
        }

        if (move_uploaded_file($_FILES['upfile']['tmp_name'], $upName)) {
            echo "アップロードに成功しました。";
        }
        else {
            echo "アップロードに失敗しました。";
        }
    }
    else {
        echo "ファイルを選択して送信して下さい！";
    }
?>