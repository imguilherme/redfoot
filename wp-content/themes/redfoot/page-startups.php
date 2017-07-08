<?php
add_action('mobi_landing_loop', 'add_mobi_frontpage_content');

function add_mobi_frontpage_content() {
    ?>

    <?php include('snippets/snippet-fb-pixel-00-pageview.php'); ?>

    <style>
        body {
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }


        .site-inner {
            padding-top:0;
        }

        .homepage #banner {
            padding: 4em 0 5em 0;
        }

        #banner {
            background-image: url(<?= get_stylesheet_directory_uri() ?>/images/bg-videos.jpg);
        }

        #banner h1 {
            font-size:30pt;
        }

        #main {
            color:#666;
            font-size:12pt;
            font-family:'Gotham';
            font-weight:lighter;
            line-height: 32px;
        }
        #main strong {
            color:#666;
            font-family:'Gotham';
            font-weight:bold;
        }

        .case-card {
            margin-bottom:30px;
        }

        .case-title {
            color: white;
            background-color: #59c4e8;
            padding: 5px 10px;
            font-size: 25pt;
            text-align: left;
        }

        @media screen and (max-width:950px){
            body {
            }

            #logo-mobile {
                margin-top:28px;
            }

            .homepage #banner {
                padding: 9em 0 6em 0;
            }

            #fotos {
                display:block;
                text-align:center;
                float:none!important;
            }
        }
    </style>
    
    <div id="banner" style="background-size:cover;padding-bottom: 80px;">
        <div class="container" style="width:inherit;">
            <h1 class="text-center" style="margin-top: 80px;font-family:'Gotham-Bold'!important;">CASES DO MOBILIZE EVENTOS</h1>
            <div class="text-center" style='width:80%;margin:auto;'>Nossos clientes já estão colhendo <span style="font-style:italic;">bons resultados</span> em suas empresas de casamentos. Você tem que conhecê-los!</div>

        </div>
    </div>

    <div id="main" style="padding-bottom:60px;">
        <div class="" style="width:inherit;">

            <div class="row" style="padding-top:30px;">
                <a href="#thais">
                    <div class="col-md-6 case-card">
                        <img alt="Case da Thais Mariani no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/thais-mariani-0.jpg" title="Case mobilize eventos: Thais Mariani Assessoria" style="width:125px;float:left;">
                        <div style="padding-left:140px;">
                            <div style="font-family: 'Gotham';font-weight:bold;;color: #59c4e5;font-size:125%;">1. Thais Mariani</div>
                            <div style="color: #59c4e5;line-height:20px;">Thais Mariani Assessoria em Eventos</div>
                            <div style="font-size:75%;line-height:20px;color:#ccc;">Maringá - PR</div>
                            <div style="font-size:100%;line-height:20px;color:#ccc;padding-top:10px;">"Com o mobilize eventos eu ganho tempo e conquisto as noivas"</div>
                        </div>
                    </div>
                </a>
                <a href="#believe">
                    <div class="col-md-6 case-card">
                        <img alt="Case da Believe Assessoria no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/believe-3.jpg" title="Case mobilize eventos: Believe Assessoria" style="width:125px;float:left;">
                        <div style="padding-left:140px;">
                            <div style="font-family: 'Gotham';font-weight:bold;;color: #59c4e5;font-size:125%;">2. Bruna Matos</div>
                            <div style="color: #59c4e5;line-height:20px;">Believe Assessoria</div>
                            <div style="font-size:75%;line-height:20px;color:#ccc;">São Caetano do Sul - SP</div>
                            <div style="font-size:100%;line-height:20px;color:#ccc;padding-top:10px;">"Porque escolhemos o mobilize desde a abertura da <em>Believe</em>"</div>
                        </div>
                    </div>
                </a>
                <a href="#biss">
                    <div class="col-md-6 case-card">
                        <img alt="Case do Grupo Banda Biss no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/biss-3.png" title="Case mobilize eventos: Grupo Banda Biss" style="width:125px;float:left;">
                        <div style="padding-left:140px;">
                            <div style="font-family: 'Gotham';font-weight:bold;;color: #59c4e5;font-size:125%;">3. Dudu</div>
                            <div style="color: #59c4e5;line-height:20px;">Grupo Biss</div>
                            <div style="font-size:75%;line-height:20px;color:#ccc;">Maringá - PR</div>
                            <div style="font-size:100%;line-height:20px;color:#ccc;padding-top:10px;">"Organizamos uma empresa com 20 anos de mercado e ganhei saúde!"</div>
                        </div>
                    </div>
                </a>
            </div>

            <h2 class="case-title" id="thais">1. THAIS MARIANI ASSESSORIA</h2>
            <div style="font-style:italic;color:#999;">Assessora de casamentos, Maringá - PR.</div>

            <div style="margin-top:20px;">
                <div style="float:left;" id="fotos">
                    <img alt="Case da Thais Mariani Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/thais-mariani-0.jpg" title="Case mobilize eventos: Thais Mariani Assessoria" style="width:300px;margin-right:20px;margin-bottom:15px;"><br>
                    <img alt="Case da Thais Mariani Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/thais-mariani-1.jpg" title="Case mobilize eventos: Thais Mariani Assessoria" style="width:143px;margin-right:10px;margin-bottom:15px;">
                    <img alt="Case da Thais Mariani Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/thais-mariani-2.jpg" title="Case mobilize eventos: Thais Mariani Assessoria" style="width:143px;margin-right:20px;margin-bottom:15px;"><br>
                    <img alt="Case da Thais Mariani Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/thais-mariani-casamento-1.jpg" title="Case mobilize eventos: Thais Mariani Assessoria" style="width:300px;margin-right:20px;margin-bottom:15px;">
                </div>
                <div>
                    <div style="margin-bottom:15px;">
                        A Thais é cerimonialista de casamentos e sempre foi organizada: <strong>fazia planilhas</strong> com os custos e fornecedores de cada evento, <strong>tinha uma checklist com todas as tarefas</strong> que devem ser feitas desde o início do planejamento até o dia da festa.
                    </div>
                    <div style="margin-bottom:15px;">
                        Mas quanto mais contratos de assessoria ela fechava, <strong>menor era o tempo para manter aquelas planilhas atualizadas</strong>. Às vezes algo passava despercebido e o cliente não era avisado de uma reunião, ou ela <strong>perdia um tempo precioso para encontrar um contrato</strong> dentro das pastas que criava para os casamentos. Sem contar os fins de semana em que passava <strong>digitando a lista de convidados</strong> com 300 nomes que os noivos levavam impresso.
                    </div>
                    <div style="font-family:'Gotham';font-style:italic;margin-bottom:15px;font-size:20pt;padding:10px 15px;color:#097BA0;text-align:center;border-bottom:1px solid #eee;border-top:1px solid #eee;">
                        Ela perdia um tempo precioso para organizar a lista de tarefas, custos e convidados de um novo casamento
                    </div>
                    <div style="margin-bottom:15px;">
                        A Thais ficou presa às planilhas por muito tempo, até encontrou soluções temporárias como o calendário e as planilhas do Google, mas mesmo assim <strong>o trabalho de adicionar cada tarefa era manual</strong> e não atendia as necessidades dela: eram cada vez mais casamentos, mais coisas para fazer e lembrar enquanto as horas do dia continuavam as mesmas.
                    </div>
                    <div style="margin:15px;">
                        <div class="video-container">
                            <iframe width="853" height="480" src="https://www.youtube.com/v/CJdouYVWIxk?rel=0" frameborder="0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div style="margin-bottom:15px;">
                        Por algum tempo, ela continuou pesquisando formas de melhorar a organização dos eventos até que um colega dela (e nosso cliente) indicou que ela utilizasse um <strong>sistema desenvolvido para organizadores de casamentos, o <a href="https://mobilizeeventos.com/signup?utm_source=link1&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20cases">mobilize eventos</a></strong>. Eu mesmo fui ao escritório da Thais e expliquei que se tratava de uma ferramenta que iria fazer ela ganhar muito tempo. Ela ficou com a nossa apresentação e disse que ia estudar a proposta.
                    </div>
                    <div style="line-height:40px;margin-bottom:15px;font-size:20pt;font-style:italic;font-family:'Gotham';padding:10px 15px;color:#097BA0;text-align:center;border-bottom:1px solid #eee;border-top:1px solid #eee;">
                        "Com o mobilize ganho <span style="font-size:25pt;font-family:'Gotham-Bold';">30% de tempo</span> e<br> o sistema <span style="font-size:25pt;font-family:'Gotham-Bold';">motiva as noivas</span> à fecharem contrato comigo"
                    </div>
                    <div style="margin-bottom:15px;">
                        Depois de uma semana ela passou a utilizar o <a href="<?= bloginfo('url') ?>/signup?utm_source=link2&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20cases">sistema mobilize eventos</a>. O início foi difícil, pois se tratava de uma grande mudança, mas quando ela começou a ganhar tempo e ver as reações positivas dos primeiros noivos que tiveram contato com o nosso sistema, foi muito legal tanto pra nós quanto pra ela. Hoje a Thais vende mais e faz o trabalho em menos tempo graças ao nosso sistema e isso é gratificante!          
                    </div>

                    <div id="cta-wrapper-btn-only" class='row cta-wrapper cta-wrapper-small' style='margin:60px auto 0 auto;'>
                        <div class='col-md-12' style='padding-left:0;'>
                            <a id="free-trial-btn" href="https://app.mobilizeeventos.com/external.php?classe=register&metodo=submitLanded&landedFrom=#cases page#&utm_source=botao_cta&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20cases">
                                EXPERIMENTE GRÁTIS
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="case-title" id="believe" style="margin-top:60px;">2. BRUNA MATOS DA BELIEVE ASSESSORIA</h2>
            <div style="font-style:italic;color:#999;">Assessora de casamentos, São Caetano do Sul - SP.</div>

            <div style="margin-top:20px;">
                <div style="float:left;" id="fotos">
                    <img alt="Case da Believe Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/believe-3.jpg" title="Case mobilize eventos: Believe Assessoria" style="width:300px;margin-right:20px;margin-bottom:15px;"><br>
                    <img alt="Case da Believe Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/believe-1.jpg" title="Case mobilize eventos: Believe Assessoria" style="width:143px;margin-right:10px;margin-bottom:15px;">
                    <img alt="Case da Believe Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/believe-2.jpg" title="Case mobilize eventos: Believe Assessoria" style="width:143px;margin-right:20px;margin-bottom:15px;"><br>
                    <img alt="Case da Believe Assessoria em Eventos no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/believe-4.jpg" title="Case mobilize eventos: Believe Assessoria" style="width:300px;margin-right:20px;margin-bottom:15px;">
                </div>
                <div>
                    <div style="margin-bottom:15px;">
                        A <strong>Believe Assessoria</strong> é uma das empresas de assessoria e cerimonial de casamentos que mais cresce no estado de São Paulo e vêm dando um exemplo de como crescer na crise. O primeiro passo foi dado em 2016 e em apenas 6 meses eles tiveram <strong>mais de 30 eventos fechados</strong>, <strong>organizaram o aniversário de uma modelo conhecida nacionalmente</strong> e chegaram à mais de <strong>120mil seguidores no Facebook</strong>.
                    </div>
                    <div style="margin-bottom:15px;">
                        A Bruna avisou seu marido, o Evandro: ela tinha decidido – ia abrir uma empresa de assessoria de casamentos junto com uma sócia! Ela já sabia tudo sobre o mundo de casamentos: organização, comunicação, tendências, bons fornecedores… foi quando o Evandro <strong>começou a pensar em como eles fariam para administrar todas as partes da Believe Assessoria como empresa</strong>.
                    </div>
                    <div style="font-family:'Gotham';font-style:italic;margin-bottom:15px;font-size:20pt;padding:10px 15px;color:#097BA0;text-align:center;border-bottom:1px solid #eee;border-top:1px solid #eee;">
                        Antes mesmo da abertura da empresa, o Evandro e a Bruna começaram a pesquisar por ferramentas que iriam ajudá-los à ter sucesso
                    </div>
                    <div style="margin-bottom:15px;">
                        Eles já tinham experiência com sistemas para empresas. Também sabiam que isso <strong>ajudaria muito na estruturação da nova empresa</strong> de assessoria de casamentos. Bom, para a sorte da mobilize e da Believe, eles encontraram o sistema para cerimonialistas mobilize eventos. Hoje, são um dos nossos grandes parceiros!
                    </div>
                    <div style="margin-bottom:15px;">
                        Na primeira reunião, o Evandro e a Bruna já entenderam a essência. Captaram o quanto o mobilize eventos poderia fazer eles <strong>ganharem tempo e diferenciarem a Believe no mercado de assessores de casamentos</strong>. A Bruna gravou esse vídeo falando sobre a importância do sistema pra eles:
                    </div>
                    <div style="margin:15px;">
                        <div class="video-container">
                            <iframe width="853" height="480" src="https://www.youtube.com/embed/qWBDKQ_gOqU?rel=0" frameborder="0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div style="margin-bottom:15px;">
                        Como ela diz, a ideia do sistema é exatamente essa: estruturar a empresa do cerimonialista de casamentos. Com isso, <strong>o profissional não vai esquecer nenhum detalhe. Além de ganhar tempo, vai se relacionar melhor com os noivos</strong>, que dão mais valor ao seu trabalho.
                    </div>
                    <div style="line-height:40px;margin-bottom:15px;font-size:20pt;font-style:italic;font-family:'Gotham';padding:10px 15px;color:#097BA0;text-align:center;border-bottom:1px solid #eee;border-top:1px solid #eee;">
                        "Sou fã do sistema, então sou suspeita para comentar. Hoje, usamos à todo vapor e <strong style="color:#097BA0;">controlamos tudo da empresa, desde os eventos até o financeiro</strong>, que era uma dificuldade nossa já que cada cliente paga em uma data e ficávamos perdidas."
                    </div>

                    <div id="cta-wrapper-btn-only" class='row cta-wrapper cta-wrapper-small' style='margin:60px auto 0 auto;'>
                        <div class='col-md-12' style='padding-left:0;'>
                            <a id="free-trial-btn" href="https://app.mobilizeeventos.com/external.php?classe=register&metodo=submitLanded&landedFrom=#cases page#&utm_source=botao_cta&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20cases">
                                EXPERIMENTE GRÁTIS
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="case-title" id="biss" style="margin-top:60px;">3. DUDU DO GRUPO BISS</h2>
            <div style="font-style:italic;color:#999;">Diretor do Grupo Biss, Maringá - PR.</div>

            <div style="margin-top:20px;">
                <div style="float:left;" id="fotos">
                    <img alt="Case do Grupo Banda Biss no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/biss-3.png" title="Case mobilize eventos: Grupo Banda Biss" style="width:300px;margin-right:20px;margin-bottom:15px;"><br>
                    <img alt="Case do Grupo Banda Biss no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/biss-1.jpg" title="Case mobilize eventos: Grupo Banda Biss" style="width:143px;margin-right:10px;margin-bottom:15px;">
                    <img alt="Case do Grupo Banda Biss no mobilize eventos" src="<?= get_stylesheet_directory_uri() ?>/images/biss-2.jpg" title="Case mobilize eventos: Grupo Banda Biss" style="width:143px;margin-right:20px;margin-bottom:15px;"><br>
                </div>
                <div>
                    <div style="margin-bottom:15px;">
                        Uma empresa com mais de 20 anos de sucesso no mercado de eventos da sua região não tem porque mudar sua forma de trabalhar, certo? Errado! A história mostra que <strong>as empresas que se mantêm no topo são aquelas que continuam se renovando e buscando inovação no setor de eventos</strong>, mesmo quando a maré já está favorável.
                    </div>
                    <div style="margin-bottom:15px;">
                        Há 21 anos no mercado, o Grupo Banda Biss executa <strong>mais de 140 eventos por ano</strong>. O foco da empresa é em formaturas e casamentos, mas também trabalhando em eventos em datas especiais como Revéillon e Carnaval. Flávio Eduardo é o responsável pelo empreendimento referência na região de Maringá, onde é conhecido apenas como Dudu.
                    </div>
                    <div style="font-family:'Gotham';font-style:italic;margin-bottom:15px;font-size:20pt;padding:10px 15px;color:#097BA0;text-align:center;border-bottom:1px solid #eee;border-top:1px solid #eee;">
                        O Dudu mostra que empresas com anos de sucesso no mercado têm de continuar inovando
                    </div>
                    <div style="margin-bottom:15px;">
                        A história da mobilize junto com o Grupo Banda Biss começou em 2014. Uma de nossas clientes cerimonialistas me disse: “Tainan, você tem que ir em uma empresa que precisa <em>urgentementeeeee</em> do seu sistema!”. Foi quando conhecemos o Dudu e a sua “<em>Agenda que não fechava</em>”.
                    </div>
                    <div style="margin-bottom:15px;">
                        Na primeira conversa, ele disse: “<strong>precisamos muuuito de um sistema que organize a empresa de eventos</strong>, sempre buscamos inovação no setor de eventos e estamos perdendo muito tempo hoje”. E conforme foi nos explicando, entendemos a dificuldade. Imaginem que <strong>todas as vendas, orçamentos, reservas e dados para contratos se concentravam em uma agenda</strong>! Uma, e de papel!
                    </div>
                    <div style="margin:15px;">
                        <div class="video-container">
                            <iframe width="853" height="480" src="https://www.youtube.com/embed/wHWytDDwdvQ?rel=0" frameborder="0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div style="margin-bottom:15px;">
                        A implantação do sistema mudou para melhor muitos dos processos da empresa. Isso <strong>exigiu que o Dudu e os outros colaboradores investissem tempo na mudança</strong>, o que não foi fácil. Mas após um curto período de implantação, <strong>hoje os resultados são espetaculares</strong>.
                    </div>
                    <div style="line-height:40px;margin-bottom:15px;font-size:20pt;font-style:italic;font-family:'Gotham';padding:10px 15px;color:#097BA0;text-align:center;border-bottom:1px solid #eee;border-top:1px solid #eee;">
                        "Cara, sério… o sistema foi um grande acerto meu. Antes, eu sempre tinha a sensação de que algo estava faltando. Isso me deu saúde! Olho lá, vejo que não tenho nada atrasado e meu dia fica tranquilo."
                    </div>
                    <div style="margin-bottom:15px;">
                        <strong>O Dudu se tornou um grande parceiro</strong> (e até mentor em algumas horas) <strong>da mobilize</strong>. Continuaremos a trabalhar duro para que os resultados do Grupo Banda Biss e de todos os clientes mobilize melhorem à cada dia.
                    </div>

                    <div id="cta-wrapper-btn-only" class='row cta-wrapper cta-wrapper-small' style='margin:60px auto 0 auto;'>
                        <div class='col-md-12' style='padding-left:0;'>
                            <a id="free-trial-btn" href="https://app.mobilizeeventos.com/external.php?classe=register&metodo=submitLanded&landedFrom=#cases page#&utm_source=botao_cta&utm_medium=homepage&utm_campaign=mobilize%20eventos%20-%20cases">
                                EXPERIMENTE GRÁTIS
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('snippets/snippet-contact-us.php'); ?>

    <?php
}

get_header();
do_action('mobi_landing_loop');
get_footer();
