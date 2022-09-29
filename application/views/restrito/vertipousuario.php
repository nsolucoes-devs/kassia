<style>
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
</style>
    
    <section id="main-content">
        <section class="wrapper">
            <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('13858aeb4c9a5807927c7b952dace1fb') ?>">Tipo de usuário</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visualização</li>
                </ol>
            </nav>
            <div class="c-card">
                <div class="c-card-header">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <p class="new-principal-titulo">Visualização de Tipo de Usuário</p>
                        </div>
                        <div class="col-md-12 text-right">
                            <a href="<?php echo base_url('13858aeb4c9a5807927c7b952dace1fb') ?>">
                                <button class="btn btn-primary">
                                    <i class="fa fa-reply" aria-hidden="true">VOLTAR</i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-4" style="display: inline-flex">
                                <label style="width: 40%; margin-top: 7px;"><b>Nome do Tipo:</b></label>
                                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $tipo['perfilusuario_nome'] ?>" readonly>
                                <br>
                            </div>
                            <div class="col-md-12 form-group">
                                <hr style="height: 1px">
                                <h3>Defina abaixo as Permissões:</h3>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <span style="font-size: 18px;color: #4da751"><b>DASHBOARD</b></span>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="dashboard" name="dashboard" <?php if($tipo['perfilusuario_dashboard'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="dashboard"><b>Dashboard</b></label>
                            </div>
                        </div>
                
                        <hr style="height: 1px">

                        <div class="row">
                            <div class="col-md-4">
                                <span style="font-size: 18px;color: #4da751"><b>CATÁLOGO</b></span>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="produto" name="produto" <?php if($tipo['perfilusuario_produto'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="produto"><b>Produtos</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="departamento" name="departamento"  <?php if($tipo['perfilusuario_departamento'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="produto"><b>Departamentos</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="promocao" name="promocao"  <?php if($tipo['perfilusuario_promocao'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="produto"><b>Promoções</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="marca" name="marca"  <?php if($tipo['perfilusuario_marca'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="produto"><b>Marcas</b></label>
                            </div>
                        </div>    
                    
                        <hr style="height: 1px">
                
                        <div class="row">
                            <div class="col-md-4">
                                <span style="font-size: 18px;color: #4da751"><b>USUÁRIOS</b></span>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="cliente" name="cliente" <?php if($tipo['perfilusuario_cliente'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="cliente"><b>Clientes</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="usuario" name="usuario"  <?php if($tipo['perfilusuario_usuario'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="usuario"><b>Usuários</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="tipo" name="tipo"  <?php if($tipo['perfilusuario_tipo'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="tipo"><b>Tipo Usuários</b></label>
                            </div>
                        </div>
                        
                        <hr style="height: 1px">
                    
                        <div class="row">
                            <div class="col-md-4">
                                <span style="font-size: 18px;color: #4da751"><b>FINANCEIRO</b></span>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="pedido" name="pedido"  <?php if($tipo['perfilusuario_pedido'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="pedido"><b>Pedidos</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="solicitacao" name="solicitacao"  <?php if($tipo['perfilusuario_solicitacao'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="solicitacao"><b>Solicitações</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="devolucao" name="devolucao" <?php if($tipo['perfilusuario_devolucao'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="devolucao"><b>Devoluções</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="relatorio" name="relatorio"  <?php if($tipo['perfilusuario_relatorio'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="relatorio"><b>Relatórios</b></label>
                            </div>
                        </div>
                        
                        <!--<hr style="height: 1px">-->
                        
                        <!--<div class="row">-->
                        <!--    <div class="col-md-4">-->
                        <!--        <span style="font-size: 18px;color: #4da751"><b>MARKETING</b></span>-->
                        <!--    </div>-->
                        <!--    <div class="col">-->
                        <!--        <input class="form-check-input" type="checkbox" value="1" id="campanha" name="campanha" <?php if($tipo['perfilusuario_campanha'] == 1) { echo 'checked'; } ?> disabled>-->
                        <!--        <label class="form-check-label" for="campanhas"><b>Campanhas</b></label>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                        <hr style="height: 1px">
                    
                        <div class="row">
                            <div class="col-md-4">
                                <span style="font-size: 18px;color: #4da751"><b>DEFINIÇÕES</b></span>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="ajuste" name="ajuste" <?php if($tipo['perfilusuario_ajuste'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="definicao"><b>Ajustes</b></label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="1" id="site" name="site" <?php if($tipo['perfilusuario_site'] == 1) { echo 'checked'; } ?> disabled>
                                <label class="form-check-label" for="usuarios"><b>Site</b></label>
                            </div>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            
        </section>

    </section>
    
    <script>
        $(document).ready(function(){
            <?php if($tipo['perfilusuario_islive'] == 1){ ?>
                $('#ativarlive').val(1).change();
                $('#alive').val(<?php echo $tipo['perfilusuario_alive'] ?>).change();
            <?php } else { ?>
                $('#ativarlive').val(0).change();
            <?php } ?>
        });
        
    </script>
    
    <script>
        function Submit() {
            $('#hiddennome').val($('#nome').val());
            $('#hiddenlive').val($('#ativarlive').val());
            if($('#ativarlive').val() == 0){
                $('#hiddenalive').val(0);
            } else {
                $('#hiddenalive').val($('#alive').val());    
            }
            
            document.getElementById("FormUserType").submit();
        }
    </script>
