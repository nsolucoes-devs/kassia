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

<link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />

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
                <li class="breadcrumb-item" aria-current="page">Edição</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Edição de Afiliado</p>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('admin/adminafiliados/updateAfiliado');?>" method="post" id="formUpdate">
                <input value="<?php echo $afiliado['afiliado_id'] ?>" type="hidden" id="id" name="id">
                
                <input type="hidden" id="servicoVinculo" name="servicoVinculo">
                <input type="hidden" id="porcentagemVinculo" name="porcentagemVinculo">
                <input type="hidden" id="linkVinculo" name="linkVinculo">
                
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
                                    <div class="col-md-6 form-group">
                                        <label><b>Nome:</b></label>
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="" value="<?php echo $afiliado['afiliado_nome'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label><b>E-mail:</b></label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="" value="<?php echo $afiliado['afiliado_email'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label><b>% de Comissão:</b></label>
                                        <input type="text" id="comissao" name="comissao" class="number form-control" placeholder="Digite a %" value="<?php echo $afiliado['afiliado_comissao'] ?>">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>CNPJ:</b></label>
                                        <input type="text" id="cnpj" name="cnpj" class="cnpj form-control" placeholder="" value="<?php echo $afiliado['afiliado_cnpj'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>Apelido:</b></label>
                                        <input type="text" id="apelido" name="apelido" class="form-control" placeholder="" value="<?php echo $afiliado['afiliado_apelido'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <hr style="border-color: lightgrey">
                            
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label><b>Dados Bancários:</b></label>
                                        <textarea id="banco" name="banco" class="form-control" placeholder="" readonly><?php echo $afiliado['afiliado_banco'] ?>"</textarea>
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
                    			                <th style="width: 10%">Total</th>
                    			                <th style="width: 15%">Cadastro</th>
                    			                <th style="width: 20%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($pedidos as $p){ ?>
                        			            <tr>
                        			                <td><?php echo $p['id'] ?></td>
                        			                <td><?php echo $p['nome'] ?></td>
                        			                <td>R$ <?php echo str_replace(".", ",", $p['total']); ?></td>
                                                    <td><?php echo date('d/m/Y H:i', strtotime($p['data'])) ?></td>
                                                    <td><?php echo $p['status'] ?></td>
                        			            </tr>
                    			            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                    
                            <div class="tab-pane fade" id="relatorio" role="tabpanel" aria-labelledby="relatorio-tab">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 2%">
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
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <button data-toggle="modal" data-target="#addServico" type="button" class="btn btn-primary" style="margin-bottom: 2%; margin-right: 15px" title="Adicionar Item">
                                                    <em class="fa fa-plus"></em>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive" style="width: 100%">
                                            <table class="table c-table" id="tabela">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20%">Produto</th>
                                                        <th style="width: 50%">Link</th>
                            			                <th class="text-center" style="width: 20%">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="listaVinculados">
                                                    <?php foreach($afiliado['afiliado_produtos'] as $v){ ?>
                                			            <tr class="vinculos tr-check">
                                			                <td id="produto_<?php echo $v['produto_id'] ?>"><?php echo ucwords(mb_strtolower($v['produto_nome'])) ?></td>
                                			                <td><a href="<?php echo base_url('produto/'.$v['produto_id'].'?afiliado='.$afiliado['afiliado_id']) ?>" target='_blank'><?php echo base_url('produto/'.$v['produto_id'].'?afiliado='.$afiliado['afiliado_id']) ?></a></td>
                                			                <!--<td></td>-->
                                			                <td style="color: #4da751;" class="text-center">
                                			                    <i onclick="excluirVinculo(this)" style="cursor: pointer; padding-left: 12px; font-size: 25px" class="fa fa-trash" aria-hidden="true"></i>
                                			                </td>
                                			            </tr>
                            			            <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="row" style="margin-top: 5%">
                                <div class="col-md-12 text-right form-group">
                                    <button type="button" class="btn btn-primary" onclick="formSubmit()">Editar</button>
                                    &nbsp;&nbsp;
                                    <a href="<?php echo base_url('admin/adminafiliados/afiliados') ?>" class="btn btn-danger">Cancelar</a>
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
<div class="modal fade" id="addServico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vincular Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row" stle="margin: 0 10px">
                    <div class="col-xl-12">
                        <label><b>Produto:</b></label>
                        <select class="form-control select2" onchange="criarLink()" id="produto_vinculo" style="width: 100%" name="produto_vinculo">
                            <?php foreach($servicos as $s) { ?>
                                <option value="<?php echo $s['produto_id'] ?>">
                                    <?php if (strlen($s['produto_nome']) > 45) {
                                        echo substr($s['produto_nome'], 0, 45) . "...";
                                    } else {
                                        echo $s['produto_nome'];
                                    } ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row" stle="margin: 0 10px">
                    <div class="col-xl-12">
                        <input class="form-control" id="link_vinculo" name="produto_vinculo"></input>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addVinculo()">Adicionar</button>
            </div>
        </div>
    </div>
</div>


<script src="vendor/select2/dist/js/select2.min.js"></script>

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

        $(".select2").select2({
            placeholder: 'Selecione um produto',
            width: 'resolve',
            dropdownParent: $('#addServico'),
        });
    });
</script>

<script>
    function autofillCEP(){
        var aux = $('#cep').val();
        var cep = aux.replace(/\D/g,'');
        if(cep.length == 8){
            dados = new FormData();
            dados.append('cep', cep);
            $.ajax({
                url: '<?php echo base_url('inicio/resgataCEP'); ?>',
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
                        $('#cep').unmask().val(cep.cep).mask('00000-000', {reverse: true}, {'translation': {0: {pattern: /[0-9*]/}}});
                        $('#cidade').val(ce[0]);
                        $('#estado').val(ce[1]).change();
                        $('#bairro').val(cep.cep_bairro);
                        if(cep.cep_rua.indexOf(',') > 0){
                            var rua = cep.cep_rua.split(',');
                            $('#rua').val(rua[0]);
                        }else if(cep.cep_rua.indexOf(' - ') > 0){
                            var rua = cep.cep_rua.split(' - ');
                            $('#rua').val(rua[0]);
                        }else{
                            $('#rua').val(cep.cep_rua);
                        }
                    }
                },
            });
        }
    }
