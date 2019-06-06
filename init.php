<?php

session_start();

$getProcessors = [];
$posttProcessors = [];
$_CON = new PDO('mysql:host=localhost;dbname=manter', 'root', 'jhonny522');


function getConn() {
    global $_CON;
    return $_CON;
}

function pdoExec($query, $params) {
    $stmt = getConn()->prepare($query);
    $stmt->execute($params);
    return $stmt;
}

function rowCount($query, $params = []) {
    return pdoExec($query, $params)->rowCount();
}

function fetchAll($query, $params = []) {
    return pdoExec($query, $params)->fetchAll();
}

function fetchOne($query, $params = []) {
    return pdoExec($query, $params)->fetch();

}

?>