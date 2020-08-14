<!--Nav code when user is signed in-->
<?php
if(session_id() == ''){session_start();}
if(isset($_SESSION['login_user'])){?>
            <nav>
            <div class="mainlinks">
                <li><a href="index.php">Home</a></li>
                <li><a href="your_library.php">Your Library</a></li>
                <li><a href="form.php">Contact</a></li>
                <div class="dropdown">
                    <button class="dropbtn">Hi <?php echo $_SESSION['login_user']; ?></button>
                    <div class="dropdown-content">
                        <?php 
                        if ($_SESSION["login_user"] == "Graham"){
                            echo"<a href='settings.php'>Settings</a>";
                        }
                        echo "<a href='logout.php'>Logout</a>";?>
                    </div>
                </div>
            </div>
        </nav> 
        
    <!--Nav code when user is not signed in-->
                        <?php }else{

                        
                        ?>
<nav>
    <div class="mainlinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="form.php">Contact</a></li>
        <li><a href="#" id = "loginbtn">Login</a></li>
        <li><a href="#" id = "signupbtn">Sign Up</a></li>
    </div>
</nav>
<?php } ?>


<!--<div class = "theme-switch-wrapper">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
        </label>
    </div>-->
