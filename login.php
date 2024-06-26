@ -1,85 +1,81 @@
<?php include 'lib/connection.php';?>
<html lang="nl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="arda ilhan, almir maksuti">
    <meta name="keywords" content="">
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
    <form action="login.php" method = "POST">
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
session_start();

    <script src="https://unpkg.com/scrollreveal"></script>    
include 'lib/connection.php';

    <script src="js/app.js"></script>     
    
    
</body>
</html>
<?php
session_start(); 
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $wachtwoord = $_POST['wachtwoord'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userid'];
    $password = $_POST['wachtwoord'];

    
    $sql = "SELECT * FROM gebruikerss WHERE gebruikers = '$userid' AND wachtwoord = '$wachtwoord'";
    $result = $conn->query($sql);
    $sql = "SELECT Id, wachtwoord FROM gebruikerss WHERE gebruikers = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Fout bij voorbereiden van de query: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    if (!mysqli_stmt_execute($stmt)) {
        die("Fout bij uitvoeren van de query: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_store_result($stmt);

    if ($result->num_rows === 1) {
        
        $user = $result->fetch_assoc();
    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $user_id, $plain_password);
        mysqli_stmt_fetch($stmt);

        
        $_SESSION['userid'] = $user['gebruikers']; 
        header("Location: index.php");
        exit();
        if ($password === $plain_password) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            $errorMessage = "Ongeldig wachtwoord.";
        }
    } else {
        $errorMessage = 'Invalid username or password.';
        $errorMessage = "Geen gebruiker gevonden met deze gebruikersnaam.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="wrapper">
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <?php if (!empty($errorMessage)) : ?>
                <p><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="text" placeholder="Username" id="userid" name="userid" required><br>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="wachtwoord" name="wachtwoord" required><br>
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

?>
    <?php include 'footer.php'; ?>
</body>
</html>