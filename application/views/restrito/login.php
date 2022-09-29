<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="N Soluções Agência Digital - www.nsoluti.com.br" />
        <title>Restrito - Ecommerce</title>
        
        <link href="<?php echo base_url('assets/admin/');?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin/');?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/');?>css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/');?>lib/gritter/css/jquery.gritter.css" />
        <link href="<?php echo base_url('assets/admin/');?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin/');?>css/style-responsive.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/admin/');?>lib/chart-master/Chart.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/css/util.css">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/css/main.css">
    	<link href="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css">

    </head>    
    
    <style>
        .fundo{
            position: relative;
            height: 100vh;
            width: 100vw;
            background-color: white;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 0;
        }
        
        #login-page{
            position: absolute;
            z-index: 1;
            left: 0;
            right: 0;
        }
        
        .wrap-login100-form-btn {
            border-radius: 5px!important;
        }
        
        /*.login100-form-bgbtn {*/
        /*    background: -webkit-linear-gradient(right, #11a01c, #088a18, #48a50d, #46900f);*/
        /*}*/
        
        .focus-input100::before {
            /*background: -webkit-linear-gradient(left, #37d01b, #1da90c);*/
            /*background: -webkit-linear-gradient(left, #274ca9, var(--base-color));*/
        }
        
        .login100-form-bgbtn {
            /*background: -webkit-linear-gradient(right, #2f60dd, var(--base-color), #2e65ed, #0c276a);*/
        }
        
        .login100-form-bgbtn {
            background: black;
        }
        
        .wrap-login100{
            border: 1px solid #afd4fa!important;
        }
        
    </style>
    
    <body onload="erro()">
        
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="border: 1px solid #00ff14;">
				<form class="login100-form" action="<?php echo base_url('2802a69d3ecca828c74a75fcfeab3200'); ?>" method="post">
                    <input type="hidden" value="<?php echo base_url(); ?>" name="url" id="url">
					<span class="login100-form-title p-b-1">
						<img style="width: 200px;position: relative;top: -40px;" src="<?php echo base_url('imagens/site/logo2.png') ?>">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Digite um Usuário Válido">
						<input class="input100" type="text" name="login" id="login" required>
						<span class="focus-input100" data-placeholder="Usuário"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Digite sua senha">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="senha" id="senha" required>
						<span class="focus-input100" data-placeholder="Senha"></span>
						<button id="senha_btn" style="position: absolute;top: 6px;right: 10px;font-size: 22px;" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
					</div>
					
					<?php if(!isset($chave)){ ?>
                        <div style="margin-left: -10px;" ></div>
                        <!-- class="g-recaptcha" data-sitekey="<?php echo $chave['chave_site'] ?>" -->
                    <?php } ?>
                    
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
				<div class="col-md-12 text-right" style="margin-top: 20px">
				    <a style="color: brown" href="<?php echo base_url('') ?>">Voltar</a>
				</div>
			</div>
		</div>
	</div>
        
        
    
        <!-- Modal -->
        <div id="myModal" class="modal">
          <div class="modal-dialog">
        
            <div class="modal-content">
              <div class="modal-header" style="background-color: #7800a7!important;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Mensagem do Sistema</h4>
              </div>
              <div class="modal-body">
                <p id="msg_erro" style="font-size: 20px"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              </div>
            </div>
        
          </div>
        </div>
        
        <script src="<?php echo base_url('assets/admin/'); ?>lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/'); ?>lib/jquery.backstretch.min.js"></script>
        <script>
            function erro(){
                var aux = <?php echo $erro ?>;
                if(aux == null){
                    document.getElementById('msg_erro').innerHTML = "Sem erro";
                    $('#myModal').modal('show');
                }else if(aux == 1){
                    document.getElementById('msg_erro').innerHTML = "Usuário incorreto!";
                    $('#myModal').modal('show');
                }else if(aux == 2){
                    document.getElementById('msg_erro').innerHTML = "Senha incorreta!";
                    $('#myModal').modal('show');
                }else if(aux == 3){
                    document.getElementById('msg_erro').innerHTML = "Usuário Inativo!";
                    $('#myModal').modal('show');
                }else if(aux == 4){
                    document.getElementById('msg_erro').innerHTML = "Captcha não verificado!";
                    $('#myModal').modal('show');
                }else if(aux == 5){
                    document.getElementById('msg_erro').innerHTML = "Usuário bloqueado, por favor entre em contato com um administrador pelo e-mail: suporte@cachacacheiademanias.com";
                    $('#myModal').modal('show');
                }
            }
        </script>
        
        
        
        <script type="text/javascript">
              var onloadCallback = function() {
              };
        </script>
        
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

        <script src="<?php echo base_url('assets/admin/');?>lib/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/admin/');?>lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="<?php echo base_url('assets/admin/');?>lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="<?php echo base_url('assets/admin/');?>lib/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url('assets/admin/');?>lib/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin/');?>lib/jquery.sparkline.js"></script>
        <script src="<?php echo base_url('assets/admin/');?>lib/common-scripts.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/');?>lib/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/');?>lib/gritter-conf.js"></script>
        <script src="<?php echo base_url('assets/admin/');?>lib/sparkline-chart.js"></script>
        <script src="<?php echo base_url('assets/admin/');?>lib/zabuto_calendar.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('resources/datatables/datatable/js/jquery.dataTables.js')?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('resources/datatables/datatable/js/jquery.dataTables.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resources/datatables/datatable/js/dataTables.bootstrap.min.js');?>"></script>
        
        <script>
            $('#senha_btn').on('click', function(){
                const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                $('#senha').prop('type', type);
                if(type == "text"){
                    $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                }else{
                    $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        </script>
        
        
        <!-- sweetalert2 -->
        <script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
        <script src='<?php echo base_url('recursos/js/');?>/material/plugins/sweetalert2.js'></script>	
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/areauser/vendor/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/areauser/vendor/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/vendor/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/areauser/js/main.js"></script>
    </body>

</html>
