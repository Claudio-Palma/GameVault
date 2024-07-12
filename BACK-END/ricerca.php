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
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $nome=$_POST["nome"];
        $sql="SELECT * FROM game WHERE name LIKE '%$nome%'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            while ($row = $result->fetch_assoc()) {
                $image=$row["foto"];
                $piattaforma=$row["piattaforma"];
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
                            <h2>".$row["nome"]."</h2>
                            <h2>".$piattaforma."</h2>
                            <p class='price'>$prezzo €</p>
                            <p class='price'>$prezzoscontato €</p>
                            <form action='cart.php' method='POST'>
                                <input type='hidden' name='nomeG' value='".$row["nome"]."'>
                                <button type='submit'>Buy Now</button>
                            </form>
                            <form action='prodotto.php' method='POST'>
                                <input type='hidden' name='nomeG' value='".$row["nome"]."'>
                                <button type='submit'>View More</button>
                            </form>
                        </div>
                    </div>
                </div>
                " ;
            }
        }
        else
        echo "Prodotto non trovato";
    
        $conn->close();
    }
    ?>