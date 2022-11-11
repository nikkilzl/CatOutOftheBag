<?php

if(session_id() == ''){
    session_start();
    if(!isset($_SESSION['custId'])){
        header('Location: ../index.php?showpopup=loginpopup');
    }
}

?>
