/*
 verifica_cpf_cnpj
 
 Verifica se é CPF ou CNPJ
 
 @see http://www.todoespacoonline.com/w/
*/
function verifica_cpf_cnpj(valor) {

    // Garante que o valor é uma string
    valor = valor.toString();

    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');

    // Verifica CPF
    if (valor.length === 11) {
        return 'CPF';
    }

    // Verifica CNPJ
    else if (valor.length === 14) {
        return 'CNPJ';
    }

    // Não retorna nada
    else {
        return false;
    }

} // verifica_cpf_cnpj

/*
 calc_digitos_posicoes
 
 Multiplica dígitos vezes posições
 
 @param string digitos Os digitos desejados
 @param string posicoes A posição que vai iniciar a regressão
 @param string soma_digitos A soma das multiplicações entre posições e dígitos
 @return string Os dígitos enviados concatenados com o último dígito
*/
function calc_digitos_posicoes(digitos, posicoes = 10, soma_digitos = 0) {

    // Garante que o valor é uma string
    digitos = digitos.toString();

    // Faz a soma dos dígitos com a posição
    // Ex. para 10 posições:
    //   0    2    5    4    6    2    8    8   4
    // x10   x9   x8   x7   x6   x5   x4   x3  x2
    //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
    for (var i = 0; i < digitos.length; i++) {
        // Preenche a soma com o dígito vezes a posição
        soma_digitos = soma_digitos + (digitos[i] * posicoes);

        // Subtrai 1 da posição
        posicoes--;

        // Parte específica para CNPJ
        // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
        if (posicoes < 2) {
            // Retorno a posição para 9
            posicoes = 9;
        }
    }

    // Captura o resto da divisão entre soma_digitos dividido por 11
    // Ex.: 196 % 11 = 9
    soma_digitos = soma_digitos % 11;

    // Verifica se soma_digitos é menor que 2
    if (soma_digitos < 2) {
        // soma_digitos agora será zero
        soma_digitos = 0;
    } else {
        // Se for maior que 2, o resultado é 11 menos soma_digitos
        // Ex.: 11 - 9 = 2
        // Nosso dígito procurado é 2
        soma_digitos = 11 - soma_digitos;
    }

    // Concatena mais um dígito aos primeiro nove dígitos
    // Ex.: 025462884 + 2 = 0254628842
    var cpf = digitos + soma_digitos;

    // Retorna
    return cpf;

} // calc_digitos_posicoes

/*
 Valida CPF
 
 Valida se for CPF
 
 @param  string cpf O CPF com ou sem pontos e traço
 @return bool True para CPF correto - False para CPF incorreto
*/
function valida_cpf(valor) {

    // Garante que o valor é uma string
    valor = valor.toString();

    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Captura os 9 primeiros dígitos do CPF
    // Ex.: 02546288423 = 025462884
    var digitos = valor.substr(0, 9);

    // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
    var novo_cpf = calc_digitos_posicoes(digitos);

    // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
    var novo_cpf = calc_digitos_posicoes(novo_cpf, 11);

    // Verifica se o novo CPF gerado é idêntico ao CPF enviado
    if (novo_cpf === valor) {
        // CPF válido
        return true;
    } else {
        // CPF inválido
        return false;
    }

} // valida_cpf

/*
 valida_cnpj
 
 Valida se for um CNPJ
 
 @param string cnpj
 @return bool true para CNPJ correto
*/
function valida_cnpj(valor) {

    // Garante que o valor é uma string
    valor = valor.toString();

    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // O valor original
    var cnpj_original = valor;

    // Captura os primeiros 12 números do CNPJ
    var primeiros_numeros_cnpj = valor.substr(0, 12);

    // Faz o primeiro cálculo
    var primeiro_calculo = calc_digitos_posicoes(primeiros_numeros_cnpj, 5);

    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    var segundo_calculo = calc_digitos_posicoes(primeiro_calculo, 6);

    // Concatena o segundo dígito ao CNPJ
    var cnpj = segundo_calculo;

    // Verifica se o CNPJ gerado é idêntico ao enviado
    if (cnpj === cnpj_original) {
        return true;
    }

    // Retorna falso por padrão
    return false;

} // valida_cnpj

