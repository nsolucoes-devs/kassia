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
    
    .custom-card{
        width: calc(100% - 8px);
        border-radius: 10px;
        background-color: white;
        margin: 4px 4px 0 4px;
        box-shadow: 5px 6px 10px -9px #000000;
        padding: 15px;
        min-height: 200px;
        border: 1px solid #e8e8e8;
    }
     
    #preloader {
        position:fixed;
        top:0;
        left:0;
        right:0;
        bottom:0;
        background-color: black; /* cor do background que vai ocupar o body */
        z-index:999; /* z-index para jogar para frente e sobrepor tudo */
    }
    
    #preloader .inner {
        position: absolute;
        top: 50%; /* centralizar a parte interna do preload (onde fica a animação)*/
        left: 50%;
        transform: translate(-50%, -50%);  
    }
    .bolas > div {
      display: inline-block;
      background-color: #fff;
      width: 12px!important;
      height: 12px!important;
      border-radius: 100%;
      margin: 3px;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
      animation-name: animarBola;
      animation-timing-function: linear;
      animation-iteration-count: infinite;
       
    }
    .bolas > div:nth-child(1) {
        animation-duration:0.75s ;
        animation-delay: 0;
    }
    .bolas > div:nth-child(2) {
        animation-duration: 0.75s ;
        animation-delay: 0.12s;
    }
    .bolas > div:nth-child(3) {
        animation-duration: 0.75s  ;
        animation-delay: 0.24s;
    }
     
    @keyframes animarBola {
      0% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1;
      }
      16% {
        -webkit-transform: scale(0.1);
        transform: scale(0.1);
        opacity: 0.7;
      }
      33% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1; 
      } 
    }
</style>

  <!-- início do preloader -->
    <div id="preloader">
        
        <div class="inner">
            <p id="pre-loader-boleto" style="display: none; top: 50%;left: <?php if($mobile_view == 0) { echo '-200%'; } else { echo '-225%'; } ?>;width: 500px; position: absolute; color: white">Estamos processando seu boleto, aguarde.</p>
           <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
           
           <div class="bolas">
              <div></div>
              <div></div>
              <div></div>                    
           </div>
        </div>
    </div>
    <!-- fim do preloader --> 


