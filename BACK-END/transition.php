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
     if ($conn->connect_error) 
     {
        die("Connessione al database fallita: " . $conn->connect_error);
    }
    $Totale=$_POST["Totale"];
    $nome=$_POST["Name"];
    $carta=$_POST["Card"];
    $cvc=$_POST["CVC"];
    $data=$_POST["dataS"];
    $dataS=DateTime::createFromFormat('Y-m', $data);
    $dataOggi=new DateTime();
    if(!empty($nome)&&!empty($carta)&&!empty($cvc)&&!empty($dataS))
    {
        if($dataOggi<=$dataS)
        {
            $userId=$_SESSION['userId'];
            $data=new DateTime();
            $dataFormatted = $data->format('Y-m-d H:i:s');
            $ordineId=rand(1,100000);
            $stato="Completato";
            function generateRandomString($length = 16) 
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            $chiave=generateRandomString();
            $sql="INSERT INTO ordine VALUES('$ordineId', '$dataFormatted', '$Totale', '$userId', '$chiave', '$stato')";
            if($conn->query("DELETE FROM carrello"))
            {
                echo "Tabella svuotata";
            }
            if ($conn->query($sql) === TRUE) 
            {
                echo "Ordine caricato con successo!";
                header("Location: ../html/personal.php");
            } 
            else 
            {
                echo "Errore durante il caricamento dell'ordine: " . $conn->error;
            
            }
        }    
        else
        {
            $_SESSION['error'] = "Carta scaduta";
            header("Location: ../html/transition.php");
            exit();
        }
    }
    else
    {
            $_SESSION['error'] = "Completa tutti i campi";
            header("Location: ../html/transition.php");
            exit();
    }
?>