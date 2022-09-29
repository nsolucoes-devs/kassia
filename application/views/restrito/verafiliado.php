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
        border: 1px solid #eaeaea;
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
                <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/adminafiliados/afiliados') ?>">Afiliados</a></li>
                <li class="breadcrumb-item" aria-current="page">Visualização</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Visualização de Afiliado</p>
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="<?php echo base_url('admin/adminafiliados/afiliados') ?>">
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
                            <a class="nav-link active" id="cadastro-tab" data-toggle="tab" href="#cadastro" role="tab" aria-controls="cadastro" aria-selected="true">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="venda-tab" data-toggle="tab" href="#venda" role="tab" aria-controls="venda" aria-selected="false">Vendas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="relatorio-tab" data-toggle="tab" href="#relatorio" role="tab" aria-controls="relatorio" aria-selected="false">Relatório</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="servico-tab" data-toggle="tab" href="#servico" role="tab" aria-controls="servico" aria-selected="false">Produtos Vinculados</a>
                        </li>
                    </ul>
                                
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                            <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                            <div class="row" style="margin-top: 2%">
                                <div class="col-md-4 form-group">
                                    <label><b>CNPJ:</b></label>
                                    <input type="text" id="cnpj" name="cnpj" class="cnpj form-control" value="<?php echo $afiliado['afiliado_cnpj'] ?>" readonly>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label><b>Nome:</b></label>
                                    <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $afiliado['afiliado_nome'] ?>" readonly>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label><b>E-mail:</b></label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $afiliado['afiliado_email'] ?>" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label><b>% de Comissão:</b></label>
                                    <input type="text" id="comissao" name="comissao" class="number form-control" value="<?php echo $afiliado['afiliado_comissao'] ?>" readonly>
                                </div>
                            </div>
                            
                            
                            <hr style="border-color: lightgrey">
                            
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label><b>CEP:</b></label>
                                    <input onkeyup="autofillCEP()" type="text" id="cep" name="cep" class="cep form-control" placeholder="Digite o CEP" value="<?php echo $afiliado['afiliado_cep'] ?>" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>Rua:</b></label>
                                    <input type="text" id="rua" name="rua" class="form-control" placeholder="Digite a rua" value="<?php echo $afiliado['afiliado_rua'] ?>" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><b>Número:</b></label>
                                    <input type="text" id="numero" name="numero" class="number form-control" placeholder="Digite o número" value="<?php echo $afiliado['afiliado_numero'] ?>" readonly>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <label><b>Complemento:</b></label>
                                    <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Digite o complemento" value="<?php echo $afiliado['afiliado_complemento'] ?>" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label><b>Bairro:</b></label>
                                    <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Digite o bairro" value="<?php echo $afiliado['afiliado_bairro'] ?>" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label><b>Cidade:</b></label>
                                    <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite a cidade" value="<?php echo $afiliado['afiliado_cidade'] ?>" readonly>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label><b>Estado:</b></label>
                                    <input type="text" id="estado" name="estado" class="form-control" placeholder="Digite o estado" value="<?php echo $afiliado['afiliado_estado'] ?>" readonly>
                                </div>
                            </div>
                            
                            <hr style="border-color: lightgrey">
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label><b>Dados Bancários:</b></label>
                                    <textarea id="banco" name="banco" class="form-control" placeholder="Digite os dados bancários" disabled><?php echo $afiliado['afiliado_banco'] ?>"</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="venda" role="tabpanel" aria-labelledby="venda-tab">
                            <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                            <div class="table-responsive" style="width: 100%; margin-top: 3%">
                                <table class="table c-table" id="tabela">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%">N° Pedido</th>
                                            <th style="width: 40%">Nome</th>
                			                <th style="width: 5%">Total</th>
                			                <th style="width: 15%">Cadastro</th>
                			                <th style="width: 30%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($pedidos as $p){ ?>
                    			            <tr>
                    			                <td><?php echo $p['id'] ?></td>
                    			                <td><?php echo $p['nome'] ?></td>
                    			                <td><?php echo $p['total'] ?></td>
                                                <td><?php echo $p['data'] ?></td>
                                                <td><?php echo $p['status'] ?></td>
                    			            </tr>
                			            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="relatorio" role="tabpanel" aria-labelledby="relatorio-tab">
                            <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                            
                            <div class="row" style="margin-top: 2%; margin-bottom: 5%;">
                                <!--
                                <div class="offset-xl-2 col-xl-4">
                                    <label><b>Mês</b></label>
                                    <select class="form-control" id="mes" name="mes">
                                        <option> Selecione </option>
                                        <option value="01"> Janeiro </option>
                                        <option value="02"> Fevereiro </option>
                                        <option value="03"> Março </option>
                                        <option value="04"> Abril </option>
                                        <option value="05"> Maio </option>
                                        <option value="06"> Junho </option>
                                        <option value="07"> Julho </option>
                                        <option value="08"> Agosto </option>
                                        <option value="09"> Setembro </option>
                                        <option value="10"> Outubro </option>
                                        <option value="11"> Novembro </option>
                                        <option value="12"> Dezembro </option>
                                    </select>
                                </div>
                                -->
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Data início</label>
                                                <input type="date" class="form-control" id="data_inicio">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Data Fim</label>
                                                <input type="date" class="form-control" id="data_fim">
                                            </div>
                                        </div>
                                        
                                    </div>
                                <div class="col-xl-4">
                                    <label>&nbsp; </label>
                                    <button type="button" onclick="gerarRelatorio()" class="d-block btn btn-primary">Relatório</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="servico" role="tabpanel" aria-labelledby="servico-tab">
                            <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                            <div class="table-responsive" style="width: 100%; margin-top: 3%">
                                <table class="table c-table" id="tabela">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%">Produto</th>
                                            <th style="width: 50%">Link</th>
                			                <th style="width: 10%">% Venda</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listaVinculados">
                                        <?php foreach($vinculados as $v){ ?>
                    			            <tr class="vinculos tr-check">
                    			                <td id="produto_<?php echo $v['id'] ?>"><?php echo ucwords(mb_strtolower($v['nome'])) ?></td>
                    			                <td><?php echo $v['link'] ?></td>
                    			                <td><?php echo mb_strtolower($v['porcentagem']) ?></td>
                    			            </tr>
                			            <?php } ?>
                                    </tbody>
                                </table>
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
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.cep').mask('00000-000');
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.telefone').mask(SPMaskBehavior, spOptions);
    });
</script>

<script>
    function gerarRelatorio(){
        let data_inicio = $("#data_inicio").val();
        let data_fim = $("#data_fim").val();
        
        var anchor = document.createElement('a');
        anchor.href = `<?php echo base_url('admin/adminafiliados/relatorio') ?>?afiliado=<?php echo $afiliado['afiliado_id'] ?>&data_inicio=${data_inicio}&data_fim=${data_fim}`;
        anchor.target="_blank";
        anchor.click();
    }
</script>