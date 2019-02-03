<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
   return 'Web Wervice Realizado con LSCodeGenerator';
});

$router->group(['middleware' => []], function () use ($router) {
   $router->post('/login', ['uses' => 'AuthController@login']);
   $router->post('/register', ['uses' => 'AuthController@register']);
   $router->post('/password_recovery_request', ['uses' => 'AuthController@passwordRecoveryRequest']);
   $router->get('/password_recovery', ['uses' => 'AuthController@passwordRecovery']);
});

$router->group(['middleware' => ['auth']], function () use ($router) {
   $router->post('/user/password_change', ['uses' => 'AuthController@passwordChange']);

   //CRUD Profilepicture
   $router->post('/profilepicture', ['uses' => 'ProfilepictureController@post']);
   $router->get('/profilepicture', ['uses' => 'ProfilepictureController@get']);
   $router->get('/profilepicture/paginate', ['uses' => 'ProfilepictureController@paginate']);
   $router->put('/profilepicture', ['uses' => 'ProfilepictureController@put']);
   $router->delete('/profilepicture', ['uses' => 'ProfilepictureController@delete']);

   //CRUD User
   $router->post('/user', ['uses' => 'UserController@post']);
   $router->get('/user', ['uses' => 'UserController@get']);
   $router->get('/user/paginate', ['uses' => 'UserController@paginate']);
   $router->put('/user', ['uses' => 'UserController@put']);
   $router->delete('/user', ['uses' => 'UserController@delete']);

   //CRUD Persona
   $router->post('/persona', ['uses' => 'PersonaController@post']);
   $router->get('/persona', ['uses' => 'PersonaController@get']);
   $router->get('/persona/paginate', ['uses' => 'PersonaController@paginate']);
   $router->put('/persona', ['uses' => 'PersonaController@put']);
   $router->delete('/persona', ['uses' => 'PersonaController@delete']);

   //CRUD Neumatico
   $router->post('/neumatico', ['uses' => 'NeumaticoController@post']);
   $router->get('/neumatico', ['uses' => 'NeumaticoController@get']);
   $router->get('/neumatico/paginate', ['uses' => 'NeumaticoController@paginate']);
   $router->put('/neumatico', ['uses' => 'NeumaticoController@put']);
   $router->delete('/neumatico', ['uses' => 'NeumaticoController@delete']);

   //CRUD Estado
   $router->post('/estado', ['uses' => 'EstadoController@post']);
   $router->get('/estado', ['uses' => 'EstadoController@get']);
   $router->get('/estado/paginate', ['uses' => 'EstadoController@paginate']);
   $router->put('/estado', ['uses' => 'EstadoController@put']);
   $router->delete('/estado', ['uses' => 'EstadoController@delete']);

   //CRUD Usuario
   $router->post('/usuario', ['uses' => 'UsuarioController@post']);
   $router->get('/usuario', ['uses' => 'UsuarioController@get']);
   $router->get('/usuario/paginate', ['uses' => 'UsuarioController@paginate']);
   $router->put('/usuario', ['uses' => 'UsuarioController@put']);
   $router->delete('/usuario', ['uses' => 'UsuarioController@delete']);

   //CRUD Auto
   $router->post('/auto', ['uses' => 'AutoController@post']);
   $router->get('/auto', ['uses' => 'AutoController@get']);
   $router->get('/auto/paginate', ['uses' => 'AutoController@paginate']);
   $router->put('/auto', ['uses' => 'AutoController@put']);
   $router->delete('/auto', ['uses' => 'AutoController@delete']);

   //CRUD TipoAuto
   $router->post('/tipoauto', ['uses' => 'TipoAutoController@post']);
   $router->get('/tipoauto', ['uses' => 'TipoAutoController@get']);
   $router->get('/tipoauto/paginate', ['uses' => 'TipoAutoController@paginate']);
   $router->put('/tipoauto', ['uses' => 'TipoAutoController@put']);
   $router->delete('/tipoauto', ['uses' => 'TipoAutoController@delete']);

   //CRUD kilometrage
   $router->post('/kilometrage', ['uses' => 'kilometrageController@post']);
   $router->get('/kilometrage', ['uses' => 'kilometrageController@get']);
   $router->get('/kilometrage/paginate', ['uses' => 'kilometrageController@paginate']);
   $router->put('/kilometrage', ['uses' => 'kilometrageController@put']);
   $router->delete('/kilometrage', ['uses' => 'kilometrageController@delete']);
});
