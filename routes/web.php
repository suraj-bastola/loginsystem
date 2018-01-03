<?php



Route::get('/', function () {
    return view('viewer.view');
 });
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');

// Before Login routes
Route::prefix('admin')->group(function(){
  Route::get('/',function(){
    return redirect()->route('admin.login');
  });
  Route::get('login','Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('login','Auth\LoginController@login');
  Route::post('logout','Auth\LoginController@logout')->name('admin.logout');
});

// After Login routes
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
  Route::prefix('dashboard')->group(function(){
    Route::get('/','Admin\dashboardController@index')->name('admin.dashboard.index');
  });
});
