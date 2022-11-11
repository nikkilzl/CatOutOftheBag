<?php 
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create a connection to database
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check to make sure there is a connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(session_id() == ''){
    //if session has not started, we want to start the session
    session_start();
}

?>
