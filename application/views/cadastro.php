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
	  	
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/css/main.css"> 
    <!--===============================================================================================-->
    
       
    
    <style>
        .login100-form-bgbtn {
            background: -webkit-linear-gradient(right, #1d3573, #2145a3, #1545c2, #3d69db);
        }
        .btn-submit{
            font-family: Arial,sans-serif; 
            font-weight: 700;
            font-size: 18px;
            color: white; 
            background: var(--base-color);
        }
        
        .btn-submit:hover{
            font-family: Arial,sans-serif; 
            font-weight: 700;
            font-size: 18px;
            color: white; 
            background: #283554;
        }
        .focus-input100::before{
            background: -webkit-linear-gradient(left, #000000, #0f1c3d);
        }
        .wrap-login100 {
            width: 400px;  
            padding: 40px;
        }
        .titulo2{
            color: grey;
            margin-top: 34px
        }
        .swal2-popup .swal2-styled.swal2-confirm {
            background-color: #3a0b0c!important;
        }
        .divPrincipalLogin{
            margin-top: 7%;
        }
        
        @media(max-width: 500px){
            .limiter{padding-top: 35%;}
            .wrap-login100 {width: 290px; padding: 35px; margin-left: auto; margin-right: auto;}
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{margin-right: auto; margin-left: auto;}
        }
        @media(min-width: 501px) and (max-width: 776px){
            .limiter{padding-top: 35%;}
            .wrap-login100 {width: 290px; padding: 35px; margin-left: auto; margin-right: auto;}
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{position: relative; left: 20%}
        }
        
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .limiter{padding-top: 18%;}
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{margin-right: auto; margin-left: auto;}
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .limiter{padding-top: 1%;}
            .wrap-login100 {width: 513px; padding: 35px; margin-left: auto; margin-right: auto; padding-top: 20%;}
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{margin-right: auto; margin-left: auto;}
        }
        
    </style>
	<div class="limiter">
		<div class="container-login100" style="background: white;">
		    <div class="row divPrincipalLogin" style="">
			    <div class="col-md-12 form-group">
			        <div class="">
		            	<span class="login100-form-title p-b-1">
    						<p style="font-size: 30px;font-weight: 900!important;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';">Seja um Afiliado</p>
    					</span>
				        <form id="form-cadastro" class="login100-form" action="<?php echo base_url('areaafiliado/novoAfiliadoPublico') ?>" method="post"><!--areaafiliado/newAfiliado-->
        					
        					<div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                                <div class="col-md-12">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-6 form-group">
                                            <label><b>Nome do representante:</b></label>
                                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome" required>
                                            <em id="nome_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                           
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><b>Empresa:</b></label>
                                            <input type="text" id="empresa" name="empresa" class="form-control" placeholder="Digite o nome da empresa" required>
                                            <em id="empresa_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5 form-group">
                                            <label><b>CNPJ:</b></label>
                                            <input type="text" id="cnpj" name="cnpj" class="cnpj cpf_cnpj form-control" placeholder="Digite o CNPJ" required>
                                            <em id="cnpj_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label><b>Senha:</b></label>
                                            <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite a senha" required>
                                            <em id="senha_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8 form-group">
                                            <label><b>E-mail:</b></label>
                                            <input type="text" id="email" name="email" class="form-control" placeholder="Digite o email" required>
                                            <em id="email_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Telefone:</b></label>
                                            <input type="text" id="telefone" name="telefone" class="telefone form-control" placeholder="Digite o telefone" required>
                                            <em id="telefone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                    </div>
                                    
                                    <hr style="border-color: lightgrey">
                                    
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label><b>CEP:</b></label>
                                            <input onblur="autofillCEP(this.value)" type="text" id="cep" name="cep" class="cep form-control" placeholder="Digite o CEP" required>
                                            <em id="cep_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><b>Rua:</b></label>
                                            <input type="text" id="rua" name="rua" class="form-control" placeholder="Digite a rua" required>
                                            <em id="rua_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>Número:</b></label>
                                            <input type="text" id="numero" name="numero" class="number form-control" placeholder="Digite o número" required>
                                            <em id="numero_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                            <label><b>Complemento:</b></label>
                                            <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Digite o complemento">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Bairro:</b></label>
                                            <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Digite o bairro" required>
                                            <em id="bairro_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Cidade:</b></label>
                                            <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite a cidade" required>
                                            <em id="cidade_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Estado:</b></label>
                                            <input type="text" id="estado" name="estado" class="form-control" placeholder="Digite o estado" required>
                                            <em id="estado_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                    </div>
                                    
                                    <hr style="border-color: lightgrey">
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label><b>Dados Bancários:</b></label>
                                            <textarea id="banco" name="banco" class="form-control" placeholder="Digite os dados bancários"></textarea>
                                            <em id="banco_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
        					
        					<label id="alert-senha" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres.</label>

        					<div class="container-login100-form-btn" style="margin-bottom: 25px">
        						<div class="wrap-login100-form-btn" style="border-radius: 5px;">
        						    <div class="row">
        						        <div class="col-6"></div>
        						        
            						    <div class="col-3">
            						        <a href="<?php echo base_url() ?>" class="login100-form-btn g-recaptcha btn-submit" style="border-radius: 6px;">
                								Voltar
                							</a>
            						    </div>

                                        <div class="col-3">
            						        <button onclick="valida()" class="login100-form-btn g-recaptcha btn-submit" style="border-radius: 6px;" data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit2' data-action='submit'>
                								Cadastrar
                							</button>
            						    </div>
        						    </div>
        						    
        							<!--<a href="<?php echo base_url() ?>" class="btn btn-primary" style="font-size: 20px;">VOLTAR</a>-->
        						</div>
        					</div>
        					<div class="text-right p-t-1 politica" style="margin-top: -20px;">
        						<a style="font-size: 12px; color: black; cursor: pointer;" data-toggle="modal" data-target="#termoassociado"><b style="color: black">Termos de associado</b></a>
        					</div>
				        </form>
			        </div>
			    </div>
			</div>
		</div>
	</div>

    <div class="modal" tabindex="-1" role="dialog" id="termoassociado" style="z-index: 1042">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Política de Associado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($termo_associado)) { ?>
                                <?php echo $termo_associado ?>
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
	
<!-- sweetalert2 -->
    <script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
    <script src='<?php echo base_url('recursos/js/material/plugins/sweetalert2.js');?>'></script>	
<!--===============================================================================================-->
	<!--<script src="<?php echo base_url('assets/areauser/vendor/jquery-3.2.1.min.js') ?>"></script>-->
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/popper.js"></script>
	<!--<script src="<?php echo base_url() ?>assets/areauser/vendor/bootstrap.min.js"></script>-->
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/areauser/vendor/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/js/main.js"></script>

	<script src="<?php echo base_url() ?>assets/areauser/js/validinputs.js"></script>	
	
	<script src="https://www.google.com/recaptcha/api.js"></script>
	
	
    <script>
        $(document).ready(function(){
             $('.cpf').mask('000.000.000-00', {reverse: true});
            
            <?php if(isset($msg)) { ?>
                <?php if($msg == 1){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'CPF ou senha errada(s)!',
                    })
                <?php } else if($msg == 2){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'Usuário bloqueado, por favor entrar em contato com o SAC!',
                    })
                <?php } else if($msg == 3){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'CPF já cadastrado!',
                    })
                <?php } else if($msg == 4){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'CPF não cadastrado, tente novamente!',
                    })
                <?php } else if($msg == 5){ ?>
                    Swal.fire({
                        type: 'success',
                        title: 'Encaminhamos um e-mail para redefinição de senha!',
                    })
                <?php } else if($msg == 6){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'E-mail incorreto, tente novamente ou entre em contato com nosso SAC!',
                    })
                <?php }else if($msg == 7){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'Digite um nome, tente novamente!',
                    })
                <?php }else if($msg == 8){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'Senha deve ser maior que seis dígitos, tente novamente!',
                    })
                     <?php }else if($msg == 9){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'Digite um CPF, tente novamente!',
                    })
                    <?php }else if($msg == 10){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'Digite uma senha, tente novamente!',
                    })
                <?php }  ?>
            <?php } ?>
        });
    </script>
	
	<script>
	    $(document).ready(function(){
	        $('#insert_cpf').mask('000.000.000-00', {reverse: true});
	        $('.nomecad').on("input", function(){
              var regexp = /[^a-zA-Z- ]/g;
              if($(this).val().match(regexp)){
                $(this).val( $(this).val().replace(regexp,'') );
              }
            });
	        
	        $('#login1').hide(); 
	        $('#password3').hide(); 
	        $('#cpf2').hide(); 
	        $('#password2').hide(); 
	    });
	</script>

