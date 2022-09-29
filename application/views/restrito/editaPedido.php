<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    $auxfooter = 0;
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        $sm = 1;
    } else {
        $sm = 0;
    }
?>

<style>
    .nome-form{
        color: black;
        font-size: 16px;
    }
    .nav-tabs {
        background: transparent;
    }
    .nav-tabs {
        border-bottom: 1px transparent;
    }
    .nav-item{
        color: #555;
        cursor: default;
        border-radius: 4px 4px 0 0;
        background-color: #dedede;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
    .c-card{
        box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);
        border: 0;
        margin-bottom: 30px;
        margin-top: 30px;
        border-radius: 6px;
        color: #333333;
        background: #fff;
        width: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
    }
    
    .c-card-header{
        text-align: right;
        margin: 0px 15px 0;
        padding: 0;
        position: relative;
        z-index: 3 !important;
        color: #fff;
        border-bottom: none;
        background: transparent;
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        padding-bottom: 15px;
    }
    
    .c-card-icon{
        border-radius: 3px;
        background-color: #999999;
        padding: 15px;
        margin-top: -20px;
        margin-right: 15px;
        float: left;
    }
        
    .c-tabela{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
        background: linear-gradient(60deg, #ab47bc, #8e24aa);
    }
    
    .gui-pd-10{
        padding: 10px;
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
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    }
    .reta{
        float: right;
        width: 3px;
        height: calc(90% - -14px);
        background: #c7c7c7;
        position: relative;
        top: calc(40% - -18px);
        left: 16px;
        z-index: 1;
    }
    
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        position: relative;
    }
    
    .mensagens{
        border-radius: 10px;
        padding: 10px;
        width: 80%;
        box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;background: #e6e6e6;
    }
</style>



