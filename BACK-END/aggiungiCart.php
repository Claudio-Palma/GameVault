<?php
    session_start();

    if (isset($_SESSION['userId'])) 
    {
        $userId=$_SESSION['userId'];
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
    if ($conn->connect_error) 
    {
        die("Connessione al database fallita: " . $conn->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
            $nomeGioco=$_POST["nomeG"];
            if(!empty($nomeGioco))
            {
                $sql="SELECT * FROM game WHERE nome='$nomeGioco'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result=$stmt->get_result();
                if($result->num_rows==1)
                {
                    $row=$result->fetch_assoc();
                    $IdGame=$row["IdGame"];
                    $prezzo=$row["prezzo"];
                    $sconto=$row["sconto"];
                    $sconto_calc=($prezzo*$sconto)/100;
                    $prezzoscontato=$prezzo-$sconto_calc;
                    $prezzoscontato=number_format($prezzoscontato, 2, '.', '');
                }
                $inserimento="INSERT INTO carrello(Utente, Game, nome, prezzo) VALUES( '$userId','$IdGame','$nomeGioco','$prezzoscontato')";
                $stmt=$conn->prepare($inserimento);
                if ($stmt->execute()) 
                {
                    echo "Gioco caricato nel carrello!";
                    header("Location: ../html/catalogo.php");
                } 
                else
                echo "Errore";
            }    
            else
            {
                echo "errore";
                header("Location: ../html/catalogo.php");
            }
    }
?>