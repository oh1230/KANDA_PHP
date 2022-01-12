<?php 
/* プログラム名		：login.php
 * プログラム説明	：ログイン画面を提供する
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();

	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");

	//変数の初期化
	$user="";
	$pass="";
	$errMsg="";
	
	//ログインボタンからの遷移か判断
	if(isset($_POST['login'])){
		$user=$_POST['user'];
		$pass=$_POST['password'];
		
		//ログイン情報チェック
		$sql = "select * from userinfo where user='{$user}' and password='{$pass}'";
		$result=executeQuery($sql);
		
		if(mysqli_num_rows($result) == 0){
			$errMsg = "ユーザー名、パスワードが正しくありません";
		}else{
			$userInfo = mysqli_fetch_assoc($result);
			
			//ログイン成功ユーザー情報をセッションに格納
			$_SESSION["userInfo"] = $userInfo;
			
			//Cookieに情報をログイン登録
			setcookie("user",$user,(time() + 30 * 86400),'/');
			setcookie("pass",$pass,(time() + 30 * 86400),'/');

			//menu画面へ遷移
			header("location: ./menu.php");
			exit;
		}
	}else{
		if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
			$user=$_COOKIE['user'];
			$pass=$_COOKIE['pass'];
		}
		
	}
?>
<HTML>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<TITLE>Login</TITLE>
	</HEAD>
	<BODY>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="BLUE" width="950">
		<h3 align="center">ログイン</h3>
		<hr align="center" size="2" color="black" width="950"></hr>
		<br><br>
		<FORM ACTION="login.php" method="POST">
			<TABLE border=0 align="center">
				<TR>
					<TD align="left" bgcolor="#6666FF" width="100">ユーザー</TD>
					<TD><INPUT type="text" size="30" name="user" value="<?=$user?>"></INPUT></TD>
				</TR>
				<TR>
					<TD align="left" bgcolor="#6666FF">パスワード</TD>
					<TD><INPUT type="password" size="30" name="password" value="<?=$pass?>"></INPUT></TD>
				</TR>
				<TR>
					<TD align="center" colspan=2><FONT color="RED">
						<?=$errMsg?>
					</FONT></TD>
				</TR>
				<TR>
					<TD align="center" colspan=2>
						<P align="center"><INPUT TYPE="SUBMIT"  name="login"  VALUE="&nbsp;ログイン&nbsp;"></INPUT></P>
					</TD>
				</TR>
			</TABLE>
		</FORM>
		<br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
</HTML>