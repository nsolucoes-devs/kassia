   <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile_pedido = 1;
        } else {
            $mobile_pedido = 0;
        }
    ?>
    

<style>
        body{
            background-color: #fbf7ef!important;
        }
        btn-main{
            font-size: 11px;
            margin-top: -4px;
            color: white;
            border: 2px solid #3a0b0c;
            background-color: #3a0b0c;
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            line-height: 1.5;
            background-clip: padding-box;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            cursor: pointer;
        }
        
        .btn::before {
           background: #291402;
       }
       .marrom-padrao {
            color: saddlebrown;
       }
       p{
           line-height: 15px;
       }
       h6{
           font-family: "Poppins",sans-serif;
       }
       .grecaptcha-badge{
           display: none!important;
       }
        .custom-card{
            width: calc(100% - 8px);
            border-radius: 5px;
            background-color: white;
            margin: 4px 4px 0 4px;
            box-shadow: 5px 6px 10px -9px #000000;
            border: 0;
            padding: 15px;
            border: 1px solid #e8e8e8;
        }
       
       #nome-produto{
           margin-top: auto; margin-bottom: auto;
       }
       #qtd-produto{
           padding-top: 40px;
           color: black;
       }
       #preco-produto{
            padding-top: 45px;
            color: black;
       }
       #total-produto{
           padding-top: 45px;
           color: black;
       }
       #th-qtd{
           width: 10%;
           color: saddlebrown;
       }
              
       .titulo-banco{
	            margin-bottom: 20px;
       }
       
       #final-modal{
            margin-top: 3%!important;
        }
	        
        .p-transfer{
            line-height: 17px;
            margin: 5px;
        }
       #th-nome{
           width: 55%;
           color: saddlebrown;
       }
       @media(max-width: 500px){
            #nome-produto{
                text-align: center!important;
                margin-top: 10%!important;
            }
            #qtd-produto{
               padding-top: 20%;
               color: black;
           }
           #preco-produto{
                padding-top: 17%;
                color: black;
           }
           #total-produto{
               padding-top: 17%;
               color: black;
           }
           #th-qtd{
               padding-bottom: 6%;
               width: 10%;
               color: saddlebrown;
           }
           #th-nome{
               padding-bottom: 6%;
               width: 55%;
               color: saddlebrown;
           }
        }
    </style>
    <section class="contact-section" style="padding: 80px 15px 50px!important">
        <div class="custom-card" style="padding: 5px">
            <div class="row">
                <div class="col-md-6 form-group" style="cursor: pointer;">
                    <i onclick="redirect()" style="margin-top: 10px; border: 1px solid white; padding: 7px; border-radius: 5px; background-color: white; font-size: 19px; color: #ce9628; border: 2px solid #ce9628;" class="fa fa-reply" aria-hidden="true">VOLTAR</i>
                </div>
                <div class="col-md-6 form-group" style="padding-top: 13px;">
                    <h4 style="color: black">PEDIDO N° <?php echo $pedido['idpedido'] ?></h4>
                    <?php if($pedido['forma'] == 'boleto'){ ?>
                        <h6 style="color:black; position:absolute; margin-top:-4%; margin-left:30%;">Vencimento em <?php echo date("d/m/Y", strtotime($pedido['vencimento'])); ?></h6>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php if($mobile_pedido == 1){ ?>
                        <?php foreach($pedido['produtos'] as $p) { ?>
                            <div class="col-md-12 produto" id="produto" style="padding: 8px; max-height: 195px;">
                                <div class="row form-group">
                                    <div class="col-md-3" style="width: 25%; margin-left: 3%">
                                        <img style="height: 80px; width: auto;" src="<?php echo base_url('imagens/produtos/') . $p['produto_id'] . '.jpg'; ?>">
                                    </div>
                                    <div class="col-md-9" style="width: 70%">
                                        <p style="font-size: 11px; color: black!important;"><b style="color: black!important">Produto:</b></p>
                                        <p style="color: black!important;"><?php echo $p['produto_nome']; ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4 text-center" style="width: 30%">
                                        <p style="font-size: 11px; color: black!important;"><b style="color: black!important">Valor Unitário:</b></p>
                                        <p style="font-size: 15px; color: black!important;">R$<?php echo str_replace(".", ",", $p['produto_valor']); ?></p>
                                    </div>
                                    <div class="col-md-4 text-center" style="width: 30%; padding-right: 10%; margin-left: 0;">
                                        <p style=" font-size: 11px; color: black!important;"><b style="color: black!important">Qtd.:</b></p>
                                        <p style=" font-size: 11px; color: black!important;"><b style="color: black!important"><?php echo $p['produto_quantidade'] ?></b></p>
                                    </div>
                                    <div class="col-md-6 text-center" style="width: 40%; padding-right: 10%; margin-left: 0;">
                                        <p style=" font-size: 11px; color: black!important;"><b style="color: black!important">Valor Total:</b></p>
                                        <p style=" font-size: 18px; color: black!important;"><b style="color: black!important"><?php echo number_format($p['produto_valor'] * $p['produto_quantidade'], 2,',','.'); ?></b></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else {?>
                        <table class="table">
                            <thead>
                                <tr style="background-color: #fbf4ed;">
                                    <th style="width: 50%; color: saddlebrown;" scope="col">Produto(s)</th>
                                    <th class="text-center" style="width: 15%; color: saddlebrown;" scope="col">Valor Unitário</th>
                                    <th style="width: 15%; color: saddlebrown;" class="text-center" scope="col">Quantidade</th>
                                    <th style="width: 15%; color: saddlebrown;" class="text-center" scope="col">Valor Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pedido['produtos'] as $p) { ?>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3" style="width: 25%">
                                                    <img style="height: 80px; width: auto;" src="<?php echo base_url('imagens/produtos/') . $p['produto_id'] . '.jpg'; ?>">
                                                </div>
                                                <div class="col-md-9" style="width: 75%">
                                                    <p style="color: black!important;"><?php echo $p['produto_nome']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p style="font-size: 15px; color: black!important;">R$<?php echo str_replace(".", ",", $p['produto_valor']); ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p style=" font-size: 11px; color: black!important;"><b style="color: black!important"><?php echo $p['produto_quantidade'] ?></b></p>
                                        </td>
                                        <td class="text-center">
                                            <p style=" font-size: 18px; color: black!important;"><b style="color: black!important">R$ <?php echo number_format($p['produto_valor'] * $p['produto_quantidade'], 2,',','.'); ?></b></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
                <hr style="height: 1px; border-color: lightgrey; margin-top:0; margin-bottom: 25px">
                <?php if($pedido['forma'] == 'boleto'){ ?>
                        <a style="margin-left: 1.2%;" href="<?php echo $pedido['boleto'];?>" target="_blank"><i style="margin-top: 10px; border: 1px solid white; padding: 7px; border-radius: 5px; background-color: white; font-size: 19px; color: #ce9628; border: 2px solid #ce9628;" class="fa fa-money" aria-hidden="true"> Gerar Boleto</i></a>
                        <i style="margin-top: 10px; border: 1px solid white; padding: 7px; border-radius: 5px; background-color: white; font-size: 19px; color: #ce9628; border: 2px solid #ce9628;" class="fa fa-money" aria-hidden="true"> Linha digitável: <?php echo $pedido['codigoBarras'];?></i>
                    <?php } ?>
                <div class="col-md-12 form-group">
                    <div style="margin-top: 6%">
                        <h5 style="color: black">HISTÓRICO:</h5>
                        <div class="table-responsive" style="width: 100%">
                            <table class="table">
                                <thead>
                                    <tr style="background-color: #fbf4ed;">
                                        <th style="width: 15%; color: saddlebrown;" scope="col">Data/hora</th>
                                        <th class="text-center" style="width: 50%; color: saddlebrown;" scope="col">Histórico</th>
                                        <th style="width: 15%; color: saddlebrown;" class="text-center" scope="col">Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($pedido['historico_devolucao']) { ?>
                                        <?php foreach($pedido['historico_devolucao'] as $h_d){ ?>
                                            <tr style="font-size: 14px; color: black" class="produto">
                                                <td><?php echo date('d/m/Y', strtotime($h_d['historico_data'])) . ' ' . date('H:i', strtotime($h_d['historico_hora'])) ?></td>
                                                <td><?php echo $h_d['historico_comentario'] ?></td>
                                                <td class="text-center"><?php echo $h_d['historico_status'] ?></td>
                                            </tr>
                                    <?php } } ?>
                                    <?php foreach($pedido['historico'] as $h){ ?>
                                        <tr style="font-size: 14px; color: black" class="produto">
                                            <td><?php echo $h['historico_data'] . ' ' . $h['historico_hora'] ?></td>
                                            <td><?php echo $h['historico_comentario'] ?></td>
                                            <td class="text-center"><?php echo $h['historico_status'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="col-md-12 text-center">
                        <h4 style="color: black">DETALHES PEDIDO</h4>
                    </div>
                    <hr style="height: 1px; border-color: lightgrey; margin-top:0; margin-bottom: 25px">
                    <div class="row">    
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%">
                                        <p style="color: black"><b style="color: black">Produto(s):</b></p>
                                    </div>
                                    <div class="text-right col-md-6" style="width: 50%">
                                        <p style="color: black">R$ <span id="sub_total"><?php echo number_format($pedido['total'],2,',','.') ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%">
                                        <p style="color: black"><b style="color: black">Frete:</b></p>
                                    </div>
                                    <div class="text-right col-md-6" style="width: 50%">
                                        <p style="color: black">R$ <span id="frete"><?php echo number_format($pedido['frete_valor'],2,',','.') ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%">
                                        <p style="color: black"><b style="color: black">Desconto:</b></p>
                                    </div>
                                    <div class="text-right col-md-6" style="width: 50%">
                                        <p style="color: black">R$ <span id="desconto"><?php echo number_format($pedido['desconto'],2,',','.') ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%">
                                        <h3 style="color: black">TOTAL</h3>
                                    </div>
                                    <div class="text-right col-md-6" style="width: 50%">
                                        <h4>R$ <span id="total"><?php echo number_format($pedido['total'] + $pedido['frete_valor'] - $pedido['desconto'],2,',','.') ?></span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if($mobile_pedido == 1){ ?>
                                <div class="col-md-12">
                                    <hr style="height: 1px">
                                </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <div class="row" style="line-height: 12px">
                                    <div class="col-md-4" style="width: 40%">
                                        <p><b style="color: black; font-size: 13px">Status:</b></p>
                                        <p><b style="color: black; font-size: 13px">Pagamento:</b></p>
                                        <p><b style="font-size: 13px; color: black">Envio:</b></p>
                                    </div>
                                    <div class="col-md-8" style="width: 60%">
                                        <p style="font-size: 13px"><?php echo $pedido['status'] ?></p>
                                        <p style="font-size: 13px"><?php echo $pedido['forma'] ?></p>
                                        <p style="font-size: 13px"><?php echo $pedido['frete'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

<script>
    function redirect(){
        window.parent.location.href = '<?php echo base_url(); ?>'; 
    };
</script>

<?php if($geraBoleto == 1){;?>
    <script>
        window.location.href = '<?php echo $pedido['boleto'];?>';
    </script>
<?php };?>