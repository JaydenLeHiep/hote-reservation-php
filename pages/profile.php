<?php

require_once "./config/db_connect.php";

// Check if valid user is logged in.
if (!$_SESSION['username']) {
    header('Refresh: 0; URL = index.php?menu=home');
}

$sql = "SELECT user_id, username, title, lastname, email, status FROM users
        WHERE user_id =" . $_SESSION['userid'];

function output($conn, $sql)
{
    $res = mysqli_query($conn, $sql);
    $anz = mysqli_num_rows($res);
    if (!$anz)  echo "Captain, wir haben ein Problem!";
    else {
        echo "<table class='table text-center '>";
        echo "<thead> <tr> <th class='entry'>Username</th> <th class='entry'>Title</th> <th  class='entry'>Lastname</th> <th  class='entry'>Email</th> </tr> </thead>";
        $i = 1;
        echo '<tbody class="table-group-divider">';
        while ($dsatz = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $dsatz["username"] .          "</td>";
            echo "<td>" . $dsatz["title"] .            "</td>";
            echo "<td>" . $dsatz["lastname"] .    "</td>";
            echo "<td>" . $dsatz["email"] .           "</td>";
            echo "</tr>";
            $i += 1;
        }
        echo "</tbody>";
        echo "</table>";
    }
}

?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="display-1">Personal Profile</h1>
            <p class="lead text-muted">Here you can have a look at your profile and edit it!</p>
        </div>
    </div>
</section>

<div class="container">
    <div class="row mt-5 px-5">
        <?php
        output($conn, $sql);
        $conn->close(); //achtung ############################# CLOSE
        ?>
    </div>
    <!-- EDIT BUTTON -->
    <div class="d-flex flex-row-reverse me-5">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#profileModal">Edit Profile</button>
    </div>
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit your profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col">

                                <!-- FORM -->
                                <form name="edit_profile" action="./addition/profile.inc.php" method="post">
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (username)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="edit_username">Username:</label>
                                            <input class="form-control" id="edit_username" name="edit_username" type="text" placeholder="username of wanted profile" value="<?php echo $_SESSION['username'];?>" disabled>
                                        </div>
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="title"><span class="badge bg-primary">new</span> Title</label>
                                            <select class="form-select" name="new_title" id="new_status">
                                                <option value="Herr">Herr</option>
                                                <option value="Frau">Frau</option>
                                                <option value="Div.">Div.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <!-- Form Group (email)-->
                                            <label class="small mb-1" for="new_email"><span class="badge bg-primary">new</span> Email address</label>
                                            <input class="form-control" id="new_email" name="new_email" type="email" placeholder="new email address" value="">
                                        </div>
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="new_firstname"><span class="badge bg-primary">new</span> Firstname</label>
                                            <input class="form-control" id="new_firstname" name="new_firstname" type="text" placeholder="new firstname" value="">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (oldpassw)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="old_password">Old password</label>
                                            <input class="form-control" id="old_password" name="old_password" type="password" placeholder="old password" value="">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="new_lastname"><span class="badge bg-primary">new</span> Lastname</label>
                                            <input class="form-control" id="new_lastname" name="new_lastname" type="text" placeholder="new lastname" value="">
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (passw)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="new_password"><span class="badge bg-primary">new</span> Password</label>
                                            <input class="form-control" id="new_password" name="new_password" type="password" placeholder="new password" value="">
                                        </div>
                                        <!-- Form Group (rpassw)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="repeat_new_password">Repeat new Password</label>
                                            <input class="form-control" id="repeat_new_password" name="repeat_new_password" type="password" placeholder="repeat new password" value="">
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>