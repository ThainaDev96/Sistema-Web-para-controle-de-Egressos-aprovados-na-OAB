<?php
require("verifica_login.php");
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Gestão de Egressos OAB - Faculdade Dom Bosco </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
     <!-- NAVBAR TOP START -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index.php">
                            <img class="img-fluid" src="..\files\assets\images\logo.png" alt="Theme-Logo"width="180">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="..\files\assets\images\avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                        <?php 
                                        echo $_SESSION['nomeUsuario'] ?? 'Usuário'; 
                                        ?>
                                    </span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="#!">
                                            <i class="feather icon-settings"></i> Configurações
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cadastro_admin.php">
                                            <i class="feather icon-user"></i> Cadastre-se
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php">
                                            <i class="feather icon-log-out"></i> Sair
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>        
        <!-- NAVBAR TOP END -->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <!-- SIDEBAR START -->
                 <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel">Navegação</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded">
                                <a href="index.php">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <div class="pcoded-navigatio-lavel">CADASTROS</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                    <span class="pcoded-mtext">Alunos</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="lista_de_alunos.php">
                                            <span class="pcoded-mtext">Listar</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="cadastro_de_alunos.php">
                                            <span class="pcoded-mtext">Cadastrar</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="upload_de_arquivos.php">
                                            <span class="pcoded-mtext">Importar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="pcoded-navigatio-lavel">DOCUMENTOS</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                    <span class="pcoded-mtext">Documentos</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="listar_documentos.php">
                                            <span class="pcoded-mtext">Listar documentos</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="documentos_pendentes.php">
                                            <span class="pcoded-mtext">Documentos pendentes</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <div class="pcoded-navigatio-lavel">COMUNICAÇÃO</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                    <span class="pcoded-mtext">Comunicação</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="controle_de_egressos.php">
                                            <span class="pcoded-mtext">Controle de egressos</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="enviar_comunicado.php">
                                            <span class="pcoded-mtext">Enviar comunicado</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <div class="pcoded-navigatio-lavel">ATIVIDADES</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class=" ">
                                <a href="historico.php">
                                    <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                    <span class="pcoded-mtext">Logs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- SIDEBAR END -->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                             <?php
                                             // Conexão com o banco
                                            include 'conexao.php'; 
                                            $resultTotal = $conn->query("SELECT COUNT(*) AS total FROM alunos");
                                            $totalAlunosBanco = $resultTotal->fetch_assoc()['total'] ?? 0;
                                            ?>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-yellow f-w-600"><?php echo $totalAlunosBanco; ?></h4>
                                                                <h6 class="text-muted m-b-0">Total de alunos cadastrados</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-bar-chart f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-yellow">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="feather icon-trending-up text-white f-16"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            include 'conexao.php'; 
                                            $resultAprovados = $conn->query("SELECT COUNT(*) AS total FROM alunos WHERE aprovado_oab = 's'");
                                            $totalAprovados = $resultAprovados->fetch_assoc()['total'] ?? 0;
                                            ?>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green f-w-600"><?php echo $totalAprovados; ?></h4>
                                                                <h6 class="text-muted m-b-0">Aprovados na OAB</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-file-text f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">  
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="feather icon-trending-up text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-pink f-w-600">120</h4>
                                                                <h6 class="text-muted m-b-0">Reprovados na OAB</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-calendar f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-pink">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="feather icon-trending-up text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <?php
                                            $resultPendentes = $conn->query("SELECT COUNT(*) AS total FROM alunos WHERE doc_oab IS NULL OR TRIM(doc_oab) = ''");
                                            $totalPendentes = $resultPendentes->fetch_assoc()['total'] ?? 0;
                                            ?>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-blue f-w-600"><?php echo $totalPendentes?></h4>
                                                                <h6 class="text-muted m-b-0">Documentos pendentes</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="feather icon-download f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="feather icon-trending-up text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- task, page, download counter  end -->

                                            <div class="col-xl-9 col-md-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Relatórios</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <canvas id="newuserchart" height="400"></canvas>
                                                    </div>
                                                    <div class="card-footer ">
                                                        <div class="row text-center b-t-default">
                                                            <div class="col-4 b-r-default m-t-15">
                                                                <h5><?php echo $totalAlunosBanco; ?></h5>
                                                                <p class="text-muted m-b-0">Total de Alunos</p>
                                                            </div>
                                                            <div class="col-4 b-r-default m-t-15">
                                                                <h5><?php echo $totalAprovados?></h5>
                                                                <p class="text-muted m-b-0">Aprovados na OAB</p>
                                                            </div>
                                                            <div class="col-4 m-t-15">
                                                                <h5><?php echo $totalPendentes?></h5>
                                                                <p class="text-muted m-b-0">Documentos pendentes</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <!-- sale end -->

                                           
                                            <!----> 
                                        </div>
                                    </div>
                                </div>

                                <div id="styleSelector">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="..\files\bower_components\chart.js\js\Chart.js"></script>
    <!-- amchart js -->
    <script src="..\files\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="..\files\assets\pages\widget\amchart\serial.js"></script>
    <script src="..\files\assets\pages\widget\amchart\light.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="..\files\assets\js\SmoothScroll.js"></script>
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script>
        var cadastros = <?php echo $totalAlunosBanco; ?>;
        var cor_cadastros = "#FF5330";
        var label_cadastros = "Total cadastros (<?php echo $totalAlunosBanco; ?>)";
        var aprovados = <?php echo $totalAprovados; ?>;
        var cor_aprovados = "#00D86F";
        var label_aprovados = "Aprovados (<?php echo $totalAprovados; ?>)";
        var docs = <?php echo $totalPendentes?>;
        var cor_docs = "#00C5D1";
        var label_docs = "Documentos pendentes (<?php echo $totalPendentes?>)";
    </script>
    <script type="text/javascript" src="..\files\assets\pages\dashboard\analytic-dashboard.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\script.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');


</script>
</body>

</html>
