<?php
    include("connect.php");
    $res="";
    if(!isset($_SESSION['custId']) && isset($_POST['id']))
        $res = "NOT_LOGGED_IN";
    else if(isset($_SESSION['custId']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $uid = $_SESSION['custId'];
        $sql = "";
        if($_POST['type'] == "cart")
        {
            include "addToCart.php";
        } 
    }
    unset($_POST['id']);
?>