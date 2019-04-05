<?php
    $user = null;
    if ( isset($_COOKIE["user"]) && $_COOKIE["user"] !=null){
        $user = json_decode( $_COOKIE["user"]);
    }
?>

<div class="row d-flex justify-content-center">
    <form class="col-12 col-sm-6 p-5" method="post" action="../server/login.php">
        <?php if(isset($_GET["error"])
            && isset($_GET["tap"])
            && $_GET["tap"]=="login"
        ){
            $user=["email"=>$_GET["email"]];
            ?>
            <div class="alert alert-danger">
                Bad credential !
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input autocomplete="off" class="form-control"
                   value="<?php if($user!=null) echo $user["email"]; ?>"
                   type="email" id="email" name="email"
                   placeholder="exemple@supinfo.com"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input autocomplete="off" class="form-control"
                   value="<?php if($user!=null) echo $user["email"]; ?>"
                   type="password" id="password" name="password"
                   placeholder="com554dhs-cbv"/>
        </div>
        <div class="form-group">
            <input autocomplete="off"
                   type="checkbox" id="remember" name="remember"/>
            <label for="remember">Remember me</label>

        </div>
        <div class="form-group">
            <input class="btn btn-primary"
                   type="submit" id="btnLogin" name="btnLogin"
                   value="Login"/>
        </div>
    </form>
</div>