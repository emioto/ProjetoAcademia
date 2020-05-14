<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('InicioController');
$routes->setDefaultMethod('Index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Rotas Adicionadas
$routes->add('Inicio'									, 'InicioController::Index');
$routes->add('Autenticacao/Login'						, 'Autenticacao\LoginController::Index');
$routes->add('Autenticacao/Logout'						, 'Autenticacao\LogoutController::Index');
$routes->add('Autenticacao/Recuperar'					, 'Autenticacao\RecuperarController::Index');
$routes->add('Autenticacao/Registrar'					, 'Autenticacao\RegistrarController::Index');
$routes->add('Aluno/Conta'								, 'Aluno\ContaController::Index');
$routes->add('Aluno/Cursos'								, 'Aluno\CursoController::Index');
$routes->add('Aluno/Exercicios'							, 'Aluno\ExercicioController::Index');
$routes->add('Aluno/MaterialDeApoio'					, 'Aluno\MaterialDeApoioController::Index');
$routes->add('Aluno/Metodos'							, 'Aluno\MetodoController::Index');
$routes->add('Aluno/Planejamento'						, 'Aluno\PlanejamentoController::Index');
$routes->add('Aluno/Resultados'							, 'Aluno\ResultadoController::Index');
$routes->add('Aluno/Streaming'							, 'Aluno\StreamingController::Index');
$routes->add('Aluno/Treinos'							, 'Aluno\TreinoController::Index');
$routes->add('Aluno/Variaveis'							, 'Aluno\VariavelController::Index');

// Rotas de Redirecionamento
$routes->addRedirect('/'								, 'Inicio');
$routes->addRedirect('/Login'							, 'Autenticacao/Login');
$routes->addRedirect('/Logout'							, 'Autenticacao/Logout');
$routes->addRedirect('/Recuperar'						, 'Autenticacao/Recuperar');
$routes->addRedirect('/Registrar'						, 'Autenticacao/Registrar');
$routes->addRedirect('/Aluno'							, 'Aluno/Planejamento');

// GET
$routes->get('Plano/(:num)'								, 'PlanoController::Index/$1');
$routes->get('Aluno/Treinos/ObterCalendario' 			, 'Aluno\TreinoController::ObterCalendario');
$routes->get('Aluno/Planejamento/ObterPlanejamento' 	, 'Aluno\PlanejamentoController::ObterPlanejamento');

// POST
$routes->post('Plano/LogIn' 							, 'PlanoController::LogIn');
$routes->post('Plano/Cadastrar' 						, 'PlanoController::Cadastrar');
$routes->post('Plano/ObterCupom' 						, 'PlanoController::ObterCupom');
$routes->post('Plano/Comprar' 							, 'PlanoController::Comprar');
$routes->post('Autenticacao/LogIn' 						, 'Autenticacao\LoginController::LogIn');
$routes->post('Autenticacao/FacebookLogIn' 				, 'Autenticacao\LoginController::FacebookLogIn');
$routes->post('Autenticacao/GoogleLogIn' 				, 'Autenticacao\LoginController::GoogleLogIn');
$routes->post('Autenticacao/EnviarInstrucoes' 			, 'Autenticacao\RecuperarController::EnviarInstrucoes');
$routes->post('Aluno/Planejamento/SalvarStatusTreino' 	, 'Aluno\PlanejamentoController::SalvarStatusTreino');
$routes->post('Aluno/Planejamento/ObterTreinoDia'	    , 'Aluno\PlanejamentoController::ObterTreinoDia');
$routes->post('Aluno/Conta/AlterarUsuario' 				, 'Aluno\ContaController::AlterarUsuario');
$routes->post('Aluno/Conta/AlterarPessoa' 				, 'Aluno\ContaController::AlterarPessoa');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
