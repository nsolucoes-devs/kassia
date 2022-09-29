<style>
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #4ECDC4;
        border-color: #4ECDC4;
    }
    
    .modal-dialog-cad{
        width: 60%;
        max-width: 60%;
        margin-left: 20%;
        margin-right: 20%;
    }
    
    #myTable_wrapper .row{
        margin: 0;
    }
    
    .c-20{
        width: 20%;
        flex: 0 0 20%;
        max-width: 20%;
        padding: 0 15px;
        float: left;
    }
    .c-check{
        display: inline;
        margin-right: 10px;
    }
    .c-title{
        font-weight: bold;
        font-size: 15px;
    }
    .c-sub{
        font-weight: bold;
        font-size: 13px;
    }
    .c-div-sub{
        margin-top: 5px;
        padding-left: 15px;
        width: 100%;
    }
    .check-all{
        text-decoration: underline;
        color: #797979;
        display: inline;
        font-size: 13px;
        cursor: pointer;
    }
    .c-icon {
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
    
    .c-card-body{
        border-top: 1px solid #d6d5d5;
        padding: 0.9375rem 20px;
        border-radius: 0;
        display: flex;
        background-color: transparent;
    }
    
    .button-area{
        margin-top: 20px;
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
        border-radius: 5px;
    }
    
    .mr-15{
        margin-right: 15px;
    }
    
    .check{
        min-width: 20px;
        min-height: 20px;
    }
    .pagination-links a{
        color: #4da751;
        text-decoration: none;
        padding: 5px;
        font-size: 20px;
        margin: 2px;
    }
    
    .pagination-links strong{
        padding-bottom: 2px!important;
        padding: 6px;
        font-size: 20px;
        border-bottom: 2px solid #4da751;
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
    </style>
    
    <section id="main-content">
        <section class="wrapper">
            <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/adminhistoricos/listhistoric') ?>">Históricos</a></li>
                </ol>
            </nav>
      
            <div class="c-card">
                <div class="c-card-header">
                    <div class="row">
                        <div class="col-xl-12 text-left" style="margin-bottom: -2%">
                            <p class="new-principal-titulo">Listagem de Históricos</p>
                        </div>
                        <div class="col-xl-12 text-right">
                            <form action="<?php echo base_url('admin/adminhistoricos/listhistoric') ?>" method="post">
                                <div class="button-area">
                                    <a onclick="addModal()" data-toggle="modal" data-target="#novoHist" class="btn btn-primary mr-15" title="Adicionar Histórico"><em class="fa fa-plus"></em></a>  
                                    <div class="search-field">
                                        <input type="text" id="search" name="filtro" class="form-control" value="<?php if(isset($filtro)) { echo $filtro; } ?>">
                                        <button type="submit" style="cursor: pointer" class="btn btn-primary search"><em class="fa fa-search"></em></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                    <div class="col-md-12">
                        <div class="c-card-body">
                            <div class="table-responsive" style="width: 100%">
                                <table class="table c-table" id="tabela">
            				        <thead>
            				            <tr>
            				                <th style="width: 15%;">Histórico</th>
            				                <th style="width: 60%;">Comentário</th>
            				                <th style="width: 5%;" class="text-center">Ações</th>
            				            </tr>
            				        </thead>
            				        <tbody>
            				            <?php foreach($historico as $hist){ 
            				                if($hist['historico_ativo'] == 1){
            				            ?>
            				            <tr>
            				                <td><?php echo mb_strtoupper($hist['historico_titulo']); ?></td>
            				                <td><?php echo $hist['historico_comentario']; ?></td>
            				                <td style="color: #4da751;" class="text-center">
            				                    <i onclick="populateEditModal(<?php echo $hist['historico_id'] ?>, '<?php echo $hist['historico_titulo'] ?>', '<?php echo $hist['historico_comentario'] ?>')" style="padding-left: 12px; font-size: 25px" class="fa fa-edit" data-target="#editModal" data-toggle="modal"></i>
        				                        <i onclick="excluirhistorico(<?php echo $hist['historico_id'] ?>)" data-toggle="modal" data-target="#modalExcluir"  style="padding-left: 12px; font-size: 25px" class="fa fa-ban" aria-hidden="true"></i>
            				                </td>
            				            </tr>
            				            <?php } } ?>
            				        </tbody>
            				    </table>
        				    </div>
        			    </div>
        			    <?php if($historico == null) { ?>
        			        <div class="col-md-12 text-center">
        			            <p>Nenhum histórico encontrado!</p>
        			        </div>
        			    <?php } ?>
        			    <!--<div class="row">-->
               <!--             <div class="col-md-12 text-center">-->
               <!--                 <p class="pagination-links"><?php echo $links; ?></p>-->
               <!--             </div>-->
               <!--         </div>-->
    			    </div>
                </div>
            </div>
        </section>
    </section>
    
    <!-- Modal -->
    <div id="novoHist" class="modal">
        <div class="modal-dialog modal-dialog-cad">
    
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="titulo-modal">Novo Histórico</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" id="form_insert">
                    <input type="hidden" id="historico_id" name="historico_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label style="color: black;"><b>Histórico:</b></label>
                                <input type="text" class="form-control" placeholder='Histórico...' name="historico_titulo" id="historico_titulo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label style="color: black;"><b>Comentário:</b></label>
                                <input type="text" class="form-control" placeholder="Comentário" name="historico_comentario" id="historico_comentario" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_insert" class="btn btn-primary">Adicionar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
    
        </div>
    </div>
    
    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/adminhistoricos/editahistorico') ?>" method="POST">
        <input type="hidden" id="editar_historico_id" name="historico_id">
        <div class="form-group">
            <label>Título*</label>
            <input class="form-control" name="historico_titulo" id="editar_historico_titulo" required maxlength="255">
            
        </div>
        <div class="form-group">
            <label>Comentário*</label>
            <input class="form-control" name="historico_comentario" id="editar_historico_comentario" required maxlength="255">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Edit Modal-->
        
<div class="modal" tabindex="-1" role="dialog" id="modalExcluir">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, rgba(101,55,14,1) 0%, rgba(58,11,12,1) 70%);">
        <h5 class="modal-title" style="color: white; display: inline;">Excluir histórico</h5>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p style="font-size: 16px;"><b>Deseja desativar o histórico?</b></p>
            <div class="col-md-12 text-center">
                <form action="<?php echo base_url('admin/adminhistoricos/excluihistoricos') ?>" method="post"> 
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="historico_ativo" name="historico_ativo" value="0">
                    <button type="submit" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
    </div>
  </div>
</div>



    
<script>
    $(document).ready(function(){
        
        <?php if(isset($alert)){ ?>
            <?php if($alert == 1) { ?>
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
                    icon: 'success',
                    title: 'Histórico criado com sucesso!'
                })
            <?php } else if($alert == 3) { ?>
                const Toast2 = Swal.mixin({
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
                
                Toast2.fire({
                    icon: 'success',
                    title: 'Histórico desativado'
                })
            <?php } ?>
        <?php } ?>
        
        
    });
    
    function addModal(){
        $('#form_insert').attr('action', '<?php echo base_url('admin/adminhistoricos/gravahistoricos')?>');
        
        $('#titulo-modal').html('Adicionar Histórico');
        $('#historico_id').val('');
        $('#historico_titulo').val('');
        $('#historico_comentario').val('');
        $('#historico_prioridade').val('');
        $('#historico_ativo').val('').change();
        $('#add_insert').html('Adicionar');
    }
    
    function populateEditModal(id, titulo, comentario){
        $("#editar_historico_id").val(id);
        $("#editar_historico_titulo").val(titulo);
        $("#editar_historico_comentario").val(comentario);
    }
    
</script>

<script>
    function excluirhistorico(id){
        // alert(id);
        $('#id').val(id);
        $('#historico_ativo').val('').change();
    }
    
</script>