</script>

<script>
    function formSubmit(){
        var servico = porcentagem = link = "";
        
        $('.vinculos').each(function(){
            var aux = $(this).children().first().attr('id').split('_');
            
            if(servico == ""){
                servico     = aux[1];
                link        = $(this).children().first().next().html();
                porcentagem = $(this).children().first().next().next().html();
            } else {
                servico     = servico + "¬" + aux[1];
                link        = link + "¬" + $(this).children().first().next().html();
                porcentagem = porcentagem + "¬" + $(this).children().first().next().next().html();
            }
        })
        
        $('#servicoVinculo').val(servico);
        $('#linkVinculo').val(link);
        $('#porcentagemVinculo').val(porcentagem);
        
        $('#formUpdate').submit();
    }
</script>

<script>
    function criarLink(){
        var random = Math.floor(Math.random() * 100000);
        
        var link = '<?php echo base_url('produto/') ?>' + $('#produto_vinculo').val() + "?afiliado=" + <?php echo $afiliado['afiliado_id'] ?>;
        
        $('#link_vinculo').val(link);
    }
</script>

<script>
    function addVinculo(){
        if($('#produto_vinculo').val() != "" && $('#produto_vinculo').val() != " " && $('#produto_vinculo').val() != null){
              
            var td = '<tr class="vinculos tr-check">'+
                '<td id="produto_'+$('#produto_vinculo').val()+'">' + $('#produto_vinculo option:selected').text() + '</td>'+
                '<td>' + $('#link_vinculo').val() + '</td>'+
                '<td style="color: #4da751;" class="text-center">'+
                    '<i onclick="excluirVinculo(this)" style="cursor: pointer; padding-left: 12px; font-size: 25px" class="fa fa-trash" aria-hidden="true"></i>'+
                '</td>'+
            '</tr>';
            
            $('#listaVinculados').append(td);
            
            $('#addServico').modal('hide');
            $('#produto_vinculo').val('');
            $('#link_vinculo').val('');
	            
        } else {
            $('#produto_vinculo').focus();
        }
    }
    
    function excluirVinculo(esse){
        $(esse).parent().parent().remove();
    }
</script>

<script>
    function gerarRelatorio(){
        let data_inicio = $("#data_inicio").val();
        let data_fim = $("#data_fim").val();
        
        var anchor = document.createElement('a');
        anchor.href = `<?php echo base_url('admin/adminafiliados/relatorio') ?>?afiliado=<?php echo $afiliado['afiliado_id'] ?>&data_inicio=${data_inicio}&data_fim=${data_fim}&relatorio_title=Relatório%20de%20afiliados`;
        anchor.target="_blank";
        anchor.click();  
    }
</script>

