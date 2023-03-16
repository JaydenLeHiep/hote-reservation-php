<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <img src="./img/Hotelltd_white.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-2">
        <a class="navbar-brand display-4" href="./index.php?menu=home">Hotel Ltd.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <?php if (@$_SESSION['admin']) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=upload">Upload</a>
                    </li>
                <?php } ?>
                <?php if (!is_null(@$_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=gallery">Gallery</a>
                    </li>
                <?php } ?>
                <?php if (@$_SESSION['admin']) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=users">Users</a>
                    </li>
                <?php } ?>
                <?php if (!is_null(@$_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=profile">Profile</a>
                    </li>
                <?php } ?>
                <?php if (@$_SESSION['admin']) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=allres">All Reservations</a>
                    </li>
                <?php } ?>
                <?php if (!is_null(@$_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=reservation">My Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=booking">Booking</a>
                    </li>
                <?php } ?>
            </ul>
            <?php if (!is_null(@$_SESSION['username'])) { ?>
                <p class="nav navbar-text me-2">Welcome <span class="fw-bold ms-2"><?php echo @$_SESSION['username']; ?></span></p>
            <?php } ?>
            <form class="d-flex justify-content-end mb-2 mb-md-0" role="search">
                <?php if (!is_null(@$_SESSION['username'])) { ?>
                    <a href="index.php?menu=logout" role="button" class="btn btn-primary btn-sm me-2">Logout</a>
                <?php } else { ?>
                    <a href="index.php?menu=login" role="button" class="btn btn-primary btn-sm me-2">Login</a>
                    <a href="index.php?menu=register" role="button" class="btn btn-outline-light btn-sm">Register</a>
                <?php } ?>
            </form>
        </div>
    </div>
</nav>