<?php
session_start();
session_unset();
session_destroy();
header("Location: login.html");
exit();
?>

<meta name="author" content="Almir Maksuti">
