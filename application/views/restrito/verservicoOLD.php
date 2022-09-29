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
    
    .tab-li a{
        cursor: pointer;
    }
    
    .label-imagem{
        margin-top: 10px;
    }
    
    #select2-produtos2-container{
        height: 50px!important;
    }
    
    .card-servicos{
        border: 1px solid #d8d8d8;
        padding: 15px;
        margin: 10px;
        border-radius: 10px;
        padding-top: 35px;
        box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px
    }
    
    .x-card-servicos{
        position: absolute;
        top: 21px;
        right: 42px;
        font-size: 20px;
        color: #ef5647;
        text-shadow: 2px 2px #bbbbbb;
        cursor: pointer;
    }
    
    .popover-body{
        padding: 25px!important;
        color: #dc3545!important;
        font-weight: 600!important;
    }

</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/adminservicos/servicos') ?>">Produtos</a></li>
                <li class="breadcrumb-item" aria-current="page">Visualização</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Visualização de Produto</p>
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="<?php echo base_url('admin/adminservicos/servicos') ?>">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-reply" aria-hidden="true"> VOLTAR</i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" aria-selected="true">Dados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="detalhes-tab" data-toggle="tab" href="#detalhes" role="tab" aria-controls="detalhes" aria-selected="false">Detalhes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="imagens-tab" data-toggle="tab" href="#imagens" role="tab" aria-controls="imagens" aria-selected="false">Imagens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Vídeos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="questionarios-tab" data-toggle="tab" href="#questionarios" role="tab" aria-controls="questionarios" aria-selected="false">Questionário</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="uploads-tab" data-toggle="tab" href="#uploads" role="tab" aria-controls="uploads" aria-selected="false">Doc. Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="promocoes-tab" data-toggle="tab" href="#promocoes" role="tab" aria-controls="promocoes" aria-selected="false">Promoções</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" id="historicos-tab" data-toggle="tab" href="#historicos" role="tab" aria-controls="historicos" aria-selected="false">Histórico</a>-->
                        <!--</li>-->
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="dados-tab">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-3 form-group">
                                            <label><b>Código:</b></label>
                                            <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Digite o código do produto" value="<?php echo $servico['produto_codigo'] ?>" readonly>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label><b>Título:</b></label>
                                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o título do produto"  value="<?php echo $servico['produto_nome'] ?>" readonly>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Sub Título:</b></label>
                                            <input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Digite o sub título do produto"  value="<?php echo $servico['produto_subtitulo'] ?>" readonly>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label><b>Valor:</b></label>
                                            <input type="text" class="form-control" placeholder="Digite o valor do produto" value="<?php echo 'R$' . number_format($servico['produto_valor'],2,',','.') ?>" readonly>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Possui Pré-requisito</b></label><br>
                                            <input <?php if($servico['produto_livre'] == 0){echo "checked";}?> onclick="Requisito(0)" type="radio" name="requisito" value="0" style="display: inline;height: 20px;width: 20px;" disabled>
                                            &nbsp;<span><b>Sim</b></span>
                                            &nbsp;&nbsp;&nbsp;
                                            <input <?php if($servico['produto_livre'] == 1){echo "checked";}?> onclick="Requisito(1)" type="radio" name="requisito" value="1" style="display: inline;height: 20px;width: 20px;" disabled>
                                            &nbsp;<span><b>Não</b></span>
                                        </div>
                                        <div id="requisito_div" class="col-md-3 form-group" <?php if($servico['produto_livre'] == 1){echo "style='content-visibility:hidden;'";}?>>
                                            <label><b>Produto Requisitado:</b></label>
                                            <select disabled id="requisitoNecessarioId" name="requisitoNecessarioId" class="js-example-basic-multiple" style="width: 100%!important">
                                                <option value="" disabled> Selecione o Produto</option>
                                                <?php foreach($servicos as $ser){?>
                                                    <option disabled <?php if($servico['produto_requisito'] == $ser['id']){echo "selected";}?> value="<?php echo $ser['id'];?>"> <?php echo $ser['nome'];?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Habilitado:</b></label><br>
                                            <input type="radio" name="habilitado" value="1" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 1) { echo 'checked'; }?> disabled>
                                            &nbsp;<span><b>Sim</b></span>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="habilitado" value="0" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 0) { echo 'checked'; }?> disabled>
                                            &nbsp;<span><b>Não</b></span>
                                        </div>
                                        <!--<div class="col-md-2 form-group">-->
                                        <!--    <label><b>Visível:</b></label><br>-->
                                        <!--    <input type="radio" name="visivel" value="1" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 1) { echo 'checked'; }?> disabled>-->
                                        <!--    &nbsp;<span><b>Sim</b></span>-->
                                        <!--    &nbsp;&nbsp;&nbsp;-->
                                        <!--    <input type="radio" name="visivel" value="0" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 0) { echo 'checked'; }?> disabled>-->
                                        <!--    &nbsp;<span><b>Não</b></span>-->
                                        <!--</div>-->
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label><b>Breve Resumo:</b></label>
                                            <textarea id="resumo" name="resumo" class="form-control" placeholder="Digite um breve resumo sobre o produto" disabled><?php echo $servico['produto_resumo'] ?></textarea disabled>
                                        </div>
                                    </div>
                                    
                                    <br>
                                </div>
                                
                                <div class="tab-pane fade" id="detalhes" role="tabpanel" aria-labelledby="detalhes-tab">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-12 form-group">
                                            <label><b>Detalhes:</b></label>
                                            <div><?php echo $servico['produto_detalhes'] ?></div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane fade" id="imagens" role="tabpanel" aria-labelledby="imagens-tab">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-6 form-group">
                                            <label><b>1° Imagem:</b></label><br>
                                            
                                            <?php if($servico['produto_imagem1']){ ?>
                                            <div class="text-center">
                                                <img src="<?php echo base_url() . $servico['produto_imagem1'] ?>" height="200" width="200">
                                            </div>
                                            <?php } else { ?>
                                            
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><b>2° Imagem:</b></label><br>
                                            
                                            <?php if($servico['produto_imagem2']){ ?>
                                            <div class="text-center">
                                                <img src="<?php echo base_url() . $servico['produto_imagem2'] ?>" height="200" width="200">
                                            </div>
                                            <?php } else { ?>
                                            <div class="text-center">
                                                <p style="font-size: 20px; font-weight: 600">Não foi colocado 2° Imagem</p>
                                            </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-6 form-group">
                                            <label><b>Vídeo:</b></label>
                                            <?php if($servico['produto_video']){ ?>
                                                <div class="text-center">
                                                    <video width="320" height="240" controls>
                                                      <source src="<?php echo $servico['produto_video'] ?>" type="video/mp4">
                                                      Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            <?php } else { ?>
                                                <div class="text-center">
                                                    <p style="font-size: 20px; font-weight: 600">Não foi colocado Vídeo</p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="tab-pane fade" id="questionarios" role="tabpanel" aria-labelledby="questionarios-tab">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    
                                    <!--<input type="hidden" id="pergunta" class="form-control">-->
                                    
                                    <!--<div class="row" style="margin-top: 2%">-->
                                    <!--    <div class="col-xl-12 form-group">-->
                                    <!--        <div class="row" id="listagemPerguntas">-->

                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                        <table style="width: 100%" class="table c-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 70%"> Pergunta </th>
                                                    <th class="text-center" style="width: 15%"> Posição </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                        $pgta = explode("¬", $servico['produto_questionario']);
                                                        $pos  = explode("¬", $servico['produto_posicao']);
                                                        $count = 0;
                                                        
                                                        foreach($pgta as $p){
                                                        $contador = $count + 1;
                                                    ?>
                                                    <tr class="tr-check" id="listaServ<?php echo $count?>">
                                                        <td><input class="form-control" style="width: 100%;" type="text" name="questionario<?php echo $count ?>" id="questionario<?php echo $count ?>" value="<?php echo $pgta[$count] ?>" disabled></td>
                                                        <td>
                                                            <select class="form-control" name="posicao-frase<?php echo $count ?>" id="posicao-frase<?php echo $count ?>" style="width: 100%" disabled>
                                                                <option value="<?php echo $contador ?>" selected>  Posição <?php echo $contador ?> </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                <?php $count++; }?>
                                            </tbody>
                                        </table>
                                </div>  
                                
                                <div class="tab-pane fade" id="uploads" role="tabpanel" aria-labelledby="uploads-tab">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    
                                    <input type="hidden" id="arquivo" class="form-control">
                                    
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-xl-12 form-group">
                                            <div class="row" id="listagemArquivos">
    
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="tab-pane fade" id="promocoes" role="tabpanel" aria-labelledby="promocoes-tab">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    
                                    <div class="row" style="margin-top: 2%;">
                                        <div class="col-md-3 form-group">
                                            <label><b>Data inicial:</b></label>
                                            <input type="date" id="dataInicial" name="dataIncial" class="form-control" placeholder="Data inicial" value="<?php echo $servico['produto_dataInicial'] ?>" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>Data final:</b></label>
                                            <input type="date" id="dataFinal" name="dataFinal" class="form-control" placeholder="Data final" value="<?php echo $servico['produto_dataFinal'] ?>" readonly>
                                        </div>
                                        <!--<div class="col-md-2 form-group">-->
                                        <!--    <label><b>Data final ativo:</b></label>-->
                                        <!--    <select id="dataFinalAtivo" name="dataFinalAtivo" class="js-example-basic-multiple" style="width: 100%!important" disabled>-->
                                        <!--        <option value="" selected disabled> Selecione </option>-->
                                        <!--        <option value="1">Ativo</option>-->
                                        <!--        <option value="0">Inativo</option>-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                    </div>
                                    
                                    <div class="row" style="margin-top: 2%">
                                        <!--<div class="col-md-2 form-group">-->
                                        <!--    <label><b>Preço promoção:</b></label>-->
                                        <!--    <input type="text" id="promocaoPreco" class="form-control money" placeholder="0,00" value="<?php echo $servico['produto_promocaoPreco'] ?>" readonly>-->
                                        <!--</div>-->
                                        <!--<div class="col-md-2 form-group">-->
                                        <!--    <label><b>Preço ativo:</b></label>-->
                                        <!--    <select id="promocaoAtivo" name="promocaoAtivo" class="js-example-basic-multiple" style="width: 100%!important" disabled>-->
                                        <!--        <option value="" selected disabled> Selecione </option>-->
                                        <!--        <option value="1">Ativo</option>-->
                                        <!--        <option value="0">Inativo</option>-->
                                        <!--    </select> -->
                                        <!--</div>-->
                                        <div class="col-md-2 form-group">
                                            <label><b>Desconto %:</b></label>
                                            <input type="text" id="desconto" name="desconto" class="form-control" placeholder="0%" value="<?php echo $servico['produto_desconto'] ?>" readonly>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Desconto ativo:</b></label>
                                            <select id="descontoAtivo" name="descontoAtivo" class="js-example-basic-multiple" style="width: 100%!important" disabled>
                                                <option value="" selected disabled> Selecione </option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <hr style="height: 1px; border-color: lightgrey">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label><b>Data inicial:</b></label>
                                            <input type="date" id="dataInicial" name="dataInicialCupom" class="form-control" placeholder="Data inicial" value="<?php echo $servico['produto_dataInicial_cupom'] ?>" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>Data final:</b></label>
                                            <input type="date" id="dataFinal" name="dataFinalCupom" class="form-control" placeholder="Data final" value="<?php echo $servico['produto_dataFinal_cupom'] ?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label><b>Cupom de desconto:</b></label>
                                            <input type="text" id="cupom" name="cupom" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx" value="<?php echo $servico['produto_cupom'] ?>" readonly>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Cupom ativo:</b></label>
                                            <select id="cupomAtivo" name="cupomAtivo" class="js-example-basic-multiple" style="width: 100%!important" disabled>
                                                <option value="" selected disabled> Selecione </option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div> 
                                
                                <!--<div class="tab-pane fade" id="historicos" role="tabpanel" aria-labelledby="historicos-tab">-->
                                <!--    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">-->
                                    
                                <!--    <input type="hidden" id="titulo" class="form-control">-->
                                <!--    <input type="hidden" id="comentario" class="form-control">-->
                                    
                                <!--    <div class="row" style="margin-top: 2%">-->
                                <!--        <div class="col-xl-12 form-group">-->
                                <!--            <div class="row" id="listagemHistorico">-->
        
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div> -->
                            </div>
                </div>
            </div>
        </div>
    </section>
</section>



<script>
    function adicionarPergunta(){
        var pergunta = $('#pergunta').val();

        if(pergunta != null && pergunta != "" && pergunta != " "){
            var div = '<div class="col-xl-3">' +
                    '<div class="card-servicos div-pergunta">' + 
                        '<p>'+pergunta+'</p>'+
                    '</div>'+
                '</div>';
            $('#listagemPerguntas').append(div);
            
            $('#pergunta').val('');
            $('#addPergunta').modal('hide');
        } else {
            $('#pergunta').focus();
        }
    }
</script>

<script>
    function adicionarArquivo(){
        var arquivo = $('#arquivo').val();

        if(arquivo != null && arquivo != "" && arquivo != " "){
            var div = '<div class="col-xl-3">' +
                    '<div class="card-servicos div-arquivo">' + 
                        '<p>'+arquivo+'</p>'+
                    '</div>'+
                '</div>';
            $('#listagemArquivos').append(div);
            
            $('#arquivo').val('');
            $('#addArquivo').modal('hide');
        } else {
            $('#arquivo').focus();
        }
    }
</script>

<script>
    function adicionarHistorico(){
        var titulo = $('#titulo').val();
        var comentario = $('#comentario').val();

        if(titulo != null && titulo != "" && titulo != " "){
            if(comentario != null && comentario != "" && comentario != " "){
                var div = '<div class="col-xl-4">' +
                        '<div class="card-servicos div-historico">' + 
                            '<p style="font-weight: 700; font-size: 16px;">'+titulo+'</p>'+
                            '<p>'+comentario+'</p>'+
                        '</div>'+
                    '</div>';
                $('#listagemHistorico').append(div);
                
                $('#titulo').val('');
                $('#comentario').val('');
                $('#addHistorico').modal('hide');
            } else {
                $('#comentario').focus();
            }
        } else {
            $('#titulo').focus();
        }
    }
</script>

<script type="application/javascript">
    $(document).ready(function(){
        $('.number').mask('0#');
        $('.money').mask("#.##0,00", {reverse: true});

        <?php if($servico['produto_questionario']){ ?>
            <?php foreach(explode('¬', $servico['produto_questionario']) as $a){ ?>
                $('#pergunta').val('<?php echo $a ?>');
                adicionarPergunta();
            <?php } ?>
            
            $('#pergunta').val('');
        <?php } ?>
        
        <?php if($servico['produto_upload']){ ?>
            <?php foreach(explode('¬', $servico['produto_upload']) as $a){ ?>
                $('#arquivo').val('<?php echo $a ?>');
                adicionarArquivo();
            <?php } ?>
            
            $('#arquivo').val('');
        <?php } ?>
        
        <?php if($servico['produto_historico']){ ?>
            <?php foreach(explode('¢%¢', $servico['produto_historico']) as $a){ ?>
                <?php $aux_h = explode('§%§', $a); ?>
                $('#titulo').val('<?php echo $aux_h[0] ?>');
                $('#comentario').val('<?php echo $aux_h[1] ?>');
                adicionarHistorico();
            <?php } ?>
            
            $('#titulo').val('');
            $('#comentario').val('');
        <?php } ?>
        
        <?php if($servico['produto_promocaoAtivo'] != null){ ?>
            $('#promocaoAtivo').val(<?php echo $servico['produto_promocaoAtivo'] ?>).change();
        <?php } ?>
        
        <?php if($servico['produto_descontoAtivo'] != null){ ?>
            $('#descontoAtivo').val(<?php echo $servico['produto_descontoAtivo'] ?>).change();
        <?php } ?>
        
        <?php if($servico['produto_dataFinalAtivo'] != null){ ?>
            $('#dataFinalAtivo').val(<?php echo $servico['produto_dataFinalAtivo'] ?>).change();
        <?php } ?>
        
        <?php if($servico['produto_cupomAtivo'] != null){ ?>
            $('#cupomAtivo').val(<?php echo $servico['produto_cupomAtivo'] ?>).change();
        <?php } ?>
    });
</script>
