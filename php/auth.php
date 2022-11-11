<?php
if(session_id() == ''){
    //do not start session yet
    session_start();
}

$showpopup = isset($_GET['showpopup']) ? $_GET['showpopup'] : '';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['popuptype']) ){
    //type refers to either login or signup
    $username = $conn->real_escape_string($_POST['username']); //real_escape_string escapes special characters in strings (for Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z.)
    $password = $conn->real_escape_string($_POST['password']);
    $password = md5($password); //password hash
    $errorMsg = '';

  
    if($_POST['popuptype'] == 'login'){
        $sql = 'SELECT * from Account '
        ."WHERE username='$username' "
        ." AND password='$password'";

        $result = mysqli_query($conn, $sql);
        if ($result->num_rows >0 ) //if login is successful
        {
            $authrow = mysqli_fetch_assoc($result);
            $accountId = $authrow['accountId'];   
            
            $_SESSION['username'] = $username;    
            $_SESSION['accountId'] = $accountId;

            $sql = 'SELECT * from custdets '
            ."WHERE accountId='$accountId'";
            $result = $mysqli_query($conn, $sql);
            $authrow = $result->fetch_assoc();
            $custId = $authrow['custId']; 
            
            $_SESSION['custId'] = $custId;
            $showpopup='';
        }
        else{ //logging in fail
            $errorMsg = 'Invalid username or password';
            $showpopup = 'loginpopup';
            $inituser = $username;
            $initpw = $_POST['password'];
        }

    }
    else if($_POST['popuptype'] == 'signup'){
        $checkValidate = true;
        if ($_POST['password'] !== $_POST['confirmpw'] ){
            $errorMsg = 'Passwords do not match';
            $showpopup = 'signpopup';
            $checkValidate = false;
        }
        if(!isset($_POST['fullName']) || !isset($_POST['email']) || !isset($_POST['DOB']) || !isset($_POST['password'])){
            $errorMsg = 'Please fill in all fields';
            $showpopup = 'signpopup';
            $checkValidate = false;
        } 

        if(!$checkValidate){
            $initname = $_POST['fullName'];
            $inituser = $username;
            $initpw = $_POST['password'];
            $initemail = $_POST['email'];
            $initDOB= $_POST['DOB'];
            $initconfirmpw = $_POST['confirmpw'];
        }

        //signup account to database
        if($checkValidate){
            $email = $_POST['email'];
            $fullName = $_POST['fullName'];
            $DOB = $_POST['DOB'];

            $query = "INSERT INTO Account (username, password) 
                    VALUES ('$username', '$password')";
            $result = $conn->query($query);

            $queryn = "SELECT * from Account where username = '$username'";
            $result = mysqli_query($conn, $queryn);
            $userrow = $result->fetch_assoc();
            $accountId = $userrow['accountId'];

            $queryl = "INSERT INTO custdets(accountId, fullName, email, phoneNumber, DOB)
            VALUES ( $accountId, '$fullName', '$email', '' , '$DOB' )";
            $result = mysqli_query($conn, $query1);

            //register a session here
            $_SESSION['username'] = $username;    
            $_SESSION['accountId'] = $accountId;    

            $query = 'SELECT * from custdets '
            ."WHERE accountId='$accountId'";
            $result = mysqli_query($conn, $query);
            $userrow = $result->fetch_assoc();
            $custId = $userrow['custId']; 
            
            $_SESSION['custId'] = $custId;
            $showpopup='';
        }
        
    }
}
?>
