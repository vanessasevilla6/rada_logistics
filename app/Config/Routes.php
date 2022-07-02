<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('about_me', 'Home::about_me');
$routes->get('login', 'Home::login');
$routes -> get('logout','Home::log_out');
$routes->get('evento_nuevo', 'Eventos::nuevo_evento');
$routes->get('nueva_membresia', 'Client::registro');
$routes->get('deportes', 'Home::deportes');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('equipos', 'Home::misEquipos');
$routes->get('campus', 'Home::campus');
$routes->get('ciclos', 'Home::ciclos');
$routes->get('torneos', 'Home::torneos');
$routes->get('usuarios_sistema', 'Home::usuarios');
$routes->get('reportes', 'Home::reportes');
//$routes->get('', 'Home::campus');
$routes->get('torneos/(:num)', 'Torneos::torneo/$1');
$routes->get('equipo/(:num)','Home::equipo/$1',);
$routes->get('facultades', 'Home::facultades');
$routes->get('inscripcion/(:any)', 'Home::inscripcion/$1');
$routes->get('nuevo_admin', 'Home::alta_admin');

$routes->get('detalle_juego/(:num)', 'Home::detalle_juego/$1');
$routes->get('instructores', 'Trainer::index');
$routes->get('getAllCampus', 'Home::getAllCampus');
$routes->get('getUserRoles', 'Home::getUserRoles');
$routes->get('getUsuarios', 'Users::get_users');
$routes->get('getCiclos', 'Home::getCiclos');

$routes->get('getAllDeportes', 'Home::getAllDeportes');
$routes->get('getAllFacultades', 'Home::getAllFacultades');
$routes->get('obtenerTorneos/(:num)/(:any)/(:any)/(:num)','Torneos::getTorneos/$1/$2/$3/$4');
$routes->get('obtenerTorneos/equipo/(:num)','Torneos::getTorneosAdmin/$1');
$routes->get('misEquipos/usuario/(:num)','Home::getUserTeams/$1');
$routes->get('obtenerEquipos/(:num)/(:any)', 'Home::getTournamentTeams/$1/$2');
$routes->post('getTeams', 'Home::getTeamsFilter');
$routes->get('obtenerUltimosResultados/(:num)/(:num)', 'Home::getResults/$1/$2');
$routes->get('obtenerSiguientesJuegos/(:num)/(:num)', 'Home::ultimosJuegos/$1/$2');

$routes->post('getInfoRegistrosReporte/filtros', 'Home::getInfoReporte');
$routes->post('inscripcionTorneo/(:num)/(:num)','Torneos::inscribirEquipo/$1/$2');
$routes->post('agregaCiclo','Home::nuevoCiclo');
$routes->get('eliminaCiclo/(:num)','Home::eliminaCiclo/$1');
//resetPassword
$routes->get('resetPassword/(:num)','Users::resetPswd/$1');
//eliminaCiclo

$routes->get('standings/(:num)', 'Home::getStandings/$1');
$routes->get('obtenerJugadores/equipo/(:num)', 'Home::getTeamPlayers/$1');
$routes->get('validaMatricula/(:any)/(:num)/(:num)', 'Home::existeUsuarioDeporte/$1/$2/$3');
$routes-> get('informacionMatricula/(:any)','Home::getInfoParticipante/$1');

//obtenerJugadores

$routes->post('agregar_admin','Users::crear_usuario',['as'=> "add.admin"]);
//agregarJugadorEquipo
//eliminrJugador
$routes->post('eliminarJugador','Users::elminarJugadorEquipo',['as'=> "remove.playerTeam"]);
$routes->post('agregarJugadorEquipo/nuevo','Users::crear_usuario_jugador',['as'=> "add.createTeamPlayer"]);
$routes->post('agregarJugadorEquipo','Users::agregarJugadorEquipo',['as'=> "add.teamPlayer"]);
$routes->post('nuevo_torneo','Torneos::nuevo_torneo',['as'=> "add.tournament"]);
$routes->post('updateMembership','Client::actualizaMembresia',['as'=> "update.membership"]);
//$routes->get('existsClient/(:any)/(:any)','Client::existsClient/$1/$2');
$routes->get('allClients','Client::getAllClientes');
$routes->get('allHorarios','Horario::getHorarios');
$routes->get('allPlans','Plans::getPlans');
$routes->get('trainers/(:num)','Trainer::getAllTrainers/$1');
$routes->get('setStatusTrainer/(:num)/(:any)','Trainer::setStatusTrainer/$1/$2');

$routes->post('actualizaEntrenadorClase','Horario::actualizaHorarioEntrenador',['as'=> "update.class"]);
//agregarTrainer
$routes->post('agregarTrainer','Trainer::agregarTrainer',['as'=> "add.trainer"]);
$routes->post('agregarPlan','Plans::addPlan',['as'=> "add.plan"]);
$routes->post('updatePlan','Plans::updatePlan',['as'=> "edit.plan"]);
$routes->post('deletePlan','Plans::deletePlan',['as'=> "delete.plan"]);
$routes->post('login_user','Users::login',['as'=> "login.user"]);
$routes->get('get_users','Users::get_users',['as'=> "get.users"]);

$routes -> post('saveGameTournament','Torneos::nuevoJuegoCalendarizado');
//updateGameInfo
$routes -> post('updateGameInfo','Torneos::actualizaJuego');
$routes -> post('nuevoEquipo','Home::agregarEquipo');

//guardarDeporte
$routes -> post('guardarDeporte','Home::agregarDeporte');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
