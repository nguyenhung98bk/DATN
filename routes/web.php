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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'/admin'],function(){
    Route::get('dashboard','Admin\DashboardController@dashboard')->name('dashboard');

    Route::get('/teacher','Admin\UserController@getlistteacher')->name('teacher');
    Route::get('/profileteacher/{id}','Admin\UserController@get_profileteacher')->name('profileteacher');
    Route::post('/profileteacher','Admin\UserController@post_profileteacher');
    Route::get('/insertteacher','Admin\UserController@get_insertteacher')->name('insertteacher');
    Route::post('insertteacher','Admin\UserController@post_insertteacher');

    Route::get('/student','Admin\UserController@getliststudent')->name('student');
    Route::get('/profilestudent/{id}','Admin\UserController@get_profilestudent')->name('profilestudent');
    Route::post('/profilestudent','Admin\UserController@post_profilestudent');
    Route::get('/insertstudent','Admin\UserController@get_insertstudent')->name('insertstudent');
    Route::post('insertstudent','Admin\UserController@post_insertstudent');

    Route::get('monhoc','Admin\MonhocController@getlistmonhoc');
    Route::post('insertmonhoc','Admin\MonhocController@insertmonhoc');
    Route::post('renamemonhoc','Admin\MonhocController@renamemonhoc');

    Route::get('lopthi','Admin\LopthiController@getlistlopthi')->name('admin/lopthi');
    Route::get('get_taolopthi','Admin\LopthiController@get_taolopthi')->name('taolopthi');
    Route::post('post_taolopthi','Admin\LopthiController@post_taolopthi');
    Route::get('/sualopthi/{id}','Admin\LopthiController@get_sualopthi')->name('sualopthi');
    Route::post('/sualopthi','Admin\LopthiController@post_sualopthi');

    Route::get('taodanhsachthi/{id}','Admin\DanhsachthiController@taodanhsachthi')->name('taodanhsachthi');
    Route::get('themhocsinh/{id}','Admin\DanhsachthiController@get_themhocsinh');
    Route::POST('themhocsinh','Admin\DanhsachthiController@themhocsinh');
    Route::get('deletedst/{id_hocsinh}{id_lopthi}','Admin\DanhsachthiController@deletedst');

    Route::get('dethi/{id}','Admin\DethiController@dethi')->name('dethi');
    Route::POST('insertdethi','Admin\DethiController@insertdethi');


    Route::get('cauhoi/{id}','Admin\CauhoiController@cauhoi')->name('cauhoi');
    Route::get('themcauhoi/{id}','Admin\CauhoiController@themcauhoi');
    Route::post('postcauhoi','Admin\CauhoiController@postcauhoi');

    Route::get('ptch','Admin\DashboardController@ptch');
    Route::get('tkds','Admin\DashboardController@tkds');

    Route::get('xembaithi/{id_hocsinh}{id_lopthi}','Admin\BaithiController@xembaithi');
    Route::get('xemchitiet/{id_baithi}','Admin\BaithiController@xemchitiet');
});

Route::group(['prefix'=>'/hocsinh'],function(){
    Route::get('baithi','Hocsinh\BaithiController@baithi');
    Route::get('chuanbi/{id}','Hocsinh\BaithiController@chuanbi');
    Route::get('batdau/{id}','Hocsinh\BaithiController@batdauthi');
    Route::post('updatedapan','Hocsinh\BaithiController@updatedapan');
    Route::get('nopbai/{id}','Hocsinh\BaithiController@nopbai');
    Route::get('ketqua/{id}','Hocsinh\BaithiController@ketqua')->name('ketqua');
    Route::get('lsthi','Hocsinh\BaithiController@lsthi');
    Route::get('trangchu','Hocsinh\BaithiController@trangchu')->name('trangchu');
});
