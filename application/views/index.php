<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
    $mobile_view = 1;
} else {
    $mobile_view = 0;
}
?>
<style>
    .section-content {
        padding: 25px 15px 0 15px;
    }

    /*.card-relacionados{cursor: pointer;border-radius: 10px;border: 0;box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.2);}*/
    .prod-preco {
        margin-bottom: 10px;
        font-size: 17px;
        color: white;
        text-align: center;
        font-weight: 300;
        margin-top: 4%;
    }

    .stars {
        margin-top: 15px;
        margin-bottom: 0px;
        line-height: 0px;
    }

    .zoom:hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px;
    }

    .text-ebook {
        text-shadow: 2px 2px #f9c716;
        display: initial;
        position: relative;
        top: 30px;
        left: 35%;
        color: black;
        font-weight: 900;
        font-size: 50px;
    }

    .button-ebook {
        position: relative;
        left: 71%;
        top: 50% !important;
        ;
        width: auto;
        background: #fbab02;
        border-color: #232323;
        border-width: 1.5 !important;
    }

    .divLeft {
        padding: 5% 4%;
        padding-bottom: 0 !important;
        background: #f9c716;
        margin-bottom: 3rem !important;
    }

    .divEbook {
        margin-top: 1%;
        background-size: 100% 100%;
        height: 285px;
        /*<?php if ($mobile_view == 0) { ?>background-image: url(imagens/site/banner1.png);<?php } ?>*/
    }

    .questao-pergunta {
        font-size: 22px;
        color: black;
        font-weight: 700;
    }

    .questao-resposta {
        font-size: 18px;
        color: #f9c716;
        font-weight: 500;
        padding-left: 5%;
        background: black;
        border-radius: 10px;
    }

    /*.card-header{border-radius: 20px!important; background: #f9c716;margin: 20px 0;}*/
    /*.collapse{position: relative;top: -35px;width: 97%;left: 2%;border-radius: 11px!important;}*/
    .collapsed:hover {
        color: black !important;
    }

    .btn-link:hover {
        color: black !important;
    }

    .divImagemServico {
        padding: 0 75px;
    }

    .divPrincipal {
        margin-top: 2%;
        padding: 0 50px;
    }

    .divPrincipalPerguntas {
        margin-top: 4% !important;
        width: 100%;
        padding: 0 7%;
        margin: 0 4%;
    }

    .divImagemScreen {
        padding-top: 12%;
    }

    black .pResumo {
        padding: 0 50px;
        text-align: justify;
        color: #444;
        font-size: 15px;
        font-weight: 500
    }

    .btnServico {
        height: 60px;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-decoration:hover {
        color: #6E6B5F !important;
        text-decoration: none !important;
    }

    .btn-decoration:active {
        color: #6E6B5F !important;
        text-decoration: none !important;
        box-shadow: none;
    }

    .btn-decoration:focus {
        text-decoration: none !important;
        box-shadow: none;
    }

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
        line-height: 30px;
        border: 1px solid rgba(0, 0, 0, .1);
        transition: .5s;
    }

    .faqs .card-header [data-toggle="collapse"][aria-expanded="true"] {
        background: #EC9706;
        color: white;
    }

    .faqs .card-header [data-toggle="collapse"]:after {
        font-family: 'font Awesome 5 Free';
        content: "\002B";
        float: right;
        color: var(--base-color);
        /*#fdbe33*/
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

    .parallax {
        background-size: cover !important;
        background-repeat: no-repeat;
        background-position: 50% 0;
        background-attachment: fixed !important;
        padding: 110px 0;
        color: #fff;
        position: relative;
    }

    .parallax2 {
        background: url(<?php echo base_url() ?>imagens/site/parallax.png) no-repeat;
    }

    #novidades .btn {
        color: #EC9706;
        border-color: #EC9706;
        background-color: white;
    }

    #novidades .btn:hover {
        color: white;
        border-color: white;
        background-color: #EC9706;
    }

    #veja-tbm .btn {
        color: #EC9706;
        border-color: #EC9706;
        background-color: white;
        height: 16%;
    }

    #veja-tbm .btn:hover {
        color: white;
        border-color: white;
        background-color: #EC9706;
    }

    p {
        font-family: Poppins, sans-serif !important;
    }

    .servico-titulo {
        text-align: center;
        color: #828282;
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        word-break: break-word;
        font-size: 0.9rem;
        margin-top: 2%;
    }

    .servico-titulo2 {
        text-align: center;
        color: #828282;
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        word-break: break-word;
        font-size: 0.9rem;
        margin-top: 2%;
    }

    .servico-titulo:hover {
        text-decoration: none !important;
    }

    .servico-titulo2:hover {
        text-decoration: none !important;
    }

    #novidades .servico-titulo {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    #promocao .carousel .item {
        padding: 5%;
        border-bottom: 8px solid #EC9706;
    }

    #promocao .carousel .item .img-box {
        height: 164px !important;
        margin-bottom: 15px !important;
        margin-top: 0 !important;
    }

    #promocao .list-inline-item:not(:last-child) {
        margin-right: 0 !important;
    }

    #promocao .carousel .thumb-content .btn:hover {
        background-color: #EC9706 !important;
        border-color: white;
    }

    #depoimentos-mobile .card-dep {
        width: 90%;
        margin-left: 5%;
        margin-right: 5%;
        height: auto;
        padding: 1%;
        background: white;
        padding: 5%;
        border-radius: 5%;
    }

    #depoimentos-mobile h3 {
        text-align: center;
    }

    #depoimentos-mobile a {
        color: var(--base-color);
    }

    #depoimentos .card-dep {
        width: 428px !important;
        margin-right: 0px;
        height: auto;
        padding: 1%;
        background: white;
        border-radius: 5px;
        margin-left: 33%;
    }


    /* XX-Small devices (300px and up) */
    @media (min-width: 299px) and (max-width: 398px) {
        .section-content {
            padding: 90px 15px 0 15px;
        }

        .text-ebook {
            left: 10% !important
        }

        .button-ebook {
            left: 19% !important;
            top: 65% !important;
            width: 65% !important;
            background: #f9c716;
            border: 1px solid #f9c716;
        }

        .divLeft {
            padding: 10% 10% !important;
        }

        .divEbook {
            margin-top: -6% !important;
            margin-bottom: 5% !important;
            height: 100px !important;
        }

        .divImagemServico {
            padding: 10px !important;
        }

        .divPrincipal {
            padding: 0 30px !important;
        }

        .divPrincipalPerguntas {
            padding: 0 4% !important;
            margin: 0 !important;
        }

        .questao-pergunta {
            white-space: initial !important;
        }

        .prod-preco {
            margin-bottom: 12px;
            font-size: 24px;
            font-weight: 700;
        }

        .card-body {
            padding: 10px;
        }

        .stars {
            font-size: 8px;
            margin-bottom: 10px;
        }

        .divImagemScreen {
            padding-top: 0 !important;
        }

        .pResumo {
            padding: 2px !important;
        }

        .btnServico {
            width: 100%;
        }

        .side-padding-mobile {
            padding-left: 5% !important;
            padding-right: 5% !important;
        }

        .perguntas-mobile {
            font-size: 25px !important;
            padding-top: 15%;
            padding-bottom: 7%;
        }

        .questao-pergunta {
            font-size: 18px !important;
        }

        .questao-resposta {
            font-size: 16px !important;
        }

        .perguntas-largura-mobile {
            width: 110%;
        }

        .prod-preco-txt {
            bottom: 16px !important;
        }

        .old-preco {
            font-size: 11px;
        }

        #novidades .prod-preco {
            height: 27px;
        }

        #carousel-mobile {
            margin-top: 10%;
        }

        .faqs .card-header a {
            line-height: 25px;
        }


    }

    /* X-Small devices (iPhone and others mobiles, 400px and up) */
    @media (min-width: 399px) and (max-width: 574px) {
        .section-content {
            padding: 90px 15px 0 15px;
        }

        .divImagemScreen {
            padding-top: 0 !important;
        }

        .divEbook {
            margin-top: -46%;
            margin-bottom: -15%;
            right: 36%;
        }

        .side-padding-mobile {
            padding-left: 5% !important;
            padding-right: 5% !important;
        }

        .stars {
            font-size: 8px;
            margin-bottom: 10px;
        }

        .perguntas-mobile {
            font-size: 24px !important;
            padding-top: 15%;
            padding-bottom: 7%;
        }

        .questao-pergunta {
            font-size: 18px !important;
        }

        .questao-resposta {
            font-size: 16px !important;
        }

        .button-ebook {
            left: 73%;
            top: 80% !important;
        }

        .card-plus-position {
            padding-top: 15% !important;
        }

        .imagem-servico {
            position: relative;
            left: -24%;
        }

        #novidades .prod-preco {
            height: 27px;
        }

        .faqs .card-header a {
            line-height: 25px;
        }
    }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 575px) and (max-width: 766px) {
        .divImagemScreen {
            padding-top: 0 !important;
        }

        .stars {
            font-size: 8px;
            margin-bottom: 10px;
        }

        #novidades .prod-preco {
            height: 27px;
        }

        .faqs .card-header a {
            line-height: 25px;
        }
    }

    @media (min-width: 501px) and (max-width: 600px) {
        .stars {
            font-size: 8px;
            margin-bottom: 10px;
        }

        .imagem-servico {
            width: 100% !important;
            margin-left: 0 !important;
            left: 0 !important;
        }

        #novidades .prod-preco {
            height: 27px;
        }

        .faqs .card-header a {
            line-height: 25px;
        }
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 767px) and (max-width: 990px) {
        <?php $tablet = 1; ?>.divImagemScreen {
            padding-top: 0 !important;
        }

        .divEbook {
            margin-top: 1%;
            background-size: 100% 100%;
            height: 60px;
            position: relative;
            right: 28%;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .divImagemServico {
            padding: 0px 0px;
            position: relative;
            left: 25%;
        }

        .perguntas-mobile {
            font-size: 46px !important;
        }

        .imagem-servico {
            width: 100% !important;
            height: auto !important;
            margin-left: 2% !important;
        }

        .margin-card-ipad {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        .stars {
            font-size: 10px;
            margin-bottom: 6px;
        }

        .questao-pergunta {
            font-size: 18px !important;
        }

        .questao-resposta {
            font-size: 16px !important;
        }

        .perguntas-largura-mobile {
            width: 110%;
        }

        .prod-preco-txt {
            bottom: 8px !important;
            font-size: 12px !important;
        }

        .old-preco {
            font-size: 11px;
        }

        #novidades .prod-preco {
            height: 27px;
        }

        #carousel-mobile {
            margin-top: 3%;
        }

        #novidades img {
            position: relative;
            left: -13%;
        }

        .faqs .card-header a {
            line-height: 25px;
        }

    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 991px) and (max-width: 1198px) {
        <?php $tablet = 1; ?>.divImagemScreen {
            padding-top: 0 !important;
        }

        .divImagemScreen {
            padding-top: 0 !important;
        }

        .divEbook {
            margin-top: 1%;
            background-size: 100% 100%;
            height: 60px;
            position: relative;
            right: 26%;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .divImagemServico {
            padding: 0px 0px;
            position: relative;
            left: 25%;
        }

        .perguntas-mobile {
            font-size: 46px !important;
        }

        .margin-card-ipad {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        .stars {
            font-size: 10px;
            margin-bottom: 6px;
        }

        .questao-pergunta {
            font-size: 18px !important;
        }

        .questao-resposta {
            font-size: 16px !important;
        }

        .perguntas-largura-mobile {
            width: 110%;
        }

        .prod-preco-txt {
            bottom: 8px !important;
            font-size: 12px !important;
        }

        .old-preco {
            font-size: 11px;
        }

        #novidades .prod-preco {
            height: 27px;
        }

        #carousel-mobile {
            margin-top: 3%;
        }

        #novidades img {
            position: relative;
            left: -13%;
        }

        .faqs .card-header a {
            line-height: 25px;
        }
    }

    /* X-Large devices (large desktops, 1200px and up) */
    @media (min-width: 1199px) and (max-width: 1398px) {
        .limite-largura-prod-img {
            max-width: 190px;
        }

        .limite-largura-prod2-img {
            max-width: 110px;
        }
    }


    @media (min-width: 1900px) and (max-width: 2299px) {


        #promocao {
            width: 80% !important;
            height: 890px;
            margin-top: 5%;
        }

        #novidades .prod-departamento {
            margin-top: 0% !important;
        }

        #promocao .bbb_viewed_tittle_container {
            width: 100% !important;
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
        background-color: var(--base-color-alt);
        border-color: var(--base-color-alt);
        color: #fff !important;
    }

    .carousel-control-prev {
        background-color: transparent;
        border: 0 solid;
    }

    .carousel-control-next {
        background-color: transparent;
        border: 0 solid;
    }

    .img_full {
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
    }

    /*** Testimonial ***/
    .testimonial {
        background: linear-gradient(rgba(15, 23, 43, .7), rgba(15, 23, 43, .7)), url(https://www.mirao.com.br/media/mageplaza/blog/post/s/h/shutterstock_1430140061-scaled.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset, rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    }

    .testimonial-carousel {
        padding-left: 65px;
        padding-right: 65px;
    }

    .testimonial-carousel .testimonial-item {
        padding: 30px;
    }

    .testimonial-carousel .owl-nav {
        position: absolute;
        width: 100%;
        height: 40px;
        top: calc(50% - 20px);
        left: 0;
        display: flex;
        justify-content: space-between;
        z-index: 1;
    }

    .testimonial-carousel .owl-nav .owl-prev,
    .testimonial-carousel .owl-nav .owl-next {
        position: relative;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFFFFF;
        background: var(--primary);
        border-radius: 2px;
        font-size: 18px;
        transition: .5s;
    }

    .testimonial-carousel .owl-nav .owl-prev:hover,
    .testimonial-carousel .owl-nav .owl-next:hover {
        color: var(--primary);
        background: #FFFFFF;
    }

    #carousel-mobile .carousel-item {
        height: 250px;
        background-repeat: no-repeat !important;
        background-size: cover !important;
    }

    #carousel-mobile .carousel-item h3 {
        font-size: 30px;
        bottom: 24px;
        position: relative;
        right: -5px;
        text-align: left;
    }

    .teste {
        width: 100% !important;
        -webkit-transition: all 0.5s;
        -ms-transition: all 0.5s;
        transition: all 0.5s;
    }

    .img-novidade {
        height: 90%;
        max-width: 90%;
        width: auto;
    }

    .carousel-caption {
        bottom: 82px !important;
    }
