<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <!-- Algumas informações e configurações -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="N Soluções Agência Digital - www.nsoluti.com.br" />
        <title>Ecommerce - Admin</title>
        
        <!-- FavIcon -->
        <link href="<?php echo base_url('resources/'); ?>assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
        
        <!-- Bootstrap & FontAwesome -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/admin/');?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
        
        <!-- JQuery -->
        <script src="<?php echo base_url('assets/admin/');?>lib/jquery/jquery.min.js"></script>
        
        <!-- DataTables & Select2 -->
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('resources/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('resources/select2/dist/css/select2-bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
        
        <!-- Custom Style -->
        <link href="<?php echo base_url('assets/admin/');?>css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/admin/');?>css/style-responsive.css" rel="stylesheet" type="text/css">
        
        <!-- SweetAlert2 -->
        <link href="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css">
        
        <!-- Não sei se é necessário, mas ta aqui -->
        <link href="<?php echo base_url('assets/admin/');?>css/zabuto_calendar.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/admin/');?>lib/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons' rel='stylesheet' type='text/css'/>
        <?php if($this->session->userdata('header')){?>
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' rel='stylesheet'>
        <link href='<?php echo base_url('recursos/css/');?>material/material-dashboard.css?v=2.1.2' rel='stylesheet' />
        <?php }?>
        <script src="<?php echo base_url('assets/admin/');?>lib/chart-master/Chart.js"></script>        
    </head>
    
    <?php
        //-> Verifica com o navegador qual o dispositivo sendo usado
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile_header = 1;
        } else {
            $mobile_header = 0;
        }
    ?>
    
    <body style="background: #ececec;">
      <section id="container">
            <!-- **********************************************************************************************************************************************************
                TOP BAR CONTENT & NOTIFICATIONS
                *********************************************************************************************************************************************************** -->
            <!--header start-->
            <style>
                :root {
                    --hue: 244;
                    --base-color: hsl(var(--hue) 39% 20%);
                    --base-color-active: hsl(var(--hue) 40% 50%);
                    --base-color-second: hsl(var(--hue) 51% 33%);
                    --base-color-hover: hsl(var(--hue) 51% 33%);
                    --base-color-alt: hsl(var(--hue) 36% 40%);
                
                
                    --primary: var(--base-color);
                    --light: #F1F8FF;
                    --dark: #0F172B;
                    --bigred: #980000;
                }
                .modal-header{
                    background: #4da751!important;
                }
                .nav-link{
                    font-size: 16px;
                    font-weight: 600;
                    color: #444;
                }
                .nav-item {
                    background-color: transparent!important;
                    border-bottom: #dedede!important;
                }
                .select2-container--bootstrap.select2-container--focus .select2-selection, .select2-container--bootstrap.select2-container--open .select2-selection {
                    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px #2FFF22
                    border-color: #83bb8a!important;
                }
                .form-control:focus{
                    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px #2FFF22
                    border-color: #83bb8a!important;
                }
                .select2-container--bootstrap .select2-dropdown{
                    border-color: #83bb8a!important;
                }
                .select2-container--bootstrap .select2-results__option--highlighted[aria-selected]{
                    background-color:#83bb8a!important;
                }
                #opts .col-md-2{
                    padding: 0 10px;
                    position: relative;
                }
                .bl{
                    border-left: 1px solid #ffffff54;
                }
                .opt-menu{
                    color: white;
                    font-size: 14px;
                    margin: 0 0;
                    cursor: pointer;
                }
                .opt-menu:hover{
                    color: #83bb8a!important;
                    
                }
                .ativo-h, .ativo-h:hover{
                    color: black!important;
                }
                #main-content{
                    margin-left: 0px;
                    background: #ececec!important;
                }
                <?php if($mobile_header == 0){
                    echo ".wrapper{
                        margin-top: 78px;
                    }";
                } ?>
                ::selection {
                    background: #83bb8a!important;
                    color: #fff;
                }
                .custom-drop{
                    top: 30px;
                    display: none;
                    position: absolute;
                    width: 130px;
                    background-color: transparent;
                    z-index: 9;
                }
                .drop-content{
                    width: 100%;
                    background-color: white;
                    padding: 3px 6px;
                    margin-top: 15px;
                }
                .drop-content a p{
                    color: black;
                    font-size: 12px;
                    text-decoration: none;
                    width: 100%;
                    margin: 3px 0;
                    padding: 6px 3px;
                    text-align: left;
                }
                .drop-content a p:hover{
                    color: white!important;
                    background-color: #83bb8a!important;
                }
                .bb{
                    border-bottom: 1px solid lightgrey;
                }
                @keyframes fade-in {
                    from {opacity: 0;}
                    to {opacity: 1;}
                }
                .btn-danger{
                    box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(217 83 79 / 40%);
                    border: 0;
                }
                
                .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
                    background-color: lightgrey;
                    border-color: lightgrey;
                    background: lightgrey;
                }
                .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
                    background: linear-gradient( 60deg, #83bb8a!important, #83bb8a!important);
                    border-color: transparent!important;
                }
                .show-menu{
                    background-color: transparent;
                    border-color: transparent;
                    margin-top: 18px;
                    width: 25px;
                    float: right;
                }
                .show-menu em{
                    font-size: 30px;
                    color: #4da751;
                }
                #hide_menu{
                    position: fixed;
                    top: 60px;
                    right: -180px;
                    background-color: #22242a;
                    opacity: 0.8;
                    z-index: 99;
                    padding: 10px;
                }
                .hide-opt, .hide-opt-sem{
                    padding: 8px 4px;
                    width: 100%;
                }
                .hide-opt p, .hide-opt-sem p{
                    color: white;
                    font-size: 14px;
                    font-weight: bold;
                }
                .hide-opt-menu{
                    display: none;
                    padding: 4px 14px 4px 4px;
                    width: 100%;
                    animation: growDown 300ms ease-in-out forwards;
                    transform-origin: top center;
                }
                .hide-opt-menu p{
                    font-size: 11px;
                    color: white;
                }
                .new-principal-titulo{
                    text-align: center!important;
                    font-weight: 900!important;
                    padding: 11px 0!important;
                    color: black!important;
                    font-size: 26px!important;
                    margin-top: 1%;
                    border-bottom: 1px solid black!important;
                }
                .icones-header{
                    color: #4da751;
                    font-size: 25px;
                }
                @keyframes growDown {
                    0% {
                        transform: scaleY(0)
                    }
                    80% {
                        transform: scaleY(1.1)
                    }
                    100% {
                        transform: scaleY(1)
                    }
                }
                .img-logo{
                    width: 200px;
                }
                
                /* ALL CLASS OS COLOR PRIMARY  */
                .table-primary {
                    --bs-table-bg: #cfe2ff;
                    --bs-table-striped-bg: #c5d7f2;
                    --bs-table-striped-color: #000;
                    --bs-table-active-bg: #bacbe6;
                    --bs-table-active-color: #000;
                    --bs-table-hover-bg: #bfd1ec;
                    --bs-table-hover-color: #000;
                    color: #000;
                    border-color: #bacbe6;
                }
                
                .btn-primary {
                    color: #fff;
                    background-color: var(--base-color);
                    border-color: var(--base-color);
                }
                
                .btn-primary:hover {
                    color: #fff;
                    background-color: var(--base-color-hover);
                    border-color: var(--base-color-alt);
                }
                
                .btn-check:focus+.btn-primary,
                .btn-primary:focus {
                    color: #fff;
                    background-color: var(--base-color-hover);
                    border-color: var(--base-color-alt);
                    box-shadow: 0 0 0 0.25rem var(--base-color-active);
                }
                
                .btn-check:checked+.btn-primary,
                .btn-check:active+.btn-primary,
                .btn-primary:active,
                .btn-primary.active,
                .show>.btn-primary.dropdown-toggle {
                    color: #fff;
                    background-color: var(--base-color-alt);
                    border-color: var(--base-color-active);
                }
                
                .btn-check:checked+.btn-primary:focus,
                .btn-check:active+.btn-primary:focus,
                .btn-primary:active:focus,
                .btn-primary.active:focus,
                .show>.btn-primary.dropdown-toggle:focus {
                    box-shadow: 0 0 0 0.25rem var(--base-color-active);
                }
                
                .btn-primary:disabled,
                .btn-primary.disabled {
                    color: #fff;
                    background-color: var(--base-color);
                    border-color: var(--base-color);
                }
                
                .btn-outline-primary {
                    color: var(--base-color);
                    border-color: var(--base-color);
                }
                
                .btn-outline-primary:hover {
                    color: #fff;
                    background-color: var(--base-color);
                    border-color: var(--base-color);
                }
                
                .btn-check:focus+.btn-outline-primary,
                .btn-outline-primary:focus {
                    box-shadow: 0 0 0 0.25rem var(--base-color-active);
                }
                
                .btn-check:checked+.btn-outline-primary,
                .btn-check:active+.btn-outline-primary,
                .btn-outline-primary:active,
                .btn-outline-primary.active,
                .btn-outline-primary.dropdown-toggle.show {
                    color: #fff;
                    background-color: var(--base-color);
                    border-color: var(--base-color);
                }
                
                .btn-check:checked+.btn-outline-primary:focus,
                .btn-check:active+.btn-outline-primary:focus,
                .btn-outline-primary:active:focus,
                .btn-outline-primary.active:focus,
                .btn-outline-primary.dropdown-toggle.show:focus {
                    box-shadow: 0 0 0 0.25rem var(--base-color-active);
                }
                
                .btn-outline-primary:disabled,
                .btn-outline-primary.disabled {
                    color: var(--base-color);
                    background-color: transparent;
                }
                
                .alert-primary {
                    color: var(--base-color-second);
                    background-color: #cfe2ff;
                    border-color: #b6d4fe;
                }
                
                .alert-primary .alert-link {
                    color: var(--base-color-active);
                }
                
                .list-group-item-primary {
                    color: var(--base-color-second);
                    background-color: #cfe2ff;
                }
                
                .list-group-item-primary.list-group-item-action:hover,
                .list-group-item-primary.list-group-item-action:focus {
                    color: var(--base-color-second);
                    background-color: #bacbe6;
                }
                
                .list-group-item-primary.list-group-item-action.active {
                    color: #fff;
                    background-color: var(--base-color-second);
                    border-color: var(--base-color-second);
                }
                
                .link-primary {
                    color: var(--base-color);
                }
                
                .link-primary:hover,
                .link-primary:focus {
                    color: var(--base-color-alt);
                }
                
                .border-primary {
                    border-color: var(--base-color) !important;
                }
                
                /* rtl:end:remove */
                .text-primary {
                    color: var(--base-color) !important;
                }
                
                .bg-primary {
                    background-color: var(--base-color) !important;
                }
                
                
                .nav-link {
                    color: var(--base-color);
                }
                
                .nav-link:hover,
                .nav-link:focus {
                    color: #212529;
                }
                
                .nav-link.disabled {
                    color: #6c757d;
                }

            </style>
            

            <!--background: linear-gradient( 60deg, #ab47bc, #8e24aa);-->
            <header class="header" style="height: 75px; background: white; box-shadow: 0 2px 4px 0 rgb(0 0 0 / 20%);">
                <div class="row" <?php if($mobile_header == 1){echo "style='display: none'";} ?>>
                    <div class="col-md-4" style="margin-top: 5px">
                        <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>" class="logo" style="margin-top: 2%">
                            <img class="img-logo" src="<?php echo base_url('imagens/site/logo2.png') ?>">
                        </a>
                    </div>
                    <div class="col-md-8 text-right" style="margin: 23px 0">
                        <div class="top-menu">
                            <div class="row" id="opts" style="justify-content: right;">
                                <?php if($perm['perfilusuario_dashboard'] == 1 || $super == 1){ ?>
                                    <div class="col-md-1 text-center" style="">
                                        <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>">
                                            <p class="opt-menu">
                                                <i style="font-size: 30px!important" class="<?php if($idpag == 1){echo "ativo-h";} ?> icones-header fa fa-line-chart" aria-hidden="true" title="Dashboard"></i><br>
                                            </p>
                                        </a>
                                    </div>
                                <?php } ?>
                                
                                <?php if($perm['perfilusuario_produto'] == 1 || $perm['perfilusuario_departamento'] == 1 || $super == 1){ ?>
                                    <div class="col-md-1 text-center div-drop">
                                        <p class="opt-menu">
                                        <i class=" <?php if($idpag == 2){echo "ativo-h";} ?> icones-header fa fa-newspaper-o" aria-hidden="true" title="Catálogo"></i><br>
                                        <!--CATALOGO-->&nbsp;&nbsp;<em style="font-weight: bold;color: #4da751; margin-right: 8px;" class="fa fa-caret-down"></em></p>
                                        <div class="custom-drop">
                                            <div class="drop-content">
                                                <?php //if($perm['perfilusuario_produto'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('admin/adminprodutos/produtos') ?>"><p class="bb">Produtos</p></a>
                                                <?php //} ?>
                                                <?php //if($perm['perfilusuario_produto'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('admin/admindestaques/destaques') ?>"><p class="bb">Destaques</p></a>
                                                <?php //} ?>
                                                <?php if($perm['perfilusuario_departamento'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('48b6bbfcf12b55d9b0e4c2ded7384bff') ?>"><p class="bb">Departamentos</p></a>
                                                <?php } ?>
                                                <?php if($perm['perfilusuario_departamento'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('42f4c8bb06112b55d9b0e4c2f81203e5') ?>"><p>Depoimentos</p></a>
                                                <?php } ?>
                                                <!--
                                                <?php if($perm['perfilusuario_promocao'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('0216886b85e598a495cf53b303ec5b54') ?>"><p>Promoções</p></a>
                                                <?php } ?>
                                                <?php if($perm['perfilusuario_marca'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('edb728d5b2d758ff44b1b0e9f991ead9') ?>"><p>Marcas</p></a>
                                                <?php } ?>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                <?php if($perm['perfilusuario_cliente'] == 1 || $perm['perfilusuario_usuario'] == 1 || $perm['perfilusuario_tipo'] == 1 || $super == 1){ ?>
                                    <div class="col-md-1 text-center div-drop">
                                        <p class="opt-menu">
                                        <i class=" <?php if($idpag == 3){echo "ativo-h";} ?> icones-header fa fa-user-o" aria-hidden="true" title="Usuários"></i><br>
                                        <!--USUÁRIOS-->&nbsp;&nbsp;<em style="font-weight: bold;color: #4da751;margin-right: 8px;" class="fa fa-caret-down"></em></p>
                                        <div class="custom-drop">
                                            <div class="drop-content">
                                                <?php if($perm['perfilusuario_cliente'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>"><p class="bb">Clientes</p></a>
                                                <?php } ?>
                                                <?php if($perm['perfilusuario_usuario'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('0d658457c62859e2c93026f9f70ce219') ?>"><p class="bb">Usuários</p></a>
                                                <?php } ?>
                                                <?php if($perm['perfilusuario_tipo'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('13858aeb4c9a5807927c7b952dace1fb') ?>"><p>Tipo Usuário</p></a>
                                                <?php } ?>
                                                <?php //if($perm['perfilusuario_tipo'] == 1 || $super == 1) { ?>
                                                    <!--<a href="<?php echo base_url('admin/adminebooks/ebooks') ?>"><p>Clientes E-book</p></a>-->
                                                <?php //} ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if($perm['perfilusuario_pedido'] == 1 || $perm['perfilusuario_solicitacao'] == 1 || $perm['perfilusuario_devolucao'] == 1 || $perm['perfilusuario_relatorio'] == 1 || $super == 1){ ?>
                                    <div class="col-md-1 text-center div-drop">
                                        <p class="opt-menu">
                                        <i class=" <?php if($idpag == 4){echo "ativo-h";} ?> icones-header fa fa-usd" aria-hidden="true" title="Financeiro"></i><br>
                                        <!--FINANCEIRO-->&nbsp;&nbsp;<em style="font-weight: bold;color: #4da751;margin-right: 8px;" class="fa fa-caret-down"></em></p>
                                        <div class="custom-drop">
                                            <div class="drop-content">
                                                <?php if($perm['perfilusuario_pedido'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('954d03a8bbb7febfcd39f9e071407b4b') ?>"><p class="bb">Pedidos</p></a>
                                                <?php } ?>
                                                <!--<?php if($perm['perfilusuario_devolucao'] == 1 || $super == 1) { ?>-->
                                                <!--    <a href="<?php echo base_url('aec5e956c610cf9b6445c40befc0e850') ?>"><p class="bb">Devoluções</p></a>-->
                                                <?php } ?>
                                                <?php if($perm['perfilusuario_relatorio'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('e12424b582344b74d442de7107c91fd9') ?>"><p class="bb">Relatórios</p></a>
                                                <?php } ?>
                                                <!--<?php if($perm['perfilusuario_relatorio'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('admin/adminhistoricos/listhistoric') ?>"><p class="bb">Históricos</p></a>
                                                <?php } ?>-->
                                                <?php //if($perm['perfilusuario_solicitacao'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('admin/adminchats/chats') ?>"><p class="bb">Chats</p></a>
                                                <?php //} ?>
                                                <?php //if($perm['perfilusuario_solicitacao'] == 1 || $super == 1) { ?>
                                                    <a href="<?php echo base_url('admin/adminafiliados/afiliados') ?>"><p>Afiliados</p></a>
                                                <?php //} ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                <!--
                                <?php if($perm['perfilusuario_campanha'] == 1  || $super == 1){ ?>
                                <div class="col-md-1 text-center div-drop">
                                    <p class="opt-menu <?php if($idpag == 5){echo "ativo-h";} ?>">
                                    <i style="font-size: 25px" class="fa fa-rocket" aria-hidden="true" title="Marketing"></i><br>
                                    &nbsp;&nbsp;<em style="margin-right: 8px;" class="fa fa-caret-down"></em></p>
                                    <div class="custom-drop">
                                        <div class="drop-content">
                                            <?php if($perm['perfilusuario_campanha'] == 1  || $super == 1){ ?>
                                                <a href="<?php echo base_url('ac644a9504a310c06568e9b1c77c2032') ?>"><p>Campanhas</p></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                -->
                                
                                <?php if($perm['perfilusuario_ajuste'] == 1 || $perm['perfilusuario_site'] == 1 || $super == 1){ ?>
                                <div class="col-md-1 text-center div-drop">
                                    <p class="opt-menu">
                                    <i class=" <?php if($idpag == 6){echo "ativo-h";} ?> icones-header fa fa-cog" aria-hidden="true" title="Definições"></i><br>
                                    <!--DEFINIÇÕES-->&nbsp;&nbsp;<em style="font-weight: bold;color: #4da751;margin-right: 8px;" class="fa fa-caret-down"></em></p>
                                    <div class="custom-drop">
                                        <div class="drop-content">
                                            <?php if($perm['perfilusuario_ajuste'] == 1  || $super == 1){ ?>
                                                <a href="<?php echo base_url('8fb192af45f75504361d0011c1677415') ?>"><p class="bb">Ajustes</p></a>
                                            <?php } ?>
                                            <?php if($perm['perfilusuario_site'] == 1  || $super == 1){ ?>
                                                <a href="<?php echo base_url('af8889282b50f9030f8cc7a19b3f706d') ?>"><p>Site</p></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <div class="col-md-1 text-center div-drop">
                                    <p class="opt-menu">
                                    <?php if($this->session->userdata('foto')) { ?>
                                        <img style="width: auto; height: 25px; border-radius: 50px;" class="rounded-circle" src="<?php echo $this->session->userdata('foto') ?>"><br>
                                    <?php } else { ?>
                                        <i class="<?php if($idpag == 7){echo "ativo-h";} ?> icones-header fa fa-user-circle-o" aria-hidden="true" title="Dados"></i><br>
                                    <?php } ?>
                                    <!--DADOS-->&nbsp;&nbsp;<em style="font-weight: bold;color: #4da751; margin-right: 8px;" class="fa fa-caret-down"></em></p>
                                    <div class="custom-drop">
                                        <div class="drop-content">
                                            <a href="<?php echo base_url('1113c334193562fcb49c6557f14671f9') ?>"><p class="bb">PERFIL</p></a>
                                            <a href="<?php echo base_url('215521f1d88d23d4411a877b4d4a0d87') ?>"><p>SAIR</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                
                
                <!-- CELULAR -->
                <!-- CELULAR -->
                <!-- CELULAR -->
                <!-- CELULAR -->
                
                
                <div <?php if($mobile_header == 0){echo "style='display: none'";}else{echo "style='height: 60px'";} ?>>
                    <div style="width: 75%; float: left">
                        <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>"class="logo" style="margin-top: 6px">
                            <img class="img-logo" style="width: 75px!important;" src="<?php echo base_url('imagens/site/logo.png') ?>">
                        </a>
                    </div>
                    <div class="top-menu text-right" style="width: 25%; float: left; height: 100%">
                        <div onclick="vermenu()" class="show-menu"><em style="color: #83bb8a!important!important;" class="fa fa-bars"></em></div>
                    </div>
                </div>
            </header>
            
            <div class="spinner-border"></div>
            
            <div id="hide_menu" class="text-right">
                <?php if($this->session->userdata('sorteio') == 0){ ?>
                    <?php if($perm['perfilusuario_dashboard'] == 1 || $super == 1) { ?>
                        <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>">
                            <div class="hide-opt-sem"><p <?php if($idpag == 1){echo "class='ativo-h'";} ?>>DASHBOARD</p></div>
                        </a>
                    <?php } ?>
                    <?php if($perm['perfilusuario_produto'] == 1 || $perm['perfilusuario_departamento'] == 1 || $super == 1){ ?>
                    <div>
                        <div class="hide-opt"><p <?php if($idpag == 2){echo "class='ativo-h'";} ?>>CATÁLOGO</p></div>
                        <div class="hide-opt-menu">
                            <?php //if($perm['perfilusuario_produto'] == 1 || $super == 1){ ?>
                                <a href="<?php echo base_url('admin/adminservicos/servicos') ?>"><p>PRODUTOS</p></a>
                            <?php //} ?>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($perm['perfilusuario_cliente'] == 1 || $perm['perfilusuario_usuario'] == 1|| $perm['perfilusuario_tipo'] == 1 || $super == 1){ ?>
                    <div>
                        <div class="hide-opt"><p <?php if($idpag == 3){echo "class='ativo-h'";} ?>>USUÁRIOS</p></div>
                        <div class="hide-opt-menu">
                            <?php if($perm['perfilusuario_cliente'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('admin/adminclientes/clientes') ?>"><p>CLIENTES</p></a>
                            <?php } ?>
                            <?php if($perm['perfilusuario_usuario'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('0d658457c62859e2c93026f9f70ce219') ?>"><p>USUÁRIOS</p></a>
                            <?php } ?>
                            <?php if($perm['perfilusuario_tipo'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('13858aeb4c9a5807927c7b952dace1fb') ?>"><p>TIPO USUÁRIOS</p></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($perm['perfilusuario_pedido'] == 1 || $perm['perfilusuario_solicitacao'] == 1 || $perm['perfilusuario_devolucao'] == 1 || $perm['perfilusuario_relatorio'] == 1 || $super == 1){ ?>
                    <div>
                        <div class="hide-opt"><p <?php if($idpag == 4){echo "class='ativo-h'";} ?>>FINANCEIRO</p></div>
                        <div class="hide-opt-menu">
                            <?php if($perm['perfilusuario_pedido'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('954d03a8bbb7febfcd39f9e071407b4b') ?>"><p>PEDIDOS</p></a>
                            <?php } ?>
                            <?php if($perm['perfilusuario_devolucao'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('aec5e956c610cf9b6445c40befc0e850') ?>"><p>DEVOLUÇÕES</p></a>
                            <?php } ?>
                            <?php if($perm['perfilusuario_relatorio'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('e12424b582344b74d442de7107c91fd9') ?>"><p>RELATÓRIOS</p></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <!--
                    <?php if($perm['perfilusuario_campanha'] == 1 || $super == 1){ ?>
                    <div>
                        <div class="hide-opt"><p <?php if($idpag == 5){echo "class='ativo-h'";} ?>>MARKETING</p></div>
                        <div class="hide-opt-menu">
                            <?php if($perm['perfilusuario_campanha'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('ac644a9504a310c06568e9b1c77c2032') ?>"><p>CAMPANHA</p></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    -->
                    
                    <?php if($perm['perfilusuario_ajuste'] == 1 || $perm['perfilusuario_site'] == 1 || $super == 1){ ?>
                    <div>
                        <div class="hide-opt"><p <?php if($idpag == 6){echo "class='ativo-h'";} ?>>DEFINIÇÕES</p></div>
                        <div class="hide-opt-menu">
                            <?php if($perm['perfilusuario_ajuste'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('8fb192af45f75504361d0011c1677415') ?>"><p>AJUSTES</p></a>
                            <?php } ?>
                            <?php if($perm['perfilusuario_site'] == 1 || $super == 1){ ?>
                            <a href="<?php echo base_url('af8889282b50f9030f8cc7a19b3f706d') ?>"><p>SITE</p></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <div>
                        <div class="hide-opt"><p <?php if($idpag == 6){echo "class='ativo-h'";} ?>>DADOS</p></div>
                        <div class="hide-opt-menu">
                            <a href="<?php echo base_url('1113c334193562fcb49c6557f14671f9') ?>"><p>PERFIL</p></a>
                        </div>
                    </div>
                    
                <?php } ?>
                
                <a href="<?php echo base_url('215521f1d88d23d4411a877b4d4a0d87') ?>"><div class="hide-opt-sem"><p>SAIR</p></div></a>
            </div>
            
            <script>
                function vermenu(){
                    if($('#hide_menu').css('right') == "-180px"){
                        $('#hide_menu').css({'right' : '0px'});
                        $('.show-menu').children().removeClass('fa-bars').addClass('fa-times');
                    }else{
                        $('#hide_menu').css({'right' : '-180px'});
                        $('.show-menu').children().removeClass('fa-times').addClass('fa-bars');
                        $('.hide-opt-menu').css('display', 'none');
                        $('.hide-opt').css('padding-bottom', '0px').find('p').css('color', 'white');
                    }
                }
                
                $('.div-drop').mouseenter(function(){
                    $(this).find('.opt-menu').css('color', '#83bb8a!important');
                    $(this).find('.custom-drop').css({'display' : 'block', 'animation' : 'fade-in 1s'});
                });
                
                $('.div-drop').mouseleave(function(){
                    $(this).find('.opt-menu').css('color', 'white');
                    $(this).find('.custom-drop').css({'display' : 'none'});
                });
                
                
                $('.hide-opt').click(function(){
                    if($(this).parent().find('.hide-opt-menu').css('display') == 'none'){
                        $('.hide-opt-menu').css('display', 'none');
                        $('.hide-opt').css('padding-bottom', '8px').find('p').css('color', 'white');
                        
                        $(this).parent().find('.hide-opt-menu').css('display', 'block');
                        if($(this).find('p').hasClass('ativo-h')){
                            $(this).css('padding-bottom', '0px');
                        }else{
                            $(this).css('padding-bottom', '0px').find('p').css('color', 'grey');
                        }
                    }else{
                        $('.hide-opt-menu').css('display', 'none');
                        $('.hide-opt').css('padding-bottom', '8px').find('p').css('color', 'white');
                    }
                });
            </script>