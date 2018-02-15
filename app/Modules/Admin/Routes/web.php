<?php



Route::get('/admin/{any}', function (){
    return view('admin::admin-home');
})->where('any', '.*');;