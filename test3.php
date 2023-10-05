<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>フォーム例8</title>
    </head>
    <body>
        クラスのID番号を入力して下さい
        <form name="example1" method="post" action="<?php
            print $_SERVER['PHP_SELF']
        ?>">
            <input type="text" name="classid" maxlength="40">
            <input type="submit" name="send" value="送信">
        </form>
        <?php
            if(isset($_POST['send'])) 
            {
                $dbconn=pg_connect("dbname=u20206076 user=u20206076");
                if(!$dbconn)
                {
                    exit("DB Connection Failed!");
                }
            }
            $query=pg_query($dbconn,"SELECT * FROM class WHERE id={$_POST['classid']}");
        ?>
        <table border="1">
            <?php
                for($i=0; $i<pg_num_rows($query); $i++)
                {
                    print "<tr>";
                    $row=pg_fetch_row($query, $i);
                    for($j=0; $j<3; $j++) 
                    {
                        print "<td>".$row[$j]."</td>";
                    }
                    print "</tr>";
                }
            ?>
        </table>
    </body>
</html>



