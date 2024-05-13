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
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['inserimento']))
        {
            $nome=$_POST["nome"];
            $prezzo=$_POST["prezzo"];
            $sconto=$_POST["sconto"];
            $descrizione=$_POST["descrizione"];
            $quantità=$_POST["quantità"];

            if(!empty($nome)&&!empty($prezzo)&&!empty($sconto)&&!empty($descrizione)&&!empty($quantità))
            {
                $IDRandom=rand(1,100000);
                $inserimento="INSERT INTO game(IdGame, nome, descrizione, prezzo, disponibilita, foto, recensione, sconto) VALUES('$IDRandom', '$nome', '$descrizione', '$prezzo', '$quantità', '', '', '$sconto')";
                if ($conn->query($inserimento) === TRUE) 
                {
                    echo "Gioco caricato con successo!";
                    header("Location: ../html/adminweb.php");
                } 
                
            }
            else
            {
                echo "Completa tutti i campi";
            }
        }
        else if(isset($_POST['modifica']))
        {
            $Id=$_POST["id"];
            $prezzo=$_POST["prezzo"];
            $sconto=$_POST["sconto"];
            $quantità=$_POST["quantità"];
            if(!empty($Id)&&!empty($prezzo)&&!empty($sconto)&&!empty($quantità))
            {
                $modifica="UPDATE game SET prezzo='$prezzo', sconto='$sconto', disponibilita='$quantità' WHERE IdGame=$Id";
                if ($conn->query($modifica) === TRUE) 
                {
                    echo "Gioco modificato con successo!";
                    header("Location: ../html/adminweb.php");
                }
                else
                {
                    echo "Il gioco non esiste";
                }
            }
            else
            {
                echo "Completa tutti i campi";
            }
        }
        else if(isset($_POST['elimina']))
        {
            $Id=$_POST["id"];
            if(!empty($Id))
            {
                $elimina="DELETE FROM game WHERE IdGame=$Id";
                if($conn->query($elimina)===TRUE)
                {
                    echo "Gioco cancellato";
                    header("Location: ../html/adminweb.php");
                }
                else
                echo "Il gioco non esiste";
            }
        }
    }
    else 
    {
        echo "Errore durante il caricamento dei giochi: " . $conn->error;
    }   
?>