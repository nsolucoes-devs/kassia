    <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        $aux = 0;
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $aux = 1;
        } else {
            $aux = 0;
        }
    ?>
    <style>
        .c3-b{max-width: 25%; flex: 0 0 25%; padding-right: 15px; padding-left: 15px; display: inline;}.f-white{color: black; font-size: 50px; line-height: 13px;}.social-media-b{padding: 0 20px; margin: 3px 8px 0 8px; cursor: pointer; margin-right: 36px; display: inline;}
        
        #mapa {
            height: 220px;
            width: 100%;
        }
    </style>
<main style="background-color: #fbf7ef;">
    <div style="position: relative">
        <img class="d-block w-100 banner_top" src="<?php echo base_url('imagens/site/banner_contato.png'); ?>">
    </div>
        <!--?  Contact Area start  -->
        <section class="contact-section" style="width: 80%; margin-left: 10%; margin-right: 10%; padding-top: 40px">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8">
                        <h2 class="contact-title" style="text-align: center">FALE CONOSCO</h2>
                        <form id="form-contact" class="form-contact" action="<?php echo base_url('inicio/enviaEmail');?>" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input style="background-color: white; border-radius: 4px;" class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome Completo'" placeholder="Nome Completo" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input style="background-color: white; border-radius: 4px;" class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder="E-mail" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group" style="height: 89px;">
                                        <textarea  style="background-color: white; border-radius: 4px; height: 100px" class="form-control w-70" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensagem'" placeholder=" Mensagem" required></textarea required>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <button type="button" style="border-color: #3a0b0c; border-radius: 4px; background: #3a0b0c; color: white!important; width: 100%; height: 75px; font-size: 18px" class="button button-contactForm boxed-btn g-recaptcha" data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit' data-action='submit'>Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-lg-3 offset-lg-1" style="margin-top: 10px">
                        <label style="font-size: 13px;">Entre em contato:</label>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i style="color: #3a0b0c;" class="fa fa-whatsapp"></i></span>
                            <div class="media-body" style="margin-top: 5px; margin-left: -15px;">
                                <h3>+55 <span class="telefone"><?php echo $whats ?></span></h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span style="margin-top: -5%;" class="contact-info__icon"><i style="color: #3a0b0c;" class="fa fa-phone"></i></span>
                            <div class="media-body" style="margin-top: -3%; margin-left: -15px;">
                                <h3>+55 <span class="telefone"><?php echo $telefone ?></span></h3>
                            </div>
                        </div>
                        <label style="font-size: 13px;">Faça uma Visita:</label>
                        <div class="c3-b">
                            <p class="f-white">
                                <a href="<?php echo $facebook ?>" target="_blank">
                                    <i style="padding: 0 7px; color: #3a0b0c; font-size: 35px" class="socialmedia-b fa fa-facebook-square"></i>
                                </a>
                                <a href="<?php echo $instagram ?>" target="_blank">
                                    <i style="margin-left: 5px; padding: 0 5px; color: #3a0b0c; font-size: 35px" class="socialmedia-b fa fa-instagram"></i>
                                </a>
                                <a href="<?php echo $twitter ?>" target="_blank">
                                    <i style="padding: 0 9px; color: #3a0b0c; font-size: 37px" class="socialmedia-b fa fa-twitter"></i>
                                </a>
                            </p>
                        </div>
                        <label style="font-size: 13px; margin-top: 25px; margin-left: -7%">Mande um E-mail:</label>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i  style="color: #3a0b0c;" class="fa fa-envelope"></i></span>
                            <div class="media-body"  style="margin-top: 5px; margin-left: -15px;">
                                <h3><?php echo $email ?></h3>
                            </div>
                        </div>
                        <label style="font-size: 13px;">Endereço:</label>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i  style="color: #3a0b0c;" class="fa fa-map-marker"></i></span>
                            <div class="media-body"  style="margin-top: 5px; margin-left: -15px;">
                                <h3><?php echo $endereco ?></h3>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-12">
                        <div id="mapa">
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Contact Area End -->
    </main>
  
    
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
<script src='<?php echo base_url('recursos/js/material/plugins/sweetalert2.js');?>'></script>

<script>

  function inicializar() {
    var coordenadas = {lat: -21.419905488581186, lng: -45.9572720956619};
    
    var mapa = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 15,
      center: coordenadas 
    });

    var marker = new google.maps.Marker({
      position: coordenadas,
      map: mapa,
      title: 'Meu marcador'
    });
  }
</script>

<script async defersrc="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhFD_MfhHVpH-Lu6EHOszqJLX9YcsaoBs&callback=inicializar">
</script>

<script>
    $(document).ready(function(){
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.telefone').mask(SPMaskBehavior, spOptions);
        
        <?php if(isset($mensagem_contato)) { ?>
                <?php if($mensagem_contato == 1){ ?>
                    Swal.fire({
                        type: 'success',
                        title: 'Email enviado!',
                    })
                <?php } ?>
        <?php } ?>
    });
</script>

<script>
   function onSubmit(token) {
        document.getElementById("form-contact").submit();
   }
</script>

