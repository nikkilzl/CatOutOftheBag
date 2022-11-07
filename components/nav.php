<?php
    include 'php/connect.php';
    include 'php/auth.php';
    $conn->close();
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
                        <a href="category.php?productCategory=backpack"><li>Backpack</li></a>
                        <a href="category.php?productCategory=totebag"><li>Tote Bag</li></a>
                        <a href="category.php?productCategory=handbag"><li>Handbag</li></a>
                        <a href="category.php?productCategory=waistbag"><li>Waist Bag</li></a>
                        <a href="category.php?productCategory=wallet"><li>Wallet</li></a>
                        <a href="category.php?productCategory=luggage"><li>Luggage</li></a>
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
                <a href="shoppingCart.php">
                    <img src="assets/icon/shoppingcart.png" alt="cart"/>
                    <div>Cart</div>
                </a>
            </div>
            <div class="account">
                <a href="#" class="account-btn">
                    <img src="assets/icon/user.png" alt="account"/>
                    <div>
                        <!-- check if user logged in or not -->
                        <?php 
                            if (isset($_SESSION['username']))
                                echo $_SESSION['username'];
                            else
                                echo 'Account'
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
                                <li class="modal-open-btn" data-target="login-modal">Login <hr/></li>
                                <li class="modal-open-btn" data-target="signup-modal">Signup</li>
                                ';
                            }
                            else {
                                echo '
                                    <li style="margin-top:12px; cursor: pointer;"> <a href="php/logout.php" style="color: #ede1d5;">Logout</a></li>
                                ';
                            }
                        ?>
                    <ul>
                </div>
            </div>
        </div>
    </div>

    <!-- login Modal -->
    <div id="login-modal" class="login-modal modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span> <!-- use multiplication sign for x button-->
            <div class="modal-body">
                <h1>Login</h1>
                <form method="POST" onsubmit="return handleSubmitLogin()">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="username"
                            placeholder="Username"
                            required
                            value="<?php echo isset($_POST['type']) && $_POST['type'] == 'login' ? $prev_username : '' ?>"
                        />
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
                    onclick="triggerModalById('signup-modal')"
                >here</span></small>
            </div>
        </div>
    </div>


    <!-- signup Modal -->
    <div id="signup-modal" class="signup-modal modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <h1>Sign Up</h1>
                <form method="POST" onsubmit="return handleSubmitSignup()">
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
                <small>Already have an account? <span class="sign-in-sign-up-link" onclick="triggerModalById('login-modal')">Sign In here</span></small>
            </div>
        </div>
    </div>
    
    <script src="js/modal.js"></script>
    <script src="js/nav.js"></script>
    <?php 
        if($showModal == 'login-modal')
            echo '<script> triggerModalById("login-modal") </script>';
        else if($showModal == 'signup-modal')
            echo '<script> triggerModalById("signup-modal") </script>';
    ?>
    <script src="js/validateForm.js"></script>
    <script>
    function handleSubmitLogin(){
        let form = document.querySelector('.login-modal form')
        let username = form.querySelector('input[name="username"]').value
        let password = form.querySelector('input[name="password"]').value
        let errorDom = form.querySelector('.error-message')

        let isValidated = validateLogin({
            username, password, errorDom
        })
        return isValidated
    }

    function handleSubmitSignup(){
        let form = document.querySelector('.signup-modal form')
        let fullName = form.querySelector('input[name="fullName"]').value
        let username = form.querySelector('input[name="username"]').value
        let password = form.querySelector('input[name="password"]').value
        let email = form.querySelector('input[name="email"]').value
        let dateOfBirth = form.querySelector('input[name="dateOfBirth"]').value
        let confirmPassword = form.querySelector('input[name="confirmPassword"]').value

        let errorDom = form.querySelector('.error-message')

        let isValidated = validateSignup({fullName, email, username, dateOfBirth, password, confirmPassword, errorDom})
        console.log('isValidated', isValidated)
        return isValidated
    }
    </script>
</nav>