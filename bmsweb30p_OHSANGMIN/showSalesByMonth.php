<?php
/* プログラム名		：showSalesByMonth.php
 * プログラム説明	：売り上げ状況
 * 作成日時			：2022/01/07
 * 作成者			：オ サン ミン
 */

    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    require_once("dbprocess.php");

    $main = "売上げ状況";
    $year = $_POST['year'];
    $month = $_POST['month'];

    $total = 0;
    $rows = 0;

    if (isset($year) && isset($month)) {
        if ($year == "") {
            $msg = "年度を入力してください。";
        }
        elseif ($month == "") {
            $msg = "月を入力してください。";
        }
        else {
            if (!is_numeric($year) || !is_numeric($month)) {
                $msg = "入力数値に不正があります。";
            }
            else {
                $main = "{$year}年{$month}月売上げ状況";
                $sql = "SELECT o.isbn,b.title,b.price,o.quantity FROM orderinfo o inner join bookinfo b on o.isbn=b.isbn WHERE date BETWEEN '{$year}-{$month}-01' AND '{$year}-{$month}-31'";
                $result = executeQuery($sql);
                $rows = mysqli_num_rows($result);
            }
        }
    }


?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>SHOW SALES BY MONTH</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2><?=$main?></h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br>

		<table align="center" style="border: 0; width: 800">
			<tr align="left">
				<td>
					<form action="./showSalesByMonth.php" method="post">
						年　<input type="text" name="year" value="<?=$year?>" style="width: 150"/>　
						月　<input type="text" name="month" value="<?=$month?>" style="width: 100"/>　
						<input type="submit" value="検索" />
					</form>
				</td>
			</tr>
			<tr><td><?=$msg?><td></tr>
		</table>
		<br>

		<table align="center" style="border: 0; width: 800">
			<tr >
				<th bgcolor="orange" width="200">ISBN</th>
				<th bgcolor="orange" width="200">TITLE</th>
				<th bgcolor="orange" width="200">価格</th>
				<th bgcolor="orange" width="100">冊数</th>
				<th bgcolor="orange" width="100">売上げ小計</th>
			</tr>
			<?php
			if ($rows) {
			    while($row = mysqli_fetch_array($result)) {
			?>
    			<tr>
    				<td align="center"><?=$row["isbn"]?></td>
    				<td align="center"><?=$row["title"]?></td>
    				<td align="center"><?=$row["price"]?>円</td>
    				<td align="center"><?=$row["quantity"]?>冊</td>
    				<td align="center"><?=($row["price"] * $row["quantity"])?>円</td>
    			</tr>
    		<?php
    			$total += ($row["price"] * $row["quantity"]);
    			}
			//結果保持用メモリを開放する
			mysqli_free_result($result);
			}
			?>
		</table>

		<br>
		<hr align="center" size="2" color="SILVER" width="800">
		<table align="center" style="width: 800">
			<tr>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200">
					<table>
						<tr>
							<th style="text-align: center; width: 100; background-color: orange">合計</th>
							<td style="text-align: center; width: 100; background-color: silver"><?=$total?>円</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>