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
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/adminservicos/servicos') ?>">Serviços</a></li>
                <li class="breadcrumb-item" aria-current="page">Edição</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Edição Serviço</p>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('admin/adminservicos/updateServico');?>" method="post" enctype='multipart/form-data' id="form">
                <input type="hidden" name="id" value="<?php echo $servico['produto_id'] ?>">
                
                <input type="hidden" id="questionario" name="questionario">
                <input type="hidden" id="upload" name="upload">
                <!--<input type="hidden" id="historico" name="historico">-->
                
                <input type="hidden" name="imagem1_verifica" value="<?php echo $servico['produto_imagem1'] ?>">
                <input type="hidden" name="imagem2_verifica" value="<?php echo $servico['produto_imagem2'] ?>">
                <input type="hidden" name="video_verifica" value="<?php echo $servico['produto_video'] ?>">
                
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
                                        <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Digite o código do serviço" value="<?php echo $servico['produto_codigo'] ?>" <?php if($func == "edita" || $func == "cadastro"){ echo "required";}else{ echo "readonly";}?>>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label><b>Título:</b></label>
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o título do serviço"  value="<?php echo $servico['produto_nome'] ?>" <?php if($func == "edita" || $func == "cadastro"){ echo "required";}else{ echo "readonly";}?>>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>Sub Título:</b></label>
                                        <input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Digite o sub título do serviço"  value="<?php echo $servico['produto_subtitulo'] ?>" <?php if($func == "edita" || $func == "cadastro"){ echo "required";}else{ echo "readonly";}?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label><b>Valor:</b></label>
                                        <input type="text" id="valor" name="valor" class="valor form-control" placeholder="Digite o valor do serviço" value="<?php echo $servico['produto_valor'] ?>" <?php if($func == "edita" || $func == "cadastro"){ echo "required";}else{ echo "readonly";}?>>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Possui Pré-requisito</b></label><br>
                                        <input <?php if($servico['produto_livre'] == 0){echo "checked";}?> onclick="Requisito(0)" type="radio" name="requisito" value="0" style="display: inline;height: 20px;width: 20px;" <?php if($func != "edita" && $func != "cadastro"){ echo "disabled";}?>>
                                        &nbsp;<span><b>Sim</b></span>
                                        &nbsp;&nbsp;&nbsp;
                                        <input <?php if($servico['produto_livre'] == 1){echo "checked";}?> onclick="Requisito(1)" type="radio" name="requisito" value="1" style="display: inline;height: 20px;width: 20px;" <?php if($func != "edita" && $func != "cadastro"){ echo "disabled";}?>>
                                        &nbsp;<span><b>Não</b></span>
                                    </div>
                                <div id="requisito_div" class="col-md-3 form-group" <?php if($servico['produto_livre'] == 1){echo "style='content-visibility:hidden;'";}?>>
                                    <label><b>Serviço Requisitado:</b></label>
                                    <select id="requisitoNecessarioId" name="requisitoNecessarioId" class="js-example-basic-multiple" style="width: 100%!important">
                                        <option value="" disabled> Selecione o Serviço</option>
                                        <?php foreach($servicos as $ser){?>
                                            <option <?php if($servico['produto_requisito'] == $ser['id']){echo "selected";}?> value="<?php echo $ser['id'];?>"> <?php echo $ser['nome'];?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Habilitado:</b></label><br>
                                        <input type="radio" name="habilitado" value="1" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 1) { echo 'checked'; }?> <?php if($func != "edita" && $func != "cadastro"){ echo "disabled";}?>>
                                        &nbsp;<span><b>Sim</b></span>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="habilitado" value="0" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 0) { echo 'checked'; }?> <?php if($func != "edita" && $func != "cadastro"){ echo "disabled";}?>>
                                        &nbsp;<span><b>Não</b></span>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <!--<label><b>Visível:</b></label><br>-->
                                        <input type="hidden" name="visivel" value="1" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 1) { echo 'checked'; }?>>
                                        <!--&nbsp;<span><b>Sim</b></span>-->
                                        &nbsp;&nbsp;&nbsp;
                                        <!--<input type="radio" name="visivel" value="0" style="display: inline;height: 20px;width: 20px;" <?php if($servico['produto_habilitado'] == 0) { echo 'checked'; }?>>-->
                                        <!--&nbsp;<span><b>Não</b></span>-->
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label><b>Breve Resumo:</b></label>
                                        <textarea id="resumo" name="resumo" class="form-control" placeholder="Digite o breve resumo do serviço" <?php if($func == "edita" || $func == "cadastro"){ echo "required";}else{ echo "readonly";}?>><?php echo $servico['produto_resumo'] ?></textarea>
                                    </div>
                                </div>
                                
                                <br>
                            </div>
                            
                            <style>
                                .contact-firstcol {  
                                    width:100px;
                                    font-size:17px;
                                    letter-spacing:2px;
                                    border:1px solid white;
                                    vertical-align: top;
                                }  
                            </style>
                            
                            <div class="tab-pane fade" id="detalhes" role="tabpanel" aria-labelledby="detalhes-tab" style="margin-bottom: 7%;">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-12 ">
                                        <label><b>Detalhes:</b></label>
                                        <div id="editor"><?php echo $servico['produto_detalhes'] ?></div>
                                        <textarea name="desc" id="desc" style="display: none"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="imagens" role="tabpanel" aria-labelledby="imagens-tab">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-6 form-group">
                                        <label><b>1° Imagem:</b></label><br>
                                        
                                        <?php if($servico['produto_imagem1']){ ?>
                                            <div class="text-center" style="padding-bottom: 2%;">
                                                <img src="<?php echo $servico['produto_imagem1'] ?>" height="auto" width="400"><br>
                                                <label style="margin-top: 2%;"><b> Imagem PNG | Formato: 500x500px</b></label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="text-center" style="padding-bottom: 2%;">
                                                <p style="font-size: 20px; font-weight: 600">Não foi colocado 1° Imagem</p><br>
                                                <label style="margin-top: 2%;"><b> Imagem PNG | Formato: 500x500px</b></label>
                                            </div>
                                        <?php } ?>
                                        
                                        <button type="button" class="btn btn-primary" style="width: 20%; position: relative; left: 37%;" onclick="$('#imagem1').click()">Inserir</button>
                                        <a class="btn btn-danger" href="/admin/adminservicos/delete?produto_id=<?php echo $servico['produto_id'] ?>&field=produto_imagem1" style="position: relative; left: 37%;">x</a>
                                        <input type="file" id="imagem1" name="imagem1" style="display: none" <?php if($func == "edita" || $func == "cadastro"){ echo "required";}else{ echo "readonly";}?>>
                                        <p id="imagem_label" class="label-imagem"></p>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label><b>2° Imagem:</b></label><br>
                                        
                                        <?php if($servico['produto_imagem2']){ ?>
                                            <div class="text-center" style="padding-bottom: 2%;">
                                                <img src="<?php echo $servico['produto_imagem2'] ?>" height="auto" width="400"><br>
                                                <label style="margin-top: 2%;"><b> Imagem PNG | Formato: 500x500px</b></label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="text-center" style="padding-bottom: 2%;">
                                                <p style="font-size: 20px; font-weight: 600">Não foi colocado 2° Imagem</p><br>
                                                <label style="margin-top: 2%;"><b> Imagem PNG | Formato: 500x500px</b></label>
                                            </div>
                                        <?php } ?>
                                        
                                        <button type="button" class="btn btn-primary" style="width: 20%; position: relative; left: 37%;" onclick="$('#imagem2').click()">Inserir</button>
                                        <a class="btn btn-danger" href="/admin/adminservicos/delete?produto_id=<?php echo $servico['produto_id'] ?>&field=produto_imagem2" style="position: relative; left: 37%;">x</a>
                                        <input type="file" id="imagem2" name="imagem2" style="display: none" <?php if($func == "edita" || $func == "cadastro"){ echo "required";}else{ echo "readonly";}?>>
                                        <p id="opcionais_label" class="label-imagem"></p>
                                    </div>
                                    <br><br>
                                    
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-6 form-group">
                                        <label><b>Vídeo:</b></label>
                                        
                                        <?php if($servico['produto_video']){ ?>
                                            <div class="text-center">
                                                <video style="width: auto; height: 220px;" controls>
                                                  <source src="<?php echo $servico['produto_video'] ?>" type="video/mp4">
                                                  Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        <?php } else { ?>
                                            <div class="text-center">
                                                <p style="font-size: 20px; font-weight: 600">Não foi colocado Vídeo</p>
                                            </div>
                                        <?php } ?>
                                        <br>
                                        <label style="margin-left: 10%; margin-bottom: 3%;"><b> Permitido apenas vídeo com extensão .mp4 e com tamanho máximo de 50 MB. </b></label><br>
                                        <button type="button" class="btn btn-primary"  style="width: 20%; position: relative; left: 37%;" onclick="$('#video').click()">Inserir</button>
                                        <a class="btn btn-danger" href="/admin/adminservicos/delete?produto_id=<?php echo $servico['produto_id'] ?>&field=produto_video" style="position: relative; left: 37%;">x</a>
                                        <input type="file" id="video" name="video" accept="video/*" style="display: none">
                                        <br><br>
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="tab-pane fade" id="questionarios" role="tabpanel" aria-labelledby="questionarios-tab">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 2%;">
                                    
                                    <div class="col-md-12 form-group table-responsive">
                                        <label><h3> Defina o seu questionário: </h3></label>
                                            <table style="width: 100%" class="table c-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 70%"> Pergunta </th>
                                                        <th class="text-center" style="width: 15%"> Posição </th>
                                                        <th class="text-center" style="width: 15%"> Ação </th>
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
                                                            <td><input class="form-control" style="width: 100%;" type="text" name="questionario<?php echo $count ?>" id="questionario<?php echo $count ?>" value="<?php echo $pgta[$count] ?>"></td>
                                                            <td>
                                                                <select class="form-control" name="posicao-frase<?php echo $count ?>" id="posicao-frase<?php echo $count ?>" style="width: 100%" disabled>
                                                                    <option value="<?php echo $contador ?>" selected>  Posição <?php echo $contador ?> </option>
                                                                </select>
                                                            </td>
                                                            <td style="color: #4da751; padding-top: 18px;" id="botaoexcluir" class="text-center">
                                			                    <a style="color: #4da751" onclick="excluirQuest(<?php echo $count ?>)"><i style="padding-left: 12px; font-size: 25px; cursor: pointer;" class="fa fa-trash" aria-hidden="true"></i></a>
                                			                </td>
                                                        </tr>
                                                    <?php $count++; }?>
                                                </tbody>
                                            </table>
                                    
                                        <button class="btn btn-primary" onclick="addPergunta()" style="margin-left: 1%;"> Adicionar Pergunta </button>
                                    
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal ver frase -->
                            
                            <script>
                                function verfrase(){
                                    $('#ver-frase').modal('show');
                                }
                            </script>
                            
                            <div class="modal fade" id="ver-frase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Pergunta </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row" stle="margin: 0 10px">
                                        <div class="col-xl-12">
                                            <label><b>Pergunta</b></label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <!-- Fim modal ver frase -->    
                                
                            <div class="tab-pane fade" id="uploads" role="tabpanel" aria-labelledby="uploads-tab">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-12 form-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addArquivo">Adicionar Upload</button>
                                    </div>
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
                                        <input type="date" id="dataInicial" name="dataInicial" class="form-control" placeholder="Data inicial" value="<?php echo $servico['produto_dataInicial'] ?>">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Data final:</b></label>
                                        <input type="date" id="dataFinal" name="dataFinal" class="form-control" placeholder="Data final" value="<?php echo $servico['produto_dataFinal'] ?>">
                                    </div>
                                    <!--
                                    <div class="col-md-2 form-group">
                                        <label><b>Data final ativo:</b></label>
                                        <select id="dataFinalAtivo" name="dataFinalAtivo" class="js-example-basic-multiple" style="width: 100%!important">
                                            <option value="" selected disabled> Selecione </option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                    -->
                                </div>
                                <div class="row" style="margin-top: 2%">
                                    <!-- 
                                    <div class="col-md-2 form-group">
                                        <label><b>Preço promoção:</b></label>
                                        <input type="text" id="promocaoPreco" name="promocaoPreco" class="form-control money" placeholder="0,00" value="<?php echo $servico['produto_promocaoPreco'] ?>">
                                    </div>
                                    
                                    <div class="col-md-2 form-group">
                                        <label><b>Preço ativo:</b></label>
                                        <select onchange="ativopromocao()" id="promocaoAtivo" name="promocaoAtivo" class="js-example-basic-multiple" style="width: 100%!important">
                                            <option value="" selected disabled> Selecione </option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select> 
                                    </div>
                                    -->
                                    <div class="col-md-2 form-group">
                                        <label><b>Desconto %:</b></label>
                                        <input type="text" id="desconto" name="desconto" class="form-control" placeholder="0%" value="<?php echo $servico['produto_desconto'] ?>">
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Desconto ativo:</b></label>
                                        <select onchange="ativodesconto(this)" id="descontoAtivo" class="form-control" name="descontoAtivo" style="width: 100%!important">
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
                                        <input type="date" id="dataInicial" name="dataInicialCupom" class="form-control" placeholder="Data inicial" value="<?php echo $servico['produto_dataInicial_cupom'] ?>">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Data final:</b></label>
                                        <input type="date" id="dataFinal" name="dataFinalCupom" class="form-control" placeholder="Data final" value="<?php echo $servico['produto_dataFinal_cupom'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label><b>Cupom de desconto:</b></label>
                                        <input type="text" id="cupom" name="cupom" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx" value="<?php echo $servico['produto_cupom'] ?>">
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Cupom ativo:</b></label>
                                        <select id="cupomAtivo" onchange="ativocupom(this)" name="cupomAtivo" class="form-control" style="width: 100%!important">
                                            <option value="" selected disabled> Selecione </option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            
                            <!--<div class="tab-pane fade" id="historicos" role="tabpanel" aria-labelledby="historicos-tab">-->
                            <!--    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">-->
                            <!--    <div class="row" style="margin-top: 2%">-->
                                    
                            <!--        <div class="col-md-12 form-group table-responsive">-->
                            <!--            <label><h3> Lista: </h3></label>-->
                            <!--                <table style="width: 100%" class="table c-table">-->
                            <!--                    <thead>-->
                            <!--                        <tr>-->
                            <!--                            <th class="text-center" style="width: 50%"> Histórico </th>-->
                            <!--                            <th class="text-center" style="width: 20%"> Comentário </th>-->
                            <!--                            <th class="text-center" style="width: 15%"> Posição </th>-->
                            <!--                            <th class="text-center" style="width: 15%"> Ação </th>-->
                            <!--                        </tr>-->
                                                <!--</thead>-->
                                                <?php 
                                                //     $teste = array(
                                                //     $a = 1,
                                                //     $b = 2,
                                                //     $c = 3,
                                                //     $d = 4,
                                                //     $e = 5,
                                                // ); $count = 1; ?>
                                                <!--<tbody>-->
                                                    <?php //foreach($teste as $t){ ?>
                            <!--                            <tr class="tr-check" id="listaHist">-->
                            <!--                                <td><input class="form-control" style="width: 100%;" type="text" id="titulo" value="<?php echo $count ?>" placeholder="Pergunta"></td>-->
                            <!--                                <td><input class="form-control" style="width: 100%;" type="text" id="comentario" value="<?php echo $count ?>" placeholder="Comentário"></td>-->
                            <!--                                <td>-->
                            <!--                                    <select class="form-control" name="posicao-frase" id="posicao-frase" style="width: 100%">-->
                            <!--                                        <option value="1">  Posição 1  </option>-->
                            <!--                                        <option value="2">  Posição 2  </option>-->
                            <!--                                        <option value="3">  Posição 3  </option>-->
                            <!--                                        <option value="4">  Posição 4  </option>-->
                            <!--                                        <option value="5">  Posição 5  </option>-->
                            <!--                                        <option value="6">  Posição 6  </option>-->
                            <!--                                        <option value="7">  Posição 7  </option>-->
                            <!--                                        <option value="8">  Posição 8  </option>-->
                            <!--                                        <option value="9">  Posição 9  </option>-->
                            <!--                                        <option value="10"> Posição 10 </option>-->
                            <!--                                    </select>-->
                            <!--                                </td>-->
                            <!--                                <td style="color: #4da751; padding-top: 18px;" class="text-center"> -->
                                                                <!--<i onclick="verhistorico()" data-toggle="modal" data-target="#ver-historico" style="font-size: 25px; cursor: pointer;" class="fa fa-eye" aria-hidden="true"></i>-->
                                			                    <!--<a style="color: #4da751" href="<?php echo base_url('') ?>"><i style="padding-left: 12px; font-size: 25px; cursor: pointer;" class="fa fa-pencil" aria-hidden="true"></i></a>-->
                            <!--    			                    <a style="color: #4da751" onclick="excluirHistorico(3)"><i style="padding-left: 12px; font-size: 25px; cursor: pointer;" class="fa fa-trash" aria-hidden="true"></i></a>-->
                            <!--    			                </td>-->
                            <!--                            </tr>-->
                            <!--                        <?php //$count++; } ?>-->
                            <!--                    </tbody>-->
                            <!--                </table>-->
                                    
                            <!--        <div class="col-md-12 form-group">-->
                            <!--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHistorico">Adicionar Historico</button>-->
                            <!--        </div>-->
                                    
                            <!--        </div>-->
                                    
                            <!--    </div>-->
                            <!--</div> -->
                            
                            <!-- Modal ver frase -->
                            
                            <script>
                                // function verhistorico(){
                                //     $('#ver-historico').modal('show');
                                // }
                            </script>
                            
                            <!--<div class="modal fade" id="ver-historico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                            <!--  <div class="modal-dialog" role="document">-->
                            <!--    <div class="modal-content">-->
                            <!--      <div class="modal-header">-->
                            <!--        <h5 class="modal-title" id="exampleModalLabel"> Histórico </h5>-->
                            <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                            <!--          <span aria-hidden="true">&times;</span>-->
                            <!--        </button>-->
                            <!--      </div>-->
                            <!--      <div class="modal-body">-->
                            <!--        <div class="row" stle="margin: 0 10px">-->
                            <!--            <div class="col-xl-12">-->
                            <!--                <label><b>Histórico</b></label>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--      </div>-->
                            <!--    </div>-->
                            <!--  </div>-->
                            <!--</div>-->
                            
                            <!-- Fim modal ver frase -->  
                            
                            <div class="row" style="margin-top: 0%">
                                <div class="col-md-12 text-right form-group">
                                    <button type="button" class="btn btn-primary" onclick="formSubmit()">Salvar</button>
                                    &nbsp;&nbsp;
                                    <a href="<?php echo base_url('admin/adminservicos/servicos') ?>" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                                    
                    </div>
                </div>
                    
            </form>
        </div>
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="addPergunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" stle="margin: 0 10px">
            <div class="col-xl-12">
                <label><b>Pergunta</b></label>
                <textarea style="height: 130px;" id="pergunta" class="form-control"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="adicionarPergunta()">Adicionar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addArquivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" stle="margin: 0 10px">
            <div class="col-xl-12">
                <label><b>Proposito do arquivo</b></label>
                <textarea style="height: 130px;" id="arquivo" class="form-control"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="adicionarArquivo()">Adicionar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addHistorico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Histórico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" stle="margin: 0 10px">
            <div class="col-xl-12 form-group">
                <label><b>Título</b></label>
                <input type="text" id="titulo" class="form-control">
            </div>
            <div class="col-xl-12 form-group">
                <label><b>Comentário</b></label>
                <textarea style="height: 130px;" id="comentario" class="form-control"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="adicionarHistorico()">Adicionar</button>
      </div>
    </div>
  </div>
