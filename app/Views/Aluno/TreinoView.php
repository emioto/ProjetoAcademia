<?= $this->extend('Padrao/PadraoAuthView') ?>
<?= $this->section('Titulo') ?> Aluno > Treinos <?= $this->endSection() ?>
<?= $this->section('Estilos') ?>
    <link rel="stylesheet" href="../public/estilos/calendario.css">
<?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
    <div class="row">
        <div class="col">
            <div id="Calendario"></div>
        </div>
    </div>
    <div style="top: 5vh;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Meu Treino</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="txt1 text-center p-t-10 p-b-10">
                                    <h2 id="TreinoDiaHeader"></h2>
                                </div>
                            </div>
                        </div>
                        <div id="dadosTreino" class="row"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('Scripts') ?>
    <script src="../public/javascripts/calendario.js"></script>
    <script>
        function ObterTreinoDia(idTreino, data)
        {
            $('#btnCarregarTreino').html('Carregando treino...');
            $.ajax({
				url: "<?= base_url('Aluno/Planejamento/ObterTreinoDia') ?>",
                type: "POST",
                data: { IdTreino: idTreino, Data: data },
                success: function(retorno) {
                    
                    $('#TreinoDiaHeader').html(retorno.TipoExe +': ' + retorno.Metodo +' - '+ new Date(data).toLocaleDateString('pt'));
                    var tabelaExercicios = '<div class="col"><div class="txt3 text-center p-t-10 p-b-10"><span>Exercícios</span></div><div class="wrap-exercise p-l-10 p-r-10 p-t-10 p-b-10">';
                    var tabelaVariaveis = '<div class="col"><div class="txt3 text-center p-t-10 p-b-10"><span>Variavéis</span></div>';
                    var tabelaAerobico = '';
                    var possuiExercicios = false;

                    tabelaVariaveis += '<div class="wrap-exercise p-l-10 p-r-10 p-t-10 p-b-10 bgBranco">';
                    tabelaVariaveis += '<div class="container-login100-form-btn p-t-5">';
                    tabelaVariaveis += '<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">SÉRIE: '+ retorno.FSE_NUMSERIE +'</button></div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '<div class="container-login100-form-btn p-t-5">';
                    tabelaVariaveis += '<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">REPETIÇÕES: '+ retorno.FSE_REP +'</button></div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '<div class="container-login100-form-btn p-t-5">';
                    tabelaVariaveis += '<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">VELOCIDADE DA EXECUÇÃO: '+ retorno.FSE_VLE +'</button></div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '<div class="container-login100-form-btn p-t-5">';
                    tabelaVariaveis += '<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">INTERVALO ENTRE AS SÉRIES: '+ retorno.FSE_INTERVALOSERIE +'</button></div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '<div class="container-login100-form-btn p-t-5">';
                    tabelaVariaveis += '<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">INTERVALO ENTRE EXERCÍCIOS: '+ retorno.FSE_INTERVALOEX +'</button></div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '<div class="container-login100-form-btn p-t-5">';
                    tabelaVariaveis += '<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">PERCEPÇÃO DE ESFORÇO: '+ retorno.FSE_ESFORCO +'</button></div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '<div class="container-login100-form-btn p-t-5">';
                    tabelaVariaveis += '<div class="wrap-login100-form-btn bgPreto"><button onclick="window.open(\'<?= base_url('Aluno/Variaveis') ?>\')" class="form-btn-preto">ENTENDA AS VARIÁVEIS</button></div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '</div>';
                    tabelaVariaveis += '</div>';

                    if (retorno.EXERCICIOS_LISTA.length > 0) 
                    {
                        
                        retorno.EXERCICIOS_LISTA.forEach(function(exercicio) 
						{
                            if(exercicio.EXETRN_ROUNDS === undefined)
                            {
                                possuiExercicios = true;
                                tabelaExercicios += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button onclick=\'window.open("' + exercicio.EXE_LINK + '")\' class="form-btn-branco">' + exercicio.EXE_TITULO + '</button></div></div>';
                            }
                            else
                            {
                                tabelaAerobico += '<div class="col">';
                                tabelaAerobico += '<div class="txt3 text-center p-t-10 p-b-10"><span>Aeróbio</span></div>';
                                tabelaAerobico += '<div class="wrap-exercise p-l-10 p-r-10 p-t-10 p-b-20">';
                                tabelaAerobico += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">NOME: ' + exercicio.EXE_TITULO + '</button></div></div>';
                                tabelaAerobico += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">ROUNDS: ' + exercicio.EXETRN_ROUNDS + '</button></div></div>';
                                tabelaAerobico += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">ESTÍMULOS: ' + exercicio.EXETRN_ESTIMULO + '</button></div></div>'; 
                                tabelaAerobico += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">INTENSIDADE: ' + exercicio.EXETRN_INTENSIDADE + '</button></div></div>'; 
                                tabelaAerobico += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">PAUSA: ' + exercicio.EXETRN_PAUSA + '</button></div></div>'; 
                                tabelaAerobico += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">TIPO: ' + exercicio.EXETRN_TIPO + '</button></div></div>'; 
                                tabelaAerobico += '<div class="container-login100-form-btn p-t-5"><div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">TOTAL DE TEMPO: ' + exercicio.EXETRN_TOTAL + '</button></div></div></div>';
                                tabelaAerobico += '</div>';
                            }
                        });

                        tabelaExercicios += '<div class="container-login100-form-btn p-t-10">';
                        tabelaExercicios += '<div class="wrap-login100-form-btn bgPreto"><button onclick="window.open(\'https://api.whatsapp.com/send?phone=5519984409949&text=Oi%20Vitor!%20Preciso%20de%20ajuda!%20T%C3%A1%20dif%C3%ADcil%20ir%20treina!.%20O%20que%20fa%C3%A7o%3F\')" class="form-btn-preto">PRECISO DE AJUDA</button></div>';
                        tabelaExercicios += '</div>';
                        tabelaExercicios += "</div>";
                        tabelaExercicios += "</div>";
                        $('#dadosTreino').html('');
                        
                        $('#dadosTreino').append(tabelaVariaveis);

                        if(possuiExercicios)
                            $('#dadosTreino').append(tabelaExercicios);

                        $('#dadosTreino').append(tabelaAerobico);                  
                    }

                    $('#exampleModal').modal('show');
                    $('#btnCarregarTreino').html('Ver treino completo');
                }
			});
        }

        function ObterCalendario()
        {
            fetch('<?= base_url('Aluno/Treinos/ObterCalendario')?>')
            .then(function(response) {
                return response.json();
            }).then(function(retorno) 
            {
                var data = [];
                retorno.CalendarioTreinos.forEach(function(calendarioTreino)
                {
                    if(calendarioTreino.Exercicios.length > 0)
                    {
                        calendarioTreino.Exercicios[0].forEach(function(exercicio) 
						{
							var exercicio = 
                            { 
                                idtreino: calendarioTreino.IdTreino,
                                titulo: calendarioTreino.Titulo, 
                                name: "<a href='" + exercicio.LinkExercicio + "' target='_blank'>" + exercicio.Descricao + "</a>", 
                                date: calendarioTreino.Data, 
                                type: calendarioTreino.StatusTreino == 1 ? "birthday" : "event", 
                                everyYear: false 
                            };
                            data.push(exercicio);
                        });
                    }
                });
                $("#Calendario").evoCalendar('addCalendarEvent', data);
            });
        };
    </script>
    <script>
        $( document ).ready(function() {
            $('#Calendario').evoCalendar({
                todayHighlight: true,
                sidebarToggler: false,
                eventListToggler: true,
                canAddEvent: false,
                calendarEvents: [],
                onSelectDate: function() {
                    if($('#Calendario').hasClass('event-hide')) {
                        $('#Calendario').removeClass('event-hide');
                    };
                },
                onAddEvent: function() { }
            });
            ObterCalendario();
        });
    </script>
<?= $this->endSection() ?>