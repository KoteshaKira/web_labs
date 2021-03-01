<?php

$accounts = [

    0 => [
        'login' => 'admin',
        'password' => 'admin'
    ],

    1 => [
        'login' => 'user',
        'password' => '1234'
    ],

];

?>

<head>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="info">
        <h2>Авторизация</h2>
    </div>
    <div class="form">
        <form action="" method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" aria-describedby="loginHelp" name="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Войти</button>
        </form>
    </div>
</body>

<?php

if(isset($_POST['submit'])){
    if(isset($_POST['login']) && $_POST['password']){
        for($i=0;$i<count($accounts);$i++){
            if($_POST['login'] == $accounts[$i]['login']){
                if($_POST['password'] == $accounts[$i]['password']){
                    setcookie('access', true);
                    header("Location: http://www.localhost:8090/lk.php");
                    die();
                }else{
                    echo 'Неверный пароль!';
                    break;
                }
            }else{
                echo 'Не найден пользователь с таким логином!';
                break;
            }
        }
    }
}



