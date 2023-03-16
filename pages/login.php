<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="display-1">Login</h1>
        </div>
    </div>
</section>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <!--FORM, wird als HTTP Request POST an login.php am Webserver geschickt-->
            <form  action="./addition/login.inc.php" method="post">
                <label for="username" class="form-label">Username:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i> </span>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
                </div>
                <label for="name" class="form-label">Passwort:</label>
                <div class="mb-4 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-key-fill"></i> </span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="••••••••" required>
                </div>
                <div class="mt-3 d-flex justify-content-center justify-content-md-end">
                    <input type="submit" class="btn btn-primary me-1" value="Login">
                    
                </div>
                <p class="text-center text-danger"> <?php echo @$error; ?></p>
                <?php if(@$_GET['status'] == 'inactive') echo '<p class="text-center text-danger"> </p>' ?>
            </form>
        </div>
    </div>
</div>

<div class="div-to-make-page-longer">
    
</div>