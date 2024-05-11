<!DOCTYPE html>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <title> Adimn </title>
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="logo"> <a href="#">Web dev container</a> </div>
                <ul class="links">
                    <li><a href="login.html">Log-in</a></li>
                    <li><a href="#portfolio">About</a></li>
                    <li><a href="catalogo.html">Servicies</a></li>
                    <li><a href="mail.html">Contact</a></li>
                </ul>
                <a href="#" class="action-btn">Get Started</a>
                <div class="toggle-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="dropdown-menu open">
                <li><a href="home.html">Home</a></li>
                <li><a href="#portfolio">About</a></li>
                <li><a href="#">Servicies</a></li>
                <li><a href="mail.html">Contact</a></li>
                <li><a href="#" class="action-btn">Get Started</a></li>
            </div>
        </header>


        <section class="lista">
            <div class="container">
                <table class="table2">
                    <tr class="header-row">
                        <th> ID </th>
                        <th> nome </th>
                        <th> descrizione </th>
                        <th> prezzo </th>
                        <th> sconto </th>
                        <th> quantità disponibile</th>
                    </tr>
                  <?php
                        $servername="localhost:3306";
                        $username="admin";
                        $password="admin";
                        $database="gamevault";
                    
                        $conn = new mysqli($servername, $username, $password, $database);
                        if ($conn->connect_error) 
                        {
                            die("Connessione al database fallita: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM game";
                        $result = $conn->query($sql);
                        if($result->num_rows>0)
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                echo "<tr>
                                        <td>" .$row["IdGame"]."</td>
                                        <td>" .$row["nome"]."</td>
                                        <td>" .$row["descrizione"]."</td>
                                        <td>" .$row["prezzo"]."</td>
                                        <td>" .$row["sconto"]."</td>
                                        <td>" .$row["disponibilita"]."</td>
                                        <td> <button class="submit"> X </button> </td>
                                </tr>";
                            }
                        }
                        $conn->close();
                  ?>
                </table>
                <h1 class="modifica"> Modifica </h1>
                <form action="../php/admin.php" method="POST">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>prezzo</th>
                        <th>sconto</th>
                        <th>quantita' disponibile</th>
                    </tr>
                    <tr>
                        <td> <input type="number" class="id" name="id"> </td>
                        <td> <input type="number" class="prezzo" name="prezzo"> </td>
                        <td> <input type="number" class="sconto" name="sconto"> </td>
                        <td> <input type="number" class="quatità" name="quantità"> </td>
                    </tr>
                </table>

                <button class="submit" type="submit" name="modifica"> Submit </button>
            </form>
                <h1 class="aggiungi"> Aggiungi </h1>
                <form action="../php/admin.php" method="POST">
                    <table class="table">
                        <tr>
                            <th>nome</th>
                            <th>prezzo</th>
                            <th>sconto</th>
                            <th>descrizione</th>
                            <th>quantita' disponibile</th>
                        </tr>
                        <tr>
                            <td> <input type="text" class="nome" name="nome"> </td>
                            <td> <input type="number" class="prezzo" name="prezzo"> </td>
                            <td> <input type="number" class="sconto" name="sconto"> </td>
                            <td> <textarea class="descrizione" name="descrizione"> </textarea> </td>
                            <td> <input type="number" class="quatità" name="quantità"> </td>
                        </tr>
                    </table>
                    <button type="submit" class="submit" name="inserimento"> Submit </button>
                </form>
            </div>

        </section>

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
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
    </body>
</html>
