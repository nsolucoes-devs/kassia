    <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile = true;
            $mobile_view = 1;
        } else {
            $mobile = false;
            $mobile_view = 0;
        }
        
       
        
    ?>

    
    <style>
        .custom-card{
            width: calc(100% - 8px);
            border-radius: 10px;
            background-color: white;
            margin: 4px 4px 0 4px;
            padding: 15px 70px;
        }
        .main-section{
            padding: 20px 20px;
            padding-left: 8%!important;
        }
        
        #resumoPedido{
            position: absolute;
     
            border: 1px solid #e4e4e4;
            padding: 25px;
            border-radius: 15px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            transition: top 0.2s;
            top: 0;
        }
        .divPrincipalResumo{
            margin-top: 10%
        }
        
        .btn-primary.disabled, .btn-primary:disabled {
            background-color: gray;
            border-color: grey;
        }
        
        @media(max-width: 413px){
            .main-section{padding: 5px 10px!important; padding-top: 45%!important;}
            #resumoPedido{position: relative; right: 13px; width: 350px;}
            .divPrincipalResumo{margin-bottom: 10%;}
            .termos{position: relative; left: -5%; top: 19px;}
            .termos-check{right: -70%!important; top: -11px!important; width: 20%!important;}
        }
        
        @media(min-width: 414px) and (max-width: 766px){
            .main-section{padding: 5px 10px!important; padding-top: 35%!important;}
            #resumoPedido{position: relative; right: -10px; width: 350px;}
            .divPrincipalResumo{margin-bottom: 10%;}
            .termos{position: relative; left: -5%; top: 19px;}
            .termos-check{right: -31%!important; top: -11px!important;}
        }
        
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .main-section{padding: 90px 20px; padding-left: 8%!important; padding-right: 8%!important; margin-bottom: 20%;}
            #resumoPedido{left: 23%;}
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .main-section{padding: 90px 20px; padding-left: 8%!important; padding-right: 8%!important; margin-bottom: 20%;}
            #resumoPedido{left: 30%;}
        }
        
    </style>

    <section class="contact-section main-section" style="padding-bottom: 30%;">
        <div class="container divPrincipalResumo" style="">
            <div class="row">
                <!--<div class="col-xl-7 col-lg-12 col-md-12 col-12 form-group" style="border: 1px solid #e4e4e4;padding: 25px;border-radius: 15px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">-->
                <!--    <form id="fechaCarrinho" method="post" enctype="multipart/form-data">-->
                <!--        <?php if(isset($carrinho['questoes']) || isset($carrinho['uploads'])){ ?>-->
                <!--            <?php if($carrinho['questoes'] || $carrinho['uploads']){ ?>-->
                <!--                <label style="font-size: 30px; color: #444; font-weight: 700;">Informações para o produto:</label>-->
                <!--            <?php } else { ?>-->
                <!--                <label style="font-size: 30px; color: #444; font-weight: 700;">Esse produto não possui informações adicionais, apenas prossiga.</label>-->
                <!--            <?php } ?>-->
                <!--            <?php if($carrinho['questoes']){ ?>-->
                <!--                <?php $cont=0; foreach($carrinho['questoes'] as $q){ $cont ++; ?>-->
                <!--                    <div class="col-xl-12 form-group">-->
                <!--                        <p style="font-size: 15px; font-weight: 500"><?php echo $q ?></p>-->
                <!--                        <textarea style="height: 100px" class="questionario form-control"></textarea>-->
                                        <!--<input type="text" size="100" style="height: 100px" class="questionario form-control" id="questao<?php echo $cont;?>" name="questao<?php echo $cont;?>">-->
                <!--                    </div>-->
                <!--                <?php  } ?>-->
                <!--            <?php } ?>-->
                <!--            <?php if($carrinho['uploads']){ ?>-->
                <!--                <?php foreach($carrinho['uploads'] as $u){ ?>-->
                <!--                    <div class="col-xl-12 form-group">-->
                <!--                        <p style="font-size: 15px; font-weight: 500"><?php echo $u ?></p>-->
                <!--                        <button type="button" onclick="$(this).next().click()" class="btn btn-primary">Insira o Documento</button>-->
                <!--                        <input onchange="documentTest(this)" style="visibility: hidden" type="file" name="upload" multiple="multiple" id="upload" class="uploads form-control">-->
                <!--                    </div>-->
                <!--                <?php } ?>-->
                <!--            <?php } ?>-->
                <!--        <?php } else { ?>-->
                <!--            <label style="font-size: 30px; color: #444; font-weight: 700;">Esse produto não possui informações adicionais, apenas prossiga.</label>-->
                <!--        <?php } ?>-->
                <!--        <input type="hidden" id="totalQuestao" name="totalQuestao" value="<?php echo $cont; $cont++;?>">-->
                <!--    </form>-->
                <!--</div>-->
                <div class="col-xl-5 col-lg-12 col-md-12 col-12 form-group">
                    <div id="resumoPedido">
                        <label style="font-size: 30px; color: #444; font-weight: 700;">RESUMO DO PEDIDO</label>
                        <?php if(isset($valorTotal)) { ?>
                            <div class="row">
                                <div class="col-xl-6 text-left">
                                    <p style="font-size: 16px; font-weight: 500">Compra</p>
                                </div>
                                <div class="col-xl-6 text-left">
                                    <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($valor_exibir), 2, ',','.'); ?></p>
                                </div>
                            </div>
                        <?php } else { ?>   
                            <div class="row">
                                <div class="col-xl-6">
                                    <p style="font-size: 16px; font-weight: 500">Compra</p>
                                </div>
                                <div class="col-xl-6">
                                    <p style="font-size: 16px; font-weight: 500">R$ 0,00</p>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <?php if(isset($desconto) && $desconto > 0){
                        ?>
                            <div class="row">
                                <div class="col-xl-6 text-left">
                                    <p style="font-size: 16px; font-weight: 500">Desconto</p>
                                </div>
                                <div class="col-xl-6 text-left">
                                    <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($desconto),2,',','.') ?></p>
                                </div>
                            </div>
                        <?php } ?>  
                      <?php if($valor_exibir > $valorTotal){
                        ?>
                            <div class="row">
                                <div class="col-xl-6 text-left">
                                    <p style="font-size: 16px; font-weight: 500">Desconto</p>
                                </div>
                                <div class="col-xl-6 text-left">
                                    <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($valor_exibir - $valorTotal),2,',','.') ?></p>
                                </div>
                            </div>
                        <?php } ?>   
                        <div class="row">
                            <div class="col-xl-6 text-left">
                                <p style="font-size: 16px; font-weight: 500">Total</p>
                            </div>
                            <div class="col-xl-6 text-left">
                                <p style="font-size: 16px; font-weight: 500" id="totalgeral"><?php if($valorTotal){ echo 'R$ '.number_format($valorTotal - $desconto, 2,',','.');} else { echo 'R$ 0,00'; } ?></p>
                            <?php
                            if(isset($desconto)){
                                $valorTotal -= $desconto;
                            }
                            ?>
                            </div>
                        </div>
                        
                        <div class="row" style="margin-top: 5%">
                            <div class="col-xl-12">
                                <div class="row" style="text-align: center;">
                                    <div class="col-md-10 termos">
                                        <?php if(strpos($carrinho['servico'], "1ª Etapa")){ $aux = 1;}else{  $aux = 2; }?>
                                        <label> Aceito os <a href="#" style="color: #007bff; cursor: pointer;" onclick="callTermo('<?php echo $aux;?>')" data-toggle="modal" data-target="#termos"> termos </a> de compra</label><!--href="#contratoModal" data-toggle="modal"-->
                                    </div>
                                    <div class="col-md-2 termos-check" style="position: relative; right: 16%; top: 2px;">
                                        <input id="contrato-check" type="checkbox">
                                    </div>
                                </div>
                                <button onclick="finaliza()" id="encerraCompra" type="button" class="btn btn-primary btn-block">
                                    Finalizar Pedido
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!-- Modal -->
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
            <button style="width: 120px;" type="submit" class="btn btn-primary">Logar</button>
          </div>
      </form>
    </div>
  </div>
