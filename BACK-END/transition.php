<?php
    session_start();
    $data=$_POST["dataS"];
    $dataS=DateTime::createFromFormat('Y-m', $data);
    $dataOggi=new DateTime();
    if($dataOggi<=$dataS)
    {
        header("Location: ../html/home.html");
        exit();
    }  
    else
    {
        $_SESSION['error'] = "Carta scaduta";
        header("Location: ../html/transition.html");
        exit();
    }
?>