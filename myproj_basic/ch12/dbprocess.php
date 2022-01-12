<?php
    //データベースへの一連の操作を行う関数
    function executeQuery ($sql) {
        $url = "localhost";
        $user = "root";
        $pass = "root123";
        $db = "itemdb";

        //Mysql サーバ接続
        $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

        //データベース選択
        mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

        //SQL文の発行
        $result = mysqli_query($link, $sql) or die ("SQL文「 $sql 」の発行に失敗しました。");

        ////Mysql サーバ接続を閉じる
        mysqli_close($link) or die("MySQLサーバの切断に失敗しました。");

        //SQL文の結果を返す
        return($result);
    }
?>