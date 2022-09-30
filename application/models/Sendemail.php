<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmail extends CI_Model {
    
    public function mailbody($dados){
        $sum = 0;
        
        $aux = explode(' ', $dados['nome']);
        $aux_servicos = "";
        
        if(isset($dados['segundo'])){
            $frase = null;
        } else {
            $frase = "<p style='font-size: 15px; color: black; text-align: center; font-size: 13px;'><b>" . $aux[0] . " obrigado pelo pedido!</b></p>
                    <p style='margin-bottom: 25px; text-align: center; font-size: 12px'>Seu pedido foi recebido e será processado assim que o pagamento for confirmado.</p>";
        }
        
        foreach($dados['servicos'] as $s){
            $aux_servicos .=
            "<tr>
                <td style=' border: 1px solid lightgrey'><p style='font-size: 11px'>" . $s['produto_nome'] . "</p></td>
                <td style=' border: 1px solid lightgrey'><p style='font-size: 11px'>" . $s['produto_subtitulo'] . "</p></td>
                <td style=' border: 1px solid lightgrey'><p style='font-size: 11px'>" . $s['produto_quantidade'] . "</p></td>
                <td style=' border: 1px solid lightgrey'><p style='font-size: 11px'>R$ " . $s['produto_valor'] . "</p></td>
                <td style=' border: 1px solid lightgrey'><p style='font-size: 11px'>R$ " . $s['produto_total'] . "</p></td>
            </tr>";
            $sum += floatval($s['produto_total']);
            $dados['desconto'] = null;
            if($sum > $dados['subtotal']){
                $dados['desconto'] = $sum - $dados['subtotal'];
            }
        }
        
        $email =
            "<!doctype html>
                <html class='no-js' lang='pt-br'>
                    <head></head>
                    <body style='width: 100%'>
                        <div style='width: 100%'>
                            <table style='width: 100%'>
                                <tr>
                                    <td style='width: 32%;'>
                                        <img style='height: 80px; width: auto; display: inline; margin-right: 10px' src='".base_url('imagens/site/logo2.png') ."'>
                                    </td>
                                    <td style='width: 60%'>
                                        <h2 style='color: black; margin-bottom: 10px; text-align: center; font-size: 16px;'><b style='font-size: 18px; color: black'>" . $dados['nome_empresa'] . " </h2>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style='width: 100%'>
                        " . $frase . "
                            <p style='margin-bottom: 25px; font-size: 11px'>Acompanhe seu pedido: " . base_url('conta#pedidos') . "</p>
                            <p style='margin: 0; padding: 0; font-size: 13px;'><b>PEDIDO: ". $dados['numero_pedido'] ."</b> </p>
                            <table style='padding: 5px; width: 100%; border-collapse: collapse; border-radius: 5px;'>
                                <tr>
                                    <td style='border: 1px solid lightgrey'>
                                        <p style='padding: 5px; margin: 0; color: black; font-size: 11px;'><b style='color: black'>Pedido N°:</b> " . $dados['numero_pedido'] . "</p>
                                        <p style='padding: 5px; margin: 0; color: black; font-size: 11px;'><b style='color: black'>Data:</b> " . $dados['data']. "</p>
                                        <p style='padding: 5px; margin: 0; color: black; font-size: 11px;'><b style='color: black'>Pagamento:</b> " . $dados['pagamento']. "</p>
                                    </td>
                                
                                    <td style='border: 1px solid lightgrey'>
                                        <p style='padding: 5px; margin: 0; color: black; font-size: 11px;'><b style='color: black'>Nome:</b> " . $dados['nome']. "</p>
                                        <p style='padding: 5px; margin: 0; color: black; font-size: 11px;'><b style='color: black'>CPF:</b> " . $dados['cpf']. "</p>
                                        <p style='padding: 5px; margin: 0; color: black; font-size: 11px;'><b style='color: black'>Telefone:</b> " . $dados['fone'] . "</p>
                                        <p style='padding: 5px; margin: 0; color: black; font-size: 11px;'><b style='color: black'>Status: </b> ". $dados['status'] ."</p>
                                    </td>
                                </tr>
                            </table>
                            <p style='color: black; margin-top: 30px!important; font-size: 13px;margin: 0; padding: 0; '><b>INSTRUÇÕES:</b></p>
                            <table style='padding: 5px; width: 100%; border-collapse: collapse; border-radius: 5px;'>
                                <tr>
                                    <td style='border: 1px solid lightgrey'>
                                        <p style='padding: 5px;font-size: 11px'><b>Detalhes da compra:</b>" . $dados['detalhes']  . "</p>
                                    </td>
                                </tr>
                            </table>
                            <p style='color: black; margin-top: 30px!important; font-size: 13px;margin: 0; padding: 0; '><b>PRODUTO:</b></p>
                            <table style='text-align: center; width: 100%; border: 1px solid brown; border-collapse: collapse; padding: 3px; border-radius: 5px;'>
                                <tr>
                                    <td style='border: 1px solid lightgrey'><b style='font-size: 12px'>Produto</b></td>
                                    <td style='border: 1px solid lightgrey'><b style='font-size: 12px'>Descrição</b></td>
                                    <td style='border: 1px solid lightgrey'><b style='font-size: 12px'>Qtd</b></td>
                                    <td style='border: 1px solid lightgrey'><b style='font-size: 12px'>Preço</b></td>
                                    <td style='border: 1px solid lightgrey'><b style='font-size: 12px'>Total</b></td>
                                </tr>
                                " . $aux_servicos . "
                                <tr>
                                    <td style='padding: 0px!important; text-align: right!important; border: 1px solid lightgrey' colspan='4'><p style='font-size: 12px;'><b>Sub-total:</b><p></td>
                                    <td style='border: 1px solid lightgrey'><p style='font-size: 11px;'>R$ " . $dados['subtotal'] . "</p></td>
                                </tr>
                                <tr>
                                    <td style='padding: 0px!important; text-align: right!important; border: 1px solid lightgrey' colspan='4'><p style='font-size: 12px;'><b>Desconto:</b></p></td>
                                    <td style='border: 1px solid lightgrey' ><p style='font-size: 11px;'>R$ " . $dados['desconto'] . "</p></td>
                                </tr>
                                <tr>
                                    <td style='padding: 0px!important; text-align: right!important; border: 1px solid lightgrey' colspan='4'><p style='font-size: 12px;'><b>Total:</b></p></td>
                                    <td style='border: 1px solid lightgrey' ><p style='font-size: 11px;'><b>R$ " . $dados['total'] . "</b></p></td>
                                </tr>
                            </table>
                            <br>
                            <br>                            
                        
                            <p style='color: black;'>Acesse: " . base_url() . "<br> E-mail: atendimento@datacominformatica.com.br</p>
                            <p style='color: black; text-align: center;font-size: 10px;'><b>Não precisa responder, e-mail automático.</b></p>
                        </div>
                    </body>
                </html>";
                    
        return $email;
    }
    
    public function avisoBlock($log){
        $mail = "<!doctype html>
                <html class='no-js' lang='zxx'>
                    <head></head>
                    <body style='width: 100%'>
                        <div style='width: 100%; text-align: center; padding: 20px'>
                            <p style='color: black; font-size: 18px'><b style='color: black'>Atividade suspeita dentro da área administrativa</b></p>
                            <br>
                            <p style='color: black; font-size: 14px'>IP:&nbsp;<b style='color: black'>".$log['log_ip']."</b></p>
                            <p style='color: black; font-size: 14px'>Usuário:&nbsp;<b style='color: black'>".$log['log_nome']."</b></p>
                            <p style='color: black; font-size: 14px'>Data - Hora:&nbsp;<b style='color: black'>".date('d/m/Y', strtotime($log['log_data']))." - ".$log['log_hora']."</b></p>
                            <p style='color: black; font-size: 14px'>Tipo da Atividade:&nbsp;<b style='color: black'>".$log['log_tipo']."</b></p>
                            <p style='color: black; font-size: 14px'>Local da Atividade:&nbsp;<b style='color: black'>".$log['log_funcao']."</b></p>
                        </div>
                    </body>
                </html>";
                
        return $mail;
    }
    
    
    
    public function esqueceuSenha($dados){
        $aux = explode(' ', $dados['nome']);
        
        $email =
            "<!doctype html>
                <html class='no-js' lang='zxx'>
                    <head></head>
                    <body style='width: 100%'>
                        <div style='width: 100%'>
                            <table style='width: 100%'>
                                <tr>
                                    <td style='width: 32%;'>
                                        <img style='height: 80px; width: auto; display: inline; margin-right: 10px' src='".base_url('imagens/site/logo2.png') ."'><br>
                                    </td>
                                    <td style='width: 60%'>
                                        <h2 style='color: black; margin-bottom: 10px; text-align: left; font-size: 16px;'><b style='font-size: 18px; color: black'>Império Cachos</h2>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style='width: 100%'>
                        
                            <p style='color: black; font-size: 13px'> Olá, " . $aux[0] . ". Recebemos seu pedido de alteração de senha.</p><br>
                            <p style='color: black; text-align: left; font-size: 15px;'> Sua nova senha é:</p>
                            <p style='color: black; text-align: left; font-size: 16px; margin-bottom: 60px'>" . $dados['senha'] . "</p>
                        
                            <p style='color: black;'>Acesse: " . base_url() . "<br> E-mail: atendimento@datacominformatica.com.br</p>
                            <p style='color: black; text-align: center;font-size: 10px;'><b>Não precisa responder, e-mail automático.</b></p>
                        </div>
                    </body>
                </html>";
                    
        return $email;
    }
    
    // public function contatos($dados){
    //     $email =
    //         "<!doctype html>
    //             <html class='no-js' lang='zxx'>
    //                 <head></head>
    //                 <body style='width: 100%'>
    //                     <div style='width: 100%'>
    //                         <table style='width: 100%'>
    //                             <tr>
    //                                 <td style='width: 40%;'>
    //                                     <img style='height: 110px; width: auto; display: inline; margin-right: 10px' src='".base_url('imagens/site/logo.png') ."'>
    //                                 </td>
    //                             </tr>
    //                         </table>
    //                     </div>
    //                     <div style='width: 100%'>
    //                         <br><br><style='color: black;  font-size: 12px; margin-bottom: 60px'>". 'Contato: ' . $dados['nome'] . "<br>
    //                         <style='color: black;  font-size: 12px; margin-bottom: 60px'>" . 'Email do contato: '. $dados['email'] . "<br><br>
    //                         <p style='color: black; text-align: center; font-size: 14px; margin-bottom: 60px'>" . $dados['message'] . "</p>
    //                         <p style='color: black; text-align: center;font-size: 10px;'><b>Não precisa responder, e-mail automático.</b></p>
    //                     </div>
    //                 </body>
    //                 </html>";
                    
    //     return $email;
    
    // }
}