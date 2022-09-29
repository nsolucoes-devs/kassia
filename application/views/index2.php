
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
    .section-content { padding: 25px 15px 0 15px; }
    /*.card-relacionados{cursor: pointer;border-radius: 10px;border: 0;box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.2);}*/
    .prod-preco{margin-bottom: 10px;font-size: 17px;color: white;text-align: center;font-weight: 300; margin-top: 4%;}
    .stars{margin-top: 15px;margin-bottom: 0px;line-height: 0px;}
    .zoom:hover{box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px;}
    .text-ebook{ text-shadow: 2px 2px #f9c716;display: initial;position: relative;top: 30px;left: 35%;color: black;font-weight: 900;font-size: 50px;}
    .button-ebook{position: relative;left: 71%;top: 50%!important;;width: auto;background: #fbab02;border-color: #232323; border-width: 1.5!important;}
    .divLeft{ padding: 5% 4%;padding-bottom: 0!important;background: #f9c716;margin-bottom: 3rem!important;}
    .divEbook{margin-top:1%; background-size: 100% 100%; height:285px; /*<?php if($mobile_view == 0){ ?>background-image: url(imagens/site/banner1.png);<?php } ?>*/}
    .questao-pergunta{font-size: 22px;color: black;font-weight: 700;}
    .questao-resposta{font-size: 18px;color: #f9c716;font-weight: 500;padding-left: 5%;background: black;border-radius: 10px;}
    /*.card-header{border-radius: 20px!important; background: #f9c716;margin: 20px 0;}*/
    /*.collapse{position: relative;top: -35px;width: 97%;left: 2%;border-radius: 11px!important;}*/
    .collapsed:hover{color: black!important;}
    .btn-link:hover {color: black!important;}
    .divImagemServico{padding: 0 75px;}
    .divPrincipal{margin-top: 2%;padding: 0 50px;}
    .divPrincipalPerguntas{margin-top: 5%!important;width: 100%;padding: 0 7%;margin: 0 4%;}
    .divImagemScreen{padding-top: 12%;}
    .pResumo{padding: 0 50px; text-align: justify; color: #444; font-size: 15px; font-weight: 500}
    .btnServico{height: 60px;width: 80%;margin-left: auto;margin-right: auto;}
    .btn-decoration:hover{color: #6E6B5F!important; text-decoration: none!important;}
    .btn-decoration:active{color: #6E6B5F!important; text-decoration: none!important; box-shadow: none;}
    .btn-decoration:focus{text-decoration: none!important; box-shadow: none;}
    .faqs .card {
        margin-bottom: 15px;
        border: none;
        border-radius: 0;
    }
    
    .faqs .card:last-child {
        margin-bottom: 0;
    }
    
    .faqs .card-header {
        padding: 0;
        border: none;
        background: #ffffff;
    }
    
    .faqs .card-header a {
        display: block;
        padding: 10px 15px;
        width: 100%;
        color: #121518;
        font-size: 16px;
        line-height: 40px;
        border: 1px solid rgba(0, 0, 0, .1);
        transition: .5s;
    }
    
    .faqs .card-header [data-toggle="collapse"][aria-expanded="true"] {
        background: #afd4fa;
    }
    
    .faqs .card-header [data-toggle="collapse"]:after {
        font-family: 'font Awesome 5 Free';
        content: "\002B";
        float: right;
        color: var(--base-color);/*#fdbe33*/
        font-size: 12px;
        font-weight: 900;
        transition: .5s;
    }
    
    .faqs .card-header [data-toggle="collapse"][aria-expanded="true"]:after {
        font-family: 'font Awesome 5 Free';
        content: "\2212";
        float: right;
        color: #030f27;
        font-size: 12px;
        font-weight: 900;
        transition: .5s;
    }
    
    .faqs .card-body {
        padding: 20px 25px;
        font-size: 16px;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, .1);
        border-top: none;
    }
    
    .parallax{
        background-size: cover !important;
        background-repeat: no-repeat;
        background-position: 50% 0;
        background-attachment: fixed !important;
        padding: 110px 0;
        color: #fff;
        position: relative;
    }
    
    .parallax2{
        background: url(<?php echo base_url() ?>imagens/site/parallax2.jpg) no-repeat;
    }
    
    #novidades .btn{
        color: #030f27;
        border-color: #030f27;
        background-color: white;
    }
    
    #novidades .btn:hover{
        color: white;
        border-color: white;
        background-color: #030f27;
    }
    
    #veja-tbm .btn{
        color: #030f27;
        border-color: #030f27;
        background-color: white;
    }
    
    #veja-tbm .btn:hover{
        color: white;
        border-color: white;
        background-color: #030f27;
    }
    
    .servico-titulo{
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
        line-height: 17px;
    }   
    
    .servico-titulo:hover{
        text-decoration: none!important;
    }
    
    /* XX-Small devices (300px and up) */
    @media ( min-width: 299px ) and ( max-width: 398px ) {
        .section-content { padding: 90px 15px 0 15px; }
        .text-ebook{ left: 10%!important }
        .button-ebook{ left: 19%!important;top: 65%!important;width: 65%!important;background: #f9c716;border: 1px solid #f9c716;}
        .divLeft{padding: 10% 10%!important;}
        .divEbook{margin-top: -6%!important;margin-bottom: 5%!important;height: 100px!important;}
        .divImagemServico{padding: 10px!important;}
        .divPrincipal{padding: 0 30px!important;}
        .divPrincipalPerguntas{padding: 0 4%!important;margin: 0!important;}
        .questao-pergunta{white-space: initial!important;}
        .prod-preco{margin-bottom: 12px;font-size: 24px;font-weight: 700;}
        .card-body{padding: 10px;}
        .stars{font-size: 25px;margin-bottom: 10px;}
        .divImagemScreen{ padding-top: 0!important; }
        .pResumo{padding: 2px!important;}
        .btnServico{width: 100%;}
        .side-padding-mobile{padding-left: 5%!important; padding-right: 5%!important;}
        .perguntas-mobile{font-size: 25px!important; padding-top: 15%; padding-bottom: 7%;}
        .questao-pergunta{font-size: 18px!important;}
        .questao-resposta{font-size: 16px!important;}
    }
    
    /* X-Small devices (iPhone and others mobiles, 400px and up) */
    @media ( min-width: 399px ) and ( max-width: 574px ) {
        .section-content { padding: 90px 15px 0 15px; }
        .divImagemScreen{ padding-top: 0!important; }
        .divEbook {margin-top: -46%; margin-bottom: -15%; right: 36%;}
        .side-padding-mobile{padding-left: 5%!important; padding-right: 5%!important;}
        .perguntas-mobile{font-size: 24px!important; padding-top: 15%; padding-bottom: 7%;}
        .questao-pergunta{font-size: 18px!important;}
        .questao-resposta{font-size: 16px!important;}
        .button-ebook{left: 73%; top: 80%!important;}
        .card-plus-position{padding-top: 15%!important;}
        .imagem-servico{position: relative; left: -24%;}
    }
    /* Small devices (landscape phones, 576px and up) */
    @media ( min-width: 575px ) and ( max-width: 766px ) {
        .divImagemScreen{padding-top: 0!important;}
    }
    
    @media ( min-width: 501px ) and ( max-width: 600px ){
        .imagem-servico{
            width: 100%!important;
            margin-left: 0!important;
            left: 0!important;
        }
    }
    
    /* Medium devices (tablets, 768px and up) */
    @media ( min-width: 767px ) and ( max-width: 990px ) {
        .divImagemScreen{padding-top: 0!important;}
        .divEbook{margin-top: 1%; background-size: 100% 100%; height: 60px; position: relative; right: 28%;}
        .form-group{margin-bottom: 2rem;}
        .divImagemServico{padding: 0px 0px; position: relative; left: 25%;}
        .perguntas-mobile{font-size: 46px!important;}
        .imagem-servico{width: 100%!important; height: auto!important; margin-left: 2%!important;}
    }
    /* Large devices (desktops, 992px and up) */
    @media ( min-width: 991px ) and ( max-width: 1198px ) {
        .divImagemScreen{padding-top: 0!important;}
        .divImagemScreen{padding-top: 0!important;}
        .divEbook{margin-top: 1%; background-size: 100% 100%; height: 60px; position: relative; right: 26%;}
        .form-group{margin-bottom: 2rem;}
        .divImagemServico{padding: 0px 0px; position: relative; left: 25%;}
        .perguntas-mobile{font-size: 46px!important;}
    }
    /* X-Large devices (large desktops, 1200px and up) */
    @media ( min-width: 1199px ) and ( max-width: 1398px ) {
    }
    /* XX-Large devices (larger desktops, 1400px and up) */
    @media ( min-width: 1399px ) and (max-width: 1899px) {
        #novidades .card-body{
            height: 400px!important;
        }
    }
    
    @media (min-width: 1900px) and (max-width: 2299px){
        #novidades .card-body{
            height: 550px!important;
        }
        
        #promocao {
            width: 80% !important;
            height: 890px;
            margin-top: 5%;
        }
    }
    
    @media (max-width: 768px) {
        #header-carousel .carousel-item {
            position: relative;
            min-height: 450px;
        }
        
        #header-carousel .carousel-item img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
    
    .card-categoria {
        height: 200px !important;
    }
    
    #header-carousel .carousel-caption {
        text-align: left !important;
    }
    #header-carousel .btn-primary:hover {
        background-color:#FFD55F;
        border-color:#FFD55F
    }
    
    .carousel-control-prev{
        background-color: transparent;
        border: 0 solid;
    }
    .carousel-control-next{
        background-color: transparent;
        border: 0 solid;
    }
    
