<?php
    /* プログラム名		：insertIniData.php
     * プログラム説明	：データテーブルの初期化
     * 作成日時			：2022/01/07
     * 作成者			：オ サン ミン
     */
    //データテーブルの初期化
    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    //セッションでIDと権限を確認
    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    require_once("dbprocess.php");

    $sql = "SELECT * FROM bookinfo;";
    $result = executeQuery($sql);

    //データが空いているのかを判断
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        $errMsg = "既にDBに書籍データが存在するため、初期登録は行えませんでした。";

        $link = "menu.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
    else {
        $file = "./file/initial_data.csv";
        if(!file_exists($file)){
            $errMsg = "初期データファイルがないため、初期登録は行えませんでした。";

            $link = "menu.php";

            header("Location:error.php?errMsg={$errMsg}&link={$link}");
            exit;
        }
        else {
            $openfile = fopen($file,"r");
            while(!feof($openfile)) {
                $data = fgetcsv($openfile);

                $isbn = $data[0];
                $title = $data[1];
                $price = $data[2];

                $sql = "INSERT INTO bookinfo(isbn,title,price) VALUES ('{$isbn}','{$title}',{$price})";
                $result = executeQuery($sql);
            }
            fclose($openfile);

            //テーブルにデータが入っているのかを判断
            $sql = "SELECT * FROM bookinfo";
            $result = executeQuery($sql);
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>INSERT INI DATA</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>初期データ登録</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<table align="center" style="width: 798; text-align: left">
			<tr>
				<td>
					<h2>初期データとして以下のデータを登録しました。</h2>
				</td>
			</tr>
		</table>
		<br>

		<table align="center" style="text-align: center; width: 798">
			<tr style="background-color: orange">
				<th>ISBN</th>
				<th>TITLE</th>
				<th>価格</th>
			</tr>
			<?php while ($row = mysqli_fetch_array($result)) {?>
			<tr>
				<td><?=$row['isbn']?></td>
				<td><?=$row['title']?></td>
				<td><?=$row['price']?>円</td>
			</tr>
			<?php }
			mysqli_free_result($result);
			?>
		</table>

		<br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>