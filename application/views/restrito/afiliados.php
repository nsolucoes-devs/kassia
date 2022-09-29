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
    
    .c-aprovados{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(76 175 80 / 40%);
        background: linear-gradient(60deg, #66bb6a, #43a047);
    }
    
    .c-negadas{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(244 67 54 / 40%);
        background: linear-gradient(60deg, #ef5350, #e53935);
    }
    
    .c-titulos{
        box-shadow: 0 4px 20px 0 rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 188 212 / 40%);
            background: linear-gradient(60deg, #26c6da, #00acc1);
    }
    
    .c-tabela{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
        background: linear-gradient(90deg, rgba(101,55,14,1) 0%, rgba(58,11,12,1) 70%);
    }
    
    .c-icon{
        font-size: 33px;
        line-height: 40px;
        width: 40px;
        height: 40px;
        text-align: center;
    }
    
    .c-card-category{
        color: black;
        font-size: 14px;
        margin: 0;
        padding-top: 10px;
        font-weight: bold;
    }
    
    .c-card-title{
        margin: 0;
        color: #3C4858;
        font-size: 1.5625rem;
        line-height: 1.4em;
    }
    
    .c-card-title small{
        font-size: 80%;
        font-weight: 400;
    }
    
    .c-card-footer{
        margin-top: 20px;
        padding: 0;
        padding-top: 10px;
        margin: 0 15px 10px;
        border-radius: 0;
        justify-content: flex-end;
        align-items: center;
        display: flex;
        background-color: transparent;
    }
    
    .c-card-body{
        padding: 0.9375rem 20px;
        border-radius: 0;
        display: flex;
        background-color: transparent;
    }
    
    .c-stats{
        color: #999999;
        font-size: 12px;
        line-height: 22px;
        display: inline-flex;
    }
    
    .c-stats-icon{
        position: relative;
        top: 4px;
        font-size: 16px;
        margin-right: 3px;
        margin-left: 3px;
        color: grey;
    }
    
    .c-stats-text{
        color: grey;
    }
    
    .c-table{
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }
    
    .c-table thead{
        color:  #4da751!important;
    }
    
    .c-table thead tr th{
        padding: 8px;
        vertical-align: middle;
    }
    
    .c-table tbody tr td {
        padding: 8px;
        vertical-align: middle;
        border-top: 1px solid #ddd;
    }
    
    .c-table tbody tr:hover{
        cursor: pointer;
        background-color: #eee!important;
    }
    
    .check-all{
        width: 32px;
        font-size: 12px;
        color: white;
        background-color: #9c27b0;
        border: 0;
        padding: 6px 10px;
        text-align: center;
        border-radius: 5px;
    }
    
    .button-area{
        margin-top: 20px;
    }
    
    .button-custom{
        color: white;
        background-color: #9c27b0;
        border: 0;
        font-size: 14px;
        padding: 6px 10px;
        text-align: center;
        border-radius: 5px;
    }
    
    .search{
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    
    .form-control-custom{
        border-radius: 5px;
        border: 1px solid #80808061;
        padding: 5px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        margin-right: -4px;
        height: 32px;
        width: 165px;
        color: black;
    }
    
    .form-control-custom:focus {
        outline: unset;
        border: 2px solid #43006d;
        color: #43006d;
    }
    
    .search-field{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);
        display: inline-flex;
    }
    
    .def-item{
        display: block;
        padding: 7px 10px;
        color: black;
        font-size: 14px;
    }
    
    .check{
        min-width: 20px;
        min-height: 20px;
    }
    
    .def-item:hover{
        background-color: #eee;
        color: #9c27b0;
        cursor: pointer;
    }
    
    .force-hide{
        display: none!important;
    }
    
    .swal2-container.swal2-top.swal2-backdrop-show{
        opacity: 0.6;
        overflow-y: auto;
        margin-top: 112px;
        width: 380px;
        height: 100px;
    }
    
    .swal2-popup.swal2-toast.swal2-icon-success.swal2-show{
        width: 100%;
        height: 100%;
        display: flex;
        background-color: lightgrey;
    }
    
    .swal2-success-circular-line-left, .swal2-success-fix, .swal2-success-circular-line-right{
        display: none;
    }
    
    span.swal2-success-line-tip, span.swal2-success-line-long{
        z-index: 3!important;
    }
    
    .swal2-success-ring{
        background-color: #507525;
        z-index: 2;
    }
    
    h2#swal2-title{
        display: flex;
        color: black;
        font-size: 18px;
    }
    
    .see-pass{
        width: 10%;
        margin-left: -4px;
        margin-top: -2px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .passwd{
        width: 50%;
        display: inline;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .pagination-links a{
        color: #4da751;
        text-decoration: none;
        padding: 5px;
        font-size: 20px;
    }
    
    .pagination-links strong{
        padding-bottom: 2px!important;
        padding: 6px;
        font-size: 20px;
        border-bottom: 1px solid grey;
    }
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/adminafiliados/afiliados') ?>">Afiliados</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left" style="margin-bottom: -2%">
                        <p class="new-principal-titulo">Listagem de Afiliados</p>
                    </div>
                    
                    <div class="col-md-12 text-right">
                        <form action="<?php echo base_url('admin/adminafiliados/afiliados') ?>" method="post">
                            <div class="button-area">
                                <a href="<?php echo base_url('admin/adminafiliados/cadastro') ?>"><button type="button" class="btn btn-primary" style="margin-right: 15px" title="Adicionar Item"><em class="fa fa-plus"></em></button></a>
                                <div class="search-field">
                                    <input type="text" id="search" name="filtro" class="form-control" value="<?php if(isset($filtro)) { echo $filtro; } ?>">
                                    <button style="cursor: pointer" class="btn btn-primary search"><em class="fa fa-search"></em></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="c-card-body">
                <div class="table-responsive" style="width: 100%" >
                    <table class="table c-table">
                        <thead>
                            <tr>
                                <th style="width: 25%">Nome</th>
                                <th style="width: 13%">% de Comissão</th>
                                <th style="width: 8%">Tipo</th>
    			                <th style="width: 26%">Codigo de Afiliado</th>
    			                <th style="width: 10%">Empresa</th>
    			                <th style="width: 8%">Situação</th>
    			                <th class="text-center" style="width: 20%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($afiliados as $a){ ?>
    			            <tr class="tr-check">
    			                <td><?php echo $a['afiliado_id'].' - '. $a['afiliado_nome']; ?></td><!--.' - '.  ucwords(mb_strtolower($a['afiliado_cliente_id']))-->
    			                <?php if($a['afiliado_comissao']){ ?>
    			                    <td><?php echo $a['afiliado_comissao'] ?>%</td>
    			                <?php } else { ?>
    			                    <td>Não Registrado</td>
    			                <?php } ?>
    			                <td><?php echo $a['afiliado_tipo'] ?></td>
    			                <td><?php echo mb_strtolower($a['afiliado_codigo']) ?></td>
    			                <td><?php echo $a['afiliado_empresa'] ?></td>
    			                <td><?php echo mb_strtolower($a['afiliado_ativo']) ?></td>
    			                <td style="color: #4da751;" class="text-center">
    			                    <?php if($a['afiliado_ativo'] == 'Aguardando Aprovação'){?>
    			                    <a onclick="ativoAfiliado(<?= $a['afiliado_id'] ?>, '1')" style="color: #4da751;" ><i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></a>
    			                    <a href="<?php echo base_url('admin/adminafiliados/edita/id='.$a['afiliado_id']);?>" style="color: #4da751;" ><i class="fa fa-pincel fa-2x" aria-hidden="true"></i></a>
    			                    <a onclick="ativoAfiliado(<?= $a['afiliado_id'] ?>, '2')" style="color: #e91414;" ><i class="fa fa-thumbs-down fa-2x" aria-hidden="true"></i></a>
    			                    <?php }elseif($a['afiliado_ativo'] == 'Ativo'){?>
    			                    <a href="<?php echo base_url('admin/adminafiliados/relatorio?id='.$a['afiliado_id']);?>" style="color: #4da751;" ><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
    			                    <a href="<?php echo base_url('admin/adminafiliados/edita/'.$a['afiliado_id']);?>" style="color: #4da751;" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
    			                    <a href="<?php echo base_url('admin/adminafiliados/afiliadoAtivo?id='.$a['afiliado_id'].'&step=2');?>" style="color: #e91414;" ><i class="fa fa-ban fa-2x" aria-hidden="true"></i></a>
    			                    <?php }?>    			                    
    			                </td>
    			            </tr>
    			            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if($afiliados == null) { ?>
		        <div class="col-md-12 text-center">
		            <p>Nenhum afiliado encontrado!</p> 
		        </div>
		    <?php } ?>
        </div>
    </section>
</section>



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
                <p style="font-size: 17px;"><b> Deseja excluir o afiliado? </b><p>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12 text-right form-group">
                        <button type="button" class="btn btn-primary" onclick="senha()">Excluir</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                    <div class="col-md-12 text-center form-group" id="formsenha" style="display: none">
                        <form action="<?php echo base_url('admin/adminafiliados/excluirAfiliado') ?>" method="post">
                            
                            <input type="hidden" name="id" id="id">
                            
                            <label style="font-size: 16px">Confirme a senha</label><br>
                            <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                            <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                            <br><br>
                            <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var alertN = false;
        teste();
    });

    function teste() {
        alertN = <?= isset($alert) ? $alert : 'false' ?>;
    }
</script>
<script src="<?php echo base_url() ?>assets/js/afiliados.js"></script>	

