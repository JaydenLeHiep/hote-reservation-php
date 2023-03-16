<?php

if(!isset($_SESSION['username']))
{
    header('Refresh: 0; URL = index.php?menu=home');
}

include './config/db_connect.php';

$type = @$_GET["type"];

$sql_select = "SELECT room_nr, size, price FROM rooms
                WHERE type = '$type'
                AND rooms.room_id NOT IN (SELECT room_ID from reservations)";



function output_rooms($conn, $sql)
{
    $res = mysqli_query($conn, $sql);
    $anz = mysqli_num_rows($res);

    if (!$anz)  echo "Captain, wir haben ein Problem!";
    else {
        echo "<table class='table  text-center'>";
        echo "<thead> <tr> <th class='entry'>NR</th> <th class='entry'>Room-Number</th> <th class='entry'>Size</th> <th class='entry'>Price</th> <th class='entry'>Status</th> </tr> </thead>";
        $i = 1;

        echo '<tbody class="table-group-divider">';
        while ($dsatz = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $i .                      "</td>";
            echo "<td>" . $dsatz["room_nr"] .            "</td>";
            echo "<td>" . $dsatz["size"] .          "<span class='text-muted fw-light'> Pers.</span></td></td>";
            echo "<td>" . $dsatz["price"] .            "<span class='text-muted fw-light'>€/night</span></td>";
            echo '<td><span class="badge bg-primary">new</span></td>';
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
            <h1 class="display-1">Booking</h1>
            <p class="lead text-muted">Here you can book your stay</p>
        </div>
    </div>
</section>

<div class="container">

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Standard</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$50<small class="text-muted fw-light">/night</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Up to 2 beds</li>
                        <li>Breakfast included</li>
                        <li>Internet</li>
                        <li>Help center access</li>
                    </ul>
                    <?php
                    if (@$_GET["type"] == "norm") {
                        echo '<button type="button" class="w-100 btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#bookingModal">Book room</button>';
                    } else {
                        echo '<a class="w-100 btn btn-lg btn-outline-primary" href="index.php?menu=booking&type=norm">Show rooms</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">King</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$150<small class="text-muted fw-light">/night</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Up to 4 beds</li>
                        <li>Breakfast and Dinner included</li>
                        <li>Internet and Wifi</li>
                        <li>Priority support</li>
                    </ul>
                    <?php
                    if (@$_GET["type"] == "king") {
                        echo '<button type="button" class="w-100 btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#bookingModal">Book room</button>';
                    } else {
                        echo '<a class="w-100 btn btn-lg btn-outline-primary" href="index.php?menu=booking&type=king">Show rooms</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-danger">
                <div class="card-header py-3 text-bg-danger border-danger">
                    <h4 class="my-0 fw-normal">Empress</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$800<small class="text-muted fw-light">/night</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Up to 6 beds</li>
                        <li>Breakfast and Dinner included</li>
                        <li>Internet and Wifi</li>
                        <li>Personal Buttler</li>
                    </ul>
                    <a href="index.php?menu=impressum" class="w-100 btn btn-lg btn-outline-primary">Contact us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 p-5">
        <?php //AUSGABE 
        if (isset($_GET["type"])) {
            output_rooms($conn, $sql_select);
        }
        ?>

    </div>

    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Room for <span class="fst-italic"><?php echo @$_SESSION['username']; ?></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <!-- Type -->
                                <p class="display-6 fw-bold text-capitalize"><?php echo $_GET["type"]; ?></p>

                                <!-- FORM -->
                                <form action="./addition/booking.inc.php" method="post">
                                    <div class="mb-3">
                                        <!-- Roomnumber -->
                                        <label class="small mb-1" for="book_rnr">Room number:</label>
                                        <input class="form-control" id="book_rnr" name="book_rnr" type="text" placeholder=<?php
                                                                                                            if (@$_GET["type"] == "norm") {
                                                                                                                echo "101-105";
                                                                                                            } else if (@$_GET["type"] == "king") {
                                                                                                                echo "201-205";
                                                                                                            }
                                                                                                            ?> value="">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- From-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="book_from">From:</label>
                                            <input class="form-control" id="book_from" name="book_from" type="date" placeholder="Enter day of arrival" value="">
                                        </div>
                                        <!-- Until-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="book_until">Until:</label>
                                            <input class="form-control" id="book_until" name="book_until" type="date" placeholder="Enter day of departure" value="">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <!-- Notes -->
                                        <label class="small mb-1" for="book_notes">Additional:</label>
                                        <input class="form-control" id="book_notes" name="book_notes" type="text" placeholder="Anything else we might help you with?" value="">
                                    </div>
                                    <div class="mb-3 px-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="book_pets" name="book_pets" value="pets">
                                            <label class="form-check-label" for="book_pets">Pets</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="book_parking" name="book_parking" value="parking">
                                            <label class="form-check-label" for="book_parking">Parking</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="book_floor" name="book_floor" value="floor" disabled>
                                            <label class="form-check-label" for="book_floor">Entire floor</label>
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submit" class="btn btn-success">Book room</button>
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