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
                    <li><a href="catalogo.php">Servicies</a></li>
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
                        <th> piattaforma </th>
                        <th> genere </th>
                        <th> prezzo </th>
                        <th> sconto </th>
                        <th> quantità disponibile</th>
                    </tr>
                  <?php
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
                                        <td>" .$row["piattaforma"]."</td>
                                        <td>" .$row["genere"]."</td>
                                        <td>" .$row["prezzo"]."</td>
                                        <td>" .$row["sconto"]."</td>
                                        <td>" .$row["disponibilita"]."</td>
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
                        <td> <input placeholder="id per la modifica" type="number" class="id" name="id"> </td>
                        <td> <input placeholder="nuovo prezzo" type="number" class="prezzo" name="prezzo"> </td>
                        <td> <input placeholder="nuovo sconto" type="number" class="sconto" name="sconto"> </td>
                        <td> <input placeholder="nuova quantità" type="number" class="quatità" name="quantità"> </td>
                    </tr>
                </table>

                <button class="submit" type="submit" name="modifica"> Submit </button>
            </form>
                <h1 class="aggiungi"> Aggiungi </h1>
                <form action="../php/admin.php" method="POST">
                    <table class="table">
                        <tr>
                            <th>nome</th>
                            <th>piattaforma</th>
                            <th>genere</th>
                            <th>prezzo</th>
                            <th>sconto</th>
                            <th>quantita' disponibile</th>
                        </tr>
                        <tr>
                            <td> <input placeholder="nome" type="text" class="nome" name="nome"> </td>
                            <td> <input placeholder="piattaforma" type="text" class="nome" name="piattaforma"> </td>
                            <td> <input placeholder="genere" type="text" class="nome" name="genere"> </td>
                            <td> <input placeholder="prezzo" type="number" class="prezzo" name="prezzo" step=0.01> </td>
                            <td> <input placeholder="sconto" type="number" class="sconto" name="sconto"> </td>
                            <td> <input placeholder="quantità" type="number" class="quatità" name="quantità"> </td>
                        </tr>
                    </table>
                        <table class="table">
                        <tr>
                            <th>Descrizione</th>
                        </tr>    
                        <tr>
                            <td> <textarea class="descrizione" name="descrizione"> </textarea> </td>
                        </tr>
                    </table>
                    <button type="submit" class="submit" name="inserimento"> Submit </button>
                </form>

                <form action="../php/admin.php" method="POST">

                <h1 class="del"> Elimina </h1>
                <input placeholder="Insericsi l'id" type="number" class="idDel" name="id">
                <button class="submit" type="submit" name="elimina"> Submit </button>
             </form>
            </div>
            <section class="lista">
            <div class="container">
                <table class="table2">
                    <tr class="header-row">
                        <th> IDOrdine </th>
                        <th> Data Ordine </th>
                        <th> Costo totale </th>
                        <th> IdUtente</th>
                        <th> Chiave </th>
                        <th> stato </th>
                    </tr>
                  <?php
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
                        $sql = "SELECT * FROM ordine";
                        $result = $conn->query($sql);
                        if($result->num_rows>0)
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                echo "<tr>
                                        <td>" .$row['IdOrdine']."</td>
                                        <td>" .$row['dataOrdine']."</td>
                                        <td>" .$row['costoTotale']."</td>
                                        <td>" .$row['IdUtente']."</td>
                                        <td>" .$row['Chiave']."</td>
                                        <td>" .$row['stato']."</td>
                                        
                                </tr>";
                            }
                        }
                        $conn->close();
                  ?>
                </table>
            </div>
        </section>
    </body>
</html>