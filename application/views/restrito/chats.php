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
        border-top: 1px solid #d6d5d5;
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
        border-top: 1px solid #d6d5d5;
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
        color:  black!important;
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
        height: 400px;
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
        color: #3a0b0c;
        text-decoration: none;
        padding: 5px;
        font-size: 20px;
    }
    
    .pagination-links strong{
        padding-bottom: 2px!important;
        padding: 6px;
        font-size: 20px;
        border-bottom: 2px solid grey;
    }
    .mensagens{
        border-radius: 10px;
        padding: 10px;
        width: 80%;
        box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;background: #e6e6e6;
    }
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/adminchats/chats') ?>">Chats</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Listagem de Chats</p>
                    </div>
                    <div class="col-md-12 text-right">
                        <form action="<?php echo base_url('admin/adminchats/chats') ?>" method="post">
                            <div class="button-area">
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
                <div class="table-responsive" style="width: 100%">
                    <table class="table c-table" id="tabela">
                    <thead>
                        <tr>
                            <th style="width: 5%">Pedido</th>
                            <th style="width: 15%">Data</th>
                            <th style="width: 20%">Nome</th>
                            <th style="width: 30%">Última Mensagem</th>
                            <th style="width: 15%">Status</th>
			                <th class="text-center" style="width: 5%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($chats)){ ?>
                            <?php foreach($chats as $c){ ?>
                                <tr>
                                    <td><?php echo $c['idpedido'] ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($c['cadastro'])) ?></td>
                                    <td><?php echo $c['cliente'] ?></td>
                                    <td><?php echo $c['ultimo'] ?></td>
                                    <td><?php echo $c['status'] ?></td>
                                    <td class="text-center">
                                        <i onclick="abreChat(<?php echo $c['idpedido'] ?>)" data-toggle="modal" data-target="#chatModal" style="font-size: 20px;" class="fa fa-comment" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
            <?php if($chats == null) { ?>
		        <div class="col-md-12 text-center">
		            <p>Nenhum chat encontrado!</p>
		        </div>
	        <?php } ?>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="pagination-links"><?php echo $links; ?></p>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: transparent; border: 0px;">
      <div class="modal-body">
        <div class="row">
            <div class="col-xl-12">
                <input type="hidden" id="id" name="id">
                
                <div style="background: white; box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;height: 500px;width: 450px;border-radius: 30px;border: 1px solid #cacaca;padding: 10px;">
                    <div id="areaMensagem" style="padding: 10px; overflow: auto; height: 75%; width: 100%">
                        
                        <div id="loading-chat" style="margin-top: 35%;" class="text-center">
                            <img style="width: 70px; height: 70px;" src="<?php echo base_url('imagens/loadingSimples.gif') ?>">
                        </div>

                    </div>
                    <div id="areaFooter" style="height: 25%; width: 100%">
                        <div class="row" style="width: 100%;height: 100%;">
                            <div class="col-xl-9">
                                <textarea id="mensagem" name="mensagem" style="height: 85%;position: relative;left: 4%; top: 10%" class="form-control"></textarea>
                            </div>
                            <div class="col-xl-3" style="position: relative;top: 15%;left: 2%;">
                                <div class="row">
                                    <div class="col-xl-12 form-group">
                                        <button class="btn btn-block btn-primary" onclick="$('#anexo').click()">Anexo</button>
                                        <input style="display: none" type="file" onchange="temAnexo()" name="anexo" id="anexo">
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <button class="btn btn-block btn-primary" onclick="addMensagem()">Enviar</button>
                                    </div>
                                </div>
                            </div>
                            <label style="font-size: 12px; color: red; margin-left: 7%;">Permitido arquivos com extensão png, pdf e jpeg sem espaço no nome.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function abreChat(id){
        $('#id').val(id);
        getMensagem();
    }
</script>



