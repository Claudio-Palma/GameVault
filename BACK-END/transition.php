<!DOCTYPE html>
<html>
    <head>
        <title> transition page </title>
        <link rel="stylesheet" type="text/css" href="../css/transition.css">
    </head>
    <body>
        <?php
        session_start();

        if (isset($_SESSION['userId'])) {
            echo "User ID from session is " . $_SESSION['userId'];
        } else {
            echo "No user is logged in.";
            header("Location: ../html/Login.html");
        }
        $Totale=$_POST["Totale"];
        echo "
        <form action='../php/transition.php' method='POST'>
            <div class='wrapper'>
                <div class='form'>
                    <h2 class='form-title'>Payment</h2>
                    <input type='text' class='input-std' placeholder='Name and Surname' name='Name'>
                    <input type='number' class='input-std' placeholder='Card Number' name='Card'>
                    <input type='number' class='input-half' placeholder='CVV/CVC' name='CVC'>
                    <input type='month' class='input-half' placeholder='MM/AAAA' name='dataS'>
                    <input type='hidden' name='Totale' value=".$Totale."></input>
                    <button type='submit' class='btn-submit'>PAY!</button>
                </div>
            </div>
        </form>";
        ?>
    </body>
</html>