</div>

<style>
    .ql-snow .ql-picker.ql-size .ql-picker-label::before { content: attr(data-value)!important; }
    .ql-snow .ql-picker.ql-size .ql-picker-item::before { font-size: attr(data-value)!important; content: attr(data-value)!important; }
    .ql-picker-label .custom-content::before { content: attr(data-value)!important; }
    #editor{
        min-height: 300px;
    }
</style>

<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

<script src="<?php echo base_url('vendor/quill-image-resize-module-master/image-resize.min.js') ?>"></script>


<script>
    function formSubmit(){
        var questionario = "";
        
        $('.div-pergunta').each(function(){
            if(questionario == ""){
                questionario = $(this).children().html();
            } else {
                questionario = questionario + "¬" + $(this).children().html();
            }
        });
        
        $('#questionario').val(questionario);
        
        var upload = "";
        
        $('.div-arquivo').each(function(){
            if(upload == ""){
                upload = $(this).children().html();
            } else {
                upload = upload + "¬" + $(this).children().html();
            }
        });
        
        $('#upload').val(upload);
        
        var historico = "";
        
        $('.div-historico').each(function(){
            if(historico == ""){
                historico = $(this).children().first().html() + "§%§" + $(this).children().first().next().html();
            } else {
                historico = historico + "¢%¢" + $(this).children().first().html() + "§%§" + $(this).children().first().next().html();
            }
        });
        
        $('#historico').val(historico);
        
        if(validacaoServico('dados-tab', 'codigo', 'Digite o código de serviço')){
            if(validacaoServico('dados-tab', 'nome', 'Digite o nome do serviço')){
                if(validacaoServico('dados-tab', 'valor', 'Digite o valor do serviço')){
                    $('#form').submit();
                }
            }
        }
    }
    
    function validacaoServico(tab, id, mensagem){
        if($('#'+id).val() == null || $('#'+id).val() == "" || $('#'+id).val() == " "){

            $('#'+tab).click();
            
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            
            Toast.fire({
                icon: 'error',
                title: mensagem,
            })
            
            $('#'+id).focus();
            
            return false;
        } else {
            return true;
        }
    }