<script>
        function addMensagem(){
            
            if($('#mensagem').val() != "" && $('#mensagem').val() != " " && $('#mensagem').val() != null){
                var data = new Date();
                var mensagem = "";
                
                if($('#anexo').val() != "" && $('#anexo').val() != " " && $('#anexo').val() != null){
                    var url = '<?php echo base_url('imagens/chat/') ?>' + $('#id').val() + '-' + $('#anexo')[0].files[0].name;
                    
                    var mensagem = "<span id='"+url+"' onclick='janelaSecundaria(this)'><img src='<?php echo base_url('imagens/placeholder-image.png') ?>' style='cursor: pointer; width: 100px; height: 90px'>"+
                    $('#anexo')[0].files[0].name + "</span>";
                } else {
                    mensagem = $('#mensagem').val();   
                }
                
                var div = '<div class="mensagens form-group" style="float: right;">'+
                    '<div class="row">'+
                        '<div class="col-xl-12">'+
                            '<p style="font-size: 12px;" class="m-0 p-0">'+data.getDate()+'/'+(data.getMonth() + 1)+'/'+data.getFullYear()+' '+data.getHours()+':'+data.getMinutes()+'</p>'+
                        '</div>'+
                        '<div class="col-xl-12">'+
                            '<p style="padding-bottom: 7px!important; font-weight: 700" class="m-0 p-0"><?php echo ucwords(strtolower($this->session->userdata('nome'))) ?></p>'+
                        '</div>'+
                        '<div class="col-xl-12">'+
                            '<p>'+mensagem+'</p>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                
                
                
                $('#areaMensagem').append(div);
                
                var elem = document.getElementById('areaMensagem');
                elem.scrollTop = elem.scrollHeight;
                
                dados = new FormData();
                
                dados.append('mensagem', mensagem);  
                
                if($('#anexo').val() != "" && $('#anexo').val() != " " && $('#anexo').val() != null){
                    console.log($('#anexo')[0].files[0]);
                    dados.append('anexo', $('#anexo')[0].files[0]);
                    dados.append('nomeArquivo', $('#id').val() + '-' + $('#anexo')[0].files[0].name);
                } 
                
                dados.append('pedido', $('#id').val());
                dados.append('cliente', '<?php echo $this->session->userdata('nome') ?>');
                dados.append('admin', 1);
                $.ajax({
                    url: '<?php echo base_url('chat/insertChat'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    error: function(xhr, status, error) {
                        $('#mensagem').val('');
                        $('#anexo').val('');
                        
                        console.log(xhr.responseText);
                    },
                    success: function(data) {
                        $('#mensagem').val('');
                        $('#anexo').val('');
                    },
                });
            } else {
                $('#mensagem').focus();
            }
            document.getElementById("mensagem").disabled = false;
        }
    </script>
    
    <script>
        function janelaSecundaria(url){
            window.open($(url).attr('id'),"janela1","width=550,height=350","scrollbars=YES");
        }
    </script>
    
    
    <script>
        function temAnexo(){
            
            if($('#anexo').val() != "" && $('#anexo').val() != " " && $('#anexo').val() != null){
                $('#mensagem').val($('#anexo')[0].files[0].name);
                document.getElementById("mensagem").disabled = true;
            } 

        }
    </script>
    
    
    <script>
        function getMensagem(){
            $('#areaMensagem').empty();
            $('#loading-chat').show();
            
            dados = new FormData();
            dados.append('pedido', $('#id').val());
            dados.append('admin', 1);
            
            $.ajax({
                url: '<?php echo base_url('chat/getChat'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                error: function(xhr, status, error) {
                    $('#loading-chat').hide();
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    console.log(data);
                    
                    $('#loading-chat').hide();
                    
                    for(var x = 0; x < data.length;x++){
                        if(data[x].admin == 0){
                            var float = "float: left";
                        } else {
                            var float = "float: right";
                        }
                        
                        var div = '<div class="mensagens form-group" style="'+float+'">'+
                            '<div class="row">'+
                                '<div class="col-xl-12">'+
                                    '<p style="font-size: 12px;" class="m-0 p-0">'+data[x].dataHora+'</p>'+
                                '</div>'+
                                '<div class="col-xl-12">'+
                                    '<p style="padding-bottom: 7px!important; font-weight: 700" class="m-0 p-0">'+data[x].nome+'</p>'+
                                '</div>'+
                                '<div class="col-xl-12">'+
                                    '<p>'+data[x].mensagem+'</p>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                        
                        $('#areaMensagem').append(div);
                
                        setTimeout(function scrollDown(){var elem = document.getElementById('areaMensagem');elem.scrollTop = elem.scrollHeight;}, 100);
                    }
                },
            });

        }
    </script>
