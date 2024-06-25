<meta name="description" content="">
    <meta name="author" content="Arda Ilhan">
    <meta name="keywords" content="">
    <title>PixelPlayGround</title>
    <title>Nova Gaming</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
    <?php
      include 'header.php';
      ?>
       <main>
       
        <div class="wrapper">
    <form action="">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Dont have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>
</main>
<?php
        include 'footer.php';
        ?>

    <script src="https://unpkg.com/scrollreveal"></script>    

    <script src="js/app.js"></script>     
    
    
</body>
</html>
<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$database = "pixelplaygroundd";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $wachtwoord = $_POST['wachtwoord'];

    
    $sql = "SELECT * FROM gebruikerss WHERE gebruikers = '$userid' AND wachtwoord = '$wachtwoord'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        
        $user = $result->fetch_assoc();

        
        $_SESSION['userid'] = $user['gebruikers']; 
        header("Location: index.php");
        exit();
    } else {
        $errorMessage = 'Invalid username or password.';
    }
}

$conn->close();
?>