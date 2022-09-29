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
            text-overflow: ellipsis;
            height: 3.75rem;
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
            background: #ec9706;
        }
        .pagination-links a:hover{
            color: #ec9706;
            background: bisque;
        }
        .pagination-links strong{
            color: #ec9706;
            border: 1px solid #ec9706;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            background-color: bisque;
        }
        .card_prod{
            height: 100%;  
        }
        .imagem_prod{
            height: 180px;
            width: auto;
            padding: 10px 5px;
            max-width: 110%;
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
            color: #EC9706;
            border-color: #EC9706;
            background-color: white;
        }
        
        #cards-prod .btn:hover{
            color: white;
            border-color: white;
            background-color: #EC9706;
        }
        
        #cards-prod {
            margin-bottom: 5%;
        }
        
        @media ( min-width: 299px ) and ( max-width: 398px ) {
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px; max-width: 98%;}
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
            .imagem_prod{height: 140px; max-width: 98%;}
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
            .imagem_prod{height: 140px; max-width: 98%;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            .card_prod{height: 353px!important; margin-bottom: 7%;}
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        
        @media ( min-width: 501px ) and ( max-width: 600px ){
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{margin-top: 30%; font-size: 25px; text-align: center;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px; max-width: 98%;}
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
                max-width: 98%;
            }
          
            /*.card_prod{*/
            /*    height: 353px!important;  */
            /*    margin-bottom: 7%;*/
            /*}*/
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
            .pPesquisa{font-size: 25px; text-align: center;}
            .margin-ipad{margin-top: 0%!important;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            /*.card_prod{height: 353px!important; margin-bottom: 7%;}*/
            .btn-noPromo{margin-top: 16.5%!important;}
        }
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .estrelas{font-size: 10px;margin-bottom: 6px;}
            .pPesquisa{font-size: 25px; text-align: center;}
            .margin-ipad{margin-top: 0%!important;}
            .divImagemServico{padding: 0 2px;}
            .imagem_prod{height: 140px; max-width: 98%;}
            #cards-prod .btn b{font-size: 15px!important;}
            .prod-preco{margin-top: 8%;}
            /*.card_prod{height: 353px!important; margin-bottom: 7%;}*/
            .btn-noPromo{margin-top: 16.5%!important;}
        }        
    </style>

    

    <section class="features-area section-padding-100-0" style="height: 100%; margin-bottom: -15%;">
        <div class="container" style="padding: 0 10%;">
            <div class="row margin-ipad" style="margin-top: 13%;">
                <div class="col-lg-12 col-md-12">
                    <div class="row form-group">
                        <div class="col-xl-12">
                            <p class="pPesquisa">Resultado da Pesquisa</p>
                        </div>
                    </div>     
                    <div class="row">
                        <?php if(is_array($servicos)) { 
                            foreach($servicos as $p) { //echo '<pre>';print_r($p);echo '</pre>';   ?>      
                                <?php $aux_nome = explode(' ',$p['produto_nome'], 2) ?>                            
                                <div class="col-md-4 col-xs-6 col-sm-4 col-lg-3 form-group">
                                    <div class="card zoom card-relacionados" style="border-radius: 7px; height: 100%;">
                                        <div class="card-body" style="border-bottom: 7px solid #EC9706; border-radius: 7px;">
                                            <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'). $p['produto_id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-12 h-50">
                                                        <img class="d-block mx-auto img-fluid" style="height: 200px" src="<?php echo base_url($p['produto_imagem'])?>">
                                                    </div>
                                                        
                                                    <div class="col-md-12 text-center">
                                                        <p class="text-center stars">
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        </p>
                                                        
                                                        <p class="text-center servico-titulo" style="margin-top: 7%; font-weight: 600; color: var(--base-color);"><?php echo ucfirst(mb_strtolower($p['produto_nome'])) ?></p>
                                                        
                                                        <div class="row">
                                                            <?php if($p['valor_desconto']){ ?>
                                                                <div class="col-12 col-md-12 text-center">
                                                                    <p class="text-muted p-0 m-0"><strike>R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></strike></p>
                                                                    <button class="btn btn-secondary">
                                                                        R$ <?php echo number_format($p['valor_desconto'], 2,',','.') ?>
                                                                    </button>
                                                                    <?php if($p['produto_parcelamento'] == 0){ ?>
                                                                        <p class="text-center">
                                                                            <span style="font-size: 11px; color: #828282;"><?= $p['produto_qtd_parcela'] ?></span>
                                                                        </p>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="col-12 col-md-12 text-center mt-4">
                                                                    <button class="btn btn-secondary">
                                                                        R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?>
                                                                    </button>
                                                                    <?php if($p['produto_parcelamento'] == 0){ ?>
                                                                        <p class="text-center">
                                                                            <small class="text-muted"><?= $p['produto_qtd_parcela'] ?></small>
                                                                        </p>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>                                
                            <?php } 
                        } else if($servicos == null) { ?>
                            <div class="col-md-12 text-center">
                                <p><b>Nenhum produto encontrado :(</b></p>
                            </div>
                        <?php } ?>
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

    

    