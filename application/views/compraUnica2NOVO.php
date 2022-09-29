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
            background-color: #f5f5f7;
            margin: 13% 4px 0 4px;
            min-height: 200px;
            border: 1px solid #e8e8e8;
            border-bottom: 10px solid var(--base-color);
        }
        .main-section{
            height: 100vh;
            padding: 1px 15px 20px 15px;
            background: white;
            margin-bottom: 10%;
        }
        #modal-completa{
            max-width: 56%; margin-left: 22%; margin-right: 22%;
               
        }
        .swal2-popup .swal2-styled.swal2-confirm {
            background-color: var(--base-color)!important;
        }
        .custom-label{
            font-family: "Poppins",sans-serif;
            font-size: 14px;
            color: black;
        }

        .button-proximo{
            padding: 0;
            background: none;
            border-radius: 5px;
            color: var(--base-color)!important;
        }
        .button-proximo:before{
            color: white!important;
            background-color: var(--base-color)!important;
            box-shadow: none!important;
            border-color: var(--base-color)!important;
            background: var(--base-color)!important;
        }
        .button-proximo:hover{
            color: white!important;
            background-color: var(--base-color)!important;
            box-shadow: none!important;
            border-color: var(--base-color)!important;
            background: var(--base-color)!important;
        }
        
        .see-pass{
            width: 10%;
            margin-left: -4px;
            margin-top: -2px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            padding: 7px;
            border-radius: 5px;
            background: var(--base-color)!important;
            border-color: var(--base-color)!important;
            color: white;
            cursor: pointer;
        }
        .passwd{
            width: 88%;
            display: inline;
            margin-right: 1%;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
    
        
        .corpoPrincipal{
            margin-top: 3%;
            padding-left: 5%!important;
            border-radius: 10px;
            padding: 30px;
        }
        
        /* XX-Small devices (300px and up) */
        @media ( min-width: 299px ) and ( max-width: 398px ) {
            .main-section{padding: 35% 15px 20px 15px!important;}
            main{padding-bottom: 30%;}
        }
        
        @media (width: 375px) and (height: 812){
            .main-section{padding: 35% 15px 20px 15px!important;}
            main{padding-bottom: 0%!important;}
        }
        
        @media (min-width: 399px) and (max-width: 499){
            .img-mobile{
                width: 80%!important;
                height: auto!important;
            }
        }
        @media (min-width: 501px) and (max-width: 600){
            .main-section{
                padding: 130px 15px 15px 15px!important;
                margin-bottom: 90%!important;
            }
        }
        
        @media(max-width: 500px){
            #modal-completa{
                max-width: 98%;
                margin-left: 1%!important;
                margin-right: 0!important; 
            }
            .label-forma{
                font-size: 15px!important;
            }
            .custom-card{
                padding: 0 0!important;
            }
            .main-section{
                padding: 30% 15px 20px 15px;
                margin-bottom: 20px!important;
            }
        }
        
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            #modal-completa{
                max-width: 98%;
                margin-left: 1%!important;
                margin-right: 0!important; 
            }
            .label-forma{
                font-size: 15px!important;
            }
            .custom-card{
                padding: 0 0!important;
            }
            .servico{
                padding: 8px!important;
                max-height: 370px!important;
            }
            .main-mobile{
                padding-top: 0%!important;
                margin-bottom: 0%!important;
            }
            .titulo-servico{
                padding-left: 19%!important;
                padding-right: 6%;
                padding-top: 10%;
                padding-bottom: 8%;
                text-align: center;
                font-size: 20px;
            }
            .bt-position{
                position: relative;
                top: 7px;
                right: 8%;
            }
            .carrinho-vazio-ipad{
                margin-top: 12%!important;
                margin-left: 3%;
            }
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            #modal-completa{
                max-width: 95%;
                margin-left: 1%!important;
                margin-right: 0!important; 
            }
            .label-forma{
                font-size: 15px!important;
            }
            .custom-card{
                padding: 0 0!important;
            }
            .servico{
                padding: 8px!important;
                max-height: 370px!important;
            }
            .main-mobile{
                padding-top: 0%!important;
                margin-bottom: 0%!important;
            }
            .titulo-servico{
                padding-left: 19%!important;
            }
            .bt-position{
                position: relative;
                top: 7px;
                right: 8%;
            }
            .carrinho-vazio-ipad{
                margin-top: 9%!important;
                margin-left: 3%;
            }
            .padding-ipad{
                padding-top: 6%;
            }
        }
        
    </style>

    <section class="contact-section main-section <?php if($mobile == 1){ ?> main-mobile" style="padding-top: 25%; margin-bottom: 20%!important;" <?php } ?>>
        <br>
        <div class="container padding-ipad">
            <div class="custom-card">
                <?php if($mobile_view == 0){ ?>
                    <?php if($carrinho == null){ echo "<p style='font-weight: 900; text-align: center!important; font-size: 35px; margin: 10% 0; padding: 50px 10px;'>Nenhum Produto Selecionado<br><i style='font-size: 55px;color: #f2c117;' class='fa fa-frown-o' aria-hidden='true'></i></p>"; 
                    }else{ ?>
                    <form id="fechaCarrinho" method="post" style="margin: 0" enctype="multipart/form-data">
                        <?php $sum=0; $aux=1; ?>
                        <input type="hidden" id="serviceId" name="serviceId" value="<?php echo $carrinho['idServico']; ?>">
                        
                        <div class="corpoPrincipal">
                            <div class="row">
                                <div class="col-xl-3">
                                    <img style="height: 90px;width: auto;position: relative;top: -3px;" src="<?php echo $carrinho['imagem']; ?>">    
                                </div>
                                <div class="col-xl-2">
                                    <p style="font-size: 13px;color: grey;position: absolute;top: -16px;left: -85px;">Produto</p>
                                    
                                    <p style="position: relative;top: 10px;left: -100px; font-weight: 700; font-size: 15px; width: 320px;"><?php echo mb_strtoupper($carrinho['servico']); ?> </p>   
                                    <p style="position: relative;left: -100px;width: 320px;"><?php echo ucfirst(mb_strtolower($carrinho['sub'])); ?> </p>
                                </div>
                                <div class="col-xl-3">
                                    <p style="position: absolute;left: 124px;top: -16px;font-size: 13px; color: grey">Quantidade</p>
                                    
                                    <div class="input-group mb-3" style="left: 12%; position: relative;top: 30%;width: 62%;margin-left: auto;margin-right: auto;margin-bottom: 33px!important;">
                                        <div style="border-right: 0!important; border: 1px solid lightgrey; cursor: pointer;" onclick="diminuir()" class="input-group-prepend">
                                            <span style="border: 0; background-color: white;" class="input-group-text">
                                                <i style="font-size: 18px; color: #444!important" class="fa fa-minus" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        
                                        <input style="cursor: auto; background: white;width: 30%!important; text-align: center; border-left: 0; border-right: 0; margin: 0; padding: 0;" id="qtd" min="1" max="99" name="qtd" value="<?php echo $carrinho['quantidade'] ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly onkeypress="return event.charCode >= 48">
                                        
                                        <div style="border-left: 0!important; border: 1px solid lightgrey; cursor: pointer;" onclick="aumentar()" class="input-group-prepend">
                                            <span style="border: 0; background-color: white;" class="input-group-text">
                                                <i style="font-size: 18px; color: #444!important" class="fa fa-plus" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div style="position: relative;top: 1px;left: 50%;">
                                        <p onclick="remove(<?php echo $carrinho['idServico']; ?>)" style="cursor: pointer; font-size: 13px; font-weight: 700">remover</p>
                                    </div>
                                </div>
                                <div class="col-xl-2 text-center">
                                    <p style="position: absolute;top: -16px;left: 58px;font-size: 13px; color: grey">Valor Unitário</p>
                                    <p style="position: relative;top: 33%;">R$<?php $helper = $carrinho['valor']; echo number_format($helper, 2,',','.'); ?></p>
                                </div>
                                <div class="col-xl-2">
                                    <p style="position: absolute;left: 53px;top: -16px;font-size: 13px; color: grey">Total</p>
                                    <p style="font-weight: 700;position: relative;top: 25px; font-size: 21px;">R$<?php $helper = $carrinho['valor']*$carrinho['quantidade']; echo number_format($helper, 2,',','.'); $sum += $helper;  ?></p>
                                </div>
                            </div>
                        </div>
                    </form> 
                    <?php } ?>
                    <?php if($carrinho != null){ ?>
                        <div class="row" style="margin-top: 4%;">
                        <div class="col-xl-4 pl-4">
                            <div style="position: relative; left: 10%;">
                                <?php if(!isset($desconto)){ ?>
                                    <label style="font-size: 17px; font-weight: bold;">Cupom de Desconto:</label>
                                    
                                    <form id="teste" method="post" action="<?php echo base_url('finalizaUnico/cupom') ?>">
                                        <div class="input-group mb-3" style="width: 60%">
                                            <input type="text" id="cupom" name="cupom" class="none-shadow form-control" placeholder="Digite seu cupom">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                <?php } ?>
                                    
                                    <span style="font-size: 17px; font-weight: bold;">Frete:</span>
                                <div class="row" style="margin-left: 1%; margin-top: 0.5%;">
                                    <input type="text" id="cep" name="cep" class="none-shadow form-control" placeholder="CEP (00000-000)" style="width: 47%; display: inline" required>
                                    <button type="button" id="cep-search" class="search-btn btn btn-primary" style="height: 39px;" onclick="search()"><em class="fa fa-search"></em></button>
                                </div>
                            </div>
                        </div>    
                        <div class="col-xl-3 pl-3">
                            <div class="row" id="tabela_frete" style="display: none;">
                                <div class="col-md-12">
                                    <table style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center">Valor</th>
                                                <th class="text-center">Prazo</th>
                                            </tr>
                                        </thead>
                                        <tbody id="frete_formas">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-xl-5 pl-5" style="margin-bottom: 25%;">
                            
                            <div id="resumoPedido" style="text-align: center; position: absolute; left: 35%;">
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
                            
                            <!--<div style="position: absolute; left: 45%">-->
                            <!--    <label style="font-size: 25px; color: #444; font-weight: 900;">Resumo do Pedido</label>-->
                            <!--    <?php if(isset($valorTotal)) { ?>-->
                            <!--        <div class="row">-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">Compra</p>-->
                            <!--            </div>-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($valor_exibir), 2, ',','.'); ?></p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    <?php } else { ?>   -->
                            <!--        <div class="row">-->
                            <!--            <div class="col-xl-6">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">Compra</p>-->
                            <!--            </div>-->
                            <!--            <div class="col-xl-6">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">R$ 0,00</p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    <?php } ?>-->
                                
                            <!--    <?php if(isset($desconto) && $desconto > 0){ ?>-->
                            <!--        <div class="row">-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">Desconto</p>-->
                            <!--            </div>-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($desconto),2,',','.') ?></p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    <?php } ?>  -->
                            <!--    <?php if($valor_exibir > $valorTotal){ ?>-->
                            <!--        <div class="row">-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">Desconto</p>-->
                            <!--            </div>-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($valor_exibir - $valorTotal),2,',','.') ?></p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    <?php } ?>   -->
                            <!--    <div class="row">-->
                            <!--        <div class="col-xl-6 text-left">-->
                            <!--            <p style="font-size: 16px; font-weight: 500">Total</p>-->
                            <!--        </div>-->
                            <!--        <?php if(isset($valorTotal)) { ?>-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500" id="totalgeral"><?php if($sum){ echo 'R$ '.number_format($sum - $desconto, 2,',','.');} else { echo 'R$ 0,00'; } ?></p>-->
                            <!--            </div>-->
                            <!--        <?php } else { ?>-->
                            <!--            <div class="col-xl-6 text-left">-->
                            <!--                <p style="font-size: 16px; font-weight: 500" id="totalgeral">R$ 0,00</p>-->
                            <!--            </div>-->
                            <!--        <?php } ?>-->
                            <!--    </div>-->
                                
                            <!--    <div class="row" style="margin-top: 5%">-->
                            <!--        <div class="col-xl-12">-->
                            <!--            <button id="buttonFinalizar" onclick="finaliza('cartão')" type="button" class="btn btn-primary btn-block">-->
                            <!--                Finalizar Pedido-->
                            <!--            </button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <?php } ?>
                <?php } else { ?>
                    <!-- VERSÃO SOMENTE DO CARRINHO PARA MOBILE INICIO -->
                    <?php if($carrinho == null){ echo "<h5 class='carrinho-vazio-ipad' style='width: 95%!important; font-size: 22px;margin-top: 20%; text-align: center!important;'>Carrinho vazio :(</h5>"; } ?>
                    <?php $sum=0; $aux=1;?>
                    <?php if($carrinho != null){ ?>
                        <form id="fechaCarrinho" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="serviceId" name="serviceId" value="<?php echo $carrinho['idServico']; ?>">
                            <input type="hidden" id="value" name="value" value="<?php echo $carrinho['valor']; ?>">
                
                            <div class="col-12 servico" id="produto_<?php echo $aux;?>" style="padding: 8px; max-height: 195px;">
                                <div class="row">
                                    <div class="col-4 form-group">
                                        <img class="img-mobile" style="height: auto; width: 135%; margin-left: 20%; margin-top: 10%;" src="<?php echo $carrinho['imagem'] ?>">
                                    </div>
                                    <div class="col-8 form-group titulo-servico" style="padding-left: 15%;">
                                        <p style="margin: 0; font-size: 11px; color: grey;">&nbsp;</p>
                                        <p style="line-height: 20px; color: black!important"><?php echo ucfirst(mb_strtolower($carrinho['servico'])); ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6 text-center">
                                        <p style="font-size: 24px; margin-top: -3%; color: black!important"><b style="color: black!important">R$ <?php echo number_format($carrinho['valor'] * $carrinho['quantidade'],2,',','.') ; ?></b></p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="input-group mb-2 text-center" style="width: 90%!important; margin-bottom: 33px!important;margin-top: -9px;">
                                            <div class="input-group-prepend" style="cursor: pointer" onclick="diminuir()">
                                                <span class="input-group-text" style="background: transparent">
                                                    <i class="marrom-padrao fa fa-minus" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input style="text-align: center; border-left: 0; border-right: 0;color: black!important" id="qtd" min="1" max="99" name="qtd" value="<?php echo $carrinho['quantidade'] ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                            <div class="input-group-prepend" style="cursor: pointer" onclick="aumentar()">
                                                <span class="input-group-text" style="border-left: 0; background: transparent">
                                                    <i class="marrom-padrao fa fa-plus" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <p onclick="remove(<?php echo $carrinho['idServico']; ?>)" class="bt-position" style="color: black!important; font-size: 13px; margin-left: 30%!important; margin: 0; padding: 0!important">remover</p>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" id="soma"><b>R$<?php $helper = $carrinho['valor']*$carrinho['quantidade']; echo number_format($helper, 2,',','.'); $sum += $helper;  ?></b></div>
                            </div>
                        <?php  $aux++; ?>
                        <div class="row" style="margin-top: 2%; width: 100%!important; margin-left: auto; margin-right: auto;">
                            <div class="col-md-6" style="width: 50%"></div>
                            <div class="col-md-6 text-center" style="width: 50%">
                                <input type="hidden" id="itens" name="itens" value="<?php echo $aux ?>">
                            </div>
                        </div>
                        </form>
                    <?php } ?>
                <?php } ?>
                <!-- VERSÃO SOMENTE DO CARRINHO PARA MOBILE FIM -->
            </div>
                
                
                <?php if($carrinho != null && $mobile_view == 1){ ?>
                    <div class="col-12" style="margin: 0; padding: 0;">
                        <div class="col-md-12" id="div-pagamento" style="padding: 0; margin: 0;">
                            <div style="background: white; height: 100%; width: 100%;">
                                <div class="custom-card" style="padding: 0">
                                    
                                    <div class="row" style="margin-top: 5%; margin-left: auto; margin-right: auto">
                                        <div class="col-md-12">
                                            <?php if(!isset($desconto)){ ?>
                                                <label class="label-forma"><b style="font-size: 18px; color: black!important;">Cupom de Desconto:</b></label>
                                                <form method="post" action="<?php echo base_url('finalizaUnico/cupom') ?>">
                                                    <div class="input-group mb-3" style="width: 90%!important;">
                                                        <input type="text" id="cupom" name="cupom" class="form-control" placeholder="Digite seu cupom">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
                                        
                                    <div class="row mt-3" style="margin: 0 0">
                                        <div class="col-12">
                                            <label style="font-size: 23px; color: #444; font-weight: 900;">Resumo do Pedido</label>
                                            <?php if(isset($valorTotal)) { ?>
                                                <div class="row">
                                                    <div class="col-6 text-left">
                                                        <p style="font-size: 16px; font-weight: 500">Compra</p>
                                                    </div>
                                                    <div class="col-6 text-left">
                                                        <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($valorTotal), 2, ',','.'); ?></p>
                                                    </div>
                                                </div>
                                            <?php } else { ?>   
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p style="font-size: 16px; font-weight: 500">Compra</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p style="font-size: 16px; font-weight: 500">R$ 0,00</p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            
                                            <?php if(isset($desconto)){ ?>
                                                <div class="row">
                                                    <div class="col-6 text-left">
                                                        <p style="font-size: 16px; font-weight: 500">Desconto</p>
                                                    </div>
                                                    <div class="col-6 text-left">
                                                        <p style="font-size: 16px; font-weight: 500">R$ <?php echo number_format(floatval($desconto),2,',','.') ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>   
                                            <div class="row">
                                                <div class="col-6 text-left">
                                                    <p style="font-size: 18px; font-weight: 600">Total</p>
                                                </div>
                                                <?php if(isset($valorTotal)) { ?>
                                                    <div class="col-6 text-left">
                                                        <p style="font-size: 18px; font-weight: 600" id="totalgeral"><?php if($valorTotal){ echo 'R$ '.number_format($valorTotal - $desconto, 2,',','.');} else { echo 'R$ 0,00'; } ?></p>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-6 text-left">
                                                        <p style="font-size: 18px; font-weight: 600" id="totalgeral">R$ 0,00</p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
      
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 text-center form-group" style="margin-top: 10%; margin-bottom: 7%;">
                        <?php if($carrinho != null) { ?>
                        <button id="buttonFinalizar" onclick="finaliza('cartão')" type="button" class="btn btn-primary btn-block">
                            Finalizar Pedido
                        </button>
                        <?php } ?>
    
                        <p onclick="inicio()" style="margin-top: 3%; text-decoration: underline; color: black!important; font-size: 13px;">Adicionar <?php if($carrinho != null){ echo 'mais'; } ?> produtos</p>
                    </div>
                <?php } ?>
                <br>
        </div>
    </section>

    
    
    
    

    <div class="modal fade" id="enderecoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="modal-completa">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">COMPLETE SEUS DADOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url('2ed7ae53dde60f945ba3dc6a00d2365b') ?>" method="post">
                <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $this->session->userdata('cliente_user_id') ?>">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">Telefone:</b></label>
                        <input style="font-size: 12px;" type="text" class="telefone form-control" name="telefone-modal" id="telefone-modal"> 
                    </div>
                    <div class="col-md-6 form-group">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">E-mail:</b></label>
                        <input style="font-size: 12px;" type="email" class="form-control" name="email-modal" id="email-modal"> 
                    </div>
                    <div class="col-md-3 form-group">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">Nascimento:</b></label>
                        <input style="font-size: 12px;" type="text" class="date form-control" placeholder="__/__/____" name="nascimento-modal" id="nascimento-modal"> 
                    </div>
                    <div class="col-md-3 form-group div-enderecos" id="cep-div">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">Cep:</b></label>
                        <div class="input-group mb-3">
                            <input style="font-size: 12px;" maxlength="8" type="text" id="cep-modal" name="cep-modal" class="cep form-control" placeholder="_____-___">
                            <button onclick="autofillCEP()" type="button" style="cursor: pointer; background-color: transparent; color: var(--base-color)!important; border:1px solid var(--base-color)!important;" class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group div-enderecos" id="rua-div">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">Rua:</b></label>
                        <input style="font-size: 12px;" type="text" class="form-control" name="rua-modal" id="rua-modal" required>
                    </div>
                    <div class="col-md-2 form-group div-enderecos" id="n-div">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">N°:</b></label>
                        <input style="font-size: 12px;" type="text" class="form-control" name="numero-modal" id="numero-modal" required>
                    </div>
                    <div class="col-md-4 form-group div-enderecos" id="complemento-div">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">Complemento:</b></label>
                        <input style="font-size: 12px;" type="text" class="form-control" name="complemento-modal" id="complemento-modal">
                    </div>
                </div>
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-5 form-group div-enderecos" id="bairro-div">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">Bairro:</b></label>
                        <input style="font-size: 12px;" type="text" class="form-control" name="bairro-modal" id="bairro-modal" required>
                    </div>
                    <div class="col-md-4 form-group div-enderecos" id="cidade-div">
                        <label style="font-size: 13px; color: grey;"><b style=" color:grey!important;">Cidade:</b></label>
                        <input style="font-size: 12px;" type="text" class="form-control" name="cidade-modal" id="cidade-modal" required>
                    </div>
                    <div class="col-md-3 form-group div-enderecos" id="estado-div">
                        <label style="font-size: 13px;"><b style=" color:grey!important;">Estado:</b></label>
                        <select style="font-size: 12px;" class="form-control" id="estado-modal" name="estado-modal" required>
                            <option value="" selected disabled> Selecione </option>
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
      </div>
      <div class="modal-footer">
        <button type="submit" style="padding: 20px;border-radius: 5px;color: white;background-color: var(--base-color)!important; border-color:var(--base-color)!important; color: white" class="btn btn-primary">Salvar</button>
        <button type="button" style="padding: 20px;border-radius: 5px;color: white;" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </div>
    

    
    
<!-- Modal -->
    <div class="modal fade" id="esqueciSenhaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--base-color);">
            <h5 class="modal-title" style="color: white;" id="exampleModalLabel">Redefinir a senha</h5>
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
                <button type="submit" class="btn btn-primary" style="padding: 7px!important">REDEFINIR</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 2%; border-radius: 5px;color: white;background: #989898;">Fechar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    
    
    
<!-- Modal -->
<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content" <?php if($mobile_view ==0){ ?> style="width: 75%; margin: -1.5% 14%;"<? }else{ ?>style="width: 90%;
    margin: -1.5% 5%;" <?php } ?>>
      <div class="modal-header" style="background-color: var(--base-color);">
        <h5 class="modal-title" id="exampleModalLabel"><b style="color: white;">CADASTRO</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white;">&times;</span>
        </button>
      </div>
            <div class="modal-body">
                <form id="cadastro" action="<?php echo base_url('20f78cc3d3cba8f46f596c481357096d') ?>" method="post">
                    
                    <div class="row" id="parte1">
                        <div class="col-md-12 text-center">
                            <h5 style="color: black;">Dados Pessoais</h5>
                        </div>
                        <div class="col-md-8 form-group">
                            <label><b style="color: black">CPF:</b></label>
                            <input type="text" class="cpf form-control" name="cpf_cadastro" id="cpf_cadastro" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label><b style="color: black">Nascimento:</b></label>
                            <input type="text" class="date form-control" placeholder="__/__/____" name="nascimento_cadastro" id="nascimento_cadastro" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label><b style="color: black">Nome Completo:</b></label>
                            <input type="text" class="form-control" name="nome_cadastro" id="nome_cadastro" required>
                        </div>
                        
                        <div class="col-md-12 form-group text-right">
                            <button onclick="parte1()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-right" aria-hidden="true"></i> Próximo</button>
                        </div>
                    </div>
                
                    <div class="row" id="parte2" style="display: none;">
                    <div class="col-md-12 text-center">
                        <h5 style="color: black;">Contato</h5>
                    </div>
                    <div class="col-md-12 form-group">
                        <label><b style="color: black">Telefone:</b></label>
                        <input type="text" class="telefone form-control" name="telefone_cadastro" id="telefone_cadastro">
                    </div>
                    <div class="col-md-12 form-group">
                        <label><b style="color: black">E-mail:</b></label>
                        <input type="email" class="form-control" name="email_cadastro" id="email_cadastro">
                    </div>
                    <div class="col-md-12 form-group text-right">
                        <button onclick="parte5()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior</button>
                        <button onclick="parte2()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%; margin-left: 2%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-right" aria-hidden="true"></i> Próximo</button>
                    </div>
                </div>
                
                <?php if($mobile_view == 0){ ?>
                    <div class="row" id="parte3" style="display: none;">
                        <div class="col-md-12 text-center">
                            <h5 style="color: black;">Endereço</h5>
                        </div>
                        <div class="col-md-12 form-group">
                            <label><b style="color: black;">Cep:</b></label>
                            <div class="input-group mb-3">
                              <input style="border-right: none;" class="cep form-control" type="text" name="cep_cadastro" id="cep_cadastro">
                              <div class="input-group-prepend">
                                <span style="background: white;" class="input-group-text">
                                    <i style="font-size: 21px;"  onclick="autofillCEP2()" class="fa fa-search" aria-hidden="true"></i>
                                </span>
                              </div>
                            </div>
                        </div>
                        
                        <div id="loading-cep">
                            <div id="form_com_cadastro" class="row" style="padding-left: 13px; padding-right: 13px;">
                                <div class="col-md-5 form-group">
                                    <label><b style="color: black;">Bairro:</b></label>
                                    <input class="form-control" type="text" name="bairro_cadastro" id="bairro_cadastro" required>
                                </div>
                                <div class="col-md-7 form-group" style="width: 50%">
                                    <label><b style="color: black;">Cidade:</b></label>
                                    <input class="form-control" type="text" name="cidade_cadastro" id="cidade_cadastro" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label><b style="color: black;">Rua:</b></label>
                                    <input class="form-control" type="text" name="rua_cadastro" id="rua_cadastro" required>
                                </div>
                                <div class="col-md-4 form-group" style="width: 40%">
                                    <label><b style="color: black;">Número:</b></label>
                                    <input class="form-control" type="number" name="numero_cadastro" id="numero_cadastro" required>
                                </div>
                                <div class="col-md-4 form-group" style="width: 60%">
                                    <label><b style="color: black;">Complemento:</b></label>
                                    <input class="form-control" type="text" name="complemento_cadastro" id="complemento_cadastro">
                                </div>
                                <div class="col-md-4 form-group" style="width: 50%">
                                    <label><b style="color: black;">Estado:</b></label>
                                    <select style="font-size: 16px;" class="form-control" id="estado_cadastro" name="estado_cadastro" required>
                                        <option value="" selected disabled> Selecione </option>
                                    	<option value="AC">AC</option>
                                    	<option value="AL">AL</option>
                                    	<option value="AP">AP</option>
                                    	<option value="AM">AM</option>
                                    	<option value="BA">BA</option>
                                    	<option value="CE">CE</option>
                                    	<option value="DF">DF</option>
                                    	<option value="ES">ES</option>
                                    	<option value="GO">GO</option>
                                    	<option value="MA">MA</option>
                                    	<option value="MT">MT</option>
                                    	<option value="MS">MS</option>
                                    	<option value="MG">MG</option>
                                    	<option value="PA">PA</option>
                                    	<option value="PB">PB</option>
                                    	<option value="PR">PR</option>
                                    	<option value="PE">PE</option>
                                    	<option value="PI">PI</option>
                                    	<option value="RJ">RJ</option>
                                    	<option value="RN">RN</option>
                                    	<option value="RS">RS</option>
                                    	<option value="RO">RO</option>
                                    	<option value="RR">RR</option>
                                    	<option value="SC">SC</option>
                                    	<option value="SP">SP</option>
                                    	<option value="SE">SE</option>
                                    	<option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 form-group text-right">
                            <button onclick="parte1()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior</button>
                            <button onclick="parte3()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%; margin-left: 2%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-right" aria-hidden="true"></i> Próximo</button>
                        </div>
                    </div>
                <?php }else{ ?>
                    <!-- MOBILE ENDEREÇO -->
                    <div class="row" id="parte3" style="display: none;">
                        <div class="col-12 text-center">
                            <h5 style="color: black;">Endereço</h5>
                        </div>
                        <div class="col-12 form-group">
                            <label><b style="color: black;">Cep:</b></label>
                            <div class="input-group mb-3">
                              <input style="border-right: none;" class="cep form-control" type="text" name="cep_cadastro" id="cep_cadastro">
                              <div class="input-group-prepend">
                                <span style="background: white;" class="input-group-text">
                                    <i style="font-size: 21px;"  onclick="autofillCEP2()" class="fa fa-search" aria-hidden="true"></i>
                                </span>
                              </div>
                            </div>
                        </div>
                        
                        <div id="loading-cep">
                            <div id="form_com_cadastro" class="row" style="padding-left: 13px; padding-right: 13px;">
                                <div class="col-4 form-group" style="width: 50%">
                                    <label><b style="color: black;">Estado:</b></label>
                                    <select style="font-size: 16px;" class="form-control" id="estado_cadastro" name="estado_cadastro" required>
                                        <option value="" selected disabled> Selecione </option>
                                    	<option value="AC">AC</option>
                                    	<option value="AL">AL</option>
                                    	<option value="AP">AP</option>
                                    	<option value="AM">AM</option>
                                    	<option value="BA">BA</option>
                                    	<option value="CE">CE</option>
                                    	<option value="DF">DF</option>
                                    	<option value="ES">ES</option>
                                    	<option value="GO">GO</option>
                                    	<option value="MA">MA</option>
                                    	<option value="MT">MT</option>
                                    	<option value="MS">MS</option>
                                    	<option value="MG">MG</option>
                                    	<option value="PA">PA</option>
                                    	<option value="PB">PB</option>
                                    	<option value="PR">PR</option>
                                    	<option value="PE">PE</option>
                                    	<option value="PI">PI</option>
                                    	<option value="RJ">RJ</option>
                                    	<option value="RN">RN</option>
                                    	<option value="RS">RS</option>
                                    	<option value="RO">RO</option>
                                    	<option value="RR">RR</option>
                                    	<option value="SC">SC</option>
                                    	<option value="SP">SP</option>
                                    	<option value="SE">SE</option>
                                    	<option value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="col-8 form-group">
                                    <label><b style="color: black;">Bairro:</b></label>
                                    <input class="form-control" type="text" name="bairro_cadastro" id="bairro_cadastro" required>
                                </div>
                                <div class="col-12 form-group" style="width: 50%">
                                    <label><b style="color: black;">Cidade:</b></label>
                                    <input class="form-control" type="text" name="cidade_cadastro" id="cidade_cadastro" required>
                                </div>
                                <div class="col-12 form-group">
                                    <label><b style="color: black;">Rua:</b></label>
                                    <input class="form-control" type="text" name="rua_cadastro" id="rua_cadastro" required>
                                </div>
                                <div class="col-6 form-group" style="width: 40%">
                                    <label><b style="color: black;">Número:</b></label>
                                    <input class="form-control" type="number" name="numero_cadastro" id="numero_cadastro" required>
                                </div>
                                <div class="col-6 form-group" style="width: 60%">
                                    <label><b style="color: black;">Complemento:</b></label>
                                    <input class="form-control" type="text" name="complemento_cadastro" id="complemento_cadastro">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 form-group text-right">
                            <button onclick="parte1()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior</button>
                            <button onclick="parte3()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%; margin-left: 2%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-right" aria-hidden="true"></i> Próximo</button>
                        </div>
                    </div>
                <?php } ?>

                <?php if($mobile_view == 0){ ?>
                    <div class="row" id="parte4" style="display: none;">
                        <div class="col-md-12 form-group">
                            <label><b style="color: black;">Senha:</b></label><br>
                            <input class="form-control passwd" type="password" name="senha_cadastro" id="senha_cadastro" required>
                            <button type="button" class="see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                        </div>
                        <div class="col-md-12 form-group">
                            <label><b style="color: black;">Confirmar Senha:</b></label><br>
                            <input class="form-control passwd" type="password" name="confirma_cadastro" id="confirma_cadastro" required>
                            <button type="button" class="see-pass" id="senha_btn2"><em class="fa fa-eye"></em></button>
                        </div>
                        <div class="col-md-12 form-group text-right">
                            <button onclick="parte2()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior</button>
                            <button onclick="parte6()" type="submit" style="color: white!important; background-color: var(--base-color); padding: 1%; margin-left: 2%;" class="btn btn-primary"><i style="font-size: 25px;" class="fas fa-check-circle" aria-hidden="true"></i> Finalizar</button>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="row" id="parte4" style="display: none;">
                        <div class="col-12 form-group">
                            <label><b style="color: black;">Senha:</b></label><br>
                            <input class="form-control passwd" style="width: 83%;" type="password" name="senha_cadastro" id="senha_cadastro" required>
                            <button type="button" class="see-pass" id="senha_btn" style="position: relative; left: -2%; width: 15%;"><em class="fa fa-eye"></em></button>
                        </div>
                        <div class="col-12 form-group">
                            <label><b style="color: black;">Confirmar Senha:</b></label><br>
                            <input class="form-control passwd" style="width: 83%;" type="password" name="confirma_cadastro" id="confirma_cadastro" required>
                            <button type="button" class="see-pass" id="senha_btn2" style="position: relative; left: -2%; width: 15%;"><em class="fa fa-eye"></em></button>
                        </div>
                        <div class="col-12 form-group text-right">
                            <button onclick="parte2()" type="button" class="button-proximo btn btn-primary" style="color: white!important; background-color: var(--base-color); padding: 1%;"><i style="font-size: 25px;" class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior</button>
                            <button onclick="parte6()" type="submit" style="color: white!important; background-color: var(--base-color); padding: 1%; margin-left: 2%;" class="btn btn-primary"><i style="font-size: 25px;" class="fas fa-check-circle" aria-hidden="true"></i> Finalizar</button>
                        </div>
                    </div>
                <?php } ?>
                
                </form>
            </div>
    </div>
  </div>
</div>

<!-- Modal -->



<script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('recursos/js/material/plugins/sweetalert2.js'); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>


<!-- SCRIPTS DO CARRINHO INICIO -->
<!-- SCRIPTS DO CARRINHO INICIO -->
<!-- SCRIPTS DO CARRINHO INICIO -->
<!-- SCRIPTS DO CARRINHO INICIO -->

<script>
    $(document).ready(function(){
            $('#cep').mask('00000-000');
            document.getElementById("cep").value = '<?php echo $this->session->userdata('cep');?>';
            search();
        });
    
        function search(){
            var cep = $('#cep').val().replace(/\D/g,'');
            if(cep.length == 8){
                dados = new FormData();
                dados.append('cep', cep);
                dados.append('carrinho', '<?php echo $carrinho ?>');
                $.ajax({
                    url: '<?php echo base_url('3ac186ea673c6560fd6756a7c3796794'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    },
                    success: function(frete) {
                        $('#frete_formas').html('');
                        for(var i = 0; i < frete.length; i++){
                            var td = '<tr>'+
                                        '<td><input type="radio" onclick="calculaTotal()" class="radio-frete" id="r_'+frete[i].servico+'" name="frete" value="'+frete[i].servico+'" required style="display: inline">&nbsp;'+frete[i].servico+'</td>'+
                                        '<td class="text-center valor">R$ '+frete[i].valor+'</td>'+
                                        '<td class="text-center">'+frete[i].prazo+' dias</td>'+
                                    '</tr>';
                            $('#frete_formas').append(td);
                        }
                        $('#tabela_frete').css('display', 'block');
                    },
                });
            }
        }
</script>

<script>
    // function onSubmit(token){
    //         finaliza('cartao');
    // }
</script>

<script>
    function atualizacarrinho(){
        $('#fechaCarrinho').attr('action', '<?php echo base_url('afa44bc5ac8580b2cdd34d9e50e80db0') ?>');
        $('#fechaCarrinho').submit();
    }
</script>

<script>
    function remove(id){
        var input = '<input type="hidden" id="id_remove" name="id_remove" value="' + id + '">';
        $('#fechaCarrinho').append(input);
        $('#fechaCarrinho').attr('action', '<?php echo base_url('4de7d7673b8085024253a2236b14442b') ?>');
        $('#fechaCarrinho').submit();
    }
</script>

<script>
    // function finaliza(pagamento){
    //     <?php if($this->session->userdata('cliente_logado') == 1){ ?>
    //         $('#fechaCarrinho').append('<input type="hidden" id="pagamento" name="pagamento" value="' + pagamento + '">');
            
    //         $('#fechaCarrinho').attr('action', 'pagamentofinish(dados)');
    //         $('#fechaCarrinho').submit();  
    //     <?php } else { ?>
    //         alertlogin();
    //     <?php } ?>
    // }
</script>

<script>
    function aumentar(){
        if(parseInt($('#qtd').val()) < 10){
            $('#qtd').val(parseInt($('#qtd').val()) + 1);
            atualizacarrinho();
        }
    }
    
    function diminuir(){
        if(parseInt($('#qtd').val()) > 1){
            $('#qtd').val(parseInt($('#qtd').val()) - 1);   
            atualizacarrinho();
        }
    }
</script>

<!-- SCRIPTS DO CARRINHO FIM -->
<!-- SCRIPTS DO CARRINHO FIM -->
<!-- SCRIPTS DO CARRINHO FIM -->
<!-- SCRIPTS DO CARRINHO FIM -->

<script>
    function parte1(){
        var validacao = validacpf();
        
        var nome       = $('#nome_cadastro').val();
        var nascimento = $('#nascimento_cadastro').val();
        
        if (validacao == true){
            if (nome != "" && nome != " "){
                if (nascimento != ""){
                $('#parte1').hide(); //contato
                $('#parte2').show();
                $('#parte3').hide();
                $('#parte4').hide();
                }else{
                   document.getElementById('nascimento_cadastro').setCustomValidity('Escolha uma data de nascimento!');
                   document.getElementById('nascimento_cadastro').reportValidity(); 
                }
            }else{
                document.getElementById('nome_cadastro').setCustomValidity('Nome Inválido!');
                document.getElementById('nome_cadastro').reportValidity();
            }
        }
    }
</script>

<script>
    function parte2(){
        var telefone = $('#telefone_cadastro').val().length;
        var email    = $('#email_cadastro').val();
        
        if (telefone == 15 || telefone == 14){
            if (email != "" && email != " "){
                $('#parte1').hide(); //endereço
                $('#parte2').hide();
                $('#parte3').show();
                $('#parte4').hide();
            }else {
                document.getElementById('email_cadastro').setCustomValidity('Email Inválido!');
                document.getElementById('email_cadastro').reportValidity();  
            }
        }else{
            document.getElementById('telefone_cadastro').setCustomValidity('Número Inválido!');
            document.getElementById('telefone_cadastro').reportValidity();
        }
    }
</script>

<script>
    function parte3(){
        cep         = $('#cep_cadastro').val();
        rua         = $('#rua_cadastro').val();
        numero      = $('#numero_cadastro').val();
        bairro      = $('#bairro_cadastro').val();
        cidade      = $('#cidade_cadastro').val();
        estado      = $('#estado_cadastro').val();
        
        if (cep != "" || cep != " "){
            if (rua != "" || rua != " "){
                if (numero != "" || numero != " "){
                    if (bairro != "" || bairro != " "){
                        if (cidade != "" || cidade != " "){
                            if (estado != "" || estado != " "){
                                $('#parte1').hide(); //cadastro
                                $('#parte2').hide();
                                $('#parte3').hide();
                                $('#parte4').show();
                            }else{
                                document.getElementById('estado_cadastro').setCustomValidity('Estado Inválido!');
                                document.getElementById('estado_cadastro').reportValidity();
                            }
                        }else{
                            document.getElementById('cidade_cadastro').setCustomValidity('Cidade Inválida!');
                            document.getElementById('cidade_cadastro').reportValidity();
                        }
                    }else{
                        document.getElementById('bairro_cadastro').setCustomValidity('Bairro Inválido!');
                        document.getElementById('bairro_cadastro').reportValidity();
                    }
                }else{
                    document.getElementById('numero_cadastro').setCustomValidity('Número Inválido!');
                    document.getElementById('numero_cadastro').reportValidity();
                }
            }else {
                document.getElementById('rua_cadastro').setCustomValidity('Rua Inválida!');
                document.getElementById('rua_cadastro').reportValidity();
            }
        }else{
            document.getElementById('cep_cadastro').setCustomValidity('CEP Inválido!');
            document.getElementById('cep_cadastro').reportValidity();
        }    
    }
</script>

<script>
    function parte5(){
        $('#parte1').show();
        $('#parte2').hide();
        $('#parte3').hide();
        $('#parte4').hide();
    }
</script>

<script>
	    function parte6(){  
	        var senha  = $('#senha_cadastro').val().length;
	        var senha2 = $('#confirma_cadastro').val().length;
            
                if(senha >= 6){
                     if (senha2 >= 6) {
                         if($('#senha_cadastro').val() == $('#confirma_cadastro').val()){
                             $('#cadastro').submit(); 
                         }else{
                            alertsenhadif();
                         }
                     }else{
                        document.getElementById('confirma_cadastro').setCustomValidity('Senha Inválida!');
                        document.getElementById('confirma_cadastro').reportValidity();
                    }    
	            }else{
	                document.getElementById('senha_cadastro').setCustomValidity('Senha Inválida!');
                    document.getElementById('senha_cadastro').reportValidity(); 
	            }
	    }        
</script>

<script>
    function autofillCEP2(){
        var aux = $('#cep_cadastro').val();
        var cep = aux.replace(/\D/g,'');
        if(cep.length == 8){
            dados = new FormData();
            dados.append('cep', cep);
            $.ajax({
                url: '<?php echo base_url('00af9148767db1213585b339276df4e6'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                beforeSend: function(){
                   $('#form_com_cadastro').hide();
                   
                   var img = "<img style='width: 200px;height: 200px;position: relative;top: -6%;left: <?php if($mobile){ echo '35'; } else { echo '69'; } ?>%;' id='loading-img' src='<?php echo base_url('imagens/loadingbom.gif') ?>'>";
                   
                   $('#loading-cep').append(img);
                }, 
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    if(data != "null" && data != "" && data != " " && data != null){
                        cep = jQuery.parseJSON(data);
                        var ce = cep.cep_cidadeuf.split('/');
                        $('#cep_cadastro').unmask().val(cep.cep).mask('00000-000', {reverse: true}, {'translation': {0: {pattern: /[0-9*]/}}});
                        $('#cidade_cadastro').val(ce[0]);
                        $('#estado_cadastro').val(ce[1]).change();
                        $('#bairro_cadastro').val(cep.cep_bairro);
                        if(cep.cep_rua.indexOf(',') > 0){
                            var rua = cep.cep_rua.split(',');
                            $('#rua_cadastro').val(rua[0]);
                        }else if(cep.cep_rua.indexOf(' - ') > 0){
                            var rua = cep.cep_rua.split(' - ');
                            $('#rua_cadastro').val(rua[0]);
                        }else{
                            $('#rua_cadastro').val(cep.cep_rua);
                        }
                        
                        $('#loading-img').remove();
                        
                        $('#form_com_cadastro').show();
                    }
                },
            });
        }
    }
</script>

<script>
    function autofillCEP(){
        var aux = $('#cep-modal').val();
        var cep = aux.replace(/\D/g,'');
        if(cep.length == 8){
            dados = new FormData();
            dados.append('cep', cep);
            $.ajax({
                url: '<?php echo base_url('00af9148767db1213585b339276df4e6'); ?>',
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
                        $('#cep-modal').unmask().val(cep.cep).mask('00000-000', {reverse: true}, {'translation': {0: {pattern: /[0-9*]/}}});
                        $('#cidade-modal').val(ce[0]);
                        $('#estado-modal').val(ce[1]).change();
                        $('#bairro-modal').val(cep.cep_bairro);
                        if(cep.cep_rua.indexOf(',') > 0){
                            var rua = cep.cep_rua.split(',');
                            $('#rua-modal').val(rua[0]);
                        }else if(cep.cep_rua.indexOf(' - ') > 0){
                            var rua = cep.cep_rua.split(' - ');
                            $('#rua-modal').val(rua[0]);
                        }else{
                            $('#rua-modal').val(cep.cep_rua);
                        }
                        ativo();
                    }
                },
            });
        }
    }
