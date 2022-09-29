   <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile = 1;
        } else {
            $mobile = 0;
        }
    ?>
<style>
    nav.primary-navigation {
    	 margin: 0 auto;
    	 display: block;
    	 text-align: center;
    	 font-size: 16px;
    }
     nav.primary-navigation ul li {
    	 list-style: none;
    	 margin: 0 auto;
    	 display: inline-block;
    	 position: relative;
    	 text-decoration: none;
    	 text-align: center;
    	 font-family: "Oswald",sans-serif;
    }
     nav.primary-navigation li a {
    	 color: #444;
    }
     nav.primary-navigation ul li ul {
    	 visibility: hidden;
    	 opacity: 0;
    	 position: absolute;
    	 padding-left: 0;
    	 left: 0;
    	 display: none;
    	 background: white;
    }
     nav.primary-navigation ul li:hover > ul, nav.primary-navigation ul li ul:hover {
    	 visibility: visible;
    	 opacity: 1;
    	 display: block;
    	 min-width: 250px;
    	 text-align: left;
    	 padding-top: 20px;
    	 box-shadow: 0px 3px 5px -1px #ccc;
    }
     nav.primary-navigation ul li ul li {
    	 clear: both;
    	 width: 100%;
    	 text-align: left;
    	 margin-bottom: 20px;
    	 border-style: none;
    }
    nav.primary-navigation li a:hover {
    	 border: 0!important;
    	 text-decoration: none!important;
    }
    .icone-menu{
        font-size: 25px;
    }
    
    .a-menu{
         font-size: 21px;
    }
    .li-teste{
        width: 100%;
    }
    .li-teste:hover .a-menu {
        color: #f5d216;
    }
    .row-hover{
        cursor: pointer;
        padding: 5px 0;
        transition: margin 0.5s;
    }
    .row-hover:hover{
        margin-left: 1%;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }
    .row-hover-active{
        color: #007bff;
        margin-left: 1%;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }
    .contact-section{
        padding-bottom: 30%!important;
        padding: 20px;
        background-color: #ffffff;
    }
    
    #pedidos_afiliado .row-hover-active {
        color: var(--base-color)!important;
    }
    
    @media(max-width: 500px){
        #divWelcome{
            display: none;
        }
        #titulo-cliente{
            text-align: center;
            font-size: 16px;
        }
        #li_dados{
            padding-right: 15px;
            margin: 0;
            font-size: 17px;
        }
        #li_endereco{
            padding-right: 15px;
            margin: 0;
            font-size: 17px;
        }
        #li_pedido{
            padding-right: 1px;
            margin: 0;
            font-size: 17px;
        }
        #nav-cima{
            margin-top: 5%;
        }
        .icone-menu{
            font-size: 19px;
            position: absolute;
        }   
        .a-menu{
         font-size: 15px;
        }
        .card-body{
            padding: 0px!important;
        }
        #menu_dados{
            line-height: 5px!important;
            margin-top: 10%!important;
        }
        #menu_endereco{
            line-height: 5px!important;
            margin-top: 10%!important;
        }
        #redefinir-button{
            text-align: center!important; 
            margin-top: 5%;
            margin-bottom: 5%;
        }
        .buttons{
            text-align: center!important;     
        }
        .contact-section{
            padding-top: 40%;
        }
        .pDados{
            margin-top: 10px!important;
            margin-left: 5px!important;
            margin-bottom: 15px!important;
        }
        .opc-perfil{position: relative; top: -11px; left: 10%; width: 40%;}
        .icone-menu{position: relative; top: 16px; right: 46%;}
    }
    
    @media ( min-width: 501px ) and ( max-width: 766px ){
        #divWelcome{
            display: none;
        }
        #titulo-cliente{
            text-align: center;
            font-size: 16px;
        }
        #li_dados{
            padding-right: 15px;
            margin: 0;
            font-size: 17px;
        }
        #li_endereco{
            padding-right: 15px;
            margin: 0;
            font-size: 17px;
        }
        #li_pedido{
            padding-right: 1px;
            margin: 0;
            font-size: 17px;
        }
        #nav-cima{
            margin-top: 5%;
        }
        .icone-menu{
            font-size: 19px;
            position: absolute;
        }   
        .a-menu{
         font-size: 15px;
        }
        .card-body{
            padding: 0px!important;
        }
        #menu_dados{
            line-height: 5px!important;
            margin-top: 10%!important;
        }
        #menu_endereco{
            line-height: 5px!important;
            margin-top: 10%!important;
        }
        #redefinir-button{
            text-align: center!important; 
            margin-top: 5%;
            margin-bottom: 5%;
        }
        .buttons{
            text-align: center!important;     
        }
        .contact-section{
            padding-top: 40%;
        }
        .pDados{
            margin-top: 10px!important;
            margin-left: 5px!important;
            margin-bottom: 15px!important;
        }
        .opc-perfil{position: relative; top: -11px; left: 10%; width: 40%;}
        .icone-menu{position: relative; top: 16px; right: 46%;}
    }
    
    /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .card-body{padding-top: 85px!important;}
            .opc-perfil{position: relative; top: -11px; left: 8%; width: 20%;}
            .icone-menu{position: relative; top: 16px; right: 46%;}
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .card-body{padding-top: 85px!important;}
            .opc-perfil{position: relative; top: -11px; left: 8%; width: 20%;}
            .icone-menu{position: relative; top: 16px; right: 46%;}
        }
        .corpoPedido{
            padding: 30px;
            border-radius: 10px;
            box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;
            cursor: pointer;
            border: 1px solid #d2d2d2;
            background: #f9f9f9;
            align-self: center;
        }
        
        .corpoPedido:hover{
            background: #e0e0e073;
        }
    