/*
 valida_cpf_cnpj
 
 Valida o CPF ou CNPJ
 
 @access public
 @return bool true para válido, false para inválido
*/
function valida_cpf_cnpj(valor) {

    // Verifica se é CPF ou CNPJ
    var valida = verifica_cpf_cnpj(valor);

    // Garante que o valor é uma string
    valor = valor.toString();

    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Valida CPF
    if (valida === 'CPF') {
        // Retorna true para cpf válido
        return valida_cpf(valor);
    }

    // Valida CNPJ
    else if (valida === 'CNPJ') {
        // Retorna true para CNPJ válido
        return valida_cnpj(valor);
    }

    // Não retorna nada
    else {
        return false;
    }

} // valida_cpf_cnpj

/*
 formata_cpf_cnpj
 
 Formata um CPF ou CNPJ

 @access public
 @return string CPF ou CNPJ formatado
*/
function formata_cpf_cnpj(valor) {

    // O valor formatado
    var formatado = false;

    // Verifica se é CPF ou CNPJ
    var valida = verifica_cpf_cnpj(valor);

    // Garante que o valor é uma string
    valor = valor.toString();

    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Valida CPF
    if (valida === 'CPF') {

        // Verifica se o CPF é válido
        if (valida_cpf(valor)) {

            // Formata o CPF ###.###.###-##
            formatado = valor.substr(0, 3) + '.';
            formatado += valor.substr(3, 3) + '.';
            formatado += valor.substr(6, 3) + '-';
            formatado += valor.substr(9, 2) + '';

        }

    }

    // Valida CNPJ
    else if (valida === 'CNPJ') {

        // Verifica se o CNPJ é válido
        if (valida_cnpj(valor)) {

            // Formata o CNPJ ##.###.###/####-##
            formatado = valor.substr(0, 2) + '.';
            formatado += valor.substr(2, 3) + '.';
            formatado += valor.substr(5, 3) + '/';
            formatado += valor.substr(8, 4) + '-';
            formatado += valor.substr(12, 14) + '';

        }

    }

    // Retorna o valor 
    return formatado;

} //

/// ======= FUNÇÃO SENHA 
function senhaValida(p) {
    var retorno = false;
    var letrasMaiusculas = /[A-Z]/;
    var letrasMinusculas = /[a-z]/;
    var numeros = /[0-9]/;
    var caracteresEspeciais = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
    var auxMaiuscula = 0;
    var auxMinuscula = 0;
    var auxNumero = 0;
    var auxEspecial = 0;
    for (var i = 0; i < p.length; i++) {
        if (letrasMaiusculas.test(p[i]))
            auxMaiuscula++;
        else if (letrasMinusculas.test(p[i]))
            auxMinuscula++;
        else if (numeros.test(p[i]))
            auxNumero++;
        else if (caracteresEspeciais.test(p[i]))
            auxEspecial++;
    }
    if (p.length > 5) {
        if (auxMaiuscula > 0) {
            if (auxMinuscula > 0) {
                if (auxNumero > 0) {
                    if (auxEspecial) {
                        retorno = 0;
                    } else {
                        retorno = 4;
                    }
                } else {
                    retorno = 3;
                }
            } else {
                retorno = 2;
            }
        } else {
            retorno = 1;
        }
    } else {
        retorno = false;
    }
    return retorno;
} /// ===== FUNÇÃO SENHA 

