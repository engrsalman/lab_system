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

Route::get('/', function () {
    return view('welcome');
});


Route::get('test', 'SuperAdmin\ReportController@test');



Route::get('/admin/login','HomeController@adminLoginView')->name('admin.login');
Route::post('/admin/login','Auth\LoginController@adminLogin')->name('admin.login');
Auth::routes();

Route::group(['middleware' => ['auth','superadmin']], function () {

 Route::group(['prefix' => 'superadmin'], function(){

   Route::get('/home', 'SuperAdmin\HomeController@index')->name('super_admin.home');
   Route::get('edit/', 'SuperAdmin\UsersController@EditSuperAdmin')->name('edit-super-admin');
   Route::post('update/', 'SuperAdmin\UsersController@UpdateSuperAdmin')->name('update-super-admin');
   Route::get('create/user', 'SuperAdmin\UsersController@CreateUser')->name('create-new-user');
   Route::post('save/new/user', 'SuperAdmin\UsersController@SaveUser')->name('save-new-user');
   Route::get('show/users', 'SuperAdmin\UsersController@allUsers')->name('all.users');
   Route::get('edit/{id}/users', 'SuperAdmin\UsersController@EditUser')->name('edit.user');
   Route::patch('update/{id}/users', 'SuperAdmin\UsersController@UpdateUser')->name('update.user');
   Route::get('user-status-change', 'SuperAdmin\UsersController@statusChange')->name('user.status.change');

// User Reports Routes here.......................

   Route::get('create/user/report', 'SuperAdmin\ReportController@CreateReport')->name('create.report');
   Route::post('store/user/report', 'SuperAdmin\ReportController@StoreReport')->name('store.report');
   Route::get('show/users/reports', 'SuperAdmin\ReportController@ShowReports')->name('all-reports.show');
   Route::get('edit/{id}/userreport', 'SuperAdmin\ReportController@EditReport')->name('report.edit');
   Route::patch('update/{id}/userreport', 'SuperAdmin\ReportController@UpdateReport')->name('report.update');
   Route::get('delete/{id}/userreport', 'SuperAdmin\ReportController@TrashReport')->name('report.delete');
   Route::get('download/{id}/pdf', 'SuperAdmin\ReportController@downloadPdf')->name('downlaod.report.pdf');
   Route::get('password-change', 'SuperAdmin\HomeController@passwordView')->name('superadmin.password.change');
   Route::post('password-change', 'SuperAdmin\HomeController@passwordChange')->name('superadmin.password_submit');
   });

});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::group(['prefix' => 'admin'], function(){
        Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
        Route::get('create/admin/report', 'Admin\ReportController@AdminCreateReport')->name('admin.create.report');
        Route::post('store/admin/report', 'Admin\ReportController@StoreAdminReport')->name('admin.store.report');
        Route::get('show/admin/reports', 'Admin\ReportController@ShowAdminReports')->name('admin.show.report');
        Route::get('password-change', 'Admin\HomeController@passwordView')->name('password.change');
        Route::post('password-change', 'Admin\HomeController@passwordChange')->name('admin.password_submit');
        Route::get('edit/{id}', 'Admin\ReportController@EditReport')->name('admin.report.edit');
        Route::post('update/{id}', 'Admin\ReportController@UpdateReport')->name('admin.report.update');
        Route::get('delete/{id}', 'Admin\ReportController@TrashReport')->name('admin.report.delete');
        Route::get('download/{id}/pdf', 'Admin\ReportController@downloadPdf')->name('admin.downlaod.report.pdf');
    });
});
