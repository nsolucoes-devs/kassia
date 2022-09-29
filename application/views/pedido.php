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
        .grecaptcha-badge{
            display: none!important;
        }
        .bola{
            float: right;
            height: 35px;
            width: 35px;
            background: #2dec33;
            border-radius: 100%;
            position: relative;
            top: 28%;
            right: 2%;
            z-index: 5;
        }
        .reta{
            float: right;
            width: 3px;
            height: calc(50% - -78px);
            background: #c7c7c7;
            position: relative;
            top: calc(40% - -4px);
            left: 16px;
            z-index: 1;
        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            font-weight: 700;
        }
         .nav-item a{
            font-size: 22px;
        }
        .nav-tabs{
            margin-bottom
        }
        #areaMensagem::-webkit-scrollbar {
            width: 3px;
            height: 10px;
        }
        #areaMensagem::-webkit-scrollbar-track {
            background: white;
        }
        #areaMensagem::-webkit-scrollbar-thumb {
            background: grey;
        }
        #areaFotter{
            height: 25%;
            width: 100%
        }
        #areaMensagem{
            padding: 10px;
            overflow: auto;
            height: 75%;
            width: 100%;
        }
        .mensagens{
            border-radius: 10px;
            padding: 10px;
            width: 80%;
            box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;background: #e6e6e6;
        }
        #div-historico{
            margin-top: 5%;
        }
        #areaTotalChat{
            box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;
            height: 500px;
            width: 450px;
            border-radius: 30px;
            border: 1px solid #cacaca;
            padding: 10px;
        }
        #div-botoes-chat{
            position: relative;
            top: 9px;
            left: 2%;
        }
        #loading-chat{
            margin-top: 35%;
        }
        .divLinha{
            align-self: flex-end;
        }
        .divResumo{
            margin-top: 3%
        }
        @media(max-width: 499px){
            #areaTotalChat{
               width: 100%;
               height: 500px;
            }
           .contact-section{
                padding: 0!important;
                padding-top: 45%!important;
           }
            #div-historico{
                margin-top: 10%;
                margin-left: 0;
            }
            #chat{
                margin-bottom: 30%;
            }
            #div-botoes-chat{
                left: 5%;
                top: 13px;
            }
            #loading-chat{
                margin-top: 50%;
            }
            .divLinha{
                padding: 6%!important;
            }
            .divResumo{
                padding: 0 9%;
                margin-bottom: 15%;
            }
            .reta{
                height: calc(50% - -119px);
                top: calc(40% - 49px);
                left: -16px;
            }
            .nome-prod{
                display: -webkit-box; 
                overflow: hidden; 
                -webkit-line-clamp: 3; 
                -webkit-box-orient: vertical;
                
            }
        }
        
        @media(min-width: 500px) and (max-width: 766px){
            #areaTotalChat{
               width: 100%;
               height: 500px;
            }
           .contact-section{
                padding: 30% 20px 15% 20px!important;
           }
            #div-historico{
                margin-top: 10%;
                margin-left: 0;
            }
            #chat{
                margin-bottom: 30%;
            }
            #div-botoes-chat{
                left: 5%;
                top: 13px;
            }
            #loading-chat{
                margin-top: 50%;
            }
            .divLinha{
                padding: 6%!important;
            }
            .divResumo{
                padding: 0 9%;
                margin-bottom: 15%;
            }
            .reta{
                height: calc(50% - -119px);
                top: calc(40% - 49px);
                left: -16px;
            }
            .nome-prod{
                display: -webkit-box; 
                overflow: hidden; 
                -webkit-line-clamp: 3; 
                -webkit-box-orient: vertical;
                
            }
        }
        
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .contact-section{padding-top: 20%!important;}
            .nome-prod{
                display: -webkit-box; 
                overflow: hidden; 
                -webkit-line-clamp: 3; 
                -webkit-box-orient: vertical;
                
            }
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .contact-section{padding-top: 16%!important;}
            .nome-prod{
                display: -webkit-box; 
                overflow: hidden; 
                -webkit-line-clamp: 3; 
                -webkit-box-orient: vertical;
                
            }
        }
        
        
        .pedido-titulo{
            text-align: center; 
            color: #828282;
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            word-break: break-word;
            font-size: 14px;
            margin-bottom: 10px;
            margin-top: 2%;
            line-height: 19px;
        }
        
        
        #btn-boleto .btn .btn-primary:active {
            color: black;
        }
        
    </style>
    
    <section class="contact-section" style="padding: 8% 20px 15% 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 form-group">
                    <a href="<?php echo base_url('92e97566397e7d998f610c34726e7a20#pedidos') ?>">
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-reply" aria-hidden="true"></i> VOLTAR
                        </button>
                    </a>
                </div>
            </div>
                
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a style="font-size: 20px!important; color: black;" class="nav-link active" id="pedido-tab" data-toggle="tab" href="#pedido" role="tab" aria-controls="pedido" aria-selected="true">Pedido</a>
                </li>
                <li class="nav-item">
                    <a style="font-size: 20px!important; color: black;" class="nav-link" id="historico-tab" data-toggle="tab" href="#historico" role="tab" aria-controls="historico" aria-selected="false">Histórico</a>
                </li>
                <li class="nav-item">
                    <a style="font-size: 20px!important; color: black;" onclick="getMensagem()" class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="false">Chat</a>
                </li>
            </ul>
            
            <div class="tab-content" id="myTabContent" style="margin-bottom: 10%; border: 1px solid #ddd;padding: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;">
                <div class="tab-pane fade show active" id="pedido" role="tabpanel" aria-labelledby="pedido-tab">
                    <div class="row" style="padding: 1%">
                        <div class="col-md-8 text-left form-group" style="margin-top: 3%">
                            <p style="color: #444;font-weight: 900;font-size: 30px;">Pedido #<?php echo $pedido['idpedido'] ?></p>
                            <?php if($mobile_pedido == 1){ ?>
                                <?php foreach($pedido['servicos'] as $s) { ?>
                                    <div class="col-md-12 produto" id="produto" style="padding: 8px; max-height: 195px;">
                                        <div class="row form-group">
                                            <div class="col-5">
                                                <img style="height: 80px; width: auto;" class="img-fluid" src="<?php echo base_url($s['produto_imagem']); ?>">
                                            </div>
                                            <div class="col-7">
                                                <p style="font-size: 11px; color: #444!important;"><b style="color: #444!important">Produto:</b></p>
                                                <p class="nome-prod" style="color: #444!important;"><?php echo $s['produto_nome']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="p-0 col-4 text-center">
                                                <p style="font-size: 11px; color: #444!important;"><b style="color: #444!important">Valor Unitário:</b></p>
                                                <p style="font-size: 15px; color: #444!important;">R$<?php echo str_replace(".", ",", $s['produto_valor']); ?></p>
                                            </div>
                                            <div class="p-0 col-4 text-center">
                                                <p style=" font-size: 11px; color: #444!important;"><b style="color: #444!important">Qtd.:</b></p>
                                                <p style=" font-size: 11px; color: #444!important;"><b style="color: #444!important"><?php echo $s['produto_quantidade'] ?></b></p>
                                            </div>
                                            <div class="p-0 col-4 text-center">
                                                <p style=" font-size: 11px; color: #444!important;"><b style="color: #444!important">Valor Total:</b></p>
                                                <p style=" font-size: 18px; color: #444!important;"><b style="color: #444!important">R$<?php echo number_format($s['produto_valor'] * $s['produto_quantidade'], 2,',','.'); ?></b></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else {?>
                                <?php foreach($pedido['servicos'] as $s) { ?>
                                    <div class="servicoBody" style="box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;padding: 2%;border-radius: 10px; margin-bottom: 1rem;">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row" style="width: 120%;">
                                                    <div class="col-xl-4 d-flex justify-content-center">
                                                        <img class="img-fluid" style="height: auto; width: 5rem; position: relative" src="<?php echo base_url($s['produto_imagem']); ?>">
                                                    </div>
                                                    <div class="col-xl-6 p-0">
                                                        <p class="m-0" style="left: 43%; position: absolute;top: 1px;font-size: 12px;color: #a2a2a2;">Produto</p>
                                                        <p class="p-0 m-0 pedido-titulo" style="padding-bottom: 5px!important; padding-top: 19px!important;font-weight: 700; color: #444!important;"><?php echo $s['produto_nome']; ?></p>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 text-center" style="margin-top: auto;margin-bottom: auto;">
                                                <p class="m-0" style="position: absolute;top: -25px;font-size: 12px;color: #a2a2a2;left: 25%;">Valor Unitário</p>
                                                <p style="font-weight: 700; font-size: 15px; color: #444!important;">R$<?php echo number_format($s['produto_valor'], 2, ',', '.'); ?></p>
                                            </div>
                                            <div class="col-xl-2 text-center" style="margin-top: auto;margin-bottom: auto;">
                                                <p class="m-0" style="position: absolute;top: -25px;font-size: 12px;color: #a2a2a2;left: 30%;">Quantidade</p>
                                                <p style=" font-size: 15px; color: #444!important;"><b style="color: #444!important"><?php echo $s['produto_quantidade'] ?></b></p>
                                            </div>
                                            <div class="col-xl-2 text-center" style="margin-top: auto;margin-bottom: auto;">
                                                <p class="m-0" style="position: absolute;top: -25px;font-size: 12px;color: #a2a2a2;left: 40%;">Total</p>
                                                <p style=" font-size: 15px; color: #444!important;"><b style="color: #444!important">R$ <?php echo number_format($s['produto_valor'] * $s['produto_quantidade'], 2,',','.'); ?></b></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            
         
                            <?php } ?>
                            <div class="col-md-12 form-group">
                            <?php if($pedido['boleto'] != ""){ ?>
                                <div class="servicoBody" style="background: #afd4fa; margin-top: 5%; box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;padding: 3%;border-radius: 10px;">
                                    <div class="row form-group">
                                        <div class="col-xl-8 text-left">
                                            <p class="m-0" style="padding-left: 1%;font-size: 25px;font-weight: 700;">Informações Boleto</p>
                                        </div>
                                        <div class="col-xl-4 text-left">
                                            <p style="color: #212529">
                                                <b>Vencimento: 
                                                &nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i> 
                                                <?php echo date("d/m/Y", strtotime($pedido['vencimento'])); ?></b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" id="btn-boleto">
                                        <div class="col-xl-3">
                                            <a href="<?php echo $pedido['boleto'];?>" target="_blank">
                                                <button style="border: 1px solid #0000004f;" type="button" class="btn btn-primary">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    2ª Via Boleto
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xl-9 p-0 m-0 text-left divLinha">
                                            <span style="cursor: pointer; font-size: 18px; font-weight: 700" onclick="copiarCodigo()">
                                                <i aria-hidden="true">  <?php echo $pedido['codigoBarras'];?>
                                                </i>
                                                <input style="display: none" type="text" id="codigoHidden" value="<?php echo $pedido['codigoBarras'] ?>">
                                                <div id="divCopiadoAviso" style="display: none; position: absolute;width: 100%;text-align: center;top: -105%;">
                                                    <p style="font-size: 14px;background: white;display: initial;border-radius: 20px;padding: 10px;font-weight: 800;">Código de barras copiado</p>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4 divResumo">
                            <p style="color: #444; font-weight: 900;font-size: 25px;">Resumo do Pedido</p>
                            <hr style="height: 1px; border-color: lightgrey; margin-top:0; margin-bottom: 25px">
                            <div class="row">
                                <div class="col-md-6" style="width: 50%">
                                    <p style="color: #444"><b style="color: #444">Produto:</b></p>
                                </div>
                                <div class="text-right col-md-6" style="width: 50%">
                                    <p style="color: #444">R$ <span id="sub_total"><?php echo number_format($pedido['total'],2,',','.') ?></span></p>
                                </div>
                            </div>
                            <?php if($pedido['desconto'] != 0){ ?>
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%">
                                        <p style="color: #444"><b style="color: #444">Desconto:</b></p>
                                    </div>
                                    <div class="text-right col-md-6" style="width: 50%">
                                        <p style="color: #444">R$ <span id="desconto"><?php echo number_format($pedido['desconto'],2,',','.') ?></span></p>
                                    </div>
                                </div>
                            <?php } ?>
                            
                            
                            <?php if($pedido['frete']){ ?>
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%">
                                        <p style="color: #444"><b style="color: #444">Frete:</b></p>
                                    </div>
                                    <div class="text-right col-md-6" style="width: 50%">
                                        <p style="color: #444">R$ <span id="desconto"><?php echo number_format($pedido['freteValor'],2,',','.') ?></span></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr style="margin-bottom: 30px; margin-top: 15px; border: 1px solid lightgrey">
                            <div class="row">
                                <div class="col-md-6" style="width: 50%">
                                    <p style="font-size: 18px; color: #444; font-weight: 700">Total</p>
                                </div>
                                <div class="text-right col-md-6" style="width: 50%">
                                    <p style="font-size: 18px; font-weight: 700">R$ <span id="total"><?php echo number_format($pedido['total'] - $pedido['desconto'] + $pedido['freteValor'],2,',','.') ?></span></p>
                                </div>
                            </div
                            <hr style="margin-bottom: 15px; margin-top: 15px; border: 1px solid lightgrey">
                            <div class="row" style="line-height: 12px">
                                <div class="col-md-12 text-left" style="margin-top: 5px; margin-bottom: 15px">
                                    <p style="font-weight: 900; font-size: 16px; color: #444">Informações Pagamento</p>
                                </div>
                                <div class="col-md-5" style="width: 40%">
                                    <p>Status:</p>
                                    <p>Pagamento:</p>
                                </div>
                                <div class="col-md-7" style="width: 60%">
                                    <p style="font-size: 13px"><b><?php echo $pedido['status'] ?></b></p>
                                    <p style="font-size: 13px"><?php echo $pedido['forma'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="historico" role="tabpanel" aria-labelledby="historico-tab">
                    <div style="margin-top: 6%">
                        <hr style="height: 1px; border-color: lightgrey; margin-top:0; margin-bottom: 25px">
                        <h5 style="color: #444">HISTÓRICO:</h5>
                        <div class="table-responsive" style="width: 100%">
                            <table class="table">
                                <thead>
                                    <tr style="background-color: #afd4fa;">
                                        <th style="width: 15%; color: var(--base-color);" scope="col">Data/hora</th>
                                        <th class="text-center" style="width: 50%; color: var(--base-color);" scope="col">Histórico</th>
                                        <th style="width: 15%; color: var(--base-color);" class="text-center" scope="col">Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($pedido['historico_devolucao']) { ?>
                                        <?php foreach($pedido['historico_devolucao'] as $h_d){ ?>
                                            <tr style="font-size: 14px; color: #444" class="produto">
                                                <td><?php echo date('d/m/Y', strtotime($h_d['historico_data'])) . ' ' . date('H:i', strtotime($h_d['historico_hora'])) ?></td>
                                                <td><?php echo $h_d['historico_comentario'] ?></td>
                                                <td class="text-center"><?php echo $h_d['historico_status'] ?></td>
                                            </tr>
                                    <?php } } ?>
                                    <?php foreach($pedido['historico'] as $h){ ?>
                                        <tr style="font-size: 14px; color: #444" class="produto">
                                            <td><?php echo date('d/m/Y', strtotime($h['historico_data'])) . ' ' . date('H:i', strtotime($h['historico_hora'])) ?></td>
                                            <td><?php echo $h['historico_comentario'] ?></td>
                                            <td class="text-center"><?php echo $h['historico_status'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                    <div class="row">
                        <div class="col-xl-4 offset-xl-4">
                            <div id="areaTotalChat" <?php if($mobile_pedido == 0){ ?> style="height: 545px;" <?php }else{ ?> style="height: 600px;" <?php } ?>>
                                <div id="areaMensagem">
                                    <div id="loading-chat" class="text-center">
                                        <img style="width: 70px; height: 70px;" src="<?php echo base_url('imagens/loadingSimples.gif') ?>">
                                    </div>
                                </div>
                                <div id="areaFooter">
                                    <div class="row" style="width: 100%;height: 100%;">
                                        <div class="col-xl-9">
                                            <textarea id="mensagem" name="mensagem" style="height: 85%;position: relative;left: 4%; top: 10%" class="form-control"></textarea>
                                        </div>
                                        <div class="col-xl-3" id="div-botoes-chat">
                                            <div class="row">
                                                <div class="col-6 col-xl-12 form-group">
                                                    <button class="btn btn-block btn-primary" onclick="$('#anexo').click()">Anexo</button>
                                                    <input style="display: none" type="file" onchange="temAnexo()" name="anexo" id="anexo">
                                                </div>
                                                <div class="col-6 col-xl-12 form-group">
                                                    <button id="buttonEnviar" class="btn btn-block btn-primary" onclick="addMensagem()">Enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <label style="font-size: 12px; color: red; margin-left: 7%; padding-bottom: 1%;">Permitido arquivos com extensão png, pdf e jpeg sem espaço no nome.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </section>
    
    
    <div class="modal" tabindex="-1" role="dialog" id="devolucaoModal">
        <div class="modal-dialog modal-dialog-centered privacidade modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: #444; font-weight: bold; font-size: 14px;">SOLICITAÇÃO DE DEVOLUÇÃO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-devolucao" method="post" action="<?php echo base_url('f8dee182f9bb056fcecdeb3c150721dd') ?>" enctype="multipart/form-data">
                    <div class="modal-body" style="padding-left: 20px; padding-right: 20px">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h3 class="ree_h3">Dados do Comprador</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <label>Nome Completo</label>
                                <input class="form-control x" type="text" name="nome" id="ree_nome" placeholder="João Paulo Silva" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>CPF</label>
                                <input class="form-control x" type="text" name="cpf" id="ree_cpf" placeholder="000.000.000-00" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>RG</label>
                                <input class="form-control x" type="text" name="rg" id="ree_rg" placeholder="00.000.000-0X" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Data de Nascimento</label>
                                <input class="form-control x" type="date" name="nascimento" id="ree_nascimento" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label style="display: block">Título de Eleitor</label>
                                <button type="button" style="background: #3a0b0c; border-color: #3a0b0c;" class="btn-file" data-input="ree_titulo">ESCOLHER ARQUIVO</button>
                                <span class="msg-file" id="ree_msg_titulo">Nenhum selecionado</span>
                                <input class="form-control x input-file" type="file" name="titulo" id="ree_titulo" accept="application/pdf" data-msg="ree_msg_titulo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <label>Nome Completo da Mãe</label>
                                <input class="form-control x" type="text" name="nome_mae" id="ree_nome_mae" placeholder="Maria Silva" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Nascimento da mãe</label>
                                <input class="form-control x" type="date" name="data_mae" id="ree_data_mae" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <label>Nome Completo do pai</label>
                                <input class="form-control x" type="text" name="nome_pai" id="ree_nome_pai" placeholder="Pedro Silva" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Nascimento do pai</label>
                                <input class="form-control x" type="date" name="data_pai" id="ree_data_pai" required>
                            </div>
                        </div>
                        <hr class="ree_hr">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h3 class="ree_h3">Endereço</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 form-group">
                                <label>Logradouro (Rua)</label>
                                <input class="form-control x" type="text" name="rua" id="ree_rua" placeholder="Rua Francisco Afonso" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Número</label>
                                <input class="form-control x" type="text" name="numero" id="ree_numero" placeholder="000" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label>Bairro</label>
                                <input class="form-control x" type="text" name="bairro" id="ree_bairro" placeholder="Centro" required>
                            </div>
                            <div class="col-md-5 form-group">
                                <label>Complemento</label>
                                <input class="form-control x" type="text" name="complemento" id="ree_complemento" placeholder="Não Obrigatório">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>CEP</label><br>
                                <input class="form-control x" type="text" name="cep" id="ree_cep" placeholder="00000-00" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label>Cidade</label>
                                <input class="form-control x" type="text" name="cidade" id="ree_cidade" placeholder="São Paulo" required>
                            </div>
                            <div class="col-md-1 form-group">
                                <label>UF</label>
                                <input class="form-control x" type="text" name="uf" id="ree_uf" placeholder="SP" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Comprovante de Residência</label>
                                <button type="button" style="background: #3a0b0c; border-color: #3a0b0c;" class="btn-file" data-input="ree_comprovante">ESCOLHER ARQUIVO</button>
                                <span class="msg-file" id="ree_msg_comprovante">Nenhum selecionado</span>
                                <input class="form-control x input-file" type="file" name="comprovante" id="ree_comprovante" accept="application/pdf" data-msg="ree_msg_comprovante" required>
                            </div>
                        </div>
                        <hr class="ree_hr">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h3 class="ree_h3">Contato</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control x" type="email" name="email" id="ree_email" placeholder="joaopaulo1@gmail.com" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Telefone</label>
                                <input class="form-control x" type="text" name="telefone" id="ree_telefone" placeholder="(00) 0000-0000" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Celular</label>
                                <input class="form-control x" type="text" name="celular" id="ree_celular" placeholder="(00) 90000-0000" required>
                            </div>
                        </div>
                        <hr class="ree_hr">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h3 class="ree_h3">Dados da Compra</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>N° Pedido</label>
                                <input class="form-control x" type="type" name="id_pedido" id="id_pedido" value="<?php echo $pedido['idpedido'] ?>" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Data da Compra</label>
                                <input class="form-control x" type="date" name="data_compra" id="ree_data_compra" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Quantidade</label>
                                <input class="form-control x" type="text" name="quantidade" id="ree_quantidade" placeholder="0" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Valor Total</label>
                                <input class="form-control x" type="text" name="valor_total" id="ree_valor_total" placeholder="0,00" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Código da Transação</label>
                                <input class="form-control x" type="text" name="codigo" id="ree_codigo" placeholder="Código da Transação" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Comprovante do Pagamento</label>
                                <button type="button" style="background: #3a0b0c; border-color: #3a0b0c;" class="btn-file" data-input="ree_cupom">ESCOLHER ARQUIVO</button>
                                <span class="msg-file" id="ree_msg_cupom">Nenhum selecionado</span>
                                <input class="form-control x input-file" type="file" name="cupom"  id="ree_cupom" accept="application/pdf" data-msg="ree_msg_cupom" required>
                            </div>
                        </div>
                        <hr class="ree_hr">
                        <div class="row">
                            <div class="col-xs-6 col-md-6 form-group">
                                <h3 class="ree_h3">Dados Bancários</h3>
                            </div>
                            <div class="col-xs-6 col-md-6 form-group text-right">
                                <span class="ree_alert">O comprador tem que ser o titular da conta</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 form-group">
                                <label>Banco</label>
                                <input class="form-control x" type="text" name="banco" id="ree_banco" placeholder="Santander" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Agência</label>
                                <input class="form-control x" type="text" name="agencia" id="ree_agencia" placeholder="00000" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Conta</label>
                                <input class="form-control x" type="text" name="conta" id="ree_conta" placeholder="0000000" required>
                            </div>
                            <div class="col-md-1 form-group">
                                <label>Digito</label>
                                <input class="form-control x" type="text" name="digito" id="ree_digito" placeholder="0" required>
                            </div>
                        </div>
                        <hr class="ree_hr">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Motivo</label>
                                <textarea style="height: 100px;" class="form-control x" name="motivo" id="ree_motivo" required></textarea required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" style="padding: 20px; border-radius: 5px;color: white;" class="btn btn-fechar" data-dismiss="modal">Fechar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button"  style="background: #3a0b0c; border-color: #3a0b0c;padding: 20px;border-radius: 5px;color: white;" class="g-recaptcha btn btn-fechar" data-sitekey="6Lc_4MUaAAAAABAx7uNSBgfUXYknNjIrnERsvvRz" data-callback='onSubmit2' data-action='submit'>Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        $(document).ready(function(){
        setInterval(function(){
            dados = new FormData();
            dados.append('pedido', <?php echo $pedido['idpedido'] ?>);
            dados.append('admin', 0);
            
            $.ajax({
                url: '<?php echo base_url('chat/getChatRealTime'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                error: function(xhr, status, error) {
                    $('#loading-chat').hide();
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    var boolean = false;

                    $('#loading-chat').hide();
                    
                    for(var x = 0; x < data.length;x++){
                        if(data[x].admin == 1){
                            boolean = true;
                        }
                        
                        if(data[x].admin == 0){
                            var float = "float: right";
                        } else {
                            var float = "float: left";
                        }
                        
                        var div = '<div class="mensagens form-group" style="'+float+'">'+
                            '<div class="row">'+
                                '<div class="col-xl-12">'+
                                    '<p style="font-size: 12px;" class="m-0 p-0">'+data[x].dataHora+'</p>'+
                                '</div>'+
                                '<div class="col-xl-12">'+
                                    '<p style="padding-bottom: 7px!important; font-weight: 700" class="m-0 p-0">'+data[x].nome+'</p>'+
                                '</div>'+
                                '<div class="col-xl-12">'+
                                    '<p>'+data[x].mensagem+'</p>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                        
                        $('#areaMensagem').append(div);
                
                        setTimeout(function scrollDown(){var elem = document.getElementById('areaMensagem');elem.scrollTop = elem.scrollHeight;}, 100);
                    }
                    
                    // if(boolean == true){
                    //     $('#buttonEnviar').prop('disabled', false);
                    // }
                },
            }) } , 1000);
    
        });   
    </script>


    <script>
       function onSubmit(token) {
         document.getElementById("form-devolucao").submit();
       }
    </script>
    
    
    <script>
        function addMensagem(){
            
            if($('#mensagem').val() != "" && $('#mensagem').val() != " " && $('#mensagem').val() != null){
                
                var data = new Date();
                var mensagem = "";
                
                if($('#anexo').val() != "" && $('#anexo').val() != " " && $('#anexo').val() != null){
                    let fileName = $('#anexo')[0].files[0].name.replace(/\s+/g, '')
                    let originalName = fileName.substr(0, fileName.lastIndexOf('.'));
                    let ext = fileName.split('.').pop();
                    let insertName = `${originalName.replace(/\./g, '')}.${ext}`;
                    
                    var url = '<?php echo base_url('imagens/chat/') . $pedido['idpedido'] . '-'?>' + insertName;
                    
                    var mensagem = "<span id='"+url+"' onclick='janelaSecundaria(this)'><img src='<?php echo base_url('imagens/placeholder-image.png') ?>' style='cursor: pointer; width: 100px; height: 90px'>"+
                    insertName + "</span>";
                } else {
                    mensagem = $('#mensagem').val();   
                }
                
                var div = '<div class="mensagens form-group" style="float: right;">'+
                    '<div class="row">'+
                        '<div class="col-xl-12">'+
                            '<p style="font-size: 12px;" class="m-0 p-0">'+data.getDate()+'/'+(data.getMonth() + 1)+'/'+data.getFullYear()+' '+data.getHours()+':'+data.getMinutes()+'</p>'+
                        '</div>'+
                        '<div class="col-xl-12">'+
                            '<p style="padding-bottom: 7px!important; font-weight: 700" class="m-0 p-0"><?php echo ucwords(strtolower($this->session->userdata('cliente_nome'))) ?></p>'+
                        '</div>'+
                        '<div class="col-xl-12">'+
                            '<p>'+mensagem+'</p>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                
                
                
                $('#areaMensagem').append(div);
                
                var elem = document.getElementById('areaMensagem');
                elem.scrollTop = elem.scrollHeight;
                
                dados = new FormData();
                
                dados.append('mensagem', mensagem);  
                
                if($('#anexo').val() != "" && $('#anexo').val() != " " && $('#anexo').val() != null){
                    console.log($('#anexo')[0].files[0]);
                    dados.append('anexo', $('#anexo')[0].files[0]);
                    dados.append('nomeArquivo', '<?php echo $pedido['idpedido'] . '-'?>' + $('#anexo')[0].files[0].name);
                } 
                
                dados.append('pedido', <?php echo $pedido['idpedido'] ?>);
                dados.append('cliente', '<?php echo $this->session->userdata('cliente_nome') ?>');
                dados.append('admin', 0);
                $.ajax({
                    url: '<?php echo base_url('chat/insertChat'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    error: function(xhr, status, error) {
                        $('#mensagem').val('');
                        $('#anexo').val('');
                        
                        console.log(xhr.responseText);
                    },
                    success: function(data) {
                        $('#mensagem').val('');
                        $('#anexo').val('');
                    },
                });
            } else {
                $('#mensagem').focus();
            }
            document.getElementById("mensagem").disabled = false;
        }
    </script>
    
    <script>
        function janelaSecundaria(url){
            window.open($(url).attr('id'),"janela1","width=550,height=350","scrollbars=YES");
        }
    </script>
    
    
    <script>
        function temAnexo(){
            if($('#anexo').val() != "" && $('#anexo').val() != " " && $('#anexo').val() != null){
                $('#mensagem').val($('#anexo')[0].files[0].name);
                document.getElementById("mensagem").disabled = true;
            } 
        }
    </script>
    
    
    <script>
        function getMensagem(){
            $('#areaMensagem').empty();
            $('#loading-chat').show();
            
            dados = new FormData();
            dados.append('pedido', <?php echo $pedido['idpedido'] ?>);
            dados.append('admin', 0);
            
            $.ajax({
                url: '<?php echo base_url('chat/getChat'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                error: function(xhr, status, error) {
                    $('#loading-chat').hide();
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    console.log(data);
                    var boolean = false;
                    
                    $('#loading-chat').hide();
                    
                    for(var x = 0; x < data.length;x++){
                        if(data[x].admin == 1){
                            boolean = true;
                        }
                        
                        if(data[x].admin == 0){
                            var float = "float: right";
                        } else {
                            var float = "float: left";
                        }
                        
                        var div = '<div class="mensagens form-group" style="'+float+'">'+
                            '<div class="row">'+
                                '<div class="col-xl-12">'+
                                    '<p style="font-size: 12px;" class="m-0 p-0">'+data[x].dataHora+'</p>'+
                                '</div>'+
                                '<div class="col-xl-12">'+
                                    '<p style="padding-bottom: 7px!important; font-weight: 700" class="m-0 p-0">'+data[x].nome+'</p>'+
                                '</div>'+
                                '<div class="col-xl-12">'+
                                    '<p>'+data[x].mensagem+'</p>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                        
                        $('#areaMensagem').append(div);
                
                        setTimeout(function scrollDown(){var elem = document.getElementById('areaMensagem');elem.scrollTop = elem.scrollHeight;}, 100);
                    }
                    
                    // if(boolean == true){
                    //     $('#buttonEnviar').prop('disabled', false);
                    // }
                },
            });

        }
    </script>
    
    <script>
        function copiarCodigo() {
            /* Get the text field */
            var copyText = document.getElementById("codigoHidden");
        
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
        
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
            
            $('#divCopiadoAviso').delay(50).fadeIn();
            $('#divCopiadoAviso').delay(400).fadeOut();
        }
    </script>

    
    
    
    
    
    
    
    
    