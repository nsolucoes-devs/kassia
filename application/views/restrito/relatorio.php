<style>
    .c-icon{
        font-size: 33px;
        line-height: 40px;
        width: 40px;
        height: 40px;
        text-align: center;
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
    .nav-tabs{
        background-color: white;
    }
    
    .nav-link{
        font-size: 25px;
    }
    
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('e12424b582344b74d442de7107c91fd9') ?>">Relatórios</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="new-principal-titulo">Relatórios</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="pedidos-tab" data-toggle="tab" href="#pedidos" role="tab" aria-controls="pedidos" aria-selected="true"><b>Pedidos</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="clientes-tab" data-toggle="tab" href="#clientes" role="tab" aria-controls="clientes" aria-selected="true"><b>Clientes</b></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
                        <div class="col-md-12 form-group" style="margin-top: 2%">
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <label><input onclick="tipo()" style="height: 20px; width: 20px" type="radio" name="tipo" value="detalhado" id="detalhado" checked> <b>Relatório Detalhado Pedidos</b></label>
                                </div>
                                <div class="col-md-6">
                                    <label><input onclick="tipo()" style="height: 20px; width: 20px" type="radio" name="tipo" value="simples" id="simples"> <b>Relatório Sintetico Pedidos</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="height: 1px; border-color: whitesmoke; margin: 0px;">
                        </div>
                        <form style="display: block" id="form-pedidos" action="<?php echo base_url('3b4dd596fc64a3b4d3f26554558a74ec') ?>" method="post" target="_blank">
                            <input type="hidden" id="filtro-pedido" name="filtro-pedido" value="n">
                            <div class="row">
                                
                                <div class="col-lg-6 form-group">
                                        <label><b>Clientes:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos4" name="cliente" id="cliente2">
                                            <option value="" selected> Todos </option>
                                            <?php foreach($clientes as $c){ ?>
                                                <option value="<?php echo $c['cliente_id'] ?>"><?php echo $c['cliente_nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 2%;">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label><b>Produtos:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos" name="produto" id="produto">
                                            <option value="" selected> Todos </option>
                                            <?php foreach($servicos as $s){ ?>
                                                <option value="<?php echo $s['produto_id'] ?>"><?php echo $s['produto_nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Data Inicio:</b></label>
                                        <input type="date" name="datainicio" id="datainicio" class="form-control filtroPedidos">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Data Fim:</b></label>
                                        <input type="date" name="datafim" id="datafim" class="form-control filtroPedidos">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label><b>Status:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos" id="status" name="status">
                                            <option value="" selected> Todos </option>
                                            <?php foreach($status as $row) { ?>
                                                <option value="<?php echo $row['idStatusCompra'] ?>"><?php echo $row['nomeStatusCompra'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Pagamento:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos" id="forma_pagamento" name="forma_pagamento">
                                            <option value="" selected> Todos </option>
                                            <option value="cartao">Cartão</option>
                                            <option value="boleto">Boleto</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Estados:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos" id="estado" name="estado">
                                            <option value="" selected> Todos </option>
                                            <?php foreach($estados as $estado) { ?>
                                                <option value="<?php echo $estado['uf_estado'] ?>"><?php echo $estado['nome_estado'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 text-right" style="margin-bottom: 20px; margin-top: 20px;">
                                            <button onclick="verificarFiltro()" type="button" class="btn btn-primary">Gerar Relatório Pedidos Detalhado</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <form style="display: none" id="form-pedidos3" action="<?php echo base_url('27849c9ae97d4b36accc8e5b12e45b77') ?>" method="post" target="_blank">
                            <input type="hidden" id="filtro-pedido3" name="filtro-pedido3" value="n">
                            <div class="col-md-12" style="margin-top: 2%;">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label><b>Data Inicio:</b></label>
                                        <input type="date" name="datainicio3" id="datainicio3" class="form-control filtroPedidos3">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Data Fim:</b></label>
                                        <input type="date" name="datafim3" id="datafim3" class="form-control filtroPedidos3">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Status:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos3" id="status3" name="status3">
                                            <option value="" selected> Todos </option>
                                            <?php foreach($status as $row) { ?>
                                                <option value="<?php echo $row['idStatusCompra'] ?>"><?php echo $row['nomeStatusCompra'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Pagamento:</b></label>
                                        <select style="width: 70%!important" class="js-example-basic-multiple filtroPedidos3" id="forma_pagamento3" name="forma_pagamento3">
                                            <option value="" selected> Todos </option>
                                            <option value="cartao">Cartão</option>
                                            <option value="boleto">Boleto</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Estados:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos3" id="estado3" name="estado3">
                                            <option value="" selected> Todos </option>
                                        	<?php foreach($estados as $estado) { ?>
                                                <option value="<?php echo $estado['uf_estado'] ?>"><?php echo $estado['nome_estado'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 text-right" style="margin-bottom: 20px; margin-top: 20px;">
                                            <button onclick="verificarFiltro3()" type="button" class="btn btn-primary">Gerar Relatório Pedidos Sintético</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        
                    <div class="tab-pane fade" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
                        <div class="col-md-12">
                            <hr style="height: 1px; border-color: whitesmoke; margin: 0px;">
                        </div>
                        <form style="display: block" id="form-pedidos5" action="<?php echo base_url('admin/adminrelatorios/gerarRelatorioClienteSintetico') ?>" method="post" target="_blank">
                            <input type="hidden" id="filtro-pedido5" name="filtro-pedido5" value="n">
                            <div class="col-md-12" style="margin-top: 2%;">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label><b>Data Inicio:</b></label>
                                        <input type="date" name="datainicio5" id="datainicio5" class="form-control filtroPedidos5">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Data Fim:</b></label>
                                        <input type="date" name="datafim5" id="datafim5" class="form-control filtroPedidos5">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Estados:</b></label>
                                        <select style="width: 100%!important" class="js-example-basic-multiple filtroPedidos5" id="estado5" name="estado5">
                                            <option value="" selected> Todos </option>
                                        	<?php foreach($estados as $estado) { ?>
                                                <option value="<?php echo $estado['uf_estado'] ?>"><?php echo $estado['nome_estado'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 text-right" style="margin-bottom: 20px; margin-top: 20px;">
                                            <button onclick="verificarFiltro5()" type="button" class="btn btn-primary">Gerar Relatório Clientes Sintético</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>  
                        
                </div>
            </div>
        </div>

    </section>
</section>

<script>
    $(document).ready(function(){
        $('#pedidos-tab').click();
    })
</script>

<script>
    function tipo(){
        if($("#detalhado").prop("checked")){
            $('#form-pedidos').show();
            $('#form-pedidos3').hide();
        } else {
            $('#form-pedidos').hide();
            $('#form-pedidos3').show();
        }
    }
</script>

<script>
    function tipo2(){
        if($("#detalhado_cliente").prop("checked")){
            $('#form-pedidos4').show();
            $('#form-pedidos5').hide();
        } else {
            $('#form-pedidos4').hide();
            $('#form-pedidos5').show();
        }
    }
</script>


<script>
    function verificarFiltro(){
        var boolean1 = false;
        
        $('.filtroPedidos').each(function(){
            if($(this).val() != "" && $(this).val() != null){
                boolean1 = true;
            }
        })
        
        if(boolean1 == true){
            $('#filtro-pedido').val('s');
        } else {
            $('#filtro-pedido').val('n');
        }
        
        $('#form-pedidos').submit();
    }
</script>

<script>
    function verificarFiltro2(){
        var boolean2 = false;
        
        $('.filtroPedidos2').each(function(){
            if($(this).val() != "" && $(this).val() != null){
                 boolean2 = true;
            }
        })
        
        if(boolean2 == true){
            $('#filtro-pedido2').val('s');
        } else {
            $('#filtro-pedido2').val('n');
        }
        
        $('#form-pedidos2').submit();
    }
</script>

<script>
    function verificarFiltro3(){
        var boolean3 = false;
        
        $('.filtroPedidos3').each(function(){
            if($(this).val() != "" && $(this).val() != null){
                boolean3 = true;
            }
        })
        
        if(boolean3 == true){
            $('#filtro-pedido3').val('s');
        } else {
            $('#filtro-pedido3').val('n');
        }
        
        $('#form-pedidos3').submit();
    }
</script>

<script>
    function verificarFiltro4(){
        var boolean4 = false;
        
        $('.filtroPedidos4').each(function(){
            if($(this).val() != "" && $(this).val() != null){
                boolean4 = true;
            }
        })
        
        if(boolean4 == true){
            $('#filtro-pedido4').val('s');
        } else {
            $('#filtro-pedido4').val('n');
        }
        
        $('#form-pedidos4').submit();
    }
</script>

<script>
    function verificarFiltro5(){
        var boolean5 = false;
        
        $('.filtroPedidos5').each(function(){
            if($(this).val() != "" && $(this).val() != null){
                boolean5 = true;
            }
        })
        
        if(boolean5 == true){
            $('#filtro-pedido5').val('s');
        } else {
            $('#filtro-pedido5').val('n');
        }
        
        $('#form-pedidos5').submit();
    }
</script>

<script>
    function verificarFiltro6(){
        var boolean6 = false;
        
        $('.filtroPedidos6').each(function(){
            if($(this).val() != "" && $(this).val() != null){
                boolean6 = true;
            }
        })
        
        if(boolean6 == true){
            $('#filtro-pedido6').val('s');
        } else {
            $('#filtro-pedido6').val('n');
        }
        
        $('#form-pedidos6').submit();
    }
</script>
