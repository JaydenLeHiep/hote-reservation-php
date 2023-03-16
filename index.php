<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="./img/Hotelltd_white.png" />
    <title>Hotel Home</title>





    <!-- Carousel -->
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/"> -->
    <link rel="stylesheet" href="./style/stylesheet.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <!-- Gallery -->
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@600&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/d1455b12d2.js" crossorigin="anonymous"></script>
</head>

<body class="myfont">


    <?php include 'addition/navbar.php'; ?>

    <main>

        <?php
        $menu = @$_GET["menu"];
        switch ($menu) {
            case 'welcome':
                include './pages/welcome.php';
                break;
            case 'login':
                include './pages/login.php';
                break;
            case 'home':
                include './pages/home.php';
                break;
            case 'register':
                include './pages/register.php';
                break;
            case 'logout':
                include './pages/logout.php';
                break;
            case 'gallery':
                include './pages/gallery.php';
                break;
            case 'upload':
                include './pages/upload.php';
                break;
            default:
                include './pages/welcome.php';
                break;
            case 'impressum':
                include './pages/impressum.php';
                break;
            case 'hilfe':
                include './pages/hilfe.php';
                break;
            case 'users':
                include './pages/users.php';
                break;
            case 'reservation':
                include './pages/reservation.php';
                break;
            case 'booking':
                include './pages/booking.php';
                break;
            case 'profile':
                include './pages/profile.php';
                break;
            case 'allres':
                include './pages/allreservations.php';
                break;
        }
        ?>


        <!-- FOOTER -->
        <?php
        switch ($menu) {
                // kurz
            case 'welcome':
            case 'login':
            case 'register':
            case 'logout':
            case 'impressum':
            case 'hilfe':
            case 'users':
            case 'upload':
            case 'reservation':
            case 'profile':
            case 'allres':
            case 'gallery':
                //sticky
                include './addition/footer3.php';
                break;

                // lang
            case 'home':
            case 'booking':
            case 'reservation':
                //normal
                include './addition/footer4.php';
                break;
        }
        ?>
    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>


</body>

</html>