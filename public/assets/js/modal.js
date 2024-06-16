$(function () {
    // Funções de abrir e fechar formulário

    abrirJanela();
    verificarCliqueFechar();

    function abrirJanela() {
        $(".btn-orcamento").click(function (e) {
            e.stopPropagation();

            var alturaJanela = $(window).scrollTop() + $(window).height();

            $(".bg").css("height", alturaJanela);

            $(".bg").fadeIn();
        });
    }

    function verificarCliqueFechar() {
        var el = $("body,.closeBtn");

        el.click(function () {
            $(".bg").fadeOut();
        });

        $(".form").click(function (e) {
            e.stopPropagation();
        });
    }

    // Eventos do formulário

    $("input[type=text]").focus(function () {
        resetarCampoInvalido($(this));
    });

    $('textarea[name="mensagem"]').focus(function () {
        resetarCampoInvalido($(this));
    });

    $("form#form-valid").submit(function (e) {
        // e.preventDefault();
        var nome = $("input[name=nome]").val();
        var telefone = $("input[name=telefone]").val();
        var email = $("input[name=email]").val();

        var produto = $("input[name=produto]").val();
        var mensagem = $('textarea[name="mensagem"]').val();

        if (verificarNome(nome) == false) {
            aplicarCampoInvalido($("input[name=nome]"));
            return false;
        } else if (verificarTelefone(telefone) == false) {
            aplicarCampoInvalido($("input[name=telefone]"));
            return false;
        } else if (verificarEmail(email) == false) {
            aplicarCampoInvalido($("input[name=email]"));

            return false;
        } else if (produto.length <= 0) {
            aplicarCampoInvalido($("input[name=produto]"));

            return false;
        } else if (mensagem.length <= 0) {
            aplicarCampoInvalido($('textarea[name="mensagem"]'));

            return false;
        } else {
            if ($('input[name="acao"]').val() == "Enviando...") return false;

            $('input[name="acao"]').val("Enviando...");

            $.ajax({
                url: "valida-formulario.php",
                type: "post",
                dataType: "html",
                data: {
                    metodo: $("#metodo").val(),

                    nome: $('input[name="nome"]').val(),
                    telefone: $('input[name="telefone"]').val(),
                    email: $('input[name="email"]').val(),
                    produto: $('input[name="produto"]').val(),
                    mensagem: $('textarea[name="mensagem"]').val(),
                },
            }).done(function (data) {
                alert(data);

                $('input[name="acao"]').val("Enviar");
                // $('#metodo').val('formulario-ajax-orcamento');

                $('input[name="nome"]').val("");
                $('input[name="telefone"]').val("");
                $('input[name="email"]').val("");
                $('input[name="produto"]').val("");
                $('textarea[name="mensagem"]').val("");
            });

            alert("Formulario enviado com sucesso!");

            return false;
        }

        // Se chegar ate o final ta okay
    });

    // Funções para estilizar o campo do formulario

    function aplicarCampoInvalido(el) {
        el.css("color", "red");
        el.css("border", "2px solid red");
        el.val("Preencher corretamente...").css("color", "red");
        // el.data('invalido','true');
    }

    function resetarCampoInvalido(el) {
        el.css("color", "#222");
        el.css("border", "1px solid #ccc");
        el.val("");
    }

    // Funções para verificar nossos campos

    function verificarNome(nome) {
        if (nome == "") return false;

        var amount = nome.split(" ").length;
        var splitStr = nome.split(" ");

        if (amount >= 2) {
            for (var i = 0; i < amount; i++) {
                if (splitStr[i].match(/^[A-Z]{1}[a-z]{1,}$/)) {
                    // console.log('Condição bateu, podemos dar cont...');
                } else {
                    // aplicarCampoInvalido($('input[name=nome]'));
                    return false;
                }
            }
        } else {
            // aplicarCampoInvalido($('input[name=nome]'));
            return false;
        }
    }

    function verificarTelefone(telefone) {
        if (telefone == "") return false;

        if (!telefone.match(/^\([0-9]{2}\)[0-9]{5}-[0-9]{4}$/)) return false;
    }

    function verificarEmail(email) {
        if (email == "") return false;

        if (!email.match(/^([a-z0-9-_.]{1,})+@+([a-z.]{1,})$/)) return false;
    }
});
