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
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>">Clientes</a></li>
                <li class="breadcrumb-item" aria-current="page">Edição</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h2 style="color: #3a0b0c;"><b>EDIÇÃO CLIENTE</b></h2>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('f1cab9b535228cff5608d7773ea6ca8a');?>" method="post" enctype='multipart/form-data' id="form">
                <input type="hidden" id="id" name="id" value="<?php echo $cliente['cliente_id'] ?>"> 
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                            <div class="col-md-12">
                                
                                <ul class="nav nav-tabs">
                                  <li class="tab-li active" id="li_dados" data-target="dados" data-fonte="li_dados"><a>Dados</a></li>
                                </ul>
                                
                                
                                <div id="dados">
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-12 form-group">
                                            <h4><b>Dados pessoais:</b></h4>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Nome:</b></label>
                                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do Cliente" value="<?php echo $cliente['cliente_nome'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>CPF:</b></label>
                                            <input type="text" id="cpf" name="cpf" class="form-control cpf" placeholder="CPF" value="<?php echo $cliente['cliente_cpf'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Data de nascimento:</b></label>
                                            <input type="date" id="data" name="data" class="form-control" placeholder="dd/mm/yyyy" value="<?php echo $cliente['cliente_nascimento'] ?>">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label><b>Email:</b></label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $cliente['cliente_email'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Telefone:</b></label>
                                            <input type="text" id="telefone" name="telefone" class="form-control telefone" placeholder="Telefone" value="<?php echo $cliente['cliente_telefone'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Gênero:</b></label>
                                            <select class="form-control" name="genero" id="genero"> 
                                              <option value="" selected disabled> Não Cadastrado </option>
                                              <option value="MASCULINO">Masculino</option>
                                              <option value="FEMININO">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                <div id="endereco" >
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-12 form-group">
                                            <h4><b>Endereço:</b></h4>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>CEP:</b></label>
                                            <input type="text" onkeyup="autofillCEP()" onfocusout="autofillCEP()" id="cep" name="cep" class="form-control cep" placeholder="00000-000" value="<?php echo $cliente['cliente_cep'] ?>" required>
                                        </div>
                                            <div class="col-md-4 form-group">
                                                <label><b>Cidade:</b></label>
                                                <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cliente['cliente_cidade'] ?>">
                                            </div>
                                            
                                            <div class="col-md-4 form-group">
                                        <label style="color: black;"><b style="color: black">Estado:</b></label>
                                        <select class="form-control" id="estado" name="estado" required>
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
                                        </div>
                                    <div class="row" style="margin-top: 2%">    
                                    <div class="col-md-4 form-group">
                                            <label><b>Endereço:</b></label>
                                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $cliente['cliente_endereco'] ?>">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><b>Bairro:</b></label>
                                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $cliente['cliente_bairro'] ?>">
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <label><b>N°:</b></label>
                                            <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $cliente['cliente_numero'] ?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label><b>Complemento:</b></label>
                                            <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $cliente['cliente_complemento'] ?>">
                                        </div>
                                    </div>    
                                </div> 
                                    
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                            &nbsp;&nbsp;
                                            <a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>" style="margin-right: 15px;" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                                
                </div>
            </form>
        </div>
    </section>
</section>

<script>
    $(document).ready(function(){
        $('#genero').val('<?php echo $cliente['cliente_genero'] ?>').change();
        $('#estado').val('<?php echo $cliente['cliente_estado'] ?>').change();
        $('.cep').mask('00000-000');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        
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
                            $('#endereco').val(rua[0]);
                        }else if(cep.cep_rua.indexOf(' - ') > 0){
                            var rua = cep.cep_rua.split(' - ');
                            $('#endereco').val(rua[0]);
                        }else{
                            $('#endereco').val(cep.cep_rua);
                        }
                    }
                },
            });
        }
    }
</script>