/// ============ FUNÇÃO TELL 
function telefone_validation(telefone) {
    //retira todos os caracteres menos os numeros
    telefone = telefone.replace(/\D/g, '');

    //verifica se tem a qtde de numero correto
    if (!(telefone.length >= 10 && telefone.length <= 11)) return false;

    //Se tiver 11 caracteres, verificar se começa com 9 o celular
    if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) return false;

    //verifica se não é nenhum numero digitado errado (propositalmente)
    for (var n = 0; n < 10; n++) {
        //um for de 0 a 9.
        //estou utilizando o metodo Array(q+1).join(n) onde "q" é a quantidade e n é o
        //caractere a ser repetido
        if (telefone == new Array(11).join(n) || telefone == new Array(12).join(n)) return false;
    }
    //DDDs validos
    var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19,
        21, 22, 24, 27, 28, 31, 32, 33, 34,
        35, 37, 38, 41, 42, 43, 44, 45, 46,
        47, 48, 49, 51, 53, 54, 55, 61, 62,
        64, 63, 65, 66, 67, 68, 69, 71, 73,
        74, 75, 77, 79, 81, 82, 83, 84, 85,
        86, 87, 88, 89, 91, 92, 93, 94, 95,
        96, 97, 98, 99
    ];
    //verifica se o DDD é valido (sim, da pra verificar rsrsrs)
    if (codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) return false;
    if (new Date().getFullYear() < 2017) return true;
    if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) return false;
    return true;
}; /// ========= FUNÇÃO TELL

///  FUNÇÃO DATA 
function validarData(data) {
    var matches = /^(\d{2})[-\/](\d{2})[-\/](\d{4})$/.exec(data);
    if (matches == null) {
        return false;
    } else {
        var dia = matches[2];
        var mes = matches[1];
        var ano = matches[3];
        var MyData = new Date(ano, mes - 1, dia);
        if ((MyData.getMonth() + 1 != mes) || (MyData.getDate() != dia) || (MyData.getFullYear() != ano)) {
            return false;
        } else {
            return true;
        }
    }
} /// ==== FUNÇÃO DATA 

/// ============ FUNÇÃO EMAIL 
function verifemail(email) {
    var email = $("#email").val();
    var status = false;
    var emailLength = email.length;
    if (email != "" && emailLength > 4) {
        email = email.replace(/\s/g, ""); //To remove space if available
        var dotIndex = email.indexOf(".");
        var atIndex = email.indexOf("@");

        if (dotIndex > -1 && atIndex > -1) { //To check (.) and (@) present in the string
            if (dotIndex != 0 && dotIndex != emailLength && atIndex != 0 && atIndex != emailLength && email.slice(email.length - 1) != ".") { //To check (.) and (@) are not the firat or last character of string
                var dotCount = email.split('.').length
                var atCount = email.split('@').length

                if (atCount == 2 && (dotIndex - atIndex > 2)) { //To check (@) present multiple times or not in the string. And (.) and (@) not located subsequently
                    status = true;
                }
            }
        }
    }
    $('#email').val(email);
    return status;
}; /// ========= FUNÇÃO EMAIL 

/// ====== FUNÇÕES CEP 
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('estado').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('estado').value = (conteudo.uf);
    } else {
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function autofillCEP(valor) {
    var cep = valor.replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;

        if (validacep.test(cep)) {
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('estado').value = "...";

            var script = document.createElement('script');

            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            document.body.appendChild(script);
        } else {
            limpa_formulário_cep();
            $('#senha_erro').html("Formato de CEP inválido.");
            $('#senha_erro').show();
        }
    } else {
        limpa_formulário_cep();
    }
}; /// ==== FUNÇÕES CEP 

