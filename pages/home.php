<!-- Carousel Background -->
<div class="container-carousel">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item carousel-image bg-img-1 active">
            </div>
            <div class="carousel-item carousel-image bg-img-2 ">
            </div>
            <div class="carousel-item carousel-image bg-img-3 ">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <class class="container text-in-carousel" style=" position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 500px">
        <img class="icon-nav" src="./img/Hotelltd.png" alt="">


    </class>
</div>
</section>

<section class="intro">
    <div class="container">
        <p class="display-3">Welcome home <?php echo @$_SESSION['username']; ?> </p>
        <p class="display-6">We are pleased to see you!</p>
        <p>Our history is as long as the story of mankind itself.</p>
        <p>We are looking back, for a strong future.</p>
        <p>Preserving what one might refer to as the good old times.</p>
    </div>
</section>

<section class="room-pic">
    <div class="div-room-pic"></div>
</section>

<section class="service container">
    <h1 class="display-3">Our Service</h1>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-sm-12 gy-5">
                <img class="pic-service" src="./img/room.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text display-6">Room</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 gy-5">
                <img class="pic-service" src="./img/food.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text display-6">Food</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 gy-5">
                <img class="pic-service" src="./img/gym.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text display-6">Gym</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 gy-5">
                <img class="pic-service" src="./img/massage.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text display-6">Massage</p>
                </div>
            </div>

        </div>
</section>