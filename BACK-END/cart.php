<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/cart.css" rel="stylesheet">
    <script src="../js/cart.js" defer></script>
</head>

<body>
    <header class="header1">
        <div class="navbar">
            <div class="logo"> <a href="Home.php">Game Vault</a> </div>
            <ul class="links">
                <li><a href="Login.html">Log-in</a></li>
                <li><a href="#portfolio">About</a></li>
                <li><a href="catalogo.php">Catalog</a></li>
                <li><a href="mail.html">Contact</a></li>
            </ul>

            <a href="personal.php" class="action-btn" style="margin-left: 550px;"><i class="fa-solid fa-user"></i></a>
            <a href="cart.php" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a>
            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown-menu open">
            <li><a href="home.html">Home</a></li>
            <li><a href="catalogo.php">Servicies</a></li>
            <li><a href="mail.html">Contact</a></li>
            <li><a href="cart.php" class="action-btn"></a> <i class="fa-solid fa-cart-shopping"></i> </li>
        </div>
    </header>

    <section>
        <div class="container">
            <h2 class="px-5 p-2">My shopping cart</h2>
            <div class="cart">
                <div class="col-md-12 col-lg-10 mx-auto">
                    <div class="cart-item">
                        <div class="container">
                            <?php
                            session_start();

                            if (isset($_SESSION['userId'])) {
                                echo "User ID from session is " . $_SESSION['userId'];
                            } else {
                                echo "No user is logged in.";
                            }
                            $servername = "localhost:3306";  // Nome del server MySQL
                            $username = "root";     // Nome utente MySQL
                            $password = "";     // Password MySQL
                            $database = "gamevault";     // Nome del database

                            // Creazione della connessione
                            $conn = new mysqli($servername, $username, $password, $database);
                            if ($conn->connect_error) {
                                die("Connessione al database fallita: " . $conn->connect_error);
                            }
                            $prezzoTotale=0;
                            $sql = "SELECT * FROM carrello";
                            $result = $conn->query($sql);
                            if($result->num_rows>0){
                                while ($row = $result->fetch_assoc()) {
                                    $prezzo=$row["prezzo"];
                                    $nome=$row["nome"];
                                    $prezzo=number_format($prezzo, 2, '.', '');
                                    $prezzoTotale=$prezzoTotale+$prezzo;
                                    $sconto_calc=($prezzo*10)/100;
                                    $sconto_calc=number_format($sconto_calc, 2, '.', '');
                                    $Totale=$prezzoTotale+$sconto_calc;
                                    echo "
                                    <div class='row cart-row'>
                                        <div class='col-md-7 center-item'>
                                            <h5 class='item-name'>".$nome."</h5>
                                        </div>

                                        <div class='col-md-5 center-item'>
                                            <div class='input-group number-spinner'>
                                                <button class='game-minus'>-</button>
                                                <input type='number' min='1' class='form-control text-center game-number' value='1' name='gameQuantity'>
                                                <button class='game-plus'>+</button>
                                            </div>
                                            <h5>€ <span class='game-price'>".$prezzo."</span> </h5>
                                            <img src='images/remove.png' alt='' class='remove-item'>
                                        </div>
                                    </div>
                            ";
                                }
                                echo "
                                <form action='transition.php' method='POST'>
                                <div class='cart-item'>
                                <div class='row g-2'>
                                    <div class='col-6'>
                                        <h5>Subtotal: </h5>
                                        <h5>Tax:</h5>
                                        <h5>Total:</h5>
                                    </div>

                                    <div class='col-6 status'>
                                        <h5 id='sub-total'>€0.00</h5>
                                        <h5 id='tax-amount'>€".$sconto_calc."</h5>
                                        <h5 id='total-price' name='Totale' value=".$Totale.">€".$Totale."</h5>
                                    </div>
                                </div>
                                </div>
                                <input type='hidden' name='Totale' value='".$Totale."'>
                                <div class='col-md-12 pt-4 pb-4'>
                                <button type='submit' class='btn btn-success check-out'>Check Out</button>
                                </form>
                            </div>";
                            }
                            $conn->close();
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>