</style>

<link media rel="stylesheet" href="<?php echo base_url('resources/css/'); ?>style.css">


<main style="position: relative; background: white;">
    <div class="section-content">
        <div class="row" style="<?php if ($mobile_view == 0) { ?> <?php } else { ?> margin-top: -10px!important <?php } ?>">


            <?php if ($mobile_view == 1) { ?>

                <!-- Slider start -->
                <section id="carousel-mobile" style="width: 100%;">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="background: url(<?php echo base_url() ?>imagens/site/banner_principal1.png);">
                                <a href="<?php echo $site['btn_banner1']; ?>">
                                    <img class="imgvideo" src="<?php echo base_url() ?>imagens/site/imagem1.png" style="margin-bottom: 0;width: auto;height: 60%;top: 50%;left: 20%;position: absolute;" alt="Image">
                                    <div class="carousel-caption">
                                        <h3 style="z-index: 1;"><?= $site['text_banner1']; ?></h3>
                                    </div>
                                </a>
                            </div>
                            <div class="carousel-item" style="background: url(<?php echo base_url() ?>imagens/site/banner_principal2.png);">
                                <a href="<?php echo $site['btn_banner2']; ?>">
                                    <img class="imgvideo" src="<?php echo base_url() ?>imagens/site/imagem2.png" style="margin-bottom: 0;width: auto;height: 60%;top: 40%;left: 50%;position: absolute;" alt="Image">
                                    <div class="carousel-caption">
                                        <h3 style="z-index: 1;"><?= $site['text_banner2']; ?></h3>
                                    </div>
                                </a>
                            </div>
                            <div class="carousel-item" style="background: url(<?php echo base_url() ?>imagens/site/banner_principal3.png);">
                                <a href="<?php echo $site['btn_banner3']; ?>">
                                    <img class="imgvideo" src="<?php echo base_url() ?>imagens/site/imagem3.png" style="margin-bottom: 0;width: auto;height: 60%;top: 40%;left: 50%;position: absolute;" alt="Image">
                                    <div class="carousel-caption">
                                        <h3 style="z-index: 1;"><?= $site['text_banner3']; ?></h3>
                                    </div>
                                </a>
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
                </section>
                <!--/ Slider end -->


            <?php } ?>

            <?php if ($mobile_view == 0) { ?>


                <!-- Carousel Start -->
                <div class="container-fluid p-0">
                    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" style="background-color: black;">
                            <div class="carousel-item active" data-bs-interval="4000" style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(<?php echo base_url() ?>imagens/site/banner_principal1.png); height: 450px; background-repeat: no-repeat; background-size: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-left justify-content-center text-left">
                                    <div class="p-3" style="max-width: 100%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-left wow fadeInUp " data-wow-delay="0.1s" style="margin-left: 20% !important; margin-top: 70% !important">
                                                    <h1 class="display-3 text-white mb-4 animated slideInDown"><?php echo $site['text_banner1']; ?></h1>
                                                    <a class="btn btn-primary py-3 px-5 mt-2" style="margin-right: 5%; color: white;" href="<?php echo $site['btn_banner1']; ?>">Ver mais +</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="imgvideo" src="<?php echo base_url() ?>imagens/site/imagem1.png" style="margin-bottom: 0;width: auto;height: 60%; top: 61%; left: 20%;position: absolute;" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="4000" style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(<?php echo base_url() ?>imagens/site/banner_principal2.png); height: 450px; background-repeat: no-repeat; background-size: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-left justify-content-center text-left">
                                    <div class="p-3" style="max-width: 100%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-left wow fadeInUp " data-wow-delay="0.1s" style="margin-left: 20% !important; margin-top: 70% !important">
                                                    <h1 class="display-3 text-white mb-4 animated slideInDown"><?php echo $site['text_banner2']; ?></h1>
                                                    <a class="btn btn-primary py-3 px-5 mt-2" style="margin-right: 5%; color: white;" href="<?php echo $site['btn_banner2']; ?>">Ver mais +</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="imgvideo" src="<?php echo base_url() ?>imagens/site/imagem2.png" style="margin-bottom: 0;width: auto;height: 60%; top: 61%; left: 20%;position: absolute;" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="4000" style="background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(<?php echo base_url() ?>imagens/site/banner_principal3.png); height: 450px; background-repeat: no-repeat; background-size: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-left justify-content-center text-left">
                                    <div class="p-3" style="max-width: 100%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-left wow fadeInUp " data-wow-delay="0.1s" style="margin-left: 20% !important; margin-top: 70% !important">
                                                    <h1 class="display-3 text-white mb-4 animated slideInDown"><?php echo $site['text_banner3']; ?></h1>
                                                    <a class="btn btn-primary py-3 px-5 mt-2" style="margin-right: 5%; color: white;" href="<?php echo $site['btn_banner3']; ?>">Ver mais +</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="imgvideo" src="<?php echo base_url() ?>imagens/site/imagem3.png" style="margin-bottom: 0;width: auto;height: 60%; top: 61%; left: 20%;position: absolute;" alt="Image">
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

            <?php } ?>

            <!-- Produtos novos -->
            <div id="novidades" class="section-content container" style="<?php if ($mobile_view == 0) {
                                                                                echo "margin-bottom: 20px;";
                                                                            } ?> background: #ffffff; width: 80%;">
                <div class="row" style="margin-top:2%">
                    <?php
                    if ($produtos) {
                        foreach ($produtos as $p) {
                            $aux_nome = explode(' ', $p['produto_nome'], 2) ?>
                            <div class="col-md-4 col-xs-6 col-sm-4 col-lg-3 form-group">
                                <div class="card zoom card-relacionados" style="border-radius: 7px; height: 100%;">
                                    <div class="card-body" style="border-bottom: 7px solid #EC9706; border-radius: 7px;">
                                        <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/') . $p['produto_id'] ?>">
                                            <div class="row">
                                                <div class="justify-content-center col-md-12 d-flex" style="height: 12rem">
                                                    <img class="img-fluid" src="<?php echo base_url($p['produto_imagem']) ?>">
                                                </div>

                                                <div class="col-md-12 text-center">
                                                    <p class="text-center stars">
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                    </p>

                                                    <div class="text-center" style="height: 3.5rem">
                                                        <p class="servico-titulo" style="margin-top: 7%; font-weight: 600; color: var(--base-color);"><?= ucfirst(mb_strtolower($p['produto_nome'])) ?></p>
                                                    </div>
                                                    <?php if ($p['produto_promocao']) { ?>
                                                        <div class="col-12 col-md-12 text-center">
                                                            <p class="text-muted p-0 m-0"><strike>R$ <?php echo number_format($p['produto_valor'], 2, ',', '.') ?></strike></p>
                                                            <button class="btn btn-secondary">
                                                                R$ <?php echo number_format($p['produto_promocao'], 2, ',', '.') ?>
                                                            </button>
                                                            <?php if ($p['produto_parcelamento'] == 0) { ?>
                                                                <p class="text-center text-muted">
                                                                    <?= $p['produto_qtd_parcela'] ?>
                                                                </p>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col-12 col-md-12 text-center mt-4">
                                                            <button class="btn btn-secondary">
                                                                R$ <?php echo number_format($p['produto_valor'], 2, ',', '.') ?>
                                                            </button>
                                                            <?php if ($p['produto_parcelamento'] == 0) { ?>
                                                                <p class="text-center text-muted">
                                                                    <?= $p['produto_qtd_parcela'] ?>
                                                                </p>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else  { ?>
                        <div class="col-md-12 form-group">
                            <div class="card zoom card-relacionados" style="border-radius: 7px; height: 20rem">
                                <div class="card-body d-flex justify-content-center" style="border-bottom: 7px solid #EC9706; border-radius: 7px;">
                                    <h3 class="text-dark my-auto">
                                        Sem produtos para mostrar por enquanto.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <section class="col-12 mt-5 d-none">
                <div class="container">
                    <div class="row">
                        <?php if ($mobile_view == 0) { ?>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-5 text-center">
                                <img src="<?php echo base_url() ?>imagens/site/img_full1.png" style="width: 100%; height: 100px" class="img-fluid" alt="Headphone">
                            </div>
                            <div class="col-md-5 text-center">
                                <img src="<?php echo base_url() ?>imagens/site/img_full2.png" style="width: 100%; height: 100px" class="img-fluid" alt="Headphone">
                            </div>
                            <div class="col-md-1">
                            </div>
                        <?php } else { ?>
                            <div class="text-center mx-auto mb-4">
                                <img src="<?php echo base_url() ?>imagens/site/img_full1.png" style="width: 100%; height: 100px" class="img-fluid" alt="Headphone">
                            </div>
                            <div class="text-center mx-auto mt-4">
                                <img src="<?php echo base_url() ?>imagens/site/img_full2.png" style="width: 100%; height: 100px" class="img-fluid" alt="Headphone">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <?php if ($mobile_view == 0) { ?>
                <div id="promocao" class="viewed mx-auto" style="width: 100%; height: 600px; margin-top: 2%;">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="bbb_viewed_title_container container" style="width:80%">
                                    <h3 class="bbb_viewed_title">Destaques</h3>
                                    <div class="bbb_viewed_nav_container">
                                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                                    </div>
                                </div>
                                <div class="bbb_viewed_slider_container">
                                    <div class="owl-carousel owl-theme bbb_viewed_slider carousel">
                                        <?php foreach ($destaques as $destaque) { ?>
                                            <div class="owl-item item">
                                                <div class="thumb-wrapper">
                                                    <div class="img-box">
                                                        <img src="<?php echo base_url($destaque['produto_imagem']) ?>" class="img-fluid" alt="Headphone">
                                                    </div>
                                                    <div class="thumb-content">
                                                        <h5 class="servico-titulo2"><?= ucfirst(mb_strtolower($destaque['produto_nome'])) ?></h5>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                        <?php if ($destaque['produto_promocao']) { ?>
                                                            <p class="item-price"><strike style="color: #007bff;">R$ <?php echo number_format($destaque['produto_valor'], 2, ',', '.') ?></strike><br><b>R$ <?php echo number_format($destaque['produto_promocao'], 2, ',', '.') ?></b></p>
                                                        <?php } else { ?>
                                                            <br>
                                                            <p class="item-price"><b>R$ <?php echo number_format($destaque['produto_valor'], 2, ',', '.') ?></b></p>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/') . $destaque['produto_id'] ?>" class="btn btn-primary">Ver mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div id="destaques-mobile" style="width: 100%; margin-top: 15%; margin-bottom: 15%;">
                    <div class="bbb_viewed_title_container container" style="width: 80%;">
                        <h3 class="bbb_viewed_title">Destaques</h3>
                    </div>
                    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel2">
                        <div class="carousel-inner">
                            <?php $aux = 1;
                            foreach ($destaques as $destaque) { ?>
                                <div class="carousel-item <?php if ($aux == 1) {
                                                                echo 'active';
                                                            } ?>">
                                    <div class="card-body mx-auto" style="margin-top: 10%; margin-bottom: 10%; height: 300px; border-bottom: 7px solid #EC9706; border-radius: 7px; width: 60%; box-shadow: -1px 8px 39px 1px rgba(0,0,0,0.35); -webkit-box-shadow: -2px 6px 17px 4px rgb(0 0 0 / 20%); -moz-box-shadow: -1px 8px 39px 1px rgba(0,0,0,0.35);">
                                        <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/') . $destaque['produto_id'] ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img class="d-block mx-auto limite-largura-prod2-img" style="height: 100px; width: auto; max-width: 105px;" src="<?php echo base_url($destaque['produto_imagem']) ?>">
                                                </div>

                                                <div class="col-md-12 text-center">
                                                    <p class="text-center stars">
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                    </p>
                                                    <p class="text-center prod-departamento servico-titulo2"><span style="font-size: 13px;"><b style="color: var(--base-color);"><?= ucfirst(mb_strtolower($destaque['produto_nome'])) ?></b></span></p>
                                                    <?php if ($destaque['produto_promocao']) { ?>
                                                        <div class="col-12 col-md-12 text-center div-preco">
                                                            <strike>R$ <?php echo number_format($destaque['produto_valor'], 2, ',', '.') ?></strike><br>
                                                            <p class="text-center btn btn-primary prod-preco" style="height: 27px; background-color: white; color: var(--base-color); border-color: var(--base-color);"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($destaque['produto_promocao'], 2, ',', '.') ?></b></p>
                                                            <p class="text-center prod-departamento" style="margin-top: -10%;"><span style="font-size: 13px; color: #828282;"><?= $p['produto_qtd_parcela'] ?></span></p>
                                                        </div>
                                                    <?php } else { ?>
                                                        <strike hidden class="old-preco">text</strike><br>
                                                        <p class="text-center btn btn-primary prod-preco" style="height: 15%; background-color: white; color: var(--base-color); border-color: var(--base-color);"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($destaque['produto_valor'], 2, ',', '.') ?></b></p>
                                                        <p class="text-center prod-departamento" style="margin-top: -10%;"><span style="font-size: 13px; color: #828282;"><?= $p['produto_qtd_parcela'] ?></span></p>
                                                    <?php }
                                                    $cont++; ?>
                                                    <!-- <button type="button" class="btn-main"><i style="font-size: 16px" class="fa fa-cart-plus" aria-hidden="true"></i> COMPRAR</button> -->
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php $aux++;
                            } ?>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                            <span class="" aria-hidden="true"><i class="fas fa-chevron-left" style="color: #bfbfbf; font-size: 30px;"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                            <span class="" aria-hidden="true"><i class="fas fa-chevron-right" style="color: #bfbfbf; font-size: 30px;"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            <?php } ?>

            <?php if ($mobile_view == 0) { ?>
                <!-- Parallax -->
                <section class="parallax parallax2 w-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                    <div class="parallax-overlay">
                        <div class="row w-100">
                            <div class="col-md-12">
                                <h3 class="text-center"></h3>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>

            <!-- Veja também -->
            <section id="veja-tbm" class="container" style="margin-top: 7%; width: 80% ">
                <?php if ($vejatbm) { ?>
                    <div class="bbb_viewed_title_container container">
                        <h3 class="bbb_viewed_title">Veja Também</h3>
                    </div>
                    <div class="row" style="margin-top:2%">
                        <?php $cont = 1;
                        foreach ($vejatbm as $vj) { ?>
                            <?php $aux_nome = explode(' ', $vj['produto_nome'], 2) ?>
                            <?php if ($mobile_view == 0) { ?>
                                <div class="col-sm-2 form-group" style="<?php if ($mobile_view == 1) { ?> width: 60%; <?php if ($cont % 2 == 0) {
                                                                                                                        echo 'margin-right: -10%;';
                                                                                                                    } else {
                                                                                                                        echo 'margin-left: -10%;';
                                                                                                                    } ?><?php } ?>">
                                    <div class="card zoom card-relacionados" style="border-radius: 7px;">
                                        <div class="card-body" style="height: 300px; border-bottom: 7px solid #EC9706; border-radius: 7px; padding: 10% 0 0 0;">
                                            <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/') . $vj['produto_id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding: 0 1.25rem;">
                                                        <img class="d-block mx-auto limite-largura-prod2-img" style="height: 100px; width: auto; max-width: 105px;" src="<?php echo base_url($vj['produto_imagem']) ?>">
                                                    </div>

                                                    <div class="col-md-12 text-center">
                                                        <p class="text-center stars" style="padding: 0 1.25rem;">
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        </p>
                                                        <p class="text-center prod-departamento servico-titulo2" style="padding: 0 1.25rem;"><span style="font-size: 13px;"><b style="color: var(--base-color);"><?= ucfirst(mb_strtolower($vj['produto_nome'])) ?></b></span></p>
                                                        <?php if ($vj['produto_promocao']) { ?>
                                                            <strike class="old-preco" style="font-size: 13px">R$ <?php echo number_format($vj['produto_valor'], 2, ',', '.') ?></strike><br>
                                                            <p class="text-center btn btn-primary prod-preco"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($vj['produto_promocao'], 2, ',', '.') ?></b></p>
                                                        <?php } else { ?>
                                                            <strike hidden class="old-preco" style="font-size: 13px">R$ 9999,99</strike><br>
                                                            <p class="text-center btn btn-primary prod-preco"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($vj['produto_valor'], 2, ',', '.') ?></b></p>
                                                        <?php }
                                                        $cont++; ?>
                                                        <!-- <button type="button" class="btn-main"><i style="font-size: 16px" class="fa fa-cart-plus" aria-hidden="true"></i> COMPRAR</button> -->
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-4 form-group margin-card-ipad" style="width: 60%; <?php if ($cont % 2 == 0) {
                                                                                                            echo 'margin-right: -10%;';
                                                                                                        } else {
                                                                                                            echo 'margin-left: -10%;';
                                                                                                        } ?>">
                                    <div class="card zoom card-relacionados" style="border-radius: 7px;">
                                        <div class="card-body" style="height: 300px; border-bottom: 7px solid #EC9706; border-radius: 7px;">
                                            <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/') . $vj['produto_id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img class="d-block mx-auto limite-largura-prod2-img" style="height: 100px; width: auto; max-width: 105px;" src="<?php echo base_url($vj['produto_imagem']) ?>">
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
                                                        <?php if ($vj['produto_promocao']) { ?>
                                                            <div class="text-center div-preco">
                                                                <strike>R$ <?php echo number_format($vj['produto_valor'], 2, ',', '.') ?></strike><br>
                                                                <p class="text-center btn btn-primary prod-preco"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($vj['produto_promocao'], 2, ',', '.') ?></b></p>
                                                                <p class="text-center prod-departamento" style="margin-top: -5%;"><span style="font-size: 13px; color: #828282;"><?= $vj['produto_qtd_parcela'] ?></span></p>
                                                            </div>
                                                        <?php } else { ?>
                                                            <strike class="old-preco" hidden>text</strike><br>
                                                            <p class="text-center btn btn-primary prod-preco"><b class="prod-preco-txt" style="font-size: 14px; position: relative; bottom: 8px;">R$ <?php echo number_format($vj['produto_valor'], 2, ',', '.') ?></b></p>
                                                            <?php if ($vj['produto_parcelamento'] == 0) { ?>
                                                                <p class="text-center prod-departamento" style="margin-top: -10%;"><span style="font-size: 13px; color: #828282;"><?= $vj['produto_qtd_parcela'] ?></span></p>
                                                            <?php } ?>
                                                        <?php }
                                                        $cont++; ?>
                                                        <!-- <button type="button" class="btn-main"><i style="font-size: 16px" class="fa fa-cart-plus" aria-hidden="true"></i> COMPRAR</button> -->
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        <?php } ?>
                    </div>
                <?php } ?>
            </section>

            <!-- Perguntas Start -->
            <div id="perguntas " class="faqs divPrincipalPerguntas" style="overflow-x: hidden;">
                <div class="container-xxl py-5" style="padding-bottom: 10% !important;">
                    <div class="bbb_viewed_title_container container">
                        <h3 class="bbb_viewed_title">Perguntas Frequentes</h3>
                    </div>
                    <div class="container" style="margin-top: 2%">
                        <div class="row perguntas-largura-mobile">
                            <?php if ($mobile_view == 0) { ?>
                                <div class="col-md-6">
                                    <div id="accordion-1">
                                        <?php foreach ($accordion1 as $perguntas) { ?>
                                            <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                                <div class="card-header">
                                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse<?= $perguntas['pergunta_id']; ?>">
                                                        <?= $perguntas['pergunta_titulo']; ?>
                                                    </a>
                                                </div>
                                                <div id="collapse<?= $perguntas['pergunta_id']; ?>" class="collapse" data-parent="#accordion-1">
                                                    <div class="card-body">
                                                        <?= $perguntas['pergunta_resposta']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="accordion-2">
                                        <?php foreach ($accordion2 as $perguntas) { ?>
                                            <div class="card wow fadeInLeft" data-wow-delay="0.2s">
                                                <div class="card-header">
                                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse<?= $perguntas['pergunta_id']; ?>">
                                                        <?= $perguntas['pergunta_titulo']; ?>
                                                    </a>
                                                </div>
                                                <div id="collapse<?= $perguntas['pergunta_id']; ?>" class="collapse" data-parent="#accordion-1">
                                                    <div class="card-body">
                                                        <?= $perguntas['pergunta_resposta']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } else { ?>

                                <!-- ========================================== PERGUNTAS MOBILE =================================== -->

                                <div id="accordion-1" style="width: 100%;">
                                    <?php foreach ($accordionM as $perguntas) { ?>
                                        <div class="card wow fadeInRight" data-wow-delay="0.5s">
                                            <div class="card-header">
                                                <a class="card-link collapsed" data-toggle="collapse" href="#collapse<?= $perguntas['pergunta_id']; ?>">
                                                    <?= $perguntas['pergunta_titulo']; ?>
                                                </a>
                                            </div>
                                            <div id="collapse<?= $perguntas['pergunta_id']; ?>" class="collapse" data-parent="#accordion-1">
                                                <div class="card-body">
                                                    <?= $perguntas['pergunta_resposta']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Depoimentos Start -->
    <div class="container-xxl mx-auto px-2 d-none" style="padding-bottom: 2% !important;  width: 80%">
        <div class="bbb_viewed_title_container container">
            <h3 class="bbb_viewed_title">Depoimentos</h3>
        </div>
    </div>

    <?php if ($mobile_view == 0) { ?>

        <div id="depoimentos" class="d-none p-0">
            <div class="testimonial py-5 bg-dark d-flex align-items-center" style="height: 300px;">
                <div id="carouselExampleControls3" class="carousel slide w-100" data-ride="carousel3">
                    <div class="carousel-inner">
                        <?php $cont = 1;
                        foreach ($depoimentos as $depoimento) { ?>
                            <?php if ($depoimento['depoimento_ativoimagem'] == 0) { ?>
                                <div class="carousel-item <?php if ($cont == 1) {
                                                                echo 'active';
                                                            } ?>">
                                    <div class="card-dep text-center" style="justify-content: center;">
                                        <h3><?= $depoimento['depoimento_titulo'] ?></h3>
                                        <p><?= $depoimento['depoimento_texto'] ?></p>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="carousel-item <?php if ($cont == 1) {
                                                                echo 'active';
                                                            } ?>">
                                    <div class="card-dep text-center" style="justify-content: center;">
                                        <h3><?= $depoimento['depoimento_titulo'] ?></h3>
                                        <img id="myImg<?= $depoimento['depoimento_id'] ?>" class="mx-auto" src="<?php echo base_url($depoimento['depoimento_anexo']) ?>" alt="<?= $depoimento['depoimento_titulo'] ?>" style="width:80%">
                                    </div>
                                </div>
                            <?php } ?>
                        <?php $cont++;
                        } ?>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                        <span class="" aria-hidden="true"><i class="fas fa-chevron-left" style="color: white; font-size: 30px; position: relative; left: -48px;"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                        <span class="" aria-hidden="true"><i class="fas fa-chevron-right" style="color: white; font-size: 30px; position: relative; right: -48px;"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!--card-dep-->
        <div id="depoimentos-mobile" class="d-none testimonial" style="width: 100%; margin-top: 5%; height: 310px; padding: 15%;">
            <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel3">
                <div class="carousel-inner">
                    <?php $cont = 1;
                    foreach ($depoimentos as $depoimento) { ?>
                        <?php if ($depoimento['depoimento_ativoimagem'] == 0) { ?>
                            <div class="carousel-item <?php if ($cont == 1) {
                                                            echo 'active';
                                                        } ?>">
                                <div class="card-dep">
                                    <h3><a href="#"><?= $depoimento['depoimento_titulo'] ?></:></a></h3>
                                    <p><?= $depoimento['depoimento_texto'] ?></p>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="carousel-item <?php if ($cont == 1) {
                                                            echo 'active';
                                                        } ?>">
                                <div class="card-dep">
                                    <h3><a href="#"><?= $depoimento['depoimento_titulo'] ?></:></a></h3>
                                    <img id="myImg<?= $depoimento['depoimento_id'] ?>" class="mx-auto" src="<?php echo base_url($depoimento['depoimento_anexo']) ?>" alt="<?= $depoimento['depoimento_titulo'] ?>" style="width:80%">
                                </div>
                            </div>
                        <?php } ?>
                    <?php $cont++;
                    } ?>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                    <span class="" aria-hidden="true"><i class="fas fa-chevron-left" style="color: white; font-size: 30px; position: relative; left: -48px;"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                    <span class="" aria-hidden="true"><i class="fas fa-chevron-right" style="color: white; font-size: 30px; position: relative; right: -48px;"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <?php } ?>
    <!-- Depoimentos End -->
</main>



<div id="myModal" class="modal" style="z-index: 100">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>

<?php foreach ($depoimentos as $depoimento) { ?>
    <?php if ($depoimento['depoimento_ativoimagem'] == 1) { ?>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg<?= $depoimento['depoimento_id'] ?>");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        </script>
    <?php } ?>
<?php } ?>

<style>
    /* Style the Image Used to Trigger the Modal */
    #myImg {
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    #myModal .modal-content {
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
    .modal-content,
    #caption {
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }




    #depoimentos p {
        color: #999999;
        font-weight: 300;
    }

    #depoimentos a {
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    #depoimentos a,
    a:hover {
        text-decoration: none !important;
    }

    #depoimentos .content {
        padding: 7rem 0;
    }

    #depoimentos h2 {
        font-size: 20px;
    }


    #depoimentos .owl-item {
        width: 428px !important;
        margin-right: 20px;
        height: auto;
        padding: 1%;
        background: white;
    }

    #depoimentos .media-29101 {
        text-align: center;
    }

    #depoimentos .media-29101 h3 {
        font-size: 18px;
        font-weight: 900 !important;
        margin-bottom: 30px;
    }

    #depoimentos .media-29101 h3 a {
        color: #6c757d;
    }

    #depoimentos .owl-2-style .owl-nav {
        display: none;
    }
</style>

<script>
    $(function() {

        if ($('.owl-2').length > 0) {
            $('.owl-2').owlCarousel({
                center: false,
                items: 1,
                loop: true,
                stagePadding: 0,
                margin: 20,
                smartSpeed: 1000,
                autoplay: true,
                nav: true,
                dots: false,
                pauseOnHover: false,
                responsive: {
                    600: {
                        margin: 20,
                        nav: true,
                        items: 2
                    },
                    1000: {
                        margin: 20,
                        stagePadding: 0,
                        nav: true,
                        items: 3
                    }
                }
            });
        }
    })
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 3000
        });

        $('.carousel').carousel('cycle');
    });
</script>


<script>
    $(document).ready(function() {
        <?php if ($this->session->userdata('ebook_solicitado')) { ?>
            $('#baixarTesteModal').modal('show');
            <?php $this->session->unset_userdata('ebook_solicitado') ?>
        <?php } ?>
    });
</script>