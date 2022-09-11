<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign up now!</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="./css/regist.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    

    <script src="./js/reg.js"></script>
</head>

<body class="text-center" background="./assets/register.jpg">
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
                            session_start();
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
    <div class="jumbotron" id="signup_screen">
        <form id="regist" name="regist" method="post" action="./reg_process.php">
            <h3 id="title">現在就加入 Inno Danz!</h3>
            <p class="text-muted">加入 Inno Danz ， 讓報名更簡單</p>
            <br>
            <div class="mb-3 text-left">
                <label for="inputUsername" class="form-label">姓名:</label>
                <input type="text" name="Username" id="inputUsername" class="form-control" placeholder="史蒂夫" required autofocus>
            </div>
            <div class="mb-3 text-left">
                <label for="inputID" class="form-label">身分證字號:</label>
                <input type="text" name="ID" id="inputID" class="form-control" placeholder="A123456789" required autofocus>
            </div>
            <div class="mb-3 text-left">
                <label for="inputEmail" class="form-label">電子郵件帳戶:</label>
                <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="example@hotmail.com" required>
            </div>
            <div class="mb-3 text-left">
                <label for="inputage" class="form-label">生日:</label>
                <input type="date" name="birthday" id="inputbirthday" class="form-control" placeholder="1987/11/23" required>
            </div>
            <div class="mb-3 text-left">
                <p class="text-left">性別:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Sex" id="inputSex1" value="male">
                    <label class="form-check-label" for="inputSex1">
                        男
                    </label>
                    <br>
                    <input class="form-check-input" type="radio" name="Sex" id="inputSex2" value="female" checked>
                    <label class="form-check-label" for="inputSex2">
                        女
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-info" id="signup_button">註冊</button>
        </form>
    </div>
    <div id="custom-alert">
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>