</script>


<!--
<script>
    function adicionarPergunta(){
        var pergunta = $('#pergunta').val();

        if(pergunta != null && pergunta != "" && pergunta != " "){
            var div = '<div class="col-xl-3">' +
                          '<div class="card-servicos div-pergunta">' + 
                              '<label>'+pergunta+'</label>'+
                              '<i class="x-card-servicos x-pergunta fa fa-times" aria-hidden="true" onclick="excluirPergunta(this)"></i>'+
                              '<br><br><buttom type="buttom" class="btn btn-primary" onclick="editarPergunta(this)" id="edita-questionario">Editar Frase</buttom>'+
                          '</div>'+
                      '</div>';
            $('#listagemPerguntas').append(div);
            
            $('#pergunta').val('');
            $('#addPergunta').modal('hide');
        } else {
            $('#pergunta').focus();
        }
    }
    
    function excluirPergunta(local){
        $(local).parent().parent().delay(5000).remove();
    }
</script>
-->

<script>
    function adicionarArquivo(){
        var arquivo = $('#arquivo').val();

        if(arquivo != null && arquivo != "" && arquivo != " "){
            var div = '<div class="col-xl-3">' +
                    '<div class="card-servicos div-arquivo">' + 
                        '<p>'+arquivo+'</p>'+
                        '<i class="x-card-servicos x-arquivo fa fa-times" aria-hidden="true" onclick="excluirArquivo(this)"></i>'+
                    '</div>'+
                '</div>';
            $('#listagemArquivos').append(div);
            
            $('#arquivo').val('');
            $('#addArquivo').modal('hide');
        } else {
            $('#arquivo').focus();
        }
    }
    
    function excluirArquivo(local){
        $(local).parent().parent().delay(5000).remove();
    }
