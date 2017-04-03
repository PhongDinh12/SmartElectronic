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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index');

// admin route 
Route::get('admin/login', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@showLoginForm']);
Route::post('admin/login', ['as'  => 'postlogin', 'uses' =>'Admin\AuthController@login']);
Route::get('admin/password/reset', ['as'  => 'getreser', 'uses' =>'Admin\AuthController@email']);

Route::get('admin/logout', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@logout']);

Route::get('/', ['as'  => 'index', 'uses' =>'PagesController@index']);

//---------------------- các công việc trong admin(back_end)---------------------
// Route::group(['middleware' => 'admin'], function () {
      Route::group(['prefix' => 'admin'], function() {
        
       	Route::get('/home', function() {         
         return view('back-end.home');       	
       });
       // -------------------- quan ly danh muc----------------------
       	Route::group(['prefix' => 'danhmuc'], function() {
           Route::get('add',['as'        =>'getaddcat','uses' => 'CategoryController@getadd']);
           Route::post('add',['as'       =>'postaddcat','uses' => 'CategoryController@postadd']);

           Route::get('/',['as'       =>'getcat','uses' => 'CategoryController@getlist']);
           Route::get('del/{id}',['as'   =>'getdellcat','uses' => 'CategoryController@getdel'])->where('id','[0-9]+');
           
           Route::get('edit/{id}',['as'  =>'geteditcat','uses' => 'CategoryController@getedit'])->where('id','[0-9]+');
           Route::post('edit/{id}',['as' =>'posteditcat','uses' => 'CategoryController@postedit'])->where('id','[0-9]+');
    	});
         // -------------------- quan ly danh muc--------------------
        Route::group(['prefix' => '/sanpham'], function() {
           Route::get('/{loai}/add',['as'        =>'getaddpro','uses' => 'ProductsController@getadd']);
           Route::post('/{loai}/add',['as'       =>'postaddpro','uses' => 'ProductsController@postadd']);

           Route::get('/{loai}',['as'       =>'getpro','uses' => 'ProductsController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdellpro','uses' => 'ProductsController@getdel'])->where('id','[0-9]+');
           
           Route::get('/{loai}/edit/{id}',['as'  =>'geteditpro','uses' => 'ProductsController@getedit'])->where('id','[0-9]+');
           Route::post('/{loai}/edit/{id}',['as' =>'posteditpro','uses' => 'ProductsController@postedit'])->where('id','[0-9]+');
      });
    });
// });

