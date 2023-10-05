<!--
    https://db.cse.ce.nihon-u.ac.jp/~u20206076/report/test/hamburger.php
-->
<?php

    $dbconn=pg_connect("dbname=u20206076 user=u20206076");
    if(!$dbconn)
    {
        exit("DB Connection Failed!");
    }

    $query=pg_query($dbconn,"
        SELECT *
            FROM hamburger
    ");

    pg_close($dbconn)
?>
<html lang="ja">
    <head>
        <title>PHPサンプル</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
        <!--レスポンシブ対応-->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    </head>
    <body style="background-color: #36393F; color: #FFF;">
        <div class="col-xs-2 col-sm-10 col-md-10" style="width: 50%;">
            <a href="/~u20206076/report/home.php" class="btn btn-primary">top</a>
            <a href="/~u20206076/report/menu/hamburger.php" class="btn btn-primary">ハンバーガー</a>
            <a href="/~u20206076/report/menu/sideMenu.php" class="btn btn-primary">サイドメニュー</a>
            <a href="/~u20206076/report/menu/drink.php" class="btn btn-primary">ドリンク</a>
        </div>
        <table border="1">
            <?php
                for($i=0; $i<pg_num_rows($query); $i++)
                {
                    print "<tr>";
                    $row=pg_fetch_row($query, $i);
                    for($j=0; $j<count($row); $j++)
                    {
                        print "<td>".$row[$j]."</td>";
                    }
                    print "</tr>";
                }
            ?>
        </table>
    </body>
<html>