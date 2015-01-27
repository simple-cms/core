<?php

//Admin routes
Route::group(['prefix' => config('core.adminURL')], function()
{
  //Dashboard
  Route::get('/', ['as' => 'dashboard', function()
  {
    return View::make('core::Admin/Dashboard', [
      'pageTitle' => 'Dashboard',
      'section' => 'dashboard',
    ]);
  }
  ]);
});