<?php if($mobile_view == 0){ ?>
<div class="row" style="padding-top: 4%; width: 100%!important">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-group text-center" style="margin-bottom: 24%; margin-top: 10%;">
        <div class="custom-card">
            <button style="width: 55%;height: 90px;" class="btn btn-primary">
                <i style="font-size: 30px;" class="fa fa-usd" aria-hidden="true"></i> 
                Realizar Pagamento
            </button>
            <p style="padding-top: 10px!important;font-size: 11px; font-weight: 700; color: #444">
                Clique para realizar o pagamento
            </p>
            <div class="col-md-12 text-right" style="padding-top: 20px;">
                <a href="<?php echo base_url('finalizaUnico/retornarCompra'); ?>"><span style="text-decoration: underline; text-align: right!important; cursor: pointer; color: red;">Voltar ao Site</span></a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<?php } else { ?>
<div class="row" style="width: 100%!important">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-group text-center" style="margin-bottom: 24%; margin-top: 30%;">
        <div class="custom-card" style="margin: 20px!important">
            <button style="margin-top: 7%; padding: 20px 25px!important; "><i style="font-size: 30px;" class="fa fa-usd" aria-hidden="true"></i> <b style="color: #dcb05a;">Realizar Pagamento</b></button>
            <p style="font-size: 11px;"><b style="color: black;">Clique para realizar o pagamento</b></p>
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('finalizaUnico/retornarCompra'); ?>"><span style="text-decoration: underline; text-align: right; cursor: pointer; color: red;">Voltar a compras</span></a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<?php } ?>



<script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>

<script>
    $(window).on('load', function () {
        $('#preloader .inner').fadeOut();
        $('#preloader').delay(850).fadeOut('slow'); 
        $('body').delay(850).css({'overflow': 'visible'});
    })
</script>

<script>
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
    var button = document.querySelector('button')
        button.addEventListener('click', function() {
            apagar();
        
            function handleSuccess (data) {
                console.log(data);
                var token = data['token'];
                var method = data['payment_method']; 
                libera();
                
                $('#pre-loader-boleto').show();
                $('#preloader .inner').fadeIn();
                $('#preloader').fadeIn('slow'); 
                $('body').css({'overflow': 'invisible'});
                
                location.replace("<?php echo base_url();?>pagamentoSTN/capturaPGM/?token="+token+"&payment_method="+method+"&amount="+<?php echo $compra['amount'];?>);
            }
    
            function handleError (data) {
                console.log(data);
                libera();
                
            }
        
            function handleClose (data) {
                libera();
            }
        
            var checkout = new PagarMeCheckout.Checkout({
                encryption_key: '<?php echo $crypto;?>',
                success: handleSuccess,
                error: handleError,
                close: handleClose,
            });

            checkout.open({
                amount: <?php echo $compra['amount'];?>,
                createToken: '<?php echo $compra['createToken'];?>',
                
                customerData: <?php echo $compra['customerData'];?>,
                customer: {
                    external_id: '<?php echo $compra['customer.external_id'];?>',
                    name: '<?php echo $compra['customer.name'];?>',
                    type: '<?php echo $compra['customer.type'];?>',
                    country: '<?php echo $compra['customer.country'];?>',
                    email: '<?php echo $compra['customer.email'];?>',
                    documents: [
                        {
                            type: '<?php echo $compra['customer.documents.type'];?>',
                            number: '<?php echo $compra['customer.documents.number'];?>',
                        },
                    ],
                    phone_numbers: <?php echo $compra['customer.phone_numbers'];?>,
                    birthday: '<?php echo $compra['customer.birthday'];?>',
                },
                billing: {
                    name: '<?php echo $cobranca['billing.name'];?>',
                    address: {
                        country: '<?php echo $cobranca['billing.address.country'];?>',
                        state: '<?php echo $cobranca['billing.address.state'];?>',
                        city: '<?php echo $cobranca['billing.address.city'];?>',
                        neighborhood: '<?php echo $cobranca['billing.address.neighborhood'];?>',
                        street: '<?php echo $cobranca['billing.address.street'];?>',
                        street_number: '<?php echo $cobranca['billing.address.street_number'];?>',
                        zipcode: '<?php echo $cobranca['billing.address.zipcode'];?>',
                        complementary: '<?php echo $cobranca['billing.address.complementary'];?>',
                    }
                },
                shipping: {
                    name: '<?php echo $envio['shipping.name'];?>',
                    fee: <?php echo $envio['shipping.fee'];?>,
                    expedited: <?php echo $envio['shipping.expedited'];?>,
                    address: {
                        country: '<?php echo $envio['shipping.address.country'];?>',
                        state: '<?php echo $envio['shipping.address.state'];?>',
                        city: '<?php echo $envio['shipping.address.city'];?>',
                        neighborhood: '<?php echo $envio['shipping.address.neighborhood'];?>',
                        street: '<?php echo $envio['shipping.address.street'];?>',
                        street_number: '<?php echo $envio['shipping.address.street_number'];?>',
                        zipcode: '<?php echo $envio['shipping.address.zipcode'];?>',
                        complementary: '<?php echo $envio['shipping.address.complementary'];?>',
                    }
                },
                items: [
                <?php foreach($produto as $pdt){?>    
                    {
                        id: '<?php echo $pdt['item.id'];?>',
                        title: '<?php echo $pdt['item.title'];?>',
                        unit_price: <?php echo $pdt['item.unit_price'];?>,
                        quantity: <?php echo $pdt['item.quantity'];?>,
                        tangible: <?php echo $pdt['item.tangible'];?>
                    },
                <?php }?>
                ],
                postback_url: '<?php echo $compra['postback_url'];?>', 
        })
    });
</script>