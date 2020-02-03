<?php
$page =  (!empty($_GET['page']) ? $_GET['page'] : 0 );
$page = ($page <= 0 ? 1 :$page);
?>
<!doctype html>
<html lang="fr" class="no-js">
<head>
    <meta charset="utf-8">
    <title>LC Prépa 974</title> 
    <link rel="shortcut icon" href="./img/favicon.png">
    <meta name="description" content="Annuaire des employés">
    <link rel="stylesheet" href="./style/annuaire.css">
</head>

