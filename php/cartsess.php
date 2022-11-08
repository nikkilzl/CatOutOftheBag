<?php
    include("connectdb.php");
    $res="";
    if(!isset($_SESSION['custId']) && isset($_POST['id']))
        $res = "LOGIN";
    else if(isset($_SESSION['custId']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $cid = $_SESSION['custId'];
        $sql = "";
        if($_POST['type'] == "cart")
        {
            include "addcart.php";
        } 
    }
    unset($_POST['id']);
?>