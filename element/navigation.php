<?php
    include 'php/connectdb.php';
    include 'php/auth.php';
    mysqli_close($conn);
?>

<nav>
    <div class="nav-content">
    <div class="hamburger-menu-wrapper">
                <nav role="navigation">
                    <div id="menuToggle">
                      
                      <input type="checkbox"/> <!--Hidden checkbox is used as click reciever, to use the :checked selector on it. -->
        
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
        <div class="right-content">
            <div class="cart">
                <a href="cart.php">
                    <img src="assets/icon/shoppingcart.png" />
                    <div>&nbsp;</div>
                </a>
            </div>
            <div class="account">
                <a href="#" class="account-btn">
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
                <div class="account-dropdown" style="height: 0; padding: 0;">
                    <ul>
                        <!-- if no user logged in, show login and signup dropdown.
                            if user is logged in, show logout dropdown-->
                        <?php 
                            if (!isset($_SESSION['username'])){
                                echo '
                                <li class="popup-open-btn" data-target="loginpopup">Login <hr/></li>
                                <li class="popup-open-btn" data-target="signpopup">Sign up</li>
                                ';
                            }
                            else {
                                echo '
                                    <li style="cursor: pointer;"> <a href="php/logout.php" style="color: #ede1d5;">Logout</a></li>
                                ';
                            }
                        ?>
                    <ul>
                </div>
            </div>
        </div>
    </div>

    <div id="loginpopup" class="loginpopup popup">
        <div class="popup-content">
            <span class="close">X</span>
            <div class="popup-body">
                <h1>Login</h1>
                <form method="POST" onsubmit="return setLogin()">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="username"
                            placeholder="Username"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'login' ? $prev_username : '' ?>"
                        /> <!-- if type is set and is equal to login (user click on login). if true then set username to what was last saved (from auth) -->
                    </div>
                    <div class="input-group">
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Password"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'login' ? $prev_password : '' ?>"
                        />
                    </div>
                    <input type="hidden" name="type" value="login"/>
                    <div class="error-message"><?php echo isset($_POST['type']) && $_POST['type'] == 'login' ? $errorMessage : '' ?></div>
                    <button class="sign-in-btn">Sign In</button>
                </form>
                <small>Don't have an account? Register <span class="sign-in-sign-up-link" 
                    onclick="activatePopup('signpopup')"
                >here</span></small>
            </div>
        </div>
    </div>



    <div id="signpopup" class="signpopup popup">
       
        <div class="popup-content">
            <span class="close">X</span>
            <div class="popup-body">
                <h1>Sign Up</h1>
                <form method="POST" onsubmit="return setSignup()">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="fullName"
                            placeholder="Full Name"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_fullName : '' ?>"
                        />
                    </div>
                    <div class="input-group">
                        <input 
                            type="email" 
                            name="email"
                            placeholder="Email"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ?  $prev_email : '' ?>"
                        />
                    </div>
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="username"
                            placeholder="Username"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ?  $prev_username : '' ?>"
                        />
                    </div>
                    <div class="input-group">
                        <input 
                            type="date" 
                            name="dateOfBirth"
                            placeholder="Date of Birth"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_dateOfBirth : '' ?>"
                        />
                    </div>
                    <div class="input-group">
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Password"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_password : '' ?>"
                        />
                    </div>
                    <div class="input-group">
                        <input 
                            type="password" 
                            name="confirmPassword"
                            placeholder="Confirm Password"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_confirmPassword : '' ?>"
                        />
                    </div>
                    <input type="hidden" name="type" value="signup"/>
                    <div class="error-message"><?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $errorMessage : '' ?></div>
                    <button class="sign-up-btn">Sign Up</button>
                </form>
                <small>Already have an account? <span class="sign-in-sign-up-link" onclick="activatePopup('loginpopup')">Sign In here</span></small>
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
        var form = document.querySelector('.loginpopup form')
        var username = form.querySelector('input[name="username"]').value
        var password = form.querySelector('input[name="password"]').value
        var error = form.querySelector('.error-message')

        let isValidated = loginVal({
            username, password, error
        })
        return isValidated
    }

    function setSignup(){
        var form = document.querySelector('.signpopup form')
        var fullName = form.querySelector('input[name="fullName"]').value
        var username = form.querySelector('input[name="username"]').value
        var password = form.querySelector('input[name="password"]').value
        var email = form.querySelector('input[name="email"]').value
        var dateOfBirth = form.querySelector('input[name="dateOfBirth"]').value
        var confirmPassword = form.querySelector('input[name="confirmPassword"]').value

        var error = form.querySelector('.error-message')

        let isValidated = signVal({fullName, email, username, dateOfBirth, password, confirmPassword, error})
        console.log('isValidated', isValidated)
        return isValidated
    }
    </script>
</nav>