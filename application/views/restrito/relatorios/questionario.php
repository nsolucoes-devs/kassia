<!DOCTYPE html>
<html lang="en">
    

    
    <style>
        @page {
            margin: 35pt 10pt 50pt 10pt;
            counter-increment: page;
            @bottom-center {
              content: "Page " counter(page);
            }
        }
    </style>

    <head>
        <title>Questionário</title>
        <link href="<?php echo base_url('assets/admin/');?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin/');?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin/');?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin/');?>css/style-responsive.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/admin/');?>lib/jquery/jquery.min.js"></script>
        <title>.</title>
    </head>
    <body>
        <section id="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <img id="imagem" src="<?php echo base_url('imagens/site/logo2.png') ?>" style="margin-left: 28px; width: auto; height: 110px;">    
                </div>
                <div class="col-xl-12 text-center">
                    <h5><b><?php echo mb_strtoupper($configs['nome_empresa']) ?></b> - <?php echo date('d/m/Y | H:i') ?></h5>
                    <h4>RELATÓRIO DE QUESTIONÁRIO DO PEDIDO #<?php echo $pedido['idpedido'] ?></h4>
                    <?php if(isset($filtros)){ ?>
                        <p class="text-center" style="font-size: 8px">
                            <?php if($filtros['status']) { echo 'Filtro Status: '. $filtros['status']['nomeStatusCompra']; } ?>
                            <?php if($filtros['forma_pagamento']) { echo '<span>  |  </span>Filtro Forma Pagamento: '. $filtros['forma_pagamento']; } ?>
                            <?php if($filtros['datainicio']) { echo '<span>  |  </span>Filtro Data Início: '. $filtros['datainicio']; } ?>
                            <?php if($filtros['datafim']) { echo '<span>  |  </span>Filtro Data Fim: '. $filtros['datafim']; } ?>
                            <?php if($filtros['estado']) { echo '<span>  |  </span>Filtro Estado: '. $filtros['estado']; } ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: right; padding-right: 10%">
                    <button id="btn" type="button" class="btn btn-primary" onclick="pdf()">Relatório PDF</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <p style="padding-top: 5%; padding-left: 2%; font-size: 18px;">
                        <b>Cliente</b>: <?php echo ucwords(strtolower($pedido['cliente'])) ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Telefone</b>: <span class="telefone"><?php echo $pedido['telefone'] ?></span>
                    </p>
                    <?php foreach($pedido['questionario'] as $q){ ?>
                        <div class="col-md-12 form-group" style="margin-top: 3%">
                            <p style="font-size: 15px; font-weight: 700"><?php echo $q['questao'] ?></p>
                            <p><?php echo $q['resposta'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <br>
        </section>
        
        <footer id="footer" style="position: fixed; bottom: 0px; text-align: center; width: 100%; margin-bottom: -13px; display: none; clear: both;">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td style="margin-left: 10px; width> 50%; text-align: right"><p><b style="font-size: 12px; margin-right: 15px;">Gestão de Ecommerce | N Soluções</b></p></td>
                    </tr>
                </tbody>
            </table>
        </footer>
    </body>
    
    <script src="<?php echo base_url('assets/admin/');?>lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources/') ?>js/jquery_mask/dist/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
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
            function pdf(){
                $('#btn').css('display', 'none');
                $('#footer').css('display', 'block');
                window.print();
                $('#footer').css('display', 'none');
                $('#btn').css('display', 'block');
            }
        </script>
</html>