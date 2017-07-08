<?php
add_filter('genesis_attr_body', 'add_mobi_frontpage_css');

function add_mobi_frontpage_css($attr) {
    // add original plus extra CSS classes
    $attributes['class'] .= ' frontpage';

    // return the attributes
    return $attributes;
}

add_action('mobi_landing_loop', 'add_mobi_frontpage_content');

function add_mobi_frontpage_content() {
    ?>

    <div id='frontpage-bg'>
        <div id="filter" style="z-index: 1;background-color: rgba(158, 215, 234, 0.93);"></div>
    </div>

    <div id="banner">
        <div id="banner-container" class="text-center">
            <h1 style="font-size: 26pt;text-transform: uppercase;font-family: 'Gotham-Bold'!important;margin-bottom: 30px;line-height: 50px;">
                O controle do casamento na palma da mão do cerimonialista. 
            </h1>
            <span style="font-weight:lighter;">Literalmente.</span>

            <form id='free-trial-form' action="https://app.mobilizeeventos.com/external.php" method="get">
                <div class='cta-wrapper' style='margin-top:30px;'>
                    <input type="hidden" name="classe" value="register">
                    <input type="hidden" name="metodo" value="submitLanded">
                    <input type="hidden" name="landedFrom" value="#main landing#">
                    <div class='col-md-7' style='padding-right:0;padding-left:0;'>
                        <input type='text' name="userEmail" placeholder='SEU EMAIL DE CERIMONIALISTA' required/>
                    </div>
                    <div class='col-md-5' style='padding-right:0;padding-left:0;'>
                        <button type='submit'>EXPERIMENTE GRÁTIS</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="argument-list-landing" style='background-color:white;position:relative;z-index:1;'>
        <div style='padding:45px 45px 0;'>
            <h2 style='color:#666;' class='text-center'>Se torne uma cerimonialista com super-poderes!</h2>

            <div class="row argument">
                <div class="col-md-6 text-center">
                    <a href="https://www.youtube.com/watch?v=1Y6u4IVTGkA" rel="wp-video-lightbox"
                       title="Assistir: Modelos de Checklists - Tarefas">
                        <img alt="Modelos de Checklists - Tarefas" class="argument-img-500 img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/checklist-small.png'>
                        <img class="argument-play" src="<?= get_stylesheet_directory_uri() ?>/images/lp-home/youtube-play.png"
                             alt="Modelos de Checklists - Tarefas"/>
                    </a> 
                    <div class="argument-img-description">Clique para assistir o vídeo.</div>
                </div>
                <div class="col-md-6 argument-text">
                    <h3 class="argument-title"><a href="<?= bloginfo('url') ?>/funcionalidades/modelos-de-checklist" title="Conhecer funcionalidade: modelos de checklist">Modelos de Checklists Profissionais</a></h3>
                    <p class="argument-description">Tenha acesso à modelos profissionais de planejamento de casamentos - com instruções, prazos e dicas. Use, adapte ou crie seus próprios modelos.</p>
                </div>
            </div>

            <div class="row argument">
                <div class="col-md-6 argument-text">
                    <h3 class="argument-title"><a href="<?= bloginfo('url') ?>/funcionalidades/lista-de-tarefas-do-evento" title="Conhecer funcionalidade: lista de tarefas dos eventos">Crie e atualize a lista de tarefas dos eventos</a></h3>
                    <p class="argument-description">Com um clique, você gera a lista de tarefas de um novo casamento. Depois, é só vincular fornecedores, marcar o que já foi feito e ainda ser lembrada do que estiver atrasado.</p>
                </div>
                <div class="col-md-6 text-center">
                    <a href="https://www.youtube.com/watch?v=AhXoj0uGvM4" rel="wp-video-lightbox"
                       title="Assistir: Crie e atualize a lista de tarefas do evento">
                        <img alt="Crie e atualize a lista de tarefas do evento" class="argument-img-650-460 img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/lista-tarefas-small.png' title='Crie e atualize a lista de tarefas do evento'>
                        <img class="argument-play" src="<?= get_stylesheet_directory_uri() ?>/images/lp-home/youtube-play.png"
                             alt="Crie e atualize a lista de tarefas do evento"/>
                    </a> 
                    <div class="argument-img-description">Clique para assistir o vídeo.</div>
                </div>
            </div>
            <div class="row argument">
                <div class="col-md-6 text-center">
                    <a href="https://www.youtube.com/watch?v=xLf2yV5pr54" rel="wp-video-lightbox"
                       title="Assistir: Custos e parcelas do casamento de maneira fácil">
                        <img alt="Custos e parcelas do casamento de maneira fácil" class="argument-img-650-460 img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/planilha-custos-small.png' title='Custos e parcelas do casamento de maneira fácil'>
                        <img class="argument-play" src="<?= get_stylesheet_directory_uri() ?>/images/lp-home/youtube-play.png"
                             alt="Custos e parcelas do casamento de maneira fácil"/>
                    </a> 
                    <div class="argument-img-description">Clique para assistir o vídeo.</div>
                </div>
                <div class="col-md-6 argument-text">
                    <h3 class="argument-title"><a href="<?= bloginfo('url') ?>/funcionalidades/planilha-de-custos-do-evento" title="Conhecer funcionalidade: planilha de custos do evento">Custos e parcelas do casamento de maneira fácil</a></h3>
                    <p class="argument-description">O controle de pagamentos de fornecedores é feito de maneira simples e clara, tanto para você quanto para os noivos.</p>
                </div>
            </div>
            <div class="row argument">
                <div class="col-md-6 argument-text">
                    <h3 class="argument-title"><a href="<?= bloginfo('url') ?>/funcionalidades/lista-de-convidados-do-evento" title="Conhecer funcionalidade: lista de convidados dos eventos">Os seus noivos preenchem a lista de convidados</a></h3>
                    <p class="argument-description">Você convida e seus clientes passam a ter acesso ao evento deles e colaborarem no controle e confirmação dos convidados. </p>
                </div>
                <div class="col-md-6 text-center">
                    <a href="https://www.youtube.com/watch?v=9A6kwkssYbk" rel="wp-video-lightbox"
                       title="Assistir: Os seus noivos preenchem a lista de convidados">
                        <img alt="Os seus noivos preenchem a lista de convidados" class="argument-img-650-460 img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/lista-convidados-small.png' title='Os seus noivos preenchem a lista de convidados'>
                        <img class="argument-play" src="<?= get_stylesheet_directory_uri() ?>/images/lp-home/youtube-play.png"
                             alt="Os seus noivos preenchem a lista de convidados"/>
                    </a> 
                    <div class="argument-img-description">Clique para assistir o vídeo.</div>
                </div>
            </div>
            <div class="row argument">
                <div class="col-md-6 text-center">
                    <!--<a href="https://www.youtube.com/watch?v=5hvMTn7v3Ts" rel="wp-video-lightbox"
                       title="Assistir: Também pensamos no seu controle financeiro!">-->
                    <img style="cursor:initial;" class="argument-img-650-460 img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/financeiro-small.png' title='Também pensamos no seu controle financeiro!' alt='Controle financeiro para o cerimonialista de casamentos'>
                    <!--<img class="argument-play" src="<?= get_stylesheet_directory_uri() ?>/images/lp-home/youtube-play.png"
                         alt="Também pensamos no seu controle financeiro!"/>-->
                    <!--</a> -->
                    <!--<div class="argument-img-description">Clique para assistir o vídeo.</div>-->
                </div>
                <div class="col-md-6 argument-text">
                    <h3 class="argument-title"><a href="<?= bloginfo('url') ?>/funcionalidades/controle-financeiro-da-empresa" title="Conhecer funcionalidade: controle financeiro da empresa de eventos">Também pensamos no seu controle financeiro!</a></h3>
                    <p class="argument-description">Além de organizar os eventos, você passa a ter controle total sobre as despesas e receitas da sua empresa.</p>
                </div>
            </div>

            <div class="row argument">
                <form id='free-trial-form' action="https://app.mobilizeeventos.com/external.php" method="get">
                    <div id="cta-wrapper-btn-only" class='row cta-wrapper cta-wrapper-small' style='margin:30px auto 0 auto;max-width:500px;'>
                        <input type="hidden" name="classe" value="register">
                        <input type="hidden" name="metodo" value="submitLanded">
                        <input type="hidden" name="landedFrom" value="#main landing#">
                        <input type='hidden' name="userEmail">
                        <div class='col-md-12' style='padding-left:0;'>
                            <button type='submit'>EXPERIMENTE GRÁTIS</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="value-landing">
        <div class="">
            <h2 class="title-blue text-center" style="margin-bottom:20px;font-weight:normal!important;">O que você ganha com o sistema para cerimonialistas de casamentos <strong>mobilize eventos</strong>?</h2>
            <p class="subtitle-gray">Pensamos muito no profissional que faz a <em>assessoria e cerimonial de casamento</em>. O cerimonialista lida com muita gente, muita informação e seu <strong>tempo se torna curto</strong>. </p>

            <div class="row">
                <div class="value-comparison col-md-12 row">
                    <div style="color:#999;" class="col-xs-5 col-sm-5 col-md-5 text-center">Cerimonialista <strong>comum</strong></div>
                    <div class="col-xs-2 col-sm-2 col-md-2 text-center"></div>
                    <div style="color:#0087B4;" class="col-xs-5 col-sm-5 col-md-5 text-center">Cerimonialista que usa <strong>mobilize</strong></div>
                </div>

                <div class="value-comparison col-md-12 row">
                    <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                        <img alt="Cerimonialista que tem processos arcaicos" class="img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/flinstone-small.png' title='Você perde muuito tempo com consultas, checagens, relatórios e tarefas repetitivas.'>
                        <p class="without-mobilize" style="padding-top:10px;">
                            Você perde muuito tempo com consultas, checagens, relatórios e tarefas repetitivas.
                        </p>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                        <img alt="Right sign" class="img-responsive" style="max-height:375px;" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/seta-small.png' title='Cerimonialista comum => Cerimonialista que usa mobilize'>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                        <img alt="Foguete: a empresa de assessoria de casamentos com processos otimizados" class="img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/rocket-small.png' title='Sua produtividade aumenta muito. Você tem mais tempo para fazer o que quiser.'>
                        <p class="with-mobilize" style="padding-top:10px;">
                            Sua <strong>produtividade</strong> aumenta muito. Você tem mais tempo para fazer o que quiser.
                        </p>
                    </div>
                </div>

                <div class="value-comparison col-md-12 row">
                    <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                        <img alt="Cerimonialista sobrecarregada de tarefas" class="img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/overloaded-small.png' title='Você recebe centenas de emails, ligações e mensagens no whats diariamente.'>
                        <p class="without-mobilize" style="padding-top:10px;">
                            Você recebe centenas de emails, ligações e mensagens no <em>whats</em> diariamente. 
                        </p>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                        <img alt="Right sign" class="img-responsive" style="max-height:375px;" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/seta-small.png' title='Cerimonialista comum => Cerimonialista que usa mobilize'>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                        <img alt="Clientes adoram terem informações na palma da mão" class="img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/bride-groom-love-small.png' title='A comunicação com seus clientes fica mais clara. E claro, eles adoram.'>
                        <p class="with-mobilize" style="padding-top:10px;">
                            A <strong>comunicação</strong> com seus clientes fica mais clara. E claro, eles adoram.
                        </p>
                    </div>
                </div>

                <div class="value-comparison col-md-12 text-center">
                    <img alt="Cerimonialista de casamentos feliz com novas vendas" class="img-responsive" style="height:250px;" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/more-sales-small.png' title='A comunicação com seus clientes fica mais clara. E claro, eles adoram.'>
                    <p class="with-mobilize" style="padding-top:10px;max-width:500px;margin:auto;">
                        Os noivos percebem o diferencial da sua empresa desde a primeira apresentação. A gente garante: <strong>você vai fechar mais contratos</strong>!
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div id="depoimentos" style='padding:5em 0;'>
        <div class="text-center" style="width:80%;margin:auto;">
            <h2 style='font-family:"Gotham-Bold"!important;'>O QUE OS CERIMONIALISTAS DIZEM</h2>
            <h5 style="font-weight:lighter!important;">Não tem ninguém melhor do que eles para te contar o que o sistema para assessoria de casamento da <strong>mobilize</strong> faz por você, cerimonialista de casamento.</h5>
        </div>
        <div class='row' style="margin-top:50px;margin-bottom:30px;">
            <div class="col-md-12" style="position:relative;">
                <a href="https://www.youtube.com/watch?v=CJdouYVWIxk" rel="wp-video-lightbox"
                   title="Assistir: Depoimento Thais Mariani Assessoria em Eventos">
                    <img alt="Depoimento da assessora de casamentos Thais Mariani" class="img-responsive" src='<?= get_stylesheet_directory_uri() ?>/images/lp-home/video-thais-small.png' title='Assistir: Depoimento Thais Mariani Assessoria em Eventos'>
                    <img alt="Youtube play icon" class="argument-play" src="<?= get_stylesheet_directory_uri() ?>/images/lp-home/youtube-play.png"/>
                </a> 
            <!--<iframe width="853" height="480" src="https://www.youtube.com/v/CJdouYVWIxk?rel=0" frameborder="0" allowfullscreen></iframe>-->
            </div>
        </div>
        <div class='row' style='padding: 0 30px;'>
            <div class="col-md-6" id="depoimento-container">
                <img alt="Heverthon Mariani Cerimonialista de Casamentos" src='<?= get_stylesheet_directory_uri() ?>/images/hmariani-pic.png' style='width:100px;border-radius:100%;float:left;'>
                <div id="depoimento-text">
                    <h5 style='margin-top:0;'>FACILITA A COMUNICAÇÃO</h5>
                    <div class="text-left">"Os próprios noivos acessam seus eventos e preenchem a lista de convidados. As alterações são atualizadas em tempo real, então economizamos muito tempo em ligações e emails."</div>
                    <div class="depoimento-author">
                        <span style="font-weight:bold;color:#ff8300;">Heverthon,</span>
                        <span>da H. Mariani Produção e Assessoria de Eventos - Maringá - PR.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="depoimento-container">
                <img alt="Dudu do Grupo Banda Biss de Maringá" src='<?= get_stylesheet_directory_uri() ?>/images/dudu-biss-pic.png' style='width:100px;border-radius:100%;float:left;'>
                <div id="depoimento-text">
                    <h5 style='margin-top:0;'>AUMENTA O CONTROLE</h5>
                    <div class="text-left">"Cara, sério... esse negócio foi um grande acerto meu. Antes, eu sempre tinha a sensação de que algo estava faltando. Isso me deu saúde! Olho lá, vejo que não tenho nada atrasado e meu dia fica tranquilo."</div>
                    <div class="depoimento-author">
                        <span style="font-weight:bold;color:#ff8300;">Flávio Eduardo,</span>
                        <span>do Grupo Banda Biss - Maringá, PR.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="depoimento-container">
                <img alt="Bruna Matos da Believe Assessoria de Eventos" src='<?= get_stylesheet_directory_uri() ?>/images/brunabelieve-pic.png' style='width:100px;border-radius:100%;float:left;'>
                <div id="depoimento-text">
                    <h5 style='margin-top:0;'>GESTÃO DOS EVENTOS E DA EMPRESA</h5>
                    <div class="text-left">"Sou fã do sistema, então sou suspeita para comentar. Hoje, usamos à todo vapor e controlamos tudo da empresa, desde os eventos até o financeiro, que era uma dificuldade nossa já que cada cliente paga em uma data e ficávamos perdidas."</div>
                    <div class="depoimento-author">
                        <span style="font-weight:bold;color:#ff8300;">Bruna Matos</span>
                        <span>da Believe Assessoria - São Caetano do Sul - SP.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="depoimento-container">
                <img alt="Thais Mariani Assessoria em Eventos" src='<?= get_stylesheet_directory_uri() ?>/images/thaismariani-pic.png' style='width:100px;border-radius:100%;float:left;'>
                <div id="depoimento-text">
                    <h5 style='margin-top:0;'>AGILIZA E É UM DIFERENCIAL</h5>
                    <div class="text-left">"No primeiro contato, quando mostro que o evento será organizado com o sistema, o cliente se mostra muito mais interessado. Além disso, com o <span id='mobilize-text' style='color:gray;'>mobilize</span> eu consigo gerenciar de maneira simultânea os mais de 40 eventos que ainda vou executar."</div>
                    <div class="depoimento-author">
                        <span style="font-weight:bold;color:#ff8300;">Thais Mariani</span>
                        <span>Assessoria em Eventos - Maringá, PR.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center" style="padding-top:30px;">
            <p style="color: white;max-width: 500px;margin: auto;margin-bottom: 20px;">Cerimonialistas de todo o país já estão conquistando os noivos com o <em>mobilize eventos</em>!</p>
            <a id="cases-btn" href="<?= bloginfo('url') ?>/cases?utm_source=showalllink&utm_medium=cases&utm_campaign=mobilize%20eventos%20-%20index" class="btn" target="_blank"> CONHECER OS CASES DE SUCESSO DA MOBILIZE </a>
        </div>
    </div>

    <div id="videos" class="row">
        <div class="col-lg-5 col-md-6 hidden-sm hidden-xs" id="img"></div>
        <div id="text" class="col-lg-7 col-md-6 col-sm-6">
            <h2 style="font-weight:bolder;font-size:16pt;margin-top:0;line-height:22pt;">
                FEITO PARA VOCÊ GANHAR TEMPO E CONQUISTAR MAIS CLIENTES<br>                
            </h2>
            <div style="margin-top:20px;font-size:11pt;font-weight:lighter;color:#929292;">
                Fizemos uma série de vídeos rápidos para explicar como o mobilize pode transformar sua empresa de organização de casamentos.
            </div>

            <style>
                .a-video {
                    border-radius: 3px 3px 3px 3px;
                    -webkit-border-radius: 3px 3px 3px 3px;
                    border: 1px solid white;
                    min-height: 120px;
                }

                .a-video .card-cover {
                    background-color: #2e3c54;
                    background-size: cover;
                    background-position: 50%;
                    width: 100%;
                    height: 100px;
                    border-radius: 3px 3px 0 0;
                    -webkit-border-radius: 3px 3px 0 0;
                }

                .a-video .card-cover .play-container {
                    height:100%;
                    text-align:center;
                    background-color:rgba(0,0,0,.1);
                }
                .a-video .card-cover .play-container .glyphicon {
                    font-size:3em;
                    margin-top:32px;
                    color:white;
                    text-shadow: 1px 1px 1px rgba(0,0,0,.2);
                }

                .a-video .card-cover:hover .play-container {
                    background-color:rgba(0,0,0,0);
                }
                .a-video .card-cover:hover .play-container .glyphicon {
                    color:#009fcd;
                }

                .a-video .card-category {
                    padding: 5px 10px;
                    font-size:8pt;
                    color:#999;
                    font-weight:bolder;
                }

            </style>
            <div style="margin-top:30px;">
                <div style="font-weight:bold;display:block;margin-bottom:5px;font-size:10pt;">VEJA OS VÍDEOS:</div>
                <div class='col-md-12 hidden-lg' style="padding-left:0;">
                    <a href="https://www.youtube.com/playlist?list=PLxT6wEzrtij-AEclh5tWIO4xUrwBChUhf" target="_blank">Clique para ver no <span style="color:black;">You</span><span style="background-color:red;color:white;">Tube</span>.</a>
                </div>
                
                <div class="hidden-xs hidden-sm hidden-md col-lg-4" style="padding-left:0;">
                    <div class="a-video">
                        <div class="card-cover" style="background-size:cover;background-image: url('<?= get_stylesheet_directory_uri() ?>/images/bg-video-cover-lista-tarefas.PNG');">
                            <a href="https://www.youtube.com/playlist?list=PLxT6wEzrtij-AEclh5tWIO4xUrwBChUhf" target="_blank" title="Clique para ir para os vídeos.">
                                <div class="play-container my-animation">
                                    <span class="glyphicon glyphicon-eye-open my-animation"></span>
                                </div>
                            </a>
                        </div>                        
                        <div class="card-category">
                            A CHECKLIST
                        </div>
                    </div>
                </div>
                <div class="hidden-xs hidden-sm hidden-md col-lg-4">
                    <div class="a-video">
                        <div class="card-cover" style="background-size:cover;background-image: url('<?= get_stylesheet_directory_uri() ?>/images/bg-video-cover-evento.PNG');">
                            <a href="https://www.youtube.com/playlist?list=PLxT6wEzrtij-AEclh5tWIO4xUrwBChUhf" target="_blank" title="Clique para ir para os vídeos.">
                                <div class="play-container my-animation">
                                    <span class="glyphicon glyphicon-eye-open my-animation"></span>
                                </div>
                            </a>
                        </div>                        
                        <div class="card-category">
                            CRIANDO UM EVENTO
                        </div>
                    </div>
                </div>
                <div class="hidden-xs hidden-sm hidden-md col-lg-4" style="padding-right:0;">
                    <div class="a-video">
                        <div class="card-cover" style="background-size:cover;background-image: url('<?= get_stylesheet_directory_uri() ?>/images/bg-video-cover-cliente.png');">
                            <a href="https://www.youtube.com/playlist?list=PLxT6wEzrtij-AEclh5tWIO4xUrwBChUhf" target="_blank" title="Clique para ir para os vídeos.">
                                <div class="play-container my-animation">
                                    <span class="glyphicon glyphicon-eye-open my-animation"></span>
                                </div>
                            </a>
                        </div>
                        <div class="card-category">
                            CONVIDE O CLIENTE
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="planos" class="text-center">
        <div id="filter" style="background-color: rgba(232, 237, 243, 0.875);"></div>
        <div style="z-index:2;position:relative;">
            <h2 style="color:#384A4E;font-family:'Gotham-Bold'!important;">PLANOS E PREÇOS</h2>
            <h5 style="color:#6B7477;font-weight:600!important;width:60%;margin:auto;">Eles se encaixam direitinho no número de eventos que você organiza e o tamanho da sua equipe de cerimonial.</h5>
        </div>
        <div style="width:90%;margin:auto;margin-top:5em;">
            <div class="mbr-section__container mbr-section__container--std-top-padding row" style="width:100%;margin:0;">
                <!--<div class="mbr-plan col-xs-12 mbr-plan--first col-md-3 col-sm-6" style="margin-right:10px;">
                    <div class="mbr-plan__box">
                        <h3 class="mbr-header__text">CASUAL</h3>
                        <div class="mbr-plan__number">
                            <div class="mbr-number mbr-number--price">
                                <div class="mbr-number__num">
                                    <div class="mbr-number__group"><sup class="mbr-number__left">R$</sup><span class="mbr-number__value">60</span></div>
                                </div>
                                <div class="mbr-number__caption">por evento</div>
                            </div>
                        </div>
                        <div class="mbr-plan__details">
                            <ul>
                                <li>1 EVENTO</li>
                                <li>1 USUÁRIO COLABORADOR*</li>
                                <li>1 USUÁRIO CLIENTE</li>
                            </ul>
                        </div>
                        <div class="mbr-plan__buttons">
                            <div class="mbr-buttons mbr-buttons--center"><a class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default" href="/subscribe?plan=casual">COMEÇAR</a></div>
                        </div>
                    </div>
                </div>-->
                <div class="mbr-plan mbr-plan-light col-xs-12 plan-favorite col-md-4 col-sm-4">
                    <div class="mbr-plan__box">
                        <h3 class="mbr-header__text">LIGHT</h3>
                        <div class="mbr-plan__number">
                            <div class="mbr-number mbr-number--price">
                                <div class="mbr-number__num">
                                    <div class="mbr-number__group"><sup class="mbr-number__left">R$</sup><span class="mbr-number__value">55</span></div>
                                </div>
                                <div class="mbr-number__caption">por mês</div>
                                <div class="mbr-number__caption" style="padding-top:5px;font-size:7pt;">no plano anual</div>
                            </div>
                        </div>
                        <div class="mbr-plan__details">
                            <ul>
                                <li>ATÉ 5 EVENTOS</li>
                                <li>1 USUÁRIO COLABORADOR*</li>
                                <li>CLIENTES ILIMITADOS</li>
                            </ul>
                        </div>
                        <div class="mbr-plan__buttons">
                            <div class="mbr-buttons mbr-buttons--center">
                                <a id="free-sign-btn" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default" href="https://app.mobilizeeventos.com/external.php?classe=register&metodo=submitLanded&landedFrom=home_landing&utm_source=buylight&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20index">TESTAR GRATUITAMENTE</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mbr-plan col-xs-12 col-md-4 col-sm-4">
                    <div class="mbr-plan__box">
                        <h3 class="mbr-header__text">PRO</h3>
                        <div class="mbr-plan__number">
                            <div class="mbr-number mbr-number--price">
                                <div class="mbr-number__num">
                                    <div class="mbr-number__group"><sup class="mbr-number__left">R$</sup><span class="mbr-number__value">85</span></div>
                                </div>
                                <div class="mbr-number__caption">por mês</div>
                                <div class="mbr-number__caption" style="padding-top:5px;font-size:7pt;">no plano anual</div>
                            </div>
                        </div>
                        <div class="mbr-plan__details">
                            <ul>
                                <li>ATÉ 15 EVENTOS</li>
                                <li>1 USUÁRIO COLABORADOR*</li>
                                <li>CLIENTES ILIMITADOS</li>
                            </ul>
                        </div>
                        <div class="mbr-plan__buttons">
                            <div class="mbr-buttons mbr-buttons--center">
                                <a id="free-sign-btn" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default" href="https://app.mobilizeeventos.com/external.php?classe=register&metodo=submitLanded&landedFrom=home_landing&utm_source=buyessencial&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20index">TESTAR GRATUITAMENTE</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mbr-plan col-xs-12 col-md-4 col-sm-4">
                    <div class="mbr-plan__box">
                        <div class="mbr-plan__header">
                            <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                                <h3 class="mbr-header__text">PREMIUM</h3>
                            </div>
                        </div>
                        <div class="mbr-plan__number">
                            <div class="mbr-number mbr-number--price">
                                <div class="mbr-number__num">
                                    <div class="mbr-number__group"><sup class="mbr-number__left">R$</sup><span class="mbr-number__value">125</span></div>
                                </div>
                                <div class="mbr-number__caption">por mês</div>
                                <div class="mbr-number__caption" style="padding-top:5px;font-size:7pt;">no plano anual</div>
                            </div>
                        </div>
                        <div class="mbr-plan__details">
                            <ul>
                                <li>EVENTOS ILIMITADOS</li>
                                <li>2 USUÁRIOS COLABORADORES*</li>
                                <li>CLIENTES ILIMITADOS</li>
                            </ul>
                        </div>
                        <div class="mbr-plan__buttons">
                            <div class="mbr-buttons mbr-buttons--center">
                                <a id="free-sign-btn" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default" href="https://app.mobilizeeventos.com/external.php?classe=register&metodo=submitLanded&landedFrom=home_landing&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20index">TESTAR GRATUITAMENTE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="z-index:2;position:relative;margin-top:2em;">
                <a id="cases-btn" href="<?= bloginfo('url') ?>/planos" class="btn"> ENTENDER MELHOR OS PLANOS E PREÇOS </a>
            </div>
        </div>
    </div>

    <div id="contato" class="row" style="padding:3em 0;">
        <div class="text-center" style="width:100%;">
            <h2 style="color:#384A4E;font-family:'Gotham-Bold'!important;">A GENTE TE ESCUTA, EU PROMETO</h2>
            <h5 style="color:#6B7477;margin-top:1em;font-weight:normal!important;line-height:18pt;">
                <span>
                    E aí, curtiu? Tá em dúvida? Quer um orçamento ou saber a receita do bolo? <br>
                    Seja pelo email, telefone, whatsapp, sinal de fumaça ou pombo-correio, fale com a gente!
                </span>
            </h5>
        </div>
        <div style="background-image:url(<?= get_stylesheet_directory_uri() ?>/images/dotted-world-map.png);background-size:contain;background-repeat:no-repeat;background-position: center center;min-height:25em;width:100%;">
            <div class="text-center" style="padding:4em 2em;height:350px;width:350px;background-color:#56C3E4;border-radius:100%;color:white;margin:auto;margin-top:50px;font-size:14pt;">
                <div style="font-weight:bold!important;">CONTATO</div>
                <div style="font-weight:600;margin-top:15px;"><i class="glyphicon glyphicon-phone" style='color:#FFF0A1;'></i> +55 44 9 9704-5188</div>

                <div style="margin-top:15px;color:#FFF0A1;"><i class="glyphicon glyphicon-envelope"></i></div>
                <div style="margin-left:-8px;"><a style="color:white!important;" href="mailto:tainan@mobilizeeventos.com">tainan@mobilizeeventos.com</a></div>

                <div style="margin-top:15px;color:#FFF0A1;"><i class="glyphicon glyphicon-map-marker"></i> </div>
                <div>Maringá, PR.</div>
            </div>
        </div>
    </div>

    <?php
}

//* Run the Genesis loop
//genesis();
get_header();
do_action('mobi_landing_loop');
get_footer();
