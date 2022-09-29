<style>
    .select2{
        width: 100%!important;
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
    
     
    .nav-tabs{
        background-color: white;
    }
    
    .nav-link{
        font-size: 25px;
    }
    
    #perguntas hr{
        width: 110%!important;
        margin-left: -5%;
        margin-top: 4%;
        margin-bottom: 2%;
    }
    
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Definições</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('af8889282b50f9030f8cc7a19b3f706d') ?>">Site</a></li>
            </ol>
        </nav>
        <form id="form" action="<?php echo base_url('589f4ef9553ca0b67ad8f1d6c02d8eef') ?>" method="post" enctype="multipart/form-data">
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="new-principal-titulo">Site</p>
                    </div>
                </div>
            </div>
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="site-tab" data-toggle="tab" href="#site" role="tab" aria-controls="site" aria-selected="true">Site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="textos-tab" data-toggle="tab" href="#textos" role="tab" aria-controls="textos" aria-selected="true">Textos</a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" id="banners-tab" data-toggle="tab" href="#banners" role="tab" aria-controls="banners" aria-selected="true">E-book</a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link" id="imagem-tab" data-toggle="tab" href="#imagem" role="tab" aria-controls="imagem" aria-selected="true">Banners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="perguntas-tab" data-toggle="tab" href="#perguntas" role="tab" aria-controls="perguntas" aria-selected="true">Perguntas</a>
                </li>
            </ul>
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="site" role="tabpanel" aria-labelledby="site-tab">
                    <div class="row" style="margin-top: 3%">
                        <div class="col-md-5">
                            
                            <div class="col-md-12 text-center form-group" style="margin-top: 10%">
                                <img src="<?php echo $site['logo'] ?>" style="height: 90px; width: auto">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <button type="button" class="btn btn-primary" style="width: 200px" onclick="trigger_logo()">Enviar nova Logo Clara</button>
                                    <input type="file" style="display: none" name="logo" id="logo" class="input-file">
                                </div>
                            </div>
                            
                            <div class="col-md-12 text-center form-group" style="margin-top: 10%">
                                <img src="<?php echo $site['logo2'] ?>" style="height: 90px; width: auto">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <button type="button" class="btn btn-primary" style="width: 200px" onclick="$(this).next().click()">Enviar nova logo Escuro</button>
                                    <input type="file" style="display: none" name="logo2" id="logo2" class="input-file">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label><b>E-mail Contato:</b></label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $site['email'] ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><b>Whats App:</b></label>
                                    <input type="text" class="form-control" name="whats" id="whats" value="<?php echo $site['whats'] ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><b>Telefone:</b></label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $site['telefone'] ?>">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label><b>Endereço Completo:</b></label>
                                    <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $site['endereco'] ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>Nome empresa:</b></label>
                                    <input type="text" class="form-control" name="nome_empresa" id="nome_empresa" value="<?php echo $site['nome_empresa'] ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>CNPJ:</b></label>
                                    <input type="text" class="cnpj form-control" name="cnpj" id="cnpj" value="<?php echo $site['cnpj'] ?>">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label><b>Link Facebook:</b></label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $site['facebook'] ?>">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label><b>Link Instagram:</b></label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $site['instagram'] ?>">
                                </div>
                                <!--<div class="col-md-12 form-group">-->
                                <!--    <label><b>Link Twitter:</b></label>-->
                                <!--    <input type="text" class="form-control" name="twitter" id="twitter"  value="<?php echo $site['twitter'] ?>">-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="tab-pane fade" id="textos" role="tabpanel" aria-labelledby="textos-tab">
                    <div class="col-md-12" style="margin-top: 3%">
                        <div class="row">
                            <div class="col-md-12 form-group" style="margin-top: 6%">
                                <label><b>Sobre a loja:</b></label>
                                <div class="editor" id="editor"><?php echo $site['sobre_loja'] ?></div>
                                <textarea name="desc" id="desc" style="display: none"></textarea>
                            </div>

                            <div class="col-md-12 form-group" style="margin-top: 6%">
                                <label><b>Política de privacidade:</b></label>
                                <div class="editor" id="editor3"><?php echo $site['politica_privacidade'] ?></div>
                                <textarea name="desc3" id="desc3" style="display: none"></textarea>
                            </div>

                            <div class="col-md-12 form-group" style="margin-top: 6%">
                                <label><b>Termos e condições:</b></label>
                                <div class="editor" id="editor4"><?php echo $site['termos'] ?></div>
                                <textarea name="desc4" id="desc4" style="display: none"></textarea>
                            </div>

                            <!--<div class="col-md-12 form-group" style="margin-top: 6%">-->
                            <!--    <label><b>Termos e condições produto 2:</b></label>-->
                            <!--    <div class="editor" id="editor2"><?php echo $site['politica_entrega'] ?></div>-->
                            <!--    <textarea name="desc2" id="desc2" style="display: none"></textarea>-->
                            <!--</div>-->
                            
                        </div>
                    </div>
                </div>
                
                
                <!--<div class="tab-pane fade" id="banners" role="tabpanel" aria-labelledby="banners-tab">-->
                <!--    <div class="row" style="margin-top: 2%">-->
                <!--        <div class="col-md-12 form-group">-->
                <!--            <div class="col-md-12">-->
                <!--                <h5 style="color: #4da751"><b>E-book:</b></h5>-->
                <!--            </div>-->
                <!--            <div class="col-md-6 form-group">-->
                <!--                <div class="col-md-12 text-center">-->
                <!--                    <button type="button" class="btn btn-primary" onclick="$(this).next().click()">Enviar E-book</button>-->
                <!--                    <input type="file" style="display: none" name="ebook" id="ebook" class="input-file">-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>  -->
                <!--    </div>-->
                <!--</div>-->
                
                <div class="tab-pane fade" id="imagem" role="tabpanel" aria-labelledby="imagem-tab">
                    <div class="col-md-12" style="margin-top: 3%">
                        <div class="row">
                            <!--<div class="col-md-12 form-group" style="padding-bottom: 6%;">
                                <h5 class="text-center" style="color: #30b535;">DESKTOP </h5><br>
                                <label><b>Banner Desktop:</b></label>
                                <img src="<?php echo $site['banner_principal1'] ?>" style="width: 100%;">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <button type="button" class="btn btn-primary" onclick="trigger_principal1()">Banner Desktop</button>
                                    <input type="file" style="display: none" name="banner_principal1" id="banner_principal1" class="input-file">
                                </div>
                            </div>
                            -->
                            
                            <div class="col-md-12 form-group">
                                <!--<h5 class="text-center" style="color: #30b535;">MOBILE </h5><br><br><br>-->
                                <label><b>Banner 1:</b></label>
                                <img src="<?php echo $site['banner_principal1'] ?>" style="width: 200px;">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 120px; right: 20%;" onclick="trigger_principal1()">Banner Carrousel 1</button>
                                    <input type="file" style="display: none" name="banner_principal1" id="banner_principal1" class="input-file">
                                    <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                        <label><b>Texto Banner 1:</b></label>
                                        <input type="text" class="form-control" name="text_banner1" id="text_banner1" value="<?php echo $site['text_banner1'] ?>">
                                        <br>
                                        <input type="text" class="form-control" name="btn_banner1" id="btn_banner1" value="<?php echo $site['btn_banner1'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <!--<h5 class="text-center" style="color: #30b535;">MOBILE </h5><br><br><br>-->
                                <label><b>Banner 1:</b></label>
                                <img src="<?php echo $site['banner_principal2'] ?>" style="width: 200px;">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 120px; right: 20%;" onclick="trigger_principal2()">Banner Carrousel 2</button>
                                    <input type="file" style="display: none" name="banner_principal2" id="banner_principal2" class="input-file">
                                    <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                        <label><b>Texto Banner 1:</b></label>
                                        <input type="text" class="form-control" name="text_banner2" id="text_banner2" value="<?php echo $site['text_banner2'] ?>">
                                        <br>
                                        <input type="text" class="form-control" name="btn_banner2" id="btn_banner2" value="<?php echo $site['btn_banner2'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <!--<h5 class="text-center" style="color: #30b535;">MOBILE </h5><br><br><br>-->
                                <label><b>Banner 1:</b></label>
                                <img src="<?php echo $site['banner_principal3'] ?>" style="width: 200px;">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 120px; right: 20%;" onclick="trigger_principal3()">Banner Carrousel 3</button>
                                    <input type="file" style="display: none" name="banner_principal3" id="banner_principal3" class="input-file">
                                    <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                        <label><b>Texto Banner 1:</b></label>
                                        <input type="text" class="form-control" name="text_banner3" id="text_banner3" value="<?php echo $site['text_banner3'] ?>">
                                        <br>
                                        <input type="text" class="form-control" name="btn_banner3" id="btn_banner3" value="<?php echo $site['btn_banner3'] ?>">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12 form-group" style="padding-bottom: 6%; margin: 5%">
                                <div class="row text-center">
                                    <label><b>Parallax:</b></label>
                                    <img src="<?php echo $site['parallax'] ?>" style="width: 40%;">
                                    <div class="col-md-6 text-center">
                                        <button type="button" class="btn btn-primary" onclick="trigger_parallax()">Parallax</button>
                                        <input type="file" style="display: none" name="parallax" id="parallax" class="input-file">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width: 90%; margin: 5%;">
                                <div class="col-md-6 form-group">
                                    <div class="col-md-12 form-group">
                                        <label><b>Imagem 1:</b></label>
                                        <img src="<?php echo $site['imagem1'] ?>" style="width: 200px;">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 160px; left: 30%;" onclick="trigger_imagem1()">Imagem banner 1</button>
                                            <input type="file" style="display: none" name="imagem1" id="imagem1" class="input-file">
                                            <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group" style="position: relative; bottom: 45px">
                                        <label><b>Imagem 2:</b></label>
                                        <img src="<?php echo $site['imagem2'] ?>" style="width: 200px;">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 160px; left: 30%;" onclick="trigger_imagem2()">Imagem banner 2</button>
                                            <input type="file" style="display: none" name="imagem2" id="imagem2" class="input-file">
                                            <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label><b>Imagem 3:</b></label>
                                        <img src="<?php echo $site['imagem3'] ?>" style="width: 200px;">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 160px; left: 30%;" onclick="trigger_imagem3()">Imagem banner 3</button>
                                            <input type="file" style="display: none" name="imagem3" id="imagem3" class="input-file">
                                            <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col-md-12 form-group">
                                        <label><b>Imagem Full 1:</b></label>
                                        <img src="<?php echo $site['img_full1'] ?>" style="width: 200px;">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 30px; left: 30%;" onclick="trigger_img_full1()">Imagem Full 1</button>
                                            <input type="file" style="display: none" name="img_full1" id="img_full1" class="input-file">
                                            <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label><b>Imagem Full 2:</b></label>
                                        <img src="<?php echo $site['img_full2'] ?>" style="width: 200px;">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-primary" style="width: 200px; position: relative; bottom: 30px; left: 30%;" onclick="trigger_img_full2()">Imagem Full 2</button>
                                            <input type="file" style="display: none" name="img_full2" id="img_full2" class="input-file">
                                            <div class="col-md-6 form-group" style="position: relative; left: 45%; bottom: 185px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="perguntas" role="tabpanel" aria-labelledby="perguntas-tab">
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-12 form-group">
                            <div class="col-md-12">
                                <h5 style="color: #4da751;"><b>Perguntas frequentes:</b></h5>
                            </div>
                            <hr style="width: 95%!important; border-top: 1px solid #79797959; margin-left: 2.5%!important; margin-top: 20px!important; margin-bottom: 20px!important;">
                            <?php if(count($perguntas) > 0){;
                            $var = count($perguntas);
                            $aux = 0; foreach($perguntas as $per){?>
                            <div class="row"id="perguntaFrequente<?php echo $aux;?>">
                                <div class="col-md-2" style="text-align:-webkit-center;">
                                    <?php if($var == $aux+1){ ?>
                                    <button id="buttonPergunta<?php echo $aux;?>" type="button" class="btn btn-success" onclick="novaPergunta(<?php echo $aux;?>)">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <?php } ?>
                                </div>
                                <div class="col-md-10">
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <div>
                                                    <label style="color: #4da751;">Campo:</label><br>
                                                    <input placeholder="Pergunta" type="text" class="form-control" name="pergunta_titulo_<?php echo $aux;?>" id="pergunta_titulo_<?php echo $aux;?>" value="<?php echo $per['pergunta_titulo'];?>">
                                                </div>
                                                <div style="margin-top: 2%;">
                                                    <input placeholder="Resposta" type="text" class="form-control" name="pergunta_resposta_<?php echo $aux;?>" id="pergunta_resposta_<?php echo $aux;?>" value="<?php echo $per['pergunta_resposta'];?>">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <?php $aux++; } }else{?>
                            <div class="row"id="perguntaFrequente0">
                                <div class="col-md-2" style="text-align:-webkit-center;">
                                    <button id="buttonPergunta0" type="button" class="btn btn-success" onclick="novaPergunta(0)">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-md-10">
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <div>
                                                    <label style="color: #4da751;">Campo:</label><br>
                                                    <input placeholder="Pergunta" type="text" class="form-control" name="pergunta_titulo_0" id="pergunta_titulo_0" value="">
                                                </div>
                                                <div style="margin-top: 2%;">
                                                    <input placeholder="Resposta" type="text" class="form-control" name="pergunta_resposta_0" id="pergunta_resposta_0" value="">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>  
                    </div>
                </div>
                <input type="hidden" id="qtdPerg" name="qtdPerg" value="<?php if(isset($var)){ echo $var;}else{ echo "1";}?>">
                <div class="row" style="margin-top: 5%">
                    <div class="col-md-12 text-right">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Gravar</button>
                            <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>
                        </div>
                    </div>
                </div>
                
            </div>
            <br>
        </div>
        </form>
    </section>
</section>

<style>
    .ql-snow .ql-picker.ql-size .ql-picker-label::before { content: attr(data-value)!important; }
    .ql-snow .ql-picker.ql-size .ql-picker-item::before { font-size: attr(data-value)!important; content: attr(data-value)!important; }
    .ql-picker-label .custom-content::before { content: attr(data-value)!important; }
    .editor{
        min-height: 300px;
    }
</style>


<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

<script>
    const sizes = ['10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px'];
    
    var Size = Quill.import('attributors/style/size');
    Size.whitelist = sizes;
    Quill.register(Size, true);
    
    var toolbarOptions = [
        [{ 'size': sizes }],
        [{ 'font': [] }],
        
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        
        ['blockquote', 'code-block'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        
        [{ 'indent': '-1'}, { 'indent': '+1' }],
        
        [{ 'color': [] }, { 'background': [] }],
        
        [{ 'align': [] }],
        
        ['clean']
    ];
    
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
    
    var quill2 = new Quill('#editor2', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
    
    var quill3 = new Quill('#editor3', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
    
    var quill4 = new Quill('#editor4', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
    
    $('.ql-picker-item').click(function(){
        $('.ql-picker-label').addClass('custom-content').attr('data-content', $(this).data('value'));
    });
</script>

<script>
    $('#form').submit(function(e){
        $('#desc').html($('#editor').find('.ql-editor').html());
        $('#desc2').html($('#editor2').find('.ql-editor').html());
        $('#desc3').html($('#editor3').find('.ql-editor').html());
        $('#desc4').html($('#editor4').find('.ql-editor').html());
    });
</script>

<script>
    function trigger_logo(){
        $('#logo').click();
    }
    function trigger_imagem1(){
        $('#imagem1').click();
    }
    function trigger_imagem2(){
        $('#imagem2').click();
    }
    function trigger_imagem3(){
        $('#imagem3').click();
    }
    function trigger_principal1(){
        $('#banner_principal1').click();
    }
    function trigger_parallax(){
        $('#parallax').click();
    }
    function trigger_principal2(){
        $('#banner_principal2').click();
    }
    function trigger_principal3(){
        $('#banner_principal3').click();
    }
    function trigger_contato(){
        $('#banner_contato').click();
    }
    function trigger_img_full1(){
        $('#img_full1').click();
    }
    function trigger_img_full2(){
        $('#img_full2').click();
    }
</script>

<script>
    function newPergunta(id){
        dados = new FormData();
        id = id + 1;
        dados.append('row', id);
        $.ajax({
            url: '<?php echo base_url('adminsite/newPerguntaLista'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                document.getElementById('lt'+id).onclick = "#";
                $('#listaTroca'+id).after(JSON.parse(data));
            }
        });
    }
</script>

<script>
    $(document).ready(function(){
        $('#site-tab').click();
        
        $('.ql-picker-item').each( function(){
            if($(this).data('value') == "14px"){
                $(this).click();
            }
        });
        
        
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('#whats').mask(SPMaskBehavior, spOptions);
        $('#telefone').mask(SPMaskBehavior, spOptions);
        
        <?php if(isset($msg)){ ?>
        /* start - SweetAlert2 js */
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
            title: 'Site Atualizado com Sucesso!'
        })
        /* end - SweetAlert2 js */
        <?php } ?>
    });
    
    

</script>

<script>
    function novaPergunta(id){
        dados = new FormData();
        dados.append('row', id);
        $.ajax({
            url: '<?php echo base_url('admin/adminsite/newPerguntaLista'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                document.getElementById('buttonPergunta'+id).remove();
                $('#perguntaFrequente'+id).after(JSON.parse(data));
                var qtd = $('#qtdPerg').val();
                qtd = parseInt(qtd)+parseInt(1);
                $('#qtdPerg').val(qtd);
            }
        });
    }
</script>