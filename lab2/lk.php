<?php

// Настройки для подключения базы данных
$host = "localhost";
$dbname = "secretinfodb";
$username = "Kira";
$password = "7915";

$dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // Подключаемся к базе данных

if(isset($_POST['exit'])){ // При отправке запроса выхода
    setcookie('access', false); // Устанавливаем параметр доступа в ложь
    header("Refresh : 0"); 
    header("Location: http://www.localhost:8090/login.php"); // Перенаправляем на страницу с формой авторизации
    exit;
}

$result = $dbConnection->query("SELECT * FROM secretinfo")->fetchAll(); // Запрос к базе данных на получение строки
$secretInfo = $result[0]["Info"]; // Простая строка из столбца инфо

?>

<?php if(isset($_COOKIE['access']) && $_COOKIE['access'] == true) { ?> // Проверка доступа к личному кабинету
<head>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Личный кабнет</title>
</head>
<body> // Отрисовываем личный кабинет если условия выполнены
    <div class="lk">
        <h1>Личный кабинет</h1>

        <p><?php echo $secretInfo ?></p> // Выводим простую строку из базы данных, строка собой смысла тут не имеет (просто текст из дампа)

        <form action="" method="post">
            <button type="submit" class="btn btn-danger" name="exit">Выйти</button>
        </form>
    </div>
</body>
<?php }else{ ?>
    <h1> Доступ запрещен! </h1>
<?php } ?>
