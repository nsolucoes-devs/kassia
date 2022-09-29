var u = location.protocol + "//" + window.location.hostname;

function excluirafiliado(id) {
    $('#id').val(id);
}

$('#senha_btn').on('click', function() {
    const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
    $('#senha').prop('type', type);
    if (type == "text") {
        $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
        $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
    }
});


$(document).ready(function() {

    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });

    if (alertN != false) {
        if (alertN == 1) {
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
                title: 'Afiliado criado com sucesso!'
            })
        } else if (alertN == 2) {
            const Toast2 = Swal.mixin({
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

            Toast2.fire({
                icon: 'success',
                title: 'Afiliado editado com sucesso!'
            })
        } else if (alertN == 3) {
            const Toast2 = Swal.mixin({
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

            Toast2.fire({
                icon: 'success',
                title: 'Afiliado excluído com sucesso!'
            })
        } else if (alertN == 4) {
            const Toast2 = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast2.fire({
                icon: 'error',
                title: 'Não foi possível excluir o afiliado, pois a senha está incorreta',
            })
        }
    }
});


function senha() {
    $('#formsenha').show();
    $('#status_enviar').val($('#status_modal').val());
}

function ativoAfiliado(idAfiliado, step) {
    var swalWithBootstrapButtons = Swal.mixin({});
    if (step == 1) {
        swalWithBootstrapButtons = Swal.mixin({
            title: 'Aprovação',
            text: "Tem certeza que quer aprovar esse cadastro ?",
            icon: 'question',
            confirmButtonText: 'Aprovar',
            cancelButtonText: 'Cancelar',
        });
    } else if (step == 2) {
        swalWithBootstrapButtons = Swal.mixin({
            title: 'Reprovação',
            text: "Tem certeza que quer reprovar esse cadastro ?",
            icon: 'error',
            confirmButtonText: 'Reprovar',
            cancelButtonText: 'Cancelar',
        });
    }

    swalWithBootstrapButtons.fire({
        showCancelButton: true,
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger',
            actions: 'justify-content-around',
        },
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: u + "/admin/adminafiliados/afiliadoAtivo?id=" + idAfiliado + "&step=" + step,
                type: "POST",
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(feedback) {
                    Swal.fire({
                        title: feedback.title,
                        text: feedback.msg,
                        icon: feedback.type,
                    }).then((value) => {
                        if (feedback.type == 'success') {
                            document.location.reload(true);
                        }
                    });
                }
            });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                '',
                'error'
            )
        }
    })
}