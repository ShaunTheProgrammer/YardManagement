<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', 'PagesController@index');
Route::get('/register', 'PagesController@index');



// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');


//Dock Supervisor Routes-Added
Route::get('/security/dashboardsc','PagesController@dashboardsc');
Route::get('/docksup/docklist','DockController@docklist')->name('docklist');
Route::get('dockinentry/{id}', 'DockController@dockin')->name('dockinentry');
Route::post('dockedin/{id}', 'DockController@dockedin')->name('dockedin');

Route::get('/docksup/dockoutlist','DockController@dockoutlist')->name('dockoutlist');
Route::get('dockout/{id}', 'DockController@dockout')->name('dockout');
Route::post('dockedout/{id}', 'DockController@dockedout')->name('dockedout');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

//Admin Routes-Added
Route::get('/admin/dashboardadmin','AdminController@dash')->name('dashad');
Route::get('/admin/mgsecadmin','AdminController@mgsec');
Route::get('/admin/dockinadmin','AdminController@dock');
Route::get('/admin/editadmin/{id}','AdminController@edit');
Route::get('/admin/deleteuser/{id}','AdminController@delete')->name('delete');
Route::post('saveUser/{id}', 'AdminController@saveUser')->name('saveUser');


//Main Gate Security Routes-Added
Route::resource('GateEntry','GateEntryController');
Route::get('outwardlist', 'GateEntryController@outwardlist')->name('outwardlist');
Route::get('gateoutentry/{id}', 'GateEntryController@gateoutentry')->name('gateoutentry');
Route::post('releasevehicle/{id}', 'GateEntryController@releasevehicle')->name('releasevehicle');
Route::get('inward','GateEntryController@create')->name('inward');
Route::get('gateindex','GateEntryController@index')->name('gateindex');

//Manager Routes
Route::get('manager','ManagerController@dash')->name('dash');
Route::get('print','ManagerController@pdf')->name('print');

Auth::routes();

//Route::get('/', function () { if(DB::connection()->getDatabaseName()) { echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName(); } });

Route::get('/home', 'HomeController@index')->name('home');