(function($) {
    "use strict";
    var enablesubmit = 0;
    $("#cnpj").change(function() {
        const cnpj = $("#cnpj").val();
        if ((valida_cnpj(cnpj)) === false) {
            $('#cnpj_erro').html("CNPJ Inválido");
            $('#cnpj_erro').show();
            enablesubmit = 1;
        } else {
            $('#cnpj_erro').hide();
            enablesubmit = 0;
        }
    });

    $('#nome').on("input", function() {
        const nome = $("#nome").val();
        var regexp = /[^a-zA-Z- ]/g;
        if (nome.match(regexp)) {
            $(this).val(nome.replace(regexp, ''));
        }

        if (($(this).val().length) <= 4) {
            $('#nome_erro').html("Informe o nome completo");
            $('#nome_erro').show();
            enablesubmit = 1;
        } else {
            $('#nome_erro').hide();
            enablesubmit = 0;
        }
    });

    $("#empresa").change(function() {
        const empresa = $("#empresa").val();
        if ((empresa.length) <= 2) {
            $('#empresa_erro').html("Informe nome válido");
            $('#empresa_erro').show();
            enablesubmit = 1;
        } else {
            $('#empresa_erro').hide();
            enablesubmit = 0;
        }
    });

    $("#email").change(function() {
        var email = $("#email").val();

        if (verifemail(email) === false) {
            enablesubmit = 1;
            $('#email_erro').html("E-mail inválido");
            $('#email_erro').show();
        } else {
            $('#email_erro').hide();
            enablesubmit = 0;
        }
    });

    $("#senha").change(function() {
        var senha = $('#senha').val();
        var verific = senhaValida(senha);

        if (verific === false) {
            enablesubmit = 1;
            $('#senha_erro').html("Pelo menos 8 caracteres");
            $('#senha_erro').show();
        } else {
            if (verific != 0) {
                if (verific == 1) {
                    $('#senha_erro').html("Pelo menos 1 letra maiúscula");
                    $('#senha_erro').show();
                } else if (verific == 2) {
                    $('#senha_erro').html("Pelo menos 1 letra minúsculo");
                    $('#senha_erro').show();
                } else if (verific == 3) {
                    $('#senha_erro').html("Pelo menos 1 número");
                    $('#senha_erro').show();
                } else if (verific == 4) {
                    $('#senha_erro').html("Pelo menos 1 caracter especial");
                    $('#senha_erro').show();
                }
            } else {
                enablesubmit = 0;
                $('#senha_erro').hide();
            }
        }
    });

    $("#telefone").change(function() {
        var telefone = $("#telefone").val();

        if ((telefone_validation(telefone)) === false) {
            enablesubmit = 1;
            $('#telefone_erro').html("Telefone inválido");
            $('#telefone_erro').show();
        } else {
            $('#telefone_erro').hide();
            enablesubmit = 0;
        }
    });

    $("#banco").change(function() {
        var banco = $("#banco").val();
        if (banco != "" && banco.length > 6) {
            $('#banco_erro').hide();
            enablesubmit = 0;
        } else {
            enablesubmit = 1;
            $('#banco_erro').html("Informe seus dados bancários corretamente");
            $('#banco_erro').show();
        }
    });

})(jQuery);

