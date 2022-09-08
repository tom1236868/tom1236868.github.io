<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header('Location: index.php');
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inno Dance - 報名比賽 - 2022 CTC CUP 全國錦標賽</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/innodanz_Brandmark.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
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
        <!-- Header-->
        <header>
            <div class="container-fluid" style="background-color:#000000">
                <div class="row align-items-center">
                    <div class="col-xl-7 my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">2022 CTC CUP 全國公開賽</h1>
                        <p class="lead fw-normal text-white mb-4">報名時間: 2022/6/13~2022/6/18</p>
                        <p class="lead fw-normal text-white mb-4">比賽時間: 2022/7/16</p>
                    </div>
                    <div class='col-xl-5 align-items-center justify-content-center'>
                        <img src="assets/CTC_Header.jpg" alt="Header image" id="pic" style="width:100%;background-color:#000000">
                    </div>
                </div>
            </div>
        </header>

        <section>
            <div class="container-fluid" style="background-color:#FFFFFF">
                <div class="row align-items-center">
                    <div class="col align-items-center">
                        <h1 class="display-5 fw-bolder mb-2">請選擇報名方式</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <figure class="figure">
                            <a href="./signup_single.php"><img class="figure-img img-fluid rounded" src="assets/single.png" style="width:300px;height:300px;"></a>
                            <figcaption class="figure-caption text-end">單人報名</figcaption>
                        </figure>
                    </div>
                    <div class="col-lg-6">
                        <figure class="figure">
                            <a href="./signup_couple.php"><img class="figure-img img-fluid rounded" src="assets/couple.png" style="width:400px;height:300px;"></a>
                            <figcaption class="figure-caption text-end">雙人報名</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; InnoDance 2022</div>
                </div>
                <!--
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                    -->
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>