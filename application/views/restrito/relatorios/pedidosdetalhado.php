<!DOCTYPE html>
<html lang="pt-br">
    

    
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
        <title>Relatório de Pedidos Detalhado</title>
        <link href="<?php echo base_url('assets/admin/');?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin/');?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin/');?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin/');?>css/style-responsive.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/admin/');?>lib/jquery/jquery.min.js"></script>
        <title>.</title>
    </head>
    <body>
        <section id="container" style="position: relative; margin-right: 1%; margin-left: 1%; width: 98%">
            <div class="row" style="margin-bottom: 10px; display: inline;">
                <div>
                    <img id="imagem" src="<?php echo base_url('imagens/site/logo2.png') ?>" style="margin-left: 28px; width: 15%; height: auto;">    
                </div>
                <div style="margin-top: -89px;margin-left: 191px;">
                    <h4 style="margin-right: 20%; text-align: center; font-weight: bold"><b><?php echo mb_strtoupper($configs['nome_empresa']) ?></b></h4>
                    <h3 style="margin-right: 20%; text-align: center; font-weight: bold">RELATÓRIO DE PEDIDOS DETALHADO</h3>
                    <?php if(isset($filtros)){ ?>
                        <p class="text-center" style="margin-right: 20%; font-size: 10px">
                            <?php echo $filtros['filtro_data']; ?> <br>
                            Status: <?php echo $filtros['status']['nomeStatusCompra'] ?> <Br>
                            <!--Forma de pagamento: <?php //echo $filtros['forma_pagamento'] ?> <br>-->
                            <!--Estado: <?php //echo $filtros['estados'] ?>-->
                        </p>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: right">
                    <button id="btn" type="button" class="btn btn-primary" style="border-color: #3a0b0c!important; color: white; background-color: #3a0b0c!important; right: 0; float: right; margin-right: 20px; margin-bottom: 20px" onclick="pdf()">Relatório PDF</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-left" style="margin-bottom: 10px; margin-top: 0px;">
                </div>
            </div>
                <?php
                   $total = 0;
                   if($result['pedidos']) {
                       foreach($result['pedidos'] as $venda){
                           $total += $venda['total_produto'] ?>
                           <div class="row">
                                <div class="col-md-12" style="border: 1px #dcdcdc solid">
                                    
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Pedido
                                                </th>
                                                <th>
                                                    Nome
                                                </th>
                                                <th>
                                                    CPF
                                                </th>
                                                <th>
                                                    Pagamento
                                                </th>
                                                <th>
                                                    Telefone
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Data/Hora
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $venda['idpedido'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $venda['cliente'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $venda['cpf'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $venda['forma']?>
                                                </td>
                                                <td><?php echo $venda['telefone'] ?></td>
                                                <td>
                                                    
                                                    <?php echo $venda['status']?>
                                                </td>
                                                <td>
                                                    <?php echo date('d/m/Y H:i', strtotime($venda['datacompra'])) ?>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    <center>
                                                        <strong>Produtos</strong>
                                                    </center>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <strong>Nome</strong>
                                                </td>
                                                <td>
                                                    <strong>Qtd.</strong>
                                                </td>
                                                <td>
                                                    <strong>Unitário</strong>
                                                </td>
                                                <td colspan="2">
                                                    <strong>Total</strong>
                                                </td>
                                                
                                            </tr>
                                            
                                            <?php foreach($venda['servicos'] as $produtos){  ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <?php echo $produtos['produto_nome']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $produtos['produto_qtd']?>
                                                    </td>
                                                    <td>
                                                        <?php echo "R$". number_format($produtos['produto_valor'], 2, ",",".") ?>
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo "R$". number_format($produtos['produto_valor'], 2, ",",".") ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="7">
                                                    <center>
                                                        <strong>Valores</strong>
                                                    </center>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                </td>
                                                <td>
                                                    <strong>Valor</strong>
                                                </td>
                                                <td>
                                                    <strong>Desconto</strong>
                                                </td>
                                                <td colspan="2">
                                                    <strong>Total</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                </td>
                                                <td>
                                                    <?php echo "R$". number_format($venda['ttlprod'], 2, ",",".") ?>
                                                </td>
                                                <td>
                                                    <?php echo "R$". number_format($venda['desconto'], 2, ",",".") ?>
                                                </td>
                                                <td colspan="2">
                                                    <?php echo "R$". number_format($venda['total'], 2, ",",".") ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                           </div>
                           <hr>
                          <?php } 
                    } else { ?>
                        <div class="row">
                            <div class="col-md-12 text-center" style="border: 1px #dcdcdc solid">
                                <h2>Sem pedidos no relatorio</h2>
                            </div>
                        </div>
                    <?php } ?>
                    
                   
                
           
            <div class="col-md-12 text-right">
                <h3><b>TOTAL GERAL: R$<?php echo number_format($total, 2, ",",".") ?></b></h3>
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
            function pdf(){
                $('#btn').css('display', 'none');
                $('#footer').css('display', 'block');
                window.print();
                $('#footer').css('display', 'none');
                $('#btn').css('display', 'block');
            }
        </script>
</html>