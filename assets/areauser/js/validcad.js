function validaCpf() {
    var senha = $('#senha_cadastro').val().length;
    var id = 'cpf_cadastro';

    strCPF = document.getElementById(id).value;
    strCPF = strCPF.replace('-', '');
    strCPF = strCPF.replace('.', '');
    strCPF = strCPF.replace('.', '');
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000" ||
        strCPF == "11111111111" ||
        strCPF == "22222222222" ||
        strCPF == "33333333333" ||
        strCPF == "44444444444" ||
        strCPF == "55555555555" ||
        strCPF == "66666666666" ||
        strCPF == "77777777777" ||
        strCPF == "88888888888" ||
        strCPF == "99999999999") {
        valCpfCartao = false;
        document.getElementById(id).setCustomValidity('CPF Inválido!');
        document.getElementById(id).reportValidity();
    } else if (strCPF == "") {
        document.getElementById(id).setCustomValidity('');
    } else {
        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) {
            valCpfCartao = false;
            document.getElementById(id).setCustomValidity('CPF Inválido!');
            document.getElementById(id).reportValidity();
        } else {
            Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11)) Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11))) {
                valCpfCartao = false;
                document.getElementById(id).setCustomValidity('CPF Inválido!');
                document.getElementById(id).reportValidity();
            } else {
                if (senha >= 6) {
                    valCpfCartao = true;
                } else {
                    $('#alert-senha').css('visibility', 'visible');
                }
            }
        }
    }
};

function verifemail(email) {
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

                if (atCount == 2 && (dotIndex - atIndex > 1)) { //To check (@) present multiple times or not in the string. And (.) and (@) not located subsequently
                    status = true;
                    if (dotCount > 2) { //To check (.) are not located subsequently
                        for (i = 2; i <= dotCount - 1; i++) {
                            if (email.split('.')[i - 1].length == 0) {
                                status = false;
                            }
                        }
                    }
                }
            }
        }
    }
    $('#email').val(email);
    return status;
};

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
};

function validarData(data) {
    var data = $("#nascimento").val();
    var matches = /^(\d{2})[-\/](\d{2})[-\/](\d{4})$/.exec(data);
    if (matches == null) {
        return false;
    } else {
        var dia = matches[1];
        var mes = matches[2];
        var ano = matches[3];
        var MyData = new Date(ano, mes - 1, dia);
        var datecurrent = moment().format('YYYY-MM-DD');
        var MyDataF = moment(MyData).format('YYYY-MM-DD');
        if (MyDataF < datecurrent) {
            if ((MyData.getMonth() + 1 != mes) || (MyData.getDate() != dia) || (MyData.getFullYear() != ano)) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

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


/// ====== FUNÇÕES CEP 
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('estado').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('endereco').value = (conteudo.logradouro);
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
            document.getElementById('endereco').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('estado').value = "...";

            var script = document.createElement('script');

            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            document.body.appendChild(script);
            return true;
        } else {
            limpa_formulário_cep();
            return false;
        }
    } else {
        return false;
        limpa_formulário_cep();
    }
}; /// ==== FUNÇÕES CEP 
(function($) {
    "use strict";

    var enablesubmit = 0;
    $("#cpf_cadastro").change(function() {
        validaCpf();
        if (valCpfCartao == false) {
            enablesubmit = 1;
            $('#cpf_cadastro_erro').html("CPF Inválido");
            $('#cpf_cadastro_erro').show();
        } else {
            $('#cpf_cadastro_erro').hide();
            enablesubmit = 0;
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

    $("#nascimento").change(function() {
        var nascimento = $("#nascimento").val();

        if (validarData(nascimento) === false) {
            enablesubmit = 1;
            $('#nascimento_erro').html("Data de nascimento inválido");
            $('#nascimento_erro').show();
        } else {
            $('#nascimento_erro').hide();
            enablesubmit = 0;
        }
    });

    $("#cep").change(function() {
        var cep = $("#cep").val();

        if (autofillCEP(cep) === false) {
            enablesubmit = 1;
            $('#cep_erro').html("Formato de CEP inválido");
            $('#cep_erro').show();
        } else {
            $('#cep_erro').hide();
            enablesubmit = 0;
        }
    });

    $("#senha_cadastro").change(function() {
        var senha = $('#senha_cadastro').val();
        var verific = senhaValida(senha);

        if (verific === false) {
            enablesubmit = 1;
            $('#senha_cadastro_erro').html("Pelo menos 8 caracteres");
            $('#senha_cadastro_erro').show();
        } else {
            if (verific != 0) {
                if (verific == 1) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 letra maiúscula");
                    $('#senha_cadastro_erro').show();
                } else if (verific == 2) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 letra minúsculo");
                    $('#senha_cadastro_erro').show();
                } else if (verific == 3) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 número");
                    $('#senha_cadastro_erro').show();
                } else if (verific == 4) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 caracter especial");
                    $('#senha_cadastro_erro').show();
                }
            } else {
                enablesubmit = 0;
                $('#senha_cadastro_erro').hide();
            }
        }
    });

    $("#confirma_senha_cadastro").change(function() {
        var senha2 = $('#confirma_senha_cadastro').val();
        var verific2 = senhaValida(senha2);

        if (verific2 === false) {
            enablesubmit = 1;
            $('#confirma_senha_cadastro_erro').html("Pelo menos 8 caracteres");
            $('#confirma_senha_cadastro_erro').show();
        } else {
            if (verific2 != 0) {
                $('#senha_cadastro_erro').html("Senha inválida");
                $('#senha_cadastro_erro').show();
                enablesubmit = 1;
            } else {
                if ($('#senha_cadastro').val() != $('#confirma_senha_cadastro').val()) {
                    $('#confirma_senha_cadastro_erro').html("As senhas não são iguais!");
                    $('#confirma_senha_cadastro_erro').show();
                    enablesubmit = 1;
                } else {
                    $('#confirma_senha_cadastro_erro').hide();
                }
            }
        }
    });

})(jQuery);

