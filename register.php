<!DOCTYPE html>

<html lang="nl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Almir Maksuti">
    <meta name="keywords" content="">
    <title>PixelPlayGround</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>

        <header>
            <a href="index.html" class="logo">
                <img src="img/nova-high-resolution-logo-transparent.png"  width="100px" height="100px">   
            </a>

            <ul class="navlist">
                <li><a href="login.php">Log in</a></li>
                <li><a href="#">Games</a></li>
                <li><a href="#">Profile</a></li>
            </ul>

            <div class="h-right">
                <a href="register.php">Register</a>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </header>
        <div class="wrapper">
    <form action="">
      <h1>Register</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <button type="submit" class="btn">Register</button>
    </form>
  </div>

        <footer>
            <div class="footerContainer">
                <div class="socialIcons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-google-plus"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="footerBottom">
                <p>Copyright &copy;2024; Designed by <span class="designer">Nova</span></p>
            </div>
        </footer>

    <script src="https://unpkg.com/scrollreveal"></script>    

    <script src="js/app.js"></script>     
    
    
</body>

</html>
