<?php
$user = "root";
$password = "root";
$hostname = "localhost";
$dbname = "supcooking";
$dbh = null;
try{
    $dbh = new PDO('mysql:host='.$hostname.';dbname='.$dbname,$user,  $password);
}
catch(Exception $e){
    print_r($e);
}
