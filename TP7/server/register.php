<?php
//recupérer les informations du client
session_start();
if(isset($_REQUEST["username"])&&
    isset($_REQUEST["password"])&&
    isset($_REQUEST["email"]))
{
    $username=$_REQUEST["username"];
    $password=$_REQUEST["password"];
    $email=$_REQUEST["email"];
    if(empty(trim($username))||
        empty(trim($password))||
        empty(trim($email)))
    {
        header("location:../index.php?error=1&tap=register&email=$email&username=$username");

    }else{
        $users=null;
        if(isset($_COOKIE["users"]) && $_COOKIE["users"]!=null)
        {
         $users=json_decode($_COOKIE["users"]);
        }
        $user = ["username"=>$username,
            "password"=>$password,
            "email"=>$email];
        $users[]=$user;
        setcookie("users",
            json_encode($users),
            time() + 60 * 60 * 24 * 30);


        $_SESSION["user"] = json_decode(json_encode($user));
        header("location:../home.php");


    }
}else{
    header("location:../index.php?error=2&tap=register&email=&username");
}
?>