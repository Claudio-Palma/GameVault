<?php
    $servername = "localhost:3306";  // Nome del server MySQL
    $username = "admin";     // Nome utente MySQL
    $password = "admin";     // Password MySQL
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
        $u_email=$_POST["e-mail"];
        $u_password=$_POST["pswd"];
        if(!empty($u_email)&&!empty($u_password))
        {
            $stmt = $conn->prepare("SELECT pass FROM utente WHERE email='$u_email'");
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) 
            {
                $stmt->bind_result($hashed_password);
                $stmt->fetch();
            if(password_verify($u_password, $hashed_password))
            {
                echo "Autenticazione riuscita";
                header("Location: ../html/home.html");
            }
            else
            {
                echo "Dati inseriti errati. Riprova";
                header("Location: ../html/login.html");
            }
        }
        else
        {
            echo "Complete tutti i campi";
        }
        }
    } 
    $conn->close();
?>