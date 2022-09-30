    <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile = 1;
        } else {
            $mobile = 0;
        }
    ?>
    
    <link rel="stylesheet" href="assets/fontawesome5/css/all.css">
   
   <style>
        .swal2-styled.swal2-confirm {
            background-color: #850000!important;
            
        }
        
        #veja-tbm .btn:hover{
            background-color: #850000!important;
        }
        
        .btn::before {
            background: #291402;
        }
        
        <?php if($mobile == 0) { ?>
        
        .zoom:hover {
            transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        
        <?php } ?>
        
        
        .imagem-produto{
            width: auto;
            /*height: 540px;*/
            /*height: 420px;*/
        }
        
        #detalhes p{
            color: black!important;
        }
        
        .titulo-produto{
            font-size: 28px;
        }

        .minis-principal{
            cursor: pointer;
            border: 1px solid #f5d216;
            border-radius: 5px;
            width: 60px!important;
            height: 60px!important;
            position: relative;
            bottom: -30px;
            left: calc(10% - 20px);
        }
        
        .minis-principal:hover{
            border: 1px solid grey;
        }
        
        .contact-section{
            padding: 20px 5% 0 5%;
		    background: white;
		}
		
		.video-servico{
		    width:600px;
		    height:400px;
		}
		
		.tipoproduto{
		   display: flex;
           align-items: center;
           padding: 0.45rem 2.75rem;
           margin-bottom: 0;
           margin-top: 3%;
           margin-left: 352px;
           font-size: 1rem;
           font-weight: 400;
           line-height: 1.5;
           color: #495057;
           text-align: center;
           white-space: nowrap;
           border: 1px solid #ced4da;
           border-radius: 0.25rem;
		}
		
		#detalhes{
		    text-align: justify;
		    padding: 0 15px;
		    color: black!important;
		}
		#principal-imagem{
		    padding: 0 40px;
		}
		.divCard{
		    padding: 10px;
		    border: 0;
		}
		.pDescricao{
		    font-size: 30px;
		    font-weight: 900;
		    color: black;
		}
		
		@media(min-width: 300px) and (max-width: 413px){
		    .preco-principal{
		        font-size: 25px!important;
		    }
		    
		    .preco-old{
		        font-size: 14px;
		    }
		    
		    .preco-parcela{
		        font-size: 13px;
		    }
		    
		    .input-group-prepend{
		        margin-left: 0%!important;
		    }
		    
		    .qtd-mobile{
		        margin-top: 12%!important;
		    }
		}
		
		@media(min-width: 414px) and (max-width: 499px){
		    .imagem-produto{
                margin-left: 0%!important;
                width: 100%!important;
                height: auto!important;
            }
            
            .preco-principal{
		        font-size: 25px!important;
		    }
		    
		    .preco-old{
		        font-size: 14px;
		    }
		    
		    .preco-parcela{
		        font-size: 13px;
		    }
		    
		    .input-group-prepend{
		        margin-left: 0%!important;
		    }
		    
		    .qtd-mobile{
		        margin-top: 12%!important;
		    }
		}
        
        @media(max-width: 500px){
            .imagem-produto{
                margin-left: auto;
                width: 100%!important;
                height: auto!important;
            }
            #principal-imagem{
    		    padding: 0!important;
    		}
            .titulo-produto{
                font-size: 21px;
                font-weight: 900;
            }
            .contact-section{
                padding-top: 30%!important;
                padding: 0;
    		}
    		.video-servico{
    		    width: 100%;
    		    height:400px;
    		}
    		#detalhes{
    		    padding: 0!important;
    		}
    		.divCard{
    		    padding: 0!important;
    		}
    		.pDescricao{
    		    padding-left: 6%;
    		}
    		
    		.preco-principal{
		        font-size: 25px!important;
		    }
		    
		    .preco-old{
		        font-size: 14px;
		    }
		    
		    .preco-parcela{
		        font-size: 13px;
		    }
		    
		    .input-group-prepend{
		        margin-left: 0%!important;
		    }
		    
		    .qtd-mobile{
		        margin-top: 12%!important;
		    }
        }
        
        @media (min-width: 501px) and (max-width: 600px){
            .imagem-produto{
                margin-top: 25%;
                margin-left: 0%;
                width: 100%!important;
                height: auto!important;
            }
            #principal-imagem{
    		    padding: 0!important;
    		}
    		
    		.preco-principal{
		        font-size: 25px!important;
		    }
		    
		    .preco-old{
		        font-size: 14px;
		    }
		    
		    .preco-parcela{
		        font-size: 13px;
		    }
		    
		    .input-group-prepend{
		        margin-left: 0%!important;
		    }
		    
		    .qtd-mobile{
		        margin-top: 12%!important;
		    }
        }
        
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .contact-section {padding-top: 70px;}
            .imagem-produto{width: auto!important; height: 350px; position: relative; left: -22%;}
            .video-servico{width: 200%!important; height: auto!important; position: relative; left: -54%; margin: 40% 0 40% 0;}
            
            .preco-principal{
		        font-size: 25px!important;
		    }
		    
		    .preco-old{
		        font-size: 14px;
		    }
		    
		    .preco-parcela{
		        font-size: 13px;
		    }
		    
		    .input-group-prepend{
		        margin-left: 0%!important;
		    }
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .contact-section {padding-top: 70px;}
            .imagem-produto{width: 140%!important; position: relative; left: -28%;}
            
            .preco-principal{
		        font-size: 25px!important;
		    }
		    
		    .preco-old{
		        font-size: 14px;
		    }
		    
		    .preco-parcela{
		        font-size: 13px;
		    }
		    
		    .input-group-prepend{
		        margin-left: 0%!important;
		    }
        }
        
        .stars{font-size: 10px;margin-bottom: 6px;}
        .servico-titulo2{
        text-align: center; 
        color: #828282;
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        word-break: break-word;
        font-size: 14px;
        margin-bottom: 10px;
        margin-top: 2%;
        line-height: 19px;}
        .servico-titulo2:hover{text-decoration: none!important;}
        #veja-tbm .btn{
        color: #030f27;
        border-color: #030f27;
        background-color: white;
        height: 16%;
        }
        
        #veja-tbm .btn:hover{
            color: white;
            border-color: white;
            background-color: #030f27;
        }
        
    </style>
    
    <style>
		/* these styles are for the demo, but are not required for the plugin */
		.zoom {
			display:inline-block;
			position: relative;
		}
		
		/* magnifying glass icon */
		.zoom:after {
			content:'';
			display:block; 
			width:33px; 
			height:33px; 
			position:absolute; 
			top:0;
			right:0;
			background:url(icon.png);
		}

		.zoom img {
			display: block;
		}

		.zoom img::selection { background-color: transparent; }
		
		$('#principal-imagem').show();
            
        $('#loading').hide();
        
        $('#variacoes').slick({
            slidesToShow: 3,
            slidesToScroll: 1
        });
	
		

		#ex2 img:hover { cursor: url(grab.cur), default; }
		#ex2 img:active { cursor: url(grabbed.cur), default; }
	</style>

	<?php if(isset($errado)) { ?>
	    <section class="contact-section" style="height: 100vh; padding: <?php if($mobile) { echo '136px 0'; } else { echo "0";} ?>!important;">
	        
            <div style="text-align: center;width: 100%;border-bottom-right-radius: 40%;border-bottom-left-radius: 40%;padding: 5%;background: #f7c516;box-shadow: rgb(50 50 93 / 25%) 0px 13px 27px -5px, rgb(0 0 0 / 30%) 0px 8px 16px -8px;padding-top: 9%;">
                <i style="font-size: 150px;color: #8a6c04;" class="fa fa-frown-o" aria-hidden="true"></i><br>
                <p style="font-size: 50px;font-weight: 700;color: #8a6c04;">Produto não encontrado</p>
                <a style="font-weight: 700;color: #8a6c04;text-decoration: underline;text-decoration-color: #f7c516;" href="<?php echo base_url() ?>"><p>voltar para principal</p></a>
            </div>
	            
	    </section>
	<?php } else { ?>
   
        <section class="contact-section" style="margin-bottom: 5%;">
            
        <div class="container row-eq-height" style="margin-top: 10%">
            <div class="row row-eq-height">
                <div class="col-md-6 form-group">
                    <div class="card divCard" style="align-content: center; align-items: center;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class='zoom ex principal-imagem' id='principal-imagem' onclick="abrirImagem()"  style="display: block; max-width: 100%;">
                                        <input type="hidden" id="linkimage" value="<?php echo $servico['produto_imagem1'] ?>"></imput>
                                        <?php if($servico){ ?>
                                            <img class="d-block imagem-produto" style="object-fit: cover" src="<?php echo base_url($servico['produto_imagem1']) ?>" alt="First slide">
                                        <?php } ?>
                                    </span>
                                    <!--<div id="principal-imagem" class="text-center principal-imagem">
                                        <img class="imagem-produto d-block zoom" onclick="fullimagem()" id="myImg1" src="<?php echo base_url($servico['produto_imagem1']) ?>">
                                    </div>-->
                                    <div id="miniaturas">
                                        <?php if($servico['produto_imagem1']){ ?>
                                            <img onclick="trocaConteudo(1)" class="minis-principal" src="<?php echo base_url($servico['produto_imagem1']) ?>">
                                        <?php } ?>
                                        <?php if($servico['produto_imagem2']){ ?>
                                            <img onclick="trocaConteudo(2)" class="minis-principal" src="<?php echo base_url($servico['produto_imagem2']) ?>">
                                        <?php } ?>
                                        <?php if($servico['produto_video']){ ?>
                                            <img onclick="trocaConteudo(3)" class="minis-principal" src="<?php echo base_url('imagens/video-placeholder2.png') ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <div class="card" style="border: 0">
                      <div class="card-body">
                            <div class="row">
                                <div class="p-0 col-md-12">
                                    <h3 class="titulo-produto" style="color: #444;"><?php echo $servico['produto_nome'] ?></h3>
                                </div>
                                <div class="p-0 col-md-12" style="font-size: 18px;">
                                    <p style="color: grey"><?php echo $servico['produto_subtitulo'] ?></p>
                                </div>
                                <div class="p-0 col-md-12" style="font-size: 14px;">
                                    <p style="color: grey"><?php echo $servico['produto_resumo'] ?></p>
                                </div>
                                <div class="p-0 col-md-12">
                                    <hr style="height: 1px; border-color: #efefef; margin-top: 3px; margin-bottom: 20px">
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <?php if($servico['valor_desconto']){ ?>
                                                <p  class="preco-old" style="margin: 0; padding: 0; color: color: #757575; text-align: center;"><spanstyle="text-decoration: line-through;">R$ <?php echo number_format($servico['produto_valor'],2,',','.') ?></span>&nbsp;&nbsp;<span style="background-color: #28d028; padding: 3px; border-radius: 5px; font-size: 11px; color: white"><i class="fa fa-arrow-down" aria-hidden="true"></i> <b style="color: white;"><?php echo round($servico['produto_desconto']);?>%</b></span></p>
                                                <h3 class="preco-principal" style="color: #444; text-align: center; font-size: 45px; ">R$ <?php echo number_format($servico['valor_desconto'],2,',','.') ?></h3>
                                                <p class="preco-parcela" style="text-align: center; font-weight: bold; margin-top: -2%; margin-left: -7%;"><?= $servico['produto_qtd_parcela'] ?></p>
                                            <?php } else { ?>
                                                <h3 class="preco-principal" style="color: #444; font-size: 45px;">R$ <?php echo number_format($servico['produto_valor'],2,',','.') ?></h3>
                                                <p class="preco-parcela" style="text-align: center; font-weight: bold; margin-top: -2%; margin-left: -7%;"><?= $servico['produto_qtd_parcela'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 col-6 text-center" style="display: flex;justify-content: center;align-items: center;">
                                            <div class="input-group mb-2 qtd-mobile">
                                                <div class="input-group-prepend" style="cursor: pointer; margin-left: 15%;" onclick="diminuir()">
                                                    <span class="input-group-text" style="background: transparent">
                                                        <i class="marrom-padrao fa fa-minus" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input id="qtd" name="qtd" max="22.50" min="1" type="text" style="border-left: 0; border-right: 0" class="qtd text-center form-control" value="1" onkeypress="return event.charCode >= 48" readonly>
                                                <div class="input-group-prepend" style="cursor: pointer; margin-right: 15%;" onclick="aumentar()">
                                                    <span class="input-group-text" style="border-left: 0; background: transparent">
                                                        <i class="marrom-padrao fa fa-plus" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <hr style="height: 1px; border-color: #efefef; margin-top: 5px; margin-bottom: 10px">
                                    <button <?php if(!isset($ignora)){if($servico['produto_livre'] == 0){ echo "onclick='Alerta()'";}else{echo "onclick='Carrinho()'";}}else{echo "onclick='Carrinho()'";}?> style="height: 60px; width: 100%;" class="btn btn-primary btn-block">
                                        <span style="font-weight: 900; font-size: 18px">COMPRAR</span>
                                    </button>
                                    <div class="row" style="margin-top: 3%;">
                                        <div class="col-md-12 col-12 text-center">
                                            <?php if($servico['produto_qualidade'] == 1){ ?>
                                                <p>Produto semi-novo | <img src="<?php echo base_url("imagens/site/medalha1.png") ?>" alt="Ouro" style="width:5%;"> Certificado Ouro.</p>
                                            <?php } ?>
                                            <?php if($servico['produto_qualidade'] == 2){ ?>
                                                <p>Produto semi-novo | <img src="<?php echo base_url("imagens/site/medalha2.png") ?>" alt="Prata" style="width:5%;"> Certificado Prata.</p>
                                            <?php } ?>
                                            <?php if($servico['produto_qualidade'] == 3){ ?>
                                                <p>Produto semi-novo | <img src="<?php echo base_url("imagens/site/medalha3.png") ?>" alt="Bronze" style="width:5%;"> Certificado Bronze.</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
            <?php if($mobile == 0){ ?>
                <div class="row" style="margin-top: 5%; margin-bottom: 10%;">
                    <div class="col-md-4 col-4 text-center" style="position: relative;">
                        <img src="<?php echo base_url("imagens/site/medalha1.png") ?>" alt="Ouro" style="width:20%;"><br>
                        <p style="width: 91%; font-size: 14px; text-align: center;">Está em ótimas condições estéticas</p>
                    </div>
                    
                    <div class="col-md-4 col-4 text-center" style="position: relative;">
                        <img src="<?php echo base_url("imagens/site/medalha2.png") ?>" alt="Prata" style="width:20%;"><br>
                        <p style="width: 91%; font-size: 14px;">Não tem o plástico protetor (embalagem) e pode apresentar pequenos riscos (quase imperceptível)</p>
                    </div>
                    
                    <div class="col-md-4 col-4 text-center" style="position: relative;">
                        <img src="<?php echo base_url("imagens/site/medalha3.png") ?>" alt="Bronze" style="width:20%;"><br>
                        <p style="width: 91%; font-size: 14px;">Equipamento em ótima condição funcional, mas possui sinais de uso ou pequenos riscos.</p>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="row" style="margin-top: 5%; padding-left: 5%;">
                    <div style="width: 5%; margin-right: 2%;"><img src="<?php echo base_url("imagens/site/medalha1.png") ?>" alt="Ouro" style="width:100%;"></div>
                    <p style="font-size: 14px;">Está em ótimas condições estéticas.</p>
                </div>
                
                <hr style="margin: 0">
                
                <div class="row" style="margin-top: 5%; padding-left: 5%;">
                    <div style="width: 5%; margin-right: 2%;"><img src="<?php echo base_url("imagens/site/medalha2.png") ?>" alt="Prata" style="width:100%;"></div>
                    <p style="font-size: 14px;">Não possui plástico protetor (embalagem).</p><br>
                    <p style="font-size: 14px;">Pode apresentar pequenos riscos (quase imperceptível).</p>
                </div>
                
                <hr style="margin: 0">
                
                <div class="row" style="margin-top: 5%; margin-bottom: 15%; padding-left: 5%;">
                    <div style="width: 5%; margin-right: 2%;"><img src="<?php echo base_url("imagens/site/medalha3.png") ?>" alt="Bronze" style="width:100%;"></div>
                    <p style="font-size: 14px;">Equipamento em ótima condição funcional.</p><br>
                    <p style="font-size: 14px;">Possui sinais de uso ou pequenos riscos.</p>
                </div>
            <?php } ?>

            <div class="row" style="background: white;">
                <div class="col-md-12 text-left form-group" style="margin-top: -3%; padding-left: 4%">
                    <p class="m-0 pDescricao">DESCRIÇÃO</p>
                    <hr style="margin: 0">
                </div>
                
                
                
                <div class="col-md-12 form-group">
                    <div class="card" style="border: 0; background: white">
                        <div class="card-body" style="padding-bottom: 40px;">
                            <div id="detalhes"><?php echo $servico['produto_detalhes'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="veja-tbm" class="container" style="">
        	    <div class="bbb_viewed_title_container container">
        			<h3 class="bbb_viewed_title">Veja Também</h3>
        		</div> 
        	    <div class="row mx-auto" style="margin-top:2%">
        	        <?php $cont = 1; foreach($vejatbm as $vj){ ?>
                    <?php $aux_nome = explode(' ',$vj['produto_nome'], 2) ?>
                    <div class="col-md-2 form-group" style="<?php if($mobile == 1){ ?> width: 60%; <?php if($cont % 2 == 0){ echo 'margin-right: -10%;';}else{echo'margin-left: -10%;';} ?><?php } ?>">
                        <div class="card zoom card-relacionados" style="border-radius: 7px;">
                            <div class="card-body" style="height: 260px; border-bottom: 7px solid #850000; border-radius: 7px;">
                                <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'). $vj['produto_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img class="d-block mx-auto limite-largura-prod2-img" style="height: 100px; width: auto; max-width: 105px;" src="<?php echo base_url($vj['produto_imagem'])?>">
                                        </div>
                                            
                                        <div class="col-md-12 text-center">
                                            <p class="text-center stars">
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                            </p>
                                            <p class="text-center prod-departamento servico-titulo2"><span style="font-size: 13px;"><b style="color: var(--base-color);"><?= ucfirst(mb_strtolower($vj['produto_nome'])) ?></b></span></p>
                                           <?php if($vj['valor_desconto']){ ?>
                                                  <strike class="old-preco" style="font-size: 13px">R$ <?php echo number_format($vj['produto_valor'],2,',','.') ?></strike><br>
                                                <p class="text-center btn btn-primary prod-preco"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($vj['valor_desconto'], 2,',','.') ?></b></p>
                                            <?php } else { ?>
                                                <strike hidden class="old-preco" style="font-size: 13px">R$ 9999,99</strike><br>
                                                <p class="text-center btn btn-primary prod-preco"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($vj['produto_valor'], 2,',','.') ?></b></p>
                                            <?php } $cont++; ?>
                                            <!-- <button type="button" class="btn-main"><i style="font-size: 16px" class="fa fa-cart-plus" aria-hidden="true"></i> COMPRAR</button> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
        	    </div>
        	</section>
        </div>
    </section>
    
    <?php } ?>
    
    <script src='<?php echo base_url('') ?>assets/js/jquery.zoom.min.js'></script>
    <script src="<?php echo base_url('assets/lib/slick-1.8.1/slick/slick.min.js'); ?>"></script>
    
    <style>
    /* Style the Image Used to Trigger the Modal */
    #myImg {
      cursor: pointer;
      transition: 0.3s;
    }
    
    #myImg:hover {opacity: 0.7;}
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }
    
    /* Modal Content (Image) */
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }
    
    /* Caption of Modal Image (Image Text) - Same Width as the Image */
    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }
    
    /* Add Animation - Zoom in the Modal */
    .modal-content, #caption {
      animation-name: zoom;
      animation-duration: 0.6s;
    }
    </style>
    
    <script>
        function trocaConteudo(val){
            console.log(val);
            $('#principal-imagem').empty();
            var conteudo = "";
            
            if(val == 1){
                conteudo = '<img class="imagem-produto d-block" style="object-fit: cover" src="<?php echo base_url($servico['produto_imagem1']) ?>">';
                $('#linkimage').val(<?php echo base_url($servico['produto_imagem1']) ?>);
            } else if(val == 2){
                conteudo = '<img class="imagem-produto d-block" style="object-fit: cover" src="<?php echo base_url($servico['produto_imagem2']) ?>">';
                $('#linkimage').val(<?php echo base_url($servico['produto_imagem2']) ?>);
            } else {
                conteudo = '<video class="video-servico" style="background: black; width: 100%;" controls>'+
                    '<source src="<?php echo $servico['produto_video'] ?>" type="video/mp4">'+
                    'Your browser does not support the video tag.'+
                '</video>';
            }
            $('#principal-imagem').append(conteudo);
        }
    </script>
    
    <div id="myModal" class="modal" style="z-index: 100">
        <!-- The Close Button -->
        <span class="close">&times;</span>
        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">
        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>
    
    
    <!-- Modal -->
    <div class="modal fade" style="z-index: 1041" id="visuImagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 100%;" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <img id="visualizarImagem" class="w-100" src="#">
          </div>
        </div>
      </div>
    </div>
    
    <script>
        function abrirImagem(){
            var img = $('#linkimage').val();
            
            $('#visualizarImagem').attr('src', location.protocol + "//" + window.location.hostname + id);
            $('#visuImagem').modal('show');
        }
    </script>
    
    
    
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        var img = document.getElementById("myImg1");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        function fullimagem(){ 
            var img = $('#myImg1').attr('src');
            modal.style.display = "block";
            modalImg.src = img;
            captionText.innerHTML = this.alt;
        }
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
    </script>
    
    <script>
        function Carrinho(){
            var qtd = document.getElementById("qtd").value;
            
            var form = document.createElement("form");
            var element1 = document.createElement("input"); 
            var element2 = document.createElement("input");  
            
            form.id='compras';
            form.method = "POST";
            form.action = "<?php echo base_url('432b311230a5e558d6dfdd37aa7cb986');?>";
            
            element1.name = "quantidade";
            element1.value = qtd;
            form.appendChild(element1);  
            
            element2.value = <?php echo $servico['produto_id'];?>;
            element2.name = "idServico";
            form.appendChild(element2);
            
            <?php if(isset($afiliado)){ ?>
                var element3 = document.createElement("input"); 
                element3.value = '<?php echo $afiliado;?>';
                element3.name = "afiliado";
                form.appendChild(element3);
            <?php } ?>
            
            document.body.appendChild(form);
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            Submit();
        }
        
        function Submit(){
            var form = document.getElementById("compras");
            form.submit();
        }
        
        function Alerta(){
            Swal.fire({
                title: '<strong>Produto possui pré-requisitos!</strong>',
                icon: 'warning',
                html:
                    'Este produto necessita de uma avaliação anterior. Contrate' +
                    '<a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'.$servico['produto_requisito']);?>"> aqui</a> ' +
                    'ou entre em <a href="mailto:<?php echo $email;?>">contato</a> com nossos atendentes',
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText:
                    '<a style="color:#ffffff;" href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'.$servico['produto_requisito']);?>"><i class="fa fa-check-circle"></i> Contratar!</a>',
                confirmButtonAriaLabel: 'Check circle, Contratar!',
                })
                
                //<a href="https://adv.nsolucoes.digital/e9b8ed001f1726b0385dcfec2dbe2ea1/61">
        }
    </script>
    <script>
        $(document).ready(function(){
            <?php if($mobile == 0){ ?>
                $('#ex1').zoom({
                    magnify: 1.3,
                    
                });
                
                
            <?php } else { ?>
                $('#detalhes').find('img').css('width', '100%');
            <?php } ?>
        });
    </script>
    
    <script>
        function aumentar(){
            $('#qtd').val(parseInt($('#qtd').val()) + 1);
        }
        
        function diminuir(){
            if(parseInt($('#qtd').val()) > 1){
                $('#qtd').val(parseInt($('#qtd').val()) - 1);    
            }
        }
    </script>

    