<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style=" margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('954d03a8bbb7febfcd39f9e071407b4b') ?>">Pedidos</a></li>
                <li class="breadcrumb-item" aria-current="page">Visualizar</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Edição de Pedido #<?php echo $pedido['idpedido'] ?></p>
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="<?php echo base_url('954d03a8bbb7febfcd39f9e071407b4b') ?>">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-reply" aria-hidden="true"> VOLTAR</i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                <div class="col-md-12">
                    <div class="row">
                        <div class=col-md-3>
                            <div class="c-card">
                                <div class="c-card-body" style="display: block;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-left">
                                                <p style="margin-top: 3%; font-size: 18px; color: #4da751;"><b>INFORMAÇÕES DO PEDIDO</b></p>
                                            </div>
                                        </div>
                                        <table>
                                            <tr>
                                                <td><i style="font-size: 25px; color: #4da751; padding: 10px" class="fa fa-calendar" aria-hidden="true" title="Data do Pedido"></i></td>
                                                <td style="width: 100%"><?php echo date('d/m/Y H:i:s', strtotime($pedido['cadastro'])) ?></td>
                                            </tr>
                                            <tr style="border-top: 1px solid lightgrey;">
                                                <td><i style="font-size: 25px; color: #4da751; padding: 10px" class="fa fa-credit-card" aria-hidden="true" title="Forma de Pagamento"></i></td>
                                                <td><?php echo $pedido['forma'] ?></td>
                                            </tr>
                                            <tr style="border-top: 1px solid lightgrey;">
                                                <td><i style="font-size: 25px; color: #4da751; padding: 10px" class="fa fa-truck" aria-hidden="true" title="Frete"></i></td>
                                                <td><?php echo $pedido['frete'] ?></td>
                                            </tr>
                                            <tr style="border-top: 1px solid lightgrey;">
                                                <td><i style="font-size: 25px; color: #4da751; padding: 10px" class="fa fa-usd" aria-hidden="true" title="Valor Total do Pedido"></i></td>
                                                <td>R$ <?php echo number_format($pedido['total'] + $pedido['freteValor'] - $pedido['desconto'], 2, ',','.') ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=col-md-3>
                            <div class="c-card">
                                <div class="c-card-body" style="display: block;">
                                    <div class="row">
                                            <div class="col-md-12 text-left">
                                                <p style="margin-top: 3%; font-size: 18px; color: #4da751;"><b>&nbsp</b></p>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-left">
                                                <div class="row" style="margin-top:8px;">
                                                    <div class="col-md-7"><h4><b>Sub-Total</b></h4></div>    
                                                    <div class="col-md-5">R$ <?php echo number_format($pedido['total'],2,',','.') ?></div>
                                                </div>
                                                <form action="<?php echo base_url('927cc2912712ab7328f82558a15d2b6a');?>" method="post">
                                                    <input type="hidden" name="pedido_id" name="pedido_id" value="<?php echo $pedido['idpedido'] ?>">
                                                    <div class="row" style="margin-top:8px;">
                                                        <div class="col-md-7"><h4><b>Frete</b></h4><button type="submit" class="btn btn-danger" style="margin-left:40%; margin-top:-23%; position:absolute; border-radius:50%;"><span class="material-icons md-18">update</span></button></div>
                                                        <div class="col-md-5">R$ <input style="width:65px; position:absolute; margin-top:-25px; margin-left:20px;" class="form-control" type="text" name="frete" name="frete" value="<?php echo number_format($pedido['freteValor'],2,',','.') ?>"></div>
                                                    </div>
                                                </form>
                                                <div class="row" style="margin-top:8px;">
                                                    <div class="col-md-7"><h4><b>Desconto</b></h4></div>    
                                                    <div class="col-md-5">R$ <?php echo number_format($pedido['desconto'],2,',','.') ?></div>
                                                </div>
                                                
                                                <div class="row" style="margin-top:8px;">
                                                    <div class="col-md-7"><h4><b>Total</b></h4></div>    
                                                    <div class="col-md-5">R$ <?php echo number_format($pedido['total'] + $pedido['freteValor'] - $pedido['desconto'],2,',','.') ?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=col-md-6>
                            <div class="c-card">
                                <div class="c-card-body" style="display: block">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-left">
                                                <p style="margin-top: 3%; font-size: 18px; color: #4da751;"><b>INFORMAÇÕES DO CLIENTE</b></p>
                                            </div>
                                        </div>
                                        <table>
                                            <tr>
                                                <td><i style="font-size: 25px; color: #4da751; padding: 10px" class="fa fa-user" aria-hidden="true" title="Nome do Cliente"></i></td>
                                                <td style="width: 100%"><?php echo $pedido['cliente'] ?></td>
                                            </tr>
                                            <tr style="border-top: 1px solid lightgrey;">
                                                <td><i style="font-size: 25px; color: #4da751; padding: 10px" class="fa fa-address-card"  aria-hidden="true" title="CPF do Cliente"></i></td>
                                                <td class="cpf"><?php echo $pedido['cpf'] ?></td>
                                            </tr>
                                            <tr style="border-top: 1px solid lightgrey;">
                                                <td><i style="font-size: 25px; color: #4da751; padding: 10px" class="fa fa-phone" aria-hidden="true" title="Telefone do Cliente"></i></td>
                                                <td>
                                                    <?php if($pedido['telefone']){ ?>
                                                        <span  class="telefone"><?php echo $pedido['telefone'] ?></span>
                                                    <?php } else { ?>
                                                        Telefone não cadastrado.
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="c-card">
                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pedido-tab" data-toggle="tab" href="#pedido" role="tab" aria-controls="pedido" aria-selected="true">Pedido</a>
                                    </li>
                                    <!--<li class="nav-item">-->
                                    <!--    <a class="nav-link" id="questionario-tab" data-toggle="tab" href="#questionario" role="tab" aria-controls="questionario" aria-selected="false">Questionário</a>-->
                                    <!--</li>-->
                                    <li class="nav-item">
                                        <a class="nav-link" id="historico-tab" data-toggle="tab" href="#historico" role="tab" aria-controls="historico" aria-selected="false">Histórico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" onclick="getMensagem()" aria-controls="chat" aria-selected="false">Chat</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content" id="myTabContent">
                                    
                                    <div class="tab-pane fade show active" id="pedido" role="tabpanel" aria-labelledby="pedido-tab">
                                        <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                        
                                        <div class="c-card-body" style="padding: 0 20px; margin-top: 3%; margin-bottom: 10%; display: block">
                                            <h4 style="color: #4da751;">Produto Comprado</h4>
                                            <div class="row">
                                                <div class="col-md-5"><b>Produto</b></div>
                                                <div class="col-md-2"><b>Quantidade</b></div>
                                                <div class="col-md-2"><b>Valor</b></div>
                                                <div class="col-md-2"><b>Total</b></div>
                                                <div class="col-md-1"><b>Ação</b></div>
                                            </div>
                                            <hr>
                                            <form action="<?php echo base_url('01eb143ebb19582034a24d525a9a4c02');?>" method="post">
                                                <input type="hidden" name="pedido_id" name="pedido_id" value="<?php echo $pedido['idpedido'] ?>">
                                                <?php foreach($pedido['servicos'] as $s){ ?>
                                                    <div class="col-md-12" style="text-align:initial;">
                                                        <div class="row">
                                                            <input type="hidden" name="prod[]" id="prod_<?php echo $s['produto_id'];?>" value="<?php echo $s['produto_id'];?>">
                                                            <div class="col-md-5"><?php echo $s['produto_nome'];?></div>
                                                            <div class="col-md-2"><input type="text" class="form-control" name="qtd[]" id="qtd_<?php echo $s['produto_id'];?>" value="<?php echo $s['produto_quantidade'];?>"></div>
                                                            <div class="col-md-2">R$ <?php echo number_format($s['produto_valor'],2,',','.');?></div>
                                                            <div class="col-md-2">R$ <?php echo number_format($s['produto_quantidade'] * $s['produto_valor'],2,',','.');?></div>
                                                            <div class="col-md-1"><button type="button" class="btn btn-danger" onclick="remove(<?php echo $s['produto_id'];?>)">X</button></div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                <?php } ?>
                                                <div id="content"></div>
                                                    
                                                <div class="row">
                                                    <div class="col-md-12" style="text-align:initial;">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-info" style="margin-left: 0%;" onclick="insere()">Adicionar Produto</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-danger" style="margin-left:-77%;">Salvar Produtos</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="questionario" role="tabpanel" aria-labelledby="questionario-tab">
                                        <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                        
                                        <div class="col-xl-12 text-right" style="margin-top: 3%;">
                                            <form action="<?php echo base_url('admin/adminpedidos/relatorioQuestionario') ?>" method="post" target="_blank">
                                                <input type="hidden" id="id" name="id" value="<?php echo $pedido['idpedido'] ?>">
                                                <button type="submit" class="btn btn-primary">Relatório PDF</button>
                                            </form>
                                        </div>
                                        
                                        <div class="c-card-body" style="margin-bottom: 10%; display: block">
                                            <div class="row" style="padding-left: 5%">
                                                <div class="col-md-12 text-left">
                                                    <p style="font-size: 18px; color: #4da751;"><b>RESPOSTA(S) DO CLIENTE</b></p>
                                                </div>
                                                <?php foreach($pedido['questionario'] as $q){ ?>
                                                    <div class="col-md-12 form-group">
                                                        <p style="font-size: 15px; font-weight: 700"><?php echo $q['questao'] ?></p>
                                                        <p><?php echo $q['resposta'] ?></p>
                                                    </div>
                                                <?php } ?>
                                                
                                                <hr style="border-color: #959292!important; width: 100%; margin-right: 5%;">
                                                
                                                <div class="col-md-12 text-left">
                                                    <p style="margin-top: 3%; font-size: 18px; color: #4da751;"><b>ANEXO(S) DO CLIENTE</b></p>
                                                </div>
                                                
                                                <!--<?php if($pedido['arquivos']){ ?>-->
                                                <!--    <?php foreach($pedido['arquivos'] as $a){ ?>-->
                                                <!--        <div class="col-md-12 form-group">-->
                                                <!--            <a href="<?php echo base_url("imagens/pedidos/" . $a['arquivo']) ?>" target="_blank">-->
                                                <!--                <button class="btn btn-primary"><?php echo $a['questao'] ?></button>-->
                                                <!--            </a>-->
                                                <!--        </div>-->
                                                <!--    <?php } ?>-->
                                                <!--<?php } ?>-->
                                                
                                                <!-- Mostrar documento direto -->
                                                <?php if($pedido['arquivos'] != "" || $pedido['arquivos'] != " " || $pedido['arquivos'] != null){ ?>
                                                    <?php foreach($pedido['arquivos'] as $a){ ?>
                                                        <div class="col-md-12 form-group">
                                                            <br>
                                                            <label style="margin-top: 2%;"><b> <?php echo $a['questao'] ?> </b></label>
                                                            <br>
                                                            <img style="width: 350px; height: auto;" src="<?php echo base_url("imagens/pedidos/" . $a['arquivo']) ?>">
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <style>
                                        .seta-check{
                                            font-size: 21px;
                                            position: relative;
                                            top: 6px;
                                            right: 6px;
                                            color: #2dec33;
                                            cursor: pointer;
                                            transition: transform 1s;
                                        }
                                        
                                        .seta-check:hover{
                                            transform: scale(2.5);
                                        }
                                    </style>
                                    <div class="tab-pane fade" id="historico" role="tabpanel" aria-labelledby="historico-tab">
                                        <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="c-card">
                                                        <div class="c-card-header">
                                                            <div class="row">
                                                                <div class="col-md-12 text-left">
                                                                    <h2 style="color: #1b9045;"><b>Histórico</b></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="c-card-body" style="display: block">
                                                            <div class="col-md-12">
                                                                <ul class="nav nav-tabs">
                                                                  <li id="li_historico" class="active" onclick="historico()"><a style="cursor: pointer">HISTÓRICO</a></li>
                                                                  <!--<li id="li_adicional" onclick="adicional()"><a style="cursor: pointer">ADICIONAL</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-12" style="padding-top: 25px; display: block; border: 1px solid #dadada;" id="historico">
                                                                <div class="col-md-12 form-group">
                                                                    <div class="table-responsive" style="width: 100%">
                                                                        <table class="table c-table">
                                                                            <tr style="border-bottom: 1px solid lightgrey">
                                                                                <th style="width: 10%; padding: 5px">Data/hora</th>
                                                                                <th style="width: 30%;">Comentário</th>
                                                                                <th style="width: 10%;">Cliente Notificado?</th>
                                                                                <th style="width: 10%;">Status</th>
                                                                                <th class="text-center" style="width: 10%;">Ação</th>
                                                                            </tr>
                                                                            <?php foreach($pedido['historico'] as $h) { ?>
                                                                                <tr>
                                                                                    <td style="padding: 10px"><?php echo date('d/m/Y', strtotime($h['historico_data'])) . ' ' . date('H:i', strtotime($h['historico_hora'])); ?>  </td>
                                                                                    <td><?php echo $h['historico_comentario'] ?></td>
                                                                                    <td><?php echo $h['historico_notificar'] ?></td>
                                                                                    <td><?php echo $h['historico_status'] ?></td>
                                                                                    <td class="text-center"><i onclick="excluirHistorico(<?php echo $h['historico_id'] ?>)" data-toggle="modal" data-target="#statusModal" style="cursor: pointer; padding-left: 12px; font-size: 25px" class="fa fa-trash" aria-hidden="true"></i></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <?php if($pedido['historico'] == null) { ?>
                                                                    <div class="col-md-12 text-center">
                                                                        <p>Nenhum histórico encontrado.</p>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if(isset($edita)) { if($edita == 1) { ?>
                                                                <form action="<?php echo base_url('fbdc26200e4306f37a0fb4bd88637744') ?>" method="post">
                                                                    <input type="hidden" name="pedido_id" name="pedido_id" value="<?php echo $pedido['idpedido'] ?>">
                                                                    <div class="col-md-12 form-group">
                                                                        <hr style="height: 1px; border-color: lightgrey">
                                                                        <h4 style="color: brown">Adicionar Histórico</h4>
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label>Situação do pedido</label>
                                                                        <select class="form-control" name="status" id="status">
                                                                            <option value="1">Aguardando Pagamento</option>
                                                                            <option value="7">Cancelado</option>
                                                                            <option value="19">Negado</option>
                                                                            <option value="20">Estorno</option>
                                                                            <option value="17">Aprovado</option>
                                                                            <option value="12">Em Separação</option>
                                                                            <option value="13">Enviado</option>
                                                                            <option value="11">Entregue</option>
                
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label>Notificar Cliente?</label>
                                                                        <input type="checkbox" id="notificar" name="notificar" value="1">
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label>Comentário</label>
                                                                        <textarea class="form-control" name="comentario" id="comentario"></textarea>
                                                                    </div>
                                                                    <div class="col-md-12 form-group" style="padding-bottom: 35px">
                                                                        <button type="submit" class="btn btn-primary">Adicionar</button>
                                                                    </div>
                                                                </form>
                                                                <?php }} ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <!--<div class="tab-pane fade" id="historico" role="tabpanel" aria-labelledby="historico-tab">
                                        <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                        
                                        <div class="c-card-body" style="margin-top: 3%; margin-bottom: 10%; display: block">
                                            <div class="col-md-12" style="padding-top: 25px; display: block;" id="historico">
                                        <div class="col-md-12 form-group">
                                            <?php $cont = 1; $aux = count($pedido['historico']); foreach($pedido['historico'] as $h) { ?>
                                                <div class="row form-group">
                                                    <div class="col-xl-2 text-right">
                                                        <div <?php if($h['historico_realizado'] == 0){ echo "style='background: grey!important;'"; } ?> class="bola">
                                                            <?php //if($h['historico_realizado'] == 0){ echo '<i onclick="ativarHistorico('.$h['historico_id'].')" class="seta-check fa fa-check" aria-hidden="true"></i>'; } ?>
                                                        </div>
                                                        <?php if($cont != $aux){ ?>
                                                        <div class="reta"></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-xl-6" style="padding-left: 18px!important;padding-top: 15px!important;padding: 10px;border: 1px solid #00000030;box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;border-radius: 10px;">
                                                        <p class="m-0 p-0" style="<?php if($h['historico_realizado'] == 0){ echo "color: lightgrey; "; } else { "color: black; ";}?>font-weight: 700; padding-bottom: 5px!important;"><?php if($h['historico_data']) { echo date('d/m/Y' , strtotime($h['historico_data'])) . ' ' . date('H:i' , strtotime($h['historico_hora'])) . " | "; } ?>  <?php echo $h['historico_titulo'] ?></p>
                                                        <p style="<?php if($h['historico_realizado'] == 0){ echo "color: lightgrey; "; } else { "color: black; ";}?>"><?php echo $h['historico_comentario'] ?></p>
                                                    </div>
                                                </div>
                                            
                                            <?php $cont++; } ?>
                                        </div>
                                        <?php if($pedido['historico'] == null) { ?>
                                            <div class="col-md-12 text-center">
                                                <p>Nenhum histórico encontrado.</p>
                                            </div>
                                        <?php } ?>
                                        <?php if(isset($edita)) { if($edita == 1) { ?>
                                        <form action="<?php echo base_url('fbdc26200e4306f37a0fb4bd88637744') ?>" method="post">
                                            <input type="hidden" name="pedido_id" name="pedido_id" value="<?php echo $pedido['idpedido'] ?>">
                                            <input type="hidden" name="statusNome" id="statusNome">
                                            <input type="hidden" name="status" value="16">
                                            
                                            <div class="col-md-12 form-group">
                                                <hr style="height: 1px; border-color: lightgrey">
                                                <h4 style="color: #4da751">Adicionar Histórico</h4>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Título do histórico</label>
                                                <input type="text" class="form-control" name="statusNome" id="status">
                                                <select onchange="mensagemPronta(this.value)" class="form-control" name="status" id="status">
                                                    <option value="" disabled selected> Selecione </option>
                                                    <?php foreach($status as $s){ ?>
                                                        <option value="<?php echo "T".$s['idStatusCompra'] ?>"><?php echo $s['nomeStatusCompra'] ?></option>
                                                    <?php } ?>
                                                    <?php foreach($historico as $h){ ?>
                                                        <option value="<?php echo $h['historico_id'] ?>"><?php echo $h['historico_titulo'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Notificar Cliente?</label>
                                                <input type="checkbox" id="notificar" name="notificar" value="1">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Comentário</label>
                                                <textarea class="form-control" name="comentario" id="comentario"></textarea>
                                            </div>
                                            <div class="col-md-12 form-group" style="padding-bottom: 35px">
                                                <button type="submit" class="btn btn-primary">Adicionar</button>
                                            </div>
                                        </form>
                                        <?php }} ?>
                                    </div>
                                        </div>
                                    </div>-->
                                    
                                    
                                    <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                                        <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                        
                                        <div class="c-card-body" style="margin-top: 3%; margin-bottom: 10%; display: block">
                                            <div class="row">
                                                <div class="col-xl-4 offset-xl-4">
                                                    <div style="box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;height: 500px;width: 450px;border-radius: 30px;border: 1px solid #cacaca;padding: 10px;">
                                                        <div id="areaMensagem" style="padding: 10px; overflow: auto; height: 75%; width: 100%">
                                                            
                                                            <div id="loading-chat" style="margin-top: 35%;" class="text-center">
                                                                <img style="width: 70px; height: 70px;" src="<?php echo base_url('imagens/loadingSimples.gif') ?>">
                                                            </div>
                        
                                                        </div>
                                                        <div id="areaFooter" style="height: 25%; width: 100%">
                                                            <div class="row" style="width: 100%;height: 100%;">
                                                                <div class="col-xl-9">
                                                                    <textarea id="mensagem" name="mensagem" style="height: 85%;position: relative;left: 4%; top: 10%" class="form-control"></textarea>
                                                                </div>
                                                                <div class="col-xl-3" style="position: relative;top: 15%;left: 2%;">
                                                                    <div class="row">
                                                                        <div class="col-xl-12 form-group">
                                                                            <button class="btn btn-block btn-primary" onclick="$('#anexo').click()">Anexo</button>
                                                                            <input style="display: none" type="file" onchange="temAnexo()" name="anexo" id="anexo">
                                                                        </div>
                                                                        <div class="col-xl-12 form-group">
                                                                            <button class="btn btn-block btn-primary" onclick="addMensagem()">Enviar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<div class="modal fade" id="produtoADDModal" tabindex="-1" role="dialog" aria-labelledby="produtoADDModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Selecione o produto a ser inserido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select class="form-control" id="selectProd">
                    <?php foreach($servicos as $s){;?>
                    <option value="<?php echo $s['produto_id'];?>"><?php echo $s['produto_nome'];?></option>
                    <?php }?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addProd()">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="statusModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, rgba(101,55,14,1) 0%, rgba(58,11,12,1) 70%);">
        <h4 class="modal-title" style="color: white; display: inline;">AVISO</h4>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p style="font-size: 17px;"><b> Deseja excluir o histórico? </b><p>
      </div>
      <div class="modal-footer">
            <form action="<?php echo base_url('admin/adminpedidos/deleteHistorico') ?>" method="post">
                <input type="hidden" id="idhistorico" name="idhistorico">
                <input type="hidden" id="idpedido" name="idpedido" value="<?php echo $pedido['idpedido'] ?>">
                <button type="submit" class="btn btn-primary">Excluir</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </form> 
      </div>
    </div>
  </div>
</div>


<script>
    function remove(id){
        var form = document.createElement("form");
        var element1 = document.createElement("input");
        var element2 = document.createElement("input"); 
    
        form.method = "POST";
        form.action = "<?php echo base_url('32df3fe06d9c44ba678962b454312f86');?>";   
        
        element1.value = id;
        element1.name = "id";
        form.appendChild(element1);
        
        element2.value = "<?php echo $pedido['idpedido'] ?>";
        element2.name = "pedido";
        form.appendChild(element2);  
    
        document.body.appendChild(form);
        form.submit();
    }
    
    var a = 1;
    
    function insere(){
        $('#produtoADDModal').modal('show');
    }
    
    function addProd(){
        var a = document.getElementById("selectProd").value;
        $('#produtoADDModal').modal('hide');
        const div = document.createElement('div');
        
        dados = new FormData();
        dados.append('idproduto', a);
        $.ajax({
            url: '<?php echo base_url('admin/Adminpedidos/getServico'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
                alert('Error, check console');
                console.log(xhr.responseText);
            },
            success: function(data) {
                if(data != "null" && data != "" && data != " " && data != null){
                    servico = jQuery.parseJSON(data);
                        div.innerHTML = `
                            <div class="row" id="`+a+`">
                                <div class="col-md-12" style="text-align:initial;">
                                    <input type="hidden" name="prod[]" value="`+servico.produto_id+`">
                                    <div class="row">
                                        <div class="col-md-3">`+servico.produto_nome+`</div>
                                        <div class="col-md-2">`+servico.produto_subtitulo+`</div>
                                        <div class="col-md-2"><input type="text" class="form-control" name="qtd[]" id="qtd_`+servico.produto_id+`" value="1"></div>
                                        <div class="col-md-2">R$ `+servico.produto_valor+`</div>
                                        <div class="col-md-2">R$ `+servico.produto_valor+`</div>
                                        <div class="col-md-1"><button type="button" class="btn btn-danger" onclick="removeRow(`+a+`)">X</button></div>
                                    </div>
                                </div>
                                <hr>
                            </div>`;
                }else{
                    alert("Erro no banco");
                }
            },
        });
        a++;
        document.getElementById('content').appendChild(div);
    }

    function removeRow(id) {
        document.getElementById(id).remove();
    }
    
</script>

<script type="application/javascript">
    $(document).ready(function(){
        $('.number').mask('0#');
        $('.money').mask("#.##0,00", {reverse: true});
        
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
        
        
        setInterval(function(){
            dados = new FormData();
            dados.append('pedido', <?php echo $pedido['idpedido'] ?>);
            dados.append('admin', 1);
            
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
                    console.log(data);
                    
                    $('#loading-chat').hide();
                    
                    for(var x = 0; x < data.length;x++){
                        if(data[x].admin == 0){
                            var float = "float: left";
                        } else {
                            var float = "float: right";
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
                },
            }) } , 1000);
    });
</script>

<script>
    function historico(){
        $('#historico').show();
        $('#li_historico').addClass('active');
        $('#adicional').hide();
        $('#li_adicional').removeClass('active');
    }
    
    function adicional(){
        $('#historico').hide();
        $('#li_historico').removeClass('active');
        $('#adicional').show();
        $('#li_adicional').addClass('active');
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
                            '<p style="padding-bottom: 7px!important; font-weight: 700" class="m-0 p-0"><?php echo ucwords(strtolower($this->session->userdata('nome'))) ?></p>'+
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
                dados.append('cliente', '<?php echo $this->session->userdata('nome') ?>');
                dados.append('admin', 1);
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
            } 

        }
    </script>
    
    
    <script>
        function getMensagem(){
            $('#areaMensagem').empty();
            $('#loading-chat').show();
            
            dados = new FormData();
            dados.append('pedido', <?php echo $pedido['idpedido'] ?>);
            dados.append('admin', 1);
            
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
                    
                    $('#loading-chat').hide();
                    
                    for(var x = 0; x < data.length;x++){
                        if(data[x].admin == 0){
                            var float = "float: left";
                        } else {
                            var float = "float: right";
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
                },
            });

        }
    </script>
    
    <script>
        function mensagemPronta(id){
            $('#statusNome').val($('#status option:selected').text());
            if(id == 32){
                $('#comentario').val('A contratação foi realizada, aguarde contato pelo chat. Enviaremos notificação para seu e-mail cadastrado sempre que enviamos novas mensagens no chat. Confira na caixa de spam.');
            } else if(id == "T33"){
                $('#comentario').val('Estamos analisando os documentos e informações sobre sua marca. Se precisarmos de mais informações ou de novos documentos solicitaremos pelo chat. qualquer dúvida nos envie por lá também.');
            } else if(id == "T34"){
                $('#comentario').val('Análise concluída. Você pode fazer o download do relatório pelo chat.');
            } else if(id == "T35"){
                $('#comentario').val('O protocolo do pedido de registro da sua marca foi realizado. Agora temos que aguardar averificação inicial do INPI sobre a possibilidade de registro, quando farão a publicação paraoposição. Não há prazo para o INPI fazer essa verificação, mas tem demorado em torno de1 mês.');
            } else if(id == "T36"){
                $('#comentario').val('Seu pedido foi publicado pelo INPI. A partir de agora abre-se o prazo para impugnação.Aguarde nossa informação de conclusão desta etapa e a emissão da guia para pagamentodo primeiro decênio.');
            } else if(id == "T37"){
                $('#comentario').val('Seu pedido foi deferido! A partir desta data você tem o prazo de 60 dias para o pagamentoda guia que te enviamos pelo chat. Faça o pagamento o quanto antes para agilizar aconcessão do registro, e nos envie por lá mesmo o comprovante de pagamento.');
            } else if(id == "T38"){
                $('#comentario').val('Sua marca está registrada.');
            }else{
                dados = new FormData();
                dados.append('id', id);
                $.ajax({
                    url: '<?php echo base_url('admin/Adminpedidos/comentario'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    error: function(xhr, status, error) {
                        alert('Error, check console');
                        console.log(xhr.responseText);
                    },
                    success: function(data) {
                        $('#comentario').val(data);
                    }
                });
            }
        }
    </script>
    
    <script>
        function ativarHistorico(id){
            Swal.fire({
              text: "Deseja atualizar esse histórico?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sim',
              cancelButtonText: 'Não',
            }).then((result) => {
              if (result.isConfirmed) {
                var form = "<form id='formHistorico' action='<?php echo base_url('admin/adminpedidos/atualizarHistoricoUnico') ?>' method='post'><input type='hidden' id='idPedido' name='idPedido' value='<?php echo $pedido['idpedido'] ?>'><input type='hidden' id='idHistorico' name='idHistorico' value='"+id+"'></form>";
                
                $('.wrapper').append(form);
                
                $('#formHistorico').submit();             
                  
              }
            })
        }
    </script>