</script>

<script>
    var gbl_cont = 0;

    function adicionarHistorico(){
        var titulo = $('#titulo').val();
        var comentario = $('#comentario').val();
        

        if(titulo != null && titulo != "" && titulo != " "){
            if(comentario != null && comentario != "" && comentario != " "){
                var div = '<div class="col-xl-4">' +
                        '<div id="id_'+gbl_cont+'" ondragstart="drag(event, this)" ondrop="drop(event, this)" ondragover="allowDrop(event, this)" style="cursor: move" draggable="true" class="card-servicos div-historico">' + 
                            '<p style="font-weight: 700; font-size: 16px;">'+titulo+'</p>'+
                            '<p>'+comentario+'</p>'+
                            '<i class="x-card-servicos x-historico fa fa-times" aria-hidden="true" onclick="excluirHistorico(this)"></i>'+
                        '</div>'+
                    '</div>';
                $('#listagemHistorico').append(div);
                
                $('#titulo').val('');
                $('#comentario').val('');
                $('#addHistorico').modal('hide');
                
                gbl_cont++;
            } else {
                $('#comentario').focus();
            }
        } else {
            $('#titulo').focus();
        }
    }
    
    function excluirHistorico(local){
        $(local).parent().parent().delay(5000).remove();
    }
</script>

