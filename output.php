<html>
    <head>
        <meta charset="utf-8">
        <title>Output</title>
    </head>
    <body>
    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'admin', 'password');
        $stmt = $pdo->prepare('SELECT * FROM login_database where username="'.$_REQUEST['name'].'"');
        if ($stmt->execute()) {
            if ($_REQUEST['password'] == $row['password']) {
                $status = 1;
                echo 'ログインが完了しました';
            } else {
                $status = 0;
                echo 'ユーザー名またはパスワードが違います<br>';
                echo 'パスワードは', $row['password'], 'です';
            }
        } else {
            $status = 0;
            echo 'SQLに接続できません<br>';
            echo print_r($stmt->errorInfo());
        }
        ?>
    </body>
</html>