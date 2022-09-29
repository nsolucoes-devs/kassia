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
    
    .btn-primary:disabled {
        color: #fff;
        background-color: #4da751;
        border-color: #4da751;
    }
    
    #tabela a{
        color: #4da751;
    }
    
    #tabela a:hover{
        color: #267429;
    }
    
    </style>
    <?php $cont = 0;?>
    
    <section id="main-content">
        <section class="wrapper">
            <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/admindestaques/destaques') ?>">Destaques</a></li>
                </ol>
            </nav>
      
            <div class="c-card">
                <div class="c-card-header">
                    <div class="row">
                        <div class="col-xl-12 text-left" style="margin-bottom: -2%">
                            <p class="new-principal-titulo">Listagem De Destaques</p>
                        </div>
                        <div class="col-xl-12 text-right">
                            <div class="button-area">
                                <?php foreach($destaques as $row){ $cont++;} ?>
                                <button <?php if($cont >= 20){ ?>disabled style="cursor: not-allowed;"<?php }?> onclick="addModal()" data-toggle="modal" data-target="#novoDestaque" class="btn btn-primary mr-15" title="Adicionar Destaque"><em class="fa fa-plus"></em></button>  
                            </div>
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
            				                <th class="text-center" style="width: 85%;">Recomendado mais que 5 produtos e menos que 20!</th>
            				                <th class="text-center">Excluir Destaque</th>
            				            </tr>
            				        </thead>
            				        <tbody>
            				            <?php foreach($destaques as $row){ ?>
            				            <tr>
            				                <td><?php echo mb_strtoupper($row['produto_nome']); ?></td>
            				                <td style="color: #4da751;" class="text-center">
            				                    <a href="<?php echo base_url('admin/admindestaques/excluiDestaque/' . $row['produto_id']) ?>"><i style="padding-left: 12px; font-size: 25px" class="fa fa-times" aria-hidden="true"></i></a>
            				                </td>
            				            </tr>
            				            <?php $cont++;} ?>
            				        </tbody>
            				    </table>
        				    </div>
        			    </div>
        			    <?php if($destaques == null) { ?>
        			        <div class="col-md-12 text-center">
        			            <p>Nenhum destaque encontrado!</p>
        			        </div>
        			    <?php } ?>
    			    </div>
                </div>
            </div>
        </section>
    </section>
    
    <!-- Modal -->
    <div id="novoDestaque" class="modal">
        <div class="modal-dialog modal-dialog-cad">
    
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="titulo-modal"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" id="form_insert">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label style="color: black;"><b>Produto:</b></label>
                                <select style="width: 100%" class="js-example-basic-multiple" name="destaque_id" id="destaque_id" required>
                                    <option value="" selected disabled>-- Selecione --</option>
                                    <?php foreach($produtos as $p){
                                        if($p['produto_destaque'] == 0) {
                                            echo "<option value='".$p['produto_id']."'>".$p['produto_nome']."</option>";
                                        }
                                    } ?>
                                </select>
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
    
        
<div class="modal" tabindex="-1" role="dialog" id="modalExcluir">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg, rgba(101,55,14,1) 0%, rgba(58,11,12,1) 70%);">
        <h5 class="modal-title" style="color: white; display: inline;">Excluir destaque</h5>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p style="font-size: 16px;"><b>Deseja excluir o destaque?</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="senha()">Sim</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <div class="row row-c" id="formsenha" style="display: none">
            <div class="col-md-12 text-center">
                <form action="<?php echo base_url('admin/admindestaques/excluiDestaque') ?>" method="post">
                    
                    <input type="hidden" id="id_excluir" name="id_excluir">
                    
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
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.tel').mask(SPMaskBehavior, spOptions);
        
        
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
                    title: 'Destaque adicionado com sucesso!'
                })
            <?php } else if($alert == 2) { ?>
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
                    title: 'Usuário editado com sucesso!'
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
                    title: 'Usuário bloqueado com sucesso!'
                })
            <?php } else if($alert == 5) { ?>
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
                    title: 'Usuário desbloqueado com sucesso!'
                })
            <?php } else if($alert == 4) { ?>
                const Toast2 = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast2.fire({
                    icon: 'error',
                    title: 'Não foi possível excluir o destaque, pois a senha está incorreta. Resta Apenas ' + <?php if($this->session->userdata('user_block') == 2) { echo ' 1 ';} else { echo ' 2 '; } ?> + ' tentativa(s)!'
                })
            <?php } ?>
        <?php } ?>
        
        
    });
    
    function addModal(){
        $('#form_insert').attr('action', '<?php echo base_url('admin/admindestaques/updateDestaque')?>');
        
        $('#titulo-modal').html('Adicionar Destaque');
        $('#add_insert').html('Adicionar');
    }
    
    //Seta os campos do modal de editar de acordo com as informações do usuário
    
</script>

<script>
    function excluirusuario(id){
        $('#id_excluir').val(id);
    }
    
</script>

<script>
    function desbloquearusuario(id){
        $('#id_excluir2').val(id);
    }
    
</script>

<script>
        function senha(){
            $('#formsenha').show();
            
            $('#status_enviar').val($('#status_modal').val());
        }
</script>

<script>
    $('#senha_btn').on('click', function(){
        const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
        $('#senha').prop('type', type);
        if(type == "text"){
            $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
        }else{
            $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
</script>

<script>
        function showForm(){
            document.getElementById('btnconfirmacao').style.display = "none";
            document.getElementById('formsenha').style.display = "block";
            document.getElementById('footermodal').style.display = "block";
        }
</script>

<script>
        function senha2(){
            $('#formsenha2').show();
        }
</script>

<script>
    $('#senha_btn2').on('click', function(){
        const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
        $('#senha2').prop('type', type);
        if(type == "text"){
            $('#senha_btn2').children().removeClass("fa-eye").addClass("fa-eye-slash");
        }else{
            $('#senha_btn2').children().removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
</script>

