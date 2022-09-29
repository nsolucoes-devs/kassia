<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        $mobile_view = 1;
    } else {
        $mobile_view = 0;
    }
?>
    
    
    <style>
        .card {
             box-shadow: rgb(0 0 0 / 20%) 0px 2px 6px;
        }
        .servico-desconto{
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #25e625;
            padding: 0 4px;
            color: white;
            border-radius: 3px;
        }
        .servico-titulo{
            text-align: center; 
            color: #828282;
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            word-break: break-word;
            font-size: 14px;
            margin-bottom: 10px;
            margin-top: 2%;
            line-height: 19px;
        }   
        .servico-titulo:hover{
            text-decoration: none!important;
        }
        .zoom {
          transition: transform .3s; /* Animation */
          cursor: pointer;
        }
        .zoom:hover {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            text-decoration: none!important;
        }
        .zoom:hover b{
            text-decoration: none!important;
        }
        .pagination-links a{
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            margin: 2px;
            background: #24aeef;
        }
        .pagination-links strong{
            color: #24aeef;
            border: 1px solid #24aeef;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        .card_prod{
            height: 395px!important;  
        }
        .imagem_prod{
            height: 130px;
            width: auto;
            padding: 10px 5px;
        }
        .comprar{
            height: 10px;
            background-color: #f9c717;
            position: absolute;
            bottom: 0;
            left: 14px;
            width: 101%;
        }
        .div-preco{
            width: 100%;
            position: absolute;
            top: 305px;
            left: 0px;
        }
        .features-area{
            height: 100vh;
            padding-top: 10px!important;
        }
        .pPesquisa{
            font-size: 35px;
            font-weight: 900;
            color: #444;
        }
        .divImagemServico{
            padding: 0 30px;
        }
        
        #cards-prod .btn{
            color: #030f27;
            border-color: #030f27;
            background-color: white;
        }
        
        #cards-prod .btn:hover{
            color: white;
            border-color: white;
            background-color: #030f27;
        }
        
        @media ( min-width: 299px ) and ( max-width: 398px ) {
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            .card_prod{height: 353px!important; margin-bottom: 7%; width: 105%;}
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        
        /* X-Small devices (iPhone and others mobiles, 400px and up) */
        @media ( min-width: 399px ) and ( max-width: 574px ) {
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            .card_prod{height: 353px!important; margin-bottom: 7%;}
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        /* Small devices (landscape phones, 576px and up) */
        @media ( min-width: 575px ) and ( max-width: 766px ) {
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            .card_prod{height: 353px!important; margin-bottom: 7%;}
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        
        @media ( min-width: 501px ) and ( max-width: 600px ){
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            .card_prod{height: 353px!important; margin-bottom: 7%;}
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .div-preco{
                top: 252px;
            }
            .comprar{
                width: 100%!important;
                left: 15px!important;
            }
          
            .imagem_prod{
                height: 140px;
            }
          
            .card_prod{
                height: 353px!important;  
                margin-bottom: 7%;
            }
            .features-area{
                padding-top: 130px!important;
            }
            .pPesquisa{
                font-size: 30px;
            }
            .divImagemServico{
                padding: 0 2px;
            }
            
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            .card_prod{height: 353px!important; margin-bottom: 7%;}
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            .card_prod{height: 353px!important; margin-bottom: 7%;}
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        
        /*@media only screen and (max-width: 768px) {*/
        /*    .div-preco{*/
        /*        top: 252px;*/
        /*    }*/
        /*    .comprar{*/
        /*        width: 100%!important;*/
        /*        left: 15px!important;*/
        /*    }*/
          
        /*    .imagem_prod{*/
        /*        height: 130px;*/
        /*        padding: 5px 5px;*/
        /*    }*/
          
        /*    .card_prod{*/
        /*        height: 300px!important;  */
        /*    }*/
        /*    .features-area{*/
        /*        padding-top: 130px!important;*/
        /*    }*/
        /*    .pPesquisa{*/
        /*        font-size: 30px;*/
        /*    }*/
        /*    .divImagemServico{*/
        /*        padding: 0!important;*/
        /*    }*/
        /*}*/
    </style>

    
<?php if($mobile_view == 0) { ?>
    <section class="features-area section-padding-100-0" style="height: 100%; margin-bottom: -15%;">
        <div class="container" style="padding: 0 10%;">
            <div class="row" style="margin-top: 13%;">
                <div class="col-lg-12 col-md-12">
                    <div class="row form-group">
                        <div class="col-xl-12">
                            <p class="pPesquisa">Produtos de <?= $departamento['departamento_nome'] ?></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <?php if($mobile_view == 0){ ?>
                        <div class="col-md-2">
                            <ul class="navbar-nav mr-auto">
                                <?php foreach($departamentos as $dep) {  ?>
                                    <?php if(array_key_exists('subs', $dep)){ ?>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" style="color:black !important; font-weight: normal;" href="<?php echo base_url('servico/buscaDepartamento/') . $dep['departamento_id'] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?= $dep['departamento']?>
                                                </a>
                                                <li class="nav-item active">
                                                <?php foreach($dep['subs'] as $sub) { ?>
                                                    <a class="dropdown-item" style="color: black !important; font-weight: normal; text-decoration: none; background-color: transparent;" href="<?php echo base_url('servico/buscaDepartamento/') . $sub['id'] ?>"><?= $sub['nome']?></a>
                                                <?php } ?>
                                                </li>
                                    <?php } else { ?>
                                                <li class="nav-item">
                                                     <a class="nav-link" style="color:black !important; font-weight: normal;" href="<?php echo base_url('servico/buscaDepartamento/') . $dep['departamento_id'] ?>"><?= $dep['departamento']?></a>
                                                </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <?php if($mobile_view == 0){ ?><div class="col-md-10"><?php }?>
                            <div class="row">
                                <?php if(is_array($servicos)){foreach($servicos as $p){?>
                                    <div id="cards-prod" class="col-lg-3 col-md-4 col-6 form-group servicos-div">
                                        <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'). $p['produto_id'] ?>">
                                        <div class="card zoom card_prod" style="border-radius: 7px;">
                                            <div class="card-body" style="padding: 2px; border-bottom: 7px solid var(--base-color); border-radius: 7px;">
                                                <div class="text-center divImagemServico">
                                                    <img class="imagem_prod" src="<?php echo base_url($p['produto_imagem']) ?>" alt="">
                                                </div>
                                                <?php if(isset($p['produto_porcentagem'])){ ?>
                                                    <p class="servico-desconto"><i class="fa fa-arrow-down" aria-hidden="true"></i> <?php $p['produto_porcentagem'] ?></p>
                                                <?php } ?>
                                                <div class="col-md-12 text-center">
                                                    <div class="estrelas" style="text-shadow: 0 0 1px #736102; color: gold!important; padding-top: 3%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                
                                                <!--<p class="servico-titulo"><?php //echo ucfirst(mb_strtolower($p['produto_nome'])) ?></p>-->
                                                
                                                <!--<p class="text-center prod-departamento"><span style="font-size: 13px;"><b style="color: var(--base-color);"><?php //echo ucfirst(mb_strtolower($aux_nome[0])) ?></b></span></p>-->
                                                <p class="text-center servico-titulo px-4" style="margin-top: 7%; font-weight: 600; color: var(--base-color);"><?php echo ucfirst(mb_strtolower($p['produto_nome'])) ?></p>
                                                    
                                                <div class="row">
                                                    <?php if(isset($p['produto_promocao'])){ ?>
                                                        <div class="col-md-12 col-12 text-center">
                                                            <p class="prod-preco" style="color: #444; line-height: 15px; margin: 0!important; padding: 0!important;font-size: 12px; text-decoration: line-through;">R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></p>
                                                            <p class="prod-preco text-center btn btn-secondary" style="font-size: 20px; line-height: 19px;"><b>R$ <?php echo number_format($p['produto_promocao'], 2,',','.') ?></b></p>
                                                            <?php if($p['produto_parcelamento'] == 0){ ?>
                                                                <p class="text-center prod-departamento" style="margin-top: -7%;"><span style="font-size: 13px; color: #828282;"><?= $p['produto_qtd_parcela'] ?></span></p>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col-12 col-md-12 text-center div-preco">
                                                            <p class="prod-preco text-center btn btn-secondary"><b style="font-size: 20px; font-weight: bold;line-height: 30px;">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></b></p>
                                                            <?php if($p['produto_parcelamento'] == 0){ ?>
                                                                <p class="text-center prod-departamento" style="margin-top: -7%;"><span style="font-size: 13px; color: #828282;"><?= $p['produto_qtd_parcela'] ?></span></p>
                                                            <?php } ?>
                                                        </div>
                                                        
                                                        
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php }} ?>
                                <?php if($servicos == null){?>
                                    <div class="col-md-12 text-center">
                                        <p><b>Nenhum serviço encontrado :(</b></p>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php if($mobile_view == 0){ ?></div><?php }?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="padding-top: 30px!important">
                            <p class="pagination-links"><?php echo $links; ?></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>
<?php } else {  ?>
    <section class="features-area section-padding-100-0" style="height: 100%; margin-bottom: -15%;">
        <div class="container" style="padding: 0 10%;">
            <div class="row" style="margin-top: 13%;">
                <div class="col-lg-12 col-md-12">
                    <div class="row form-group">
                        <div class="col-xl-12">
                            <p class="pPesquisa">Produtos de <?= $departamento['departamento_nome'] ?></p>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="row">
                                <?php if(is_array($servicos)){foreach($servicos as $p){?>
                                    <div id="cards-prod" class="col-lg-3 col-md-4 col-5 form-group servicos-div">
                                        <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'). $p['produto_id'] ?>">
                                        <div class="card zoom card_prod" style="border-radius: 7px;">
                                            <div class="card-body" style="padding: 2px; border-bottom: 7px solid var(--base-color); border-radius: 7px;">
                                                <div class="text-center divImagemServico">
                                                    <img class="imagem_prod" src="<?php echo base_url($p['produto_imagem']) ?>" alt="">
                                                </div>
                                                <?php if(isset($p['produto_porcentagem'])){ ?>
                                                    <p class="servico-desconto"><i class="fa fa-arrow-down" aria-hidden="true"></i> <?php $p['produto_porcentagem'] ?></p>
                                                <?php } ?>
                                                <div class="col-md-12 text-center">
                                                    <div class="estrelas" style="text-shadow: 0 0 1px #736102; color: gold!important; padding-top: 3%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                
                                                <!--<p class="servico-titulo"><?php //echo ucfirst(mb_strtolower($p['produto_nome'])) ?></p>-->
                                                
                                                <!--<p class="text-center prod-departamento"><span style="font-size: 13px;"><b style="color: var(--base-color);"><?php //echo ucfirst(mb_strtolower($aux_nome[0])) ?></b></span></p>-->
                                                <p class="text-center servico-titulo px-4" style="margin-top: 7%; font-weight: 600; color: var(--base-color);"><?php echo ucfirst(mb_strtolower($p['produto_nome'])) ?></p>
                                                    
                                                <div class="row">
                                                    <?php if(isset($p['produto_promocao'])){ ?>
                                                        <div class="col-md-12 col-12 text-center">
                                                            <p class="prod-preco" style="color: #444; line-height: 15px; margin: 0!important; padding: 0!important;font-size: 12px; text-decoration: line-through;">R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></p>
                                                            <p class="prod-preco text-center btn btn-secondary" style="font-size: 20px; line-height: 19px;"><b>R$ <?php echo number_format($p['produto_promocao'], 2,',','.') ?></b></p>
                                                            <?php if($p['produto_parcelamento'] == 0){ ?>
                                                                <p class="text-center prod-departamento" style="margin-top: -7%;"><span style="font-size: 13px; color: #828282;"><?= $p['produto_qtd_parcela'] ?></span></p>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col-12 col-md-12 text-center div-preco">
                                                            <p class="prod-preco text-center btn btn-secondary"><b style="font-size: 20px; font-weight: bold;line-height: 30px;">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></b></p>
                                                            <?php if($p['produto_parcelamento'] == 0){ ?>
                                                                <p class="text-center prod-departamento" style="margin-top: -7%;"><span style="font-size: 13px; color: #828282;"><?= $p['produto_qtd_parcela'] ?></span></p>
                                                            <?php } ?>
                                                        </div>
                                                        
                                                        
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php }} ?>
                                <?php if($servicos == null){?>
                                    <div class="col-md-12 text-center">
                                        <p><b>Nenhum serviço encontrado :(</b></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="padding-top: 30px!important">
                            <p class="pagination-links"><?php echo $links; ?></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>
    
<?php } ?>
    

    