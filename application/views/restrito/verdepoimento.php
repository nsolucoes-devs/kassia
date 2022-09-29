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
</style>


<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('42f4c8bb06112b55d9b0e4c2f81203e5') ?>">Depoimentos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h2 style="color: #4da751; margin: 4% 5% 2% 1%;"><b>VISUALIZAR DEPOIMENTOS</b></h2>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url('42f4c8bb06112b55d9b0e4c2f81203e5') ?>"><i style="border: 1px solid #4da751; padding: 7px; border-radius: 5px; background-color: #4da751; font-size: 17px; color: white; margin: 5% 5% 0% 0%;" class="fa fa-reply" aria-hidden="true">VOLTAR</i></a>
                    </div>
                </div>
            </div>
            
            <form id="form" action="<?php echo base_url('admin/admindepoimentos/update');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?php echo $depoimento['depoimento_id'] ?>">
                
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                        <div class="col-md-12">
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="li_dados" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" aria-selected="true" onclick="dados()">Dados</a>
                                </li>
                            </ul>
                            <div id="dados" style="padding: 10px">
                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-md-7 form-group">
                                        <label><b>Título:</b></label>
                                        <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $depoimento['depoimento_titulo'] ?>" placeholder="" readonly>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label><b>Destaque: </b></label>
                                        <select class="form-control" id="onindex" name="onindex" disabled>
                                            <?php if($depoimento['depoimento_onindex'] == 1) { ?> 
                                                <option value="1" selected>Habilitado</option> 
                                                <option value="0">Desabilitado</option>
                                            <?php } ?>
                                            <?php if($depoimento['depoimento_onindex'] == 0) { ?>
                                                <option value="1">Habilitado</option> 
                                                <option value="0" selected>Desabilitado</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-md-12 form-group">
                                        <label><b>Comentário:</b></label>
                                        <textarea id="comentario" name="comentario" class="form-control" placeholder="Digite o comentário do cliente" readonly><?php echo $depoimento['depoimento_texto'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <label><b>Imagem do depoimento:</b></label>
                                                <img src="<?php echo base_url($depoimento['depoimento_anexo']) ?>" style="width: 300px;">
                                            </div>
                                            <div class="col-md-4 text-center">
                                                 <div class="col-md-12 form-group" style="margin-top: 30px;">
                                                    <label><b>Exibir imagem</b></label>
                                                    <input type="checkbox" disabled name="ativoimagem" id="ativoimagem" <?php if($depoimento['depoimento_ativoimagem'] == 1) { echo 'checked'; } ?> readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            <!--readonly-->
            </div>
            </form>
    </section>
</section>

<style>
    .ql-snow .ql-picker.ql-size .ql-picker-label::before { content: attr(data-value)!important; }
    .ql-snow .ql-picker.ql-size .ql-picker-item::before { font-size: attr(data-value)!important; content: attr(data-value)!important; }
    .ql-picker-label .custom-content::before { content: attr(data-value)!important; }
    #editor{
        min-height: 200px;
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
    
    $('.ql-picker-item').click(function(){
        $('.ql-picker-label').addClass('custom-content').attr('data-content', $(this).data('value'));
    });
</script>

<script type="application/javascript">
    $(document).ready(function(){
        
        $('#situacao').val(<?php echo $departamento['departamento_situacao'] ?>).change();
        
        $('.ql-picker-item').each( function(){
            if($(this).data('value') == "14px"){
                $(this).click();
            }
        });
    });
    
    $('#form').submit(function(e){
        $('#descricao').html($('#editor').find('.ql-editor').html());
    });
</script>

<script>
    function dados(){
        $('#dados').show();
        $('#li_dados').addClass('active');
        $('#detalhes').hide();
        $('#li_detalhes').removeClass('active');
    }
    
    function detalhes(){
        $('#dados').hide();
        $('#li_dados').removeClass('active');
        $('#detalhes').show();
        $('#li_detalhes').addClass('active');
    }
</script>