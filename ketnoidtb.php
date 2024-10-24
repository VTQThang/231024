<?php
    $severName = "localhost";
    $userName = "root";
    $pwd = "";
    $nameDB = "dblaptop";
    $conn = mysqli_connect($severName, $userName,$pwd,$nameDB);
    if( $conn===false){
        echo"Ket noi that bai";
    }
    else{
        echo"Thanh cong";
    }

    
?>