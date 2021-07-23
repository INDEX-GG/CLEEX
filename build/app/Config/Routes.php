<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Usedtables;
use App\Controllers\PushSubscription;
use App\Controllers\Profile;
use App\Controllers\SendPushNotification;
use App\Controllers\Updateprofile;

$routes = Services::routes();

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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/////////////////////////////////////////////////////////////////BANK
$routes->get('/payInData', 'DataForSale::index');
$routes->post('/getBalance', 'GetBalance::index');
$routes->post('/final', 'DebitComplete::index');
$routes->post('/regCard', 'RegCard::index');
$routes->get('/regCard', 'RegCard::getView');
$routes->post('/withdraw','OutBabki::index');


$routes->post('/appleAuch','AuthApple::auth');

/////////////////////////////////////////////////////////////////////
$routes->get('/', 'Home::index');
$routes->get('/topka', 'Topka::index');
$routes->get('/test', 'Test::index');

$routes->post('/Add', 'Add::index'); //добавить фильтр нужно
/////////////////////
$routes->get('/hashGen', 'HashGen::token');
$routes->get('/h1gen', 'HashGen::h1');
///////////////////
$routes->post('/updateProfile', 'Updateprofile::updateProfileDate');  //Обновляет данные профиля
$routes->post('/usedTables','Usedtables::fixTable'); //Добавляет столы в таблицу
$routes->post('/unsetTables', 'Usedtables::unsetTable'); // Удаляет столы из таблицы
$routes->post('/auth', 'Auth::getDate');
$routes->post('/call', 'Call::find');  //вызов официанта

$routes->post('/sendpushnotification', 'SendPushNotification::index');  //передача PUSH-сообщения

//$routes->resource('/pushsubscription', ['only' => ['create', 'update', 'delete']]);
//$routes->resource('/pushsubscription');
$routes->post('/PushSubscription', 'PushSubscription::create');  //передача данных для подписки официанта
$routes->put('/PushSubscription', 'PushSubscription::create');
$routes->delete('/PushSubscription', 'PushSubscription::create');
//$routes->put('/pushsubscription', 'PushSubscription::update');  //передача данных для подписки официанта
//$routes->delete('/pushsubscription', 'PushSubscription::delete');  //передача данных для подписки официанта

$routes->get('/account/busyTables', 'Account::busyTables'); //Текущие вызовы со столов

$routes->get('/leavetip', 'Leavetip::index');
$routes->get('/barman', 'Barman::index');
$routes->get('/account', 'Account::index');  //Возвращает view аккаунта официанта
$routes->get('/tablesCount', 'Tables::CountTables'); // возвращает количество столов в заведении
$routes->get('/tables', 'Tables::pageTable'); // возвращает информацию о столах, занятые, ошибки, свои
$routes->get('/auth/logOut', 'Auth::logOut'); // разлогиниться
$routes->get('/profile','Profile::profileView'); // страница профиля официанта
$routes->get('/GetProfileDate','Profile::getDate'); //получает данные об официанте
$routes->get('/login', 'Login::index'); // страница авторизации официанта

$routes->get('(:any)', 'Pages::view/$1');




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
