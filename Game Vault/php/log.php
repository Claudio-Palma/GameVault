<?php
    $servername = "localhost";  // Nome del server MySQL
    $username = "username";     // Nome utente MySQL
    $password = "password";     // Password MySQL
    $database = "e-commerce";     // Nome del database
    
    // Creazione della connessione
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    if(isset($_POST['checked']) && $_POST['checked'] == 'true') {
    // La checkbox è stata selezionata

        $username = $_POST['User2'];
        $email = $_POST['E-mail2'];
        $password = $_POST['password2'];

        $query = "INSERT INTO user (UserName, MD5(Password), e-mail) VALUES ('$username', '$email', '$password');";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Dati inseriti con successo!";
        } else {
            echo "Errore nell'inserimento dei dati: " . mysqli_error($conn);
        }

    } else {
    // La checkbox non è stata selezionata

        $username2 = $_POST['User'];
        $email2 = $_POST['E-mail'];
        $password2 = $_POST['password'];

        $query = "SELECT * FROM user WHERE UserName = '$username2' AND Password = MD5('$password2') AND e-mail = '$email2';";
        $result = mysqli_query($conn, $query); 

        if (mysqli_query($conn, $query)) {
            echo "Autenticazione effettuata!";
        } else {
            echo "Errore " . mysqli_error($conn);
        }

    }
?>