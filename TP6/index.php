<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
        include_once ("include/header.php");
    if(isset($_SESSION["user"])&& $_SESSION["user"]!=null){
        header("location:translate.php");
    }
    $actiftap = isset($_GET["tap"])? $_GET["tap"] : "login";

    ?>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs"  id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?php if($actiftap==="login") echo 'active'; ?>"
                       id="Login-tab" data-toggle="tab" href="#Login"
                       role="tab" aria-controls="home"
                       aria-selected="true">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($actiftap==="register") echo 'active'; ?>"
                       id="Register-tab" data-toggle="tab" href="#Register"
                       role="tab" aria-controls="profile"
                       aria-selected="false">
                        Register
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade  <?php if($actiftap==="login") echo 'show active'; ?>"
                     id="Login" role="tabpanel" aria-labelledby="Login-tab">
                    <?php
                    include_once ("include/login.php");
                    ?>
                </div>
                <div class="tab-pane fade <?php if($actiftap==="register") echo 'show active'; ?>" id="Register"
                     role="tabpanel" aria-labelledby="Register-tab">
                    <?php
                    include_once ("include/register.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once ("include/footer.php");
?>
</body>
</html>