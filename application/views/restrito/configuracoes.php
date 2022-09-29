<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-multiselect.min.css')?>" />
<style>
    .card {
        height: auto;
    }
    
    .nav-tabs{
        background-color: white;
    }
    
    .nav-link{
        font-size: 25px;
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

<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Definições</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('8fb192af45f75504361d0011c1677415') ?>">Ajustes</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <p class="new-principal-titulo">Ajustes</p>
                    </div>
                </div>
            </div>
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="true">Pagamento</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" id="chaves-tab" data-toggle="tab" href="#chaves" role="tab" aria-controls="chaves" aria-selected="true">Chaves</a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link" id="gestoremail-tab" data-toggle="tab" href="#gestoremail" role="tab" aria-controls="gestoremail" aria-selected="true">E-mail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="correio-tab" data-toggle="tab" href="#correio" role="tab" aria-controls="correio" aria-selected="true">Envios</a>
                </li>
            </ul>
            
            <br>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="gestoremail" role="tabpanel" aria-labelledby="gestoremail-tab">
                    <div class="container">
                        <form action="<?php echo base_url('1b447af94eb10e8831c155c01be26599') ?>" method="post">
                            <div class="row">
                                <div class="col-md-3 form-group text-center">
                                    <label class="nome-form" style="font-size: 15px;"><b>PROTOCOL</b></label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" id="email_protocol" name="email_protocol" class="form-control" placeholder="Protocol" value="<?php echo $email['email_protocol']; ?>" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3 form-group text-center">
                                    <label class="nome-form" style="font-size: 15px;"><b>SMTP_USER</b></label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" id="email_user" name="email_user" class="form-control" placeholder="smtp_usuário" value="<?php echo $email['email_user']; ?>" required>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-md-3 form-group text-center">
                                    <label class="nome-form" style="font-size: 15px;"><b>SENHA</b></label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" id="email_pass" name="email_pass" class="form-control" placeholder="smtp_pass" value="<?php echo $email['email_pass']; ?>" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3 form-group text-center">
                                    <label class="nome-form" style="font-size: 15px;"><b>SMTP_HOST</b></label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" id="email_host" name="email_host" class="form-control" placeholder="smtp_host" value="<?php echo $email['email_host']; ?>" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3 form-group text-center">
                                    <label class="nome-form" style="font-size: 15px;"><b>SMTP_PORT</b></label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" id="email_port" name="email_port" class="form-control" placeholder="smtp_port" value="<?php echo $email['email_port']; ?>" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3 form-group text-center">
                                    <label class="nome-form" style="font-size: 15px;"><b>SMTP_TIMEOUT</b></label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" id="email_timeout" name="email_timeout" class="form-control" placeholder="smtp_timeout" value="<?php echo $email['email_timeout']; ?>" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3 form-group text-center">
                                    <label class="nome-form" style="font-size: 15px;"><b>CHARSET</b></label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" id="email_charset" name="email_charset" class="form-control" placeholder="Charset" value="<?php echo $email['email_charset']; ?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12" style="text-align: end;">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    &nbsp;&nbsp;
                                    <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
                
                <div class="tab-pane fade" id="correio" role="tabpanel" aria-labelledby="correio-tab">
                    <div class="row container mx-auto" style="margin-top: 2%">
                        <form action="<?php echo base_url('ab8a2766f50ffb443958ea946a9ba731') ?>" method="post">    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <label class="nome-form" style="font-size:15px;"><b>SEDEX</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Cep Origem</label>
                                            <input type="text" id="cep1" name="cep1" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[0]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select name="status1" id="status1" class="form-control">
                                                <option value="1" <?php if($correios[0]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[0]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                         <div class="col-md-2 form-group">
                                             <label>Dias extra</label>
                                            <input type="text" id="entregamais1" name="entregamais1" class="cep form-control" placeholder="Dias" value="<?php echo $correios[0]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center" >
                                            <label class="nome-form" style="font-size:15px;"><b>PAC</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Cep Origem</label>
                                            <input type="text" id="cep2" name="cep2" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[1]['cepOrigem'] ?>" required>                
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select name="status2" id="status2" class="form-control">
                                                <option value="1" <?php if($correios[1]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[1]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group">
                                             <label>Dias extra</label>
                                            <input type="text" id="entregamais2" name="entregamais2" class="cep form-control" placeholder="Dias" value="<?php echo $correios[1]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <label class="nome-form" style="font-size: 15px;"><b>SEDEX 12</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Cep Origem</label>
                                            <input type="text" id="cep3" name="cep3" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[2]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Contrato</label>
                                            <input onchange="contrato_verificar1()" type="text" id="contrato3" name="contrato3" class="form-control" placeholder="Contrato" value="<?php echo $correios[2]['contratoCorreio'] ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select name="status3" id="status3" class="form-control" disabled>
                                                <option value="1" <?php if($correios[2]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[2]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <label class="nome-form" style="font-size:15px;"><b>SEDEX 10</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Cep origem</label>
                                            <input type="text" id="cep4" name="cep4" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[3]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Contrato</label>
                                            <input onchange="contrato_verificar2()" type="text" id="contrato4" name="contrato4" class="form-control" placeholder="Contrato" value="<?php echo $correios[3]['contratoCorreio'] ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select name="status4" id="status4" class="form-control" disabled>
                                                <option value="1" <?php if($correios[3]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[3]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <label class="nome-form" style="font-size:15px;"><b>SEDEX HOJE</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Cep origem</label>
                                            <input type="text" id="cep5" name="cep5" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[4]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Contrato</label>
                                            <input onchange="contrato_verificar3()" type="text" id="contrato5" name="contrato5" class="form-control" placeholder="Contrato" value="<?php echo $correios[4]['contratoCorreio'] ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select name="statu5" id="status5" class="form-control" disabled>
                                                <option value="1" <?php if($correios[4]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[4]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <label class="nome-form" style="font-size:15px;"><b>RETIRADA NA LOJA</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select name="status10" id="status10" class="form-control">
                                                <option value="1" <?php if($correios[9]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[9]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                         <div class="col-md-2 form-group">
                                             <label>Dias extra</label>
                                            <input type="text" id="entregamais10" name="entregamais10" class="cep form-control" placeholder="Dias" value="<?php echo $correios[9]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <label class="nome-form" style="font-size:15px;"><b>GRÁTIS POR COMPRA</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>CEP origem</label>
                                            <input type="text" id="cep7" name="cep7" class="cep form-control" placeholder="CEP ORIGEM"  value="<?php echo $correios[6]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select onchange="verifica_gratis(1)" name="status7" id="status7"  class="form-control">
                                                <option value="1" <?php if($correios[6]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[6]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group ">
                                            <label>Valor</label>
                                            <input type="text" id="valor7" name="valor7" class="money form-control" placeholder="Valor"  value="<?php echo $correios[6]['valorMinimo'] ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Dias extras</label>
                                            <input type="text" id="entregamais7" name="entregamais7" class="cep form-control" placeholder="Dias" value="<?php echo $correios[6]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <label class="nome-form" style="font-size:15px;"><b>GRÁTIS POR ESTADO(S)</b></label>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label>CEP origem</label>
                                            <input type="text" id="cep8" name="cep8" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[7]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Ativo</label>
                                            <select onchange="verifica_gratis(2)" name="status8" id="status8"  class="form-control">
                                                <option value="1" <?php if($correios[7]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                <option value="0" <?php if($correios[7]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Estados</label>
                                            <select id="estados8" name="estados8[]" multiple class="js-example-basic-multiple" style="width: 100%!important">
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
                                        <div class="col-md-2 form-group">
                                            <label>Dias extra</label>
                                            <input type="text" id="entregamais8" name="entregamais8" class="cep form-control" placeholder="Dias" 
                                            value="<?php echo $correios[7]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                                            <label class="nome-form" style="font-size:15px;"><b>GRÁTIS POR ESTADO(S) E VALOR</b></label>
                                        </div>
                                        <div class="col-md-10 row p-0 m-0">
                                            <div class="col-md-3 form-group">
                                                <label>CEP origem</label>
                                                <input type="text" id="cep9" name="cep9" class="cep form-control" placeholder="CEP ORIGEM" 
                                                value="<?php echo $correios[8]['cepOrigem'] ?>" required>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label>Ativo</label>
                                                <select onchange="verifica_gratis(3)" name="status9" id="status9"  class="form-control">
                                                    <option value="1" <?php if($correios[8]['dadosAtivo'] == 1){ echo 'selected'; }  ?>>Ativo</option>
                                                    <option value="0" <?php if($correios[8]['dadosAtivo'] == 0){ echo 'selected'; }  ?>>Inativo</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label>Valor</label>
                                                <input type="text" id="valor9" name="valor9" class="money form-control" placeholder="Valor"  
                                                value="<?php echo $correios[8]['valorMinimo'] ?>">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label>Dias Extra</label>
                                                <input type="text" id="entregamais9" name="entregamais9" class="cep form-control" placeholder="Dias" 
                                                value="<?php echo $correios[8]['dias_entrega_extra'] ?>">
                                            </div>
                                            <div class="col-md-12 form-group ">
                                                <label>Estados</label>
                                                <select id="estados9" name="estados9[]" multiple class="js-example-basic-multiple" style="width: 100%!important">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col-md-12" style="text-align: end;">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    &nbsp;&nbsp;
                                    <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
 <script src="<?php echo base_url('assets/js/bootstrap-multiselect.min.js')?>"></script>
 
 <script>
    $(document).ready(function(){
        <?php $aux = explode('¬', $correios[7]['regiaoGratis']); ?>
        <?php foreach($aux as $a){ ?>
            $("#estados8 option[value='" + '<?php echo $a ?>' + "']").prop("selected", true);
        <?php } ?>
        
        <?php $aux = explode('¬', $correios[8]['regiaoGratis']); ?>
        <?php foreach($aux as $a){ ?>
            $("#estados9 option[value='" + '<?php echo $a ?>' + "']").prop("selected", true);
        <?php } ?>
        
        if($('#contrato3').val() != "" && $('#contrato3').val() != " "){
            $('#status3').prop('disabled', false);
        }
        if($('#contrato4').val() != "" && $('#contrato4').val() != " "){
            $('#status4').prop('disabled', false);
        }
        if($('#contrato5').val() != "" && $('#contrato5').val() != " "){
            $('#status5').prop('disabled', false);
        }
        
        
        $('.cep').mask('00000-000');
        $('.money').mask("#.##0,00", {reverse: true});
        
        $('#gestoremail-tab').click();//alterado || anterior = $('#payment-tab').click(); chaves-tab
        
        $('#framework').multiselect({
            nonSelectedText: 'Estados',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth:'400px'
         });
     
        $('#framework_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
             $.ajax({
                url:"insert.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    $('#framework option:selected').each(function(){
                        $(this).prop('selected', false);
                    });
                    $('#framework').multiselect('refresh');
                    alert(data);
                }
            });
        });
     });
     
</script>


<script>
    
    function Estrutura(){
        var x = document.getElementById("gestor").value;
        if(x == "PagSeguro"){
            PagSeguro();
            $('#acesstoken').val('<?php echo $pagamentos[0]['gestor_acesstoken'] ?>');
            $('#emailPag').val('<?php echo $pagamentos[0]['gestor_email'] ?>');
            if(<?php echo $pagamentos[0]['gestor_sandbox'] ?> == 1){
                $('#sandboxId').prop('checked', true);    
            } else {
                $('#sandboxId').prop('checked', false);    
            }
        }else if(x == "MercadoPago"){
            MercadoPago();
        }else if(x == "Juno"){
            Juno();
        }else if(x == "GetNet"){
            GetNet();
        }
    }
    
    function PagSeguro(){
        document.getElementById('chavePublica').style.display = "none";
        document.getElementById('chavePrivada').style.display = "none";
        document.getElementById('clienteId').style.display = "none";
        document.getElementById('secretClient').style.display = "none";
        document.getElementById('Token').style.display = "flex";
        document.getElementById('emailClient').style.display = "flex";
        document.getElementById('sandbox').style.display = "flex";
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[0]['gestor_acesstoken'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[0]['gestor_email'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[0]['gestor_sandbox'] ?>;
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[0]['gestor_clientid'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[0]['gestor_publickey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[0]['gestor_privatekey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[0]['gestor_clientsecret'] ?>;

    }
    
    function MercadoPago(){
        document.getElementById('Token').style.display = "none";
        document.getElementById('chavePublica').style.display = "flex";
        document.getElementById('chavePrivada').style.display = "flex";
        document.getElementById('clienteId').style.display = "flex";
        document.getElementById('secretClient').style.display = "flex";
        document.getElementById('emailClient').style.display = "flex";
        document.getElementById('sandbox').style.display = "flex";
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[1]['gestor_acesstoken'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[1]['gestor_email'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[1]['gestor_sandbox'] ?>;
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[1]['gestor_clientid'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[1]['gestor_publickey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[1]['gestor_privatekey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[1]['gestor_clientsecret'] ?>;
    }
    
    function Juno(){
        document.getElementById('Token').style.display = "flex";
        document.getElementById('chavePublica').style.display = "flex";
        document.getElementById('chavePrivada').style.display = "none";
        document.getElementById('clienteId').style.display = "none";
        document.getElementById('secretClient').style.display = "none";
        document.getElementById('emailClient').style.display = "none";
        document.getElementById('sandbox').style.display = "flex";
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[2]['gestor_acesstoken'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[2]['gestor_email'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[2]['gestor_sandbox'] ?>;
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[2]['gestor_clientid'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[2]['gestor_publickey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[2]['gestor_privatekey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[2]['gestor_clientsecret'] ?>;
    }
    
    function GetNet(){
        document.getElementById('Token').style.display = "none";
        document.getElementById('chavePublica').style.display = "flex";
        document.getElementById('chavePrivada').style.display = "flex";
        document.getElementById('clienteId').style.display = "none";
        document.getElementById('secretClient').style.display = "none";
        document.getElementById('emailClient').style.display = "none";
        document.getElementById('sandbox').style.display = "flex";
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[3]['gestor_acesstoken'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[3]['gestor_email'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[3]['gestor_sandbox'] ?>;
        //document.getElementById('acesstoken').value = <?php echo $pagamentos[3]['gestor_clientid'] ?>;
        //document.getElementById('emailPag').value = <?php echo $pagamentos[3]['gestor_publickey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[3]['gestor_privatekey'] ?>;
        //document.getElementById('sandboxId').value = <?php echo $pagamentos[3]['gestor_clientsecret'] ?>;
    }

</script>


<script>
    function contrato_verificar1(){
        if($('#contrato3').val() != "" && $('#contrato3').val() != " "){
            $('#status3').prop('disabled', false);
        }
    }
    function contrato_verificar2(){
        if($('#contrato4').val() != "" && $('#contrato4').val() != " "){
            $('#status4').prop('disabled', false);
        }
    }
    function contrato_verificar3(){
        if($('#contrato5').val() != "" && $('#contrato5').val() != " "){
            $('#status5').prop('disabled', false);
        }
    }
</script>

<script>
    function verifica_gratis(id){
        if(id == 1){
            if($('#status6').val() == 1){
                if($('#status8').val() != 0){
                    $('#status8').val(0).change();    
                }
            } 
        } else if(id == 2) {
            if($('#status7').val() == 1){
                if($('#status8').val() != 0){
                    $('#status8').val(0).change();    
                }
            } 
        } else if(id == 3) {
            if($('#status8').val() == 1){
                if($('#status6').val() != 0){
                    $('#status6').val(0).change();
                }
                if($('#status7').val() != 0){
                    $('#status7').val(0).change();
                }
            }
        }
    }
</script>

