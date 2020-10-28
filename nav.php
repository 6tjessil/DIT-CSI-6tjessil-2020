<!--Nav code when user is signed in-->
<?php
if(session_id() == ''){session_start();}
if(isset($_SESSION['login_user'])){?>
            <nav>
            <div class = "logo">
                    <h2><a href="index.php">VIBES</a></h2>
            </div>
            <div class="mainlinks"> <!--Links-->
                <li><a href="index.php">Home</a></li>
                <li><a href="your_library.php">Your Library</a></li>
                <li><a href="#" id="themebtn">Dark</a></li>
                <div class="dropdown">
                    <button class="dropbtn">Hi <?php echo $_SESSION['login_user']; ?></button><!--Echo username in nav bar-->
                    <div class="dropdown-content"><!--If Graham is logged in show the settings option, else don't show option-->
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
    <div class = "logo">
        <h2><a href="index.php">VIBES</a></h2>
    </div>
    <div class="mainlinks"> <!--Links-->
        <li><a href="index.php">Home</a></li>
        <li><a href="#" id="themebtn">Theme</a></li>
        <li><a href="#" id = "loginbtn">Login</a></li>
        <li><a href="#" id = "signupbtn">Sign Up</a></li>
    </div>
</nav>
<?php } ?>