function valida() {
    var flag = 0;

    if ($('#nome_cadastro').val() == "") {
        $('#nome_cadastro_erro').html("Campo Obrigatório");
        $('#nome_cadastro_erro').show();
        flag = 1;
    } else {
        $('#nome_cadastro_erro').hide();
    }

    if ($('#cpf_cadastro').val() == "") {
        $('#cpf_cadastro_erro').html("Campo Obrigatório");
        $('#cpf_cadastro_erro').show();
        flag = 1;
    } else {
        validaCpf();
        if (valCpfCartao == false) {
            flag = 1;
            $('#cpf_cadastro_erro').html("CPF Inválido");
            $('#cpf_cadastro_erro').show();
        } else {
            $('#cpf_cadastro_erro').hide();
        }
    }

    if ($('#nascimento').val() == "") {
        $('#nascimento_erro').html("Campo Obrigatório");
        $('#nascimento_erro').show();
        flag = 1;
    } else {
        var nascimento = $("#nascimento").val();
        if (validarData(nascimento) === false) {
            flag = 1;
            $('#nascimento_erro').html("Data de nascimento inválido");
            $('#nascimento_erro').show();
        } else {
            $('#nascimento_erro').hide();
        }
    }

    if ($('#email').val() == "") {
        $('#email_erro').html("Campo Obrigatório");
        $('#email_erro').show();
        flag = 1;
    } else {
        var email = $("#email").val();
        if (verifemail(email) === false) {
            flag = 1;
            $('#email_erro').html("E-mail inválido");
            $('#email_erro').show();
        } else {
            $('#email_erro').hide();
        }
    }

    if ($('#telefone').val() == "") {
        $('#telefone_erro').html("Campo Obrigatório");
        $('#telefone_erro').show();
        flag = 1;
    } else {
        var telefone = $("#telefone").val();
        if ((telefone_validation(telefone)) === false) {
            flag = 1;
            $('#telefone_erro').html("Telefone inválido");
            $('#telefone_erro').show();
        } else {
            $('#telefone_erro').hide();
        }
    }

    if ($('#cep').val() == "") {
        $('#cep_erro').html("Campo Obrigatório");
        $('#cep_erro').show();
        flag = 1;
    } else {
        $('#cep_erro').hide();
    }

    if ($('#endereco').val() == "") {
        $('#endereco_erro').html("Campo Obrigatório");
        $('#endereco_erro').show();
        flag = 1;
    } else {
        $('#endereco_erro').hide();
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

    if ($('#senha_cadastro').val() == "") {
        $('#senha_cadastro_erro').html("Campo Obrigatório");
        $('#senha_cadastro_erro').show();
        flag = 1;
    } else {
        var senha = $('#senha_cadastro').val();
        var verific = senhaValida(senha);

        if (verific === false) {
            flag = 1;
            $('#senha_cadastro_erro').html("Pelo menos 8 caracteres");
            $('#senha_cadastro_erro').show();
        } else {
            if (verific != 0) {
                if (verific == 1) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 letra maiúscula");
                    $('#senha_cadastro_erro').show();
                } else if (verific == 2) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 letra minúsculo");
                    $('#senha_cadastro_erro').show();
                } else if (verific == 3) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 número");
                    $('#senha_cadastro_erro').show();
                } else if (verific == 4) {
                    $('#senha_cadastro_erro').html("Pelo menos 1 caracter especial");
                    $('#senha_cadastro_erro').show();
                }
                flag = 1;
            } else {
                $('#senha_cadastro_erro').hide();
            }
        }
    }

    if ($('#confirma_senha_cadastro').val() == "") {
        $('#confirma_senha_cadastro_erro').html("Campo Obrigatório");
        $('#confirma_senha_cadastro_erro').show();
        flag = 1;
    } else {
        var senha2 = $('#confirma_senha_cadastro').val();
        var verific2 = senhaValida(senha2);

        if (verific2 === false) {
            flag = 1;
            $('#confirma_senha_cadastro_erro').html("Pelo menos 8 caracteres");
            $('#confirma_senha_cadastro_erro').show();
        } else {
            if (verific2 != 0) {
                $('#senha_cadastro_erro').html("Senha inválida");
                $('#senha_cadastro_erro').show();
                flag = 1;
            } else {
                if ($('#senha_cadastro').val() != $('#confirma_senha_cadastro').val()) {
                    $('#confirma_senha_cadastro_erro').html("As senhas não são iguais!");
                    $('#confirma_senha_cadastro_erro').show();
                    flag = 1;
                } else {
                    $('#confirma_senha_cadastro_erro').hide();
                }
            }
        }
    }

    if (flag == 0) {
        enablesubmit = 0;
        document.getElementById("form-cadastro").submit();
    }

}