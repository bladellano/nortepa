$(function () {
    // logos representações - slick
    $(".logos-rep").slick({
        autoplay: true,
        autoplaySpeed: 1000,
        centerMode: false,
        slidesToShow: 6,
        arrows: false,
        centerPadding: "40px",

        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: false,
                    centerPadding: "40px",
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: false,
                    centerPadding: "40px",
                    slidesToShow: 2,
                },
            },
        ],
    });
    // fim - logos representações

    // aplicando máscara nos campos

    $('input[id="telefone"]').mask("(00)00000-0000");
    $('input[name="telefone"]').mask("(00)00000-0000");

    // fim - aplicando máscara nos campos

    // auto preenchimento formulario contato
    var preencherForm = function () {
        $("#nome").val("João Paulo Gomes");
        $("#email").val("joaoadonys@yahoo.com.br");
        $("#cliente").val("LANYS TECNOLOGIA LTDA");
        $("#telefone").val("(91)9922-8755");
        $("#assunto").val("Preço para três Máquias Industriais");
        $("#mensagem").val(
            "Bom dia! Gostaria de saber o preço para três máquinas para Santarém/PA"
        );
    };

    $("#target").click(function () {
        preencherForm();
    });
    // fim - auto preenchimento formulario contato

    // metodo de envio ajax
    $("#simples-formulario-ajax").submit(function (e) {
        e.preventDefault();

        if ($("#enviar").val() == "Enviando...") {
            return false;
        }

        $("#enviar").val("Enviando...");

        $.ajax({
            url: "valida-formulario.php",
            type: "post",
            dataType: "html",
            data: {
                metodo: $("#metodo").val(),
                nome: $("#nome").val(),
                email: $("#email").val(),
                cliente: $("#cliente").val(),
                telefone: $("#telefone").val(),
                assunto: $("#assunto").val(),
                mensagem: $("#mensagem").val(),
            },
        }).done(function (data) {
            // alert(data);

            $("#simples-formulario-ajax").prepend(
                '<div class="alert alert-success alert-dismissible fade show" role="alert">Solicitação de contato enviado com Sucesso!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            );

            $("#enviar").val("Enviar");
            $("#metodo").val("formulario-ajax");
            $("#nome").val("");
            $("#email").val("");
            $("#cliente").val("");
            $("#telefone").val("");
            $("#assunto").val("");
            $("#mensagem").val("");
        });
    });
    // fim - metodo de envio ajax

    // tempo de rotacao carousel
    $(".carousel").carousel({
        interval: 3000,
    });

    // deslizar sobre a pagina
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top - 56,
                    },
                    1000,
                    "easeInOutExpo"
                );
                return false;
            }
        }
    });

    // configuração - sinalizando os itens do menu
    $("body").scrollspy({
        target: "#mainNav",
        offset: 57,
    });

    // recolher navbar
    var navbarCollapse = function () {
        if (!$("#mainNav").length) {
            return false;
        } // verifica existencia de #mainNav p/ ñ da erro

        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    };

    navbarCollapse();

    $(window).scroll(navbarCollapse);
    // Recolher agora se a página não estiver no topo

    // Scroll reveal calls
    window.sr = ScrollReveal();

    sr.reveal(".sr-section", {
        delay: 200,
        scale: 1,
    });
    sr.reveal(".sr-logo", {
        delay: 200,
        scale: 0,
    });
    //fim - Scroll reveal calls
});
