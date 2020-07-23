<!--Nav code when user is signed in-->
<?php 
if(session_id() == ''){session_start();}
if(isset($_SESSION['login_user'])){?>
    <nav>
    <div class="mainlinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="form.php">Contact</a></li>
        <li><a href="your_library.php">Your Library</a></li>
        <div class="dropdown">
            <button class="dropbtn">Account</button>
            <div class="dropdown-content">
                <a href="settings.php">Settings</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav><?php
} else{?>
    <!--Nav code when user is not signed in-->
<nav>
    <div class="mainlinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="form.php">Contact</a></li>
        <li><button onclick="document.getElementById('id01').style.display='block'">Login</button></li>
    </div>
</nav><?php
}?>
