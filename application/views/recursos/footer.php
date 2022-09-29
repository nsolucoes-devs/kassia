    <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile_view = true;
        } else {
            $mobile_view = false;
        }
    ?>
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome5/css/all.css">
    
    <style>    
        .footer{background-color: var(--base-color); z-index: 99;}
        .f-white{color: white; font-size: 11px; line-height: 13px; margin-bottom: 5px;}
        .f-white b{color: white; font-size: 11px; line-height: 13px; margin-bottom: 5px; font-weight: bold;}
        .cookie-pc { width: 100%; display: block; padding: 10px 20px; }
        .cookie-mob { width: 100%; display: none; }
        #div_cookies { z-index: 1000; position: fixed; bottom: 10px; width: 80%; margin-left: 10%; margin-right: 10%; background-color: white; -webkit-box-shadow: 0 0 10px grey; box-shadow: 0 0 10px grey; }
        .cookie-10 { flex: 0 0 83.33%; max-width: 83.33%; width: 83.33%; float: left; padding: 10px 20px; }
        .cookie-2 { flex: 0 0 16.66%; max-width: 16.66%; width: 16.66%; height: 100%; float: left; position: relative; }
        .frase { font-size: 12px; color: black; font-weight: bold; margin-bottom: 10px; text-align: justify; line-height: 20px; margin-bottom: 0; }
        #acc_cookies, #acc_cookies2 { color: white; border-radius: 0; padding: 15px 20px 15px 20px; font-size: 14px; width: 100%; height: 100%; background-color: #7800a7; border-color: #7800a7; }
        #acc_cookies2 { display: none; }
        #footer-mob{display: none;}
        .large-modal{width: 70%; max-width: 70%;}
        .espacamento-icone{margin: 5%;}
        
        /* XX-Small devices (300px and up) */ 
        @media ( min-width: 299px ) and ( max-width: 398px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
        }
        /* X-Small devices (iPhone and others mobiles, 400px and up) */ 
        @media ( min-width: 399px ) and ( max-width: 574px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
            .espacamento-icone{margin-right: 15%;}
        }
        /* Small devices (landscape phones, 576px and up) */ 
        @media ( min-width: 575px ) and ( max-width: 766px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
        }
        /* Medium devices (tablets, 768px and up) */ 
        @media ( min-width: 767px ) and ( max-width: 990px ){
            <?php $tablet = 1; ?>
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
            .div-social{margin-top: -3%;}
            .formas-pagamento-ipad{margin: -7% 4% 0% 4%!important;}
        }
        /* Large devices (desktops, 992px and up) */ 
        @media ( min-width: 991px ) and ( max-width: 1198px ){
            <?php $tablet = 1; ?>
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
            .div-social{margin-top: -3%;}
            .formas-pagamento-ipad{margin: -7% 4% 0% 4%!important;}
        }
        /* X-Large devices (large desktops, 1200px and up) */ 
        @media ( min-width: 1199px ) and ( max-width: 1398px ){
        }
        /* XX-Large devices (larger desktops, 1400px and up) */ 
        @media ( min-width: 1399px ){
        }
        #back-top{left: 15px; right: unset; bottom: 52px; background-color: grey; border-color: grey; opacity: 0.7; box-shadow: unset; z-index: 999; display: none;}
        .link-footer{cursor: pointer;}
        .p-footer{color: #a7a7a7;; margin: 0; padding: 0; font-size: 12px; line-height: 18px; cursor: pointer;}
        .p-footer:hover{color: white;}
        
        footer {
          width: 100%;
          font-size: 100px;
          background: var(--base-color);
        }
        
        .social-footer{
            font-size: 25px;
            position: absolute;
            color: white;
        }
        
        .social-footer:hover{
            color: #d4d3cf;
        }
        
        .fa-arrow-up{
            color: black;
        }
        
        .copyright {
            padding: 25px 0;
            font-size: 15px;
            border-top: 1px solid rgba(256, 256, 256, .1);
}
        
        #back-top{
            background: #EC9706;/*afd4fa*/
            color: black;
            left: unset;
            right: 20px;
            position: fixed;
            border-radius: 100%;
            padding: 5px 16px;
        }
        
        .new-cookie{
            visibility: hidden;
        }
        #new-cookie{
            z-index: 1000;
            position: fixed;
            width: 100%;
            margin-left: 0;
            margin-right: 0;
            background-color: white;
            bottom: 0;
            visibility: visible;
            box-shadow: 0px 0 10px rgba(0, 0, 0, 0.8);
        }
        .new-cookie-btn{
            font-size: 11px;
            margin-top: -4px;
            color: white;
            border: 2px solid #3a0b0c;
            background-color: #3a0b0c;
        }
        
        <?php if($mobile_view){ ?>
            #back-top{
                float: right;
            }
        <?php } ?>
        
        #footer-pc .row{
             margin-left: 0;
             margin-right: 0;
        }
        
        p a{
            border: 0!important;
        }
        
        p a:hover{
            background: 0;
        }

        .form-control.x{
            border: 1px solid #999999; 
            border-radius: 5px; 
            color: black; 
            width: 100%; 
            height: 34px; 
            font-size: 15px;
        }
        
        .btn-file{
            font-size: 15px; 
            padding: .375rem .85rem; 
            line-height: 1.5; 
            color: white; 
            border-radius: 5px; 
            width: 50%; 
            height: 34px; 
            background-color: #7800a7; 
            border: 1px solid #7800a7; 
            cursor: pointer;
        }
        
        .input-file{
            display: none;
        }
        
        .msg-file{
            margin-left: 10px; 
            font-size: 12px;
        }
            
        #reembolsoModal .form-group{
            margin-bottom: 15px;
        }
        
        .ree_h3{
            font-family: "Poppins",sans-serif; 
            color: black; 
            font-size: 12px; 
            font-weight: bold; 
            margin-bottom: 0px;
        }
        
        .ree_hr{
            margin-top: 15px; 
            border: 0; 
            height: 1px; 
            border-bottom: 1px solid #e9ecef;
        }
        
        .ree_alert{
            font-size: 12px; 
            color: red;
        }
        
        .select2{
            width: 100%!important;
        }
    </style>

    <!--<div class="row" id="div_cookies" style="display: none">-->
    <!--    <div class="cookie-pc">-->
    <!--        <div class="cookie-10">-->
    <!--            <p class="frase">Usamos cookies para melhorar a sua experiência em nossa plataforma. Ao continuar navegando, você concorda com a nossa <a style="color: red; cursor: pointer" onclick="showPrivacidade()">Política de Privacidade</a>.</p>-->
    <!--        </div>-->
    <!--        <div class="cookie-2">-->
    <!--            <button type="button" id="acc_cookies" class="btn header-btn">Continuar e Fechar</button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="cookie-mob">-->
    <!--        <div class="cookie-12">-->
    <!--            <p class="frase">Usamos cookies para melhorar a sua experiência em nossa plataforma. Ao continuar navegando, você concorda com a nossa <a style="color: red; cursor: pointer" onclick="showPrivacidade()">Política de Privacidade</a>.</p>-->
    <!--            <button type="button" id="acc_cookies2" class="btn header-btn">Continuar</button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="row new-cookie" id="new-cookie" style="display: none">
        <div class="cookie-pc col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <p class="frase" style="margin-top: 5px;">Ao clicar em "Aceitar e Fechar", você concorda com o armazenamento de cookies em seu dispositivo. Para mais detalhes, leia nossa <span data-toggle="modal" data-target="#privacidade" style="color: red; cursor: pointer">Política de Privacidade</span>.</p>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" onclick="acceptCookie()" style="height: auto; padding: 4px;">Aceitar e Fechar</button>
                </div>
            </div>
        </div>
        
        <div class="cookie-mob col-md-12">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 30px">
                    <p class="frase text-center" style="margin-top: 5px;">Nós usamos cookies para aprimorar seu acesso.<br> Ver <a style="color: red" data-toggle="modal" data-target="#privacidade">Política de Privacidade</a>.</p>
                </div>
                <div class="col-md-12 text-center" style="margin-bottom: 10px">
                    <button type="button" class="btn btn-primary" onclick="acceptCookie()" style="height: auto; padding: 4px;">Aceitar e Fechar</button>
                </div>
            </div>
        </div>
    </div>
    </main>
    
    <footer <?php if($mobile_view == 1){ ?>style="margin-bottom: -5%;"<?php } ?>>
        <!-- Footer Start-->
        <div id="footer-pc" class="bg-black" style="width: 100%; padding-top: 5%;"><!--ec9706-->
            <!--<div class="row" style="width: 100%; height: 157px;">-->
                
                <!--<hr style= "width: 53%; background-color: white; position: relative; bottom: 60px; left: 23%;">-->
            <!--</div>-->
            <div class="row">
                <div class="col-md-2 text-center">
                    <div class="row">
                        <a href="<?php echo base_url() ?>" style="position: relative; top: -52px;">
                            <img src="<?php echo base_url('imagens/site/logo.png') ?>" style="width: 60%; margin-bottom: 15px; margin-left: 18%;">
                        </a>
                    </div>
                    <div class="row" style="position: relative; top: -30%;">
                        <div class="col-md-4">
                            <a href="https://www.facebook.com//?ref=bookmarks" target="_blank">
                                <i class="social-footer fab fa-facebook" aria-hidden="true" style="color: #ec9706;"></i>
                            </a>
                            <?php //if(isset($facebook)){ ?>
                                <!--<a href="<?php echo $facebook ?>" target="_blank">-->
                                <!--    <i class="social-footer fab fa-facebook-square" aria-hidden="true"></i>-->
                                <!--</a>-->
                            <?php //} ?>
                        </div>
                        <div class="col-md-4">
                            <a href="https://www.instagram.com//?hl=pt-br" target="_blank">
                                <i class="social-footer fab fa-instagram" aria-hidden="true" style="color: #ec9706;"></i>
                            </a>
                            <?php //if(isset($instagram)){ ?>
                                <!--<a href="<?php echo $instagram ?>" target="_blank">-->
                                <!--    <i class="social-footer fab fa-instagram" aria-hidden="true"></i>-->
                                <!--</a>-->
                            <?php //} ?>
                        </div>
                        <div class="col-md-4">
                            <a href="#" target="_blank">
                                <i class="social-footer fab fa-youtube" aria-hidden="true" style="color: #ec9706;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="endereco-ipad" style="">
                        <ul>
                            <li style="color: white; font-size: 14px; list-style-type: none; font-weight:bold; padding-bottom: 7px;">Informações
                            </li>
                            <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><i class="fa fa-phone-alt text-primary me-2" style="color: #ec9706 !important;"></i> (34) 3322-6953
                            </li>
                            <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><i class="fas fa-map-marker-alt text-primary me-2" style="color: #ec9706 !important;"></i>&nbsp Rua. Aluísio de Melo Teixeira, Uberaba - MG
                            </li>
                            <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><i class="fas fa-envelope text-primary me-2" style="color: #ec9706 !important;"></i>&nbsp nsolucoes@soluti.com.br
                            </li>
                        </ul>
                        <?php //if(isset($endereco)){ ?>
                            <!--<p class="p-footer"><?php //echo $endereco ?></p></a>-->
                        <?php //} ?>
                        <?php //if(isset($email)){ ?>
                            <!--<p class="p-footer"><?php echo $email ?></p>-->
                        <?php //} ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="">
                                <ul>
                                    <li style="color: white; font-size: 14px; list-style-type: none; font-weight:bold; padding-bottom: 7px;">Afiliados</li>
                                    <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><a style="color: white" href="https://datacom.nsolucoes.digital/entrarAfiliado">Login</a></li>
                                    <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><a style="color: white" href="https://datacom.nsolucoes.digital/cadastroAfiliado">Cadastro</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="">
                                <ul>
                                    <li style="color: white; font-size: 14px; list-style-type: none; font-weight:bold; padding-bottom: 7px;">Sobre</li>
                                    <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><a style="color: white; cursor: pointer;" data-toggle="modal" data-target="#nossaloja">Nossa Loja</a></li>
                                    <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><a style="color: white; cursor: pointer;" data-toggle="modal" data-target="#namidia">Na mídia</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                    <div style="font-size: 12px; color:grey;" class="row">
                        <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                            <img src="<?php echo base_url('imagens/site/formaspagamento.png') ?>" style="width: 80%; text-align: center; z-index: 101; margin-top: -3%; margin-left: 6%;">
                        </div>
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <p style="color: white; font-size: 11px;">© Imperio Cachos, todos os direitos reservados. </p>
							
                        </div>
                        <div class="col-md-4 text-end mb-3 mb-md-0" style="text-align: right; padding-right: 2%;">
							<p style="color: white; font-size: 11px;">Desenvolvido por <a style="color: white; margin-right: 15%;" href="https://www.nsolucoes.digital/">N Soluções</a></p>
                        </div>
                    </div>
            </div>
        </div>
        
    <?php if($mobile_view == 1){ ?>
        <!-- Footer mobile -->
        <div id="footer-mob" class="row w-100  text-center mx-auto" style="background: var(--base-color); margin: 0%; background: -webkit-linear-gradient(top, #082b3d, var(--base-color), #0f1f46, #234256); overflow-x: hidden;"><!--b37000-->
            <div>
                <div class="text-center form-group div-logo" style="padding-top: 10%">
                    <h3 style="color: white; font-size: 30px; list-style-type: none; font-weight:500; padding-bottom: 7px;">
                        DataCom
                    </h3>
                </div>
                
                <div class="text-center form-group div-social" style="">
                    <a href="https://www.facebook.com/Datacomnotebook/?ref=bookmarks" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-facebook" aria-hidden="true" style="color: #EC9706; position: relative !important"></i>
                    </a>
                    
                    <a href="https://www.instagram.com/datacomnotebook/?hl=pt-br" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-instagram" aria-hidden="true" style="color: #EC9706; position: relative !important"></i>
                    </a>
                    
                    <a href="#" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-youtube" aria-hidden="true" style="color: #EC9706; position: relative !important"></i>
                    </a>
                    <!--<a href="#" class="espacamento-icone" target="_blank">-->
                    <!--    <i class="social-footer fab fa-twitter" aria-hidden="true" style="color: #EC9706; position: relative !important"></i>-->
                    <!--</a>-->
                </div>
                
                <hr style="border-top: 1px solid rgba(256, 256, 256, .1)">
                
                <div class="contato-div-ipad text-center form-group" style="">
                        <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><i class="fa fa-phone-alt text-primary me-2" style="color: #EC9706!important;"></i> (34) 3322-6953<!--#afd4fa-->
                        </li>
                        <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><i class="fas fa-map-marker-alt text-primary me-2" style="color: #EC9706!important;"></i>&nbsp Av. Elías Cruvinel, 705 - Boa Vista, <br>Uberaba - MG
                        </li>
                        <li style="color: white; font-size: 14px; list-style-type: none; padding-bottom: 7px;"><i class="fas fa-envelope text-primary me-2" style="color: #EC9706!important;"></i>&nbsp atendimento@datacominformatica.com.br
                        </li>
                </div>
                
                <div class="text-center" style="margin-right: 6%;">
                    <img src="<?php echo base_url('imagens/site/formaspagamento.png') ?>" class="formas-pagamento-ipad" style="width: 99%; text-align: center; z-index: 101; margin: -15% 4% 0% 4%;">
                </div>
                
                <div class="text-center form-group mx-auto" style="display: flex;">
                    <div style="width: 50%;">
                            <li style="color: white; font-size: 12px; list-style-type: none; font-weight:bold; padding-bottom: 7px;">Afiliados</li>
                            <li style="color: white; font-size: 12px; list-style-type: none; padding-bottom: 7px;"><a href="https://datacom.nsolucoes.digital/entrarAfiliado">Login</a></li>
                            <li style="color: white; font-size: 12px; list-style-type: none; padding-bottom: 7px;"><a href="https://datacom.nsolucoes.digital/cadastroAfiliado">Cadastro</a></li>
                     
                    </div>
                    <div style="width: 50%;">
                            <li style="color: white; font-size: 12px; list-style-type: none; font-weight:bold; padding-bottom: 7px;">Categoria 2</li>
                            <li style="color: white; font-size: 12px; list-style-type: none; padding-bottom: 7px;">ITEM 1</li>
                            <li style="color: white; font-size: 12px; list-style-type: none; padding-bottom: 7px;">ITEM 2</li>
                    </div>
                </div>
                <hr style="border-top: 1px solid rgba(256, 256, 256, .1); width: 107%;">
                <div class="<?php if($tablet == 1){ ?>mb-3<?php } ?>">
                    <div style="font-size: 12px; color:grey;" class="row">
                        <div class="<?php if($tablet == 1){ ?> col-md-6 text-center mb-3 mb-md-0<?php }else{ ?> col-md-4 text-center mb-3 mb-md-0 <?php } ?>">
                            <p style="color: white; font-size: 11px;">© DataCom, todos os direitos reservados.</p>
    						
                        </div>
                        <div class="<?php if($tablet == 1){ ?> col-md-6 text-center mb-3 mb-md-0<?php }else{ ?> col-md-4 text-center mb-3 mb-md-0 <?php } ?>" style="text-align: right; padding-right: 2%;">
    						<p style="color: white; font-size: 11px;">Desenvolvido por <a style="color: white;" href="https://www.nsolucoes.digital/">N Soluções</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        <!-- Footer End-->
    </footer>
    
    <div class="modal" tabindex="-1" role="dialog" id="sobre" style="z-index: 1041">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Sobre a Loja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($sobre_loja)) { ?>
                                <?php echo $sobre_loja ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn-main" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" role="dialog" id="nossaloja" style="z-index: 1041">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h2 class="modal-title" style="color: black; font-weight: bold;">Nossa Loja</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                    		<div class="container" style="margin-top:2%; margin-bottom: 5%">
                    			<div class="row mx-auto" style="width: 95%; margin-bottom: 5%">
                    				<div class="col-lg-6">
                    					<div class="about-img">
                    						<img style="border-radius: 10%;" src="<?php echo base_url('imagens/site/imagemprincipal1.jpg') ?>" class="img-fluid" alt="about">
                    					</div>
                    				</div>
                    				<div class="col-lg-6 about-content d-flex align-content-center flex-wrap" style="width: 80%">
                    					<p align="justify" style="font-size: 18px">Somos especialistas em reparo de notebooks, computadores, MacBook e Imac, fazemos troca de chipset, bga e reparo eletrônico, você não precisa comprar um novo, nós consertamos!</p>
                    				</div>
                    			</div>
                    			<div class="row mx-auto"  style="width: 100%; display: flex; justify-content: center; align-items: center; ">
                    			    <div class="col-md-3">
                    			        <img src="https://misteroclienteoculto.com.br/wp-content/uploads/2021/07/Discurso-de-Vendas-Como-melhorar-o-desempenho-dos-vendedores.jpg" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			    <div class="col-md-3">
                    			        <img src="https://images.endeavor.org.br/uploads/2017/03/04195902/young-business-people-in-corporate-company-5MK3Q55-1440x960.jpg" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			    <div class="col-md-3">
                    			        <img src="https://static.kbb.com.br/Uploads/ResearchTools/News/229/aa047c88-7677-4691-9e23-2fde41707ae4_1365x1024.jpg" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			    <div class="col-md-3">
                    			        <img src="https://alobras.com.br/wp-content/uploads/2019/05/escolher-os-vendedores-para-loja.jpg" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			</div>
                    		</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .foto-modal {
            width: auto;
            height: 130px;
            border-radius: 7%;
        }
            
    </style>
    
    
    <div class="modal" tabindex="-1" role="dialog" id="namidia" style="z-index: 1041">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h2 class="modal-title" style="color: black; font-weight: bold;">Na Mídia</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                    		<div class="container" style="margin-top:1%; margin-bottom: 5%">
                    			<div class="row mx-auto" style="width: 95%; margin-bottom: 2%">
                    				<div class="col-lg-6 about-content d-flex align-content-center flex-wrap">
                    					<div class="about-img">
                    						<video class="video-servico" style="background: black; width: 100%;" controls>
                                                <source src="<?php echo base_url('imagens/site/videonamidia.mp4') ?>" type="video/mp4">
                                            </video>
                    					</div>
                    				</div>
                    				<div class="col-lg-6 about-content d-flex align-content-center flex-wrap" style="width: 80%">
                    					<p align="justify" style="font-size: 18px">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Aldus PageMaker including versions of Lorem Ipsum.</p>
                    				</div>
                    			</div>
                    			<div class="row mx-auto"  style="width: 100%; display: flex; justify-content: center; align-items: center; ">
                    			    <div class="col-md-3">
                    			        <img src="https://gizmodo.uol.com.br/wp-content/blogs.dir/8/files/2020/06/1B4A8221.jpg" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			    <div class="col-md-3">
                    			        <img src="https://adrenaline.com.br/uploads/2019/06/30/59581/nvidia_geforce_rtx_2070_super_18.jpg" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			    <div class="col-md-3">
                    			        <img src="https://s2.glbimg.com/GrK5pKKr7-2BDMiwlM2X_qgpTto=/0x0:1280x720/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2020/d/D/m4GCDJSHArcWvSqUw2Ag/computador-de-mesa-o-que-observar.png" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			    <div class="col-md-3">
                    			        <img src="https://3seletronicos.com/wp-content/uploads/2017/06/tecladok92.jpg" class="img-fluid foto-modal" alt="about">
                    			    </div>
                    			</div>
                    		</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" role="dialog" id="entrega" style="z-index: 1041">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Política de Entrega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($politica_entrega)) { ?>
                                <?php echo $politica_entrega ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn-main" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" role="dialog" id="privacidade" style="z-index: 1042">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Política de privacidade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($politica_privacidade)) { ?>
                                <?php echo $politica_privacidade ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
    <div class="modal" tabindex="-1" role="dialog" id="termos" style="z-index: 1041">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Termos e condições</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($termos)) { ?>
                                <?php echo $termos ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn-main" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"><i class="fa fa-arrow-up" style="line-height: 43px; font-size: 23px;"></i></a>
    </div>
    <div class="modal fade" id="logarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ACESSAR A CONTA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-login" action="<?php echo base_url('d41d8cd98f00b204e9800998ecf8427e') ?>" method="post">
                    <div class="modal-body">
                        <label class="custom-label">
                            <b style="color: #444;">CPF:</b>
                        </label>
                        <input type="text" class="form-control cpf" id="cpf_modal" name="login" placeholder="Digite seu CPF" autocomplete="new-password" required>
                        
                        
                        <label class="custom-label" style="margin-top: 5%!important;">
                            <b style="color: #444;">Senha:</b>
                        </label>
                        <input type="password" class="form-control" id="senha_modal" name="pass" placeholder="Digite sua senha" autocomplete="new-password" required>
                        
                        <a style="position: relative;top: 6px;left: calc(100% - 110px);font-size: 13px; color: #444; cursor: pointer;" href="#" data-toggle="modal" data-target="#esqueciSenhaModal" onclick="esqueciSenha()">Esqueci a senha</a>
                    </div>
                    <div class="modal-footer">
                        <button onclick="abrirmodalcadastro($('#login_usuario').val())" style="width: 120px;margin-right: auto;" type="button" class="btn btn-primary">Cadastrar</button>
                        <button style="width: 120px;" type="submit" class="btn btn-primary">Logar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url('recursos/js/'); ?>slick.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>popper.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>wow.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.countdown.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>contact.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.validate.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>plugins.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.mask.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery-migrate-1-2-1.js"></script>
    <!-- sweetalert2 -->
    <script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
    
    <script>
        $(document).ready(function(){
            verificaCookie();
            
            var SPMaskBehavior = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
              onKeyPress: function(val, e, field, options) {
                  field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            
            $('.telefone').mask(SPMaskBehavior, spOptions);
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            
            
            
            $('.js-example-basic-multiple').select2({theme: "bootstrap"});
            //reembolsoModal();
            $('.select-footer').select2({theme: "bootstrap"});
            $('#ree_cpf').mask('000.000.000-00', {reverse: true});
            $('#ree_cep').mask('00000-000');
            $('#ree_numero').mask('0#');
            $('#ree_uf').mask('XX', {'translation': {'X': {pattern: /[A-Za-z]/}}});
            $('#ree_telefone').mask('(00) 0000-0000');
            $('#ree_quantidade').mask('0#');
            $('#ree_valor_total').mask("#.##0,00", {reverse: true});
            var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            $('#ree_celular').mask(SPMaskBehavior, spOptions);
        });
        function privacidade(){
            $('#privacidadeModal').modal('show');
        }
        function termo(){
            $('#termosModal').modal('show');
        }
        function quemsomos(){
            $('#quemsomosModal').modal('show');
        }
        function reembolsoModal(){
            $('#termosModal').modal('hide');
            $('#reembolsoModal').modal('show');
        }
        $('.btn-file').on('click', function(){
            $('#'+$(this).data('input')).click();
        });
        $('.input-file').on('change', function(){
            var sp = $(this).val().split('\\');
            if(sp[sp.length - 1].length > 20){
                var fim = parseInt(sp[sp.length - 1].length) - 10;
                var one = sp[sp.length - 1].substr(0, 6);
                var two = sp[sp.length - 1].substr(fim);
                var last = one+"..."+two;
            }else{
                var last = sp[sp.length - 1];
            }
            $('#'+$(this).data('msg')).html(last);
        });
    </script>
    
    <script>
        function inicio(){
            location.replace('<?php echo base_url();?>');
        }
    </script>
    
    <script>
        function acceptCookie(){
            sessionStorage.setItem('aceitouCookie', 1);
            
            $('#new-cookie').hide();
        }
        
        function verificaCookie(){
            var data = sessionStorage.getItem('aceitouCookie');
            
            if(data == 1){
                $('#new-cookie').hide();
            } else {
                $('#new-cookie').show();
            }
        }
    </script>

    
    
    <!--  -->
    <script src="<?php echo base_url('recursos/js/'); ?>vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>owl.carousel.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>animated.headline.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>gijgo.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>waypoints.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>hover-direction-snake.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.form.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>main.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>select2/select2.min.js"></script>
    
    <script>
        function alertlogin(){
            $('#logarModal').modal('show');
        }
    
        function alerterrado(){
            Swal.fire({
               type: 'error',
               text: 'Usuário ou senha errado(s)!',
            });
        }
        
        function alertsucesso(){
            Swal.fire({
               type: 'success',
               text: 'Cadastro realizado com sucesso!',
            });
        }
    
        function alertcpf(){
            Swal.fire({
               type: 'error',
               text: 'CPF já cadastrado, tente novamente!',
            });
        }
    
        function alertname(){
            Swal.fire({
               type: 'error',
               text: 'Digite um nome, tente novamente!',
            });
        }
    
        function alertsenha(){
            Swal.fire({
               type: 'error',
               text: 'A senha deve ter mais de seis caracteres, tente novamente!',
            });
        }
    
        function alertpagamento(){
            Swal.fire({
               type: 'error',
               text: 'Selecione uma forma de pagamento, para continuar a compra!',
            });
        }
        
        function alertsenhadif(){
            Swal.fire({
               type: 'error',
               text: 'As senhas são diferentes, tente novamente!',
            });
        }
    </script>
    