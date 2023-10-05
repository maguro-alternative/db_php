<!--
    https://db.cse.ce.nihon-u.ac.jp/~u20206076/ex11-2.php
-->
<html lang="ja">
    <head>
        <title>PHPサンプル</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
        <!--レスポンシブ対応-->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    </head>
    <body style="background-color: #36393F; color: #FFF;">
        <h2>
            今日の講義は
            <?php
                $a = 076;
                // $a = 100
                if( $a >= 100 )
                    print "休講";
                else
                    print "予定通り実施";
            ?>
            です。
        </h2>
    </body>
<html>