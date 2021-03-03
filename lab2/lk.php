<?php

// DB settingsa
$host = "localhost";
$dbname = "secretinfodb";
$username = "Kira";
$password = "7915";

$dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if(isset($_POST['exit'])){
    setcookie('access', false);
    header("Refresh : 0");
    header("Location: http://www.localhost:8090/login.php");
    exit;
}

$result = $dbConnection->query("SELECT * FROM secretinfo")->fetchAll();
$secretInfo = $result[0]["Info"];

?>

<?php if(isset($_COOKIE['access']) && $_COOKIE['access'] == true) { ?>
<head>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Личный кабнет</title>
</head>
<body>
    <div class="lk">
        <h1>Личный кабинет</h1>

        <p><?php echo $secretInfo ?></p>

        <form action="" method="post">
            <button type="submit" class="btn btn-danger" name="exit">Выйти</button>
        </form>
    </div>
</body>
<?php }else{ ?>
    <h1> Доступ запрещен! </h1>
<?php } ?>
