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
   
   <style>
        .coracao:hover {
            color: brown;
        }
        .btn::before {
            background: #291402;
        }
        .bolinha {
            border-radius: 30px;
            border: 1px solid brown;
            width: 16px!important;
            height: 16px!important;
        }
        
        <?php if($mobile == 0) { ?>
        
        .zoom:hover {
            transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        
        <?php } ?>
        
        .card-relacionados{
            cursor: pointer;
            border-radius: 10px;
            border: 0;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        }
        
        #imagem-produto{
            width: 60%!important;
            height: 406px;
            margin-left: 140px;
        }
        
        .p-detalhes{
            font-size: 12px;
        }
        #detalhes p{
            color: black!important;
        }
        
        .titulo-produto{
            font-size: 30px;
        }
        
        .titulo-relacionado{
            font-size: 30px;
        }
        
        @media(max-width: 500px){
            #imagem-produto{
                margin-left: auto;
                width: 100%!important;
                height: 320px;
            }
            .p-detalhes{
                font-size: 9px;
            }
            .titulo-produto{
                font-size: 22px;
            }
            .titulo-relacionado{
                font-size: 35px;
            }
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

		#ex2 img:hover { cursor: url(grab.cur), default; }
		#ex2 img:active { cursor: url(grabbed.cur), default; }
		#frete_info { display: none; }
		.frete-p { color: #909090; font-size: 13px; }
		
		<?php if($mobile == 1){ ?>
		.col-xs-7{
		    flex: 0 0 58.33%;
		    max-width: 58.33%;
		    width: 58.33%;
		    float: left;
	        margin-left: 19%;
		}
		<?php } ?>
	</style>
   
    <section class="contact-section" style="padding-top: 70px; padding-bottom: 0px; background:#fbf7ef;">
        <div class="container row-eq-height" style="padding: 15px;">
            <div class="row row-eq-height">
                <div class="col-md-7 form-group">
                    <div class="card" style="padding: 10px; border: 0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="bolinha active"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <span class='zoom' id='ex1'>
                                                    <img id="imagem-produto" class="d-block w-100" src="<?php echo base_url('imagens/produtos/' . $produto['produto_id'] . '.jpg') ?>" alt="First slide">
                                                </span>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 30px; height: 30px;"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true" style="width: 30px; height: 30px;"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 form-group">
                    <div class="card" style="border: 0">
                      <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="titulo-produto" style="color: #3a0b0c;"><?php echo $produto['produto_nome'] ?></h3>
                                </div>
                                <div class="col-md-12">
                                    <p style="color: grey">Volume: <?php echo $produto['produto_modelo'] ?></p>
                                </div>
                                <div class="col-md-12">
                                    <hr style="height: 1px; border-color: #efefef; margin-top: 3px; margin-bottom: 20px">
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-5" style="width: 50%">
                                            <label style="font-size: 12px;">Valor Unitário:</label>
                                            <?php if(isset($valor) && isset($porcentagem)){ ?>
                                                <?php if($valor){ ?>
                                                    <p style="margin: 0; padding: 0; color: color: #757575;"><span style="text-decoration: line-through;">R$ <?php echo number_format($produto['produto_valor'],2,',','.') ?></span>&nbsp;&nbsp;<span style="background-color: #28d028; padding: 3px; border-radius: 5px; font-size: 11px; color: white"><i class="fa fa-arrow-down" aria-hidden="true"></i> <b style="color: white;"><?php echo round($porcentagem);?>%</b></span></p>
                                                    <h3 style="color: #3a0b0c;">R$ <?php echo number_format($valor,2,',','.') ?></h3>
                                                <?php } else { ?>
                                                    <h3 style="color: #3a0b0c;">R$ <?php echo number_format($produto['produto_valor'],2,',','.') ?></h3>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <h3 style="color: #3a0b0c;">R$ <?php echo number_format($produto['produto_valor'],2,',','.') ?></h3>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 text-center" style="width: 50%">
                                            <label style="font-size: 12px">Quantidade:</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend" style="cursor: pointer" onclick="diminuir()">
                                                    <span class="input-group-text" style="background: transparent">
                                                        <i class="marrom-padrao fa fa-minus" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input id="qtd" name="qtd" max="22.50" min="1" type="text" style="border-left: 0; border-right: 0" class="qtd text-center form-control" value="1" onkeypress="return event.charCode >= 48">
                                                <div class="input-group-prepend" style="cursor: pointer" onclick="aumentar()">
                                                    <span class="input-group-text" style="border-left: 0; background: transparent">
                                                        <i class="marrom-padrao fa fa-plus" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="height: 1px; border-color: #efefef; margin-top: 20px; margin-bottom: 10px">
                                    <!--
                                    <h5 style="color: grey">Endereço de Entrega</h5>
                                    <h6><i style="font-size: 25px" class="fa fa-map-marker" aria-hidden="true"></i> Avenida Aluisio de Melo Texeira</h6>
                                    
                                    <div class="row">
                                        <div class="col-md-7 col-xs-7">
                                            <label style="font-size: 12px">Calcular Frete:</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="cep" name="sCepDestino" placeholder="Digite seu CEP" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend" style="cursor: pointer" onclick="frete()">
                                                    <span class="input-group-text" id="basic-addon1" style="background: white;border-color: brown;color: brown;">OK</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="frete_info">
                                            <table style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-center">Valor</th>
                                                        <th class="text-center">Prazo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="frete_formas">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                    <hr style="height: 1px; border-color: #efefef; margin-top: 1px; margin-bottom: 10px">
                                    <div class="row" style="margin-top: 10px">
                                         <div class="col-md-3 text-center form-group" style="width: 25%; ">
                                            <div class="row">
                                                <div class="col-md-12" style="padding: 0">
                                                    <span style="font-size: 25px; color: #882905;"><?php echo $produto['produto_teor'] ?></span>
                                                    <p class="p-detalhes" style="color: brown">Teor Alcoolíco</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center form-group" style="width: 25%; margin-top: 9px;">
                                            <div class="row">
                                                <div class="col-md-12" style="padding: 0">
                                                    <i style="font-size: 25px; color: #882905;" class="fa fa-hourglass-end" aria-hidden="true"></i>
                                                    <p class="p-detalhes" style="color: brown">envelhecida <?php echo $produto['produto_envelhecimento'] ?> anos</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center form-group" style="width: 25%; margin-top: 9px;">
                                            <div class="row">
                                                <div class="col-md-12" style="padding: 0">
                                                    <i style="font-size: 25px; color: #882905;" class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <p class="p-detalhes" style="color: brown"><?php echo $produto['produto_localpreparo'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center form-group" style="width: 25%; margin-top: 9px;">
                                            <div class="row">
                                                <div class="col-md-12" style="padding: 0">
                                                    <i style="font-size: 25px; color: #882905;" class="fa fa-tree" aria-hidden="true"></i>
                                                    <p class="p-detalhes" style="color: brown"><?php echo $produto['produto_armazenamento'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button onclick="Carrinho()" style="padding: 20px; font-size: 18px; border-radius: 3px; color: white; background-color: #3a0b0c; border: 0" class="btn btn-primary btn-block">
                                        <i style="font-size: 25px" class="fa fa-cart-plus" aria-hidden="true"></i> ADICIONAR AO CARRINHO
                                    </button>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center form-group" style="margin-top: 2%">
                </div>
                
                <div class="col-md-12 form-group">
                    <div class="card" style="border: 0">
                        <div class="card-body" style="padding-bottom: 0px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="text-align: justify;">
                                        <i style="font-size: 30px; color: black" class="fa fa-quote-left" aria-hidden="true"></i>
                                        <div id="detalhes" style="font-weight: bold; text-align: justify; padding: 0 15px; color: black!important"><?php echo $produto['produto_detalhes'] ?></div>
                                    </p>
                                    <p style="margin-left: 22px;" class="text-right">
                                        <i style="font-size: 30px; color: black" class="fa fa-quote-right" aria-hidden="true"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if($mobile == 0){ ?>
            <div class="row">
                <div class="col-md-12 text-center form-group" style="padding: 30px">
                    <h5 class="titulo-relacionado" style="color: black">PRODUTOS RELACIONADOS</h5>
                </div>
                <?php foreach($relacionados as $p){ ?>
                    <?php $aux_nome = explode(' ',$p['produto_nome'], 2) ?>
                
                    <div class="col-md-3 form-group">
                        <a href="<?php echo base_url('71b141ddd8292dea8bb362092fd5661f/') . $p['produto_id'] ?>">
                            <div class="card zoom card-relacionados">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if($p['produto_porcentagem']){ ?>
                                                <span style="right: 10px; position: absolute; background-color: #28d028; padding: 5px; border-radius: 5px; font-size: 11px; color: white"><i class="fa fa-arrow-down" aria-hidden="true"></i> <b style="color: white;"><?php echo round($p['produto_porcentagem']) ?>%</b></span>
                                            <?php } ?>
                                            <img class="d-block w-100" src="<?php echo base_url('imagens/produtos/').$p['produto_id'].'.jpg'?>">
                                            <p style="margin-top: 35px; font-size: 15px; color: grey;">
                                                <span style="font-size: 13px"><b style="color: grey"><?php echo ucfirst(mb_strtolower($aux_nome[0])) ?> </b></span><span style="margin-left: 8px;">
                                                    <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                    <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                    <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                    <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                    <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                </span><br> 
                                                <?php echo ucfirst(mb_strtolower($aux_nome[1])) ?>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6" <?php if($p['produto_promocao']){ echo "style='margin-top: -3%;'"; } ?>>
                                                    <?php if($p['produto_promocao']){ ?>
                                                        <p style="font-size: 14px; line-height: 10px; margin: 0; padding: 0; text-decoration: line-through; color: color: #757575;">R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></p>
                                                        <p style="margin-bottom: 0; font-size: 21px; color: black;"><b style="color: black">R$ <?php echo number_format($p['produto_promocao'], 2,',','.') ?></b></p>
                                                    <?php } else { ?>
                                                        <p style="margin-bottom: 0; font-size: 21px; color: black;"><b style="color: black">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></b></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="form-control" style="cursor: pointer; font-size: 11px; margin-top: -4px; color: white; border: 2px solid #3a0b0c; background-color: #3a0b0c;"><i style="font-size: 16px" class="fa fa-cart-plus" aria-hidden="true"></i> COMPRAR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            
        </div>
    </section>
    
    <?php if($mobile == 1){ ?>
    <style>
        .fixed-add{
            height: 50px;
            position: fixed;
            background-color: #3a0b0c;
            bottom: 0;
            left: 0;
            right: 0;
            min-width: 100vh;
            z-index: 999;
        }
        .c60{
            flex: 0 0 60%;
            width: 60%;
            max-width: 60%;
            float: left;
            padding: 0 15px;
        }
        .c40{
            flex: 0 0 40%;
            width: 40%;
            max-width: 40%;
            float: left;
            padding: 0 15px;
        }
        .fixed-valor{
            margin-bottom: 0;
            font-size: 25px;
            color: white;
            font-weight: bold;
        }
        .btn-main.btn2{
            font-size: 16px;
            background-color: white;
            border-color: white;
            color: #3a0b0c;
            padding: 5px 10px;
            width: auto;
            float: right;
        }
    </style>
    
    <div class="fixed-add">
        <div class="row" style="margin: 0; width: 100vw; height: 100%">
            <div class="c60" style="padding-top: 10px;">
                <?php if(isset($valor) && isset($porcentagem)){ ?>
                    <?php if($valor){ ?>
                        <p class="fixed-valor">R$ <?php echo number_format($valor,2,',','.') ?></h3>
                    <?php } else { ?>
                        <p class="fixed-valor">R$ <?php echo number_format($produto['produto_valor'],2,',','.') ?></h3>
                    <?php } ?>
                <?php } else { ?>
                    <p class="fixed-valor">R$ <?php echo number_format($produto['produto_valor'],2,',','.') ?></h3>
                <?php } ?>
            </div>
            <div class="c40 text-right" style="padding-top: 10px;">
                <button type="button" onclick="Carrinho()" class="btn-main btn2"><i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar</button>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <style>
        .relacionados-div{
            width: 50%;
            max-width: 50%;
            flex: 0 0 50%;
            float: left;
            padding: 15px;
        }
        .card-relacionados{
            cursor: pointer;
            border-radius: 10px;
            border: 0;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        }
        .prod-departamento{
            font-size: 15px;
            color: grey;
            margin-bottom: 3px;
            margin-top: 10px;
            line-height: 0px;
            text-align: center;
        }
        .prod-nome{
            font-size: 15px;
            margin-bottom: 0px;
            color: black;
            font-weight: bold;
        }
        .prod-preco{
            margin-bottom: 10px;
            font-size: 25px;
            color: black;
            text-align: center;
        }
        .stars{
            margin-top: 15px;
            margin-bottom: 0px;
            line-height: 0px;
        }
    </style>
    
    <?php if($mobile == 1){ ?>
    <style>
        .prod-departamento{
            margin-bottom: 10px;
        }
        .prod-nome{
            margin-bottom: 9%!important;
            line-height: 16px;
        }
        .prod-preco{
            margin-bottom: 5px;
            font-size: 20px;
        }
        .card-body{
            padding: 10px;
        }
        .stars{
            font-size: 11px;
            margin-bottom: 10px;
        }
        .relacionados-title{
            text-transform: uppercase;
            font-size: 25px;
            color: black;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .slick-arrow{
            display: none!important;
        }
    </style>

    <section class="contact-section" style="padding-top: 0px; background:#fbf7ef;">
        <div class="container" style="padding: 15px;">
            
            <div class="row">
                <div class="col-md-12">
                    <p class="relacionados-title">produtos relacionados</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    
                    <div id="relacionados" class="row">
                        <?php foreach($relacionados as $p){ ?>
                            <?php $aux_nome = explode(' ',$p['produto_nome'], 2) ?>
                            <div class="relacionados-div">
                                <div class="card zoom card-relacionados">
                                    <div class="card-body">
                                        <div class="row">
                                            <a href="<?php echo base_url('71b141ddd8292dea8bb362092fd5661f/').$p['produto_id'] ?>">
                                                <div class="col-md-12">
                                                    <?php if($p['produto_porcentagem']){ ?>
                                                        <span style="top: -2px; right: 10px; position: absolute; background-color: #28d028; padding: 5px; border-radius: 5px; font-size: 11px; color: white"><i class="fa fa-arrow-down" aria-hidden="true"></i> <b style="color: white;"><?php echo round($p['produto_porcentagem']) ?>%</b></span>
                                                    <?php } ?>
                                                    <img class="d-block w-100" src="<?php echo base_url('imagens/produtos/').$p['produto_id'].'.jpg' ?>">
                                                </div>
                                                    
                                                <div class="col-md-12">
                                                    <p class="text-center stars">
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                    </p>
                                                    <p class="prod-departamento"><span style="font-size: 13px;"><b style="color: grey"><?php echo ucfirst(mb_strtolower($aux_nome[0])) ?></b></span></p>
                                                    <p class="text-center prod-nome"><?php echo ucfirst(mb_strtolower($aux_nome[1])) ?></p>
                                                    <?php if($p['produto_promocao']){ ?>
                                                        <div id="testegui1">
                                                            <p class="prod-preco" style="line-height: 10px; margin: 0!important; padding: 0!important;font-size: 11px; text-decoration: line-through;">R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></p>
                                                            <p class="prod-preco" style="line-height: 19px;"><b style="color: black">R$ <?php echo number_format($p['produto_promocao'], 2,',','.') ?></b></p>
                                                        </div>
                                                    <?php } else { ?>
                                                        <p class="prod-preco"><b style="color: black">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></b></p>
                                                    <?php } ?>
                                                    
                                                    <button type="button" class="btn-main"><i style="font-size: 16px" class="fa fa-cart-plus" aria-hidden="true"></i> COMPRAR</button>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    
    <script src='<?php echo base_url('') ?>assets/js/jquery.zoom.min.js'></script>
    <script src="<?php echo base_url('assets/lib/slick-1.8.1/slick/slick.min.js'); ?>"></script>

    <script>
        $(document).ready(function(){

        });
    
        function Carrinho(){
            var qtd = document.getElementById("qtd").value;
            
            var form = document.createElement("form");
            var element1 = document.createElement("input"); 
            var element2 = document.createElement("input");  
            
            form.id='compras';
            form.method = "POST";
            form.action = "<?php echo base_url();?>432b311230a5e558d6dfdd37aa7cb986";
            
            element1.name = "quantidade";
            element1.value = qtd;
            form.appendChild(element1);  
            
            element2.value = <?php echo $produto['produto_id'];?>;
            element2.name = "idProduto";
            form.appendChild(element2);
            
            document.body.appendChild(form);
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            Submit();
        }
        
        function Submit(){
            var form = document.getElementById("compras");
            form.submit();
        }
        
    </script>

    <script>
        $(document).ready(function(){
            $('#sCepDestino').mask('00000-000');
            
            <?php if($mobile == 0){ ?>
            $('#ex1').zoom({
                magnify: 1.3,
                
            });
            <?php }else{ ?>
            $('#relacionados').slick({
                slidesToShow: 2,
                slidesToScroll: 1
            });
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

    