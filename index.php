<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/home.css" />
    <title>Hotel</title>
</head>

<body>
    <header class="header">
        <nav>
            <div class="nav__bar">
                <div class="logo">
                    <a href="./index.php">ROyal PArk</a>
                </div>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
            <a href="./login.php" class="btn nav__btn">Book Now</a>
        </nav>
        <div class="section__container header__container" id="home">
            <p>Simple - Unique - Friendly</p>
            <h1>Make Yourself At Home<br />In Our <span>Hotel</span>.</h1>
        </div>
    </header>



    <section class="section__container about__container" id="about">
        <div class="about__image">
            <img src="assets/about.jpg" alt="about" />
        </div>
        <div class="about__content">
            <p class="section__subheader">ABOUT US</p>
            <h2 class="section__header">The Best Holidays Start Here!</h2>
            <p class="section__description">
                With a focus on quality accommodations, personalized experiences, and
                seamless booking, our platform is dedicated to ensuring that every
                traveler embarks on their dream holiday with confidence and
                excitement.
            </p>
            <div class="about__btn">
                <button class="btn">Read More</button>
            </div>
        </div>
    </section>

    <section class="section__container room__container">
        <p class="section__subheader">OUR LIVING ROOM</p>
        <h2 class="section__header">The Most Memorable Rest Time Starts Here.</h2>
        <div class="room__grid">
            <div class="room__card">
                <div class="room__card__image">
                    <img src="./assets/room-1.jpg" alt="room" />
                </div>
                <div class="room__card__details">
                    <h4>Deluxe Ocean View</h4>
                    <p>
                        Bask in luxury with breathtaking ocean views from your private
                        suite.
                    </p>
                    <div class="foot">
                        <span>$299 <br> <span class="det">Per day</span></span>
                        <a href="./login.php" class="btn nav__btn">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="room__card">
                <div class="room__card__image">
                    <img src="assets/room-2.jpg" alt="room" />
                </div>
                <div class="room__card__details">
                    <h4>Executive Cityscape Room</h4>
                    <p>
                        Experience urban elegance and modern comfort in the heart of the
                        city.
                    </p>
                    <div class="foot">
                        <span>$299 <br> <span class="det">Per day</span></span>
                        <a href="./login.php" class="btn nav__btn">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="room__card">
                <div class="room__card__image">
                    <img src="assets/room-3.jpg" alt="room" />
                </div>
                <div class="room__card__details">
                    <h4>Family Garden Retreat</h4>
                    <p>
                        Spacious and inviting, perfect for creating cherished memories
                        with loved ones.
                    </p>
                    <div class="foot">
                        <span>$299 <br> <span class="det">Per day</span></span>
                        <a href="./login.php" class="btn nav__btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service" id="service">
        <div class="section__container service__container">
            <div class="service__content">
                <p class="section__subheader">SERVICES</p>
                <h2 class="section__header">Strive Only For The Best.</h2>
                <ul class="service__list">
                    <li>
                        <span><i class="ri-shield-star-line"></i></span>
                        High Class Security
                    </li>
                    <li>
                        <span><i class="ri-24-hours-line"></i></span>
                        24 Hours Room Service
                    </li>
                    <li>
                        <span><i class="ri-headphone-line"></i></span>
                        Conference Room
                    </li>
                    <li>
                        <span><i class="ri-map-2-line"></i></span>
                        Tourist Guide Support
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section__container banner__container">
        <div class="banner__content">
            <div class="banner__card">
                <h4>25+</h4>
                <p>Properties Available</p>
            </div>
            <div class="banner__card">
                <h4>350+</h4>
                <p>Bookings Completed</p>
            </div>
            <div class="banner__card">
                <h4>600+</h4>
                <p>Happy Customers</p>
            </div>
        </div>
    </section>

    <section class="explore" id="explore">
        <p class="section__subheader">EXPLORE</p>
        <h2 class="section__header">What's New Today.</h2>
        <div class="explore__bg">
            <div class="explore__content">

                <h4>A New Menu Is Available In Our Hotel.</h4>
                <a href="./login.php" class="btn nav__btn">Book Now</a>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="section__container footer__container">
            <div class="footer__col">
                <div class="logo">
                    <a href="#">ROyal PArk</a>
                </div>
                <p class="section__description">
                    Discover a world of comfort, luxury, and adventure as you explore
                    our curated selection of hotels, making every moment of your getaway
                    truly extraordinary.
                </p>
                <a href="./login.php" class="btn nav__btn">Book Now</a>
            </div>
            <div class="footer__col">
                <h4>QUICK LINKS</h4>
                <ul class="footer__links">
                    <li><a href="#">Browse Destinations</a></li>
                    <li><a href="#">Special Offers & Packages</a></li>
                    <li><a href="#">Room Types & Amenities</a></li>
                    <li><a href="#">Customer Reviews & Ratings</a></li>
                    <li><a href="#">Travel Tips & Guides</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>OUR SERVICES</h4>
                <ul class="footer__links">
                    <li><a href="#">Concierge Assistance</a></li>
                    <li><a href="#">Flexible Booking Options</a></li>
                    <li><a href="#">Airport Transfers</a></li>
                    <li><a href="#">Wellness & Recreation</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>CONTACT US</h4>
                <ul class="footer__links">
                    <li><a href="#">rp@info.com</a></li>
                </ul>
                <div class="footer__socials">
                    <a href="#"><img src="assets/facebook.png" alt="facebook" /></a>
                    <a href="#"><img src="assets/instagram.png" alt="instagram" /></a>
                    <a href="#"><img src="assets/youtube.png" alt="youtube" /></a>
                    <a href="#"><img src="assets/twitter.png" alt="twitter" /></a>
                </div>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2023 || All rights reserved.
        </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="./js/main.js"></script>
</body>

</html>
