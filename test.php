<!--
    https://db.cse.ce.nihon-u.ac.jp/~u20206076/ex11-1.php
-->
<html lang="ja">
    <head>
        <title>PHPサンプル</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    </head>
    <body style="background-color: #36393F; color: #FFF;">
        <?php
            print "hello";
            function doubleInt(int $int): int {  // ←この部分で「: データ型」の形で返り値の型宣言をする
                return $int * 2;
            }
            
            print doubleInt(5);  // 10

            $link = pg_connect("dbname=u20206076 user=u20206076");

            if (!$link) {
                print(pg_last_error());
            } else {
                print("success!!");
            }

            // PostgreSQLに対する処理
            $query=pg_query($link, "select * from class;");

            $row=pg_fetch_row($query, 0);

            pg_close($link);

            print $row[1];
            print '<br>';

            while($ary=pg_fetch_array($query)){
                print $ary['class'].'<br>';
            }
        ?>

        <table border="1">
            <?php
                for($i=0; $i<pg_num_rows($query);$i++) {
                    print "<tr>";
                    $row=pg_fetch_row($query, $i);
                    for($j=0; $j<3; $j++) {
                        print "<td>".$row[$j]."</td>";
                    }
                    print "</tr>";
                }
            ?>
        </table>
    </body>
<html>
