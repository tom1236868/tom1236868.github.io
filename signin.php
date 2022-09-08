<!doctype html>
<html lang="en">

<?php
session_start();
if (isset($_SESSION['Username'])) {
  header('Location: index.php');
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Page</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="./css/login.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.9.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.9.2/firebase-auth.js"></script>
  <script src="./js/config.js"></script>
  <script src="./js/signin.js"></script>
</head>

<body class="text-center">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="assets/innodanz_Brandmark.png" style="width:42px;height:42px;"> InnoDance</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              功能
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <?php
              if (!isset($_SESSION['Username'])) {
                echo '<li><a class="dropdown-item" href="./signin.php">登入</a></li>';
                echo '<li><a class="dropdown-item" href="./reg.php">註冊</a></li>';
              } else {
                echo '<li><a class="dropdown-item" href="#">哈囉，' . $_SESSION['Username'] . '</a></li>';
                echo '<li><a class="dropdown-item" href="./logout.php">登出</a></li>';
              }
              ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9" id="leftinfo">
        <img src="./assets/login_left.jpg" alt="User Profile" id="pic">
      </div>
      <div class="col-md-3" id="loginscreen">
        <h3 id="title">登入</h3>
        <form id="signin" name="signin" method="post" action="./login_process.php">
          <div class="form-floating mb-3">
            <label for="inputID">身分證字號</label>
            <input type="text" class="form-control" name="inputID" id="inputID" placeholder="A123456789" required autofocus>
          </div>
          <div class="form-floating mb-3">
            <label for="inputEmail">電子郵件信箱</label>
            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="example@hotmail.com" required>
          </div>
          <button type="submit" class="btn btn-info" id="signin_button">登入</button>
        </form>
        <h6 id="other">還沒有帳號?</h6>
        <button type="button" class="btn btn-success" onclick="javascript:location.href='reg.php'">註冊</button>
        <h6 id="other">或者使用社群帳號登入</h6>
        <button type="button" class="btn btn text-dark" id="google"><img src="./assets/google.png" id="google_button"></button>
        <label for="google_button">Google</label>
        <br>
        <button type="button" class="btn btn text-dark" id="facebook"><img src="./assets/facebook.png" id="facebook_button"></button>
        <label for="facebook_button">Facebook</label>
      </div>
    </div>
  </div>
  <div id="custom-alert">
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>