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
		        <?php //if($mobile == 0) { ?>
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
        							<button class="login100-form-btn g-recaptcha btn-submit" data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit' data-action='submit'>
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
        					<!--<div class="d-flex justify-content-center mt-4 w-100">-->
        					<!--    <label class="">OU</label>-->
        					<!--</div>-->
        					<!--<div class="container-login100-form-btn">-->
        					<!--	<div class="wrap-login100-form-btn justify-content-center d-flex" style="border-radius: 5px;">-->
        					<!--		<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalCadastro">-->
        					<!--			Cadastre-se-->
        					<!--		</button>-->
        					<!--	</div>-->
        					<!--</div>-->
        					
        					<!--<div class="text-right p-t-1">-->
        					<!--    <div class="row">-->
        					<!--        <div class="col-md-12" style="width: 100%">-->
        					<!--            <a style="font-size: 11px; color: black; cursor: pointer;" href="#" data-toggle="modal" data-target="#esqueciSenhaModal"><b>Esqueci a senha</b></a>-->
        					<!--	    </div>-->
        					<!--	</div>-->
        					<!--</div>-->
    				    </form>
			        </div>
			    </div>
			    <!--<div class="col-md-6 form-group">-->
			    <!--    <div class="wrap-login100">-->
				   <!--     <form id="form-cadastro" class="login100-form" action="<?php echo base_url('areauser/insertCliente') ?>" method="post">-->
       <!-- 					<span class="login100-form-title p-b-1">-->
       <!-- 						<p style="font-size: 30px;font-weight: 900!important;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';">Cadastre-se</p>-->
       <!-- 					</span>-->
        					
       <!-- 					<div class="wrap-input100 validate-input" data-validate = "Digite um Nome">-->
       <!-- 						<input class="input100 nomecad" type="text" name="nome_cadastro" id="nome_cadastro" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="Nome Completo"></span>-->
       <!-- 					</div>-->
        
       <!-- 					<div class="wrap-input100 validate-input" data-validate = "Digite um CPF">-->
       <!-- 						<input class="cpf input100" type="text" name="cpf_cadastro" id="cpf_cadastro" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="CPF"></span>-->
       <!-- 					</div>-->
        
       <!-- 					<div class="wrap-input100 validate-input" data-validate="Digite sua senha" style="margin-bottom: 12px!important">-->
       <!-- 						<span class="btn-show-pass">-->
       <!-- 							<i class="zmdi zmdi-eye"></i>-->
       <!-- 						</span>-->
       <!-- 						<input class="input100" type="password" onkeyup="senha()" name="senha_cadastro" id="senha_cadastro" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="Senha"></span>-->
       <!-- 					</div>-->
        					
       <!-- 					<label id="alert-senha" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres.</label>-->

       <!-- 					<div class="container-login100-form-btn" style="margin-bottom: 25px">-->
       <!-- 						<div class="wrap-login100-form-btn" style="border-radius: 5px;">-->
       <!-- 							<div class="login100-form-bgbtn"></div>-->
        							<!--<button onclick="validaCpf()" class="login100-form-btn g-recaptcha btn-submit" data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit2' data-action='submit'>-->
        							<!--	Cadastrar-->
        							<!--</button>-->
       <!-- 							<button class="login100-form-btn g-recaptcha btn-submit" data-toggle="modal" data-target="#modalCadastro">-->
       <!-- 								Cadastrar-->
       <!-- 							</button>-->
       <!-- 						</div>-->
       <!-- 					</div>-->
       <!-- 					<div class="text-right p-t-1 politica" style="margin-top: -20px;">-->
       <!-- 						<a style="font-size: 12px; color: black; cursor: pointer;" data-toggle="modal" data-target="#privacidade"><b style="color: black">Política de privacidade</b></a>-->
       <!-- 					</div>-->
				   <!--     </form>-->
			    <!--    </div>-->
			    <!--</div>-->
			    <?php //} else { ?>
		     <!--   <div class="form-group">-->
			    <!--    <div class="wrap-login100">-->
				   <!--     <form id="form-login" class="login100-form" action="<?php echo base_url('2cbb8dbaacfbc463addd849f7c5ece4a') ?>" method="post">-->

       <!-- 					<span class="login100-form-title p-b-1">-->
       <!-- 						<p style="font-size: 30px;font-weight: 900!important;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';">Entrar</p>-->
       <!-- 					</span>-->
        					
       <!-- 					<div class="text-center">-->
       <!-- 					    <h5 class="titulo2">Já tenho meu cadastro</h5>-->
       <!-- 					</div>-->
    
       <!-- 					<div class="wrap-input100 validate-input" data-validate = "Digite um CPF Válido" style="margin-top: 39px">-->
       <!-- 					    <input class="input100" type="text" name="login" id="cpf2">-->
       <!-- 						<input class="cpf input100" type="text" name="login" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="CPF"></span>-->
       <!-- 					</div>-->
    
       <!-- 					<div class="wrap-input100 validate-input" data-validate="Digite sua senha">-->
       <!-- 					    <input type="password" name="for_autocomplete1" id="password2">-->
       <!-- 						<span class="btn-show-pass">-->
       <!-- 							<i class="zmdi zmdi-eye"></i>-->
       <!-- 						</span>-->
       <!-- 						<input class="input100" type="password" name="pass" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="Senha"></span>-->
       <!-- 					</div>-->
        					

       <!-- 					    <div class="row">-->
        					        
       <!--                         </div>-->
                
       <!-- 					<div class="container-login100-form-btn">-->
       <!-- 						<div class="wrap-login100-form-btn" style="border-radius: 5px;">-->
       <!-- 							<div class="login100-form-bgbtn"></div>-->
       <!-- 							<button class="login100-form-btn g-recaptcha" style="font-family: Arial,sans-serif; font-weight: 700;font-size: 18px;color: black; background: #f7c516;" data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit' data-action='submit'>-->
       <!-- 								Entrar-->
       <!-- 							</button>-->
       <!-- 						</div>-->
       <!-- 					</div>-->
        					
       <!-- 					<div class="text-right p-t-1 esqueci-senha">-->
       <!-- 					    <div class="row">-->
       <!-- 					        <div class="col-md-6" style="width: 50%">-->

       <!-- 					        </div>-->
       <!-- 					        <div class="col-md-6" style="width: 50%">-->
       <!-- 					            <a style="font-size: 11px; color: black; cursor: pointer;" href="#" data-toggle="modal" data-target="#esqueciSenhaModal"><b style="color: black">Esqueci a senha</b></a>-->
       <!-- 						    </div>-->
       <!-- 						</div>-->
       <!-- 					</div>-->
    			<!--	    </form>-->
			    <!--    </div>-->
			    <!--</div>-->
			    <!--<div class="form-group">-->
			    <!--    <div class="wrap-login100">-->
				   <!--     <form id="form-cadastro" class="login100-form" action="<?php echo base_url('areauser/insertCliente') ?>" method="post">-->
       <!-- 					<span class="login100-form-title p-b-1">-->
       <!-- 						<p style="font-size: 30px;font-weight: 900!important;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';">Cadastre-se</p>-->
       <!-- 					</span>-->
        					
       <!-- 					<div class="wrap-input100 validate-input" data-validate = "Digite um Nome">-->
       <!-- 						<input class="input100 nomecad" type="text" name="nome_cadastro" id="nome_cadastro" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="Nome Completo"></span>-->
       <!-- 					</div>-->
        
       <!-- 					<div class="wrap-input100 validate-input" data-validate = "Digite um CPF">-->
       <!-- 						<input class="cpf input100" type="text" name="cpf_cadastro" id="cpf_cadastro" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="CPF"></span>-->
       <!-- 					</div>-->
        
       <!-- 					<div class="wrap-input100 validate-input" data-validate="Digite sua senha" style="margin-bottom: 12px!important">-->
       <!-- 						<span class="btn-show-pass">-->
       <!-- 							<i class="zmdi zmdi-eye"></i>-->
       <!-- 						</span>-->
       <!-- 						<input class="input100" type="password" onkeyup="senha()" name="senha_cadastro" id="senha_cadastro" required>-->
       <!-- 						<span class="focus-input100" data-placeholder="Senha"></span>-->
       <!-- 					</div>-->
        					
       <!-- 					<label id="alert-senha" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres.</label>-->

       <!-- 					<div class="container-login100-form-btn" style="margin-bottom: 25px">-->
       <!-- 						<div class="wrap-login100-form-btn" style="border-radius: 5px;">-->
       <!-- 							<div class="login100-form-bgbtn"></div>-->
       <!-- 							<button onclick="validaCpf()" class="login100-form-btn g-recaptcha" style="font-family: Arial,sans-serif; font-weight: 700;font-size: 18px;color: black; background: #f7c516;"  data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit2' data-action='submit'>-->
       <!-- 								Cadastrar-->
       <!-- 							</button>-->
       <!-- 						</div>-->
       <!-- 					</div>-->
       <!-- 					<div class="text-right p-t-1 politica" style="margin-top: -25px;">-->
       <!-- 						<a style="font-size: 12px; color: black; cursor: pointer;" data-toggle="modal" data-target="#privacidade"><b style="color: black">Política de privacidade</b></a>-->
       <!-- 					</div>-->
				   <!--     </form>-->
			    <!--    </div>-->
			    <!--</div>-->
			    <?php //} ?>
			    
			    
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
        <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 100%; margin-left: 8%; margin-right: 8%;">
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
                            <div class="col-sm-6 form-group">
                                <label>Nome</label><br>
                                <input type="text" class="font-gui form-control" id="nome_cadastro" name="nome_cadastro" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>CPF</label><br>
                                <input type="text" class="cpf font-gui form-control" id="cpf_cadastro" name="cpf_cadastro" required>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label>Data de nascimento</label><br>
                                <input id="nascimento" name="nascimento" type="text" class="date font-gui form-control" required>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">E-mail</label>
                                <input type="text" id="email" name="email" class="font-gui form-control" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">Telefone</label>
                                <input type="text" id="telefone" name="telefone" class="telefone font-gui form-control" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">Gênero</label>
                                <select  id="genero" name="genero" class="font-gui form-control" required>
                                    <option value="" selected disabled>  Selecione  </option>
                                    <option value="FEMININO">Feminino</option>
                                    <option value="MASCULINO">Masculino</option>
                                </select>
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
                                <input type="text" onkeyup="autofillCEP()" class="cep form-control" id="cep" name="cep" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label style="color: #444;">Número</label>
                                <input type="text" class="form-control"  id="numero" name="numero" required>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label style="color: #444;">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento">
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label style="color: #444;">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="color: #444;">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
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
                                <input  type="password" class="form-control" onfocusout="senha()" name="senha_cadastro" id="senha_cadastro">
                                <label id="alert-senha" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres!</label>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Confirmação da senha</label><br>
                                <input  type="password" class="form-control" onfocusout="senha2()" name="confirma_senha_cadastro" id="confirma_senha_cadastro">
                                <label id="alert-senha2" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres!</label>
                            </div>
                        </div>
                        <label id="alert-senha3" style="font-size: 14px; visibility: hidden; color: red;">*As senhas não são iguais!</label>
                    </div>
                    <div class="modal-footer">
                        <!--<a style="font-size: 12px; color: black; cursor: pointer;" data-toggle="modal" data-target="#privacidade"><b style="color: black">Política de privacidade</b></a>-->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button onclick="validaCpf()" class="btn g-recaptcha btn-submit" style="font-size: 1rem; font-weight: 400;" data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit2' data-action='submit'>
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
	
	
	<script src="https://www.google.com/recaptcha/api.js"></script>


    <script>
       function onSubmit(token) {
         document.getElementById("form-login").submit();
       }
    </script>
     
    <script>
        function onSubmit2(token) {
           if (valCpfCartao == true){
            document.getElementById("form-cadastro").submit();
           }    
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
        });
    </script>
    
    <script>
        function autofillCEP(){
            var aux = $('#cep').val();
            var cep = aux.replace(/\D/g,'');
            if(cep.length == 8){
                dados = new FormData();
                dados.append('cep', cep);
                $.ajax({
                    url: '<?php echo base_url('inicio/resgataCEP'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    },
                    success: function(data) {
                        if(data != "null" && data != "" && data != " " && data != null){
                            cep = jQuery.parseJSON(data);
                            var ce = cep.cep_cidadeuf.split('/');
                            $('#cep').unmask().val(cep.cep).mask('00000-000', {reverse: true}, {'translation': {0: {pattern: /[0-9*]/}}});
                            $('#cidade').val(ce[0]);
                            $('#estado').val(ce[1]).change();
                            $('#bairro').val(cep.cep_bairro);
                            if(cep.cep_rua.indexOf(',') > 0){
                                var rua = cep.cep_rua.split(',');
                                $('#endereco').val(rua[0]);
                            }else if(cep.cep_rua.indexOf(' - ') > 0){
                                var rua = cep.cep_rua.split(' - ');
                                $('#endereco').val(rua[0]);
                            }else{
                                $('#endereco').val(cep.cep_rua);
                            }
                        }
                    },
                });
            }
        }
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
	
	<script>
	    function senha(){
	        var senha = $('#senha_cadastro').val().length;
	        
	        if(senha < 6){
	            $('#alert-senha').css('visibility', 'visible');
	        } else {
	            $('#alert-senha').css('visibility', 'hidden');
	        }
	    }
	</script>
	
	<script>
	    function senha2(){
	        var senha = $('#confirma_senha_cadastro').val().length;
	        
	        if(senha < 6){
	            $('#alert-senha3').css('visibility', 'hidden');
	            $('#alert-senha2').css('visibility', 'visible');
	        } else {
	            $('#alert-senha3').css('visibility', 'hidden');
	            $('#alert-senha2').css('visibility', 'hidden');
	        }
	        
            var senha = $('#senha_cadastro').val().length;
            
            if($('#senha_cadastro').val() != $('#confirma_senha_cadastro').val()){
                $('#alert-senha3').css('visibility', 'visible');
            }
	    }
    </script>
	
	<script>
    	   // function senha2(){
    	   //     var senha = $('#confirma_senha_cadastro').val().length;
    	        
    	   //     if(senha < 6){
    	   //         $('#alert-senha3').css('visibility', 'hidden');
    	   //         $('#alert-senha2').css('visibility', 'visible');
    	   //     } else {
    	   //         $('#alert-senha3').css('visibility', 'hidden');
    	   //         $('#alert-senha2').css('visibility', 'hidden');
    	   //     }
    	   // }
    </script>
    <script>
        // function redefinir(){
        //     var senha = $('#senha_cadastro').val().length;
            
        //     if($('#senha_cadastro').val() == $('#confirma_senha_cadastro').val()){
        //         if(senha >= 6){
        //             $('#form-redefinir').submit();
        //         }
        //      }else {
        //          $('#alert-senha3').css('visibility', 'visible');
        //      }
        // }    
    </script>
	
	<script>
        function validaCpf(){
            var senha = $('#senha_cadastro').val().length;
            var id = 'cpf_cadastro';
            
            strCPF = document.getElementById(id).value;
            strCPF = strCPF.replace('-', '');
            strCPF = strCPF.replace('.', '');
            strCPF = strCPF.replace('.', '');
            var Soma;
            var Resto;
            Soma = 0;
            if (strCPF == "00000000000" ||
        strCPF == "11111111111" ||
        strCPF == "22222222222" ||
        strCPF == "33333333333" ||
        strCPF == "44444444444" ||
        strCPF == "55555555555" ||
        strCPF == "66666666666" ||
        strCPF == "77777777777" ||
        strCPF == "88888888888" ||
        strCPF == "99999999999" ) {
                valCpfCartao = false;
                document.getElementById(id).setCustomValidity('CPF Inválido!');
                document.getElementById(id).reportValidity();
            }else if(strCPF == ""){
                document.getElementById(id).setCustomValidity('');
            }else{
                for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
                Resto = (Soma * 10) % 11;
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(9, 10)) ){
                    valCpfCartao = false;
                    document.getElementById(id).setCustomValidity('CPF Inválido!');
                    document.getElementById(id).reportValidity();
                }else{
                    Soma = 0;
                    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
                    Resto = (Soma * 10) % 11;
                    if ((Resto == 10) || (Resto == 11))  Resto = 0;
                    if (Resto != parseInt(strCPF.substring(10, 11) ) ){ 
                        valCpfCartao = false;
                        document.getElementById(id).setCustomValidity('CPF Inválido!');
                        document.getElementById(id).reportValidity();
                    }else{
                        
                        
                        if(senha >= 6){
                            valCpfCartao = true;
            	        } else {
            	            $('#alert-senha').css('visibility', 'visible');
            	        }
                    }
                }
            }
        }
    </script>

