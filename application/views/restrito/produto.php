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

<!-- SweetAlert2 -->
<link href="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css">

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
    
    .active-tab2{
       border: 1px solid lightgrey;
       border-bottom: solid white!important;
       border-radius: 3px;
    }

</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('391a027a8fef2eba4487a00156901156') ?>">Produtos</a></li>
                <li class="breadcrumb-item" aria-current="page">Adicionar</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h2 style="color: #1b9045;"><b>ADICIONAR PRODUTO teste</b></h2>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('a1f2a0b814a1fecd227400e2b74fb25f');?>" method="post" 
            enctype='multipart/form-data' id="form">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                            <div class="col-md-12">
                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link tab-li active" id="li_dados" data-target="dados" aria-controls="dados" data-fonte="li_dados" aria-selected="true">
                                            Dados
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tab-li" id="li_detalhes" data-target="detalhes" aria-controls="detalhes" data-fonte="li_detalhes" aria-selected="true">
                                            Detalhes
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tab-li" id="li_imagens" data-target="imagens" aria-controls="imagens" data-fonte="li_imagens" aria-selected="true">
                                            Imagens
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tab-li" id="li_promocoes" data-target="promocoes" aria-controls="promocoes" data-fonte="li_promocoes" aria-selected="true">
                                            Promoções
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tab-li" id="li_ligacoes" data-target="ligacoes" aria-controls="ligacoes" data-fonte="li_ligacoes" aria-selected="true">
                                            Ligações
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tab-li" id="li_opcoes" data-target="opcoes" aria-controls="opcoes" data-fonte="li_opcoes" aria-selected="true">
                                            Opções
                                        </a>
                                    </li>
                                </ul>
                                
                                
                                <div id="dados">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-6 form-group">
                                            <label><b>Nome do Produto:</b></label>
                                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do Produto" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><b>Modelo do Produto:</b></label>
                                            <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo do Produto">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label><b>Código do Produto:</b></label>
                                            <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Código do Produto" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><b>Fabricante:</b></label>
                                            <input type="text" id="fabricante" name="fabricante" class="form-control" placeholder="Fabricante">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Habilitado:</b></label><br>
                                            <input type="radio" id="habilitado_1" name="habilitado" value="1" style="display: inline" checked>
                                            &nbsp;<span><b>Sim</b></span>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="habilitado_2" name="habilitado" value="0" style="display: inline">
                                            &nbsp;<span><b>Não</b></span>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                            <label><b>Preço:</b></label>
                                            <input type="text" id="valor" name="valor" class="form-control" placeholder="0,00" required>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Venda minima:</b></label>
                                            <input type="number" value="1" class="form-control" id="minimo_venda" name="minimo_venda">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>Quantidade:</b></label>
                                            <input type="text" id="quantidade" name="quantidade" class="form-control number" placeholder="0">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>Estoque Mínimo:</b></label>
                                            <input type="text" id="minimo" name="minimo" class="form-control number" placeholder="0">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Reduzir Estoque:</b></label><br>
                                            <input type="radio" id="reduzir_1" name="reduzir" value="1" style="display: inline" checked>
                                            &nbsp;<span><b>Sim</b></span>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="reduzir_2" name="reduzir" value="0" style="display: inline">
                                            &nbsp;<span><b>Não</b></span>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                            <label><b>Unidade de Medida:</b></label>
                                            <select id="medida" name="medida" class="js-example-basic-multiple" style="width: 100%!important">
                                                <option value="m">Metro</option>
                                                <option value="cm">Centímetro</option>
                                                <option value="mm" selected>Milímetro</option>
                                                <option value='"'>Polegadas</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Comprimento:</b></label>
                                            <input type="text" id="comprimento" name="comprimento" class="form-control" placeholder="Comprimento" >
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Largura:</b></label>
                                            <input type="text" id="largura" name="largura" class="form-control number" placeholder="Largura" >
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Altura:</b></label>
                                            <input type="text" id="altura" name="altura" class="form-control number" placeholder="Altura" >
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Unidade de Peso:</b></label>
                                            <select id="un_peso" name="un_peso" class="js-example-basic-multiple" style="width: 100%!important">
                                                <option value="kg">Quilograma</option>
                                                <option value="g" selected>Grama</option>
                                                <option value="mg">Miligrama</option>
                                                <option value="lb">Libra</option>
                                                <option value="oz">Onça</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Peso:</b></label>
                                            <input type="text" id="peso" name="peso" class="form-control" placeholder="Peso" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label><b>SKU:</b></label>
                                            <input type="text" id="sku" name="sku" class="form-control" placeholder="SKU">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>NCM:</b></label>
                                            <input type="text" id="ncm" name="ncm" class="form-control" placeholder="NCM">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>CEST:</b></label>
                                            <input type="text" id="cest" name="cest" class="form-control" placeholder="CEST">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>UPC:</b></label>
                                            <input type="text" id="upc" name="upc" class="form-control" placeholder="UPC">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label><b>EAN:</b></label>
                                            <input type="text" id="ean" name="ean" class="form-control" placeholder="EAN">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>JAN:</b></label>
                                            <input type="text" id="jan" name="jan" class="form-control" placeholder="JAN">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>ISBN:</b></label>
                                            <input type="text" id="isbn" name="isbn" class="form-control" placeholder="ISBN">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>MPN:</b></label>
                                            <input type="text" id="mpn" name="mpn" class="form-control" placeholder="MPN">
                                        </div>
                                    </div>
                                    
                                    <br>
                                </div>
                                
                                <div id="detalhes" style="display: none">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-12 form-group">
                                            <label><b>Detalhes:</b></label>
                                            <div id="editor"></div>
                                            <textarea name="desc" id="desc" style="display: none"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div id="imagens" style="display: none">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="col-md-12">
                                            <ul class="nav nav-tabs" style="margin-top: 1%!important;">
                                                <li class="active-tab2" style="cursor: pointer" onclick="fprincipal()" id="li_principal" ><a>Imagem Principal</a></li>
                                                <li style="cursor: pointer" onclick="fopcionais()" id="li_opcionais" ><a>Imagens Opcionais</a></li>
                                            </ul>
                                            <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0!important; width: 100%">
                                        <div id="principal">
                                            <div class="row" style="margin-top: 2%">
                                                <div class="col-md-6 form-group" style="text-align:center; position: relative; left: 300px;">
                                                    <label><b>Imagem Principal:</b></label>
                                                    <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#imagem').click()">Inserir</button>
                                                    <input type="file" id="imagem" name="imagem" style="display: none" required>
                                                    <p id="imagem_label" class="label-imagem"></p>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 2%;">
                                                <h6 style="position: absolute; left: 15px">Permitido apenas arquivos (.jpg / .png)</h6>
                                            </div>
                                        </div>
                                        <div id="opcionais" style="display: none;">
                                            <div class="row" style="margin-top: 2%; text-align:center;">
                                                <div class="col-md-4 form-group">
                                                        <label><b>Imagem Opcional 1:</b></label>
                                                        <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#opcional1').click()">Inserir</button>
                                                        <input class="opcionais" type="file" id="opcional1" name="opcional1" style="display: none">
                                                        <p id="opcional1_label" class="label-imagem"></p>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                        <label><b>Imagem Opcional 2:</b></label>
                                                        <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#opcional2').click()">Inserir</button>
                                                        <input class="opcionais" type="file" id="opcional2" name="opcional2" style="display: none">
                                                        <p id="opcional2_label" class="label-imagem"></p>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                        <label><b>Imagem Opcional 3:</b></label>
                                                        <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#opcional3').click()">Inserir</button>
                                                        <input class="opcionais" type="file" id="opcional3" name="opcional3" style="display: none">
                                                        <p id="opcional3_label" class="label-imagem"></p>
                                                </div>
                                            </div>   
                                            <div class="row" style="margin-top: 2%; text-align:center; padding-left: 303px">
                                                <div class="col-md-4 form-group">
                                                        <label><b>Imagem Opcional 4:</b></label>
                                                        <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#opcional4').click()">Inserir</button>
                                                        <input class="opcionais" type="file" id="opcional4" name="opcional4" style="display: none">
                                                        <p id="opcional4_label" class="label-imagem"></p>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                        <label><b>Imagem Opcional 5:</b></label>
                                                        <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#opcional5').click()">Inserir</button>
                                                        <input class="opcionais" type="file" id="opcional5" name="opcional5" style="display: none">
                                                        <p id="opcional5_label" class="label-imagem"></p>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 2%;">
                                                <h6 style="position: absolute; left: 15px">Permitido apenas arquivos (.jpg / .png)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="promocoes" style="display: none">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-2 form-group">
                                            <label><b>Preço promoção:</b></label>
                                            <input type="text" id="preco_promocao" name="preco_promocao" class="form-control money" placeholder="0,00">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Preço ativo:</b></label>
                                            <select onchange="ativopromocao()" id="preco_promocao_ativo" name="preco_promocao_ativo" class="form-control" style="width: 100%!important" required>
                                                <option value="" selected disabled> Selecione </option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select> 
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Desconto %:</b></label>
                                            <input type="text" id="desconto" name="desconto" class="form-control" placeholder="0%">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Desconto ativo:</b></label>
                                            <select onchange="ativodesconto()" id="desconto_ativo" name="desconto_ativo" class="form-control" style="width: 100%!important" required>
                                                <option value="" selected disabled> Selecione </option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label><b>Data inicial:</b></label>
                                            <input type="date" id="datainicial_promocao" name="datainicial_promocao" class="form-control" placeholder="Data inicial">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>Data final:</b></label>
                                            <input type="date" id="datafinal_promocao" name="datafinal_promocao" class="form-control" placeholder="Data final">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Data final ativo:</b></label>
                                            <select id="datafinal_promocao_ativo" name="datafinal_promocao_ativo" class="form-control" style="width: 100%!important" required>
                                                <option value="" selected disabled> Selecione </option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr style="height: 1px; border-color: lightgrey">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><b>Cupom de desconto:</b></label>
                                            <input type="text" id="cupom" name="cupom" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label><b>Cupom ativo:</b></label>
                                            <select id="cupom_ativo" name="cupom_ativo" class="form-control" style="width: 100%!important" required>
                                                <option value="" selected disabled> Selecione </option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                                    
                                <div id="ligacoes" style="display: none">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-5 form-group">
                                            <label><b>Marca:</b></label>
                                            <select id="marca" name="marca" class="js-example-basic-multiple"  style="width: 100%!important;">
                                                <option value="" selected disabled> Selecione </option>
                                                <?php foreach($marcas as $m){?>
                                                    <option value="<?php echo $m['marca_id'] ?>"><?php echo $m['marca_nome'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <button type="button" style="margin-top: 24px;" class="btn btn-primary" data-toggle="modal" data-target="#addMarca">+</button>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><b>Departamentos:</b></label>
                                            <select id="departamentos" name="departamentos[]" multiple class="js-example-basic-multiple" style="width: 100%!important;">
                                                <?php foreach($departamentos as $d){?>
                                                    <option value="<?php echo $d['departamento_id'] ?>"><?php echo $d['departamento_nome'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label><b>Produtos relacionados:</b></label>
                                              <select id="relacionados" name="relacionados[]" multiple class="js-example-basic-multiple" style="width: 100%!important;">
                                                <?php foreach($produtos as $p){?>
                                                    <option value="<?php echo $p['produto_id'] ?>"><?php echo $p['produto_nome'] ?></option>
                                                <?php } ?>
                                              </select> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label><b>Variações:</b></label>
                                            <select id="variacoes" name="variacoes[]" multiple class="js-example-basic-multiple" style="width: 100%!important;">
                                                <?php foreach($produtos as $p){?>
                                                    <option value="<?php echo $p['produto_id'] ?>"><?php echo $p['produto_nome'] ?></option>
                                                <?php } ?>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="opcoes" style="display: none">
                                    <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-6 form-group">
                                            <div class="col-md-12 form-group">
                                                <label><b>Tamanhos:</b></label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTamanho">Adicionar Tamanho</button>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <select id="tamanhos" name="tamanhos[]" multiple class="js-example-basic-multiple" style="width: 100%!important;">
                                                    <?php foreach($tamanhos as $t){?>
                                                        <option value="<?php echo $t['opcao_id'] ?>"><?php echo $t['opcao_nome'] ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 form-group">
                                            <div class="col-md-12 form-group">
                                                <label><b>Cores:</b></label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCor">Adicionar Cor</button>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <select id="cores" name="cores[]" multiple class="js-example-basic-multiple" style="width: 100%!important;">
                                                    <?php foreach($cores as $c){?>
                                                        <option value="<?php echo $c['opcao_id'] ?>"><?php echo $c['opcao_nome'] ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center form-group">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" id="submitbtn" class="btn btn-primary" onclick="formSubmit()">Adicionar</button>
                                        &nbsp;&nbsp;
                                        <a href="<?php echo base_url('391a027a8fef2eba4487a00156901156') ?>" style="margin-right: 15px;" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

<div class="modal fade" id="addMarca" tabindex="-1" role="dialog" aria-labelledby="addMarca" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, rgba(27, 144, 69) 0%, rgba(36, 189, 91) 70%);">
        <h4 class="modal-title" style="color: white; display: inline;">ADICIONAR MARCA</h4>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label><b>Nome da marca: </b></label>
                        <input type="text" id="nomeMarca" name="nomeMarca" class="form-control" value="" required>
                    </div>    
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="adicionarMarca()">Adicionar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addTamanho" tabindex="-1" role="dialog" aria-labelledby="addMarca" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, rgba(27, 144, 69) 0%, rgba(36, 189, 91) 70%);">
        <h4 class="modal-title" style="color: white; display: inline;">ADICIONAR TAMANHO</h4>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label><b>Tamanho: </b></label>
                        <input type="text" id="tamanho_nome" name="tamanho_nome" class="form-control" value="" required>
                    </div>    
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="addTamanho()">Adicionar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addCor" tabindex="-1" role="dialog" aria-labelledby="addCor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, rgba(27, 144, 69) 0%, rgba(36, 189, 91) 70%);">
        <h4 class="modal-title" style="color: white; display: inline;">ADICIONAR COR</h4>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label><b>Nome da cor: </b></label>
                        <input type="text" id="cor_nome" name="cor_nome" class="form-control" value="" required>
                    </div>    
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="addCor()">Adicionar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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

<!-- Theme included stylesheets preco_promocao_ativo-->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
<!-- sweetalert2 -->
<script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>"></script>


<script>
    function formSubmit(){
        if(validacaoServico('li_dados', 'nome', 'Digite o nome do produto')){
            if(validacaoServico('li_dados', 'codigo', 'Digite o código de produto')){
                if(validacaoServico('li_dados', 'valor', 'Digite o valor do produto')){
                    if(validacaoServico('li_imagens', 'imagem', 'Insera a imagem do produto')){
                        if(validacaoServico('li_promocoes', 'preco_promocao_ativo', 'Defina o status de preço promoção')){
                            if(validacaoServico('li_promocoes', 'desconto_ativo', 'Defina o status de desconto')){
                                if(validacaoServico('li_promocoes', 'datafinal_promocao_ativo', 'Defina o status de data final do desconto')){
                                    if(validacaoServico('li_promocoes', 'cupom_ativo', 'Defina o status de cupom')){
                                        $('#form').submit();
                                    }
                                }
                            }
                        }
                    }
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
        
        [{ 'align': [] }],
        
        ['clean']
    ];
    
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
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
    });
</script>

<script>
    $(".tab-li").click(function(){
        $(".tab-li").each(function(){
            var tg = $(this).data('target');
            var ft = $(this).data('fonte');
            
            $('#'+tg).hide();
            $('#'+ft).removeClass('active');
        });
        
        var tg = $(this).data('target');
        var ft = $(this).data('fonte');
        
        $('#'+tg).show();
        $('#'+ft).addClass('active');
    });
    
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
    
    $('.opcionais').on('change', function(){
        if($(this).val() != ""){
            var numFiles = $(this).get(0).files.length;
            if(parseInt(numFiles) == 1){
                var fullPath = $(this).val();
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var frase = fullPath.substring(startIndex);
                if (frase.indexOf('\\') === 0 || frase.indexOf('/') === 0) {
                    frase = frase.substring(1);
                }
                frase = "Selecionado: "+frase;
            }else{
                var frase = 'Selecionados: '+numFiles+' itens';
            }
            $(this).next().css('display', 'block').html(frase);
        }else{
            $(this).next().css('display', 'none');
        }
    });
    
    $('#form').submit(function(e){
        $('#desc').html($('#editor').find('.ql-editor').html());
    });
</script>

<script>
    function ativopromocao(){
        if($('#preco_promocao_ativo').val() == 1){
            if($('#desconto_ativo').val() == 1){
                $('#desconto_ativo').val(0).change();
            }
        }
    }
</script>

<script>
    function ativodesconto(){
        if($('#desconto_ativo').val() == 1){
            if($('#preco_promocao_ativo').val() == 1){
                $('#preco_promocao_ativo').val(0).change();
            }
        }
    }
</script>

<script>
    function fprincipal(){
        $('#opcionais').hide();
        $('#principal').show();
        $('#li_opcionais').removeClass("active-tab2");
        $('#li_principal').addClass("active-tab2");
    }
</script>

<script>
    function fopcionais(){
        $('#opcionais').show();
        $('#principal').hide();
        $('#li_principal').removeClass("active-tab2");
        $('#li_opcionais').addClass("active-tab2");
    }
</script>

<script>
    function adicionarMarca(){
        dados = new FormData();
        dados.append('nome', $('#nomeMarca').val());
        $.ajax({
            url: '<?php echo base_url('admin/adminmarcas/dinamicoAdicionarMarca'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                var option = "<option value='"+data.id+"'>" + data.nome + "</option>";
                $('#marca').append(option);
                $('#addMarca').modal('hide');
                $('#marca').focus();
            },
        }); 
    }
</script>

<script>
    function addTamanho(){
        dados = new FormData();
        dados.append('nome', $('#tamanho_nome').val());
        dados.append('categoria', 'Tamanho');
        
        $.ajax({
            url: '<?php echo base_url('admin/adminopcoes/dinamicoAdicionarOpcao'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                var option = "<option value='"+data.id+"' selected>" + data.nome + "</option>";
                $('#tamanhos').append(option);
                $('#addTamanho').modal('hide');
                $('#tamanhos').focus();
            },
        }); 
    }
</script>

<script>
    function addCor(){
        dados = new FormData();
        dados.append('nome', $('#cor_nome').val());
        dados.append('categoria', 'Cor');
        
        $.ajax({
            url: '<?php echo base_url('admin/adminopcoes/dinamicoAdicionarOpcao'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                var option = "<option value='"+data.id+"' selected>" + data.nome + "</option>";
                $('#cores').append(option);
                $('#addCor').modal('hide');
                $('#cores').focus();
            },
        }); 
    }
</script>