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
		<div class="container-login100" style=""><!--background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://blog.monetizze.com.br/wp-content/uploads/2021/09/marketing-de-afiliados.png); background-size: cover; background-repeat: no-repeat; -->
		    <div class="row divPrincipalLogin" style="">
		        <?php if($mobile == 0) { ?>
		        <div class="col-md-12 form-group">
			        <div class="wrap-login100" style="padding: 15%; width: 150%">
				        <form id="form-login" class="login100-form" action="<?php echo base_url('areaafiliado/loginAfiliado') ?>" method="post"> <!--Para usar o login que tem no AreaAfiliados - base_url('loginAfiliado') -->
        					<span class="login100-form-title p-b-1">
        						<p style="font-size: 30px;font-weight: 900!important;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';">Afiliado</p>
        					</span>
    
        					<div class="wrap-input100 validate-input" data-validate = "Digite um CNPJ Válido">
        					    <input class="cpf input100" type="text" name="login" id="login" required>
        						<span class="focus-input100" data-placeholder="CNPJ"></span>
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
        					<div class="p-t-1">
        					    <div class="row">
        					        <div class="text-left col-md-6">
        					            <a style="font-size: 11px; color: black; font-weight:400; cursor: pointer;" href="<?= base_url('cadastroAfiliado') ?>">Não tenho cadastro</a>
        						    </div>
        					        <div class="text-right col-md-6" >
        					            <a style="font-size: 11px; color: black; font-weight:400; cursor: pointer;" href="#" data-toggle="modal" data-target="#esqueciSenhaModal">Esqueci a senha</a>
        						    </div>
        						</div>
        					</div>
    				    </form>
			        </div>
			    </div>
			    <?php } else { ?>
		        <div class="form-group">
			        <div class="wrap-login100">
				        <form id="form-login" class="login100-form" action="<?php echo base_url('areaafiliado/loginAfiliado') ?>" method="post">

        					<span class="login100-form-title p-b-1">
        						<p style="font-size: 30px;font-weight: 900!important;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';">Entrar</p>
        					</span>
        					<div class="wrap-input100 validate-input" data-validate = "Digite um CNPJ Válido" style="margin-top: 39px">
        					    <input class="cpf input100" type="text" name="login" id="login" required>
        						<span class="focus-input100" data-placeholder="CNPJ"></span>
        					</div>
    
        					<div class="wrap-input100 validate-input" data-validate="Digite sua senha">
        					    <input type="password" name="for_autocomplete1" id="password2">
        						<span class="btn-show-pass">
        							<i class="zmdi zmdi-eye"></i>
        						</span>
        						<input class="input100" type="password" name="pass" required>
        						<span class="focus-input100" data-placeholder="Senha"></span>
        					</div>
        					    <div class="row">
                                </div>
        					<div class="container-login100-form-btn">
        						<div class="wrap-login100-form-btn" style="border-radius: 5px;">
        							<div class="login100-form-bgbtn"></div>
        							<button class="login100-form-btn g-recaptcha" style="font-family: Arial,sans-serif; font-weight: 700;font-size: 18px;color: black; background: #f7c516;" data-sitekey="<?php echo $chave['chave_site'] ?>" data-callback='onSubmit' data-action='submit'>
        								Entrar
        							</button>
        						</div>
        					</div>
        					
        					<div class="text-right p-t-1">
        					   <div class="row">
        					        <div class="text-left" style="width: 50%">
        					            <a style="font-size: 11px; color: black; font-weight:400; cursor: pointer;" href="<?= base_url('cadastroAfiliado') ?>">Não tenho cadastro</a>
        						    </div>
        					        <div class="text-right col-md-6" style="width: 50%">
        					            <a style="font-size: 11px; color: black; font-weight:400; cursor: pointer;" href="#" data-toggle="modal" data-target="#esqueciSenhaModal">Esqueci a senha</a>
        						    </div>
        						</div>
        					</div>
    				    </form>
			        </div>
			    </div>
			  <?php } ?>
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
                        <label>CNPJ:</label>
                        <input type="text" name="cpf-esquecer" id="cnpj-esquecer" class="cnpj form-control">
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
             $('.cpf').mask('00.000.000/0000-00', {reverse: true});
            
            <?php if(isset($msg)) { ?>
                <?php if($msg == 1){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'CNPJ ou senha errada(s)!',
                    })
                <?php } else if($msg == 2){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'Afiliado bloqueado, por favor entrar em contato com o SAC!',
                    })
                <?php } else if($msg == 3){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'CNPJ já cadastrado!',
                    })
                <?php } else if($msg == 4){ ?>
                    Swal.fire({
                        type: 'error',
                        title: 'CNPJ não cadastrado, tente novamente!',
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
                        title: 'Digite um CNPJ, tente novamente!',
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
	        $('#insert_cpf').mask('00.000.000/0000-00', {reverse: true});
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

