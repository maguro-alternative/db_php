<!--
    https://db.cse.ce.nihon-u.ac.jp/~u20206076/report/test/drink.php
-->
<?php

    $dbconn=pg_connect("dbname=u20206076 user=u20206076");
    if(!$dbconn)
    {
        exit("DB Connection Failed!");
    }

    $query=pg_query($dbconn,"
        SELECT *
            FROM drink
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