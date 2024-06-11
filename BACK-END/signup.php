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
   //variabili del prodotto
    $u_username=$_POST["username"];
    $u_email=$_POST["e-mail"];
    $u_password=$_POST["pswd"];

    if(!empty($u_username)&&!empty($u_email)&&!empty($u_password))
    {
        $verifica="SELECT * FROM utente WHERE email='$u_email'";
        $risultato=$conn->query($verifica);
        if($risultato->num_rows > 0)
        {
            echo "Utente già registrato, effettua il login" . $conn->error;
            header("Location: ../html/login.html");
        }
        else
        {
            $hash_password=password_hash($u_password, PASSWORD_DEFAULT);
            $IDRandom=rand(1,100000);
            $inserimento="INSERT INTO utente(IdUtente, NickName, email, pass) VALUES ('$IDRandom','$u_username','$u_email','$hash_password')";
            if ($conn->query($inserimento) === TRUE) {
                echo "Registrazione completata con successo!";
                header("Location: ../html/home.html");
            } else {
                echo "Errore durante la registrazione: " . $conn->error;
            }   
        }
    }
    else
    {
        echo "Completa tutti i campi";
    }
 }
 ?>
