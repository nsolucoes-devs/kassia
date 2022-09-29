<style>
    .select2{
        width: 100%!important;
    }
    .input-div{
        width: calc(100% - 50px);
        padding: 0;
        margin: 0;
        float: left;
    }
    .btn-div{
        width: 50px;
        padding: 0;
        margin: 0;
        float: left;
    }
    .btn-div button{
        width: 40px;
        margin-left: 9px;
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
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Marketing</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('18b43c6a536a8fe1362f7a3887936be6') ?>">Campanhas</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h2 style="color: #3a0b0c;"><b>CAMPANHAS</b></h2>
                    </div>
                </div>
            </div>
            <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                <div class="col-md-12">
                    <h4 style="color: brown">Campanha Email:</h4>    
                    <form method="post" action="<?php echo base_url('97e90e0e07ad4ba6ef8928b96c6a09f5') ?>">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form-group">
                                    <h5 style="color: brown">Dados</h5>
                                </div>
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" placeholder="Digite o Título" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mensagem:</label>
                                    <textarea class="form-control" rows=3 maxlength="100" id="mensagem" name="mensagem" required placeholder="Digite aqui"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <h5 style="color: brown">Filtros</h5>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Data Inicial</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Data Fim</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary btn-block"  title="Enviar Email"><b>ENVIAR E-MAILS</b></button>
                                </div>
                            </div>
                        </div>
                        <hr style="height: 1px; background-color: lightgrey; border: none;">
                    </form>
                </div>
            </div>
            
            <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                <div class="col-md-12">
                    <h4 style="color: brown">Campanha SMS:</h4> 
                    <form method="post" action="<?php echo base_url('97e90e0e07ad4ba6ef8928b96c6a09f5') ?>">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <h5 style="color: brown">Dados</h5>
                                <label>Mensagem a ser enviada (Máx: 100 caracteres):</label>
                                <textarea class="form-control" style="height: 210px;" rows=3 maxlength="100" id="mensagem" name="mensagem" required placeholder="Digite aqui"></textarea>
                                <div id="div_restante" style="width: 100%; text-align: right">
                                    <span>Restam: </span><span id="restante">100</span><span>/100</span>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="col-md-12">
                                    <h5 style="color: brown">Filtros</h5>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Status de Compra:</label>
                                    <select id="status" name="status" class="sel-3">
                                        <option value="" selected>-- Todos --</option>
                                        <?php foreach($status as $st){
                                            echo "<option value='".$st['id']."'>".$st['nome']."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Início do Período:</label>
                                    <input type="date" class="form-control" id="inicio" name="inicio">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Final do Período:</label>
                                    <input type="date" class="form-control" id="final" name="final">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Qtd Envios:</label>
                                    <input type="text" class="form-control" id="final" name="final">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Cidade:</label>
                                    <select class="sel-5">
                                        <?php foreach($cidade as $c){ ?>
                                            <option><?php echo $c['cidade']  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Estado:</label>
                                    <select class="form-control">
                                    	<option value="AC">Acre</option>
                                    	<option value="AL">Alagoas</option>
                                    	<option value="AP">Amapá</option>
                                    	<option value="AM">Amazonas</option>
                                    	<option value="BA">Bahia</option>
                                    	<option value="CE">Ceará</option>
                                    	<option value="DF">Distrito Federal</option>
                                    	<option value="ES">Espírito Santo</option>
                                    	<option value="GO">Goiás</option>
                                    	<option value="MA">Maranhão</option>
                                    	<option value="MT">Mato Grosso</option>
                                    	<option value="MS">Mato Grosso do Sul</option>
                                    	<option value="MG">Minas Gerais</option>
                                    	<option value="PA">Pará</option>
                                    	<option value="PB">Paraíba</option>
                                    	<option value="PR">Paraná</option>
                                    	<option value="PE">Pernambuco</option>
                                    	<option value="PI">Piauí</option>
                                    	<option value="RJ">Rio de Janeiro</option>
                                    	<option value="RN">Rio Grande do Norte</option>
                                    	<option value="RS">Rio Grande do Sul</option>
                                    	<option value="RO">Rondônia</option>
                                    	<option value="RR">Roraima</option>
                                    	<option value="SC">Santa Catarina</option>
                                    	<option value="SP">São Paulo</option>
                                    	<option value="SE">Sergipe</option>
                                    	<option value="TO">Tocantins</option>
                                    </select>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-block" title="Enviar SMS"><b>ENVIAR MENSAGENS</b></button>
                                    <div class="col-md-12 text-right" style="margin-top: 10px;">
                                        <a data-toggle="modal" data-target="#exampleModal">Envio Manual</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="height: 1px; background-color: lightgrey; border: none;">
                    </form>
                </div>
            </div>
        
            <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                <div class="col-md-12">
                    <h4 style="color: brown">Campanha Telegram:</h4> 
                    <form method="post" action="<?php echo base_url('97e90e0e07ad4ba6ef8928b96c6a09f5') ?>">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <h5 style="color: brown">Dados</h5>
                                <textarea class="form-control" rows=3 style="height: 174px;" id="mensagem" name="mensagem" required placeholder="Digite aqui"></textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="col-md-12">
                                    <h5 style="color: brown">Filtros</h5>
                                </div>
                            
                                <div class="col-md-6 form-group">
                                    <label>Início do Período:</label>
                                    <input type="date" class="form-control" id="inicio" name="inicio">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Final do Período:</label>
                                    <input type="date" class="form-control" id="final" name="final">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-block" title="Enviar Telegram"><b>ENVIAR TELEGRAM</b></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<div id="sucesso" class="modal">
    <div class="modal-dialog">
    
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title">Sucesso!</h4>
            </div>
            
            <div class="modal-body text-center">
                <p style="font-size: 20px">Sua mensagem foi enviada com sucesso!</p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #4ECDC4; color: white;" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(60deg, #43006d, #c85ce4);">
        <h5 class="modal-title" style="display: inline;" id="exampleModalLabel">Envio Manual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 form-group">
                <label>Mensagem</label>
                <textarea class="form-control"></textarea>
            </div>
            <div class="col-md-12 form-group">
                <label>Número</label>
                <input type="text" id="telefone_manual" class="form-control">
            </div>
        </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary">Enviar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function (){
        calc_restante();
        $('.sel-1').select2({theme: 'bootstrap'});
        $('.sel-2').select2({theme: 'bootstrap'});
        $('.sel-3').select2({theme: 'bootstrap'});
        $('.sel-4').select2({theme: 'bootstrap'});
        $('.sel-5').select2({theme: 'bootstrap'});
        <?php if($sucesso != null){echo "sucesso();";} ?>
        
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('#telefone_manual').mask(SPMaskBehavior, spOptions);
    });

    $('#mensagem').on("input keyup", function(){
        calc_restante();
    });
    
    function calc_restante(){
        var limite = 100;
        var digitados = $('#mensagem').val().length;
        var restantes = limite - digitados;
    
        $("#restante").text(restantes);
        
        if(restantes == 0){
            $('#div_restante').css('color', 'red');
        }else{
            $('#div_restante').css('color', '#797979');
        }
    }
    
    function resetDate(str){
        $('#'+str).val('');
    }
    
    function sucesso(){
        $('#sucesso').modal('show');
    }
</script>