<!--
    https://db.cse.ce.nihon-u.ac.jp/~u20206076/report/menu/drink.php
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
        <div class="col-xs-2 col-sm-10 col-md-10" style="width: 50%;">
            <a href="/~u20206076/report/home.php" class="btn btn-primary">top</a>
            <a href="/~u20206076/report/menu/hamburger.php" class="btn btn-primary">ハンバーガー</a>
            <a href="/~u20206076/report/menu/sideMenu.php" class="btn btn-primary">サイドメニュー</a>
            <a href="/~u20206076/report/menu/drink.php" class="btn btn-primary">ドリンク</a>
            <a href="/~u20206076/report/cart/cartcheck.php" class="btn btn-primary">カート</a>
        </div>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                print "<img src='https://4.bp.blogspot.com/-mi0LvSsdayM/UgsxaDucclI/AAAAAAAAXWs/g_JJDxcE1dw/s600/drink_fastfood.png'/>";
                $dbconn=pg_connect("dbname=u20206076 user=u20206076");
                if(!$dbconn)
                {
                    exit("DB Connection Failed!");
                }

                $query=pg_query($dbconn,"
                    SELECT *
                        FROM drink
                            WHERE id={$id}
                ");

                for($i=0; $i<pg_num_rows($query); $i++)
                {
                    $row=pg_fetch_row($query, $i);
                    for($j=0; $j<count($row); $j++) {
                        if ($j==1){
                            print "<h3>{$row[$j]}</h3>";
                        }
                        if ($j==3){
                            print $row[$j];
                        }
                        if ($j==4){
                            if ($row[$j] === "t"){
                                print "<h2 style='color: red;'>期間限定</h2>";
                            }
                        }
                        if ($j==5){
                            $notequery=pg_query($dbconn,"
                                SELECT *
                                    FROM note
                            ");
                            for($k=0; $k<pg_num_rows($notequery); $k++){
                                $noterow=pg_fetch_row($notequery, $k);
                                $rowarray=toPhpArray($row[$j]);

                                for($l=0; $l<count($rowarray); $l++){
                                    if($rowarray[$l] == $k){
                                        print "<h6>{$noterow[1]}</h6>";
                                    }
                                }
                            }
                        }
                        if ($j==6){
                            print '<form action="/~u20206076/report/cart/cartin.php" method="post">';
                            if ($row[$j] === "t"){
                                $pricequery=pg_query($dbconn,"
                                    SELECT *
                                        FROM sizePrice
                                            WHERE id={$id}
                                ");
                                for($k=0; $k<pg_num_rows($pricequery); $k++){
                                    $pricerow=pg_fetch_row($pricequery, $k);
                                    for($l=0; $l<count($pricerow); $l++){
                                        if($pricerow[$l] != NULL){
                                            print "<h3>";
                                            if($l == 1){
                                                print "<input type='checkbox' name='S_size' value='{$pricerow[$l]}'/>";
                                                print "Sサイズ:{$pricerow[$l]}円";
                                            }
                                            if($l == 2){
                                                print "<input type='checkbox' name='M_size' value='{$pricerow[$l]}'/>";
                                                print "Mサイズ:{$pricerow[$l]}円";
                                            }
                                            if($l == 3){
                                                print "<input type='checkbox' name='L_size' value='{$pricerow[$l]}'/>";
                                                print "Lサイズ:{$pricerow[$l]}円";
                                            }
                                            print "</h3>";
                                        }
                                    }
                                }
                            }else{
                                print "<h3>";
                                print "<input type='checkbox' name='size' value='{$row[2]}'/>";
                                print "{$row[2]}円~";
                                print "</h3>";
                            }
                            print "<input type='hidden' name='menuname' value='$row[1]'/>";
                            print "<input type='submit' name='action' value='カートに入れる'/>";
                            print "</form>";
                        }
                    }
                }
                pg_close($dbconn);
            }else{
                print '<ul style="display: flex;">';

                for($i=0; $i<pg_num_rows($query); $i++)
                {
                    $row=pg_fetch_row($query, $i);
                    print "<a href='https://db.cse.ce.nihon-u.ac.jp/~u20206076/report/menu/drink.php?id={$row[0]}'>";
                    print "<img src='https://4.bp.blogspot.com/-mi0LvSsdayM/UgsxaDucclI/AAAAAAAAXWs/g_JJDxcE1dw/s500/drink_fastfood.png'/><br/>";
                    for($j=0; $j<count($row); $j++)
                    {
                        if ($j==1)
                        {
                            print "".$row[$j]."";
                        }
                        if ($j==2)
                        {
                            print " ".$row[$j]."円";
                        }
                    }
                    print "</a>";
                    if(($i+1)%3 == 0){
                        print "</ul>";
                        print "<ul style='display: flex;'>";
                    }
                }
                print "</ul>";
            }
        ?>
    </body>
<html>

<?php
// postgresの配列をphpの配列に変換
function toPhpArray($data)
{
    $data       = str_replace('{', '', $data);
    $data       = str_replace('}', '', $data);
    $array_data = explode(',', $data);

    return $array_data;
}
?>