</script>
    
<script>
        $(document).ready(function(){
            $('.date').mask('00/00/0000');
            $('.cep').mask('00000-000');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            var SPMaskBehavior = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
              onKeyPress: function(val, e, field, options) {
                  field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            
            $('.telefone').mask(SPMaskBehavior, spOptions);
            
            
            <?php if(isset($login_erro)){ if($login_erro == 1){
                echo "alerterrado();";
            } } ?>
            <?php if(isset($login_erro)){ if($login_erro == 2){
                echo "alertcpf();";
            } } ?>
            <?php if(isset($login_erro)){ if($login_erro == 3){
                echo "alertname();";
            } } ?>
            <?php if(isset($login_erro)){ if($login_erro == 4){
                echo "alertsenha();";
            } } ?>
            <?php if(isset($login_erro)){ if($login_erro == 5){
                echo "alertsucesso();";
            } } ?>
            
            <?php if($this->session->userdata('logado_pelo_carrinho')){ ?>
                Swal.fire({type: 'success',text: 'Logado com sucesso, será redirecionado para finalização do pedido',});
                
                setTimeout(function() { $('#buttonFinalizar').click() }, 3000);
                <?php $this->session->unset_userdata('logado_pelo_carrinho') ?>
            <?php } ?>
        })
</script>
    
<script>
    function abrirmodalendereco(){
        $("#enderecoModal").modal();
    }
</script>

<script>
    function abrirmodalcadastro(cpf){
        $('#logarModal').modal('hide');
        $('#cpf_cadastro').val(cpf);
        $("#cadastroModal").modal({backdrop: 'static', keyboard: false});
    }
</script>


<!-- SCRIPTS LOGIN INICIO -->
<!-- SCRIPTS LOGIN INICIO -->
<!-- SCRIPTS LOGIN INICIO -->
<!-- SCRIPTS LOGIN INICIO -->

<script>
       function onSubmit3(token) {
            document.getElementById("form-login").submit();
       }
</script>
    
<script>
   function onSubmit4(token) {
        abrirmodalcadastro($('#login_usuario').val());
   }
</script>

<script>
    $('#senha_btn').on('click', function(){
        const type = $('#senha_cadastro').prop('type') === 'password' ? 'text' : 'password';
        $('#senha_cadastro').prop('type', type);
        if(type == "text"){
            $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
        }else{
            $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
    
    $('#senha_btn2').on('click', function(){
        const type = $('#confirma_cadastro').prop('type') === 'password' ? 'text' : 'password';
        $('#confirma_cadastro').prop('type', type);
        if(type == "text"){
            $('#senha_btn2').children().removeClass("fa-eye").addClass("fa-eye-slash");
        }else{
            $('#senha_btn2').children().removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
</script>
    
<!-- SCRIPTS LOGIN FIM -->
<!-- SCRIPTS LOGIN FIM -->
<!-- SCRIPTS LOGIN FIM -->
<!-- SCRIPTS LOGIN FIM -->

    



<script>
    function validacpf(){
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
                return false;
                document.getElementById(id).setCustomValidity('CPF Inválido!');
                document.getElementById(id).reportValidity();
            }else if(strCPF == ""){
                document.getElementById(id).setCustomValidity('');
            }else{
                for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
                Resto = (Soma * 10) % 11;
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(9, 10)) ){
                    return false;
                    document.getElementById(id).setCustomValidity('CPF Inválido!');
                    document.getElementById(id).reportValidity();
                }else{
                    Soma = 0;
                    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
                    Resto = (Soma * 10) % 11;
                    if ((Resto == 10) || (Resto == 11))  Resto = 0;
                    if (Resto != parseInt(strCPF.substring(10, 11) ) ){ 
                        return false;
                        document.getElementById(id).setCustomValidity('CPF Inválido!');
                        document.getElementById(id).reportValidity();
                    }else{
                        return true;
                    }
                }
            }
            
    }
</script>

<script>
    function esqueciSenha(){
        $('#logarModal').modal('hide');
    }
</script>

<!-- SCRIPTS DO CARRINHO NOVO INICIO -->

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
        
        <?php if($this->session->userdata('cliente_logado') == 1){ ?>  
        
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
        <?php } else { ?>
            alertlogin();
        <?php } ?>
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