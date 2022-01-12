<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<center>
			<?php if ($_POST['flag']==1) {?>
			■管理者メニュー<br><br>
			<a href="">ユーザー管理</a><br>
			<a href="">商品管理</a><br>
			<a href="">在庫確認</a><br>
			<a href="">売り上げ状況確認</a><br>
			<?php } else {?>
			■一般ユーザーメニュー<br><br>
			<a href="">プロフィール</a><br>
			<a href="">商品購入</a><br>
			<a href="">購入履歴確認</a><br>
			<a href="">問い合わせ</a><br>
			<?php }?>
			<a href="changeHtmlForm.php">ログアウト</a><br>
		</center>
    </body>
</html>