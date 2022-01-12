<?php
/* プログラム名		：search.php
 * プログラム説明	：書籍の検索機能
 * 作成日時			：2021/12/20
 * 作成者			：オ サン ミン
 */
    //POST送信で受け取ったデータを変数に格納
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $price = strval($_POST['price']);

    //データベースに接続を担当するphpファイル
    require_once("dbprocess.php");

    //sql文の実行、検索
    $sql = "SELECT * FROM bookinfo WHERE isbn LIKE '%{$isbn}%' AND title LIKE '%{$title}%' AND price LIKE '%{$price}%'";
    $result = executeQuery($sql);

    //結果の数
    $rows = mysqli_num_rows($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>SEARCH</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.1.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>
		<table align="center" style="width: 950">
			<tr>
				<td style="text-align: center; width: 30%">[<a href="./menu.php">メニュー</a>] [<a href="./insert.php">書籍登録</a>]</td>
				<td style="font-size: x-large; text-align: center; width: 40%">書籍一覧</td>
				<td style="width: 30%"></td>
			</tr>
		</table>
		<hr align="center" size="2" color="black" width="950"></hr>
		<br>

		<table align="center">
			<tr>
				<td>
					<form action="./search.php" method="post">
						ISBN:<input type="text" name="isbn" value="<?=$isbn?>" style="width: 150"/>
						TITLE:<input type="text" name="title" value="<?=$title?>" style="width: 150"/>
						価格:<input type="text" name="price" value="<?=$price?>" style="width: 150"/>
						<input type="submit" value="検索" />
					</form>
				</td>
				<td>
					<form action="./list.php"><input type="submit" value="全件表示" /></form>
				</td>
			</tr>
		</table>
		<br>

		<table align="center" border="1">
			<tr >
				<th bgcolor="#6666FF" width="200">ISBN</th>
				<th bgcolor="#6666FF" width="200">TITLE</th>
				<th bgcolor="#6666FF" width="200">価格</th>
				<th bgcolor="#6666FF" width="250">更新/削除</th>
			</tr>
			<?php
			//検索結果を表示
			if($rows){
				while($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td align="center"><a href="detail.php?isbn=<?=$row["isbn"]?>" target="_self"><?=$row["isbn"]?></a></td>
				<td align="center"><?=$row["title"]?></td>
				<td align="center"><?=$row["price"]?>円</td>
				<td align="center">
					<a href="update.php?isbn=<?=$row["isbn"]?>" target="_self">更新</a>　
					<a href="delete.php?isbn=<?=$row["isbn"]?>" target="_self">削除</a>
				</td>
			</tr>
			<?php
				}
			}else{
			?>
			<tr>
				<td colspan="4" align="center">書籍データは1件もありません。</td>
			</tr>
			<?php
			}
			//結果保持用メモリを開放する
			mysqli_free_result($result);
			?>
		</TABLE>

		<br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
    </body>
</html>