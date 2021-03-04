<?php

$config = require 'db.php';
$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['username'], $config['password']);

//форма для добавление нового журнала
//при добавлении INSERT в бд и редирект на index.php

if(isset($_POST['add'])){
    $str = htmlspecialchars($_POST['journalName']);
    $db->query("INSERT INTO Journals (JournalName) VALUES ('$str')");
    header("Refresh : 0");
    header("Location: http://www.localhost:8090/index.php");
    exit;
}

?>

<head>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Добавить </title>
</head>
<div class="form ml-3 mt-3">
    <form action="" method="post">
        <div class="input_field">
            <h4 class="mb-3"> Введите название журнала </h4>
            <input type="text" class="form-control" style="width: 15%" name="journalName">
        </div>
        <button type="submit" class="btn btn-success mt-3" name="add"> Добавить </button>
    </form>
</div>


