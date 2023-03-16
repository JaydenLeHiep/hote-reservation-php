<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="display-1">Gallery</h1>
            <p class="lead text-muted">Our rooms are the best! See for yourself and book right away:</p>
            <p>
                <a href="index.php?menu=booking" class="btn btn-outline-danger my-2">Last-Minute</a>
                <a href="index.php?menu=booking" class="btn btn-outline-secondary my-2">Plan longer stay</a>
            </p>
        </div>
    </div>
</section>

<div class="container">
    <main>
        <div class="container my-5">
            <div class="row">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "hotel");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM blog_posts ORDER BY date DESC";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $img_link = $row['image'];
                ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="./uploads/<?php echo $img_link; ?>" class="card-img-top" alt="..."    width="200px" height="200px">
                                
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['title'];    ?></h5>
                                    <p class="card-text"><?php echo $row['content'];   ?></p>
                                    <div class="d-flex justify-content-between  align-items-center">
                                        <div class="btn-group">
                                        </div>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['date']; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo "Nix";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>







</div>