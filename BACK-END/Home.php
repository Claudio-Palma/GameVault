<!DOCTYPE html>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <script src="../js/home.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <title> Home page </title>
    </head>

    <body>
        <header class="header1">
            <div class="navbar">
                <div class="logo"> <a href="#">Game Vault</a> </div>
                <ul class="links">
                    <li><a href="login.html">Log-in</a></li>
                    <li><a href="#portfolio">About</a></li>
                    <li><a href="catalogo.php">Catalog</a></li>
                    <li><a href="mail.html">Contact</a></li>
                    <?php
                        session_start();

                        if (isset($_SESSION['userId'])) {
                            echo "<span style='color: #fff;'>".$_SESSION['userId']."</span>" ;
                        }
                    ?>
                    
                </ul>
                <a href="personal.php" class="action-btn" style="margin-left: 500px;"><i class="fa-solid fa-user"></i></a>
                <a href="cart.php" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a>
                <div class="toggle-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <div class="dropdown-menu open">
                <li><a href="home.html">Home</a></li>
                <li><a href="#portfolio">About</a></li>
                <li><a href="#">Servicies</a></li>
                <li><a href="mail.html">Contact</a></li>
                <li><a href="cart.php" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a></li>
                <li><a href="personal.php" class="action-btn"><i class="fa-solid fa-user"></i></a></li>
            </div>
        </header>

        <section class="events">
            <div class="title">
                <h1>Upcoming Events</h1>
                <div class="line"></div>
            </div>

            <div class="row">
                <div class="col col2">
                    <img src="../foto/fc24.jpg" class="img" style="height: 280px; width: 500px;">
                    <p> 
                        Play the new Fc24
                    </p>
                    <a href="#" class="ctn">View more</a>
                </div>

                <div class="col col2">
                    <img src="../foto/4.jpg" class="img">
                    <p> 
                        Final Fantasy XVI is out
                    </p>
                    <a href="prodotto.php" class="ctn" value="Final Fantasy XVI">View more</a>
                </div>
            </div>
        </section>

        <section class="game-section">
            <div class="title">
                <h1>Game Section</h1>
                <div class="line" style="margin-bottom: 50px;"></div>
            </div>
            <div class="owl-carousel custom-carousel owl-theme">
                <div class="item active" style="background-image: url(../foto/dota2.jpg)">
                    <div class="item-desc">
                        <h3>Dota 2</h3>
                        <p  style="margin-bottom: 20px;">Dota 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                        Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
                        <a href="#" class="ctn">View more</a>
                    </div>
                </div>
                <div class="item" style="background-image: url(../foto/theWitcher.jpg);">
                    <div class="item-desc">
                        <h3>The Witcher 3</h3>
                        <p>The Witcher 3 is a multiplayer online battle arena by Valve. The game is a sequel to Defense
                        of the Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
                <div class="item" style="background-image: url(../foto/rdr2.jpg)">
                    <div class="item-desc">
                        <h3>RDR 2</h3>
                        <p>RDR 2 is a sprawling Western tale of loyalty, conviction, and the price of infamy, chronicling the
                            inevitable collapse of a motley crew of Wild West holdouts kicking against the slow march 
                            of civilisation and industrialisation.</p>
                    </div>
                </div>
                <div class="item" style="background-image: url(../foto/pubg.jpg);">
                    <div class="item-desc">
                        <h3>PUBG Mobile</h3>
                        <p>PUBG 2 multiplayer online battle royale game published and developed by the South Korean company Bluehole.</p>
                    </div>
                </div>
                <div class="item" style="background-image: url(../foto/skirym.jpg);">
                    <div class="item-desc">
                        <h3>Skyrim</h3>
                        <p>Battle royale where 100 players fight to be the last person standing. which was a community-created mod
                        for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
                <div class="item" style="background-image: url(../foto/far-cry.jpg);">
                    <div class="item-desc">
                        <h3>Far Cry 5</h3>
                        <p>Far Cry 5 is a 2018 first-person shooter game developed by Ubisoft.
                        which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="foto">

            <header class="header2">
                <img src="../foto/5.jpg" alt="FOTO1" class="prima img">

                <p class="text col">We're finally back in Sanctuary! Diablo 4 comes out very soon, and by now we know everything (or almost everything)
                about it of the highly anticipated action role-playing game from Blizzard. Just think, the famous developer hasn't been there since 2008
                churned out a new chapter, even if in the meantime expansions were released for Diablo 3, a version dedicated to
                Nintendo Switch and Diablo Immortal for mobile. So let's find out together everything you need to know about this fourth, promising, chapter.
                </p>

                <a href="#" class="ctn">View more</a>
            </header>

            <header class="header2">
                <img src="../foto/6.jpg" alt="FOTO2" class="seconda img">

                <p class="text col">Assassin's Creed: Mirage is the eagerly awaited new chapter in the Assassin's Creed series. In Mirage, players take
                control of a young Basim Ibn Ishaq, a central character in 2020's Assassin's Creed: Valhalla, as they explore his life
                circa 9th century Baghdad, the capital of the Abbasid Caliphate.
                </p>

                <a href="#" class="ctn ctnSeconda">View more</a>
            </header>

            <header class="header2" style="height: 350px;">
                <img src="../foto/baldurs.jpeg" alt="FOTO3" class="terza img">

                <p class="text col txt3">Baldur's Gate 3 decided to create mechanics heavily inspired by the 5th edition of Dungeons & Dragons,
                slightly modified to adapt to the needs of their virtual world. As we write these lines the game is not playing
                is still out, but from the information released so far it seems that the adventure has truly epic tones: they will be
                there Over 200 hours of footage and an endless supply of alternate endings.
                </p>

                <a href="#" class="ctn ctn3">View more</a>
            </header>
        </section>

        <section class="portfolio" id="portfolio">
            <div class="title">
                <h1>Who are we</h1>
                <div class="line" style="margin-bottom: 50px;"></div>
            </div>
            <div class="card">
                <div class="card__content">
                    <div class="card__front">
                        <h3 class="card__title">Front end</h3>
                        <p class="card__subtitle">Developer</p>
                    </div> 
                    <div class="card__back">
                        <p class="card__body">Front-end programmed by Ernesto Corsini</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card__content">
                    <div class="card__front">
                        <h3 class="card__title">Back end</h3>
                        <p class="card__subtitle">Developer</p>
                    </div> 
                    <div class="card__back">
                        <p class="card__body">Client-server communication programmed by Alessandro Orsatti</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card__content">
                    <div class="card__front">
                        <h3 class="card__title">Designer</h3>
                        <p class="card__subtitle">Style</p>
                    </div> 
                    <div class="card__back">
                        <p class="card__body">GUI conceived by Claudio Palma</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card__content">
                    <div class="card__front">
                        <h3 class="card__title">The team</h3>
                        <p class="card__subtitle">Contact</p>
                    </div> 
                    <div class="card__back">
                        <p class="card__body">Alessandro Orsatti Claudio Palma Ernesto Corsini</p>
                    </div>
                </div>
            </div>
        </section>

            <div class="FooterContainer">
                <a class="sublinks" rel="nofollow" href="#">Terms of Use</a>
                <a class="sublinks" rel="nofollow" href="#">Privacy policy</a>
                <a class="sublinks" rel="nofollow" href="#">Affiliation Program</a>
                <a class="sublinks ig-contact-btn" rel="nofollow" href="#">Contactus</a>
                <a class="sublinks" rel="nofollow" href="#">
                    <div class="icon-gift icon-xs"></div>
                    <span>Redeem a Gift Card</span>
                </a>
                <a class="sublinks" target="_blank" href="#">
                    <div class="icon-news icon-xs"></div>
                    <span>Find the latest video game news</span>
                </a>
            </div>

    </body>

</html>