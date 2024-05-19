<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../css/catalogo.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../js/catalogo.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <title>catalogo</title>
    </head>

    <body>
        <header>
            <div class="navbar">
                <div class="logo"> <a href="#">Web dev container</a> </div>
                <ul class="links">
                    <li><a href="home.html">Hmoe</a></li>
                    <li><a href="home.html#portfolio">About</a></li>
                    <li><a href="catalogo.html">Servicies</a></li>
                    <li><a href="mail.html">Contact</a></li>
                </ul>
                <a href="#" class="action-btn">Get Started</a>
                <div class="toggle-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="dropdown-menu open">
                <li><a href="home.html">Hmoe</a></li>
                <li><a href="home.html#portfolio">About Us</a></li>
                <li><a href="catalogo.html">Servicies</a></li>
                <li><a href="mail.html">Contact</a></li>
                <li><a href="#" class="action-btn">Get Started</a></li>
            </div>
        </header>

        <?php
            $servername="localhost:3306";
            $username="root";
            $password="";
            $database="gamevault";

            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connessione al database fallita: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM game";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while ($row = $result->fetch_assoc()) {
                    $image=$row["foto"];
                    $prezzo=$row["prezzo"];
                    $sconto=$row["sconto"];
                    $sconto_calc=($prezzo*$sconto)/100;
                    $prezzoscontato=$prezzo-$sconto_calc;
                    echo "
                    <div class='container'>
                        <div class='card'>
                            <div class='imgBx'>
                                <img src='data:image/jpeg;base64,".base64_encode($image)."'>
                            </div>
                            <div class='contentBx'>
                                <h2> DOOM ETERNAL</h2>
                                <a href='#'>Buy Now</a>
                                <a href='#'>View More</a>
                
                                <p class='price'>$prezzo</p>
                                <p class='price'>$prezzoscontato</p>
                            </div>
                        </div>
                    </div>" ;
                }
            }
            $conn->close();
        ?>

        <section class="footerContainer">
            <div class="footer">
                <div class="contain">
                    <div class="col">
                        <h1>Company</h1>
                        <ul>
                            <li>About</li>
                            <li>Mission</li>
                            <li>Services</li>
                            <li>Social</li>
                            <li>Get in touch</li>
                        </ul>
                    </div>
                    <div class="col">
                        <h1>Products</h1>
                        <ul>
                            <li>About</li>
                            <li>Mission</li>
                            <li>Services</li>
                            <li>Social</li>
                            <li>Get in touch</li>
                        </ul>
                    </div>
                    <div class="col">
                        <h1>Accounts</h1>
                        <ul>
                            <li>About</li>
                            <li>Mission</li>
                            <li>Services</li>
                            <li>Social</li>
                            <li>Get in touch</li>
                        </ul>
                    </div>
                    <div class="col">
                        <h1>Resources</h1>
                        <ul>
                            <li>Webmail</li>
                            <li>Redeem code</li>
                            <li>WHOIS lookup</li>
                            <li>Site map</li>
                            <li>Web templates</li>
                            <li>Email templates</li>
                        </ul>
                    </div>
                    <div class="col">
                        <h1>Support</h1>
                        <ul>
                            <li>Contact us</li>
                            <li>Web chat</li>
                            <li>Open ticket</li>
                        </ul>
                    </div>
                    <div class="col social">
                        <h1>Social</h1>
                        <ul>
                            <li><img src="https://svgshare.com/i/5fq.svg" width="32" style="width: 32px;"></li>
                            <li><img src="https://svgshare.com/i/5eA.svg" width="32" style="width: 32px;"></li>
                            <li><img src="https://svgshare.com/i/5f_.svg" width="32" style="width: 32px;"></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
    </body>
</html>