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
                <div class="logo" style="margin-right: 20px;"> <a href="#">Game Vault</a> </div>
                <ul class="links">
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="catalogo.php">Servicies</a></li>
                    <li><a href="mail.html">Contact</a></li>
                </ul>
                <form action="ricerca.php" method="POST">
                <select id="dropdown" name="Order_prezzo">
                    <option value="">-</option>
                    <option value="prezzo"> Order by Price </option>
                    <option value="nome"> Order by Name </option>
                    
                </select>
                
                <select id="dropdown" name="piattaforma">
                    <option value="">-</option>
                    <option value="PC"> PC </option>
                    <option value="ps5"> ps5 </option>
                    <option value="xbox"> xbox </option>
                </select>
                
                <select id="dropdown" name="categoria">
                    <option value="">-</option>
                    <option value="Action"> Action </option>
                    <option value="Fighting"> Fighting </option>
                    <option value="MMO-RPG"> MMO-RPG </option>
                    <option value="RPG"> RPG </option>
                    <option value="Strategy"> Strategy </option>
                    <option value="Shooter"> Shooter </option>
                    <option value="Adventure"> Adventure </option>
                    <option value="Souls"> Souls </option>
                </select>
                <input type="text" class="searchBox" placeholder="Search" name="ricerca">
                <button type="submit" class="action-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <a href="personal.php" class="action-btn" style="margin-left: 40px;"><i class="fa-solid fa-user"></i></a>
                <a href="cart.php" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a>
                <div class="toggle-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <form action="ricerca.php" method="POST">
                <div class="dropdown-menu open">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="catalogo.php">Servicies</a></li>
                    <li><a href="mail.html">Contact</a></li>
                    <li><a href="Login.html" class="action-btn"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li><a href="personal.php" class="action-btn"><i class="fa-solid fa-user"></i></a></li>
                    <li><input type="text" class="searchBox" placeholder="Search" name="ricerca"></li>
                    <li><button type="submit" class="action-btn"><i class="fa-solid fa-magnifying-glass"></i></button></li>
                </div>
            </form>
        </header>

        <div class="container">
        <?php
            session_start();
            $servername = "localhost:3306";  // Nome del server MySQL
            $username = "root";     // Nome utente MySQL
            $password = "";     // Password MySQL
            $database = "gamevault";     // Nome del database
            
            // Creazione della connessione
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connessione al database fallita: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM game";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while ($row = $result->fetch_assoc()) {
                    $image=$row["foto"];
                    $piattaforma=$row["piattaforma"];
                    $prezzo=$row["prezzo"];
                    $sconto=$row["sconto"];
                    $nome=$row["nome"];
                    $sconto_calc=($prezzo*$sconto)/100;
                    $prezzoscontato=$prezzo-$sconto_calc;
                    $prezzoscontato=number_format($prezzoscontato, 2, '.', '');
                    echo "

                    <div id='card'>
                        <div id='content'>
                            <img src='data:image/jpeg;base64,".base64_encode($image)."'>
                                <h2 style='text-align: center;'> " .$nome. " </h2> 
                                <br>
                            <p style='text-align: center;  text-decoration: line-through'> " .$prezzo. " €</p> 
                            <br>
                            <p style='text-align: center'>" .$prezzoscontato ."€</p>
                            <div id='price'>
                                <form action='../php/aggiungiCart.php' method='POST'>
                                    <input type='hidden' name='nomeG' value='".$nome."'>
                                    <button type='submit'>Buy Now</button>
                                </form>
                            <form action='prodotto.php' method='POST'>
                                <input type='hidden' name='nomeG' value='".$nome."'>
                                <button type='submit'>View More</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    " ;
                }
            }
            $conn->close();
        ?>
        </div>
    </body>
</html>
