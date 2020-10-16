<!DOCTYPE html>
<html>
<head>
    <title>Login Successfully!</title>
    <meta name="content-type";
          charset="UTF-8">
</head>
<body>
<div>
    <?php
    session_start();
    $username = isset($_SESSION['user']) ? $_SESSION['user'] : "";
    if (!empty($username)) { ?>
        <h1>Login Successfully！</h1>
        Welcome you!
        <?php
        echo $username;
        ?>
        <br/> <a href="index.php">Quit</a>
        <?php
        header("refresh:3;url=airplane.php");
        print('Loading home page in 3s...<br>');
        ?>
        <?php
    } else {
        ?>
        <h1>Have no permission to visit.</h1>
        <?php
    }
    ?>
</div>
</body>
</html>