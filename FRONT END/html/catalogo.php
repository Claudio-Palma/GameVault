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
                    <li><a href="home.html">Home</a></li>
                    <li><a href="catalogo.html">Servicies</a></li>
                    <li><a href="mail.html">Contact</a></li>
                </ul>

                <select id="dropdown">
                    <option value="Price"> Order by Price </option>
                    <option value="Name"> Order by Name </option>
                </select>
                
                <select id="dropdown">
                    <option value="PC"> PC </option>
                    <option value="PS-5"> PS-5 </option>
                    <option value="X-box"> X-box </option>
                </select>
                
                <select id="dropdown">
                    <option value="Action"> Action </option>
                    <option value="Fighting"> Fighting </option>
                    <option value="MMO-RPG"> MMO-RPG </option>
                    <option value="RPG"> RPG </option>
                    <option value="Strategy"> Strategy </option>
                    <option value="Shooter"> Shooter </option>
                    <option value="Adventure"> Adventure </option>
                    <option value="Souls"> Souls </option>
                </select>

                <input type="text" class="searchBox" placeholder="Search">

                <a href="#" class="action-btn" style="margin-left: 40px;"><i class="fa-solid fa-user"></i></a>
                <a href="#" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a>
                <div class="toggle-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="dropdown-menu open">
                <li><a href="home.html">Home</a></li>
                <li><a href="catalogo.html">Servicies</a></li>
                <li><a href="mail.html">Contact</a></li>
                <li><a href="#" class="action-btn">Get Started</a></li>
            </div>
        </header>

       <?php
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
                    echo "

                    <div id='card'>
                        <img src='data:image/jpeg;base64,".base64_encode($image)."'>
                        <div id='content'>
                             <h2 style='text-align: center;'> " .$nome. " </h2> 
                             <br>
                            <p style='text-align: center;  text-decoration: line-through'> " .$prezzo. " €</p> 
                            <br>
                            <p style='text-align: center'>" .$prezzoscontato ."€</p>
                            <div id='price'>
                                <form action='../php/aggingiCart.php' method='POST'>
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
        
    </body>
</html>
