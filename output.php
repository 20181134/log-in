<html>
    <head>
        <meta charset="utf-8">
        <title>Output</title>
    </head>
    <body>
    <?php
        unset($_SESSION['user']);
        $pdo = new PDO ('mysql:host=localhost;dbname=login;charset=utf8', 'admin', 'password');
        $sql=$pdo->prepare('select * from login_database where username=? and password=?');
        if ($sql->execute([$_REQUEST['name'], $_REQUEST['password']])) {
            foreach ($sql as $row) {
                $_SESSION['user']=[
                    'username'=>$row['username'],
                    'password'=>$row['password']
                ];
            }
        }
        if (isset($_SESSION['user'])) {
            echo 'ようこそ、', $_SESSION['user']['username'], 'さん';
        } else {
            echo 'ユーザー名またはパスワードが違います';
        }
    ?>
    </body>
</html>