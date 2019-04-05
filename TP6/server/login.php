<?php
//recupérer les informations du client
session_start();
if(isset($_REQUEST["remember"])&&
    isset($_REQUEST["password"])&&
    isset($_REQUEST["email"]))
{
    $remember=$_REQUEST["remember"];
    $password=$_REQUEST["password"];
    $email=$_REQUEST["email"];
    if(
        empty(trim($password))||
        empty(trim($email)))
    {
        header("location:index.php?error=1&tap=login");

    }else{
        $users=null;
        if( isset($_COOKIE["users"]) && $_COOKIE["users"]!=null)
        {
            $users=json_decode($_COOKIE["users"]);
        }

        if($users == null)
        {
            header("location:index.php?error=3&tap=login");
        }
        else{

           foreach ($users as $user)
           {
              if ($user["email"] === $email &&
                  $user["password"] === $password ) {
                  $_SESSION["user"]= $user;
              }
           }

           if ($_SESSION["user"]==null){
               header("location:index.php?error=3&tap=login");
           }
           else{
               if (!empty($remember)){
                   $user = [
                       "password"=>$password,
                       "email"=>$email];
                   setcookie("user",
                       json_encode($user),
                       time() + 60 * 60 * 24 * 30);
               }
               header("location:translate.php");
           }
        }
    }
}else{
    header("location:index.php?error=2&tap=login");
}
?>