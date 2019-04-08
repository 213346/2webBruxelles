<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Translation
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button id="buttonSubmit" class="btn btn-primary" type="submit">OK</button>
                            <button id="buttonReset" class="btn btn-outline-danger" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Message translated
                    </div>
                    <div class="card-body">
                        <p id="messageTranslated" class="card-text"></p>
                        <button id="buttonSave" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
include_once ("include/footer.php");
?>
<script src="client/translate.js"></script>
</body>
</html>