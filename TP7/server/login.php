<?php
//recupérer les informations du client
session_start();
if(
    isset($_REQUEST["password"])&&
    isset($_REQUEST["email"]))
{
    $remember= null;
    if (isset($_REQUEST["remember"]))
    {
        $remember="on";
    }
    $password=$_REQUEST["password"];
    $email=$_REQUEST["email"];
    if(
        empty(trim($password))||
        empty(trim($email)))
    {
        header("location:../index.php?error=1&tap=login&email=$email");

    }else{
        $users=null;
        if( isset($_COOKIE["users"]) && $_COOKIE["users"]!=null)
        {
            $users=json_decode($_COOKIE["users"]);
        }

        if($users == null)
        {
            header("location:../index.php?error=3&tap=login&email=$email");
        }
        else{

           foreach ($users as $user)
           {
              if ($user!=null && $user->email === $email &&
                  $user->password === $password ) {
                  $_SESSION["user"] = $user;
              }
           }

           if ($_SESSION["user"]==null){
               header("location:../index.php?error=3&tap=login&email=$email");
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
               header("location:../translate.php");
           }
        }
    }
}else{
    //print_r($_REQUEST["remember"]);
    //print_r($_REQUEST["password"]);
    //print_r($_REQUEST["email"]);
    header("location:../index.php?error=2&tap=login&email=");
}
?>