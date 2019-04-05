<div class="row d-flex justify-content-center">
    <form method="post" class="col-12 col-sm-6 p-5" action="../server/register.php">
        <?php if(isset($_GET["error"])
            && isset($_GET["tab"])
            && $_GET["tab"]=="register"
        ){ ?>
             <div class="alert alert-danger">
                 Error !
             </div>
        <?php } ?>
        <div class="form-group">
            <label for="username">username</label>
            <input autocomplete="off" class="form-control"
                   type="text" id="username" name="username"
                   placeholder="toto"/>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input autocomplete="off" class="form-control"
                   type="email" id="email" name="email"
                   placeholder="exemple@supinfo.com"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input autocomplete="off" class="form-control"
                   type="password" id="password" name="password"
                   placeholder="com554dhs-cbv"/>
        </div>
        <div class="form-group">
            <input class="btn btn-primary"
                   type="submit" id="btnRegister" name="btnRegister"
                   value="Register"/>
        </div>
    </form>
</div>