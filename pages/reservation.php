<?php

if (!isset($_SESSION['username'])) {
    header('Refresh: 0; URL = index.php?menu=home');
}

require_once "./config/db_connect.php";

$sql_check = "SELECT * FROM reservations
                WHERE user_id = " . $_SESSION['userid'];
$res = mysqli_query($conn, $sql_check);
$anz = mysqli_num_rows($res);

$sql_select = "SELECT lastname, room_nr, type, size, from_date, until_date
        FROM users 
            LEFT JOIN reservations ON reservations.user_ID = users.user_id
            LEFT JOIN rooms ON rooms.room_id = reservations.room_ID
        WHERE users.user_id = " . $_SESSION['userid'];

function output($conn, $sql_select, $anz)
{
    if ($anz) {
        $res = mysqli_query($conn, $sql_select);
        $anz = mysqli_num_rows($res);
        if (!$anz)  echo "Captain, wir haben ein Problem!";
        else {
            echo "<table class='table text-center'>";
            echo "<thead> <tr> <th class='entry'>#</th> <th class='entry'>Lastname</th> <th  class='entry'>Room-Number</th> <th  class='entry'>Type</th> <th class='entry'>Size</th> <th class='entry'>Reserved from</th> <th class='entry'>Reserved unitl</th> </tr> </thead>";
            $i = 1;
            echo '<tbody class="table-group-divider">';
            while ($dsatz = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $i .                      "</td>";
                echo "<td>" . $dsatz["lastname"] .      "</td>";
                echo "<td>" . $dsatz["room_nr"] .         "</td>";
                echo '<td class="text-capitalize">' . $dsatz["type"] .      '</td>';
                echo "<td>" . $dsatz["size"] .      "</td>";
                echo "<td>" . $dsatz["from_date"] .      "</td>";
                echo "<td>" . $dsatz["until_date"] .      "</td>";
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
            <h1 class="display-1">Reservations</h1>
            <p class="lead text-muted">Here you can see a list of all your reservations!</p>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <?php
        output($conn, $sql_select, $anz);
        $conn->close(); //achtung ############################# CLOSE
        ?>
    </div>
</div>