<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Personal Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../css/personal.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <header>
            <div class="navbar">
                <div class="logo"> <a href="#">Game Vault</a> </div>
                <ul class="links">
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="catalogo.php">Servicies</a></li>
                    <li><a href="mail.html">Contact</a></li>
                </ul>
                <a href="../php/logout.php" class="action-btn" style="margin-left: 550px;"><i class="fa-solid fa-right-from-bracket"></i></a>
                <a href="cart.php" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a>
                <a href="credetials.html" class="action-btn"> <i class="fa-solid fa-lock"></i> </a>
                <div class="toggle-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="dropdown-menu open">
                <li><a href="Home.html">Home</a></li>
                <li><a href="catalogo.php">Servicies</a></li>
                <li><a href="mail.html">Contact</a></li>
                <li><a href="../php/logout.php" class="action-btn"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                <li><a href="cart.php" class="action-btn"> <i class="fa-solid fa-cart-shopping"></i> </a></li>
                <li><a href="credetials.html" class="action-btn"> <i class="fa-solid fa-lock"></i> </a></li>
            </div>
        </header>

        <h1> Welcome to your personal area of Game Vault </h1>

        <h4> here you can find your order history, from first to last. Thank you for choosing Game Vault to make your purchases </h4>

        <table class="elenco">
            <tr>
                <?php
                    session_start();
                    if (isset($_SESSION['userId'])) {
                        $userId=$_SESSION['userId'];
                        echo "<p style='color: #fff; text-align:center;'> User ID from session is " . $_SESSION['userId']. "</p>";
                    } else {
                        echo "No user is logged in.";
                        header("Location: ../html/Login.html");
                    }
                    $servername = "localhost:3306";  // Nome del server MySQL
                    $username = "root";     // Nome utente MySQL
                    $password = "";     // Password MySQL
                    $database = "gamevault";     // Nome del database
                    
                    // Creazione della connessione
                    $conn = new mysqli($servername, $username, $password, $database);
                    if ($conn->connect_error) 
                    {
                        die("Connessione al database fallita: " . $conn->connect_error);
                    }
                    if(!empty($_SESSION['userId']))
                    {
                        $sql="SELECT * FROM ordine WHERE IdUtente='$userId'";
                        $result=$conn->query($sql);
                        if($result->num_rows>0)
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                $IdOrdine=$row["IdOrdine"];
                                $dataOrdine=$row["dataOrdine"];
                                $totale=$row["costoTotale"];
                                $chiave=$row["Chiave"];
                                echo 
                                "<tr> <td>".$IdOrdine."</td>
                                <td>".$dataOrdine."</td>
                                <td>".$totale."</td>
                                <td>".$chiave."</td></tr>";
                            }
                        }
                    }
                    $conn->close();
                    ?>
            </tr>
        </table>

    </body>

</html>