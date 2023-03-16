<?php

if (!isset($_SESSION['username'])) {
    header('Refresh: 0; URL = index.php?menu=home');
}

require_once "./config/db_connect.php";

$sql_check = "SELECT * FROM reservations
                WHERE user_id = " . $_SESSION['userid'];
$res = mysqli_query($conn, $sql_check);
$anz = mysqli_num_rows($res);

$sql_select = "SELECT res_id, lastname, room_nr, size, from_date, until_date, pets, parking, reservations.status
        FROM users 
            INNER JOIN reservations ON reservations.user_ID = users.user_id
            INNER JOIN rooms ON rooms.room_id = reservations.room_ID";

function output($conn, $sql_select, $anz)
{
    if ($anz) {
        $res = mysqli_query($conn, $sql_select);
        $anz = mysqli_num_rows($res);
        if (!$anz)  echo "Captain, wir haben ein Problem!";
        else {
            echo "<table class='table text-center'>";
            echo "<thead> <tr> <th class='entry'>#</th> <th class='entry'>ID</th> <th class='entry'>Lastname</th> <th  class='entry'>Room-Number</th> <th class='entry'>Size</th> <th class='entry'>Reserved from</th> <th class='entry'>Reserved unitl</th>  <th  class='entry'>Pets</th> <th  class='entry'>Parking</th> <th  class='entry'>Status</th> </tr> </thead>";
            $i = 1;
            echo '<tbody class="table-group-divider">';
            while ($dsatz = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $i .                      "</td>";
                echo "<td>" . $dsatz["res_id"] .      "</td>";
                echo "<td>" . $dsatz["lastname"] .      "</td>";
                echo "<td>" . $dsatz["room_nr"] .         "</td>";
                echo "<td>" . $dsatz["size"] .      "</td>";
                echo "<td>" . $dsatz["from_date"] .      "</td>";
                echo "<td>" . $dsatz["until_date"] .      "</td>";
                echo "<td>" . $dsatz["pets"] .      "</td>";
                echo "<td>" . $dsatz["parking"] .      "</td>";
                echo '<td><span class="badge bg-primary">' . $dsatz["status"] . '</span></td>';
                echo "</tr>";
                $i += 1;
            }
            echo "</tbody>";
            echo "</table>";
        }
    } else { ?>
        <div class="container">
            <p class="display-6 text-danger text-center">No reservations yet</p>
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary" href="index.php?menu=booking">Make reservation</a>
            </div>
        </div>
<?php
        exit;
    }
}

?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="display-1">All Reservations</h1>
            <p class="lead text-muted">Oh mighty admin, here you can see a list of all current reservations!</p>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <?php
        output($conn, $sql_select, $anz);
        $conn->close();
        ?>
    </div>
    <!-- EDIT BUTTON -->
    <div class="d-flex flex-row-reverse me-5">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#adminResModal">Edit Reservation</button>
    </div>
</div>

<div class="row">
    <!-- Modal -->
    <div class="modal fade" id="adminResModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <!-- FORM -->
                            <form action="./addition/allres.inc.php" method="post">
                                <div class="mb-3">
                                    <!-- Reservation id -->
                                    <label class="small mb-1" for="res_id">Reservation ID:</label>
                                    <input class="form-control" id="res_id" name="res_id" type="text" placeholder="reservation id" value="">
                                </div>
                                <!-- Form Group (title)-->
                                <div class="mb-3">
                                            <label class="small mb-1" for="new_status">Change Status:</label>
                                            <select class="form-select" name="new_status" id="new_status">
                                                <option value="new">New</option>
                                                <option value="accepted">Accepted</option>
                                                <option value="canceled">Canceled</option>
                                            </select>
                                        </div>
                                <!-- Save changes button-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="submit" class="btn btn-success">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>