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
        
        @media(min-width: 300px) and (max-width: 400px){
            .limiter{padding-top: 35%!important;}
        }
        
        @media(max-width: 500px){
            .limiter{padding-top: 7%;}
            .wrap-login100 {width: 290px; padding: 35px; margin-left: auto; margin-right: auto;}
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{margin-right: auto; margin-left: auto;}
        }
        @media(min-width: 501px) and (max-width: 766px){
            .limiter{padding-top: 7%;}
            .wrap-login100 {padding: 35px; margin-left: auto; margin-right: auto;}
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{position: relative; left: 20%}
        }
        
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{margin-right: auto; margin-left: auto;}
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .limiter{padding-top: 1%;}
            .wrap-login100 {padding: 35px; margin-left: auto; margin-right: auto; padding-top: 20%;}
            .titulo2{color: grey; margin-top: 0;}
            .politica{text-align: center!important;}
            .divPrincipalLogin{margin-top: 1%;}
            .esqueci-senha{text-align: center!important; position: relative; right: 28%;}
            .form-group{margin-right: auto; margin-left: auto;}
        }
        
    </style>
	<div class="limiter">
		<div class="container-login100" style="background: #ebebeb;">
		    <div class="row divPrincipalLogin" style="">
		        <div class="col-md-12 form-group">
			        <div class="wrap-login100">
				        <form id="form-login" class="login100-form" action="<?php echo base_url('2cbb8dbaacfbc463addd849f7c5ece4a') ?>" method="post">

        					<span class="login100-form-title p-b-1">
        						<p style="font-size: 30px;font-weight: 900!important;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';">Entrar</p>
        					</span>
        					
        					<div class="text-center">
        					    <h5 class="titulo2">Já tenho meu cadastro</h5>
        					</div>
    
        					<div class="wrap-input100 validate-input" data-validate = "Digite um CPF Válido" style="margin-top: 48px">
        					    <input class="input100" type="text" name="login" id="cpf2">
        						<input class="cpf input100" type="text" name="login" required>
        						<span class="focus-input100" data-placeholder="CPF"></span>
        					</div>
    
        					<div class="wrap-input100 validate-input" data-validate="Digite sua senha">
        					    <input type="password" name="for_autocomplete1" id="password2">
        						<span class="btn-show-pass">
        							<i class="zmdi zmdi-eye"></i>
        						</span>
        						<input class="input100" type="password" name="pass" required>
        						<span class="focus-input100" data-placeholder="Senha"></span>
        					</div>
                
        					<div class="container-login100-form-btn">
        						<div class="wrap-login100-form-btn" style="border-radius: 5px;">
        							<div class="login100-form-bgbtn"></div>
        							<button class="login100-form-btn btn-submit" data-callback='onSubmit' data-action='submit'><!-- data-sitekey="<?php echo $chave['chave_site'] ?>" class=g-recaptcha -->
        								Entrar
        							</button>
        						</div>
        					</div>
        					
        					<div class="w-100 d-flex mt-2">
        					    <div class="mr-auto" style="">
    					            <a style="font-size: 11px; color: black; cursor: pointer;" href="#" data-toggle="modal" data-target="#modalCadastro"><b>Cadastre-se</b></a>
    						    </div>
    						    <div class="ml-auto" style="">
    					            <a style="font-size: 11px; color: black; cursor: pointer;" href="#" data-toggle="modal" data-target="#esqueciSenhaModal"><b>Esqueci a senha</b></a>
    						    </div>
        					</div>
        					
    				    </form>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	
	
    <!-- Modal -->
    <div class="modal fade" id="esqueciSenhaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Redefinir a senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo base_url('areauser/esquecerSenha') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>CPF:</label>
                        <input type="text" name="cpf-esquecer" id="cpf-esquecer" class="cpf form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>E-mail:</label>
                        <input type="email" name="email-esquecer" id="email-esquecer" class="form-control">
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Redefinir</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    
    <!--=================================== Modal Cadastro ===================================-->
    <div id="modalCadastro" class="modal fade bd-example-modal-xl" tabindex="-1" style="z-index: 1041" role="dialog" aria-labelledby="Cadastro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-cadastro" class="login100-form" action="<?php echo base_url('areauser/insertCliente') ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Dados Pessoais</h6>
                            </div>
                        </div>
                        <hr style="margin-top: 0.2rem;">
                        <div class="row">
                            <div class="col-sm-5 form-group">
                                <label>Nome</label><br>
                                <input type="text" class="font-gui form-control" id="nome_cadastro" name="nome_cadastro" required>
                                <em id="nome_cadastro_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>CPF</label><br>
                                <input type="text" class="cpf font-gui form-control" id="cpf_cadastro" name="cpf_cadastro" required>
                                <em id="cpf_cadastro_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>Data de nascimento</label><br>
                                <input id="nascimento" name="nascimento" type="text" class="date form-control" required>
                                <em id="nascimento_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-8 form-group">
                                <label style="color: #444;">E-mail</label>
                                <input type="mail" id="email" name="email" class="form-control" required>
                                <em id="email_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">Telefone</label>
                                <input type="text" id="telefone" name="telefone" class="telefone form-control" required>
                                <em id="telefone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            
                        </div>
                        
                        <div class="row" style="margin-top: 3.5%;">
                            <div class="col-sm-12">
                                <h6>Endereço</h6>
                            </div>
                        </div>
                        <hr style="margin-top: 0.2rem;">
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label style="color: #444;">CEP</label>
                                <input type="text" class="cep form-control" id="cep" name="cep" required>
                                <em id="cep_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required>
                                <em id="endereco_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label style="color: #444;">Número</label>
                                <input type="text" class="form-control"  id="numero" name="numero" required>
                                <em id="numero_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label style="color: #444;">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento">
                                <em id="complemento_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label style="color: #444;">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" required>
                                <em id="bairro_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
                                <em id="cidade_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                            <div class="col-sm-5 form-group">
                                <label style="color: #444;">Estado</label>
                                <select class="form-control" id="estado" name="estado" required>
                                	<option value="AC">Acre</option>
                                	<option value="AL">Alagoas</option>
                                	<option value="AP">Amapá</option>
                                	<option value="AM">Amazonas</option>
                                	<option value="BA">Bahia</option>
                                	<option value="CE">Ceará</option>
                                	<option value="DF">Distrito Federal</option>
                                	<option value="ES">Espírito Santo</option>
                                	<option value="GO">Goiás</option>
                                	<option value="MA">Maranhão</option>
                                	<option value="MT">Mato Grosso</option>
                                	<option value="MS">Mato Grosso do Sul</option>
                                	<option value="MG">Minas Gerais</option>
                                	<option value="PA">Pará</option>
                                	<option value="PB">Paraíba</option>
                                	<option value="PR">Paraná</option>
                                	<option value="PE">Pernambuco</option>
                                	<option value="PI">Piauí</option>
                                	<option value="RJ">Rio de Janeiro</option>
                                	<option value="RN">Rio Grande do Norte</option>
                                	<option value="RS">Rio Grande do Sul</option>
                                	<option value="RO">Rondônia</option>
                                	<option value="RR">Roraima</option>
                                	<option value="SC">Santa Catarina</option>
                                	<option value="SP">São Paulo</option>
                                	<option value="SE">Sergipe</option>
                                	<option value="TO">Tocantins</option>
                                </select>
                                <em id="estado_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                            </div>
                        </div>
                        
                        <div class="row" style="margin-top: 3.5%;">
                            <div class="col-sm-12">
                                <h6>Senhas</h6>
                            </div>
                        </div>
                        <hr style="margin-top: 0.2rem;">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Senha</label><br>
                                <input  type="password" class="form-control" name="senha_cadastro" id="senha_cadastro">
                                <em id="senha_cadastro_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                <!-- <label id="alert-senha" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres!</label> -->
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Confirmação da senha</label><br>
                                <input  type="password" class="form-control" name="confirma_senha_cadastro" id="confirma_senha_cadastro">
                                <em id="confirma_senha_cadastro_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                <!-- <label id="alert-senha2" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres!</label> -->
                            </div>
                        </div>
                        <!-- <label id="alert-senha3" style="font-size: 14px; visibility: hidden; color: red;">*As senhas não são iguais!</label> -->
                    </div>
                    <div class="modal-footer">
                        <!--<a style="font-size: 12px; color: black; cursor: pointer;" data-toggle="modal" data-target="#privacidade"><b style="color: black">Política de privacidade</b></a>-->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button onclick="valida()" class="btn g-recaptcha" style="font-size: 1rem; font-weight: 400;" data-sitekey="<?php echo $chave['chave_site'] ?>">
    						Cadastrar
    					</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--======================================================================================-->
	
	
<!-- sweetalert2 -->
    <script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
    <script src='<?php echo base_url('recursos/js/material/plugins/sweetalert2.js');?>'></script>	
<!--===============================================================================================-->
	<!--<script src="<?php echo base_url() ?>assets/areauser/vendor/jquery-3.2.1.min.js"></script>-->
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
<!--===============================================================================================-->	
	<script src="<?php echo base_url() ?>assets/areauser/js/validcad.js"></script>
	
	
	<!--<script src="https://www.google.com/recaptcha/api.js"></script>-->


    <script>
       function onSubmit(token) {
         document.getElementById("form-login").submit();
       }
    </script>     
	<script>
        $(document).ready(function(){
             $('.cpf').mask('000.000.000-00', {reverse: true});
             
             $('.date').mask('00/00/0000');
            
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

            $('#insert_cpf').mask('000.000.000-00', {reverse: true});
            $('#cep').mask('00000-000');
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