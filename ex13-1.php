<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>ex13-1フォーム</title>
    </head>
    <body>
        <form name="example1" method="post" action="<?php
            print $_SERVER['PHP_SELF'] 
        ?>">
            <input type="text" name="sample">
            <input type="submit" name="submit" value="送信">
        </form>
        <?php
           
            if(isset($_POST['submit'])) 
            {
                $escaped=htmlspecialchars($_POST['sample'] );
                print $escaped;
            }
        ?>
    </body>
</html>
