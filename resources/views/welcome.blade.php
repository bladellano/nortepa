<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- REQUIRED META TAGS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Norte Máquinas, fundada em 1986 por Sr. Paulo Ferreira e localizada em Ananindeua/PA, destaca-se como referência na representação e distribuição de máquinas e suprimentos para diversas indústrias, incluindo madeira, metal-mecânica, espuma, alimentícia, entre outras. Comprometida com a excelência, oferecemos soluções de qualidade para impulsionar o sucesso e eficiência operacional dos nossos clientes. Conte conosco para as melhores opções para as necessidades específicas do seu negócio.">
    <meta name="keywords" content="" />

    <!-- <title></title> -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta">

    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/redes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modal.css') }}">

</head>

<body>

    <!-- FORMULARIO ORÇAMENTO MODAL -->
    <div class="bg">
        <div class="form">
            <div class="closeBtn"><i class="fas fa-times"></i></div>
            <form id="form-valid">
                <h4>Formulário de Orçamento</h4>
                <input type="text" name="nome" placeholder="*Nome completo">
                <input type="text" name="telefone" placeholder="*Telefone">
                <input type="text" name="email" placeholder="*E-mail">
                <input type="text" name="produto" placeholder="*Produto">
                <textarea name="mensagem" placeholder="*Mensagem"></textarea><br />
                <input type="hidden" id="metodo" value="formulario-ajax-orcamento">
                <input type="submit" class="btn btn-success btn-sm mt-2" name="acao" value="ENVIAR">
            </form>

        </div> <!-- ./FIM -->
    </div> <!-- ./FIM DIV BG -->

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">

            <a class="navbar-brand js-scroll-trigger" href="#topo">NORTE MÁQUINAS</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#empresa">Empresa</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?i=produtos">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#servicos">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#feiras">Feiras</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#representacoes">Representações</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#fale-conosco">Fale Conosco</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right mx-2">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-light mx-2" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li class="mx-1">
                                <a href="./home">Gerenciador</a>
                            </li>
                            
                            <li class="mx-1">

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>

                <a class="btn btn-success my-2 my-sm-0 btn-sm" href="http://webmail.nortemaquinaspara.com.br" target="_blank">WEBMAIL</a>

            </div>

        </div>
    </nav> <!-- ./NAVBAR -->

    <!-- REDES SOCIAIS VERTICAL -->
    <div class="rede sr-logo">
        <div id="facebook"><a href="https://www.facebook.com/NorteMaquinas/" target="_blank" class="fab fa-facebook-f"></a></div>
        <div id="youtube"><a href="https://www.youtube.com/channel/UCkgpJCOuJwAqUXQo3KJALOA" target="_blank" class="fab fa-youtube"></a></div>
        <div id="instagram"><a href="https://www.instagram.com/p/Bu4iwFyHhm8/" target="_blank" class="fab fa-instagram"></a></div>
        <div id="whatsapp"><a href="https://api.whatsapp.com/send?phone=55988554723" target="_blank" class="fab fa-whatsapp"></a></div>
    </div>
    <!-- ./FIM-->

    <section id="topo"></section>

    <!-- CAROUSEL -->
    <div id="carousel-indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-indicators" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-indicators" data-slide-to="1"></li>
            <li data-target="#carousel-indicators" data-slide-to="2"></li>
            <li data-target="#carousel-indicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/images/imagens(1).jpeg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/images/imagens(2).jpeg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/images/imagens(3).jpeg') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/images/imagens(4).jpg') }}" alt="Fourth slide">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carousel-indicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-indicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- ./FIM -->

    <!-- EMPRESA -->
    <section id="empresa" class="sr-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="">Empresa</h2>
                    <hr>
                    <p class="text-justify">

                    <p>Fundada no ano de 1986, através do Sr. Paulo Ferreira, a Norte Máquinas esta localizada na cidade de Ananindeua/PA destaca-se na representação e distribuição máquinas e suprimentos p/ indústria em geral (madeira, metal-mecânica, espuma, alimenticia e etc.).</p>

                    <h4>Nossos princípios e valores</h4>
                    <ul>
                        <li>Plena satisfação dos nossos clientes</li>
                        <li>Respeito aos colaboradores e fornecedores</li>
                        <li>Integridade</li>
                        <li>Honestidade</li>
                        <li>Transparência</li>
                        <li>Evolução constante</li>

                    </ul>

                    <h4>Missão</h4>
                    <p>Ser a empresa de maior diferencial para o seu cliente, no que diz respeito ao atendimento pré e pós-vendas na área de máquinas industriais, e ser assim, imediatamente reconhecida, perante nosso mercado e comunidade.</p>

                    <h4>Visão</h4>
                    <p>Ser uma empresa transparente e integra, para todos: clientes, fornecedores e colaboradores, assegurando que todos se sintam amplamente satisfeitos.</p>

                    <h4>Política de Qualidade</h4>
                    <p>Comercializar produtos e serviços que através de nossas marcas adicionem valor para o cliente. Cumprir os requisitos e buscar a melhoria contínua do sistema de gestão de qualidade.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ./FIM -->

    <!-- CATEGORIA/NOTICIAS/PRODUTOS/SERVIÇOS -->
    <section id="categoria" class="sr-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>Categoria</h2>
                    <hr>
                    <p class="text-justify">
                    <ul class="ul-square-categoria">
                        <li><a href="view_paginas.php?titulo=Equipamentos novos">Equipamentos novos</a></li>
                        <li><a href="view_paginas.php?titulo=Equipamentos usados">Equipamentos usados</a></li>
                        <li><a href="view_paginas.php?titulo=Produtos#FERRAMENTAS">Ferramentas</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h2>Produtos</h2>
                    <hr>
                    <p class="text-justify">
                        <?php
                        //include_once('includes/produtos.php'); 
                        ?>
                </div>
                <div class="col-md-6">
                    <h2 class="">Notícias</h2>
                    <hr>
                    <p class="text-justify">
                        <?php
                        // include_once('includes/noticias.php'); 
                        ?>
                </div>

            </div>
        </div>
    </section>
    <!-- ./FIM -->

    <!-- CATEGORIA/NOTICIAS/PRODUTOS/SERVIÇOS -->
    <section id="servicos" class="sr-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="">Serviços</h2>
                    <hr>
                    <p class="text-justify">
                    <ul>
                        <li>Serviço de repastilhamento de fresas e serras circulares em widia;</li>
                        <li>Serviço de afiação de facas e serras circulares em widia e aço hss;</li>
                        <li>Serviço de manutenção e reforma de máquinas indústrias com garantia.</li>
                        <li>Serviços industriais, montagem, usinamgem e caldeira.</li>
                    </ul>
                </div>
            </div>
    </section>
    <!-- .FIM -->

    <!-- REPRESENTAÇÕES -->
    <section id="representacoes" class="sr-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2 class="">Representações</h2>
                    <hr>
                    <div class="logos-rep">
                        <div><img src="{{ asset('assets/images/logos/arflux.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo-aguia-equipamentos.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_leut.jpg') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_freud.jpg') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_fepam.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_minelli_.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_indfema.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_starret.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_vima.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_possa.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_inabra.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_marond.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_osg.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_union.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_hansatecnica.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_tito.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_alwema.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_lmpe.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_cavemac.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_ip.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_weinig2.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_roster.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_euron.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_power.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_metalcava.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_mendes.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_pinacle.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_harwar.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_arpi.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_inmes.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_momil.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_relman.jpg') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_mazutti.png') }}"></div>
                        <div><img src="{{ asset('assets/images/logos/logo_dambroz.png') }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./FIM -->

    <!-- FEIRAS -->
    <section id="feiras" class="sr-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2 class="">Feiras</h2>
                    <hr>

                    <p>XIII FIPA <span class="expositor">[ EXPOSITOR ]</span></p>
                    <a href="https://www.fiepa.org.br/post/xiii-fipa" target="_blank"><i class="fas fa-link"></i>https://www.fiepa.org.br/</a>
                    <hr>
                    <p>Feiplastic</p>
                    <a href="https://www.feiplastic.com.br/" target="_blank"><i class="fas fa-link"></i> https://www.feiplastic.com.br/</a>
                    <hr>
                    <p>ForMóbile</p>

                    <a href="https://www.formobile.com.br/" target="_blank"><i class="fas fa-link"></i> https://www.formobile.com.br/</a>
                    <hr>
                    <p>Fimma Brasil</p>
                    <a href="https://www.fimma.com.br/" target="_blank"><i class="fas fa-link"></i> https://www.fimma.com.br/</a>
                    <hr>

                </div>
            </div>
        </div>
    </section>
    <!-- .FIM -->

    <!-- LOCALIZAÇÃO -->
    <section id="fale-conosco" class="sr-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h2>Localização</h2>
                    <hr>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.713074259236!2d-48.38755728583121!3d-1.3486541360763307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92a46089f0c411c7%3A0xe089af4010713917!2sNORTE+MAQUINAS+para+industria+em+geral!5e0!3m2!1spt-BR!2sbr!4v1524509650149" width="100%" height="349" frameborder="0" style="border:1px solid #c8d6e5; border-radius: 4px" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">

                    <h2 class="">Formulário de Contato</h2>
                    <hr>

                    <!-- FORMULARIO CONTATO -->

                    <form id="simples-formulario-ajax">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12"> <input type="text" class="form-control" placeholder="Nome" required id="nome"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12"> <input type="text" class="form-control" placeholder="E-mail" id="email"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12"> <input type="text" class="form-control" placeholder="Empresa/Cliente" id="cliente"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Telefone" id="telefone">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-ajust" placeholder="Assunto" id="assunto">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea id="mensagem" cols="40" rows="5" class="form-control" placeholder="Mensagem"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">

                                <input class="btn btn-light btn-sm" type="submit" id="enviar" value="ENVIAR">

                                <input type="hidden" id="metodo" value="formulario-ajax">

                            </div>
                        </div>
                    </form>
                    <!-- ./FIM -->

                </div>
            </div>
        </div>
    </section>
    <!-- ./FIM -->

    <footer>
        <!-- RODAPÉ -->
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <h4>Norte Máquinas Pará Ltda</h4>
                    <p class="txt-rodape">Loja: Estrada do Cajuí N° 500, curva do
                        Cajuí – CEP: 67.145-200 - Ananindeua – Pará</p>
                    <div class="telefone">
                        <p class="txt-rodape"><i class="fas fa-phone"></i> (91) 3286-2088</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="whatsapp">
                        <p class="txt-rodape"><i class="fab fa-whatsapp"></i> (91) 98155-3047</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="email">
                        <p class="txt-rodape"><i class="fas fa-envelope"></i> contato@nortemaquinaspara.com.br</p>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="hr-mobile">
                </div>
                <div class="col-md-4">
                    <h4>Institucional</h4>
                    <p>
                    <ul class="txt-rodape ul-square">
                        <li><a href="">Início</a></li>
                        <li><a href="#empresa">Empresa</a></li>
                        <li><a href="#produtos">Produtos</a></li>
                        <li><a href="#servicos">Serviços</a></li>
                        <li><a href="#feiras">Feiras</a></li>
                        <li><a href="#representacoes">Representações</a></li>
                        <li><a href="#fale-conosco">Fale Conosco</a></li>
                    </ul>
                    </p>
                    <hr class="hr-mobile">
                </div>

                <div class="col-md-4 text-right orcamento-right">

                    <button class="btn btn-success btn-orcamento mb-5 btn-sm">Solicite Orçamento</button>

                    <img class="sr-logo" class="logo-norte" src="{{ asset('assets/images/logo_n.png') }}" alt="NORTE MÁQUINAS">
                </div>
            </div>
        </div>
        <!-- fim rodapé -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 d-lg-none text-center assinatura">Copyright 2018 © Norte Máquinas Pará Ltda</div>
                    <div class="col-md-6 d-none d-lg-block text-left">Copyright 2018 © Norte Máquinas Pará Ltda</div>

                    <div class="col-md-6 d-lg-none text-center assinatura">Desenvolvido por CDNS Systems</div>
                    <div class="col-md-6 d-none mt-3 d-lg-block text-right">Desenvolvido por CDNS Systems</div>

                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- SCRIPT PARA ESCONDER CAIXA -->
    <script>
        $('.box span').click(function() {
            var texto = $(this).siblings();
            texto.toggleClass("esconder");
        });

        function abrir(URL) {

            var width = 850;
            var height = 550;

            var left = 310;
            var top = 30;

            window.open(URL, 'janela', 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left + ', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

        }
    </script>
    <!-- ./FIM -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- SCRIPT PERSONALIZADO -->

    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

</body>

</html>