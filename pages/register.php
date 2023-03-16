<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <!--FORM, wird als HTTP Request POST an login.php am Webserver geschickt-->
            <form action="./addition/register.inc.php" method="post">   <!-- starting from index.php -->
                <label for="username" class="form-label">Username:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i> </span>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
                </div>
                <label for="password" class="form-label">Password:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-key-fill"></i> </span>
                    <input type="password" minlength="8" class="form-control" name="password1" id="password1" placeholder="••••••••" required>
                </div>
                <label for="password_2" class="form-label">Repeat password:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-key"></i> </span>
                    <input type="password" minlength="8" class="form-control" name="password2" id="password2" placeholder="••••••••" required>
                </div>

                <label for="anrede" class="form-label">Title:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i> </span>
                    <select class="form-select" name="anrede" id="anrede" required>
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                        <option value="Div.">Div.</option>
                    </select>
                </div>
                <label for="vorname" class="form-label">Firstname:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i> </span>
                    <input type="text" class="form-control" name="vorname" id="vorname" placeholder="firstname" required>
                </div>
                <label for="nachname" class="form-label">Lastname:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i> </span>
                    <input type="text" class="form-control" name="nachname" id="nachname" placeholder="lastname" required>
                </div>
                <label for="email" class="form-label">Email:</label>
                <div class="mb-2 input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i> </span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="email@hotel.com" required>
                </div>
                <div class="mt-3 d-flex justify-content-center justify-content-md-end">
                    <input name="submit" type="submit" class="btn btn-primary me-1" value="Register">

                </div>

            </form>
        </div>
    </div>
</div>