<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
* Front Page: /home
* 	-Join a League
*	-About
*	-View alleys and leagues
*	-Log In
*
* If user wants to join a league...
* 	alley selection route: /signup/alleys
* 	alley info: /signup/{alleyid}
*		Two buttons: "Create Team" or "Join League as Free Player"
*		Javascript to reveal these buttons after league is selected?
* 	Sign up for league: /signup/{alleyid}/{leagueid}/{create-tag} (select from available leagues)
*		create-tag: 1=creating team as captain, 0=free player sign up
* 	Review and payment: /signup/{alleyid}/{leagueid}/review (*THIS IS THE PAGE WHERE PAYMENT OCCURS*)
*		Inject authorize .NET payment applet of some kind
*		Encrypted storage of payment info or one and done?
*	Confirmation and Team Page: /{userid}/{teamid}
*
*	Objects created after this route:
*		Team with three empty player slots
*		User account with captain priv.
*		Link for other players to join specific team
*
* About WBWW page: /about
*
* View alley and leagues route:
*	Alley selection: /view/alleys
*	Alley page: /view/{alleyid}
*	League page: /view/{alleyid}/{leagueid}
*
* Log In Route:
*	Main Log in: /login
*	User main page: /user/{userid}
* 	Team main menu: /team/{userid}/{teamid}
* 
*
*
*
**/

Route::get('/', 'TraverseController@showMainPage');

Route::get('/home', 'UserController@getProfile');

Route::get('/faqs', 'TraverseController@faqsPage');

Route::resource('alley', 'AlleyController', ['names' => ['show' => 'alley.alleyView']]);

Route::get('/signup', 'UserController@getAlleys');

//Route::get('auth/register/{id}', ['as' => 'userSignUp', 'uses' => 'Auth\AuthController@getRegister']);
Route::get('auth/register/{id}/{teamId}', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'postAuth', 'uses' =>'Auth\AuthController@postRegister']);

Route::get('/user/profile', 'UserController@getProfile');
//Route::post('/signup/updated', ['as' => 'updateInfo', 'uses' => 'UserController@updateInfo']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::post('/confirm', ['as' => 'getRegister', 'uses' => 'Auth\AuthController@getRegister']);
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', ['as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister']);


Route::controllers([
   'password' => 'Auth\PasswordController'
]);

//Route::post('/signup/success', ['as' => 'authenticate', 'uses' => 'UserController@authenticate']);

Route::get('admin/login', 'AdminController@getLogin');
Route::post('admin/login', ['middleware' => 'admin', 'uses' => 'AdminController@getLogin']);

Route::get('admin/main', 'AdminController@showMain');

Route::get('admin/select', 'AdminController@masterSelect');

Route::get('admin/{id}', ['as'=> 'mainAdmin', 'uses'=>'AdminController@getAdmin']);
Route::post('admin/{id}', ['as' => 'updateAlley', 'uses' => 'AdminController@updateAlley']);

Route::get('/add-alley', 'AlleyController@create');
Route::post('/add-alley', ['as' => 'insertAlley', 'uses' => 'AlleyController@store']);




