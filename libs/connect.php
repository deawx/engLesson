<?php 
    require_once('class/dbConnect.php');

    $dbhost = '127.0.0.1';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "eng-lesson2";

    $dbClass = new DBConnect($dbhost,$dbuser,$dbpass,$dbname);
    $db      = $dbClass->connect;