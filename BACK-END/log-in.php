<?php
session_start();
ob_start();
    $servername = "localhost:3306";  // Nome del server MySQL
    $username = "root";     // Nome utente MySQL
    $password = "";     // Password MySQL
    $database = "gamevault";     // Nome del database
    
    // Creazione della connessione
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Verifica della connessione
    if ($conn->connect_error) 
    {
        die("Connessione al database fallita: " . $conn->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         //variabili del prodotto
        $u_email=$_POST["e-mail"];
        $u_password=$_POST["pswd"];
        $u_password=md5($u_password);
        if(!empty($u_email)&&!empty($u_password))
        {
            $stmt = $conn->query("SELECT * FROM utente WHERE email='$u_email' AND pass='$u_password'");
            $sql="SELECT IdUtente FROM utente WHERE email='$u_email'";
            if ($stmt->num_rows == 1) 
            {
                $row=$stmt->fetch_assoc();
                $hashed_password=$row["pass"];
                $stmt1=$conn->prepare($sql);
                $stmt1->execute();
                $stmt1->bind_result($user_id);
                $stmt1->fetch();
                $_SESSION['userId'] = $user_id;
               if($u_password===$hashed_password)
                {
                    if($u_email==="admin@gmail.com")
                    {
                        echo "Autenticazione riuscita";
                        header("Location: ../html/adminweb.php");
                        exit();
                    }
                    else
                    {
                        echo "Autenticazione riuscita";
                        header("Location: ../html/Home.php");
                        exit();
                    }
                }
                else
                {
                    echo "Dati inseriti errati. Riprova";
                    header("Location: ../html/login.html");
                    exit();
                }
            }
            else
            {
                echo "Non sei registrato, registrati";
                exit();
            }
        }
       
        //aggiungere codice per password dimenticata
    } 
    else
    {
        echo "Complete tutti i campi";
        exit();
    }
    $conn->close();
    ob_end_flush();
?>
