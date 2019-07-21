<?php

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
//use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});
//login route
Route::get('login', 'Auth\LoginController@ShowLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name("logout");

//registration routes
Route::get('register', 'Auth\RegisterController@ShowRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//activation route
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
//github setting route
Route::get('/github-setting', 'githubSettingController@index')->name('github-setting');
Route::post('/SaveGithubSetting', 'githubSettingController@SaveGithubSetting')->name('SaveGithubSetting');
//passing data to master-app
View::composer(['master-app.master-app'], function($view){
    $user_login = DB::table('users')
                  ->join('roles', 'users.role_id', 'roles.id')
                  ->where([
                      ['users.id', Auth::id()]
                  ])->select(DB::raw("users.name as username, roles.name as role, users.email as email"))->first();
    $git_data = DB::table('project_lists')
                ->where([
                    ['user_id', Auth::id()],
                    ['git_token', '<>', ''],
                    ['git_status', 1]
                ])->get();
    $view->with(['userdata' => $user_login, 'git_data' => $git_data->count()]);
});
//Login Activities List
Route::get('/login-activities', 'loginActivitiesController@index')->name('login-activities');
//list users for admin role
Route::get('/list-users', 'listUsersController@index')->name('list-users');

Route::get('/repository', 'gitHubApiController@index')->name('repository');

Route::get('/finder', ['uses' => 'gitHubApiController@finder', 'as' => 'finder']);

Route::get('/edit', ['uses' => 'gitHubApiController@edit', 'as' => 'edit_file']);

Route::post('/update', ['uses' => 'gitHubApiController@update', 'as' => 'update_file']);

Route::get('/commits', ['uses' => 'gitHubApiController@commits', 'as' => 'commits']);

Route::get('/authorizations', ['uses' => 'gitHubApiController@authorizations', 'as' => 'authorizations']);

Route::post('/events', ['uses' => 'gitHubApiController@storeEvents']);

Route::get('/reports/contributions.json', ['uses' => 'gitHubApiController@contributionsJson']);

Route::get('/reports/contributions', ['uses' => 'gitHubApiController@contributions']);
