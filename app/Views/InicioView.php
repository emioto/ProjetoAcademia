<?= $this->extend('Padrao/PadraoView') ?>
<?= $this->section('Titulo') ?>Pagina Inicial<?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>

<?php
    if(!$_SERVER["HTTPS"]):
        header("Location: https://www.treinamentodimauro.com.br/");
    endif;
?>
<!DOCTYPE html>
<html data-wf-page="5a552bf3e519160001e5026d" data-wf-site="5a552bf3e519160001e5026c">
    <head>
        <meta charset="utf-8">
        <title>Treinamento Di Mauro</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Webflow" name="generator">
        <link rel="stylesheet" href="./../css/w3.css">
        <link href="../../css/normalize.css" rel="stylesheet" type="text/css">
        <link href="./../css/webflow.css" rel="stylesheet" type="text/css">
        <link href="./../css/dimauropersonal.webflow.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
        <script type="text/javascript">WebFont.load({google: {families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]}});</script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script>
            function onSubmit() {
                document.getElementById('formContato').submit();
            }
        </script>        
        <script type="text/javascript">!function (o, c) {
                var n = c.documentElement, t = " w-mod-";
                n.className += t + "js", ("ontouchstart"in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
            }(window, document);
        </script>
        
        <link href="../images/ico.png" rel="shortcut icon" type="image/x-icon">
        <link href="../images/ico2.png" rel="apple-touch-icon">
    </head>
    <body>
        <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav"><a href="#" id="btnHero" class="w-nav-brand"><img src="../images/5b58f6001b566cccf07e3c4a_treinamentodimauro.png" class="logo"></a>
            <nav role="navigation" class="nav-menu w-nav-menu"><a href="index.html" id="btnMenuInicio" class="nav-link w-nav-link w--current">Início</a><a href="#planos" id="btnMenuPlanos" class="nav-link w-nav-link">Planos</a><a href="http://blog.treinamentodimauro.com.br" id="btnMenuBlog" class="nav-link w-nav-link" target="_blank">Blog</a><a href="#contato" id="btnMenuContao" class="nav-link w-nav-link">Contato</a><a href="<?= base_url('Login') ?>" id="btnMenuAAluno" class="nav-link w-nav-link">Área do Aluno</a></nav>
            <div class="menu-button w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
        <div class="section-hero">
            <div class="div-hero">
                <div class="div-texto-hero">
                    <h1 class="heading">Planejamento e esforço nunca deram errado!</h1>
                    <p class="paragraph">9 em cada 10 pessoas que emagrecem voltam a engordar</p><a href="#entenda" class="btn w-button">Entenda</a></div>
                <div class="div-img-hero"><img src="../images/dimaurofull.png" srcset="../images/dimaurofull.png 500w, ../images/dimaurofull.png 634w" sizes="(max-width: 767px) 100vw, 240px" class="imghero"></div>

            </div>
        </div>
        <div id="entenda" class="section-vantagens">
            <div class="div-vantagens">
                <h1 class="heading">Como funciona a consultoria?</h1>
                <div class="div-block">
                    <iframe width="330" height="215" src="https://www.youtube.com/embed/yOd7bNp4oFk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="section-metodologia">
            <div class="div-metodologia">
                <h1 class="heading">O Treinamento Di Mauro</h1>
                <div class="div-card-vantagem">
                    <div class="stepbystep">1</div>
                    <h2 class="heading-3">As causas</h2>
                    <p>Unimos as evidências da educação física, nutrição e da psicologia para desenvolver um questionário que identifica algumas possíveis causas do seu ganho de peso.</p>
                </div>
                <div class="div-card-vantagem">
                    <div class="stepbystep">2</div>
                    <h2 class="heading-3">As limitações</h2>
                    <p>Analisamos seu perfil e elucidamos o resultado do questionário para avaliarmos quais pontos deverão ser alterados e quais serão mantidos.</p>
                </div>
                <div class="div-card-vantagem">
                    <div class="stepbystep">3</div>
                    <h2 class="heading-3">As necessidades</h2>
                    <p>O resultado das possíveis causas da falta de adesão ao planejamento e do ganho de peso, fornecerão quais são as reais necessidades individuais e o grau de exequibilidade das mesmas no dia a dia.</p>
                </div>
                <div class="div-card-vantagem">
                    <div class="stepbystep">4</div>
                    <h2 class="heading-3">O treino</h2>
                    <p>As causas, limitações e necessidades nos forneceram parâmetros para definir quais métodos de treinamento, variáveis e exercícios farão parte do planejamento.</p>
                </div>
                <div class="div-card-vantagem">
                    <div class="stepbystep">5</div>
                    <h2 class="heading-3">O atendimento</h2>
                    <p>Para que o planejamento seja cumprido, desenvolvemos um modelo de atendimento que conta com professores de educação física, para ajustar os percalços durante a prática e lhe auxiliar na motivação em continuar.</p>
                </div>
                <div class="div-card-vantagem">
                    <div class="stepbystep">6</div>
                    <h2 class="heading-3">O progresso</h2>
                    <p>Mesmo com os 5 passos anteriores alinhados, sem as devidas progressões, nenhum treino será efetivo a médio/longo prazo. Por isso, contamos com ferramentas que quantificam e qualificam sua evolução, nos oferecendo de forma precisa a hora e a forma que tais progressões deverão acontecer e se serão em volume ou intensidade.</p>
                </div>
            </div>
        </div>
        <div class="section-contato">
            <div class="div-depoimentos">
                <h1 class="heading">Resultados</h1>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide1.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide2.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide3.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide4.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide5.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide6.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide7.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide8.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide9.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide10.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide11.JPG" width="300"></div>
                <div class="div-card-vantagem"><img src="../images/antesdep/Slide12.jpg" width="300"></div>
            </div>
        </div>
        <div id="planos" class="section-planos">
            <div class="div-plano">
                <h1 class="heading hplanos">Planos</h1>
                <div class="div-planos">
                    <div class="div-card-planos w-inline-block">
                        <h4 class="heading-2">Plano Bimestral</h4>
                        <h1 class="heading planos"><span class="rs">R$</span> 277,00</h1>
                        <div class="text-block">ou 2x de R$ 138,50</div>
                        <p class="paragraph-2">- Composto por:<br>- Planejamento de treino individualizado<br>- 8 semanas de duração<br>- Composto por 4 fases diferentes<br>- Acesso a área restrita com suporte e conteúdo exclusivo<br>Atendimento individualizado de segunda a sexta das 8h às 18h</p>
                        <div class="btn btnplanos"><a href="<?= base_url('Plano/1') ?>" id="btnCompraBi">Contratar</a></div>
                    </div>
                    <div class="div-card-planos recomendado w-inline-block">
                        <h4 class="heading-2">Plano Quadrimestral</h4>
                        <h1 class="heading planos"><span class="rs">R$</span> 466,00</h1>
                        <div class="text-block">ou 4x de R$ 116,50</div>
                        <p class="paragraph-2">- Composto por:<br>- 2 Planejamentos de treino individualizado<br>- 16 semanas de duração<br>- Composto por 8 fases diferentes<br>- Acesso a área restrita com suporte e conteúdo exclusivo<br>Atendimento individualizado de segunda a sexta das 8h às 18h</p>
                        <div class="btn btnplanos"><strong><a href="<?= base_url('Plano/2') ?>" id="btnCompraQuadri">Contratar</a></strong></div>
                        <div class="box-recomendado">Recomendado</div>
                    </div>
                    <div class="div-card-planos w-inline-block">
                        <h4 class="heading-2">Plano Semestral</h4>
                        <h1 class="heading planos"><span class="rs">R$</span> 667,00</h1>
                        <div class="text-block">ou 6x de R$ 111,17</div>
                        <p class="paragraph-2">- Composto por:<br>- 3 Planejamentos de treino individualizado<br>- 24 semanas de duração<br>- Composto por 12 fases diferentes<br>- Acesso a área restrita com suporte e conteúdo exclusivo<br>Atendimento individualizado de segunda a sexta das 8h às 18h</p>
                        <div class="btn btnplanos"><strong><a href="<?= base_url('Plano/3') ?>" id="btnCompraSeme">Contratar</a></strong></div>
                    </div>
                </div>
                <p class="paragraph">*Só planejamos treinos para serem feitos dentro de academias. Não desenvolvemos programas alimentares. O desenvolvimento de planos alimentares é competência exclusiva do nutricionista e deve ser realizado presencialmente, a partir da avaliação individualizada, conforme resoluções do Conselho Federal de Nutrição. A prescrição de exercícios ou dietas por não profissionais é crime pelo exercício ilegal da profissão. Denuncie e seja um cidadão de bem.</p>
            </div>
        </div>
        <div class="section-contato">
            <div class="div-bio">
                <div class="div-biografia r"><img src="../images/dimauro.png" class="imgbio"></div>
                <div class="div-biografia d">
                    <h1 class="heading">Quem sou eu?</h1>
                    <p>Quando me formei em educação física e continuei me especializando na área, percebi inúmeras lacunas no entendimento do porque quase ninguém conseguia emagrecer e se manter magro por longos períodos. Essa questão ficou cada vez mais nítida conforme atendia pessoas de diferentes gêneros, idades e experiências com o treinamento físico. Quando passei de 1.000 alunos e 4.000 treinos planejados, resolvi criar uma forma de aumentar os horizontes. Reuni especialistas em marketing digital, programadores, estrategistas, profissionais da saúde e dividi com eles o que a ciência fala sobre emagrecimento. Assim, de maneira honesta e transparente, prosseguimos com a verdade. Nosso legado, é difundir de forma clara, o que a publicidade FAT/FIT está fazendo com o emagrecimento e oferecer a melhor consultoria de treinamento físico a distância do Brasil. Aqui, para todos, emagrecimento e treinamento são coisas sérias. Nós não vamos deixar a deturpação midiática destruir a saúde das pessoas.</p>
                </div>
            </div>
        </div>
        <div id="contato" class="section-contato">
            <div class="div-form">
                <div class="div-contato">
                    <h1 class="heading">Fale com a gente</h1>
                    <p>Todos os nossos atendentes são professores de educação física, especialistas em áreas diferentes. Você pode nos mandar uma mensagem com qualquer tipo de dúvida que iremos escolher o melhor profissional para te atender. Iremos lhe responder assim que estivermos desocupados. Escreve para a gente o que você precisa.</p>
                    <div class="w-form">
                        <?php
                        if (isset($_GET['msg'])):
                            if ($_GET['msg'] == "ok"):
                                echo '
                                    <div style="background-color: #00cc00; color: white; padding: 10px;">
                                        <div>Muito obrigado pela sua Mensagem! Em breve entraremos em contato.</div>
                                    </div> ';
                            endif;
                        endif;
                        ?>
                        <form id="formContato" name="email-form" data-name="Email Form" class="w-clearfix" action="aluno/enviamail/contatoSite.php" method="post">
                            <input type="text" class="text-field w-input" maxlength="256" name="BML_NOME" data-name="Nome" placeholder="Digite seu nome" id="Nome" required="">
                            <input type="text" class="text-field w-input" maxlength="256" name="BML_EMAIL" data-name="E-mail" placeholder="Digite seu e-mail" id="E-mail" required="">
                            <input type="text" class="text-field w-input" maxlength="50" name="BML_CELULAR" data-name="BML_CELULAR" placeholder="Digite seu Celular" id="BML_CELULAR" required="">
                            <textarea id="Mensagem" name="mensagem" placeholder="Digite sua mensagem" maxlength="5000" data-name="Mensagem" required="" class="text-field w-input"></textarea>
                            <button class="g-recaptcha btn submit w-button" data-sitekey="6LcWCMkUAAAAAKzSvfdi-6Lp1vsJP7ISENYD3Dvi" data-callback="onSubmit">Enviar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-rodape">
            <div class="div-rodape"><img src="../images/logo.svg" class="logo-roda big"></div>
        </div>
        <div class="section-rodape">
            <div class="div-rodape redes"><a href="https://www.youtube.com/channel/UC4FW4hyo6HcRc_aYW8LqHQA" target="_blank" id="btnYoutube" class="w-inline-block"><img src="../images/youtube.png" class="logo-roda"></a><a href="https://www.facebook.com/treinamentodimauro" id="btnFacebook" target="_blank" class="w-inline-block"><img src="../images/facebook.png" class="logo-roda"></a><a href="https://www.instagram.com/henriquedimauro/" id="btnInstagram" target="_blank" class="w-inline-block"><img src="../images/instagram.png" class="logo-roda"></a></div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="../../js/webflow.js" type="text/javascript"></script>
    </body>
</html>

<?= $this->endSection() ?>