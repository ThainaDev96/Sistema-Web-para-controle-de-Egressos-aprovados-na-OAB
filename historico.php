<?php
require("verifica_login.php");
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
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
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
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Histórico de ações</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Basic Form Inputs card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Registro de logs</h5>
                                                   

                                                    <div class="card-header-right">
                                                        <i class="icofont icofont-spinner-alt-5"></i>
                                                    </div>

                                                </div>
                                                <div class="card-block">
                                                    <div class="table-responsive dt-responsive">
                                                        <table id="TabelaListaAlunos" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>Data e Hora</th>
                                                                    <th>Matricula</th>
                                                                    <th>Aluno</th>
                                                                    <th>Documento</th>
                                                                    <th>Ação</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                include 'conexao.php';

                                                                $sql = "SELECT * FROM logs ORDER BY data_hora DESC";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    while($row = $result->fetch_assoc()) {
                                                                        echo "<tr>";
                                                                        echo "<td>" . date('d/m/Y H:i', strtotime($row['data_hora'])) . "</td>";
                                                                        echo "<td>" . $row['matricula'] . "</td>";
                                                                        echo "<td>" . $row['aluno'] . "</td>";
                                                                        echo "<td>";
                                                                        if ($row['documento'] && $row['documento'] != '-') {
                                                                            echo "<a href='" . $row['documento'] . "' target='_blank'>" . basename($row['documento']) . "</a>";
                                                                        } else {
                                                                            echo "-";
                                                                        }
                                                                        echo "</td>";
                                                                        echo "<td>" . $row['acao'] . "</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                } else {
                                                                    echo "<tr><td colspan='5'>Nenhum registro encontrado</td></tr>";
                                                                }

                                                                $conn->close();
                                                                ?>

                                                                
                                                            </tbody>
                                                            <tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> 
                                        <!-- Input Alignment card end -->
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

    <!-- data-table js -->
    <script src="..\files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="..\files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="..\files\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="..\files\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="..\files\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="..\files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="..\files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="..\files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="..\files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="..\files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script src="..\files\assets\pages\data-table\js\data-table-custom.js"></script>
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
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