</style>

<section class="contact-section">
    <div class="container" style="margin-top: 7%;">
        <div class="card" style="border: 0">
            <div class="card-body" style="visibility: hidden; padding: 20px; padding-right: 7px!important; padding-left: 7px!important">
                <div class="row">
                    <div id="divWelcome" class="col-md-6 text-left">
                        <div class="row">
                            <div class="m-0 col-md-2 text-center form-group">
                                <i style="color: black;font-size: 50px" class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10 form-group" style="margin-bottom: auto; margin-top: auto">
                                <h5 id="titulo-cliente" style="color: #444">Bem Vindo, <?php echo ucfirst(strtolower($this->session->userdata('cliente_nome'))); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 text-right p-0">
                        <a href="<?php echo base_url('c8b39540f80ad8d4952cf79d651aec77') ?>">
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-sign-out-alt" aria-hidden="true"></i> SAIR
                            </button>
                        </a>
                    </div>
                </div>
                
                <div class="row" style="margin-top: 3%">
                    <div class="col-xl-2 form-group">
                        <nav role="navigation" id="nav-cima" class="primary-navigation">
                            <ul class="p-0 m-0">
                                <li id="li_dados" onclick="dados()" class="li-teste active">
                                    <div class="row-hover row">
                                        <div class="col-xl-2">
                                            <i id="i_dados" class="icone-menu fa fa-user" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-left col-xl-9 opc-perfil">
                                            <a class="a-menu" href="#dados">Dados</a>
                                        </div>
                                    </div>
                                </li>
                                <hr/>
                                <li id="li_endereco" onclick="endereco()" class="li-teste active" >
                                    <div class="row-hover row">
                                        <div class="col-xl-2">
                                            <i id="i_endereco"  class="icone-menu fa fa-map-marker" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-left col-xl-9 opc-perfil">
                                            <a class="a-menu" href="#endereco">Endereço</a>
                                        </div>
                                    </div>
                                </li>
                                <hr/>
                                <li id="li_pedido" onclick="pedido()" class="li-teste active">
                                    <div class="row-hover row">
                                        <div class="col-xl-2">
                                            <i id="i_pedido" class="icone-menu fa fa-list-alt" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-left col-xl-9 opc-perfil">
                                            <a class="a-menu" href="#pedidos">Pedidos</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-10" style="padding: 20px;box-shadow: rgb(0 0 0 / 16%) 0px 10px 36px 0px, rgb(0 0 0 / 6%) 0px 0px 0px 1px;">
                        <div id="menu_dados">
                            
                            <p style="font-weight: 900;font-size: 30px;color: #444;">Dados Pessoais</p>
                            <hr>

                            <div id="visualizar">
                                <div class="row">
                                    <div class="col-md-7 form-group">
                                        <label style="color: #444;"><b style="color: #444">Nome:</b></label>
                                        <p class="pDados m-0" style="color: #444"><?php echo ucwords(mb_strtolower($cliente['cliente_nome'])) ?></p>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label style="color: #444;"><b style="color: #444">CPF:</b></label>
                                        <p class="pDados m-0 cpf" style="color: #444"><?php echo $cliente['cliente_cpf'] ?></p>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label style="color: #444;"><b style="color: #444">E-mail:</b></label>
                                        <p class="pDados m-0" style="color: #444"><?php echo mb_strtolower($cliente['cliente_email']) ?></p>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="color: #444;"><b style="color: #444">Telefone:</b></label>
                                        <p class="pDados m-0 telefone" style="color: #444"><?php echo $cliente['cliente_telefone'] ?></p>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label style="color: #444;"><b style="color: #444">Gênero:</b></label>
                                        <p class="pDados m-0" style="color: #444"><?php echo ucwords(mb_strtolower($cliente['cliente_genero'])) ?></p>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="color: #444;"><b style="color: #444">Nascimento:</b></label>
                                        <p class="pDados m-0" style="color: #444"><?php if($cliente['cliente_nascimento']) { echo date('d/m/Y', strtotime($cliente['cliente_nascimento'])); } ?></p>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-12 form-group text-right">
                                        <button onclick="editar()" class="btn btn-primary">Editar</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="editar" style="display: none">
                                <form id="form-dados" action="<?php echo base_url('518244d885f7954e658e58590b55f00e') ?>" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $this->session->userdata('cliente_user_id') ?>">
                                    
                                    <div class="row">
                                        <div class="col-md-8 form-group">
                                            <label style="color: #444;"><b style="color: #444">Nome:</b></label>
                                            <input type="text" class="font-gui form-control" id="nome" name="nome" value="<?php echo ucwords(mb_strtolower($cliente['cliente_nome'])) ?>">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label style="color: #444;"><b style="color: #444">CPF:</b></label>
                                            <input type="text" class="cpf font-gui form-control" id="cpf" value="<?php echo $cliente['cliente_cpf'] ?>" readonly>
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label style="color: #444;"><b style="color: #444">E-mail:</b></label>
                                            <input type="text" id="email" name="email" class="font-gui form-control" value="<?php echo mb_strtolower($cliente['cliente_email']) ?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label style="color: #444;"><b style="color: #444">Telefone:</b></label>
                                            <input type="text" id="telefone" name="telefone" class="telefone font-gui form-control" value="<?php echo $cliente['cliente_telefone'] ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label style="color: #444;"><b style="color: #444">Gênero:</b></label>
                                            <select  id="genero" name="genero" class="font-gui form-control">
                                                <option value="" selected disabled>  Selecione  </option>
                                                <option value="FEMININO">Feminino</option>
                                                <option value="MASCULINO">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label style="color: #444;"><b style="color: #444">Nascimento:</b></label>
                                            <input id="nascimento" name="nascimento" type="text" class="date font-gui form-control" value="<?php echo date('d/m/Y', strtotime($cliente['cliente_nascimento'])) ?>">
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-md-6 form-group" id="redefinir-button">
                                            <button type="button"  data-toggle="modal" data-target="#exampleModalLong" class="btn btn-primary">Redefinir Senha</button>
                                        </div>
                                        <div class="col-md-6 text-right form-group buttons" style="padding-top: 5%;">
                                            <input type="submit" class="g-recaptcha btn btn-primary" value="Salvar">
                                            <button onclick="visualizar()" type="button" class="btn btn-secondary" style="margin-left: 2%;">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="menu_endereco">
                            <p style="font-weight: 900;font-size: 30px;color: #444;">Endereço</p>
                            <hr>

                            <div id="visualizar_endereco">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label style="color: #444;"><b style="color: #444">CEP:</b></label>
                                        <p class="m-0 cep pDados" style="color: #444"><?php echo $cliente['cliente_cep'] ?></p>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label style="color: #444;"><b style="color: #444">Endereço:</b></label>
                                        <p class="m-0 pDados" style="color: #444"><?php echo ucwords(mb_strtolower($cliente['cliente_endereco'])) ?></p>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label style="color: #444;"><b style="color: #444">Número:</b></label>
                                        <p class="m-0 pDados" style="color: #444"><?php echo $cliente['cliente_numero'] ?></p>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="color: #444;"><b style="color: #444">Complemento:</b></label>
                                        <p class="m-0 pDados" style="color: #444"><?php echo ucwords(mb_strtolower($cliente['cliente_complemento'])) ?></p>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label style="color: #444;"><b style="color: #444">Bairro:</b></label>
                                        <p class="m-0 pDados" style="color: #444"><?php echo ucwords(mb_strtolower($cliente['cliente_bairro'])) ?></p>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label style="color: #444;"><b style="color: #444">Cidade:</b></label>
                                        <p class="m-0 pDados" style="color: #444"><?php echo ucwords(mb_strtolower($cliente['cliente_cidade'])) ?></p>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label style="color: #444;"><b style="color: #444">Estado:</b></label>
                                        <p class="m-0 pDados" style="color: #444"><?php echo ucwords(mb_strtolower($cliente['cliente_estado'])) ?></p>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-12 form-group text-right">
                                        <button onclick="editar_endereco()" class="btn btn-primary">Editar</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="editar_endereco" style="display: none">
                                <form id="form-endereco" action="<?php echo base_url('c7a0f86bd55fc21784a214275d528b2c') ?>" method="post">
                                    <input type="hidden" name="id2" id="id2" value="<?php echo $this->session->userdata('cliente_user_id') ?>">
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                            <label style="color: #444;"><b style="color: #444">CEP:</b></label>
                                            <input type="text" onkeyup="autofillCEP()" class="cep form-control" id="cep" name="cep" value="<?php echo $cliente['cliente_cep'] ?>" required>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label style="color: #444;"><b style="color: #444">Endereço:</b></label>
                                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo ucwords(mb_strtolower($cliente['cliente_endereco'])) ?>" required>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label style="color: #444;"><b style="color: #444">Número:</b></label>
                                            <input type="text" class="form-control"  id="numero" name="numero" value="<?php echo $cliente['cliente_numero'] ?>" required>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label style="color: #444;"><b style="color: #444">Complemento:</b></label>
                                            <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo ucwords(mb_strtolower($cliente['cliente_complemento'])) ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label style="color: #444;"><b style="color: #444">Bairro:</b></label>
                                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo ucwords(mb_strtolower($cliente['cliente_bairro'])) ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label style="color: #444;"><b style="color: #444">Cidade:</b></label>
                                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo ucwords(mb_strtolower($cliente['cliente_cidade'])) ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label style="color: #444;"><b style="color: #444">Estado:</b></label>
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
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group text-right buttons">
                                            <input type="submit" class="g-recaptcha btn btn-primary" value="Salvar">
                                            <button type="button" onclick="visualizar_endereco()" class="btn btn-secondary" style="margin-left: 2%;">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                
                        <div id="menu_pedido">
                            <p style="font-weight: 900;font-size: 30px;color: #444;">Pedidos</p>
                            <hr>
                            <?php foreach($pedidos as $p){ ?>
                                <div class="form-group corpoPedido" onclick="verpedido(<?php echo $p['id'] ?>)">
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <p class="m-0 p-0" style="font-weight: 700;">#<?php echo $p['id'] ?></p>
                                        </div>
                                        <div class="col-xl-3">
                                            <p class="m-0 p-0"><?php echo date('d/m/Y H:i', strtotime($p['data'])) ?></p>
                                        </div>
                                        <div class="col-xl-3">
                                            <p class="m-0 p-0" style="font-size: 18px;">R$ <?php echo number_format($p['valor'],2,',','.') ?></p>
                                        </div>
                                        <div class="col-xl-4">
                                            <p class="m-0 p-0" style="font-weight: 600;"><?php echo $p['status'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                       
                            <?php if($pedidos == null) { ?>
                                <div class="col-md-12 text-center form-group">
                                    <p>Nenhum pedido realizado.</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Redefinir Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="form-redefinir" action="<?php echo base_url('2d7fdaba4614564489b1c83981f92672') ?>" method="post">
                <input type="hidden" name="id_redifinir" id="id_redifinir" value="<?php echo $this->session->userdata('cliente_user_id') ?>">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Nova senha</label>
                        <input  type="password" class="form-control" onkeyup="senha()" name="senha_nova" id="senha_nova">
                        <label id="alert-senha" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres!</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Confirmar nova senha</label>
                        <input  type="password" class="form-control" onkeyup="senha2()" name="confirma_nova" id="confirma_nova">
                        <label id="alert-senha2" style="font-size: 14px; visibility: hidden; color: red">*A senha deve ter mais de seis caracteres!</label>
                    </div>
                </div>
      </div>
      <div>
          <label id="alert-senha3" style="font-size: 14px; visibility: hidden; color: red; position: absolute; top: 290px; left: 130px; ">*As senhas não são iguais!</label>
      </div>    
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="Redefinir">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
            </form>      
      
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="afiliadoModal" tabindex="-1" role="dialog" aria-labelledby="afiliadoModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="afiliadoConfirm">
        </div>
    </div>
</div>

<div class="modal fade" id="produtoafiliadoModal" tabindex="-1" role="dialog" aria-labelledby="produtoafiliadoModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="produtoafiliadoAdd">
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js"></script>
<script src='<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>'></script>
<script src='<?php echo base_url('recursos/js/material/plugins/sweetalert2.js');?>'></script>

<script>
    <?php if($cliente['cliente_endereco'] == null || $cliente['cliente_endereco'] == ""){ ?>
        Swal.fire({
            type: 'warning',
            title: 'Complete seu cadastro!',
        });
    <?php }?>
</script>

<script>
   function onSubmit(token) {
     document.getElementById("form-dados").submit();
   }
</script>
<script>
   function onSubmit2(token) {
        document.getElementById("form-endereco").submit();
   }
</script>
<script>
   function onSubmit3(token) {
        redefinir();
   }
</script>
<script>
    function verpedido(id){
        var form = "<form id='form-ver-pedido' action='<?php echo base_url('f2a65f4a9e58f011ea41f053ea58053d')  ?>' method='post'>" +
        "<input type='hidden' name='id_pedido' id='id_pedido' value=' " + id + " ' >" + 
        "</form>";
        
        $('#menu_pedido').append(form);
        $('#form-ver-pedido').submit();
    }
</script>
<script>
    $(document).ready(function(){
        var url = window.location.href;
        var aux = url.split('#');
        if(aux[1] == 'endereco'){
            endereco();
            $('.card-body').css('visibility', 'visible');
        } else if(aux[1] == 'pedidos'){
            pedido();
            $('.card-body').css('visibility', 'visible');
        } else {
            dados();
            $('.card-body').css('visibility', 'visible');
        }
        $('.card-body').css('visibility', 'visible');
        
        $('.cpf').mask('000.000.000-00', {reverse: true}); 
        $('.cep').mask('00000-000');
        
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.date').mask('00/00/0000');
        
        $('.telefone').mask(SPMaskBehavior, spOptions);

        $('#genero').val('<?php echo $cliente['cliente_genero'] ?>').change();
        $('#estado').val('<?php echo $cliente['cliente_estado'] ?>').change();
            
        
        <?php if(isset($msg)) { ?>
            <?php if($msg == 1){ ?>
                Swal.fire({
                    type: 'success',
                    title: 'Dados Pessoais atualizado com sucesso!',
                })
            <?php } else if($msg == 2){ ?>
                Swal.fire({
                    type: 'success',
                    title: 'Endereço atualizado com sucesso!',
                })
            <?php } else if($msg == 3){ ?>
                Swal.fire({
                    type: 'success',
                    title: 'Senha redefinida com sucesso!',
                })
            <?php } ?>
        <?php } ?>
        
        briefAfiliado();
        
    });
</script>
<script>
    function editar(){
        $('#editar').show();
        $('#visualizar').hide();
    }
    
    function visualizar(){
        $('#editar').hide();
        $('#visualizar').show();
    }
    
</script>
<script>
    function editar_endereco(){
        $('#editar_endereco').show();
        $('#visualizar_endereco').hide();
    }
    
    function visualizar_endereco(){
        $('#editar_endereco').hide();
        $('#visualizar_endereco').show();
    }
    
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
<script>
	    function senha(){
	        var senha = $('#senha_nova').val().length;
	        
	        if(senha < 6){
	            $('#alert-senha3').css('visibility', 'hidden');
	            $('#alert-senha').css('visibility', 'visible');
	        } else {
	            $('#alert-senha3').css('visibility', 'hidden');
	            $('#alert-senha').css('visibility', 'hidden');
	        }
	    }
</script>
<script>
	    function senha2(){
	        var senha = $('#confirma_nova').val().length;
	        
	        if(senha < 6){
	            $('#alert-senha3').css('visibility', 'hidden');
	            $('#alert-senha2').css('visibility', 'visible');
	        } else {
	            $('#alert-senha3').css('visibility', 'hidden');
	            $('#alert-senha2').css('visibility', 'hidden');
	        }
	    }
</script>
<script>
    function redefinir(){
        var senha = $('#senha_nova').val().length;
        
        if($('#senha_nova').val() == $('#confirma_nova').val()){
            if(senha >= 6){
                $('#form-redefinir').submit();
            }
         }else {
             $('#alert-senha3').css('visibility', 'visible');
         }
    }    
</script>
<script>
    function dados(){
        $('#li_dados').find('.row').addClass('row-hover-active').find('a').css('color', 'black').css('font-weight', '700');
        $('#li_endereco').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        $('#li_pedido').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        
        $('#menu_dados').show();
        $('#menu_endereco').hide();
        $('#menu_pedido').hide();
        $('#pedidos_afiliado').hide();
    }
    
    function endereco(){
        $('#li_dados').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        $('#li_endereco').find('.row').addClass('row-hover-active').find('a').css('color', 'black').css('font-weight', '700');
        $('#li_pedido').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        
        $('#menu_dados').hide();
        $('#menu_endereco').show();
        $('#menu_pedido').hide();
        $('#pedidos_afiliado').hide();
    }
    
    function pedido(){
        $('#li_dados').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        $('#li_endereco').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        $('#li_pedido').find('.row').addClass('row-hover-active').find('a').css('color', 'black').css('font-weight', '700');
        
        $('#menu_dados').hide();
        $('#menu_endereco').hide();
        $('#menu_pedido').show();
        $('#pedidos_afiliado').hide();
    }
    
    function afiliado(){
        $('#li_dados').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        $('#li_endereco').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        $('#li_pedido').find('.row').removeClass('row-hover-active').find('a').css('color', '#444').css('font-weight', 'unset');
        $('#pedidos_afiliado').find('.row').addClass('row-hover-active').find('a').css('color', 'black').css('font-weight', '700');
        
        $('#menu_dados').hide();
        $('#menu_endereco').hide();
        $('#menu_pedido').hide();
        $('#pedidos_afiliado').show();
    }
    
</script>
<script>
    function briefAfiliado(){
        var dados = new FormData();
        dados.append('id', <?php echo $_SESSION['cliente_user_id'];?>);
        $.ajax({
            url: '<?php echo base_url('areauser/afiliados'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $("#afiliado").empty();
                $("#afiliado").append("<img src='https://xn--diagnosticosavanados-j1b.com.br/wp-content/themes/da/images/2.gif' alt='Loading' width='100' height='100'>");
            },
            error: function(xhr, status, error) {
              briefAfiliado();
            },
            success: function(data) {
                $("#afiliado").empty();
                $("#pedidos_afiliado").empty();
                $('#afiliado').append(data.menu);
                $('#pedidos_afiliado').append(data.corpo);
                $('#pedidos_afiliado').append(data.produtos);
            },
        });
    }
    function makeAfiliado(){
        var dados = new FormData();
        dados.append('id', <?php echo $_SESSION['cliente_user_id'];?>);
        $.ajax({
            url: '<?php echo base_url('areauser/becameAfiliado'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $("#afiliado").empty();
                $("#afiliado").append("<img src='https://xn--diagnosticosavanados-j1b.com.br/wp-content/themes/da/images/2.gif' alt='Loading' width='100' height='100'>");
            },
            error: function(xhr, status, error) {
              briefAfiliado();
            },
            success: function(data) {
                $("#afiliadoConfirm").empty();
                $('#afiliadoConfirm').append(data);
                $('#afiliadoModal').modal({backdrop: 'static', keyboard: false}, 'show');
                $("#afiliado").empty();
                briefAfiliado();
            },
        });
    }
    function afiliadoAdesao(id){
        if(id == 1 ){
            var dados = new FormData();
            dados.append('id', <?php echo $_SESSION['cliente_user_id'];?>);
            $.ajax({
                url: '<?php echo base_url('areauser/novoAfiliado'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                    $("#afiliado").empty();
                    $("#afiliado").append("<img src='https://xn--diagnosticosavanados-j1b.com.br/wp-content/themes/da/images/2.gif' alt='Loading' width='100' height='100'>");
                },
                error: function(xhr, status, error) {
                  briefAfiliado();
                },
                success: function(data) {
                    $('#afiliadoModal').modal('hide');
                    $("#afiliadoConfirm").empty();
                    briefAfiliado();
                },
            });
        }else{
            $('#afiliadoModal').modal('hide');
            $("#afiliadoConfirm").empty();
            briefAfiliado();
        }
    }
    function newProdutoAfiliado(){
        var dados = new FormData();
        dados.append('id', <?php echo $_SESSION['cliente_user_id'];?>);
        $.ajax({
            url: '<?php echo base_url('areauser/novoProdutoAfiliado'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              
            },
            success: function(data) {
                $("#produtoafiliadoAdd").empty();
                $("#produtoafiliadoAdd").append(data); 
                $('#produtoafiliadoModal').modal({backdrop: 'static', keyboard: false}, 'show');
                $('#selectProduto').select2({
                    dropdownParent: $('#produtoafiliadoAdd')
                });
            },
        });
    }
    function addProduto(id){
        if(id == 1 ){
            var dados = new FormData();
            dados.append('id', <?php echo $_SESSION['cliente_user_id'];?>);
            dados.append('produto', $("#prodAfiliado").val());
            $.ajax({
                url: '<?php echo base_url('areauser/addProduto'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                    $("#afiliado").empty();
                    $("#afiliado").append("<img src='https://xn--diagnosticosavanados-j1b.com.br/wp-content/themes/da/images/2.gif' alt='Loading' width='100' height='100'>");
                },
                error: function(xhr, status, error) {
                  briefAfiliado();
                },
                success: function(data) {
                    $('#produtoafiliadoModal').modal('hide');
                    $("#produtoafiliadoAdd").empty();
                    briefAfiliado();
                },
            });
        }else{
            $('#produtoafiliadoModal').modal('hide');
            $("#produtoafiliadoAdd").empty();
        }
    }
    function apelidoAfiliado(){
        Swal.fire({
            title: 'Apelido de Afiliado',
            html: `<input type="text" id="nameAfiliado" class="swal2-input" placeholder="Apelido de Afiliado">`,
            confirmButtonText: 'Validar',
            focusConfirm: false,
            preConfirm: () => {
                const apelido = Swal.getPopup().querySelector('#nameAfiliado').value
                return { apelido: apelido }
            }
        }).then((result) => {
            var dados = new FormData();
            dados.append('id', <?php echo $_SESSION['cliente_user_id'];?>);
            dados.append('apelido', result.value.apelido);
            $.ajax({
                url: '<?php echo base_url('areauser/apelidoAfiliado'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                    
                },
                error: function(xhr, status, error) {
                  briefAfiliado();
                },
                success: function(data) {
                    if(data.erro){
                        Swal.fire(data.erro);
                    }else if(data.success){
                        Swal.fire(data.success);
                    }
                    briefAfiliado();
                },
            });
            })
    }
    </script>