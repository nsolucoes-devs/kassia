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
                        <p class="new-principal-titulo">Visualização de Pedido #<?php echo $pedido['idpedido'] ?></p>
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="<?php echo base_url('954d03a8bbb7febfcd39f9e071407b4b') ?>">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-reply" aria-hidden="true">VOLTAR</i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                        <div class="col-md-12">
                            <div class="row">
                                <div class=col-md-6>
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
                                                
                                                <div class="c-card-body" style="margin-top: 3%; margin-bottom: 10%; display: block">
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin-top: 2%;">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive" style="width: 100%">
                                                                    <table class="table c-table">
                                                                        <tr style="border-bottom: 1px solid lightgrey;">
                                                                            <th style="color: #4da751; width: 30%; padding: 10px;"><b>Produto</b></th>
                                                                            <td style="color: #4da751; width: 5%"><b>Quantidade</b></td>
                                                                            <td style="color: #4da751; width: 8%"><b>Valor</b></td>
                                                                            <td style="color: #4da751; width: 8%"><b>Total</b></td>
                                                                        </tr>
                                                                        <?php foreach($pedido['servicos'] as $s){ ?>
                                                                            <tr>
                                                                                <td style="padding: 10px;"><?php echo $s['produto_nome'] ?></td>
                                                                                <td><?php echo $s['produto_quantidade'] ?></td>
                                                                                <td>R$ <?php echo number_format($s['produto_valor'],2,',','.') ?></td>
                                                                                <td>R$ <?php echo number_format($s['produto_quantidade'] * $s['produto_valor'],2,',','.') ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="display: flex;">
                                                        <div class="text-right col-md-10">
                                                            <h5 style="margin: 0; padding: 10px;"><b>Sub-Total</b></h5>
                                                            <h5 style="margin: 0; padding: 10px;"><b>Frete</b></h4>
                                                            <h5 style="margin: 0; padding: 10px;"><b>Desconto</b></h5>
                                                            <h4 style="color: #4da751; margin: 0; padding: 10px;"><b>Total</b></h4>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <h5 style="margin: 0; padding: 10px; padding-left: 32px;">R$ <?php echo number_format($pedido['total'],2,',','.') ?></h5>
                                                            <h5 style="margin: 0; padding: 10px; padding-left: 32px;">R$ <?php echo number_format($pedido['freteValor'],2,',','.') ?></h5>
                                                            <h5 style="margin: 0; padding: 10px; padding-left: 32px;">R$ <?php echo number_format($pedido['desconto'],2,',','.') ?></h5>
                                                            <h4 style="color: #4da751; margin: 0; padding: 10px; padding-left: 32px;"><b>R$ <?php echo number_format($pedido['total'] + $pedido['freteValor'] - $pedido['desconto'],2,',','.') ?></b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="questionario" role="tabpanel" aria-labelledby="questionario-tab">
                                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                                
                                                <div class="col-xl-12 text-right" style="margin-top: 3%; margin-bottom: 3%;">
                                                    <form action="<?php echo base_url('admin/adminpedidos/relatorioQuestionario') ?>" method="post" target="_blank">
                                                        <input type="hidden" id="id" name="id" value="<?php echo $pedido['idpedido'] ?>">
                                                        <button type="submit" class="btn btn-primary">Relatório PDF</button>
                                                    </form>
                                                </div>

                                                <div class="c-card-body" style=" margin-bottom: 10%; display: block">
                                                    <div class="row" style="padding-left: 5%">
                                                        <div class="col-md-12 text-left">
                                                            <p style="font-size: 18px; color: #4da751;"><b>RESPOSTA(S) DO CLIENTE</b></p>
                                                        </div>
                                                        <?php foreach($pedido['questionario'] as $q){ ?>
                                                            <div class="col-md-12 form-group">
                                                                <p style="font-size: 15px; font-weight: 600"><?php echo $q['questao'] ?></p>
                                                                <p><?php echo $q['resposta'] ?></p>
                                                            </div>
                                                        <?php } ?>
                                                        
                                                        <hr style="border-color: #959292!important; width: 100%; margin-right: 5%;">
                                                        
                                                        <div class="col-md-12 text-left">
                                                            <p style="margin-top: 3%; font-size: 18px; color: #4da751;"><b>ANEXO(S) DO CLIENTE</b></p>
                                                        </div>
                                                        
                                                        <!-- Mostrar documento por botão e redirecionamento -->
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
                                                        <?php if($pedido['arquivos'] != "" || $pedido['arquivos'] != " " || $pedido['arquivos'] != null || $pedido['arquivos'] != "¬"){ ?>
                                                            <?php foreach($pedido['arquivos'] as $a){ ?>
                                                                <div class="col-md-12 form-group">
                                                                    <br>
                                                                    <label style="margin-top: 2%;"><b> <?php echo $a['questao'] ?> </b></label>
                                                                    <br>
                                                                    <img style="width: 350px; height: auto;" src="<?php echo base_url("imagens/pedidos/" . $a['arquivo']) ?>">
                                                                </div>
                                                            <?php } ?>
                                                        <?php } else{ ?>
                                                            <div class="col-md-12 form-group">
                                                                <br>
                                                                <br>
                                                                <p>Cliente não anexou imagem.</p>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="historico" role="tabpanel" aria-labelledby="historico-tab">
                                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                                
                                                <div class="c-card-body" style="margin-top: 3%; margin-bottom: 10%; display: block">
                                                    <div class="col-md-12" style="padding-top: 25px; display: block;" id="historico">
                                                        <div class="col-md-12 form-group">
                                                            <?php $cont = 1; $aux = count($pedido['historico']); foreach($pedido['historico'] as $h) { ?>
                                                                <div class="row form-group">
                                                                    <div class="col-xl-2 text-right">
                                                                        <div <?php if($h['historico_realizado'] == 0){ echo "style='background: grey!important;'"; } ?> class="bola"></div>
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
                                                            
                                                            <div class="col-md-12 form-group">
                                                                <hr style="height: 1px; border-color: lightgrey">
                                                                <h4 style="color: brown">Adicionar Histórico</h4>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label>Situação do pedido</label>
                                                                <select onchange="trocaStatus()" class="form-control" name="status" id="status" required>
                                                                    <option value="" selected disabled> Selecione </option>
                                                                    <option value="4">Aguardando Pagamento</option>
                                                                    <option value="5">Cancelado</option>
                                                                    <option value="6">Negado</option>
                                                                    <option value="7">Estorno</option>
                                                                    <option value="8">Aprovado</option>
                                                                    <option value="9">Em Separação</option>
                                                                    <option value="10">Enviado</option>
                                                                    <option value="11">Entregue</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label>Notificar Cliente?</label>
                                                                <input type="checkbox" id="notificar" name="notificar" value="1">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label>Comentário</label>
                                                                <textarea class="form-control" name="comentario" id="comentario" required></textarea required>
                                                            </div>
                                                            <div class="col-md-12 form-group" style="padding-bottom: 35px">
                                                                <button type="submit" class="btn btn-primary">Adicionar</button>
                                                            </div>
                                                        </form>
                                                        <?php }} ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                                
                                                <div class="c-card-body" style="margin-top: 3%; margin-bottom: 10%; display: block">
                                                    <div class="row">
                                                        <div class="col-xl-4 offset-xl-4">
                                                            <div style="box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;height: 500px;width: 450px;border-radius: 30px;border: 1px solid #cacaca;padding: 10px;">
                                                                <div id="areaMensagem" style="padding: 10px; overflow: auto; height: 100%; width: 100%">
                                                                    
                                                                    <div id="loading-chat" style="margin-top: 35%;" class="text-center">
                                                                        <img style="width: 70px; height: 70px;" src="<?php echo base_url('imagens/loadingSimples.gif') ?>">
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
        
        setInterval(
        function(){
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
    function trocaStatus(){
        $('#statusNome').val($('#status option:selected').text());
    }
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