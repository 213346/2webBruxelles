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

        <h1 class="text-center mt-4"> SIN-IN TO TRANSLATE A TEXT </h1>
    </div>
</head>
<body>
<?php
include_once ("include/footer.php");
?>
</body>
</html>