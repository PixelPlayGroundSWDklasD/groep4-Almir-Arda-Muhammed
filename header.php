<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <a href="index.php" class="logo">
        <img src="img/nova-high-resolution-logo-transparent.png" width="100px" height="100px">   
    </a>
 
    <ul class="navlist">
        <li><a href="login.html">Log in</a></li>
        <li><a href="games.php">Games</a></li>
        <li><a href="profile.php">Profile</a></li>
    </ul>
 
    <div class="h-right">
        <a href="register.php">Register</a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</header>