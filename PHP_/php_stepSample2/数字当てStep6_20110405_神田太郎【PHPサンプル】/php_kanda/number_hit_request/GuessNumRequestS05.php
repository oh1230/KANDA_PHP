<?php
/* プログラム名		：GuessNumRequestS05.php
 * 作成日時			：2010/04/21
 * 作成者			：神田ITスクール
*/
	//変数宣言
	$userNum = $_POST['player_value'];		//予想数値(フォームからの入力値）
	$ansNum  = rand(1,9);					//正解数値(ランダム設定)

	//正解数と予想数を判定
	if($userNum < 0 || $userNum > 9){
		//範囲外の数値の場合
		$msg = "エラー！！0から9の数字ではありません<br>\n";

	}else if($ansNum == $userNum){
		//正解の場合
		$msg = "！！大当たり！！";

	}else if($ansNum > $userNum){
		//正解より小さい場合
		$msg = $userNum."より大きいです。";

	}else if($ansNum < $userNum){
		//正解より大きい場合
		$msg = $userNum."より小さいです。";

	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-31j">
<title>数字当てプログラム</title>
</head>
<body>
	<h2>数字当てプログラム</h2>
	<form action="./GuessNumRequestS05.php" method="POST">
		0から9までの数値を入力して下さい。：<input type="text" name="player_value" value="<?=$userNum?>">
		<input type="submit" value="結果表示">
	</form>
	<?php
	echo "予想数：".$userNum."\n<br>";
	echo "正解数：".$ansNum."\n<br>";
	echo $msg."\n<br>"
	?>
</body>
</html>