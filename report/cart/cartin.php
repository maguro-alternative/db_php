<?php
session_start();

// セッション変数 'price' の初期化
if (!isset($_SESSION['price'])) {
    $_SESSION['price'] = array();
}
// セッション変数 'price' の初期化
if (!isset($_SESSION['menuname'])) {
    $_SESSION['menuname'] = array();
}

$arrayprice = $_SESSION['price'];
$arraymenuname = $_SESSION['menuname'];

//print_r($_SESSION['menuname']);
//print_r($_SESSION['price']);  // デバッグのために配列全体を表示

if(isset($_POST['size'])){
    array_push($arrayprice, $_POST['size']);
} else if(isset($_POST['S_size'])){
    array_push($arrayprice, $_POST['S_size']);
} else if(isset($_POST['M_size'])){
    array_push($arrayprice, $_POST['M_size']);
} else if(isset($_POST['L_size'])){
    array_push($arrayprice, $_POST['L_size']);
}

array_push($arraymenuname,$_POST['menuname']);

$_SESSION['price'] = $arrayprice;
$_SESSION['menuname'] = $arraymenuname;


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
            print $_POST['menuname']."がカートに入りました";
        ?>
    </body>
<html>