<script>
    const sizes = ['10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px'];
    
    var Size = Quill.import('attributors/style/size');
    Size.whitelist = sizes;
    Quill.register(Size, true);
    
    var toolbarOptions = [
        [{ 'size': sizes }],
        [{ 'font': [] }],
        
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        
        ['blockquote', 'code-block'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        
        [{ 'indent': '-1'}, { 'indent': '+1' }],
        
        [{ 'color': [] }, { 'background': [] }],
        
        [ 'link', 'image', 'video', 'formula' ], 
        
        [{ 'align': [] }],
        
        ['clean']
    ];
    
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions,
            imageResize: {},
        },
        theme: 'snow'
    });
    
    $('.ql-picker-item').click(function(){
        $('.ql-picker-label').addClass('custom-content').attr('data-content', $(this).data('value'));
    });
</script>

<script type="application/javascript">
    $(document).ready(function(){
        $('.number').mask('0#');
        $('.money').mask("#.##0,00", {reverse: true});
        
        $('.ql-picker-item').each( function(){
            if($(this).data('value') == "14px"){
                $(this).click();
            }
        });
        
        /*
        <?php //if($servico['produto_questionario']){ ?>
            <?php //foreach(explode('¬', $servico['produto_questionario']) as $a){ ?>
                $('#pergunta').val('<?php //echo $a ?>');
                adicionarPergunta();
            <?php //} ?>
            
            $('#pergunta').val('');
        <?php //} ?>
        */
        
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

<script>
    
    $('#imagem').on('change', function(){
        if($(this).val() != ""){
            var fullPath = $('#imagem').val();
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            $('#imagem_label').css('display', 'block').html('Selecionado: '+filename);
        }else{
            $('#imagem_label').css('display', 'none');
        }
    });
    
    $('#opcionais').on('change', function(){
        if($(this).val() != ""){
            var numFiles = $(this).get(0).files.length;
            if(parseInt(numFiles) == 1){
                var fullPath = $('#opcionais').val();
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var frase = fullPath.substring(startIndex);
                if (frase.indexOf('\\') === 0 || frase.indexOf('/') === 0) {
                    frase = frase.substring(1);
                }
                frase = "Selecionado: "+frase;
            }else{
                var frase = 'Selecionados: '+numFiles+' itens';
            }
            $('#opcionais_label').css('display', 'block').html(frase);
        }else{
            $('#opcionais_label').css('display', 'none');
        }
    });
    
    $('#form').submit(function(e){
        let desc = $("#editor .ql-editor").html().replace('<span class="ql-cursor">﻿</span>', '');
        $('#desc').html(desc);
        
    });
</script>

<script>
    function ativocupom(el){
       if($(el).val() == 1){
            $("#descontoAtivo").val(0);
        }
    }
    
</script>

<script>
    function ativodesconto(el){
        if($(el).val() == 1){
            $("#cupomAtivo").val(0);
        }
            
      
    }
</script>

<script>
    function allowDrop(e, teste) {
        e = e||window.event;
        
        $(teste).fadeIn().delay(500);

        e.preventDefault();
    }
    
    function drag(e, teste) {
        e = e||window.event;
        
        $(teste).fadeOut().delay(50);
    
        e.dataTransfer.setData("text", e.target.id);
    }
    
    function drop(e, teste) {
        e = e||window.event;
        e.preventDefault();
        
        var data = e.dataTransfer.getData("text");
        
        var antigoTitulo        = $('#'+data).children().first().html();
        var antigoComentario    = $('#'+data).children().first().next().html();
        
        var novoTitulo          = $(teste).children().first().html();
        var novoComentario      = $(teste).children().first().next().html();
        
        $(teste).children().first().html(antigoTitulo);
        $(teste).children().first().next().html(antigoComentario);
        
        $('#'+data).children().first().html(novoTitulo);
        $('#'+data).children().first().next().html(novoComentario);
        
        $(teste).fadeIn().delay(50);
        $('#'+data).fadeIn().delay(50);
    }
</script>
<script>
    function Requisito(id){
        var element = document.getElementById('requisito_div');
        
        if(id == 0){
            element.style.removeProperty("content-visibility");
        }else{
            element.style.setProperty("content-visibility", "hidden");
        }
    }
</script>

<script>
    function excluirQuest(id){
        document.getElementById('listaServ'.concat(id)).remove()
    }
</script>

<script>
    function excluirHist(id){
        document.getElementById('listaHist'.concat(id)).remove()
    }
</script>

<script>

    count = <?php echo $count ?>;
    
</script>

<script>
    function addPergunta(){
        var aux = count - 1;
        var aux2 = count + 1;
        var pergunta = $('#questionario'.concat(aux)).val();
        
        if(pergunta != "" && pergunta != " "){
            var div =   '<tr class="tr-check" id="listaServ'+count+'">' +
                            '<td><input class="form-control" style="width: 100%;" type="text" id="questionario'+count+'" name="questionario'+count+'" placeholder="Pergunta"></td>' +
                            '<td>' +
                                '<select class="form-control" name="posicao-frase'+count+'" id="posicao-frase'+count+'" style="width: 100%">' +
                                    '<option value="'+aux2+'">  Posição '+aux2+'  </option>' +
                                '</select>' +
                            '</td>' +
                            '<td>' +
                                '<a style="color: #4da751" id="botaoexcluir'+count+'" onclick="excluirQuest('+count+')"><i style="padding-left: 75px; font-size: 25px; cursor: pointer;" class="fa fa-trash" aria-hidden="true"></i></a>' +
                            '</td>'+
                        '</tr>';
                              
                var d1 = document.getElementById('listaServ'.concat(aux));
                count++;
               
            d1.insertAdjacentHTML('afterend', div);
            
        } else {
            $('#pergunta').focus();
        }    }       
</script>