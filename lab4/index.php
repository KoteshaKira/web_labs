<?php

$config = require 'db.php';

$db= new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['username'], $config['password']);

$result = $db->query("SELECT * FROM Journals")->fetchAll();
?>
<head>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Journals </title>
</head>
<div class="ml-3 mt-3">
    <form action="add.php" method="post">
        <button type="submit" class="btn btn-success"> Добавить </button>
    </form>

<?php
$i = 1;
echo '<h2> Все журналы </h2>';
echo '<div class="list"><ul class="list-group list-group-flush w-25">';
foreach ($result as $journal){
    echo '<li class="list-group-item">'. $i++ . '. ' . $journal["JournalName"] .'</li>';
}
echo '</ul></div></div>';