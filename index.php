<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/index.css">
    <?php require("./include/links.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/swiper.js" defer></script>
    <title>RN Hotel - Home</title>
</head>

<body class="bg-light">
    <!-- Header -->
    <?php require("./include/header.php"); ?>

    <!-- Carousel -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiperC">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="./images/carousel/IMG_52177.png" alt="" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="./images/carousel/IMG_19210.png" alt="" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="./images/carousel/IMG_19387.png" alt="" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="./images/carousel/IMG_41144.png" alt="" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="./images/carousel/IMG_83213.png" alt="" class="w-100 d-block">
                </div>

            </div>
        </div>
    </div>

    <!-- Check Availability Form -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-In</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-Out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Our Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold new-font">Our Rooms</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="./images/rooms/1.jpg" class="card-img-top" alt="Room Picture">
                    <div class="card-body">
                        <h5>Delux Room</h5>
                        <h6 class="mb-4">$149 Per Night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">2 Rooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 Bathrooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 Balcony</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">3 Sofa</span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Unlimited Wifi</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Smart Television</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Room Heater</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">AC</span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">5 Adults</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">4 Childrens</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="rating mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>

                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="./images/rooms/1.jpg" class="card-img-top" alt="Room Picture">
                    <div class="card-body">
                        <h5>Delux Room</h5>
                        <h6 class="mb-4">$149 Per Night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">2 Rooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 Bathrooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 Balcony</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">3 Sofa</span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Unlimited Wifi</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Smart Television</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Room Heater</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">AC</span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">5 Adults</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">4 Childrens</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="rating mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>

                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="./images/rooms/1.jpg" class="card-img-top" alt="Room Picture">
                    <div class="card-body">
                        <h5>Delux Room</h5>
                        <h6 class="mb-4">$149 Per Night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">2 Rooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 Bathrooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 Balcony</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">3 Sofa</span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Unlimited Wifi</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Smart Television</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">Room Heater</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">AC</span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">5 Adults</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">4 Childrens</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="rating mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>

                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="" class="btn btn-sm btn-outline-dark rounded-2 fw-bold shadow-none">More Rooms >>></a>
            </div>
        </div>
    </div>

    <!-- Our Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold new-font">Our Facilities</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="./images/facilities/internet.svg" alt="wifi" width="80px">
                <h5 class="mt-3">Unlimited Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="./images/facilities/massage.svg" alt="wifi" width="80px">
                <h5 class="mt-3">Massage Center</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="./images/facilities/ac.svg" alt="wifi" width="80px">
                <h5 class="mt-3">AC</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="./images/facilities/heater.svg" alt="wifi" width="80px">
                <h5 class="mt-3">Room Heater</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="./images/facilities/tv.svg" alt="wifi" width="80px">
                <h5 class="mt-3">Smart Television</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="" class="btn btn-sm btn-outline-dark rounded-2 fw-bold shadow-none">More Facilities >>></a>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold new-font">Testimonials</h2>
    <div class="container mt-5">
        <div class="swiper swiperT">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="./images/facilities/massage.svg" alt="" width="30px">
                        <h6 class="m-0 ms-2">Random User 1</h6>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt qui inventore vero! Necessitatibus
                        distinctio illum culpa in consequuntur quod sed!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="./images/facilities/massage.svg" alt="" width="30px">
                        <h6 class="m-0 ms-2">Random User 2</h6>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt qui inventore vero! Necessitatibus
                        distinctio illum culpa in consequuntur quod sed!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="./images/facilities/massage.svg" alt="" width="30px">
                        <h6 class="m-0 ms-2">Random User 3</h6>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt qui inventore vero! Necessitatibus
                        distinctio illum culpa in consequuntur quod sed!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="" class="btn btn-sm btn-outline-dark rounded-2 fw-bold shadow-none">Know More >>></a>
        </div>
    </div>

    <!-- Reach Us -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold new-font">Reach Us</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe']; ?>" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call Us</h5>
                    <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> + 628123456789
                    </a>
                    <br>

                    <a href="#" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> + 628123456789
                    </a>

                    <h5 class="mt-4">Email Address</h5>
                    <a href="#" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> rizkynhg@gmail.com
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>

                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i> Twitter
                        </span>
                    </a>

                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require("./include/footer.php"); ?>
</body>

</html>