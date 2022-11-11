<?php
    include 'php/connectdb.php';
    include 'php/auth.php';
    $mysqli ->close();
?>

<nav>
    <div class="navcontainer">
    <div class="hamburger-menu-wrapper">
                <nav role="navigation">
                    <div id="menuToggle">
                      
                           
                      <span></span>
                      <span></span>
                      <span></span>
                      
                      <ul id="menu">
                        <a href="index.php"><li>Home</li></a>
                        <a href="#"><li>About</li></a>
                        <br>
                        <li style="color:black;"><bold>CATEGORIES</bold></li>
                        <a href="categories.php?productCategory=backpack"><li>Backpack</li></a>
                        <a href="categories.php?productCategory=totebag"><li>Tote Bag</li></a>
                        <a href="categories.php?productCategory=handbag"><li>Handbag</li></a>
                        <a href="categories.php?productCategory=waistbag"><li>Waist Bag</li></a>
                        <a href="categories.php?productCategory=wallet"><li>Wallet</li></a>
                        <a href="categories.php?productCategory=luggage"><li>Luggage</li></a>
                      </ul>
                    </div>
                  </nav>
            </div>

            <div class="header-logowrapper">
                <a class="header-logo" href="index.php">
                    <img src="assets/logo1.png" alt="Cat Out of the Bag Logo">
                </a>
            </div>
        <div class="navright">
            <div class="cart">
                <a href="cart.php">
                    <img src="assets/icon/shoppingcart.png" />
                    <div>&nbsp;</div>
                </a>
            </div>
            <div class="user">
                <a href="#" id="userbtn">
                    <img src="assets/icon/user.png" />
                    <div>
                        <!-- check if user logged in or not -->
                        <?php 
                            if (isset($_SESSION['username'])) //if the username is set and session started, get username for display
                                echo $_SESSION['username'];
                            else
                                echo 'User' //if not set to just User
                        ?>
                    </div>
                </a>
                <div id="userdropdown" style="height: 0;>
                        <!-- if no user logged in, show login and signup dropdown.
                            if user is logged in, show logout dropdown-->
                        <?php 
                            if (!isset($_SESSION['username'])){
                                echo '
			<ul>
                                <li data-target="loginpopup" class="openpopup">Login <hr/></li>
                                <li data-target="signpopup" class="openpopup">Sign up</li>
                                ';
                            }
                            else {
                                echo '
                                    <li> <a href="php/logout.php" style="color: #ede1d5;">Logout</a></li>
                                ';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="loginpopup" class="loginpopup popup">
        <div class="popup-content">
            <span class="closepopup">X</span>
            <div class="popup-body">
                <h1>Login</h1>
                <form method="POST" onsubmit="return setLogin()">
                    <div class="inputfield">
                        <input 
                            type="text" 
                            name="username"
                            placeholder="Username"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'login' ? $inituser : '' ?>"
                        /> <!-- if type is set and is equal to login (user click on login). if true then set username to what was last saved (from auth) -->
                    </div>
                    <div class="inputfield">
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Password"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'login' ? $initpw : '' ?>"
                        /> <!-- if the popup type is set and the type is login, let value be the initial password that user used to sign up that. if it is false, then set password to nothing -->
                    </div>
                    <input type="hidden" name="popuptype" value="login"/>
                    <div class="errormsg"><?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'login' ? $errorMsg : '' ?></div>
                    <button class="sign-in-btn">Sign In</button>
                </form>
                <p>Don't have an account? Register <span class="sign-in-sign-up-link" 
                    onclick="activatePopup('signpopup')"
                >here</span></p>
            </div>
        </div>
    </div>


    <div id="signpopup" class="signpopup popup">
       
        <div class="popup-content">
            <span class="closepopup">X</span>
            <div class="popup-body">
                <h1>Sign Up</h1>
                <form method="POST" onsubmit="return setSignup()">
                    <div class="inputfield">
                        <input 
                            type="text" 
                            name="fullName"
                            placeholder="Full Name"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'signup' ? $initname : '' ?>"
                        />
                    </div>
                    <div class="inputfield">
                        <input 
                            type="email" 
                            name="email"
                            placeholder="Email"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'signup' ?  $initemail : '' ?>"
                        />
                    </div>
                    <div class="inputfield">
                        <input 
                            type="text" 
                            name="username"
                            placeholder="Username"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'signup' ?  $inituser : '' ?>"
                        />
                    </div>
                    <div class="inputfield">
                        <input 
                            type="date" 
                            name="DOB"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'signup' ? $initDOB : '' ?>"
                        />
                    </div>
                    <div class="inputfield">
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Password"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'signup' ? $initpw : '' ?>"
                        />
                    </div>
                    <div class="inputfield">
                        <input 
                            type="password" 
                            name="confirmpw"
                            placeholder="Confirm Password"
                            required
                            value="<?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'signup' ? $initconfirmpw : '' ?>"
<!-- check if the pop up type is set and set to signup. if true, then set the confirmed pw to what user typed in confirm pw. if false, set to nothing -->
                        />
                    </div>
                    <input name="popuptype" value="signup" type="hidden"/>
                    <div class="errormsg"><?php echo isset($_GET['popuptype']) && $_GET['popuptype'] == 'signup' ? $errorMsg : '' ?></div>
<!-- check if the type is set and if it is, then check if it is the signup type. if true, set the error msg. if false, then show nothing  -->
                    <button class="sign-up-btn">Sign Up</button>
                </form>
                <p>Already have an account? <span class="sign-in-sign-up-link" onclick="activatePopup('loginpopup')">Log in here</span></p>
            </div>
        </div>
    </div>
    
    <script src="js/popup.js"></script>
    <script src="js/nav.js"></script>
    <?php 
        if($showpopup == 'loginpopup')
            echo '<script> activatePopup("loginpopup") </script>';
        else if($showpopup == 'signpopup')
            echo '<script> activatePopup("signpopup") </script>';
    ?>
    <script src="js/validateForm.js"></script>
    <script>
    function setLogin(){
        var loginform = document.getElementsByClassName('.loginpopup')
        var username =loginform.getElementsbyName('input[name="username"]').value
        var password = loginform.getElementsbyName('input[name="password"]').value
        var error = loginform.getElementsByClassName('.errormsg')

        let checkValidate = loginVal({
            username, password, error
        })
        return checkValidate
    }

    function setSignup(){
        var signupform = document.getElementsByClassName('.signpopup')
        var fullName = signupform.getElementsbyName('input[name="fullName"]').value
        var username = signupform.getElementsbyName('input[name="username"]').value
        var email = signupform.getElementsbyName('input[name="email"]').value
        var DOB = signupform.getElementsbyName('input[name="DOB"]').value
        var password = signupform.getElementsbyName('input[name="password"]').value
   var confirmpw = signupform.getElementsbyName('input[name="confirmpw"]').value

        var error = signupform.getElementsByClassName('.errormsg')

        let checkValidate = signVal({fullName, email, username, DOB, password, confirmpw, error})
        console.log('checkValidate', checkValidate)
        return checkValidate
    }
    </script>
</nav>
