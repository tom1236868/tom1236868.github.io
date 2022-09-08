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

<body class="d-flex flex-column h-100" onload="CheckDisable()">
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
        <section class="py-5" id="player">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">報名中的組別</h2>
                            <?php echo '<div id="hidden_age" class="invisible">' . $_SESSION['Age'] . '</div>'; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-5 my-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <?php echo '<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true">' . $_SESSION['Username'] . '</button>'; ?>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="home-tab">
                        <section class="py-5" id="contests">
                            <!--
                                <div class="row">
                                    <div class="col-lg">
                                        <h2 class="fw-bolder">成人組別</h2>
                                        <div id="Adults">
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-1" autocomplete="off" data-professional="1" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-1">2022國家職業拉丁代表權選拔賽</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-2" autocomplete="off" data-professional="1" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-2">職業公開組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-3" autocomplete="off" data-professional="1" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-3">職業50歲以上公開組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-4" autocomplete="off" data-professional="1" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-4">國內職業組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-5" autocomplete="off" data-professional="0" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-5">業餘公開組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-6" autocomplete="off" data-professional="0" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-6">國內業餘組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-7" autocomplete="off" data-professional="0" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-7">壯年公開組(35歲以上)</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-8" autocomplete="off" data-professional="0" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-8">業餘新星組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-9" autocomplete="off" data-professional="0" onchange="HandleProfessionalAmateur(this);">
                                            <label class="btn btn-primary my-3" for="btn-check-outlined-9">新人組</label>
                                        </div>
                                    </div>
                                </div>
                                -->
                            <div class="row">
                                <div class="col-lg">
                                    <h2 class="fw-bolder">青少年組別</h2>
                                    <div id="Teens">
                                        <!--
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-10" autocomplete="off">
                                            <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-10">18歲以下組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-11" autocomplete="off">
                                            <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-11">15歲以下組</label>
                                            <input type="checkbox" class="btn-check" id="btn-check-outlined-12" autocomplete="off">
                                            <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-12">12歲以下組</label>
                                            -->
                                        <input type="checkbox" class="btn-check" id="btn-check-outlined-13" autocomplete="off" data-age="18" onchange="HandleTeens(this);">
                                        <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-13">單人18歲以下A組</label>
                                        <input type="checkbox" class="btn-check" id="btn-check-outlined-14" autocomplete="off" data-age="18" onchange="HandleTeens(this);">
                                        <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-14">單人18歲以下B組</label>
                                        <input type="checkbox" class="btn-check" id="btn-check-outlined-15" autocomplete="off" data-age="15" onchange="HandleTeens(this);">
                                        <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-15">單人15歲以下</label>
                                        <input type="checkbox" class="btn-check" id="btn-check-outlined-16" autocomplete="off" data-age="12" onchange="HandleTeens(this);">
                                        <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-16">單人12歲以下A組</label>
                                        <input type="checkbox" class="btn-check" id="btn-check-outlined-17" autocomplete="off" data-age="12" onchange="HandleTeens(this);">
                                        <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-17">單人12歲以下B組</label>
                                        <input type="checkbox" class="btn-check" id="btn-check-outlined-18" autocomplete="off" data-age="9" onchange="HandleTeens(this);">
                                        <label class="btn btn-outline-primary  my-3" for="btn-check-outlined-18">單人9歲以下組</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <h2 class="fw-bolder">特殊組別</h2>
                                    <input type="checkbox" class="btn-check" id="btn-check-outlined-19" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btn-check-outlined-19">師生公開組</label>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </section>>
        <!-- Blog preview section-->

        <div class="row m-5 gx-5 justify-content-center">
            <h1>總報名費: </h1>
            <h2 class="fw-bolder" id="fee" style="color:red">0</h2>
        </div>
        <div class="row m-5 gx-5 justify-content-center">
            <div class="col-lg">
                <a href="#link" class="btn btn-primary" role="button">報名</a>
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
                    <a href="#link" class="btn btn-primary" role="button">報名</a>
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
    <!-- Fee Calculattion JS-->>
    <script src="js/signup.js"></script>
</body>

</html>