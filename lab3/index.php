<?php

$html = file_get_contents('index.html');

function findLinks($html){
    $pattern = "/<a href=\"(.*)\">(.*)<\/a>/";
    $arr = array();

    preg_match_all($pattern, $html, $result);
    for($i=0;$i<count($result[0]);$i++){
        $arr[$i] = $result[0][$i];
    }

    return $arr;
}

$res = findLinks($html);

echo '<h2> Найденные ссылки </h2>';
echo '<ul>';
for($i=0;$i<count($res);$i++){
    echo '<li>' . $res[$i] . '</li>';
}
echo '</ul>';
