<?php

include ('conexao.php');



    if(!isset($_SESSION)){
        session_start();		
        }
                
        if (!isset($_SESSION['username'])){
            die ();
        } else {
                    echo "<p style = 'color:rgb(132, 14, 201)'> Usuário Logado: ";
                    echo $_SESSION['username'];
                    echo '<p><a href="logoff.php"> Logout</a></p>';
                    
    }     
        
?>