function valida() {
    var flag = 0;

    if ($('#nome').val() == "") {
        $('#nome_erro').html("Campo Obrigatório");
        $('#nome_erro').show();
        flag = 1;
    } else {
        if (($('#nome').val().length) <= 4) {
            $('#nome_erro').html("Informe o nome completo");
            $('#nome_erro').show();
            enablesubmit = 1;
        } else {
            $('#nome_erro').hide();
            enablesubmit = 0;
        }
    }

    if ($('#empresa').val() == "") {
        $('#empresa_erro').html("Campo Obrigatório");
        $('#empresa_erro').show();
        flag = 1;
    } else {
        const empresa = $("#empresa").val();
        if ((empresa.length) <= 2) {
            $('#empresa_erro').html("Informe nome válido");
            $('#empresa_erro').show();
            enablesubmit = 1;
        } else {
            $('#empresa_erro').hide();
            enablesubmit = 0;
        }
    }


    if ($('#cnpj').val() == "") {
        $('#cnpj_erro').html("Campo Obrigatório");
        $('#cnpj_erro').show();
        flag = 1;
    } else {
        const cnpj = $("#cnpj").val();
        if ((valida_cpf_cnpj(cnpj)) == false) {
            $('#cnpj_erro').html("CNPJ Inválido");
            $('#cnpj_erro').show();
            enablesubmit = 1;
        } else {
            $('#cnpj_erro').hide();
            enablesubmit = 0;
        }
    }

    if ($('#senha').val() == "") {
        $('#senha_erro').html("Campo Obrigatório");
        $('#senha_erro').show();
        flag = 1;
    } else {
        var senha = $('#senha').val();
        var verific = senhaValida(senha);

        if (verific === false) {
            enablesubmit = 1;
            $('#senha_erro').html("Pelo menos 8 caracteres");
            $('#senha_erro').show();
        } else {
            if (verific != 0) {
                if (verific == 1) {
                    $('#senha_erro').html("Pelo menos 1 letra maiúscula");
                    $('#senha_erro').show();
                } else if (verific == 2) {
                    $('#senha_erro').html("Pelo menos 1 letra minúsculo");
                    $('#senha_erro').show();
                } else if (verific == 3) {
                    $('#senha_erro').html("Pelo menos 1 número");
                    $('#senha_erro').show();
                } else if (verific == 4) {
                    $('#senha_erro').html("Pelo menos 1 caracter especial");
                    $('#senha_erro').show();
                }
            } else {
                enablesubmit = 0;
                $('#senha_erro').hide();
            }
        }
    }

    if ($('#email').val() == "") {
        $('#email_erro').html("Campo Obrigatório");
        $('#email_erro').show();
        flag = 1;
    } else {
        var email = $("#email").val();

        if (verifemail(email) === false) {
            enablesubmit = 1;
            $('#email_erro').html("E-mail inválido");
            $('#email_erro').show();
        } else {
            $('#email_erro').hide();
            enablesubmit = 0;
        }
    }

    if ($('#telefone').val() == "") {
        $('#telefone_erro').html("Campo Obrigatório");
        $('#telefone_erro').show();
        flag = 1;
    } else {
        var telefone = $("#telefone").val();

        if ((telefone_validation(telefone)) === false) {
            enablesubmit = 1;
            $('#telefone_erro').html("Telefone inválido");
            $('#telefone_erro').show();
        } else {
            $('#telefone_erro').hide();
            enablesubmit = 0;
        }
    }

    if ($('#cep').val() == "") {
        $('#cep_erro').html("Campo Obrigatório");
        $('#cep_erro').show();
        flag = 1;
    } else {
        $('#cep_erro').hide();
    }

    if ($('#rua').val() == "") {
        $('#rua_erro').html("Campo Obrigatório");
        $('#rua_erro').show();
        flag = 1;
    } else {
        $('#rua_erro').hide();
    }

    if ($('#numero').val() == "") {
        $('#numero_erro').html("Campo Obrigatório");
        $('#numero_erro').show();
        flag = 1;
    } else {
        $('#numero_erro').hide();
    }

    if ($('#bairro').val() == "") {
        $('#bairro_erro').html("Campo Obrigatório");
        $('#bairro_erro').show();
        flag = 1;
    } else {
        $('#bairro_erro').hide();
    }

    if ($('#cidade').val() == "") {
        $('#cidade_erro').html("Campo Obrigatório");
        $('#cidade_erro').show();
        flag = 1;
    } else {
        $('#cidade_erro').hide();
    }

    if ($('#estado').val() == "" || $('#estado').val() == "") {
        $('#estado_erro').html("Campo Obrigatório");
        $('#estado_erro').show();
        flag = 1;
    } else {
        $('#estado_erro').hide();
    }

    if ($('#banco').val() == "") {
        $('#banco_erro').html("Campo Obrigatório");
        $('#banco_erro').show();
        flag = 1;
    } else {
        var banco = $("#banco").val();
        if (banco != "" && banco.length > 6) {
            $('#banco_erro').hide();
            enablesubmit = 0;
        } else {
            enablesubmit = 1;
            $('#banco_erro').html("Informe seus dados bancários corretamente");
            $('#banco_erro').show();
        }
    }

    if (flag == 0) {
        enablesubmit = 0;
        document.getElementById("form-cadastro").submit();
    }

}