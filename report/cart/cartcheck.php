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
            session_start();
            // セッション変数 'price' の初期化
            if (!isset($_SESSION['price'])) {
                $_SESSION['price'] = array();
            }
            if(isset($_POST['remove'])){
                array_splice($_SESSION['price'],$_POST['remove'],1);
                array_splice($_SESSION['menuname'],$_POST['remove'],1);
                header('Location: /~u20206076/report/cart/cartcheck.php');
            }else if($_POST['action'] === "全削除"){
                $_SESSION['price'] = array();
                $_SESSION['menuname'] = array();
                header('Location: /~u20206076/report/cart/cartcheck.php');
            }else{
                for ($i=0; $i<count($_SESSION['price']); $i++) {
                    print $_SESSION['menuname'][$i];
                    print $_SESSION['price'][$i]."円<br/>";
                    print "<form action='/~u20206076/report/cart/cartcheck.php' method='post'>";
                    print "<input type='hidden' name='remove' value='{$i}'/>";
                    print "<input type='submit' name='action' value='削除'/>";

                    print "</form>";
                }
                print "<form action='/~u20206076/report/cart/cartcheck.php' method='post'>";
                print "<input type='submit' name='action' value='全削除'/>";
                print "</form>";

                print '<a href="/~u20206076/report/cart/sell.php" class="btn btn-primary">注文画面へ</a>';
            }
        ?>
    </body>
</html>