</style>

    <link media rel="stylesheet" href="<?php echo base_url('resources/css/'); ?>style.css">


<style>
    .carousel-caption{
        bottom: 82px!important;
    }
</style>


<main style="position: relative; background: white;">
    

    <div class="section-content">
        <div class="row" style="<?php if($mobile_view == 0){ ?> margin-top:  4% <?php }else{ ?> margin-top: -10px!important <?php } ?>">
            
            
            <?php if($mobile_view == 1){ ?>
            
            <!-- Slider start -->
            
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $site['imagem1'] ?>" class="d-block w-100">
                        <div class="carousel-caption">
                            <h5><?php echo $site['text_banner1']; ?></h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $site['imagem2'] ?>" class="d-block w-100">
                        <div class="carousel-caption">
                            <h5 style="position: relative; top: 50px;"><?php echo $site['text_banner2']; ?></h5>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            
            <div class="col-xl-12 form-group divEbook">
                <button class="button-ebook btn btn-primary" data-toggle="modal" data-target="#ebookModal">Baixar E-book</button>
            </div>
            <!--/ Slider end -->

            
            <?php } ?>
            
            <?php if($mobile_view == 0){ ?>
            
            
            <!-- Carousel Start -->
            <div class="container-fluid p-0">
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2500" style="background: url(https://wowslider.com/sliders/demo-93/data1/images/sunset.jpg); height: 450px; background-repeat: no-repeat; background-size: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-left justify-content-center text-left">
                                <div class="p-3" style="max-width: 100%;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-left wow fadeInUp " data-wow-delay="0.1s" style="margin-left: 20% !important; margin-top: 30% !important">
                                                <h1 class="display-3 text-white mb-4 animated slideInDown">Alexa</h1>
                                                <a class="btn btn-primary py-3 px-5 mt-2" style="margin-right: 5%; color: white;" href="delivery.php">Ver mais +</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="imgvideo" src="https://lojaonline.vivo.com.br/medias/sys_master/root/h18/h3e/13513325314078/POSICAO1-22018986.png" style="margin-bottom: 0; width: auto; height: 100%; bottom: -30%; left: 20%; position: relative;" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2500" style="background: url(https://wowslider.com/sliders/demo-93/data1/images/sunset.jpg); height: 450px; background-repeat: no-repeat; background-size: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-left justify-content-center text-left">
                                <div class="p-3" style="max-width: 100%;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-left wow fadeInUp " data-wow-delay="0.1s" style="margin-left: 20% !important; margin-top: 70% !important">
                                                <h1 class="display-3 text-white mb-4 animated slideInDown">JBL GO2</h1>
                                                <a class="btn btn-primary py-3 px-5 mt-2" style="margin-right: 5%; color: white;" href="delivery.php">Ver mais +</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="imgvideo" src="https://www.jbl.com.br/dw/image/v2/AAUJ_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dw11e0af5f/JBL_Go2_Detailshot01_Sunkissed_Cinnamon-1605x1605px.png?sw=537&sfrm=png" style="margin-bottom: 0; width: auto; height: 100%; bottom: -30%; left: 20%; position: relative;" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2500" style="background: url(https://wowslider.com/sliders/demo-93/data1/images/sunset.jpg); height: 450px; background-repeat: no-repeat; background-size: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-left justify-content-center text-left">
                                <div class="p-3" style="max-width: 100%;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-left wow fadeInUp " data-wow-delay="0.1s" style="margin-left: 20% !important; margin-top: 30% !important">
                                                <h1 class="display-3 text-white mb-4 animated slideInDown">Alexa</h1>
                                                <a class="btn btn-primary py-3 px-5 mt-2" style="margin-right: 5%; color: white;" href="delivery.php">Ver mais +</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="imgvideo" src="https://lojaonline.vivo.com.br/medias/sys_master/root/h18/h3e/13513325314078/POSICAO1-22018986.png" style="margin-bottom: 0; width: auto; height: 100%; bottom: -30%; left: 20%; position: relative;" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="left carousel-control-prev carousel-control" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="right carousel-control-next carousel-control" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
            
            <section id="categorias" style="margin-top: 0; width: 100%;  background-color: black">
        		<div class="top-content">
        			<div class="container-fluid" style="margin-top: 2%;">
        				<div id="carousel-example" class="carousel slide" data-ride="carousel">
        					<div class="carousel-inner row w-100 mx-auto" role="listbox">
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://image.freepik.com/vetores-gratis/ilustracao-da-sala-do-jogador-de-desenho-animado_52683-60981.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 200px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Gamer</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://cdn.acritica.net/upload/dn_noticia/2019/09/1568748187.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Notebooks</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://www.topgadget.com.br/wp-content/uploads/2020/04/perifericos.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Periféricos</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://meupc.net/wp/wp-content/uploads/2021/04/img_1911_1400x875_5d8e6d5ca92a4-1.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Hardware</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://noticiasdatv.uol.com.br/media/_versions/artigos/tv-tela-grande-vendas-samsung-4k_fixed_large.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Televisores</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://icdn.digitaltrends.com/image/digitaltrends/jbl-go-2-bluetooth-speaker-feature-720x720.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Acessórios</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://cultura.uol.com.br/upload/tvcultura/noticias/20210610132603_jonas-leupe-wk-elt11pf0-unsplash-1-.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Celulares</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://cf.shopee.com.br/file/b5734b459f3e40fbb3eddb5483b8bff7); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Case</h3>
        								</div>
        							</div>
        						</div>
        						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
        							<div class="jumbotron bg-cover mx-auto d-block text-white text-center card-categoria" alt="img2"
        								style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://www.hp.com/content/dam/sites/pt_br/worldwide/printers/business-printers/section_2_bundle_1_image_2.jpg); background-repeat: no-repeat; background-attachment: static; background-size: cover;height: 250px;">
        								<div class="container">
        									<h3 class="display-4 text-uppercase font-weight-bold categoria-text">Impressoras</h3>
        								</div>
        							</div>
        						</div>
        					</div>
        					<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
        						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
        					</a>
        					<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
        						<span class="carousel-control-next-icon" aria-hidden="true"></span>
        					</a>
        				</div>
        			</div>
        		</div>
        	</section>
            
            
    
            <?php } ?>
            
            <section class="col-12 mt-5">
                <div class="container">
                       <div class="row">
                           <div class="col-md-1">
                            </div>
                            <div class="col-md-5 text-center">
                                <div style="background: url(https://www.hdstore.com.br/images/uploaded/banner-3_1000.jpeg);  height: 100px; padding: .9%;">
                                    <h2>Banner 1</h2>
                                </div>
                            </div>
                            <div class="col-md-5 text-center">
                                <div style="background: url(https://www.hdstore.com.br/images/uploaded/banner-1_1000.jpeg); height: 100px; padding: .9%; ">
                                    <h2>Banner 1</h2>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                </div>
            </section>

            
            <div id="promocao" class="viewed mx-auto" style="width: 100%; height: 600px;"> 
        		<div class="container">
        			<div class="row">
        				<div class="col">
        					<div class="bbb_viewed_title_container container">
        						<h3 class="bbb_viewed_title">Destaques</h3>
        						<div class="bbb_viewed_nav_container">
        							<div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
        							<div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
        						</div>
        					</div>
        					<div class="bbb_viewed_slider_container">
        						<div class="owl-carousel owl-theme bbb_viewed_slider carousel">
        							<div class="owl-item item">
                    					<div class="thumb-wrapper">
            								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
            								<div class="img-box">
            									<img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924153/alcatel-smartphones-einsteiger-mittelklasse-neu-3m.jpg" class="img-fluid" alt="Headphone">
            								</div>
            								<div class="thumb-content">
            									<h4>Sony Headphone</h4>									
            									<div class="star-rating">
            										<ul class="list-inline">
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
            										</ul>
            									</div>
            									<p class="item-price"><strike>R$ 2.500</strike> <b>R$ 2.349</b></p>
            									<a href="#" class="btn btn-primary">Ver mais</a>
            								</div>						
            							</div>
        							</div>
        							<div class="owl-item item">
        								<div class="thumb-wrapper">
            								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
            								<div class="img-box">
            									<img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924221/51_be7qfhil.jpg" class="img-fluid" alt="Headphone">
            								</div>
            								<div class="thumb-content">
            									<h4>Samsung LED</h4>									
            									<div class="star-rating">
            										<ul class="list-inline">
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
            										</ul>
            									</div>
            									<p class="item-price"><b>R$ 3.079</b></p>
            									<a href="#" class="btn btn-primary">Ver mais</a>
            								</div>						
            							</div>
        							</div>
        							<div class="owl-item item">
        								<div class="thumb-wrapper">
            								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
            								<div class="img-box">
            									<img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg" class="img-fluid" alt="Headphone">
            								</div>
            								<div class="thumb-content">
            									<h4>Samsung Mobile</h4>									
            									<div class="star-rating">
            										<ul class="list-inline">
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
            										</ul>
            									</div>
            									<p class="item-price"><b>R$ 2.250</b></p>
            									<a href="#" class="btn btn-primary">Ver mais</a>
            								</div>						
            							</div>
        							</div>
        							<div class="owl-item item">
        								<div class="thumb-wrapper">
            								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
            								<div class="img-box">
            									<img src="https://lojaonline.vivo.com.br/medias/sys_master/root/h18/h3e/13513325314078/POSICAO1-22018986.png" class="img-fluid" alt="Headphone">
            								</div>
            								<div class="thumb-content">
            									<h4>Amazon Alexa</h4>									
            									<div class="star-rating">
            										<ul class="list-inline">
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
            										</ul>
            									</div>
            									<p class="item-price"><b>R$ 1.379</b></p>
            									<a href="#" class="btn btn-primary">Ver mais</a>
            								</div>						
            							</div>
        							</div>
        							<div class="owl-item item">
        								<div class="thumb-wrapper">
            								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
            								<div class="img-box">
            									<img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924361/21HmjI5eVcL.jpg" class="img-fluid" alt="Headphone">
            								</div>
            								<div class="thumb-content">
            									<h4>Sony Power</h4>									
            									<div class="star-rating">
            										<ul class="list-inline">
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
            										</ul>
            									</div>
            									<p class="item-price"><strike>R$ 300</strike> <b>R$ 225</b></p>
            									<a href="#" class="btn btn-primary">Ver mais</a>
            								</div>						
            							</div>
        							</div>
        							<div class="owl-item item">
        								<div class="thumb-wrapper">
            								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
            								<div class="img-box">
            									<img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg" class="img-fluid" alt="Headphone">
            								</div>
            								<div class="thumb-content">
            									<h4>Speedlink Mobile</h4>									
            									<div class="star-rating">
            										<ul class="list-inline">
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star"></i></li>
            											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
            										</ul>
            									</div>
            									<p class="item-price"><b>R$ 1.275</b></p>
            									<a href="#" class="btn btn-primary">Ver mais</a>
            								</div>						
            							</div>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	
        	<!-- Produtos novos -->
        	<div id="novidades" class="section-content container" style="<?php if($mobile_view == 0){echo "margin-bottom: 20px;";} ?> background: #ffffff; width: 80%;">
        	    <div class="bbb_viewed_title_container container">
					<h3 class="bbb_viewed_title">Novidades</h3>
				</div>
                <div class="row" style="margin-top:2%">
                    <?php foreach($produtos as $p){ ?>
                    <?php $aux_nome = explode(' ',$p['produto_nome'], 2) ?>
                    
                    <div class="col-md-3 form-group" <?php if($mobile_view == 1){echo "style='width: 50%'";} ?>>
                        <div class="card zoom card-relacionados" style="border-radius: 7px;">
                            <div class="card-body" style="height: 400px; border-bottom: 7px solid var(--base-color); border-radius: 7px;">
                                <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'). $p['produto_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img class="d-block w-100 mx-auto" style="max-width: 80%;" src="<?php echo base_url($p['produto_imagem'])?>">
                                        </div>
                                            
                                        <div class="col-md-12 text-center">
                                            <p class="text-center stars">
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                            </p>
                                            <p class="text-center prod-departamento"><span style="font-size: 13px;"><b style="color: var(--base-color);"><?php echo ucfirst(mb_strtolower($aux_nome[0])) ?></b></span></p>
                                            <p class="text-center servico-titulo" style="margin-bottom: 5%;"><?php echo ucfirst(mb_strtolower($aux_nome[1])) ?></p>
                                            <?php //if($p['produto_promocao']){ ?>
                                                <!--<div id="testegui1" style="padding-bottom: 2px;margin-top: -5%;margin-bottom: 7px;">-->
                                                    <!--<p class="prod-preco" style="line-height: 15px; margin: 0!important; padding: 0!important;font-size: 12px; text-decoration: line-through;">R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></p>-->
                                                    <!--<p class="prod-preco" style="line-height: 19px;"><b style="">R$ <?php //echo number_format($p['produto_promocao'], 2,',','.') ?></b></p>-->
                                                <!--</div>-->
                                            <?php //} else { ?>
                                                <strike>R$ 9999,99</strike><br>
                                                <p class="text-center btn btn-secondary prod-preco"><b style="">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></b></p>
                                            <?php //} ?>
                                            <!-- <button type="button" class="btn-main"><i style="font-size: 16px" class="fa fa-cart-plus" aria-hidden="true"></i> COMPRAR</button> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                </div>
            </div>
            
        	<!-- Parallax -->
        	<section class="parallax parallax2 w-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
        	    <div class="parallax-overlay">
        	        <div class="row">
        	            <div class="col-md-12">
        	                <h3 class="text-center"></h3>
        	            </div>
        	        </div>
        	    </div>
        	</section>
        	
        	<!-- Veja também -->
        	<section id="veja-tbm" class="container" style="margin-top: 5%">
        	    <div class="bbb_viewed_title_container container">
					<h3 class="bbb_viewed_title">Veja Também</h3>
				</div> 
        	    <div class="row" style="margin-top:2%">
        	        <?php foreach($produtos2 as $p){ ?>
                    <?php $aux_nome = explode(' ',$p['produto_nome'], 2) ?>
                    
                    <div class="col-md-2 form-group" <?php if($mobile_view == 1){echo "style='width: 50%'";} ?>>
                        <div class="card zoom card-relacionados" style="border-radius: 7px;">
                            <div class="card-body" style="height: 300px; border-bottom: 7px solid var(--base-color); border-radius: 7px;">
                                <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'). $p['produto_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img class="d-block w-100 mx-auto" style="height: 110px; width: auto; max-width: 80%;" src="<?php echo base_url($p['produto_imagem'])?>">
                                        </div>
                                            
                                        <div class="col-md-12 text-center">
                                            <p class="text-center stars">
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                            </p>
                                            <p class="text-center prod-departamento"><span style="font-size: 13px;"><b style="color: grey"><?php echo ucfirst(mb_strtolower($aux_nome[0])) ?></b></span></p>
                                            <?php //if($p['produto_promocao']){ ?>
                                                <!--<div id="testegui1" style="padding-bottom: 2px;margin-top: -5%;margin-bottom: 7px;">-->
                                                    <!--<p class="prod-preco" style="line-height: 15px; margin: 0!important; padding: 0!important;font-size: 12px; text-decoration: line-through;">R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></p>-->
                                                    <!--<p class="prod-preco" style="line-height: 19px;"><b style="">R$ <?php //echo number_format($p['produto_promocao'], 2,',','.') ?></b></p>-->
                                                <!--</div>-->
                                            <?php //} else { ?>
                                                <strike>R$ 9999,99</strike><br>
                                                <p class="text-center btn btn-primary prod-preco"><b style="">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></b></p>
                                            <?php //} ?>
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
    		
            <!-- Perguntas Start -->
            <div id="perguntas" class="faqs divPrincipalPerguntas">
                <div class="container-xxl py-5" style="padding-bottom: 5% !important;">
                    <div class="container">
                        <div class="col-xl-12 text-center" style="margin-bottom: 5%">
                            <p class="perguntas-mobile" style="color: black; font-size: 40px; font-weight: 500"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Perguntas e Respostas</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="accordion-1">
                                    <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                                Pergunta Frequente 1?
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ligula augue, faucibus a nisl ut, consequat lacinia ipsum. Ut dolor quam, vehicula at orci laoreet, accumsan commodo lorem. Suspendisse ullamcorper ex pulvinar ipsum vehicula, non tristique felis vestibulum. Cras in erat at ligula volutpat placerat. Suspendisse luctus ligula sit amet ex pulvinar tempor. Nullam vel lectus vel neque lobortis sagittis. Duis venenatis odio a purus tempus congue nec.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.2s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo">
                                                Pergunta Frequente 2?
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.3s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
                                                Pergunta Frequente 3?
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ligula augue, faucibus a nisl ut, consequat lacinia ipsum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.4s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
                                                Pergunta Frequente 4?
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis porta lectus. Fusce congue accumsan placerat. Integer molestie diam neque. Mauris lobortis nibh dolor, et lobortis nunc mollis at. Sed condimentum ante id.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.5s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive">
                                                Pergunta Frequente 5?
                                            </a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis porta lectus.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="accordion-2">
                                    <div class="card wow fadeInRight" data-wow-delay="0.1s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix">
                                                Pergunta Frequente 7?
                                            </a>
                                        </div>
                                        <div id="collapseSix" class="collapse" data-parent="#accordion-2">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices sem in.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInRight" data-wow-delay="0.2s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseSeven">
                                                Pergunta Frequente 8?
                                            </a>
                                        </div>
                                        <div id="collapseSeven" class="collapse" data-parent="#accordion-2">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id lectus fermentum, efficitur massa a, consectetur nisl. Nam rutrum, magna vitae venenatis egestas, dui velit bibendum augue, ut consectetur libero dolor eget urna. Duis sed sapien ex. Suspendisse.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseEight">
                                                Pergunta Frequente 9?
                                            </a>
                                        </div>
                                        <div id="collapseEight" class="collapse" data-parent="#accordion-2">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultricies velit dapibus metus dignissim tincidunt. Sed et justo lacus. Nam egestas in libero non.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInRight" data-wow-delay="0.4s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseNine">
                                                Pergunta Frequente 10?
                                            </a>
                                        </div>
                                        <div id="collapseNine" class="collapse" data-parent="#accordion-2">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pulvinar luctus magna eget pulvinar. Integer venenatis blandit lectus sed molestie. Vestibulum ante.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInRight" data-wow-delay="0.5s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseTen">
                                                Pergunta Frequente 11?
                                            </a>
                                        </div>
                                        <div id="collapseTen" class="collapse" data-parent="#accordion-2">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Perguntas End -->
            
            <!--<div class="divPrincipalPerguntas">-->
            <!--    <div class="col-xl-12 text-center" style="margin-bottom: 5%">-->
            <!--        <p class="perguntas-mobile" style="color: black; font-size: 50px; font-weight: 900"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Perguntas e Respostas</p>-->
            <!--    </div>-->
                
            <!--    <div id="accordion" style="width: 89%; margin-bottom: 5%; position: relative; left: 7%;">-->
            <!--      <div class="card" style="border: 0">-->
            <!--        <div class="card-header" id="headingOne">-->
            <!--          <h5 class="mb-0">-->
            <!--            <button class="questao-pergunta btn btn-link btn-decoration" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
            <!--              Quais tipos de marca posso registrar?-->
            <!--            </button>-->
            <!--          </h5>-->
            <!--        </div>-->
                
            <!--        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">-->
            <!--          <div class="card-body questao-resposta">-->
            <!--            Nominativa, figurativa ou mista.-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="card" style="border: 0">-->
            <!--        <div class="card-header" id="headingTwo">-->
            <!--          <h5 class="mb-0">-->
            <!--            <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
            <!--              Nomes pessoais podem ser registrado como marca?-->
            <!--            </button>-->
            <!--          </h5>-->
            <!--        </div>-->
            <!--        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">-->
            <!--          <div class="card-body questao-resposta">-->
            <!--            Sim. A utilização do nome de forma comercial é totalmente diferente da utilização do nome no seu dia a dia.-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="card" style="border: 0">-->
            <!--        <div class="card-header" id="headingThree">-->
            <!--          <h5 class="mb-0">-->
            <!--            <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
            <!--              Se eu não registrar minha marca alguém pode exigir que eu deixe de usá-la?-->
            <!--            </button>-->
            <!--          </h5>-->
            <!--        </div>-->
            <!--        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">-->
            <!--          <div class="card-body questao-resposta">-->
            <!--            Sim. Caso outra pessoa tenha registrado uma igual ou muito semelhante, ela pode exigir que você deixe de utilizar, sob pena de ter que pagar indenizações.-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="card" style="border: 0">-->
            <!--        <div class="card-header" id="headingFour">-->
            <!--          <h5 class="mb-0">-->
            <!--            <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">-->
            <!--              Posso ter várias marca em só uma empresa?-->
            <!--            </button>-->
            <!--          </h5>-->
            <!--        </div>-->
            <!--        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">-->
            <!--          <div class="card-body questao-resposta">-->
            <!--            Sim. Uma empresa pode ter diversos produtos ou serviços, e ter uma marca para cada um. Até mesmo um mesmo produto pode ter mais de uma marca ou variações desta.-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="card" style="border: 0">-->
            <!--        <div class="card-header" id="headingFive">-->
            <!--          <h5 class="mb-0">-->
            <!--            <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">-->
            <!--              Quanto vale uma marca?-->
            <!--            </button>-->
            <!--          </h5>-->
            <!--        </div>-->
            <!--        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">-->
            <!--          <div class="card-body questao-resposta">-->
            <!--            Depende de como você a usa, do produto ou serviço que ela representa, etc. Marcas famosas chegam a valer dezenas de bilhões de dólares. Não deixe para descobrir o valor da sua depois que alguém tiver registrado antes de você.-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="card" style="border: 0">-->
            <!--        <div class="card-header" id="headingSix">-->
            <!--          <h5 class="mb-0">-->
            <!--            <button style="text-align: left;" class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">-->
            <!--              Posso contratar apenas a 2ª Etapa, para o registro, sem ter contratado a 1ª Etapa?-->
            <!--            </button>-->
            <!--          </h5>-->
            <!--        </div>-->
            <!--        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">-->
            <!--          <div class="card-body questao-resposta">-->
            <!--            Não. A ausencia de análise pode causar grande decepção para quem realiza o pedido de registro e, depois de muito tempo, descobre que era totalmente inviável seu pedido.-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
    
    <div class="modal fade" id="ebookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: white;border-radius: 30px;padding: 5%;">
          <div class="modal-header" style="border: 0;">
            <p style="font-weight: 900; font-size: 25px;">E-book</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 35px;">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <form action="<?php echo base_url('inicio/cadastrar') ?>" method="post">
              <div class="modal-body" style="border: 0;">
                <div class="row">
                    <div class="col-xl-12 form-group">
                        <label><b>Nome Completo</b></label>
                        <input style="height: 45px;border-radius: 15px;padding-left: 7%;background: #ffffff;border: 2px solid black;color: black;" type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-xl-12 form-group">
                        <label><b>E-mail</b></label>
                        <input style="height: 45px;border-radius: 15px;padding-left: 7%;background: #ffffff;border: 2px solid black;color: black;" type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
              </div>
              <div class="modal-footer" style="border: 0;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Baixar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="baixarTesteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: white;border-radius: 30px;padding: 5%;">
                <div class="modal-header" style="border: 0">
                    <p style="font-weight: 900; font-size: 25px;">E-book</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 35px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 text-center form-group">
                            <a id="adownload" href="<?php echo base_url('imagens/site/ebook.pdf') ?>" download="ebook">
                                <button style="width: 50%; height: 50px!important;" class="btn btn-primary">Baixar E-book</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 3000
            });
        
            $('.carousel').carousel('cycle');
        });
    </script>
    
    <script>
        $(document).ready(function(){
            <?php if($this->session->userdata('ebook_solicitado')){ ?>
                $('#baixarTesteModal').modal('show');
                <?php $this->session->unset_userdata('ebook_solicitado') ?>
            <?php } ?>
        });
    </script>