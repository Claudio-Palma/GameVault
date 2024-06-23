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
        $nome=$_POST["nome"];
        $sql = "SELECT * FROM game WHERE nome='$nome'";
        $result = $conn->query($sql);
        if($result->num_rows>0)
        {
            $image=$row["foto"];
            $row = $result->fetch_assoc();
            $prezzo=$row["prezzo"];
            $sconto=$row["sconto"];
            $sconto_calc=($prezzo*$sconto)/100;
            $prezzoscontato=$prezzo-$sconto_calc;
            echo "<tr>
                    <td><img src='data:image/jpeg;base64,".base64_encode($image)."'></td>
                    <td>" .$row["nome"]."</td>
                    <td>" .$row["descrizione"]."</td>
                    <td>" .$row["prezzo"]."</td>
                    <td>" .$row["sconto"]."</td>
                    <td>" .$prezzoscontato."</td>;
                    <td>" .$row["disponibilita"]."</td>
            </tr>";    
        }
        else
        echo "Prodotto non disponibile";
    }
    else
    echo "Error";
    $conn->close();
?>