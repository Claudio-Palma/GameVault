<?php
session_start();
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
    $u_username=$_POST["username"];
    $u_email=$_POST["e-mail"];
    $u_password1=$_POST["pswd"];

    if(!empty($u_username)&&!empty($u_email)&&!empty($u_password1))
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
                $hash_password=md5($u_password1);
                $IDRandom=rand(1,100000);
                $_SESSION['userId']=$IDRandom;
                $inserimento="INSERT INTO utente(IdUtente, NickName, email, pass) VALUES ('$IDRandom','$u_username','$u_email','$hash_password')";
                if ($conn->query($inserimento) === TRUE) {
                    echo "Registrazione completata con successo!";
                    header("Location: ../html/Home.php");
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