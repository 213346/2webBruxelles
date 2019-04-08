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
    if(isset($_SESSION["user"])&& $_SESSION["user"]==null){
        header("location:index.php");
    }
    include_once("include/nav.php");
    ?>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>

        <h1 class="text-center mt-4"> Welcome <?php
            echo $_SESSION["user"]->username; ?> </h1>
    </div>
</head>
<body>
<?php
include_once ("include/footer.php");
?>
</body>
</html>