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
                <li class="breadcrumb-item" aria-current="page">Adicionar</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Adicionar Afiliado</p>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('admin/adminafiliados/novoAfiliado');?>" method="post">
                
                <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                    <div class="col-md-12">
                        <div class="row" style="margin-top: 2%">
                            <div class="col-md-3 form-group">
                                <label><b>CNPJ:</b></label>
                                <input type="text" id="cnpj" name="cnpj" class="cnpj form-control" placeholder="Digite o CNPJ" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><b>Nome:</b></label>
                                <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <label><b>Telefone:</b></label>
                                <input type="text" id="telefone" name="telefone" class="telefone form-control" placeholder="Digite o telefone" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <label><b>E-mail:</b></label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Digite o email" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label><b>% de Comissão:</b></label>
                                <input type="text" id="comissao" name="comissao" class="number form-control" placeholder="Digite a %" required>
                            </div>
                        </div>
                        
                        <hr style="border-color: lightgrey">
                        
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label><b>CEP:</b></label>
                                <input onkeyup="autofillCEP()" type="text" id="cep" name="cep" class="cep form-control" placeholder="Digite o CEP" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><b>Rua:</b></label>
                                <input type="text" id="rua" name="rua" class="form-control" placeholder="Digite a rua" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <label><b>Número:</b></label>
                                <input type="text" id="numero" name="numero" class="number form-control" placeholder="Digite o número" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label><b>Complemento:</b></label>
                                <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Digite o complemento">
                            </div>
                            <div class="col-md-4 form-group">
                                <label><b>Bairro:</b></label>
                                <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Digite o bairro" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label><b>Cidade:</b></label>
                                <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite a cidade" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <label><b>Estado:</b></label>
                                <input type="text" id="estado" name="estado" class="form-control" placeholder="Digite o estado" required>
                            </div>
                        </div>
                        
                        <hr style="border-color: lightgrey">
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label><b>Dados Bancários:</b></label>
                                <textarea id="banco" name="banco" class="form-control" placeholder="Digite os dados bancários"></textarea>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 1%">
                            <div class="col-md-12 text-right form-group">
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                                &nbsp;&nbsp;
                                <a href="<?php echo base_url('admin/adminafiliados/afiliados') ?>" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
