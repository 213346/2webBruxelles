<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <?php
        include_once ("include/header.php");
        if(isset($_SESSION["user"]) && $_SESSION["user"]==null){
            header("location:index.php");
        }
    ?>
</head>
<body>
<?php
    include_once ("include/nav.php");
    ?>
    <div class="container mt-5">
        <div class="jumbotron">
            <p class="lead">Username : <?php echo $_SESSION['user']->username ; ?></p>
            <p class="lead">Email : <?php echo $_SESSION['user']->email ; ?></p>
            <hr class="my-4">
        </div>
    </div>


<?php
include_once ("include/footer.php");
?>
</body>
</html>