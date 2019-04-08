<?php
// Recupère le message du client et le traduit.
include_once ('../Models/Translate.php');

$value = $_POST['message'];

// Traduction du message
$value = strtolower($value);
$tableau = str_split($value);
$translateArray = Translate::getCorrepondance();
$result = '';
foreach ($tableau as $str){
    $hasCorrespondance = false;
    foreach ($translateArray as $translate){
        if ($translate->getKey() === $str){
            $result .= $translate->getValue();
            $hasCorrespondance = true;
        }
    }
    if (!$hasCorrespondance){
        $result .= $str;
    }
}

// Retourne le résultat au client
$return = ["value" =>  $result, "key"=> $value] ;
echo json_encode($return);