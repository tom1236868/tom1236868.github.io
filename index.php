<!DOCTYPE html>
<?php
session_start();

# These initilaize is For Test purpose onl
$ID2Email = array(
    'A123456789' => 'a123456789@mail.com',
    'B123456789' => 'b123456789@mail.com',
    'C123456789' => 'c123456789@mail.com',
    'D123456789' => 'd123456789@mail.com',
    'E123456789' => 'e123456789@mail.com',
    'F123456789' => 'f123456789@mail.com'
);

$ID2Name = array(
    'A123456789' => '楊廣正',
    'B123456789' => '吳致宜',
    'C123456789' => '李禹秀',
    'D123456789' => '黃芯瑜',
    'E123456789' => '韓夢汝',
    'F123456789' => '喬魯諾喬巴拿'
);

$ID2Age = array(
    'A123456789' => '37',
    'B123456789' => '44',
    'C123456789' => '38',
    'D123456789' => '26',
    'E123456789' => '30',
    'F123456789' => '15'
);

$_SESSION['Accounts_Email'] = $ID2Email;
$_SESSION['Accounts_Name'] = $ID2Name;
$_SESSION['Accounts_Age'] = $ID2Age;

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inno Dance - 報名比賽</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/innodanz_Brandmark.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
                                <?php
                                    if (isset($_SESSION['Username'])) {
                                        echo  '哈囉，' . $_SESSION['Username'];
                                    } else {
                                        echo  '功能';
                                    }
                                ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <?php
                                if (!isset($_SESSION['Username'])) {
                                    echo '<li><a class="dropdown-item" href="./signin.php">登入</a></li>';
                                    echo '<li><a class="dropdown-item" href="./reg.php">註冊</a></li>';
                                } else {
                                    //echo '<li><a class="dropdown-item" href="#">哈囉，' . $_SESSION['Username'] . '</a></li>';
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
                        <h1 class="display-5 fw-bolder text-white mb-2">你就是明日的舞壇之星</h1>
                        <p class="lead fw-normal text-white-50 mb-4">還在等待機會嗎？</p>
                        <p class="lead fw-normal text-white-50 mb-4">現在就報名各項頂尖賽事，讓你成為全場最亮眼的舞者！</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#contests">Get Started</a>
                        </div>
                    </div>
                    <div class='col-xl-5 align-items-center justify-content-end'>
                        <img src="assets/header.jpg" alt="Header image" id="pic" style="width:100%;background-color:#000000">
                    </div>
                </div>
            </div>
        </header>
        <!-- Blog preview section-->
        <section class="py-5" id="contests">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">報名中的賽事</h2>
                            <p class="lead fw-normal text-muted mb-5">各賽事資訊可藉由點擊來查閱</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="assets/CTC.png" alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">台北</div>
                                <a class="text-decoration-none link-dark stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#!">
                                    <h5 class="card-title mb-3">2022 CTC CUP 全國公開賽</h5>
                                </a>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">報名時間: 2022/6/13~2022/6/18</li>
                                    <li class="list-group-item">比賽時間: 2022/7/16</li>
                                    <li class="list-group-item">參賽形式: 單/雙人</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="assets/infinite_thin.jpg" alt="CTC CUP" />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">台北</div>
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">2022 樂雅無限盃</h5>
                                </a>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">報名時間: 2022/5/27~2022/7/15</li>
                                    <li class="list-group-item">比賽時間: 2022/7/24</li>
                                    <li class="list-group-item">參賽形式: 單/雙人</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="assets/fashin.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">台北</div>
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">2022 飛迅盃</h5>
                                </a>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">報名時間: 2022/6/13~2022/7/28</li>
                                    <li class="list-group-item">比賽時間: 2022/8/13</li>
                                    <li class="list-group-item">參賽形式: 單/雙人</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">2022 CTC CUP 全國公開賽</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">報名時間: 2022/6/13~2022/6/18</li>
                                <li class="list-group-item">比賽時間: 2022/7/16</li>
                                <li class="list-group-item">參賽形式: 單/雙人</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-xl ms-auto">
                                <p>成人組別: </p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">2022國家職業拉丁代表權選拔賽</li>
                                    <li class="list-group-item">職業公開組</li>
                                    <li class="list-group-item">職業50歲以上公開組</li>
                                    <li class="list-group-item">國內職業組</li>
                                    <li class="list-group-item">業餘公開組</li>
                                    <li class="list-group-item">國內業餘組</li>
                                    <li class="list-group-item">壯年公開組(35歲以上)</li>
                                    <li class="list-group-item">業餘新星組</li>
                                    <li class="list-group-item">新人組</li>
                                </ul>
                            </div>
                            <div class="col-xl ms-auto">
                                <p>青少年組別: </p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">18歲以下組</li>
                                    <li class="list-group-item">15歲以下組</li>
                                    <li class="list-group-item">12歲以下組</li>
                                    <li class="list-group-item">單人18歲以下A組</li>
                                    <li class="list-group-item">單人18歲以下B組</li>
                                    <li class="list-group-item">單人15歲以下組</li>
                                    <li class="list-group-item">單人12歲以下A組</li>
                                    <li class="list-group-item">單人12歲以下B組</li>
                                    <li class="list-group-item">單人9歲以下組</li>
                                </ul>
                            </div>
                            <div class="col-xl ms-auto">
                                <p>特殊組別: </p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">師生公開組</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <p>詳細資訊/規定: <a href="https://www.facebook.com/ctcdancesportchampionships/photos/pcb.1181837939267463/1184923045625619/" target="_blank">請點擊這裡</a></p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <form name="signup" method="post" action="./signup_preprocess.php">
                        <input type="hidden" name="competition" value="CTC">
                        <input type="submit" class="btn btn-primary" name="signup" value="報名">
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉視窗</button>
                </div>
            </div>
        </div>
    </div>

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
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>