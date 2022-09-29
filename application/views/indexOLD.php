
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
    .card-relacionados{cursor: pointer;border-radius: 10px;border: 0;box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.2);}
    .prod-preco{margin-bottom: 10px;font-size: 21px;color: black;text-align: center;font-weight: 700;}
    .stars{margin-top: 15px;margin-bottom: 0px;line-height: 0px;}
    .zoom:hover{box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px;}
    .text-ebook{ text-shadow: 2px 2px #f9c716;display: initial;position: relative;top: 30px;left: 35%;color: black;font-weight: 900;font-size: 50px;}
    .button-ebook{position: relative;left: 71%;top: 50%!important;;width: auto;background: #fbab02;border-color: #232323; border-width: 1.5!important;}
    .divLeft{ padding: 5% 4%;padding-bottom: 0!important;background: #f9c716;margin-bottom: 3rem!important;}
    .divEbook{margin-top:1%; background-size: 100% 100%; height:285px; /*<?php if($mobile_view == 0){ ?>background-image: url(imagens/site/banner1.png);<?php } ?>*/}
    .questao-pergunta{font-size: 22px;color: black;font-weight: 700;}
    .questao-resposta{font-size: 18px;color: #f9c716;font-weight: 500;padding-left: 5%;background: black;border-radius: 10px;}
    .card-header{border-radius: 20px!important; background: #f9c716;margin: 20px 0;}
    .collapse{position: relative;top: -35px;width: 97%;left: 2%;border-radius: 11px!important;}
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
    @media ( min-width: 1399px ) {

    }
    .carousel{
        top: 55px;
    }
</style>

<style>
    .carousel-caption{
        bottom: 82px!important;
    }
</style>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<main style="position: relative; background: white;">
    

    <div class="section-content">
        <div class="row" style="<?php if($mobile_view == 0){ ?> margin-top: 45px <?php }else{ ?> margin-top: -10px!important <?php } ?>">
            
            
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
                <div class="col-xl-12 form-group divEbook" style="background-image: url(<?php echo $site['banner_principal1']?>);">
                    <div class="row">
                        <div class="col-md-6" style="height: 285px;">
                            <div style="position: relative; top: 12px; width: 44%; left: 9%; text-align: center;">
                                <h1 style="font-weight: 700; font-size: 60px;">
                                    REGISTRE
                                </h1>
                                <h3 style="font-weight: 600;">
                                    SUA MARCA
                                </h3>
                            </div>
                            <div style="width: 54%; position: relative; top: 29px; left: 6%; font-weight: 500;">
                                <label style="padding-bottom: 3%"> 
                                    Sua marca reflete a reputação e o valor do seu produto ou serviço.
                                </label>
                                <label>
                                    Registre para ter segurança e maior poder de alcance e visibilidade de sua marca.
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" style="height: 285px;">
                            <div style="position: relative; top: 60px; left: 53%; width: 30%;">
                                <label style="text-align: center; font-weight: 700; padding-bottom: 5%;">
                                    E-book<br>A importância do registro de Marca
                                </label>
                                <button class="button-ebook btn btn-primary" style="left: 31%!important;" data-toggle="modal" data-target="#ebookModal">
                                    Baixar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            
            <?php foreach($produtos as $p){ ?>
            
            <div class="col-xl-12 col-md-12 col-12 form-group divPrincipalServico side-padding-mobile card-plus-position" style="padding-top: 4%; padding-left: 2%; padding-right: 2%;">
                <div class="card zoom card-relacionados"<?php if($mobile_view == 1){?> style="position: relative; left: 0.5%;"<?php } ?>>
                    <div class="card-body">
                        <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'). $p['produto_id'] ?>">
                            <div class="form-group row">
                                <div class="text-center col-md-6 divImagemServico">
                                    <img style="<?php if($mobile_view == 0){ ?>width: 400px;<?php }else{ ?> width: 300px; margin-left: 2.5%;<?php } ?>" class="d-block imagem-servico" src="<?php echo base_url($p['produto_imagem'])?>">
                                </div>
                                
                                <div class="col-xl-6" style="padding-top: 5%;">
                                    <p class="m-0 p-0" style="margin-top: 5%; text-align: center; color: #444; font-size: 30px; font-weight: 700">
                                        <?php echo ucfirst($p['produto_nome']) ?>
                                    </p>
                                    <p style="text-align: center; color: #444; font-size: 13px; font-weight: 500">
                                        <?php echo ucfirst($p['produto_subtitulo']) ?>
                                    </p>
                                    <p class="pResumo">
                                        <?php echo ucfirst($p['produto_resumo']) ?>
                                    </p>

                                    <p class="text-center stars" style="margin-top: 5%; padding-bottom: 5%">
                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                        <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                    </p>
                                    
                                    <!--<p class="prod-preco">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></p>-->
                                    
                                    <button class="btn btn-primary btn-block btnServico">
                                        <span style="font-weight: 900; font-size: 18px">Quero Contratar</span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <div class="divPrincipalPerguntas">
                <div class="col-xl-12 text-center" style="margin-bottom: 5%">
                    <p class="perguntas-mobile" style="color: black; font-size: 50px; font-weight: 900"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Perguntas e Respostas</p>
                </div>
                
                <div id="accordion" style="width: 89%; margin-bottom: 5%; position: relative; left: 7%;">
                  <div class="card" style="border: 0">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="questao-pergunta btn btn-link btn-decoration" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Quais tipos de marca posso registrar?
                        </button>
                      </h5>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body questao-resposta">
                        Nominativa, figurativa ou mista.
                      </div>
                    </div>
                  </div>
                  <div class="card" style="border: 0">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Nomes pessoais podem ser registrado como marca?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body questao-resposta">
                        Sim. A utilização do nome de forma comercial é totalmente diferente da utilização do nome no seu dia a dia.
                      </div>
                    </div>
                  </div>
                  <div class="card" style="border: 0">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Se eu não registrar minha marca alguém pode exigir que eu deixe de usá-la?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body questao-resposta">
                        Sim. Caso outra pessoa tenha registrado uma igual ou muito semelhante, ela pode exigir que você deixe de utilizar, sob pena de ter que pagar indenizações.
                      </div>
                    </div>
                  </div>
                  <div class="card" style="border: 0">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Posso ter várias marca em só uma empresa?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body questao-resposta">
                        Sim. Uma empresa pode ter diversos produtos ou serviços, e ter uma marca para cada um. Até mesmo um mesmo produto pode ter mais de uma marca ou variações desta.
                      </div>
                    </div>
                  </div>
                  <div class="card" style="border: 0">
                    <div class="card-header" id="headingFive">
                      <h5 class="mb-0">
                        <button class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Quanto vale uma marca?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="card-body questao-resposta">
                        Depende de como você a usa, do produto ou serviço que ela representa, etc. Marcas famosas chegam a valer dezenas de bilhões de dólares. Não deixe para descobrir o valor da sua depois que alguém tiver registrado antes de você.
                      </div>
                    </div>
                  </div>
                  <div class="card" style="border: 0">
                    <div class="card-header" id="headingSix">
                      <h5 class="mb-0">
                        <button style="text-align: left;" class="questao-pergunta btn btn-link collapsed btn-decoration" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          Posso contratar apenas a 2ª Etapa, para o registro, sem ter contratado a 1ª Etapa?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                      <div class="card-body questao-resposta">
                        Não. A ausencia de análise pode causar grande decepção para quem realiza o pedido de registro e, depois de muito tempo, descobre que era totalmente inviável seu pedido.
                      </div>
                    </div>
                  </div>
                </div>
            </div>
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
    
    <!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    
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