</div>


<!-- modal contrato -->

<!--<div class="modal fade" id="contratoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog" role="document">-->
<!--    <div class="modal-content" style="width: 230%; position: relative; right: 65%;">-->
<!--      <div class="modal-header">-->
<!--        <h5 class="modal-title" id="exampleModalLabel">Contrato</h5>-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--          <span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
<!--          <iframe src="<?php echo base_url('imagens/contratos/'.$pdf); ?>" style="width:100%; height:780px;" frameborder="0"></iframe>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->


<!-- Contrato Mobile -->
<div class="modal" tabindex="-1" role="dialog" id="termos">
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


<script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('recursos/js/material/plugins/sweetalert2.js'); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>


<!-- SCRIPTS DO CARRINHO INICIO -->

<script>
    function documentTest(a){
        
        if($(a).parent().children().last().attr('class') == 'namefile-dinamic'){
            $(a).parent().children().last().html(a.files[0].name);
        } else {
            var p = "<p class='namefile-dinamic'>"+a.files[0].name+"</p>";
        
            $(a).parent().last().append(p);
        }
    }
</script>

<script>
    function finaliza(){
        var check = document.getElementById('contrato-check');
        
        if(check.checked){
        
            var questionario = "";
            var boolean = true;
            
            $('.questionario').each(function(){
                // if($(this).val() == "" || $(this).val() == " " || $(this).val() == null){
                //     boolean = false;
                //     $(this).focus();
                //     Swal.fire(
                //       'Questionário não preenchido!',
                //       '',
                //       'error'
                //     );
                // } else {
                    // if(questionario == ""){
                    //     questionario = "Cliente não informou.";
                    // } else {
                    //     questionario = questionario + "¬" + $(this).val();
                    // }
                // }
                
                if(questionario == ""){
                    if($(this).val() == ""){
                        questionario = "Cliente não informou.";
                    } else {
                        questionario = $(this).val();
                    }
                }else{
                    if($(this).val() == ""){
                        questionario = questionario + "¬" + "Cliente não informou.";
                    } else {
                        questionario = questionario + "¬" + $(this).val();
                    }
                }
                
            });
            $('.uploads').each(function(){
                // if($(this).val() == "" || $(this).val() == " " || $(this).val() == null){
                //     boolean = false;
                //     //$(this).focus();
                //     Swal.fire(
                //       'Documento não inserido',
                //       '',
                //       'error'
                //     )
                // } 
            });
            if(boolean){
                
                $("#encerraCompra").prop("disabled", true);
                $("#encerraCompra").html("Processando, aguarde...");
                
                dados = new FormData();
                dados.append('questionario', questionario);
                let arr = [];
                let n = 0;
                $(".uploads").each(function(ii, value){
                    if(value.files[0]){
                        
                        dados.append('uploadImagem_'+n, value.files[0]);
                        n++;
                    }
                })
                
                dados.append('totalImagens', n);
                
                $.ajax({
                    url: '<?php echo base_url('FinalizaUnico/encerra2'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    error: function(xhr, status, error) {
                        console.log(error);
                        finaliza();
                        $("#encerraCompra").prop("disabled", false);
                        $("#encerraCompra").html("Finalizar pedido");
                    },
                    success: function(data) {
                        //return false;
                        processaPagamento();
                    },
                });
            }
        
        }else{
            Swal.fire(
              'Termo não aceito',
              '',
              'error'
            )
        }
    }

    function apagar(){
        window.parent.document.getElementById('loader').style.backgroundColor = "#000000bd";
        window.parent.document.getElementById('loader').style.zIndex  = "10";
        window.parent.document.getElementById('loader').style.height = "100%";
        window.parent.document.getElementById('loader').style.width = "100%";
        window.parent.document.getElementById('loader').style.position = "absolute";
    }
    function libera(){
        window.parent.document.getElementById('loader').style.zIndex  = "1";
        window.parent.document.getElementById('loader').style.height = "0";
        window.parent.document.getElementById('loader').style.width = "0";
        window.parent.document.getElementById('loader').style.position = "unset";
    }
    
    
    function processaPagamento(){
        $.ajax({
            url: '<?php echo base_url('PagamentoSTN/pgmtPGM'); ?>',
            method: 'post',
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
                
            },
            success: function(data) {
                apagar();
                pagamentofinish(data);

            },
        });
    }
    function pagamentofinish(dados){
        function handleSuccess (data) {
            console.log(data);
            var token = data.token;
            var method = data.payment_method; 
            libera();
            
            $('#processamentoPagamento').css('display','contents');
            $('#preloader .inner').fadeIn();
            $('#preloader').delay(350).fadeIn('slow'); 
                
            location.replace("<?php echo base_url();?>pagamentoSTN/capturaPGM/?token="+token+"&payment_method="+method+"&amount="+<?php echo $valorTotal;?>);
        }
        function handleError (data) {
            console.log(data);
            libera();
        }
        function handleClose (data) {
            console.log(data);
            
            $('#processamentoPagamento').css('display','contents');
            $('#preloader .inner').fadeIn();
            $('#preloader').delay(350).fadeIn('slow'); 
            
            location.replace("<?php echo base_url('pagamentoSTN/cancelaPGM/');?>");
            libera();
        }
    
        var checkout = new PagarMeCheckout.Checkout({
            encryption_key: dados['chave'],
            success: handleSuccess,
            error: handleError,
            close: handleClose,
        });

        checkout.open({
            amount: dados['compra']['amount'],
            createToken: dados['compra']['createToken'],
            
            customerData: dados['compra']['customerData'],
            customer: {
                name: dados['compra']['customer.name'],
                type: dados['compra']['customer.type'],
                country: dados['compra']['customer.country'],
                email: dados['compra']['customer.email'],
                external_id: dados['compra']['customer.external_id'],
                documents: [
                    {
                        type: dados['compra']['customer.documents.type'],
                        number: dados['compra']['customer.documents.number'],
                    },
                ],
                birthday: dados['compra']['customer.birthday'],
            },
            billing: {
                name: dados['cobranca']['billing.name'],
                address: {
                    country: dados['cobranca']['billing.address.country'],
                    state: dados['cobranca']['billing.address.state'],
                    city: dados['cobranca']['billing.address.city'],
                    neighborhood: dados['cobranca']['billing.address.neighborhood'],
                    street: dados['cobranca']['billing.address.street'],
                    street_number: dados['cobranca']['billing.address.street_number'],
                    zipcode: '38050580',
                    complementary: dados['cobranca']['billing.address.complementary'],
                }
            },
            shipping: {
                name: dados['envio']['shipping.name'],
                fee: dados['envio']['shipping.fee'],
                expedited: dados['envio']['shipping.expedited'],
                address: {
                    country: dados['envio']['shipping.address.country'],
                    state: dados['envio']['shipping.address.state'],
                    city: dados['envio']['shipping.address.city'],
                    neighborhood: dados['envio']['shipping.address.neighborhood'],
                    street: dados['envio']['shipping.address.street'],
                    street_number: dados['envio']['shipping.address.street_number'],
                    zipcode: '38050580',
                    complementary: dados['envio']['shipping.address.complementary'],
                }
            },
            items: [
                {
                    id: dados['produto']['item.id'],
                    title: dados['produto']['item.title'],
                    unit_price: dados['produto']['item.unit_price'],
                    quantity: dados['produto']['item.quantity'],
                    tangible: dados['produto']['item.tangible'],
                },
            ],
            postback_url: dados['compra']['postback_url,'] 
        })
    }
</script>
<script>
    function callTermo(id){
        dados = new FormData();
        dados.append('termo', id);  
        $.ajax({
            url: '<?php echo base_url('servico/chamatermo'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
                
            },
            success: function(data) {
                $("#termos .modal-body").html(data);
            },
        });
    }
</script>

