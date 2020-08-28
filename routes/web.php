<?php

use Illuminate\Support\Facades\Route;
use Sentry\State\Scope;

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

Route::get('/debug-sentry', function () {
    \Sentry\configureScope(function (Scope $scope): void {
        $scope->setTags([
            'testy' => 'test',
        ]);
    });
    throw new Exception('My first Sentry error!');
});