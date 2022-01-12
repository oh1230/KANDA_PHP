<?php
function executeQuery($sql)
{
    $url  = "localhost";
    $user = "root";
    $pass = "root123";
    $db   = "testdb";

    $link = @mysqli_connect($url, $user, $pass) or die("MySQLへの接続に失敗しました。>>");

    $sdb = @mysqli_select_db($link, $db) or die("データベースの選択に失敗しました。>>");

    $result = @mysqli_query($link, $sql) or die("クエリの送信に失敗しました。SQL:". $sql);

    @mysqli_close($link) or die("MySQL切断に失敗しました。>>");

    return($result);
}
?>